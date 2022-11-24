<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
        /*defining one to one relationship should be model name to avoid unnneceesary extra code */
    public function mobile(){
        return $this->hasOne(Mobile::class);
    }

    
    
}
