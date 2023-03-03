<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Mail\InvoiceSelesaiMail;
use App\Mail\NotifikasiBuktiTransferMail;
use App\Models\BufferTransfer;
use App\Models\Invoice;
use App\Models\ProgramDonatur;
use App\User;
use CartHelper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use VariabelHelper;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoice = Invoice::all();

        return view('invoice.all', compact('invoice'));
    }

    public function store(Request $req)
    {
        $listprogram = CartHelper::getCart()->isiCart;
        if ($listprogram->count() == 0) {
            return redirect()->route('umum.cart.show');
        }
        $user = User::where('email', $req->email)->first();
        $sekarang = date('ym');
        $invoices = Invoice::where('nomor_invoice', 'like', $sekarang.'%')->orderbydesc('id')->first();
        if ($invoices) {
            $lasturut = (int) substr($invoices, -4);
            $lasturut++;
            for ($i = strlen($lasturut); $i < 4; $i++) {
                $lasturut = '0'.$lasturut;
            }
        } else {
            $lasturut = '0001';
        }
        $nomorInvoice = $sekarang.$lasturut;
        if (! $user) {
            $user = new User();
        }
        if (substr($req->nomorhp, 0, 1) == '0') {
            $req->nomorhp = '62'.substr($req->nomorhp, 1);
        }
        $user->name = $req->name;
        $user->phone_number = $req->nomorhp;
        $user->email = $req->email;
        $user->idx_user_type_id = 1;
        $user->status = 0;
        $user->save();

        $invoice = new Invoice();
        $invoice->user_id = $user->id;
        $invoice->rekening = $req->rekening;
        $invoice->status = Invoice::STATUS_MENUNGGU_TRANSFER;
        $invoice->nomor_invoice = $nomorInvoice;

        $tersalurkan = 0;
        foreach ($listprogram as $value) {
            $tersalurkan = $tersalurkan + $value->value;
        }

        $random = rand(100, 999) + $tersalurkan;

        $invoice->value = $tersalurkan;
        $token = $this->generateRandomString();
        $invoice->token = bin2hex($token);
        $invoice->value = $tersalurkan;
        $invoice->uniq = $random;
        $invoice->save();

        $buffer = new BufferTransfer();
        $buffer->value = $random;
        $buffer->invoice_id = $invoice->id;
        $buffer->save();
        foreach ($listprogram as $value) {
            $donasi = new ProgramDonatur();
            $donasi->program_profile_id = $value->program_profile_id;
            $donasi->value = $value->value;
            $donasi->invoice_id = $invoice->id;
            $donasi->status = 0;
            $donasi->comment = $value->comment;
            $donasi->anonim = 0;
            if ($req->anonim) {
                $donasi->anonim = 1;
            }
            $donasi->save();
        }
        $c = CartHelper::getCart()->isiCart;
        foreach ($c as $value) {
            $value->delete();
        }
        $c = CartHelper::getCart();
        $c->delete();
        $client = new Client();
        $pesan = 'Halo '.$req->name.' .Silahkan transfer ke '.Invoice::METODE_PEMBAYARAN[$req->rekening][0].' '.Invoice::METODE_PEMBAYARAN[$req->rekening][1].' '.Invoice::METODE_PEMBAYARAN[$req->rekening][2].' sebesar Rp '.$random;
        Mail::to($req->email)->bcc('info@amalbox.org')->send(new InvoiceMail($invoice));
        try {
            $client->request('get', VariabelHelper::ADDRESS_API_WHATSAPP.'/whatsappapi/'.$req->nomorhp.'/'.$pesan, ['http_errors' => false]);
        } catch (\Exception $e) {
        }

        return redirect()->route('umum.invoice.show', [$invoice->id, $token]);
    }

    public function show($id, $token)
    {
        $tokenhex = bin2hex($token);
        $invoice = Invoice::where('id', $id)->where('token', $tokenhex)->first();
        if (! $invoice) {
            abort(404);
        }
        $rekening = Invoice::METODE_PEMBAYARAN[$invoice->rekening];

        $waktu = $invoice->created_at->addDay();

        return view('invoice.show', compact('invoice', 'rekening', 'waktu', 'token', 'id'));
    }

    public function konfirmasi($id)
    {
        $invoice = Invoice::findorfail($id);
        $invoice->status = Invoice::STATUS_KONFIRMASI;
        $invoice->save();
        $donasis = ProgramDonatur::where('invoice_id', $id)->get();
        foreach ($donasis as $item) {
            $item->status = ProgramDonatur::STATUS_KONFIRMASI;
            $item->save();
        }
        Mail::to($invoice->user->email)->bcc('info@amalbox.org')->send(new InvoiceSelesaiMail($invoice));

        return redirect()->back();
    }

    private function generateRandomString($length = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function uploadbukti($id, $token, Request $req)
    {
        $tokenhex = bin2hex($token);
        $invoice = Invoice::where('id', $id)->where('token', $tokenhex)->first();
        if (! $invoice) {
            abort(404);
        }
        $path = $req->bukti->store('bukti', 'pub');
        $invoice->bukti_transfer = $path;
        $invoice->save();
        Mail::to('info@amalbox.org')->send(new NotifikasiBuktiTransferMail($invoice));

        return redirect()->back();
    }

    public function cek($id, $token, Request $req)
    {
        $tokenhex = bin2hex($token);
        $invoice = Invoice::where('id', $id)->where('token', $tokenhex)->where('status', Invoice::STATUS_KONFIRMASI)->first();
        if ($invoice) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
