<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Cart extends Model
{
    use HasFactory;

    public const JENIS_USER_LOGIN = 1;
    public const JENIS_USER_NOT_LOGIN = 0;
    public const JENIS_ZAKAT = ['zakatprofesi', 'zakatusaha', 'zakatharta'];

    protected $table = 'cart';
    protected $fillable = CART::JENIS_ZAKAT;

    public function isiCart(): hasMany
    {
        return $this->hasMany('App\Models\IsiCart', 'cart_id')->with('program');
    }

    public function isiCartAmal():hasMany
    {
        return $this->hasMany('App\Models\IsiCart', 'cart_id')->with('program')->whereHas('program', function ($query) {
            $query->where('idx_program_category_id', 'like', Category::KODE_AMAL.'%');
        });
    }

    public function isiCartZakat(): hasMany
    {
        return $this->hasMany('App\Models\IsiCart', 'cart_id')->with('program')->whereHas('program', function ($query) {
            $query->where('idx_program_category_id', 'like', Category::KODE_ZAKAT.'%');
        });
    }

    public function program(): belongsToMany
    {
        return $this->belongsToMany('App\Models\Program', 'isi_cart', 'cart_id', 'program_profile_id')->withTimestamps();
    }
}
