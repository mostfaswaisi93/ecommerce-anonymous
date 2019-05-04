<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

class AdminAuth extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }
    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (admin()->attempt(
            ['email' => request('email'), 'password' => request('password')],
            $rememberme
        )) {
            return redirect('admin');
        } else {
            session()->flash('error', trans('incorrect_login_information'));
            return redirect(aurl('login'));
        }
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(aurl('login'));
    }
    public function forgot_password()
    {
        return view('admin.forgot_password');
    }
    public function forgot_password_post()
    {
        $admin = Admin::where('email', request('email'))->first();
        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['admin' => $admin, 'token' => $token]));
            session()->flash('success', trans('admin.the_link_reset_sent'));
            return back();
        }
        return back();
    }
    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('admin.reset_password', ['data', $check_token]);
        } else {
            return redirect(aurl('forgot/password'));
        }
    }
}
