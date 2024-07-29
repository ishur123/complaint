<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaintNo',
        'actionType',
        'tranDate',
        'assignedTo',
        'remarks',
        'status'
    ];

    public function complaint()
    {
        $this->belongsTo(Complaint::class,'complaintNo','complaintNo');
    }
}
