<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SampahController extends Controller
{
    public function show(){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $sampah = $user->sampah;

        $title = "sampah";

        return view('user.sampah', compact('sampah', 'title'));
    }
}
