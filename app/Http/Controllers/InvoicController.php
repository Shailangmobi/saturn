<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class InvoicController extends Controller
{
    //
    protected function getCount()
    {
        $count = DB::table('invoice_count')->select('count')->get();
        $company = DB::table('company')->select('company_name','id')->get();
        $product = DB::table('product_master')->get();
        $data = DB::table("company_master")->where('status','=',1)->get();
        return View('invoice')->with('data',$count)->with('company',$company)->with('product',$product)->with('data2',$data);
    }

    protected function getDashBoardCount()
    {
        $count = DB::table('invoice')->where('status','=',1)->groupBy('invoice')->count();
        $company = DB::table('company')->where('status','=',1)->count();
        
        return View('dashboard')->with('data',$count)->with('company',$company);
    }

   
}
