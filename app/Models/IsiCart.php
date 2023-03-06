<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class IsiCart extends Model
{
    use HasFactory;

    protected $table = 'isi_cart';

    protected $guarded = [];

    public function program(): belongsTo
    {
        return $this->belongsTo('App\Models\Program', 'program_profile_id');
    }
}
