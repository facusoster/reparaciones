@extends('layouts.layout')

@section('title', 'Nueva Reparación - Centro de reparaciones')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <i class="fas fa-plus-circle"></i>
            <h1>Nueva Reparación</h1>
        </div>

        <div class="info-box">
            <i class="fas fa-info-circle"></i>
            <strong>Completa el formulario</strong> con los datos del cliente y el dispositivo a reparar. Todos los campos son obligatorios.
        </div>

        <form action="{{ route('reparaciones.store') }}" method="POST" novalidate>
            @csrf

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
                           value="{{ old('cliente') }}" required>
                    @error('cliente')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

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
                                <option value="" selected disabled>Selecciona una marca</option>
                                <option value="Apple" @selected(old('marca') === 'Apple')>Apple</option>
                                <option value="Samsung" @selected(old('marca') === 'Samsung')>Samsung</option>
                                <option value="Xiaomi" @selected(old('marca') === 'Xiaomi')>Xiaomi</option>
                                <option value="Motorola" @selected(old('marca') === 'Motorola')>Motorola</option>
                                <option value="Google Pixel" @selected(old('marca') === 'Google Pixel')>Google Pixel</option>
                                <option value="Huawei" @selected(old('marca') === 'Huawei')>Huawei</option>
                                <option value="LG" @selected(old('marca') === 'LG')>LG</option>
                                <option value="OnePlus" @selected(old('marca') === 'OnePlus')>OnePlus</option>
                                <option value="Otro" @selected(old('marca') === 'Otro')>Otro</option>
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
                                   value="{{ old('modelo') }}" required>
                            @error('modelo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

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
                              required>{{ old('descripcion_falla') }}</textarea>
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
                                   value="{{ old('fecha_ingreso', date('Y-m-d')) }}" required>
                            @error('fecha_ingreso')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estado" class="form-label">
                                <i class="fas fa-circle-notch"></i> Estado Inicial
                            </label>
                            <select class="form-select @error('estado') is-invalid @enderror"
                                    id="estado" name="estado" required>
                                <option value="" selected disabled>Selecciona un estado</option>
                                <option value="ingresado" @selected(old('estado') === 'ingresado')>Ingresado</option>
                                <option value="en_reparacion" @selected(old('estado') === 'en_reparacion')>En Reparación</option>
                                <option value="reparado" @selected(old('estado') === 'reparado')>Reparado</option>
                                <option value="entregado" @selected(old('estado') === 'entregado')>Entregado</option>
                            </select>
                            @error('estado')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-group-actions">
                <a href="{{ route('reparaciones.index') }}" class="btn-custom btn-cancel">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn-custom btn-submit">
                    <i class="fas fa-save"></i> Guardar Reparación
                </button>
            </div>
        </form>
    </div>
@endsection
