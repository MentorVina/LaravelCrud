<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::latest()->paginate(3);
        return view('index',compact('employee'));//we wiil pass this variable inside index page.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $request->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile'=>'required|digits:10',
            'gender'=>'required',
            'designation'=>'required',
            'image' => 'required|image|max:2048'

        ]);

        $image = $request->file('image');//this part will request the image file so that it can requst the image at the time of insertion
        $image_name = rand().'.'.$image->getClientOriginalExtension();
         
        $image->move(public_path('images'),$image_name);
       
        $input_data = array(
            'first_name'=> $request->first_name,
            'last_name'=>  $request->last_name,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'gender' => $request->gender,
            'designation'=> $request->designation,
            'image' => $image_name
        ); 
        Employee::create($input_data);
        return redirect('employee')->with('Success','Employee Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::findorfail($id);
        return view('show',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::findorfail($id);
        return view('edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image_name = $request->hidden_image;
        
        $image = $request->file('image');

        if($image!='')
        { 
            $request->validate([

                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'mobile'=>'required|digits:10',
                'gender'=>'required',
                'designation'=>'required',
                'image' => 'required|image|max:2048'
            ]);

            $image_name = rand().'.'.$image->getClientOriginalExtension();
         
            $image->move(public_path('images'),$image_name);
        }else{

            $request->validate([

                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'mobile'=>'required|digits:10',
                'gender'=>'required',
                'designation'=>'required',
            ]);
        }
        
       
            $input_data = array(
                'first_name'=> $request->first_name,
                'last_name'=>  $request->last_name,
                'email'=> $request->email,
                'mobile'=> $request->mobile,
                'gender' => $request->gender,
                'designation'=> $request->designation,
                'image'=> $image_name
            ); 

            
            
    
        Employee::whereId($id)->update($input_data);
        return redirect('employee')->with('Success','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee= Employee::findorfail($id);
        $employee->delete();
        return redirect('employee')->with('error',"Employee Deleted Successfully");
    }
}
