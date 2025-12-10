<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Hiển thị form đăng nhập admin
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Xử lý đăng nhập 
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Thêm điều kiện role = 1 
        $credentials['role'] = 1;   // <---set role = 1 cho tài khoản  trong DB

        //  nếu form có checkbox name="remember"
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Đăng nhập đúng -> 
            return redirect()->intended(route('admin.dashboard'));
        }

        // Sai tài khoản / mật khẩu / không phải admin
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập admin không chính xác.',
        ])->onlyInput('email');
    }

    // Đăng xuất admin 
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // route form đăng nhập admin
    }
}
