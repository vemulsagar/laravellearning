<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public function singers(){
        /**Coonected table and intermediate table */
        return $this->belongsToMany(Singer::class,'singer_songs');
    }
}
