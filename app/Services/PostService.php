<?php
namespace App\Services;
use App\Models\Post;

class PostService{
    public function getAllPosts(){
       return Post::published(false)->get();
    } 
}