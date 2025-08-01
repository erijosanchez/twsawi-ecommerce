@extends('admin.layouts.authlayout')

@section('title', 'Login - Admin Panel')

@section('content')
    <div class="px-4 px-sm-5 text-left auth-form-light">
        <div class="text-center brand-logo">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
        </div>
        <h4>Bienvenido</h4>
        <h6 class="fw-light">Sistema de administración</h6>

        {{-- Mostrar mensajes de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Mostrar mensajes de error --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form class="pt-3" action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                    id="email" name="email" required value="{{ old('email') }}" placeholder="Email Address">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                    id="password" name="password" require placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn-block font-weight-medium btn btn-primary btn-lg auth-form-btn" id="loginBtn">
                    SIGN IN
                </button>

            </div>
        </form>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const btnText = loginBtn.querySelector('.btn-text');
            const spinner = loginBtn.querySelector('.spinner-border');

            form.addEventListener('submit', function() {
                // Deshabilitar el botón para evitar doble envío
                loginBtn.disabled = true;
                btnText.textContent = 'INICIANDO...';
                spinner.classList.remove('d-none');
            });

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
@endsection
