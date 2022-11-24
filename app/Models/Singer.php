<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    public function songs(){
        /**Coonected table and intermediate table */
        return $this->belongsToMany(Song::class,'singer_songs');
    }
}
