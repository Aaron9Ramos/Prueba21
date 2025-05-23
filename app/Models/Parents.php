<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'address',
        'mpio',
        'ocupation', 
        'company', 
        'foto',
        'ine',
        'user_type',
        'relationship', 
        'status'
    ];

    use HasFactory;
}
