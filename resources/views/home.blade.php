@extends('layouts.app')

@section('title', 'Mesbah - One Place For Everything')

@php
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<!-- Hero Section -->
<header class="hero-section">
    <div class="hero-content">
        <div class="logo">
            <svg width="244" height="47" viewBox="0 0 244 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="244" height="47" fill="url(#pattern0_210_1109)" />
            </svg>
        </div>
        <button onclick="window.location.href='{{ route('user-request.create') }}'">
            <svg width="556" height="302" viewBox="0 0 556 302" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="347.724" y="170.338" width="208.276" height="131.264" fill="url(#pattern0_210_1137)" />
                <path d="M351.825 206.565C351.825 208.355 351.729 210.597 351.666 211.905C351.476 215.791 352.357 204.813 353.32 202.64C354.313 200.401 359.804 197.965 367.845 194.438C371.518 192.826 375.431 192.246 379.734 191.195C382.646 190.483 387.212 190.317 391.13 189.774C392.314 189.61 391.907 190.378 391.202 190.892C390.496 191.407 389.514 191.825 389.323 192.166C388.115 194.326 395.179 192.787 397.324 191.872C399.866 190.788 408.677 188.852 414.344 187.267C418.511 186.102 423.428 182.666 427.44 179.98C431.043 177.567 432.331 175.877 432.827 174.714C433.063 174.161 432.827 173.543 432.495 173.14C431.077 171.42 427.944 171.917 414.57 171.442C406.1 171.14 394.832 173.772 391.019 176.869C388.74 178.72 386.082 180.153 383.837 181.524C380.501 183.563 374.947 184.232 370.909 185.404C367.48 186.399 363.354 188.196 360.589 189.41C357.316 190.847 355.316 192.577 353.59 195.41C352.366 197.42 351.629 200.527 351.085 202.86C350.725 204.401 354.878 199.242 359.321 196.662C362.981 194.537 366.16 194.08 366.492 193.613C367.1 192.758 360.184 193.837 354.06 194.831C351.452 195.255 362.124 192.736 364.722 192.159C366.558 191.751 360.253 194.131 357.986 195.351C355.697 196.582 354.995 199.391 353.478 201.532C352.094 203.486 351.242 205.27 350.431 205.847C348.795 207.01 351.802 200.78 354.398 197.896C359.183 192.58 370.652 192.79 376.681 191.527C380.972 190.628 384.17 190.166 387.414 189.47C388.915 189.148 390.952 188.704 392.457 188.001C394.92 186.851 383.407 187.987 373.515 190.145C371.643 190.553 370.921 190.86 370.254 191.036C369.587 191.211 369.012 191.306 370.057 190.674C373.675 188.486 380.178 186.205 384.659 184.623C391.924 182.059 365.299 190.119 361.285 191.456C360.748 191.635 368.312 190.77 378.439 188.468C389.037 186.06 394.214 185.543 395.057 186.272C396.743 187.73 392.881 191.391 391.684 193.167C389.441 196.495 405.097 187.385 409.383 184.907C411.057 183.939 397.991 187.739 385.594 192.565C380.697 194.472 379.51 194.753 378.905 195.295C376.371 197.563 394.749 192.896 401.868 191.148C410.692 188.982 414.245 186.587 418.052 184.68C418.806 184.302 419.315 183.815 419.762 183.344C420.21 182.872 420.543 182.364 420.287 181.87C420.031 181.376 419.175 180.91 418.088 180.824C413.057 180.422 408.688 184.345 405.858 185.755C405.248 186.059 412.658 183.672 422.669 178.802C428.029 176.195 430.117 174.301 431.044 173.222C433.499 170.362 420.009 177.101 417.117 179.347C415.547 180.566 424.928 179.673 427.499 179.813C430.07 179.952 429.176 180.289 427.267 181.137C418.875 184.864 415.403 185.562 411.886 185.185C404.221 184.362 424.801 172.137 425.503 170.799C425.776 170.277 423.539 170.156 417.56 171.061C411.582 171.967 401.332 173.924 394.382 175.455C387.431 176.986 384.091 178.032 384.116 177.962C385.364 174.433 397.868 174.031 407.203 171.84C409.939 171.197 408.443 170.867 405.651 170.779C402.859 170.69 398.772 170.69 397.863 170.69C393.209 170.69 410.194 169.258 416.596 168.309C419.177 167.926 421.185 168.384 422.098 168.993C423.264 169.77 422.921 171.842 422.527 173.526C422.291 174.535 421.177 175.58 420.215 176.345C419.254 177.11 418.273 177.491 412.54 178.5C406.807 179.508 396.351 181.133 391.423 181.677C386.495 182.221 387.411 181.636 390.123 180.334C402.335 174.471 404.807 173.307 408.26 173.147C409.062 173.109 409.675 173.45 409.672 173.923C409.65 178.228 392.461 181.277 384.558 184.053C382.445 184.796 401.717 181.648 409.772 180.232C417.826 178.816 418.561 178.579 419.165 178.218C419.77 177.857 420.221 177.381 419.978 177.045C415.145 170.363 398.507 185.325 398.817 184.391C401.731 175.628 414.004 174.904 415.629 173.331C419.133 169.939 402.489 179.208 401.487 179.122C400.231 179.014 406.435 175.971 407.958 174.958C408.609 174.525 401.587 178.849 393.156 185.329C390.325 187.504 391.096 188.219 393.268 188.441C399.132 189.041 406.554 187.951 411.239 187.323C411.637 187.27 408.002 188.127 405.931 188.105C405.161 188.097 406.604 186.157 406.95 185.125C407.432 183.69 398.117 186.064 388.513 188.019C385.044 188.725 384.395 188.683 387.599 187.392C390.804 186.101 397.871 183.519 399.679 183.366C408.846 182.589 388.03 190.68 387.535 190.32C383.904 187.673 396.057 184.762 402.14 182.226C402.889 181.913 402.504 183.937 402.562 184.538C402.82 187.183 408.29 181.151 408.661 180.696C409.337 179.866 406.065 181.15 405.53 181.25C401.508 182 418.47 173.161 427.061 169.426C429.903 168.191 418.382 173.412 417.255 173.714C416.703 173.861 420.361 172.176 421.236 171.461C422.112 170.746 421.16 170.586 419.933 170.503C418.706 170.421 417.234 170.421 416.6 170.421" stroke="white" stroke-width="2" stroke-linecap="round" />
                <rect width="517.454" height="206.552" fill="url(#pattern1_210_1137)" />
            </svg>
        </button>
    </div>
</header>

<!-- Main Content Container -->
<div class="main-container">
    <div class="section-header">
        <h2>Top Categories</h2>
    </div>
    
    <!-- Left Ad -->
    <div class="left-ad">
        <div class="ad-content">
            <div class="ad-image building-ad">
                <div class="cola-size">
                    <div class="ad-text">
                        <!-- <h3>Ana Kursova</h3>
                        <p>Masterclass in Design Thinking, Innovation & Creativity</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Center Content -->
    <div class="center-content">
        <section class="top-categories">
            <div class="categories-grid">
                @foreach($categories as $index => $category)
                    <div class="category-card" onclick="window.location.href='{{ route('home', ['category' => $category->id]) }}'">
                        <div class="category-badge">{{ $category->products->where('is_active', true)->count() }} Available</div>
                        <div class="category-image" style="background-image: url('{{ $category->photo ? asset('uploads/categories/' . $category->photo) : asset('images/' . $categoryImages[$index % count($categoryImages)]) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                        <div class="category-overlay">
                            <h3>{{ $category->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Most Popular Products Section -->
        <section class="similar-section">
            <h2>Similar Products</h2>
            <div class="products-grid">
                @if($products->count() > 0)
                    @foreach($products as $index => $product)
                        <div class="product-card">
                            <!-- @if($index % 3 == 0)
                                <div class="product-badge discount">32% OFF</div>
                            @elseif($index % 3 == 1)
                                <div class="product-badge hot">HOT</div>
                            @elseif($index % 3 == 2)
                                <div class="product-badge sold-out">SOLD OUT</div>
                            @endif -->
                            
                            <div class="product-image" style="background-image: url('{{ $product->image ? asset('uploads/products/' . $product->image) : asset('images/p1.jpg') }}')"></div>
                            
                            <div class="card-info">
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-desc">{{ Str::limit($product->description, 100) }}</div>
                                <div class="product-actions">
                                    <button class="action-btn primary" onclick="window.location.href='{{ route('order.create', $product) }}'">
                                        Order This Product
                                        <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2787 0.196289C13.6885 2.24547 15.7377 6.63891 20.6557 7.81924C18.1967 8.80285 13.2787 11.6553 13.2787 15.1963" stroke="white" stroke-width="2"/>
                                            <path d="M0 8.06494L20.6557 8.06494" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </button>
                                    <button class="view-btn" onclick="window.location.href='{{ route('product', $product) }}'">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 4.25C4.5 4.25 1.5 12 1.5 12C1.5 12 4.5 19.75 12 19.75C19.5 19.75 22.5 12 22.5 12C22.5 12 19.5 4.25 12 4.25Z" stroke="#212121" stroke-width="1.50099" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#212121" stroke-width="1.50099" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        </section>
    </div>

    <!-- Right Ad -->
    <div class="right-ad">
        <div class="ad-content">
            <div class="ad-image cola-ad">
                <div class="cola-size">
                    <div class="ad-text">
                        <!-- <h3>Ana Kursova</h3>
                        <p>Masterclass in Design Thinking, Innovation & Creativity</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
