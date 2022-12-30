<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\{Country,City,State,Customer,Invoice};

class CustomerRegistration extends Controller
{
    public function indexpage(){
        $data['countries'] = Country::all();
        return view('add_customer', $data);
    }

    public function fetchState(Request $request){
        $data['states'] = State::where('country_id', $request->country_id)->get(['name','id']);
        return response()->json($data);
    }

    public function fetchCity(Request $request){
        $data['cities'] = City::where('state_id', $request->state_id)->get(['name','id']);
        return response()->json($data);
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'sales'=>'required|numeric',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'invoice_date'=>'required|date|before:tomorrow',
            'profile_pic' => 'required|image|mimes:png|dimensions:max_width=64,max_height=64',
            //'invoices' => 'required',
            //'invoices.*' => 'mimes:pdf'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->sales = $request->sales;
        $customer->country_id = $request->country;
        $customer->state_id = $request->state;
        $customer->city_id = $request->city;
        $customer->invoice_date = $request->invoice_date;

        $imgName = $request->file('profile_pic')->getClientOriginalName();
        $img_moved = $request->profile_pic->move(public_path('customer_images'), $imgName);
        $customer->profile_pic = $imgName;

        /*if($request->hasfile('invoices')) {
            foreach($request->file('invoices') as $file) {
                $filename = time().'.'.$file->extension();
                $file->move(public_path('customer_invoices'), $filename);
                $filelist[] = $filename;
            }
        }
        $customer->filenames = json_encode($filelist);*/

        $customer->filenames = "";
        $yes = $customer->save();
        if($yes and $img_moved){
            return back()->with('success','You have successfully registered');
        }else{
            return back()->with('fail','Registration failed');
        }
    }

    public function viewcustomer(){
        $data = Customer::all();
        return view('view_customer')->with('all_customers', $data);
    }

    public function showCustomer($id){
        $data['customer'] = Customer::where('id','=',$id)->first();
        $data['country'] = Country::where('id','=',$data['customer']->country_id)->first();
        $data['state'] = State::where('id','=',$data['customer']->state_id)->first();
        $data['city'] = City::where('id','=',$data['customer']->city_id)->first();
        $data['date'] = $data['customer']->invoice_date->format('d-m-Y');

        return view('show_customer', $data);
    }
}

