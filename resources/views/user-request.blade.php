@extends('layouts.app')

@section('title', 'طلب خدمة أو منتج جديد')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>طلب خدمة أو منتج جديد</h4>
                <p class="text-muted">يمكنك طلب إضافة فئة خدمة جديدة أو منتج غير موجود في القائمة</p>
            </div>
            <div class="card-body">
                <form action="{{ route('user-request.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customer_name" class="form-label">الاسم الكامل *</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                                   id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="customer_email" class="form-label">البريد الإلكتروني *</label>
                            <input type="email" class="form-control @error('customer_email') is-invalid @enderror" 
                                   id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required>
                            @error('customer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customer_whatsapp" class="form-label">رقم الواتساب *</label>
                            <input type="text" class="form-control @error('customer_whatsapp') is-invalid @enderror" 
                                   id="customer_whatsapp" name="customer_whatsapp" value="{{ old('customer_whatsapp') }}" required>
                            @error('customer_whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="request_type" class="form-label">نوع الطلب *</label>
                            <select class="form-control @error('request_type') is-invalid @enderror" 
                                    id="request_type" name="request_type" required>
                                <option value="">اختر نوع الطلب</option>
                                <option value="category" {{ old('request_type') == 'category' ? 'selected' : '' }}>طلب فئة خدمة جديدة</option>
                                <option value="product" {{ old('request_type') == 'product' ? 'selected' : '' }}>طلب منتج جديد</option>
                            </select>
                            @error('request_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان الطلب *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" 
                               placeholder="مثال: طلب إضافة فئة خدمات التصميم" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">وصف الطلب *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" 
                                  placeholder="اشرح بالتفصيل ما تريد إضافته..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-paper-plane"></i> إرسال الطلب
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
