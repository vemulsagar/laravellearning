<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;

class SingerController extends Controller
{
    //

    public function singers_add(){
        $singer = new Singer;
        $singer->name='Tony Kakar';
        $singer->save();
        $songids=[1,2];
        // var_dump($songid);die;
        $singer->songs()->attach($songids);
    }
    public function getsongs($singer_id=''){
        $singer_id=2;
        $songs =Singer::find($singer_id)->songs;
        return $songs;
        // echo "<pre>";
        // print_r($songs);  
    }
}
