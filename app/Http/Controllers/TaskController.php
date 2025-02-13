<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    public function createTask(Request $request)
    {

        $request->validate([
            'project_code' => 'required|array',
            'project_code.*' => 'required|string',
            'nama_access' => 'required|array',
            'nama_access.*' => 'required|string',
            'nama_kantong' => 'nullable|array',
            'nama_kantong.*' => 'nullable|string',
            'task' => 'nullable|array',
            'task.*' => 'nullable|string',
        ]);

        foreach ($request->project_code as $index => $projectCode) { 
            Task::create([
                'project_code' => $projectCode,
                'nama_access' => $request->nama_access[$index] ?? null,
                'nama_kantong' => $request->nama_kantong[$index] ?? null,
                'task' => $request->task[$index] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Task berhasil dibuat.');
    }

    public function updateTask(Request $request)
    {
        $validatedData = $request->validate([
            'id_task' => 'required|exists:tasks,id_task',
            'nama_access' => 'required',
            'nama_gate' => 'nullable',
            'task' => 'required',
            'bukti_pekerjaan' => $request->status === "Tidak ada pekerjaan" ? 'nullable|file' : 'required|file',
            'status' => 'required|string',
        ]);

        $task = Task::where('id_task', $request->id_task)->first();

        if (!$task) {
            return redirect()->back()->withErrors('ID Task tidak ditemukan.');
        }

        $fileName = $task->bukti_pekerjaan;
        if ($request->hasFile('bukti_pekerjaan')) {
            $filePath = $request->file('bukti_pekerjaan')->store('bukti_pekerjaan', 'public');
            $fileName = basename($filePath);
        }

        $task->update([
            'nama_access' => $request->nama_access,
            'nama_gate' => $request->nama_gate,
            'task' => $request->task,
            'bukti_pekerjaan' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui.');
    }
}
