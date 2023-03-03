<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class ProgramDonatur extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'program_donatur';
    protected $guarded = [];

    public const STATUS_KONFIRMASI = 1;

    public function invoice(): belongsTo
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }

    public function program(): belongsTo
    {
        return $this->belongsTo('App\Models\Program', 'program_profile_id');
    }
}
