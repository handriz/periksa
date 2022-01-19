<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Izin extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'izins';

    protected $fillable = [
        'nama_izin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
