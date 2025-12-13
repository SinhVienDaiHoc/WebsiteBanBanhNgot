@extends('layouts.app')

@section('title', 'Cập Nhật Hồ Sơ Khách Hàng')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-lg border-0 rounded-4" style="border-top: 5px solid #E9967A;">
                <div class="card-header bg-white text-center pt-4">
                    <h4 class="mb-0 fw-bold" style="color: #4A1F1B;">🍰 Hồ Sơ Khách Hàng</h4>
                    <p class="text-muted small">Cập nhật thông tin để việc đặt hàng thuận tiện hơn.</p>
                </div>
                <div class="card-body p-4">
                    
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT') 
                        
                        {{-- THÔNG BÁO --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif
                        
                        {{-- 1. Họ và Tên đầy đủ --}}
                        <div class="mb-3">
                            <label for="full_name" class="form-label fw-bold">Họ và Tên đầy đủ <span class="text-danger">*</span></label>
                            <input id="full_name" type="text" 
                                   name="full_name" 
                                   class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                                   value="{{ old('full_name', $user->profile->full_name ?? '') }}" 
                                   required 
                                   style="border-color: #E9967A;">
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            {{-- 2. Số điện thoại --}}
                            <div class="col-md-6 mb-3">
                                <label for="phone_number" class="form-label fw-bold">Số điện thoại</label>
                                <input id="phone_number" type="text" 
                                       name="phone_number" 
                                       class="form-control @error('phone_number') is-invalid @enderror"
                                       value="{{ old('phone_number', $user->profile->phone_number ?? '') }}"
                                       placeholder="VD: 090xxxxxxx" style="border-color: #E9967A;">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- 3. Ngày sinh --}}
                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth" class="form-label fw-bold">Ngày sinh</label>
                                <input id="date_of_birth" type="date" 
                                       name="date_of_birth" 
                                       class="form-control @error('date_of_birth') is-invalid @enderror"
                                       value="{{ old('date_of_birth', $user->profile->date_of_birth ?? '') }}"
                                       style="border-color: #E9967A;">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- 4. GIỚI TÍNH (Radio Button) --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Giới tính</label>
                            @php $gender = old('gender', $user->profile->gender ?? ''); @endphp
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" 
                                       value="male" {{ $gender == 'male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" 
                                       value="female" {{ $gender == 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Nữ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderOther" 
                                       value="other" {{ $gender == 'other' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderOther">Khác</label>
                            </div>
                            @error('gender')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 5. ĐỊA CHỈ GIAO HÀNG --}}
                        <div class="mb-4">
                            <label for="address" class="form-label fw-bold">Địa chỉ giao hàng mặc định</label>
                            <textarea id="address" name="address" rows="3"
                                      class="form-control @error('address') is-invalid @enderror"
                                      placeholder="Số nhà, Tên đường, Phường/Xã, Quận/Huyện, Tỉnh/Thành phố"
                                      style="border-color: #E9967A;">{{ old('address', $user->profile->address ?? '') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Nút Lưu --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg fw-bold text-white" 
                                    style="background-color: #E9967A; border-color: #E9967A;">
                                Lưu lại thông tin
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection