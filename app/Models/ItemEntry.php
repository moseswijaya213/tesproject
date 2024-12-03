<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEntry extends Model
{
    use HasFactory;

    protected $table = 'p_project_entry';

    protected $fillable = [
        'id_entry',
        'project_code',
        'nama_kantong',
        'nama_item',
        'quantity',
        'bukti_foto',
        'status',
    ];
}
