<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){

        return view('backend.admin.dashboard');
    }

    public function login()
    {
        return view('backend.admin.login');
    }

    public function postLogin(Request $request) //  public function authenticate(Request $request)
    {
        // validate form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // $credentials['is_active'] = 1; // trạng thái kích hoạt = 1
        //dd($request->remember_token);
        //print_r($request->all());die();

        if (Auth::attempt($credentials)) { // hàm attempt có chức năng tương đương với câu lệnh  SELECT * FROM users WHERE email = ? AND password = ?
            $user = Auth::user(); // lưu tk vừa mới đăng nhập vào $user

            if (!$user->is_active) {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được kích hoạt.',
                ]);
            }

            Auth::login($user, $request->remember_token);

            $request->session()->regenerate();

//            print_r(1111111);
//            die();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        // thực chất của chức năng logout là chúng ta thực hiện các câu lệnh clear session và cache trên trình duyệt.
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
