<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
'check_country',
'visa',
'pe',
'income_tax',
'vat',
'consumption_tax',
'tax_reference',
'danger',
'check_remarks'        
       
    ];

}




