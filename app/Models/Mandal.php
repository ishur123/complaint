<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandal extends Model
{
    use HasFactory;

    protected $primaryKey = 'mandalId';


    protected $fillable = ['mandalId','stateId','mandalName'];

    public function state()
    {
        return $this->belongsTo(State::class, 'stateId', 'stateId');
    }
}
