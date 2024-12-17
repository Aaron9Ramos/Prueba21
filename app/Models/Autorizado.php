<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizado extends Model
{
    protected $table = 'autorizados';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'nombre',
        'foto',
        'ine'
    ];
    use HasFactory;
}
