<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\QueryBuilder;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TesterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/* Category Crud using Repository Pattern */
Route::group(['prefix'=>'category','as'=>'category.'],function(){
    Route::get('/',[CategoryController::class,'index'])->name('list');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('restore');
});
/* Category Crud till here  */


/* Category Crud using Service Pattern */
Route::group(['prefix'=>'post','as'=>'post.'],function(){
    Route::get('/',[PostController::class,'index'])->name('list');
   
});
/* Category Crud till here  */

/*one to one realationship customer->mobile */
Route::get('/customers',[CustomerController::class,'index']);/**use to add data */
/**use to retrive data mobile data on basis of customer id */
Route::get('/retrive_onetoonedata',[CustomerController::class,'retrive_onetoonedata']);
/**reverse:use to retrive data customer data on basis of mobile id */
Route::get('/retrive_onetoonedatareverse',[MobileController::class,'retrive_onetoonedatareverse']);
Route::get('/retrive_onetoonedataall',[CustomerController::class,'retrive_onetoonedataall']);


/**one to many relations */
Route::get('/posts_add',[PostController::class,'posts_add']);
/**find all post with user */
Route::get('/postsbyid',[PostController::class,'postsbyid']);
/**find user by postid */
Route::get('/userbypostid',[PostController::class,'userbypostid']);
Route::get('/retrive_onetomanydataall',[PostController::class,'retrive_onetomanydataall']);


/**manay to many relations */

Route::get('/songs_add',[SongController::class,'songs_add']);
Route::get('/singers_add',[SingerController::class,'singers_add']);
Route::get('/getsongs',[SingerController::class,'getsongs']);
Route::get('/getsingers',[SongController::class,'getsingers']);

Route::get('/tester',[TesterController::class,'tester']);



/**genrate pdf
 
https://www.itsolutionstuff.com/post/laravel-6-generate-pdf-file-tutorialexample.html
 */

 Route::get('/generatepdf',[TesterController::class,'generatepdf']);
 Route::get('preview', [TesterController::class,'preview']);
 Route::get('download', [TesterController::class,'download'])->name('download');


 Route::get('word', [TesterController::class,'word'])->name('word');


 Route::get('importExportView', [TesterController::class,'importExportView']);

Route::get('export', [TesterController::class,'export'])->name('export');

Route::post('import', [TesterController::class,'import'])->name('import');

Route::get('my-captcha', [TesterController::class,'myCaptcha'])->name('myCaptcha');

Route::post('my-captcha', [TesterController::class,'myCaptchaPost'])->name('myCaptcha.post');
Route::get('refresh_captcha', [TesterController::class,'refresh_captcha'])->name('refresh_captcha');

/**Query Builder Start*/
Route::get('selectQuery',[QueryBuilder::class,'selectQuery']);
Route::get('whereQuery',[QueryBuilder::class,'whereQuery']);
/**Query Builder End*/

Route::get('test',function(){
    return 'testing 1';
});


