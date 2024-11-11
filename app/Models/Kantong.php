<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantong extends Model
{
    use HasFactory;

    protected $table = 'p_project_kantong';

    protected $fillable = [
        'project_code',
        'nama_kantong',
    ];
    
}
