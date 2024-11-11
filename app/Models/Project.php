<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'p_project';

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
    ];
    public function kantongs()
    {
        return $this->hasMany(Kantong::class, 'project_code', 'project_code');
    }
}


