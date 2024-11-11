<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRambu extends Model
{
    use HasFactory;

    protected $table = 'p_project_rambu';

    protected $fillable = [
        'id_rambu',
        'project_code',
        'nama_item',
        'quantity',
    ];
}
