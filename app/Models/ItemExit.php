<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemExit extends Model
{
    use HasFactory;

    protected $table = 'p_project_exit';

    protected $fillable = [
        'id_exit',
        'project_code',
        'nama_kantong',
        'nama_item',
        'quantity',
    ];

    
}
