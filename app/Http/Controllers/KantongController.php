<?php

namespace App\Http\Controllers;

use App\Models\Kantong;
use App\Models\Project;
use Illuminate\Http\Request;

class KantongController extends Controller
{
    public function newKantong(Request $request)
    {
        $request->validate([
            'project_code' => 'required|exists:p_project,project_code',
            'nama_kantong.*' => 'required|string|max:255',
        ]);

        $kantongNames = [];
        foreach ($request->nama_kantong as $nama_kantong) {
            $Kantong = Kantong::create([
                'project_code' => $request->project_code,
                'nama_kantong' => $nama_kantong,
            ]);
            $kantongNames[] = $Kantong->nama_kantong;
        }

        session(['kantong_names' => $kantongNames]);
        session(['project_code' => $request->project_code]);

        return redirect()->route('addacc');
    }


    
    public function showAllProject()
    {
        $project_code = session('project_code');

        return view('addkantong', compact('project_code'));
    }

}
