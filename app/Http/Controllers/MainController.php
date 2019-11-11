<?php

namespace App\Http\Controllers;

use App\Participaint;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }

    public function formIndex(Request $request)
    {
        return view('main.formIndex');
    }

    public function formAdditional(Request $request)
    {
        return view('main.formIndex');
    }

    public function formShare(Request $request)
    {
        return view('main.formIndex');
    }

    public function members(Request $request)
    {
        $participaints = Participaint::orderBy('id', 'asc')->get();

        return view('members', [
            'participaints' => $participaints,
        ]);
    }
}
