<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator; // validator class for rules

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $array['categories'] = Category::paginate(8);
      return view('app.category.index')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.category.create');
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
          'name' => 'required|string|min:4|max:25|unique:categories,name'
      ]);

      if ($validator->fails()) {
          // return back()->withErrors($validator)
          //               ->withInput();
          return dd($validator->errors());
      }else {

        $cat = new Category;
        $cat->name = $request->name;
        $result = $cat->save();

          if($result){
            // return ["result" => "Data has been saved."];
            return redirect('/app/category');
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
      $array['category'] = Category::find($id);
      return view('app.category.edit')->with($array);
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
          'name' => 'required|string|min:4|max:25|unique:categories,name'
      ]);
      if ($validator->fails()) {
          // return back()->withErrors($validator)
          //               ->withInput();
          return dd($validator->errors());
      }else {

        $cat = Category::find($id);
        $cat->name = $request->name;
        $result = $cat->save();

          if($result){
            // return ["result" => "Data has been saved."];
            return redirect('/app/category');
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
      Category::destroy($id);
      return redirect('app/category');
    }
}
