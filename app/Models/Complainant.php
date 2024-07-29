<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complainant extends Model
{
    use HasFactory;
    protected $fillable = [
        'contactId',
        'name',
        'villageId',
        'casteId',
        'mobile',
        'address',
        'designation',
        'organisation',
    ];

    protected $primaryKey = 'contactId';

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'contactId', 'contactId');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'villageId', 'villageID');
    }

    public function cast()
    {
        return $this->belongsTo(Caste::class, 'casteId', 'castId');
    }

}
