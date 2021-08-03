<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tasks';
    protected $fillable = [
        'nome',
        'id_project',
        'assignment'
    ];
}
