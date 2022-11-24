<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Models\User;
use App\Models\Post;


class PostController extends Controller
{
    protected $postservice;
    public function __construct(PostService $postservice){
        $this->postservice=$postservice;
    }

    public function index(){
        $data=$this->postservice->getAllPosts();
        echo "<pre>";
        var_dump($data->toArray());die;
    }
   /**one to many relationship */
    public function posts_add($user_id=''){
        $user_id=1;
        $userObj=User::find($user_id);/**finding object */
        $faker=\Faker\Factory::create();
        $post= new Post;
        $post->title= $faker->name;
        $post->description= $faker->paragraph(3);
        $userObj->post()->save($post);
    
    }

    public function postsbyid($user_id=''){
        $user_id=1;
        $data=User::find($user_id)->post;
        return $data;
    }

    public function userbypostid($postid=''){
        $postid=1;
        $data=Post::find($postid)->user;
        return $data;
    }

    public function retrive_onetomanydataall(){
        $user_id=1;
        $data=User::find($user_id);
        echo "<pre>";
        print_r($data->post->toArray());
    }
}
