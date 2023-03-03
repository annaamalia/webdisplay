<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Program;

class CartHelper
{
    public static function getCart()
    {
        $session = session('kaka', null);
        if (! $session) {
            $session = session()->getId();
            session(['kaka' => $session]);
        }
        $cart = Cart::where('user', $session)->first();

        if (! $cart) {
            $cart = new Cart();
            $cart->user = $session;
            $cart->jenis_user = CART::JENIS_USER_NOT_LOGIN;
            $cart->save();
        }

        return $cart;
    }

    public static function getJumlahWajibZakat()
    {
        $cart = CartHelper::getCart();
        $jumlah = 0;
        foreach (Cart::JENIS_ZAKAT as $zakat) {
            $jumlah = $jumlah + $cart[$zakat];
        }

        return $jumlah;
    }

    public static function getJumlahZakatTersalurkan()
    {
        $cart = CartHelper::getCart();
        $jumlah = $cart->isiCartZakat()->sum('value');

        return $jumlah;
    }

    public static function getJumlahAmalTersalurkan()
    {
        $cart = CartHelper::getCart();
        $jumlah = $cart->IsiCartAmal()->sum('value');

        return $jumlah;
    }

    public static function getJumlahTersalurkanByProgram(Program $program)
    {
        $cart = CartHelper::getCart();
        $jumlah = $cart->isiCart()->where('program_profile_id', $program->id)->first()->value ?? null;

        return $jumlah;
    }

    public static function getJumlahTersalurkan()
    {
        $jumlah = CartHelper::getJumlahZakatTersalurkan() + CartHelper::getJumlahAmalTersalurkan();

        return $jumlah;
    }
}
