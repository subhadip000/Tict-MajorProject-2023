<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $email = $request->user_email;
        $password = $request->password;
        $response = Http::get('http://127.0.0.1:80/api/login', [
            'email' => $email,
            'password' => $password
        ]);
        $res = json_decode($response);

        if (count($res) > 0) {
            session(['username' => $res[0]->user_name]);
            session(["email" => $res[0]->user_email]);
            return  redirect()->action([DeviceStateController::class, 'Index']);
        } else {
            return view('login')->with("message", "'Invalid Email or Passsword'");
        }
    }
    public function Logout(Request $request)
    {
        $request->session()->flush();
        return view('Login')->with("message", "");
    }
}
