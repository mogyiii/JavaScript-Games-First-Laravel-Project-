<?php

namespace Gameusers\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class logi extends Controller
{
    public Function show(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if(DB::table('users')->where(['Email' => $email, 'Password' => md5($password)])->exists()){
            $data = DB::table('users')->select('id')->where(['Email' => $email, 'Password' => md5($password)])->first();
            session(['UsersID' => $data->id]);
            return "true";
        }
        return "false";
    }
}
