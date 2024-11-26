@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <style>
        .welcome-logo {
            width: 250px;
            height: 400px;
            margin: 0 auto;
            display: block;
        }

        .welcome-message {
            font-size: 2rem;
            font-weight: bold;
            margin-top: ;
        }

        .welcome-description {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }
    </style>
@endpush

@section('main')
    <div class="main-content d-flex justify-content-center align-items-center" style="min-height: 100vh; text-align: center;">
        <div>
            <!-- Logo -->
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="welcome-logo">

            <!-- Welcome Message -->
            <h1 class="welcome-message">Welcome to our web service</h1>
            <p class="welcome-description">We are delighted to have you here. Explore the features and enjoy the services we offer.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Add custom JavaScript if needed -->
@endpush
