<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    
        public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        // 1. Kiểm tra User đã đăng nhập VÀ Role có phải là 1 không
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request); // Admin: Cho phép tiếp tục truy cập
        }
        
        // 2. Không phải Admin: Đăng xuất (tăng cường bảo mật) và chuyển hướng
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        // Chuyển hướng về trang đăng nhập hoặc trang chủ với thông báo lỗi
       
   
         return redirect()->route('home')->with('error', 'Bạn không có quyền Admin.');
    }
    }

