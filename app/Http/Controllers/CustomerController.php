<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Mobile;
use Faker\Factory as Faker;
class CustomerController extends Controller
{
    //

    public function index(){
         $faker=Faker::create();
         $customer= new Customer;
         $customer->customer_name=$faker->name;
         $customer->save();

         $mobile=new Mobile;
         $mobile->model_number='Mi Note 10';
         $customer->mobile()->save($mobile);
    }

    public function retrive_onetoonedata($customer_id=''){
        $customer_id=1;
        $customerdata=Customer::find($customer_id); /** customers data with id */
        $mobiledata=Customer::find($customer_id)->mobile; /** mobile data of customers data with id */
        echo "<pre>";
        print_r($mobiledata->toArray());
        die;
    }

    public function retrive_onetoonedataall($customer_id=''){
        $customer_id=1;
        $alldata=Customer::find($customer_id); 
        
        // dd($alldata->customer_name);/**customer name */
        dd($alldata->mobile->model_number);/**model_number */
    }
}
