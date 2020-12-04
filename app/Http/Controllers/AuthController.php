<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\Console\Input\Input;
use Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLoginView (){

        if(Auth::check()){
            return redirect('/');
        }
        return view('auth.login');
    }

    public function doLogin(Request $request){
        $data = $request->all();
        //dd($data);
        $rules = ['username'=>'required|min:5|max:100',
                'password'=> 'required|min:5|max:125'];
        $validator = Validator::make($data, $rules);
        if ($validator -> fails()){
            return  redirect('/login')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }


        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])){
            return redirect('/home');
        }else{
            return redirect('/login')
                ->withInput($request->all())
                ->withErrors(['login' => 'Username or Password incorrect']);
        }
    }

    public function doLogout (){
        Auth::logout();
        return redirect('/login');
    }

    public function doRegistration(Request $request){
        $data = $request->all();
        //dd($data);
        $rules = [
            'first_name'=>'required|min:5|max:60',
            'last_name'=>'max:60',
            'email'=>'required|min:5|max:125|email|unique:users,email',
            'username'=>'required|min:5|max:100|unique:users,username',
            'password'=>'required|min:5|max:125',
            'gender'=>'',
            'bio'=>'max:1000',
            'phonenumber'=>'max:30',
            'address'=>'max:125'];


        $validator = Validator::make($data, $rules);
        if ($validator -> fails()){
            return  redirect('/register')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }


        $newUser = new User();
        $newUser->firstname = $data['first_name'];
        $newUser->lastname = $data['last_name'];
        $newUser->email = $data['email'];
        $newUser->username = $data['username'];
        $newUser->password = bcrypt($data['password']);
        $newUser->gender_id = $data['gender'];
        $newUser->bio = $data['bio'];
        $newUser->phone_number = $data['phonenumber'];
        $newUser->address = $data['address'];
        $newUser->save();

        return redirect('/login')->with(['success' => 'registered successfully']);



    }
    public function getRegisterView (){

        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.register');
    }
}
