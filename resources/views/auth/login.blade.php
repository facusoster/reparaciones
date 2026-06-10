@extends('layouts.layout')

@section('title', 'Iniciar Sesión - TechRepair')

@section('content')
    <div class="login-page">
        <div class="login-card">
            <div class="login-header">
                <div>
                    <h1>Bienvenido a TechRepair</h1>
                    <p>Ingresa con tus credenciales para acceder al sistema.</p>
                </div>
                <div class="login-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
            </div>

            <form action="{{ route('login.submit') }}" method="POST" novalidate>
                @csrf

                @if($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="admin@techrepair.test" required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="secret123" required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-create btn-login">Acceder</button>

                <p class="login-note">Usuario de prueba: <strong>admin@techrepair.test</strong> / Contraseña: <strong>secret123</strong></p>
            </form>
        </div>
    </div>
@endsection
