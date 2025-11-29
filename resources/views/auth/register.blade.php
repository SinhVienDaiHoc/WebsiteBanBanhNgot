@extends('layouts.app')
@section('content')
<h1 class="mb-4">Register</h1>
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
{{-- form đăng kí  --}}
@endif
<div class="row container">
    <div class="col-8 container">
<form action="{{ route('postRegister') }}" method="POST" novalidate >
    @csrf 
    {{-- start username --}}
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" required value="{{ old('name') }}" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email" required value="{{ old('email') }}" class="form-control">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" required class="form-control" >
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Re-Password</label>
        <input type="password" name="password_confirmation" required class="form-control">
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Register</button>
</form>
</div>
<div class="container col-4">
    <h2>Beside the form</h2>
</div>
</div>
@endsection