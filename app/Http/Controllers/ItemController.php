<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemEntry;
use App\Models\ItemExit;
use App\Models\ItemAdmin;
use App\Models\ItemRambu;
use App\Models\Project;
use App\Models\Kantong;
use App\Models\AccessKantong;
use Barryvdh\DomPDF\PDF;

class ItemController extends Controller
{
    public function create($projectCode = null)
    {
        $projectCode = $projectCode ?? session('project_code');

        $project = Project::where('project_code', $projectCode)->firstOrFail();

        $kantongList = Kantong::where('project_code', $projectCode)->get();

        $accessData = AccessKantong::where('project_code', $projectCode)->get()->groupBy('nama_kantong');

        return view('additem', compact('project', 'kantongList', 'accessData'));
    }

    public function store(Request $request)
    {
        $projectCode = $request->input('project_code');
        $project = Project::where('project_code', $projectCode)->first();
        session(['project_code' => $projectCode, 'project_name' => $project->project_name]);

        $kantongList = $request->input('nama_kantong', []);

        foreach ($kantongList as $index => $namaKantong) {
            $namaItemEntryList = $request->input("nama_item_entry.{$index}", []);
            $quantityEntryList = $request->input("quantity_entry.{$index}", []);

            foreach ($namaItemEntryList as $entryIndex => $namaItemEntry) {
                $quantityEntry = $quantityEntryList[$entryIndex] ?? 0;
                if (!empty($namaItemEntry) && $quantityEntry > 0) {
                    ItemEntry::create([
                        'project_code' => $projectCode,
                        'nama_kantong' => $namaKantong,
                        'nama_item' => $namaItemEntry,
                        'quantity' => $quantityEntry,
                    ]);
                }
            }

            $namaItemExitList = $request->input("nama_item_exit.{$index}", []);
            $quantityExitList = $request->input("quantity_exit.{$index}", []);

            foreach ($namaItemExitList as $exitIndex => $namaItemExit) {
                $quantityExit = $quantityExitList[$exitIndex] ?? 0;
                if (!empty($namaItemExit) && $quantityExit > 0) {
                    ItemExit::create([
                        'project_code' => $projectCode,
                        'nama_kantong' => $namaKantong,
                        'nama_item' => $namaItemExit,
                        'quantity' => $quantityExit,
                    ]);
                }
            }

            $namaItemAdminList = $request->input("nama_item_admin.{$index}", []);
            $quantityAdminList = $request->input("quantity_admin.{$index}", []);

            foreach ($namaItemAdminList as $adminIndex => $namaItemAdmin) {
                $quantityAdmin = $quantityAdminList[$adminIndex] ?? 0;
                if (!empty($namaItemAdmin) && $quantityAdmin > 0) {
                    ItemAdmin::create([
                        'project_code' => $projectCode,
                        'nama_kantong' => $namaKantong,
                        'nama_item' => $namaItemAdmin,
                        'quantity' => $quantityAdmin,
                    ]);
                }
            }
        }

        $namaItemRambuList = $request->input("nama_item_rambu", []);
        $quantityRambuList = $request->input("quantity_rambu", []);

        foreach ($namaItemRambuList as $rambuIndex => $namaItemRambu) {
            $quantityRambu = $quantityRambuList[$rambuIndex] ?? 0;
            if (!empty($namaItemRambu) && $quantityRambu > 0) {
                ItemRambu::create([
                    'project_code' => $projectCode,
                    'nama_item' => $namaItemRambu,
                    'quantity' => $quantityRambu,
                ]);
            }
        }

        return redirect()->route('projects');
    }

}