<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;

class ApiController extends Controller
{
    public function getCompanyListAPI($id = NULL)
    {
      // full list... http://localhost:8000/api/get-company/
      // single list with id... http://localhost:8000/api/get-company/2
      $result = $id ? Company::find($id) : Company::all();
      return response()->json($result);
    }
}
