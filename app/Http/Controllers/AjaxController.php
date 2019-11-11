<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Participaint;

class AjaxController extends Controller
{

    public function index(Request $request)
    {
        return view('forms.index');
    }

    public function getSecondForm()
    {
        return view('forms.form2');
    }

    public function ajaxRequest()
    {
        return view('message');
    }

    public function ajaxRequestPost()
    {
        $input = request()->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function store(Request $request)
    {
        $result = [
            'code' => 0,
            'detail' => ''
        ];

        $this->validate($request, [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'birthday' => 'required|min:2',
            'reportSubject' => 'required|min:2',
            'country' => 'required|min:2',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:participaints',
        ]);

        $participaint = new Participaint;
        $participaint->firstname = $request->firstname;
        $participaint->lastname = $request->lastname;
        $participaint->birthday = $request->birthday;
        $participaint->reportSubject = $request->reportSubject;
        $participaint->country = $request->country;
        $participaint->phone = $request->phone;
        $participaint->email = $request->email;
        $participaint->save();

        $msg = "save success";
        return response()->json(array('msg'=> $msg), 200);
    }


}