<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'invoice';
    protected $guarded = [];

    public const METODE_PEMBAYARAN = [1 => ['Bank Mandiri Syariah', '7122357214', 'a.n Yayasan Amalbox'], 2 => ['Midtrans', '-', '-']];
    public const STATUS_GAGAL = -1;
    public const STATUS_MENUNGGU_TRANSFER = 0;
    public const STATUS_MENUGGU_VALIDASI = 1;
    public const STATUS_KONFIRMASI = 2;

    public function getStatus()
    {
        if ($this->status == Invoice::STATUS_MENUNGGU_TRANSFER) {
            return 'Menunggu Transfer';
        } elseif ($this->status == Invoice::STATUS_KONFIRMASI) {
            return 'Konfirmasi';
        }

        return false;
    }

    public function program_donatur(): hasMany
    {
        return $this->hasMany('App\Models\ProgramDonatur', 'invoice_id');
    }

    public function user(): belongsto
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
