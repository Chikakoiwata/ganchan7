<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logi extends Model
{
    use HasFactory;
    protected $fillable = 
    [    
    'project_id',
    'title',
    'type',
    'start_day',
    'end_day',
    'start_time',
    'end_time',
    'start_timezone',
    'end_timezone',
    'pic',
    'logi_remarks',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
