<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distt extends Model
{
    use HasFactory;

    protected $primaryKey = 'disttId';

    protected $fillable = [
    'disttId',
    'mandalId',
    'disttName'
    ];

    public function mandal()
    {
        return $this->belongsTo(Mandal::class, 'mandalId', 'mandalId');
    }
}
