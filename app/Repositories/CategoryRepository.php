<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
class CategoryRepository implements CategoryRepositoryInterface{

    public function index(){


        
        return Category::withTrashed()->latest()->paginate(5);
    }
    public function store($data){
        
       
        if(!empty($data['id'])){
            $obj = Category::withTrashed()->find($data['id']);
        }
        else{
            $obj=new Category;
        }
        
        $obj->category_name=$data['category_name'];
        if(!empty($data['category_file'])){
        
                $file=$data['category_file'];
                $file_ext=$file->extension();
                
                $filename=time().'.'.$file_ext;
                $file->storeAs('public/media/',$filename);
                $obj->category_file=$filename;
                
             }
             $obj->save();
        
    }
    public function edit($id){
        $response=[];
        $status=false; 
        $data['form_type']='Update Category';
        $result=Category::withTrashed()->find($id);
        if(!is_null($result)){
          $data['form_result']=Category::withTrashed()->where('id',$id)->first();
          $status=true;  
        }
        
        $response=array('status'=>$status,'data'=>$data);
        return $response;
    }
    public function destroy($id){
        $result=Category::withTrashed()->find($id);
        
        if(!is_null($result)){
            $result->delete();
            return true;
        } 
        return false;
    }

    public function restore($id){
     //
     $result=Category::withTrashed()->find($id);
        
     if(!is_null($result)){
         $result->restore();
         return true;
     }
     return false;
    }
}