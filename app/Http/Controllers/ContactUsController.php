<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Validator;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function getContactUsView(){
        return view('auth.contactus');
    }

    public function saveFeedback(Request $request){
        $data = $request->all();

        $rules = [
            "name" => "required|max:60|min:3",
            "phone" => "required|max:25",
            "email" => "required|email|max:125",
            "feedback" => "required|max:1000"
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            return redirect('/contact-us')
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }


        $element = new Feedback();
        $element->name = $data['name'];
        $element->phone = $data['phone'];
        $element->email = $data['email'];
        $element->feedback = $data['feedback'];
        $element->save();
        return redirect('/contact-us');

    }
}
