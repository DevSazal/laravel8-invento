<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; // validator class for rules
// add model
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function registerPage(){
      return view('auth.register');
    }

    public function registerUser(Request $request){
      // code...  User Data Validation
      Validator::extend('valid_username', function($attr, $value){
        return preg_match('/^\S*$/u', $value);
      });
      $validator = Validator::make($request->all(), [
          'name' => 'required|string|min:3|max:50',
          'username' => 'required|valid_username|min:4|max:25|unique:users,username',
          'email' => 'required|string|email|max:255|unique:users,email',
          'date_of_birth' => 'required|max:80',
          'password' => 'required|string|max:80',
          'image' => 'required|mimes:jpg,jpeg,gif,png'
      ],
      ['valid_username' => 'please enter valid username without white space.']);

      //

      if ($validator->fails()) {
          // return back()->withErrors($validator)
		      //               ->withInput();
          return dd($validator->errors());
      }else {
        // ... rename image
        $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').'_'.rand(1,999).'.'.$ext;
                $file_path = $request->image->storeAs('UserPhoto',$file);
        // ... save user data
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->password = Hash::make($request->password);
        $user->profile_photo_path = $file_path;
        $result = $user->save();

          if($result){
            // return ["result" => "Data has been saved."];
            return redirect('/login');
          }else{
            return ["result" => "Operation Failed!"];
          }
      }
    }

    // login function
    public function loginPage(){
      return view('auth.login');
    }

    public function loginUser(Request $request){
      // code...  User Data Validation
      $user= User::where('username', $request->login)
                  ->orWhere('email', $request->login)
                  ->first();
      // print_r($user);

          if (!$user || !Hash::check($request->password, $user->password)) {
              return response([
                  'message' => ['These credentials do not match our records.']
              ], 404);
          }else{
            $request->session()->put('user', $user);
            return redirect('/app');
          }

    }



}
