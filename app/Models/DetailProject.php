<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProject extends Model
{
    use HasFactory;
    protected $fillable = 
    ['estimate_submitted',
    'po_received',
    'tax_checked',
    'danger_checked',
    'logi_arranged',
    'po_no',
    'project_remarks',
    'project_id',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    

}
