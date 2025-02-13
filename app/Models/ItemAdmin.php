<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAdmin extends Model
{
    use HasFactory;

    protected $table = 'p_project_admin';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_admin',
        'project_code',
        'nama_kantong',
        'nama_item',
        'quantity',
        'bukti_foto',
        'status',
    ];
    public function projectAdmin()
    {
        return $this->belongsTo(Project::class, 'project_code', 'project_code');
    }
}
