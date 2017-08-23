<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Invoice extends Model
{
    //
    public static function search($data){

    	$company = DB::table('company')->select('company_name AS LABEL','id AS VALUE','company_state AS company_state','company_address AS company_address')->where('company_name', 'like', '%'.$data.'%')->orWhere('phone','like','%'.$data.'%')->get();

		return $company;
    
    }

	public static function login($data)
    {
        
		try {
			$insertDetails = DB::table('admin')
			->where('username','=',$data['username'])
			->where('password','=',$data['password'])
			->get();
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "data found !";
				$message['data']= $insertDetails;
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "data not found !";
				return response()->json($message);
			}
				
		
		} catch (\Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }

    public static function insertCustomer($data)
    {
        
		try {
			$insertDetails = DB::table('company')->insert($data);
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Customer Data Inserted !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Customer Data Not Inserted !";
				return response()->json($message);
			}
				
		
		} catch (Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }

    public static function addProfile($data)
    {
        
		try {
			$insertDetails = DB::table('company_master')->insert($data);
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Profile Data Inserted !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Profile Data Not Inserted !";
				return response()->json($message);
			}
				
		
		} catch (\Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }

    public static function updateProfile($data)
    {
        
		try {
			$insertDetails = DB::table('company_master')->where('id','=',$data['id'])->update($data);
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Profile Data Updated !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Profile Data Not Updated !";
				return response()->json($message);
			}
				
		
		} catch (Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }
    public static function insertInvoiceData($data)
    {
    	
        $insertData['gstin'] = $data['GSTIN'];
        $insertData['name'] = $data['name'];
        // $company = DB::table('company')->select('company_name')->where('id','=',$data['company'])->get();
        $insertData['company_name'] = $data['company'];
		$insertData['address'] = $data['address'];
		$insertData['invoice'] = $data['invoice'];
		
		$insertData['amount'] = $data['amount1'];
		$insertData['product'] = $data['product1'];
		$insertData['place_of_supply'] = $data['place_of_supply'];
		$insertData['date'] = $data['date'];
		$insertData['sub_total'] = $data['h_Sub_amount'];
		$insertData['cgst'] = $data['h_cgst'];
		$insertData['igst'] = $data['h_igst'];
		$insertData['sgst'] = $data['h_sgst'];
		$insertData['total_tax'] = $data['h_total_tax'];
		$insertData['total_amount'] = $data['h_total_amount'];
		$insertData['user_id'] = "21";
		$insertData['customer_id'] = $data['id'];
		try {
			if($data['amount1'] != 0 && $data['product1'] != ""){
				
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if($data['amount1'] != 0 && $data['product2'] != "") {
				/*return $$data['amount1'];*/
				$insertData['amount'] = $data['amount2'];
				$insertData['product'] = $data['product2'];
				
				
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount3'] != 0 && $data['product3'] != "") {
				$insertData['product'] = $data['product3'];
				$insertData['amount'] = $data['amount3'];
				
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount4'] != 0 && $data['product4'] != "") {
				$insertData['product'] = $data['product4'];
				$insertData['amount'] = $data['amount4'];
				
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount5'] != 0  && $data['product5'] != "") {
				$insertData['product'] = $data['product5'];
				$insertData['amount'] = $data['amount5'];
				
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Invoice Data Inserted !";
				$message['data']= $data ;
				$invoiceCount=Invoice::getCount();
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Invoice Data Not Inserted !";
				return response()->json($message);
			}
				
		
		} catch (Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
		
		

    }
    public static function getInvoice(){

    	$result = DB::table('invoice')->where('status','=',1)->orderBy('id','desc')->groupBy('invoice')->get();
    	return $result;
    
    }

    public static function editCustomer($data){

    	try {
    		$result = DB::table('company')->where('id','=',$data['id'])->update($data);
    		if(sizeof($result) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Customer Data updated !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Customer Data Not updated !";
				return response()->json($message);
			}
    	} catch (\Exception $e) {
    			$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
    	}
    
    }

    public static function getCustomerById($id){

    	$result = DB::table('company')->where('status','=',1)->where('id','=',$id)->get();
    	return $result;
    
    }


    public static function viewCustomer(){

    	$result = DB::table('company')->where('status','=',1)->orderBy('id','desc')->get();
    	return $result;
    
    }

     public static function getInvoiceById($id){

    	$result = DB::table('invoice')->where('status','=',1)->where('invoice','=',$id)->get();
    	return $result;
    
    }

    public static function getCompanyDetails($query){
    	
    	$result = DB::table('company')->where('status','=',1)
    	->where('id','=',$query)
    	->get();
    	return $result;
    
    }

    public static function getCompanyMasterDetails(){
    	
    	$result = DB::table('company_master')->where('status','=',1)
    	
    	->get();
    	return $result;
    
    }
    public static function getCount()
    {
        $count = DB::table('invoice_count')->select('count')->get();
       	$invoiceCount['count'] = $count[0]->count;
       	$invoiceCount['count']++;
       	$update=DB::table('invoice_count')->where('id','=',1)->update($invoiceCount);
    }

    public static function editInvoice($data){
    	$insertData['gstin'] = $data['gstin'];
        $insertData['name'] = $data['name'];
       	$insertData['amount'] = $data['amount2'];
		$insertData['product'] = $data['product2'];
        $insertData['company_name'] = $data['company_name'];
		$insertData['address'] = $data['address'];
		$insertData['invoice'] = $data['invoice'];
		$insertData['place_of_supply'] = $data['place_of_supply'];
		$insertData['date'] = $data['date'];
		$insertData['sub_total'] = $data['sub_total'];
		$insertData['cgst'] = $data['cgst'];
		$insertData['igst'] = $data['igst'];
		$insertData['sgst'] = $data['sgst'];
		$insertData['total_tax'] = $data['total_tax'];
		$insertData['total_amount'] = $data['total_amount'];
		$insertData['user_id'] = "21";
		$insertData['customer_id'] = $data['id'];
    	$result = DB::table('invoice')->where('invoice','=',$data['invoice'])->delete();
    	try {
			if($data['amount1'] != 0 || $data['amount1'] != "" || $data['amount1'] != null){
				$insertData['amount'] = $data['amount1'];
				$insertData['product'] = $data['product1'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if($data['amount2'] != 0 || $data['amount2'] != "" || $data['amount2'] != null) {
				$insertData['amount'] = $data['amount2'];
				$insertData['product'] = $data['product2'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount3'] != 0 || $data['amount3'] != "" || $data['amount3'] != null) {
				$insertData['product'] = $data['product3'];
				$insertData['amount'] = $data['amount3'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount4'] != 0 || $data['amount4'] != "" || $data['amount4'] != null) {
				$insertData['product'] = $data['product4'];
				$insertData['amount'] = $data['amount4'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if ($data['amount5'] != 0 || $data['amount5'] != "" || $data['amount5'] != null) {
				$insertData['product'] = $data['product5'];
				$insertData['amount'] = $data['amount5'];
				$insertDetails = DB::table('invoice')->insert($insertData);
			}
			if(sizeof($insertDetails) > 0 ){
				$message['code']= 200 ;
				$message['status']= "Success" ;
				$message['message']= "Invoice Data Updated !";
				
				return response()->json($message);
			}else{
				$message['code']= 400 ;
				$message['status']= "Failed" ;
				$message['message']= "Invoice Data Not Updated !";
				return response()->json($message);
			}
				
		
		} catch (\Exception $e) {
				$message['code']= 401 ;
				$message['status']= "Exception Caought" ;
				$message['message']= "There was an ERROR !";
				return response()->json($message);
		}
    	
    
    }
}
