<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $request->session()->put('project_code', $request->input('project_code'));

        return redirect()->route('invoice')->with('project_code', $project->project_code);
    }

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

    public function updateItemEntry(Request $request)
    {
        $validatedData = $request->validate([
            'id_entry'=>'required|id',
            'nama_item' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'bukti_foto' => 'nullable|string',
            'status' => 'nullable|string|max:255',
        ]);

        $item = ItemEntry::findOrFail($id_entry);

        $item->nama_item = $validatedData['nama_item'];
        $item->quantity = $validatedData['quantity'];
        $item->status = $validatedData['status'] ?? $item->status;

        if ($request->hasFile('bukti_foto')) {
            $uploadedFile = $request->file('bukti_foto');
            $filePath = $uploadedFile->store('uploads/bukti_foto', 'public');
            $item->bukti_foto = $filePath;
        }

        $item->save();

        return redirect()->back()->with('success', 'Item updated successfully.');
    }
}
