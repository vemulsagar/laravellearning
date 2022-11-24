<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository){
     $this->categoryRepository=$categoryRepository;
    } 
    public function index()
    {
        $data['result']=$this->categoryRepository->index();
       
        return view('category.list',$data);
        // $data['result']=Category::latest()->paginate(5);
        //Category::onlyTrashed()->where('id',2)->restore();
        /* below statement gives all entries inlcuding deleted entries also */
        //$data['result']=Category::withTrashed()->latest()->paginate(5);
        /* below statement gives deleted entries only */
        //$data['result']=Category::onlyTrashed()->latest()->paginate(5);
        /* below statement gives only not deleted entries */
        //$data['result']=Category::latest()->paginate(5);
        
       
    }

   
    public function create()
    {
        $data['form_result']='';
        $data['form_type']='Add Category';
        return view('category.form',$data);
    }

    
    public function store(Request $request)
    {
        //

       if($request->has('id')){
        $category_file_validations=['mimes:jpg,jpeg,png'];
        $msg='Category Updated Successfully';
       }
       else{
       $category_file_validations=['required','mimes:jpg,jpeg,png'];
        $msg='Category Added Successfully';
       }
      
        $request->validate([
            'category_name'=>['required','unique:categories,category_name,'.$request->id],
            'category_file'=>$category_file_validations
        ]);
        $data=$request->all();
       
        $this->categoryRepository->store($data);
        return redirect()->route('category.list')->withSuccess($msg);
    }

    
    
    public function edit(Category $category,$id)
    {

        $response=$this->categoryRepository->edit($id);
        if($response['status']){
            $data=$response['data'];
            return view('category.form',$data);
        }else{
            return redirect()->route('category.list')->withError('Invalid Data');
        }
        
        
        //
    }

   
    public function destroy(Category $category,$id)
    {
    if($this->categoryRepository->destroy($id)){
        return redirect()->route('category.list')->withSuccess('Category Deactivated Successfully');
    }
    return redirect()->route('category.list')->withError('Invalid Data');
        
        
        
    }

    public function restore(Category $category,$id)
    {
        if($this->categoryRepository->restore($id)){
            return redirect()->route('category.list')->withSuccess('Category Activated Successfully');
        }
        return redirect()->route('category.list')->withError('Invalid Data');

        
        
    }
}
