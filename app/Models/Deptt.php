<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deptt extends Model
{
    use HasFactory;

    protected $fillable = [
        'depttId',
        'depttName',
    ];

    protected $primaryKey = 'depttId';

}
