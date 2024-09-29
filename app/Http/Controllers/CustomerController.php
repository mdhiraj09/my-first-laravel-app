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
        // echo"<pre>";
        // print_r($request->all());

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
} 
