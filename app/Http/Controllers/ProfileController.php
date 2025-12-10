<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'date_of_birth' => 'nullable|date',
    ]);
    $user = $request->user();
    $user->profile()->updateOrCreate(
            ['user_id' => $user->id], // Điều kiện tìm kiếm (chỉ tìm bản ghi có user_id này)
            $validated);
            return redirect()->route('profile.edit')->with('success', 'Thông tin cá nhân đã được cập nhật.');
   }

}
