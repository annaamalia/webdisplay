<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramInfo;
use Auth;
use Illuminate\Http\Request;

class ProgramInfoController extends Controller
{
    //
    public function index($id)
    {
        $user = Auth::user();
        $program = Program::findorfail($id);
        if (! $user->isAdmin() && $program->user_id !== $user->id) {
            return view('404');
        }
        $programinfos = $program->programInfo()->orderby('created_at')->get();

        return view('programinfo.all', compact('programinfos', 'id'));
    }

    public function create($id)
    {
        return view('programinfo.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $programinfo = new ProgramInfo();
        $programinfo->title = $request->title;
        $programinfo->detail = $request->detail;
        $programinfo->program_profile_id = $id;
        $programinfo->save();

        return redirect()->route('programinfo.index', $id);
    }
}
