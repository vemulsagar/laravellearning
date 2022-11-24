<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Mobile;


class MobileController extends Controller
{
    //
    public function retrive_onetoonedatareverse($mobile_id=''){
        $mobile_id=1;
       $mobile_data=Mobile::find($mobile_id);/**mobile data */
       $customer_data=Mobile::find($mobile_id)->customer; /**customer data on on basis of mobile id :reverse finding */
       echo "<pre>";
        print_r($customer_data->toArray());
        die;

    }
}
