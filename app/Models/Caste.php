<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    use HasFactory;

    protected $fillable = [
        'castId',
        'castName',
        'SC',
        'ST',
        'OBC',
        'Gen',
        'Religion',
    ];

    protected $primaryKey = 'castId';
}
