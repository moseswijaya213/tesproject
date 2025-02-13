<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use App\Models\Kantong;
use App\Models\AccessKantong;
use App\Models\Task;
use App\Models\ItemEntry;
use App\Models\ItemExit;
use App\Models\ItemAdmin;
use App\Models\ItemRambu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
            'status' => 'New Project',
        ]);

        session(['project_code' => $project->project_code]);

        return redirect()->route('addkantong')->with('project_code', $project->project_code);
    }

    public function displayProjects()
    {
        $projects = Project::paginate(15);


        return view('projects', compact('projects'));
    }

    public function search(Request $request)
    {
        $query = Project::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('project_name', 'LIKE', "%$search%")
                ->orWhere('project_code', 'LIKE', "%$search%")
                ->orWhere('project_category', 'LIKE', "%$search%")
                ->orWhere('bidang_usaha', 'LIKE', "%$search%")
                ->orWhere('perusahaan', 'LIKE', "%$search%")
                ->orWhere('pic', 'LIKE', "%$search%")
                ->orWhere('target_live_project', 'LIKE', "%$search%")
                ->orWhere('status', 'LIKE', "%$search%");
        }

        $projects = $query->paginate(10);
        return view('projects', compact('projects'));
    }


    public function Index()
    {
        $projects = Project::all();
        $kantongs = Kantong::all();
        $accessData = AccessKantong::all();

        $itemEntries = ItemEntry::whereIn('project_code', $projects->pluck('project_code'))->get();
        $itemExits = ItemExit::whereIn('project_code', $projects->pluck('project_code'))->get();
        $itemAdmins = ItemAdmin::whereIn('project_code', $projects->pluck('project_code'))->get();
        $itemRambus = ItemRambu::whereIn('project_code', $projects->pluck('project_code'))->get();

        $tasks = Task::whereIn('project_code', $projects->pluck('project_code'))->get();

        $ongoingProjects = Project::whereIn('status', ['On-going', 'New Project'])->get();

        $countMall = $projects->where('bidang_usaha', 'Mall')->whereIn('status', ['On-going', 'New Project'])->count();
        $countOffice = $projects->where('bidang_usaha', 'Office')->whereIn('status', ['On-going', 'New Project'])->count();
        $countPelabuhan = $projects->where('bidang_usaha', 'Pelabuhan')->whereIn('status', ['On-going', 'New Project'])->count();
        $countRetail = $projects->where('bidang_usaha', 'Retail')->whereIn('status', ['On-going', 'New Project'])->count();
        $countBandara = $projects->where('bidang_usaha', 'Bandara')->whereIn('status', ['On-going', 'New Project'])->count();
        $countOthers = $projects->whereNotIn('bidang_usaha', ['Mall', 'Office', 'Pelabuhan', 'Retail', 'Bandara'])
            ->whereIn('status', ['On-going', 'New Project'])
            ->count();

        $finishedProject = $projects->where('status', 'Finished')->count();
        $ongoingProject = $projects->where('status', 'On-going')->count();
        $newProject = $projects->where('status', 'New Project')->count();
        $totalProject = $projects->count();

        $totalUnfinishedTasks = 0;
        $currentTime = Carbon::now()->format('H:i:s');
        $currentDate = Carbon::now()->format('d M Y');

        foreach ($ongoingProjects as $p) {
            $TasksProject = $tasks->where('project_code', $p->project_code);
            $p->countTasksProject = $TasksProject->count();
            $p->countFinishedTasksProject = $TasksProject->whereIn('status', ['Finished', 'Tidak ada pekerjaan'])->count();
            $p->totalprogress = $p->countTasksProject > 0 ? ($p->countFinishedTasksProject / $p->countTasksProject) * 100 : 0;

            $p->countitemEntries = $itemEntries->where('project_code', $p->project_code)->count();
            $p->countitemExits = $itemExits->where('project_code', $p->project_code)->count();
            $p->countitemAdmins = $itemAdmins->where('project_code', $p->project_code)->count();
            $p->countitemRambus = $itemRambus->where('project_code', $p->project_code)->count();

            $p->totalItemCount = $p->countitemEntries + $p->countitemExits + $p->countitemAdmins + $p->countitemRambus;

            $p->countitemEntriesSesuai = $itemEntries->where('project_code', $p->project_code)->where('status', 'Sesuai')->count();
            $p->countitemExitsSesuai = $itemExits->where('project_code', $p->project_code)->where('status', 'Sesuai')->count();
            $p->countitemAdminsSesuai = $itemAdmins->where('project_code', $p->project_code)->where('status', 'Sesuai')->count();
            $p->countitemRambusSesuai = $itemRambus->where('project_code', $p->project_code)->where('status', 'Sesuai')->count();

            $p->totalItemCountSesuai = $p->countitemEntriesSesuai + $p->countitemExitsSesuai + $p->countitemAdminsSesuai + $p->countitemRambusSesuai;

            $p->totalprogresItem = $p->totalItemCount > 0 ? ($p->totalItemCountSesuai / $p->totalItemCount) * 100 : 0;
        }

//dd($ongoingProjects->toArray());

        return view('home', compact(
            'projects',
            'kantongs',
            'accessData',
            'tasks',
            'finishedProject',
            'ongoingProject',
            'newProject',
            'currentDate',
            'currentTime',
            'countMall',
            'countOffice',
            'countPelabuhan',
            'countRetail',
            'countBandara',
            'countOthers',
            'totalProject',
            'ongoingProjects',
            'itemEntries', 
            'itemExits', 
            'itemAdmins', 
            'itemRambus',
        ));
    }


    public function checkAndUpdateStatus()
    {
        $projects = Project::all();
        $tasks = Task::whereIn('project_code', $projects->pluck('project_code'))->get();

        $data = [];

        foreach ($projects as $p) {
            $TasksProject = $tasks->where('project_code', $p->project_code);
            $countTasksProject = $TasksProject->count();
            $countFinishedTasksProject = $TasksProject->whereIn('status', ['Finished', 'Tidak ada pekerjaan'])->count();
            $totalprogress = $countTasksProject > 0 ? ($countFinishedTasksProject / $countTasksProject) * 100 : 0;

            $newDate = $p->created_at->addDays(7);
            $today = now();

            if ($countTasksProject > 0 && $totalprogress == 100) {
                $p->status = 'Finished';
            } else {
                if ($today <= $newDate) {
                    $p->status = 'New Project';
                } else {
                    $p->status = 'On-going';
                }
            }

            $p->save();

            $data[] = [
                'project_code' => $p->project_code,
                'countTasksProject' => $countTasksProject,
                'countFinishedTasksProject' => $countFinishedTasksProject,
                'totalprogress' => $totalprogress,
                'status_before' => $p->getOriginal('status'),
                'status_after' => $p->status,
                'Date baru' => $newDate,
            ];
        }

        dd($data);

        return response()->json(['message' => 'Statuses updated successfully.']);
    }


}

