<?php

namespace App\Http\Controllers;

use App\Models\ItemEntry;
use App\Models\ItemExit;
use Illuminate\Http\Request;
use App\Models\Kantong;
use App\Models\Project;

class TesController extends Controller
{
    public function showTesForm()
    {
        $project_code = session('project_code', '');
        $kantongNames = session('kantong_names', []);

        return view('additem', [
            'project_code' => $project_code,
            'kantongNames' => $kantongNames,
        ]);
    }

    public function newTes(Request $request)
    {
        $project_code = $request->project_code;

        session(['project_code' => $project_code]);
        foreach ($request->kantong as $kantong) {
            foreach ($kantong['item'] as $item) {
                ItemEntry::create([
                    'project_code' => $project_code,
                    'nama_kantong' => $kantong['nama'],
                    'nama_item' => $item['nama_item'],
                    'quantity' => $item['quantity'],
                ]);
            }
        }

        return redirect()->route('additem');
    }
}
