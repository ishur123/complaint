<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    use HasFactory;

     protected $fillable = [
          'constituencyId',
          'stateId',
          'type',
          'name',
          'category1',
          'category2'
        ];

    protected $primaryKey = 'constituencyId';

    public function state()
    {
        return $this->belongsTo(State::class, 'stateId', 'stateId');
    }
}
