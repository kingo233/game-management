<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:users'
        ])
    }
}
