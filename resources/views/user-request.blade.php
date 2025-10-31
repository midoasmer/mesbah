@extends('layouts.app')

@section('title', 'طلب خدمة أو منتج جديد')

@section('content')
    <header class="page-header" id="site-header">
        <div class="breadcrumbs" id="breadcrumbs-placeholder">
            <a href="{{ url('/') }}">Home</a> >
            <span class="current">Order anything</span>
        </div>
    </header>

    <div class="order-page">
        <div class="order-content">
            <h1>اطلب أي شيء تريده</h1>
            <p>أخبرنا بما تبحث عنه وسنساعدك في إيجاده.</p>

            <form class="order-form general-form" action="{{ route('user-request.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="customer_name">الاسم الكامل *</label>
                        <input
                            type="text"
                            id="customer_name"
                            name="customer_name"
                            value="{{ old('customer_name') }}"
                            required
                            class="@error('customer_name') is-invalid @enderror"
                        />
                        @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="customer_email">البريد الإلكتروني *</label>
                        <input
                            type="email"
                            id="customer_email"
                            name="customer_email"
                            value="{{ old('customer_email') }}"
                            required
                            class="@error('customer_email') is-invalid @enderror"
                        />
                        @error('customer_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="customer_whatsapp">رقم الواتساب *</label>
                    <div class="phone-input">
                        <!-- <spa                        <span class="flag">🇦🇪</span>
n class="country-code">(UAE) +971</span> -->
                        <input
                            type="text"
                            id="customer_whatsapp"
                            name="customer_whatsapp"
                            value="{{ old('customer_whatsapp') }}"
                            placeholder="XX-XXXX-XXXX"
                            required
                            class="@error('customer_whatsapp') is-invalid @enderror"
                        />
                    </div>
                    @error('customer_whatsapp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="request_type">نوع الطلب *</label>
                        <select id="request_type" name="request_type" required class="@error('request_type') is-invalid @enderror">
                            <option value="">اختر نوع الطلب</option>
                            <option value="category" {{ old('request_type') == 'category' ? 'selected' : '' }}>طلب فئة خدمة جديدة</option>
                            <option value="product" {{ old('request_type') == 'product' ? 'selected' : '' }}>طلب منتج جديد</option>
                        </select>
                        @error('request_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">عنوان الطلب *</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="مثال: طلب إضافة فئة خدمات التصميم"
                            required
                            class="@error('title') is-invalid @enderror"
                        />
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">وصف الطلب *</label>
                    <textarea id="description" name="description" rows="4" cols="4" required class="@error('description') is-invalid @enderror" placeholder="اشرح بالتفصيل ما تريد إضافته...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="next-btn">
                    <i class="fas fa-paper-plane"></i> إرسال الطلب
                </button>
            </form>
        </div>
    </div>
@endsection
