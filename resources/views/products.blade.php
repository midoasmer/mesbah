@extends('layouts.app')

@section('title', 'المنتجات')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>المنتجات</h1>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>فلترة حسب الفئة</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('products') }}" class="d-block mb-2 {{ !request('category') ? 'text-primary fw-bold' : '' }}">
                    جميع المنتجات
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('products', ['category' => $category->id]) }}" 
                       class="d-block mb-2 {{ request('category') == $category->id ? 'text-primary fw-bold' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="col-md-9">
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjhmOWZhIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OTk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPuS4u+iDveaaguaXoDwvdGV4dD48L3N2Zz4='">
                        @else
                            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>{{ number_format($product->price, 2) }} جنيه</strong></p>
                            <a href="{{ route('product', $product) }}" class="btn btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> لا توجد منتجات متاحة حالياً
                    </div>
                </div>
            @endforelse
        </div>
        
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
