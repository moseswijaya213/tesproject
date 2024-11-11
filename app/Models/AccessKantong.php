<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessKantong extends Model
{
    use HasFactory;

    protected $table = 'p_project_acc_kantong';

    protected $fillable = [
        'id_acc',
        'project_code',
        'nama_kantong',
        'jenis_kendaraan',
        'entry_access',
        'exit_access',
    ];

}
