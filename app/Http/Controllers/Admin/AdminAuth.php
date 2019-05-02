<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
class AdminAuth extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }
    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true: false;
        if(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')],
        $rememberme))
        {
            return redirect('admin');
        }else{
            session()->flash('error', trans('incorrect_login_information'));
            return redirect('admin/login');
        }
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }
    public function forgot_password(){
        return redirect('forgot_password');
    }
}
