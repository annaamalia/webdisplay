<?php

namespace App\Http\Controllers;

use App\Models\BufferTransfer;
use App\Models\Invoice;
use App\Models\ProgramDonatur;
use GuzzleHttp\Client;
use VariabelHelper;

class ConsumeApiController extends Controller
{
    public function cektransfer()
    {
        $data = BufferTransfer::all();
        $client = new Client();
        try {
            $response = $client->request('POST', VariabelHelper::ADDRESS_API_MANDIRI.'/mandiricekmutasi', [
                'json' => $data, 'http_errors' => false,
            ]);

            foreach (json_decode($response->getBody()) as $value) {
                echo $value;
                $data = BufferTransfer::find($value);

                $invoice = Invoice::find($data->invoice_id);
                $invoice->status = Invoice::STATUS_KONFIRMASI;
                $invoice->save();

                $donasis = ProgramDonatur::where('invoice_id', $data->invoice_id)->get();
                foreach ($donasis as $item) {
                    $item->status = ProgramDonatur::STATUS_KONFIRMASI;
                    $item->save();

                    $data->delete();

                    $pesan = 'Halo '.$invoice->user->name.'.Dana sebesar Rp '.$value.' Sudah kami terima.Terimakasih . Amalbox';
                    $client->request('get', VariabelHelper::ADDRESS_API_WHATSAPP.'/whatsappapi/'.$invoice->user->phone_number.'/'.$pesan, ['http_errors' => false]);
                }
            }
        } catch (\Exception $e) {
        }
            //var_dump( json_decode($response->getBody()));
    }
}
