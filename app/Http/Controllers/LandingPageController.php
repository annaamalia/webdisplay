<?php

namespace App\Http\Controllers;

use App\Models\Program;

class LandingPageController extends Controller
{
    public function index()
    {
        $programs = Program::getZakat()->where('status', Program::STATUS_PUBLISH)->get();
        $amals = Program::getAmal()->where('status', Program::STATUS_PUBLISH)->get();

        return view('landing', compact('programs', 'amals'));
    }

    public function about()
    {
        return view('about');
    }
}
