<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessKantong;

class AccessController extends Controller
{
    public function showAccessForm()
    {
        $project_code = session('project_code', '');
        $kantongNames = session('kantong_names', []);

        return view('addacc', [
            'project_code' => $project_code,
            'kantongNames' => $kantongNames,
        ]);
    }

    public function newAccess(Request $request)
    {
        $project_code = $request->project_code;

        session(['project_code' => $project_code]);

        foreach ($request->kantong as $kantong) {
            foreach ($kantong['access'] as $access) {
                AccessKantong::create([
                    'project_code' => $project_code,
                    'nama_kantong' => $kantong['nama'],
                    'jenis_kendaraan' => $access['jenis'],
                    'entry_access' => $access['entry'],
                    'exit_access' => $access['exit'],
                ]);
            }
        }

        return redirect()->route('additem');
    }
}


