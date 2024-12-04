<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';

    public $timestamps = true;

    protected $fillable = [
        'address',
        'mpio',
        'ocupation', 
        'company', 
        'relationship', 
        'status', 
        'user_id'
    ];

    use HasFactory;
}
