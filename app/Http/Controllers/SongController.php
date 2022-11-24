<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Singer;

class SongController extends Controller
{
    //
    public function songs_add(){
        $obj = new Song;
        $obj->title='Song 1';
        $obj->save();
         $singer_ids=[2,3];
        $obj->singers()->attach($singer_ids);
    
    }

    public function getsingers($song_id=''){
        $song_id=2;
        $singers =Song::find($song_id)->singers;
        return $singers;
        // echo "<pre>";
        // print_r($songs);  
    }
}
