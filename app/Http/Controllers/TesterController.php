<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;
use mikehaertl\wkhtmlto\Pdf;
use Exception;
use App\Exports\UsersExport;

use App\Imports\UsersImport;

use Maatwebsite\Excel\Facades\Excel;

class TesterController extends Controller
{
    //
    public function tester(){
        var_dump('tester');die;
    }

    public function generatepdf(){
        $data = ['title' => 'This is testing'];
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('testing.pdf');
        
    }

    public function preview()

    {
        return view('chart');

    }
    public function download(){
        $render = view('chart')->render();
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        //var_dump(public_path('media/report.pdf'));die;
        // 'public/media/',$filename
        // echo "<pre>";
        // var_dump($pdf);die;
        $pdf->saveAs(public_path('media/report.pdf'));
        return response()->download(public_path('media/report.pdf'));
       
        
    }

    public function word(){

        $phpWord = new \PhpOffice\PhpWord\PhpWord();


        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("https://www.itsolutionstuff.com/frontTheme/images/logo.png");

        $section->addText($description);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('helloWorld.docx'));

        } catch (Exception $e) {

        }


        return response()->download(storage_path('helloWorld.docx'));

        var_dump('s');die;
    }

    public function importExportView(){
        return view('importview');
    }
    public function import(){
        Excel::import(new UsersImport,request()->file('file'));  

        return back();
    }
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function myCaptcha(){
        return view('myCaptcha');
    }
    public function refresh_captcha(){
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function myCaptchaPost(){

    }

    
}
