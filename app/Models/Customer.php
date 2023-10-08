<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name','customer_country','customer_industry','customer_shareholder','customer_sanction','customer_equipment','customer_production','customer_financial','customer_maintenance','customer_address','customer_access','customer_remarks'];
    
}