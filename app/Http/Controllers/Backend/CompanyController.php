<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator; // validator class for rules

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array['companies'] = Company::paginate(8);
        return view('app.company.index')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array['categories'] = \App\Models\Category::all();
        return view('app.company.create')->with($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // code...  Data Validation
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:4|max:40',
        'category_id' => 'required|integer',
        'no_of_employee' => 'required|integer',
        'website' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'address' => 'required',
        'logo' => 'required|mimes:jpg,jpeg,gif,png'
      ]);

      if ($validator->fails()) {
        // return back()->withErrors($validator)
        //               ->withInput();
        return dd($validator->errors());
      }else {

        // ... rename image
        $ext = $request->logo->getClientOriginalExtension();
                $file = date('YmdHis').'_'.rand(1,999).'.'.$ext;
                $file_path = $request->logo->storeAs('companyLogo',$file);
        // ... save data

      $company = new Company;
      $company->name = $request->name;
      $company->category_id = $request->category_id;
      $company->no_of_employee = $request->no_of_employee;
      $company->website = $request->website;
      $company->phone = $request->phone;
      $company->email = $request->email;
      $company->logo = $file_path;
      $company->address = $request->address;
      $result = $company->save();

        if($result){
          // return ["result" => "Data has been saved."];
          return redirect('/app/company');
        }else{
          return ["result" => "Operation Failed!"];
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $array['company'] = Company::find($id);
        $array['categories'] = \App\Models\Category::all();
        return view('app.company.edit')->with($array);
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
      // code...  Data Validation
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:4|max:40',
        'category_id' => 'required|integer',
        'no_of_employee' => 'required|integer',
        'website' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
        'address' => 'required',
        'logo' => 'required|mimes:jpg,jpeg,gif,png'
      ]);

      if ($validator->fails()) {
        // return back()->withErrors($validator)
        //               ->withInput();
        return dd($validator->errors());
      }else {

        // ... rename image
        $ext = $request->logo->getClientOriginalExtension();
                $file = date('YmdHis').'_'.rand(1,999).'.'.$ext;
                $file_path = $request->logo->storeAs('companyLogo',$file);
        // ... save data

      $company = Company::find($id);
      $company->name = $request->name;
      $company->category_id = $request->category_id;
      $company->no_of_employee = $request->no_of_employee;
      $company->website = $request->website;
      $company->phone = $request->phone;
      $company->email = $request->email;
      $company->logo = $file_path;
      $company->address = $request->address;
      $result = $company->save();

        if($result){
          // return ["result" => "Data has been saved."];
          return redirect('/app/company');
        }else{
          return ["result" => "Operation Failed!"];
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('app/company');
    }
}
