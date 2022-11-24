<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilder extends Controller
{
    //

    public function selectQuery(){
    /*1 retrive all rows from table  */
      //$result=DB::table('posts')->get();
    
      /**2Retrieving A Single Row From A Table */
      //$result=DB::table('posts')->where('title','Flavie Jacobi')->first();
      
      /**3Retrieving A Single Column From A Row */
    //   $result=DB::table('posts')->where('title','Flavie Jacobi')->pluck('title','id');

     /* 4. Retrieving specific columns*/
    /* $result = DB::table('posts')->select('title as titles','description')->get();*/
     /* $result = DB::table('posts')->distinct()->get();*/
     $query = DB::table('posts')->select('title');
     $query->addSelect('description');
     $result=$query->get();
      dd($result);

    }

    function whereQuery(){
        
    }
}
