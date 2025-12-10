@extends('layouts.app')
@section('content')

<div class="container">
<form method="POST" action="{{ url('/profile') }}">
    @csrf
    @method('PUT') {{-- Sử dụng phương thức PUT để cập nhật --}}

    <div>
        <label for="full_name">Họ và Tên đầy đủ</label>
        <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $user->profile->full_name ?? '') }}" required>
    </div>

    <div>
        <label for="phone_number">Số điện thoại</label>
        <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number', $user->profile->phone_number ?? '') }}">
    </div>

    <div>
        <label for="date_of_birth">Ngày sinh</label>
        <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->profile->date_of_birth ?? '') }}">
    </div>

    <button type="submit">Cập nhật thông tin</button>
</form>

</div>
@endsection