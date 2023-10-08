<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['status','customer','start','end','number','user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function kadouhi()
{
    return $this->hasOne(Kadouhi::class);
}

public function estimate()
{
    return $this->hasOne(estimate::class);
}
    
}
