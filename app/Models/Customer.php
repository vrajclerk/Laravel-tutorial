<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="customers";
    protected $primaryKey="customer_id";
  
    public function setCustomerNameAttribute($value){
        $this->attributes['customer_name'] = ucwords($value);
    }
    public function getD0bAttribute($value){
        $this->attributes['dob'] = strtotime($value);
    }
}
