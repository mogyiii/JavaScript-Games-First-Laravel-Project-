<?php

namespace Gameusers\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class regist extends Controller
{
    public Function show(Request $request){
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $re_password = $request->input('re_password');
        if(!empty($username) && !empty(filter_var($email, FILTER_VALIDATE_EMAIL)) && (!empty($password) == !empty($re_password))){
            if(!(DB::table('users')->where('Email', $email)->exists())){
                DB::table('users')->insert([
                    ['Username' => $username, 'Email' => $email, 'Password' => md5($password), 'created_at' => date('Y-m-d H:i:s')]
                ]);
                return 'Registration success!';
            }else{
                return 'Email is already taken!';
            }
        }else{
            return 'Input not valid!';
        }
    }
}
