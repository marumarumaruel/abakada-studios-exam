<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomScore extends Model
{
    use HasFactory;

    protected $table = 'random_score';
    
    protected $fillable = [
        'random_score',
    ];
}
