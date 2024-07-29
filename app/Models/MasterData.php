<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'stateId',
        'constituencyId',
        'mandalId',
        'disttId',
        'villageId',
        'depttId',
        'compId',
        'casteID',
    ];

    public function state(){
        return $this->belongsTo(State::class, 'stateId','stateId');
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class,'constituencyId','constituencyId');
    }

    public function mandal(){
        return $this->belongsTo(Mandal::class, 'mandalId','mandalId');
    }

    public function distt(){
        return $this->belongsTo(Distt::class,'disttId','disttId');
    }

    public function village(){
        return $this->belongsTo(Village::class,'villageId','villageID');
    }

    public function deptt(){
        return $this->belongsTo(Deptt::class,'depttId','depttId');
    }

    public function comp(){
        return $this->belongsTo(NatureOfComplaint::class,'compId','compId');
    }

    public function cast(){
        return $this->belongsTo(Caste::class, 'casteID','castId');
    }

}


