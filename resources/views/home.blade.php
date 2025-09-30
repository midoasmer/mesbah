@extends('layouts.app')

@section('title', 'الرئيسية')

@php
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="hero-section bg-primary text-white py-5 mb-5">
    <div class="container text-center">
        <h1 class="display-4">مرحباً بك في متجرنا الإلكتروني</h1>
        <p class="lead">اكتشف أفضل المنتجات بأسعار منافسة</p>
    </div>
</div>

<!-- فلتر الفئات -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-filter"></i> فلتر المنتجات حسب الفئة
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary filter-btn {{ !request('category') ? 'active' : '' }} w-100">
                            <i class="fas fa-th-large"></i> جميع المنتجات
                            <span class="badge bg-secondary ms-1">{{ Product::where('is_active', true)->count() }}</span>
                        </a>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('home', ['category' => $category->id]) }}" 
                               class="btn btn-outline-primary filter-btn {{ request('category') == $category->id ? 'active' : '' }} w-100">
                                <i class="fas fa-tag"></i> {{ $category->name }}
                                <span class="badge bg-secondary ms-1">{{ $category->products->where('is_active', true)->count() }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <!-- إحصائيات سريعة -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            @if(request('category'))
                                عرض {{ $products->count() }} منتج من فئة "{{ $categories->where('id', request('category'))->first()->name ?? 'غير موجودة' }}"
                            @else
                                عرض {{ $products->count() }} منتج من إجمالي {{ Product::where('is_active', true)->count() }} منتج
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- زر العودة لجميع المنتجات -->
                @if(request('category'))
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> العودة لجميع المنتجات
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- عرض المنتجات -->
<div class="row">
    <div class="col-12">
        <h2 class="text-center mb-4">
            @if(request('category'))
                <i class="fas fa-tag"></i> منتجات فئة: {{ $categories->where('id', request('category'))->first()->name ?? 'غير موجودة' }}
            @else
                <i class="fas fa-th-large"></i> جميع المنتجات
            @endif
        </h2>
    </div>
    
    @if($products->count() > 0)
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                @if($product->image)
                    <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                    @else
                        <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-tag"></i> {{ $product->category->name }}
                        </p>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text">
                            <strong class="text-success">{{ number_format($product->price, 2) }} جنيه</strong>
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('product', $product) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> عرض التفاصيل
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        <!-- Pagination -->
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
        
        <!-- إحصائيات إضافية -->
        <div class="col-12 mt-4">
            <div class="card bg-light">
                <div class="card-body text-center">
                    <h6 class="card-title">
                        <i class="fas fa-chart-bar"></i> إحصائيات المنتجات
                    </h6>
                    <p class="card-text">
                        @if(request('category'))
                            عرض {{ $products->count() }} منتج من فئة "{{ $categories->where('id', request('category'))->first()->name ?? 'غير موجودة' }}"
                        @else
                            عرض {{ $products->count() }} منتج من إجمالي {{ Product::where('is_active', true)->count() }} منتج
                        @endif
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> 
                @if(request('category'))
                    لا توجد منتجات في هذه الفئة حالياً
                @else
                    لا توجد منتجات متاحة حالياً
                @endif
            </div>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // إضافة تأثير loading عند النقر على الفلتر
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // إضافة تأثير loading
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التحميل...';
            this.disabled = true;
            
            // إزالة التأثير بعد ثانيتين
            setTimeout(() => {
                this.innerHTML = originalText;
                this.disabled = false;
            }, 2000);
        });
    });
});
</script>
@endsection
