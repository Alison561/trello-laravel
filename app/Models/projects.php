<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'projects';
    protected $fillable = [
        'nome',
        'slug',
        'id_user'
    ];
}
