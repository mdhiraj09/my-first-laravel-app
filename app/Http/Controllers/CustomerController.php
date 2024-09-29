<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;//neccessory

class CustomerController extends Controller
{
    function index(){
        $url = url('/customer');
        $title ="customer registeration";
        $customer = null; 

        $data = compact('url', 'title', 'customer');
        return view('form', $data);
    }
    function store(Request $request){
        $customer = new Customers();//new object(customer) bana rhe hai
        $customer ->name = $request['name'];
        $customer ->email = $request['email'];
        $customer ->address = $request['address'];
        $customer ->country = $request['country'];
        $customer ->DOB = $request['dob'];
        $customer ->password = md5($request['password']);
        $customer->save();
        return redirect('/customer/view');
        // -----------------------------------------

// data decustruct ho rha hai model use karke model ka object banay hai
// or save ho rhahai db me 
    }

    function view(){
        $customer =Customers::all();//data fetch karega
       
        // die; //ye lagane page iske aage nhi jaayega
        $data = compact('customer');
        return view('customer-view')->with($data);
    }
    function trash(){
        $customer = Customers::withTrashed()->get();
        $data = compact('customer');
        return view('customer-trash')->with($data);
        
        }
    function delete($id){
        $customer = Customers::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        // run time error se bachayega
        return redirect('customer/view');
        // echo"<pre>";
        // print_r($customer->toArray());
    }
    function restore($id){
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        // run time error se bachayega
        return redirect('customer/view');
        // echo"<pre>";
        // print_r($customer->toArray());
    }
    function Forcedelete($id){
        $customer = Customers::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        // run time error se bachayega
        return redirect()->back();
        // echo"<pre>";
        // print_r($customer->toArray());
    }
    function edit($id){
        $customer = Customers::find($id);
        if(is_null($customer)){
           return redirect('customer/view');
        }
        else{
            $url = url('/customer/update')."/".$id;
            $title = 'Update Customer';
            $data = compact('customer','url','title');
            return view('form',$data);
        }

        
    }
    function update($id,Request $request){
        $customer = Customers::find($id);//store vaale me new object bana rhe the isme find kr rhe hai
        $customer ->name = $request['name'];
        $customer ->email = $request['email'];
        $customer ->address = $request['address'];
        $customer ->country = $request['country'];
        $customer ->dob = $request['dob'];
        $customer->save();
        return redirect('/customer/view');
    }
    function upload(Request $req){
    //    $filenam = time().".".$req->file('file')->getClientOriginalExtension();
    $file = $req->file('file');
    $filename = time() . '.' . $file->getClientOriginalExtension();   
    $path = $file->storeAs('upload-public', $filename, 'public');
    echo $path;
    
    // Return a success response or view
    // return view('image')->with('path', $path);
    return view('image');
        
    }
} 
