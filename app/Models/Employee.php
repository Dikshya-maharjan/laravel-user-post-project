<?php

namespace App\Models;
use App\Models\IdCard;

use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
    //
        protected $fillable=['name','email'];
        public function idCard(){
            return $this->hasOne(IdCard::class);
        }
    

}
