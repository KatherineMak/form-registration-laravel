<?php

namespace App\Http\Controllers;

use App\Participaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipaintController extends Controller
{
    public function index(Request $request)
    {
        return view('forms.index');
    }

    public function share(Request $request)
    {
        return view('forms.share');
    }


    public function members(Request $request)
    {
        $participaints = Participaint::orderBy('id', 'asc')->get();

        return view('forms.list', [
            'participaints' => $participaints,
        ]);
    }

    public function store(Request $request)
    {
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

        return view('forms.additional', [
            'email' => $participaint->email,
        ]);
    }

    public function additSave(Request $request)
    {
        $path = $request->photo->store('public');
        if ($path) {
            $imagePath = explode('/',$path);
            $imagePath = $imagePath[1];
        } else {
            $imagePath = 'photo.png';
        }

        Participaint::where('email', $request->email)
            ->update([
                'company' => $request->company,
                'position' => $request->position,
                'aboutMe' => $request->aboutMe,
                'photo' => $imagePath,
            ]);


        return view('forms.share');
    }

}
