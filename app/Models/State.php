<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $primaryKey = 'stateId';

    public $fillable = ['stateId','stateName'];

//    public function constituencies()
//    {
//        return $this->hasMany(Constituency::class, 'stateId', 'id');
//    }
//
//    public function mandal()
//    {
//        return $this->hasMany(Mandal::class, 'stateId', 'id');
//    }
}
