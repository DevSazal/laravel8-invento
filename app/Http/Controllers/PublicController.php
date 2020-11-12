<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; // validator class for rules

use App\Models\Company;

class PublicController extends Controller
{
    //
    public function index(){
      $array['companies'] = Company::paginate(8);
      return view('index')->with($array);
    }
    public function findCompany(Request $request){
      // Search Company ...
      $array['companies'] = Company::where('name', 'LIKE', '%'.$request->key.'%')->paginate(8);
      //return $array['companies'];
      return view('index')->with($array);
    }
    public function companyProfile($id)
    {
      // Display Profile page of company
        $array['company'] = Company::find($id);
        return view('company-profile')->with($array);
    }
}
