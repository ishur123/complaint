<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateSanction',
        'dateStart',
        'amountBudgeted',
        'location',
        'village',
        'typeOfWork',
        'completion',
    ];
}
