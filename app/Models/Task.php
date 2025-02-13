<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'id_task';
    protected $fillable = [
        'id_task',
        'project_code',
        'nama_access',
        'nama_kantong',
        'nama_gate',
        'task',
        'bukti_pekerjaan',
        'status',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_code', 'project_code');
    }
}
