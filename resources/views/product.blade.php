@extends('layouts.app')

@section('title', $product->name)

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjhmOWZhIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzk5OTk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPuS4u+iDveaaguaXoDwvdGV4dD48L3N2Zz4='">
        @else
            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                <i class="fas fa-image fa-5x text-muted"></i>
            </div>
        @endif
    </div>
    
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->category->name }}</p>
        <h3 class="text-primary">{{ number_format($product->price, 2) }} جنيه</h3>
        
        <div class="mb-4">
            <h5>الوصف</h5>
            <p>{{ $product->description }}</p>
        </div>
        
        <div class="d-grid">
            <a href="{{ route('order.create', $product) }}" class="btn btn-success btn-lg">
                <i class="fas fa-shopping-cart"></i> طلب المنتج
            </a>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h3>منتجات مشابهة</h3>
        <div class="row">
            @foreach($product->category->products->where('id', '!=', $product->id)->take(3) as $relatedProduct)
                <div class="col-md-4">
                    <div class="card">
                        @if($relatedProduct->image)
                            <img src="{{ asset('storage/' . $relatedProduct->image) }}" class="card-img-top product-image" alt="{{ $relatedProduct->name }}">
                        @else
                            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                            <p class="card-text">{{ number_format($relatedProduct->price, 2) }} جنيه</p>
                            <a href="{{ route('product', $relatedProduct) }}" class="btn btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
