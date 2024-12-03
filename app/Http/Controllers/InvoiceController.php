<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kantong;
use App\Models\AccessKantong;
use App\Models\ItemEntry;
use App\Models\ItemExit;
use App\Models\ItemAdmin;
use App\Models\ItemRambu;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    private function getInvoiceData($project_code)
    {
        $project = Project::where('project_code', $project_code)->firstOrFail();

        return [
            'project' => $project,
            'project_name' => $project->project_name,
            'project_code' => $project->project_code,
            'kantongs' => Kantong::where('project_code', $project->project_code)->get(),
            'accessData' => AccessKantong::where('project_code', $project->project_code)->get(),
            'itemEntries' => ItemEntry::where('project_code', $project->project_code)->get(),
            'itemExits' => ItemExit::where('project_code', $project->project_code)->get(),
            'itemAdmins' => ItemAdmin::where('project_code', $project->project_code)->get(),
            'itemRambus' => ItemRambu::where('project_code', $project->project_code)->get(),
        ];
    }

    public function show($project_code = null)
    {
        try {
            if ($project_code) {
                Session::put('project_code', $project_code);
            }
            else {
                $project_code = Session::get('project_code');
            }

            if (!$project_code) {
                return redirect()->route('projects')->with('error', 'Kode proyek tidak ditemukan.');
            }

            $data = $this->getInvoiceData($project_code);
            return view('invoice', $data);

        } catch (\Exception $e) {
            \Log::error('Error in InvoiceController: ' . $e->getMessage());
            return redirect()->route('projects')
                ->with('error', 'Terjadi kesalahan saat memuat data invoice. ' . $e->getMessage());
        }
    }

    public function generatePDF($project_code = null)
    {
        try {
            if (!$project_code) {
                $project_code = Session::get('project_code');
            }

            if (!$project_code) {
                return redirect()->route('projects')
                    ->with('error', 'Kode proyek tidak ditemukan untuk generate PDF.');
            }

            $data = $this->getInvoiceData($project_code);
            $pdf = PDF::loadView('invoice', $data);

            return $pdf->download('invoice-' . $project_code . '.pdf');

        } catch (\Exception $e) {
            \Log::error('Error generating PDF: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal membuat PDF. ' . $e->getMessage());
        }
    }
}