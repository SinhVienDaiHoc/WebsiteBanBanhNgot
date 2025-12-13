<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
   public function edit(Request $request){
    $user=$request->user()->load('profile');
    return view('auth.profile_in4',compact('user'));

   }
   public function update(Request $request){
    $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'gender'        => ['nullable', Rule::in(['male', 'female', 'other'])],
            'address'       => 'nullable|string|max:500',
    ]);
    $user = $request->user();
    $user->profile()->updateOrCreate(
            ['user_id' => $user->id], // Điều kiện tìm kiếm (chỉ tìm bản ghi có user_id này)
            $validated);
            return redirect()->back()->with('success', 'Thông tin cá nhân đã được cập nhật thành công!');
   }
   

}
