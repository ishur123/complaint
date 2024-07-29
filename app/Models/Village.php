<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = ['villageID','disttId','villageName'];

    protected $primaryKey = 'villageID';

    public function distt()
    {
        return $this->belongsTo(Distt::class, 'disttId', 'disttId');
    }
}
