<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function newProject(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'project_code' => 'required|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'pic' => 'nullable|string|max:255',
            'bidang_usaha' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'targetliveproject' => 'nullable|date',
            'sistem_operasional' => 'nullable|string|max:255',
            'cashflow' => 'nullable|string|max:255',
            'jenis_kerjasama' => 'nullable|string|max:255',
            'status_asset' => 'nullable|string|max:255',
            'project_category' => 'nullable|string|max:255',
        ]);

        $project = Project::create([
            'project_name' => $request->project_name,
            'project_code' => $request->project_code,
            'perusahaan' => $request->perusahaan,
            'pic' => $request->pic,
            'bidang_usaha' => $request->bidang_usaha,
            'alamat' => $request->alamat,
            'target_live_project' => $request->targetliveproject,
            'sistem_operasional' => $request->sistem_operasional,
            'cashflow' => $request->cashflow,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'status_asset' => $request->status_asset,
            'project_category' => $request->project_category,
        ]);

        session(['project_code' => $project->project_code]);

        return redirect()->route('addkantong')->with('project_code', $project->project_code);
    }

    public function displayProjects()
    {
        $allproject = Project::all();

        return view('projects', compact('allproject'));
    }
}

