<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Customers extends Model
{
    use HasFactory;
    //--------------------
    use softDeletes;
        
    protected $table = "customers";
    protected $primaryKey ="custome_id";

    // ek muttrater hai 
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
    //accessor
    public function getDobAttribute($value){
        return date("d-M-Y",strtotime($value));
    }

}
