<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class IdCard extends Model
{
    //
    protected $fillable=['employee_id','card_number'];
    public function employee(){
        return $this->belongsTo(Employee::class);
        
    }
}
