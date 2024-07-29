<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'complaintNo',
        'contactId',
        'dateOpen',
        'depttId',
        'compId',
        'complaintDetails',
        'complaintStatus',
    ];

    protected $primaryKey = 'complaintNo';

    public function complainant()
    {
        return $this->belongsTo(Complainant::class, 'contactId', 'contactId');
    }

    public function department()
    {
        return $this->belongsTo(Deptt::class, 'depttId', 'depttId');
    }

    public function natureOfComplaint()
    {
        return $this->belongsTo(NatureOfComplaint::class, 'compId', 'compId');
    }

    public function complaintTransaction(){
        $this->hasMany(ComplaintTransaction::class,'complaintNo','complaintNo');
    }

}
