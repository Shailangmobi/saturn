<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use League\Csv\Reader;
use File;
use Mail;
use App\Invoice;
use Session;
use View;
use DB;
use PDF;
use Excel;

class UserController extends Controller
{
    //

    public function login(Request $request){

        $input = $request->all();

        $insert = Invoice::login($input);
        return $insert;

    }

    public function importFileIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $file = $request->file('sample_file');
            $file = $file->getClientOriginalName();
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
           
            if($ext == "csv" || $ext == "xlsx" || $ext == "xlsm"|| $ext == "xls"){
            
              
            }else{
                return back()->with('msg_notok',"Failed! Wrong Excel file Extension");
            } 

            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name,
                             'email' => $value->email
                             , 'company_name' => $value->company_name
                             , 'company_state' => $value->company_state
                             , 'company_address' => $value->company_address
                             , 'phone' => $value->phone
                             , 'cin' => $value->cin
                             , 'gistin' => $value->gistin
                             , 'status' => $value->status];
                }
                if(!empty($arr)){
                    \DB::table('company')->insert($arr);
                   
                   return back()->with('msg_ok','successfully');
                }
            }
        }
         return back()->with('msg_notok','Failed No file Selected');
    } 
    public function search($request){
        
        $company = Invoice::search($request);
        return response()->json($company);

    }

    public function insertInvoice(Request $request){

    	$input = $request->all();

    	$insert = Invoice::insertInvoiceData($input);
    	return $insert;

    }

    public function viewInvoice(){

    	$result = Invoice::getInvoice();
    		return \View('viewInvoice')->with('data',$result);

    }

    public function viewCustomer(){

        $result = Invoice::viewCustomer();
            return \View('viewCustomer')->with('data',$result);

    }
    public function edit($id){

        $result = Invoice::getInvoiceById($id);
        $company = Invoice::getCompanyMasterDetails();
        $product = DB::table('product_master')->get();
            return \View('editInvoice')->with('data',$result)->with('company',$company)->with('product',$product);

    }

    public function editInvoice(Request $request){
        $input = $request->all();
        $result = Invoice::editInvoice($input);
            if(sizeof($result) > 0 ){
            $message['code']=200;
            $message['message']="Edit Success";
            $message['data']=$result;
        }else{
            $message['code']=400;
            $message['message']="Edit Failed";
            $message['data']=$result;
        }
        return $message;
           

    }

    public function getCompanyDetails($request){
       
        $result = Invoice::getCompanyDetails($request);

        if(sizeof($result) > 0 ){
            $message['code']=200;
            $message['message']="Data Found";
            $message['data']=$result;
        }else{
            $message['code']=400;
            $message['message']="Data not Found";
            $message['data']=$result;
        }
        return $message;
           
    }

    public function addCustomer(Request $request){

       $input = $request->all();
       $insert = Invoice::insertCustomer($input);
       return  $insert;

    }

    public function getCompanyProfile(Request $request){

       $input = $request->all();
       $data = Invoice::getCompanyMasterDetails($input);
       return \View('addProfile')->with('data',$data);

    }

    public function addProfile(Request $request){

       $input = $request->all();
       $insert = Invoice::addProfile($input);
       return  $insert;

    }

    public function updateProfile(Request $request){

       $input = $request->all();
       $insert = Invoice::updateProfile($input);
       return  $insert;

    }

    public function editCustomer(Request $request){

       $input = $request->all();
      
       $insert = Invoice::editCustomer($input);
       return  $insert;

    }

    public function getCustomerById($id){

       

       $insert = Invoice::getCustomerById($id);
      if(sizeof($insert) > 0){
        $message['code'] = 200;
        $message['status'] ="Success";
        $message['message'] = "Data Found";
        $message['data'] = $insert;

      }else{
        $message['code'] = 200;
        $message['status'] ="Success";
        $message['message'] = "Data Found";
        $message['data'] = $insert;
      }
      return response()->json($message);

    }

    public function pdfview(Request $request,$id)
    {
       
        $items = DB::table("invoice")
        ->join('company','company.id','=','invoice.customer_id')
        ->where('invoice.invoice','=',$id)->get();
        $data = DB::table("company_master")->where('status','=',1)->get();
        view()->share('invoices',$items);
        view()->share('data',$data);
        $pdf = PDF::loadView('pdf.pdfView');

        
        if($request->has('download')){
            $pdf = PDF::loadView('pdf.pdfView');
            return $pdf->download('pdfView.pdf');
        }
        return $pdf->stream('pdfView.pdf');
        return view('pdf.pdfView');
    }

    public function mail(Request $request,$id)
    {
       
        $items = DB::table("invoice")
        ->join('company','company.id','=','invoice.customer_id')
        ->where('invoice.invoice','=',$id)->get();
        $data = DB::table("company_master")->where('status','=',1)->get();
        view()->share('invoices',$items);
        view()->share('data',$data);
        $Customer = Invoice::getCustomerById($items[0]->customer_id);
        if($Customer[0]->email !=""){
             Mail::send('pdf.mail', ['data' => $Customer], function($message) use ($Customer)
            {
                $pdf = PDF::loadView('pdf.inVoice_mail');
                $message->subject('Saturn Promoters Products Invoice');
                $message->from('no-reply@mobisofttech.co.in', 'Saturn Promoters');
                $message->to($Customer[0]->email);
                $message->attachData($pdf->output(),'inVoice_mail.pdf');
            });
                $response['code'] = 200;
                $response['status'] ="Success";
                $response['message'] = "Invoice Mail Forwarded";
                $response['data'] = $data;
         }else{

                $response['code'] = 200;
                $response['status'] ="Success";
                $response['message'] = "Invoice Mail not ,No email ID found";
                $response['data'] = $data;

         }
       

      
        
        return response()->json($response);
        /*if($request->has('download')){
            $pdf = PDF::loadView('pdf.pdfView');
            return $pdf->download('pdfView.pdf');
        }*/
       /* return $pdf->stream('inVoice_mail.pdf');
        return view('pdf.pdfView');*/
    }

     public function preview(Request $request,$id)
    {
       
        $items = DB::table("invoice")
        ->join('company','company.id','=','invoice.customer_id')
        ->where('invoice.invoice','=',$id)->get();
        $data = DB::table("company_master")->where('status','=',1)->get();
        view()->share('invoices',$items);
        view()->share('data',$data);
        $pdf = PDF::loadView('pdf.inVoice_mail');

        
        if($request->has('download')){
            $pdf = PDF::loadView('pdf.inVoice_mail');
            return $pdf->download('inVoice_mail.pdf');
        }
        return $pdf->stream('inVoice_mail.pdf');
        return view('pdf.inVoice_mail');
       

      
        
        
        /*if($request->has('download')){
            $pdf = PDF::loadView('pdf.pdfView');
            return $pdf->download('pdfView.pdf');
        }*/
       /* return $pdf->stream('inVoice_mail.pdf');
        return view('pdf.pdfView');*/
    }
}
