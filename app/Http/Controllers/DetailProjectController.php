<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kantong;
use App\Models\AccessKantong;
use App\Models\ItemEntry;
use App\Models\ItemExit;
use App\Models\ItemAdmin;
use App\Models\ItemRambu;

class DetailProjectController extends Controller
{
    public function showCurrentProject($project_name)
    {
        $project = Project::where('project_name', $project_name)->firstOrFail();

        $kantongs = Kantong::where('project_code', $project->project_code)->get();
        $accessData = AccessKantong::where('project_code', $project->project_code)->get();
        $itemEntries = ItemEntry::where('project_code', $project->project_code)->get();
        $itemExits = ItemExit::where('project_code', $project->project_code)->get();
        $itemAdmins = ItemAdmin::where('project_code', $project->project_code)->get();
        $itemRambus = ItemRambu::where('project_code', $project->project_code)->get();

        return view('locationpage', [
            'project_name' => $project->project_name,
            'project_code' => $project->project_code,
            'perusahaan' => $project->perusahaan,
            'pic' => $project->pic,
            'bidang_usaha' => $project->bidang_usaha,
            'alamat' => $project->alamat,
            'target_live_project' => $project->target_live_project,
            'sistem_operasional' => $project->sistem_operasional,
            'cashflow' => $project->cashflow,
            'jenis_kerjasama' => $project->jenis_kerjasama,
            'status_asset' => $project->status_asset,
            'project_category' => $project->project_category,
            'kantongs' => $kantongs,
            'accessData' => $accessData,
            'itemEntries' => $itemEntries,
            'itemExits' => $itemExits,
            'itemAdmins' => $itemAdmins,
            'itemRambus' => $itemRambus,
        ]);
    }
}