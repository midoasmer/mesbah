@extends('layouts.app')

@section('title', 'Success')

@section('content')
    <header class="page-header" id="site-header">
        <div class="breadcrumbs" id="breadcrumbs-placeholder"></div>
    </header>

    <main class="confirm-wrap">
        <div class="confirm-illustration">
            <img src="{{ asset('images/box.png') }}" alt="Box" />
            <svg
                width="122"
                height="122"
                viewBox="0 0 122 122"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M42.705 61.0583L55.705 74.0583L79.705 50.0583"
                    stroke="#2DB324"
                    stroke-width="5.55072"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M61.0581 106.852C86.3492 106.852 106.852 86.3492 106.852 61.0581C106.852 35.7671 86.3492 15.2646 61.0581 15.2646C35.7671 15.2646 15.2646 35.7671 15.2646 61.0581C15.2646 86.3492 35.7671 106.852 61.0581 106.852Z"
                    stroke="#2DB324"
                    stroke-width="5.55072"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
        <h1>{{ $title }}</h1>
        <p>
            {{ $body }}
        </p>
        <a href="{{ route('home') }}" class="go-home">Go to Home</a>
    </main>
@endsection


