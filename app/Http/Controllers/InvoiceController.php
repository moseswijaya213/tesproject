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

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {

        $projectCode = $projectCode ?? session('project_code');
        $projectCode = session('project_code');
        $projectName = session('project_name');

        $kantongList = Kantong::where('project_code', $projectCode)->get();
        $items = [
            'entries' => ItemEntry::where('project_code', $projectCode)->get()->groupBy('nama_kantong'),
            'exits' => ItemExit::where('project_code', $projectCode)->get()->groupBy('nama_kantong'),
            'admins' => ItemAdmin::where('project_code', $projectCode)->get()->groupBy('nama_kantong'),
            'rambu' => ItemRambu::where('project_code', $projectCode)->first(),
        ];

        $data = compact('projectCode', 'projectName', 'kantongList', 'items');
        $pdf = Pdf::loadView('invoice', $data);

        return $pdf->download("invoice_{$projectCode}.pdf");
    }

}