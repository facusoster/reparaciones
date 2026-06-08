@extends('layouts.layout')

@section('title', 'Editar Reparación - Centro de Reparaciones')

@section('content')
    <div class="form-container">
        <!-- Form Header -->
        <div class="form-header">
            <i class="fas fa-edit"></i>
            <h1>Editar Reparación</h1>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <i class="fas fa-info-circle"></i>
            <strong>Modifica los datos</strong> según sea necesario. Todos los campos son obligatorios.
        </div>

        <!-- Form -->
        <form action="{{ route('reparaciones.update', $reparacion->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <!-- Sección: Información del Cliente -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-user-circle"></i>
                    Información del Cliente
                </div>

                <div class="form-group">
                    <label for="cliente" class="form-label">
                        <i class="fas fa-user"></i> Nombre del Cliente
                    </label>
                    <input type="text" class="form-control @error('cliente') is-invalid @enderror" 
                           id="cliente" name="cliente" placeholder="Ej: Juan Pérez" 
                           value="{{ old('cliente', $reparacion->cliente) }}" required>
                    @error('cliente')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Sección: Información del Dispositivo -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-mobile-alt"></i>
                    Información del Dispositivo
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marca" class="form-label">
                                <i class="fas fa-tag"></i> Marca
                            </label>
                            <select class="form-select @error('marca') is-invalid @enderror" 
                                    id="marca" name="marca" required>
                                <option value="" disabled>Selecciona una marca</option>
                                <option value="Apple" @selected(old('marca', $reparacion->marca) === 'Apple')>Apple</option>
                                <option value="Samsung" @selected(old('marca', $reparacion->marca) === 'Samsung')>Samsung</option>
                                <option value="Xiaomi" @selected(old('marca', $reparacion->marca) === 'Xiaomi')>Xiaomi</option>
                                <option value="Motorola" @selected(old('marca', $reparacion->marca) === 'Motorola')>Motorola</option>
                                <option value="Google Pixel" @selected(old('marca', $reparacion->marca) === 'Google Pixel')>Google Pixel</option>
                                <option value="Huawei" @selected(old('marca', $reparacion->marca) === 'Huawei')>Huawei</option>
                                <option value="LG" @selected(old('marca', $reparacion->marca) === 'LG')>LG</option>
                                <option value="OnePlus" @selected(old('marca', $reparacion->marca) === 'OnePlus')>OnePlus</option>
                                <option value="Otro" @selected(old('marca', $reparacion->marca) === 'Otro')>Otro</option>
                            </select>
                            @error('marca')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modelo" class="form-label">
                                <i class="fas fa-cube"></i> Modelo
                            </label>
                            <input type="text" class="form-control @error('modelo') is-invalid @enderror" 
                                   id="modelo" name="modelo" placeholder="Ej: iPhone 14 Pro Max" 
                                   value="{{ old('modelo', $reparacion->modelo) }}" required>
                            @error('modelo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección: Detalles de la Reparación -->
            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-wrench"></i>
                    Detalles de la Reparación
                </div>

                <div class="form-group">
                    <label for="descripcion_falla" class="form-label">
                        <i class="fas fa-file-alt"></i> Descripción de la Falla
                    </label>
                    <textarea class="form-control @error('descripcion_falla') is-invalid @enderror" 
                              id="descripcion_falla" name="descripcion_falla" 
                              placeholder="Describe los síntomas y problemas del dispositivo..."
                              required>{{ old('descripcion_falla', $reparacion->descripcion_falla) }}</textarea>
                    <small class="form-text">Sé lo más detallado posible para una mejor diagnóstico</small>
                    @error('descripcion_falla')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_ingreso" class="form-label">
                                <i class="fas fa-calendar"></i> Fecha de Ingreso
                            </label>
                            <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" 
                                   id="fecha_ingreso" name="fecha_ingreso" 
                                   value="{{ old('fecha_ingreso', $reparacion->fecha_ingreso) }}" required>
                            @error('fecha_ingreso')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado" class="form-label">
                                <i class="fas fa-circle-notch"></i> Estado
                            </label>
                            <select class="form-select @error('estado') is-invalid @enderror" 
                                    id="estado" name="estado" required>
                                <option value="" disabled>Selecciona un estado</option>
                                <option value="pendiente" @selected(old('estado', $reparacion->estado) === 'pendiente')>Pendiente</option>
                                <option value="en_proceso" @selected(old('estado', $reparacion->estado) === 'en_proceso')>En Proceso</option>
                                <option value="completado" @selected(old('estado', $reparacion->estado) === 'completado')>Completado</option>
                            </select>
                            @error('estado')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Estado Actual -->
                <div class="form-group" style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color);">
                    <label class="form-label">
                        <i class="fas fa-history"></i> Estado Actual
                    </label>
                    @php
                        $estadoClass = match($reparacion->estado) {
                            'completado' => 'badge-completado',
                            'en_proceso' => 'badge-en-proceso',
                            default => 'badge-pendiente'
                        };
                        $estadoText = match($reparacion->estado) {
                            'completado' => 'Completado',
                            'en_proceso' => 'En Proceso',
                            default => 'Pendiente'
                        };
                    @endphp
                    <div class="badge-estado-display {{ $estadoClass }}">
                        {{ $estadoText }}
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="btn-group-actions">
                <a href="{{ route('reparaciones.index') }}" class="btn-custom btn-cancel">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn-custom btn-submit">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
@endsection
