@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <h1 class="display-4 mb-4 text-primary">
                <i class="fas fa-tools"></i> Yokoso<strong>
                    <p>Service Motor Laude</p>
                </strong>
            </h1>
            <p class="lead text-muted">
            <p>Kelola data pelanggan, kendaraan, service, dan pembayaran dengan <strong>Sat</strong></p>
            </p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-lg btn-outline-primary shadow-sm">
                <i class="fas fa-users-cog me-2"></i> Mulai Kelola Data
            </a>
        </div>
    </div>

    <style>
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
            transform: translateY(-3px);
            transition: all 0.3s ease;
        }

        .display-4 i {
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }
    </style>
@endsection
