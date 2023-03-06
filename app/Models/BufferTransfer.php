<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BufferTransfer extends Model
{
    use HasFactory;

    protected $table = 'kode_unik_transfer';

    protected $guarded = [];

    protected $primaryKey = 'value';

    public $incrementing = false;
}
