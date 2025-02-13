<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'p_project';
    protected $primaryKey = 'project_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'project_name',
        'project_code',
        'perusahaan',
        'pic',
        'bidang_usaha',
        'alamat',
        'target_live_project',
        'sistem_operasional',
        'cashflow',
        'jenis_kerjasama',
        'status_asset',
        'project_category',
        'status',
    ];
    public function kantongs()
    {
        return $this->hasMany(Kantong::class, 'project_code', 'project_code');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_code', 'project_code');
    }
}


