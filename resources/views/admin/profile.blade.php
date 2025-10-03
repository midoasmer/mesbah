@extends('layouts.admin')

@section('title', 'إدارة الملف الشخصي')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إدارة الملف الشخصي</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Email Update Section -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>تغيير البريد الإلكتروني</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.profile.update-email') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">البريد الإلكتروني الجديد</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">تحديث البريد الإلكتروني</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Password Update Section -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>تغيير كلمة المرور</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.profile.update-password') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                                   id="current_password" name="current_password" required>
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                                   id="password" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">تأكيد كلمة المرور الجديدة</label>
                                            <input type="password" class="form-control" 
                                                   id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                        <button type="submit" class="btn btn-warning">تحديث كلمة المرور</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
