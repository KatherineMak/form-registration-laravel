<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participaint;

class AdminRightController extends Controller
{
    public function changeStatus(Request $request)
    {
        $participaint = Participaint::where('email', $request->email)->first();

        if ($participaint->hide) {
            Participaint::where('email', $request->email)
                ->update([
                    'hide' => 0,
                ]);
        } else {
            Participaint::where('email', $request->email)
                ->update([
                    'hide' => 1,
                ]);
        }

        $participaints = Participaint::orderBy('id', 'asc')->get();
        return response()->json(array('view'=> view('admin.list', ['participaints' => $participaints])->render()), 200);

    }
}
