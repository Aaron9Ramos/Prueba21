<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    public $timestamps = true;

    protected $fillable = [
        'name', 
        'last_name', 
        'last_name2', 
        'grade', 
        'level', 
        'status', 
        'user_id'
    ];

    use HasFactory;
}
