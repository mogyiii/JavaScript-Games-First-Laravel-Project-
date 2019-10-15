<?php

namespace Gameusers\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class check_regist_ajax extends Controller
{
    public Function showEmail(Request $request){
        $email = $request->input('email');
        if(!empty($email)){
            if(DB::table('users')->where('Email', $email)->exists()){
                return "true";
            }else{
                return "false";
            }
        }else{
            return "false";
        }
    }
    public Function showUsername(Request $request){
        $username = $request->input('username');
        if(!empty($username)){
            if(DB::table('users')->where('Username', $username)->exists()){
                return "true";
            }else{
                return "false";
            }
        }else{
            return "false";
        }
    }
}
