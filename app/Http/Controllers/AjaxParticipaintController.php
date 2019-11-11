<?php

namespace App\Http\Controllers;
use App\Participaint;
use Illuminate\Http\Request;


class AjaxParticipaintController extends Controller
{
    public function index(){
        return response()->json(array('view'=> view('ajaxforms.index')->render()), 200);
    }

    public function additional(Request $request)
    {
        $email = $request->session()->get('email');
        return response()->json(array('view'=> view('ajaxforms.additional',['email' => $email])->render()), 200);
    }

    public function share(Request $request)
    {
        $participaintsNum = count(Participaint::where('hide', false)->get());

        return response()->json(array('view'=> view('ajaxforms.share')->render(), 'num' => $participaintsNum), 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' =>
                [
                    'required',
                    'regex:/^\D+$/',
                    'min:2',
                ],
            'lastname' =>
                [
                    'required',
                    'regex:/^\D+$/',
                    'min:2',
                ],
            'birthday' => 'required',
            'reportSubject' => 'required|min:2',
            'country' => 'required',
            'phone' => 'required|min:11',
            'email' =>
                [
                    'required',
                    'regex:/^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i',
                    'unique:participaints',
                ]
        ]);

        Participaint::create($request->all());

        $request->session()->put('email', $request->email);

        return response()->json(array('code'=> 0), 200);
    }

    public function checkSessionEmail(Request $request)
    {
        if ($request->session()->get('email')) {
            $code = 0;
            $email = $request->session()->get('email');
        } else {
            $code = 1;
            $email = 'unknown email';
        }

        return  response()->json(array('code' => $code, 'email'=> $email), 200);
    }

    public function additSave(Request $request)
    {
         $request->validate([
            'photo' =>  'max:2036'
        ]);


        if ($request->photo == NULL) {
            $imagePath = 'photo.png';
        } else {
            $path = $request->photo->store('public');
            $imagePath = explode('/',$path);
            $imagePath = $imagePath[1];
        }

        Participaint::where('email', $request->email)
            ->update($request->except(['_token', 'photo']));

//        Participaint::where('email', $request->email)
//            ->update([
//                'company' => $request->company,
//                'position' => $request->position,
//                'aboutMe' => $request->aboutMe,
//                'photo' => $imagePath,
//            ]);

        Participaint::where('email', $request->email)
            ->update(['photo' => $imagePath]);

        return response()->json(array('code'=> 0), 200);
    }
}
