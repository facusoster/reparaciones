@extends('layouts.layout')

@section('title', 'Sistema de Gestión - Centro de Reparaciones')

@section('content')
    <!-- Header -->
    <div class="header-section">
        <div class="header-title">
            <i class="fas fa-wrench"></i>
            <span>Gestión de Reparaciones</span>
        </div>
        <a href="{{ route('reparaciones.create') }}" class="btn btn-create">
            <i class="fas fa-plus"></i> Nueva Reparación
        </a>
    </div>

    <!-- Table or Empty State -->
    @if($reparaciones->count() > 0)
        <div class="table-container">
            <div style="overflow-x: auto;">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user"></i> Cliente</th>
                            <th><i class="fas fa-mobile-alt"></i> Marca</th>
                            <th><i class="fas fa-cube"></i> Modelo</th>
                            <!-- <th><i class="fas fa-file-alt"></i> Descripción</th> -->
                            <!-- <th><i class="fas fa-calendar"></i> Fecha Ingreso</th> -->
                            <th><i class="fas fa-circle-notch"></i> Estado</th>
                            <!-- <th style="text-align: center;"><i class="fas fa-cogs"></i> Acciones</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reparaciones as $reparacion)
                            <tr>
                                <td>{{ $reparacion->cliente }}</td>
                                <td>{{ $reparacion->marca }}</td>
                                <td>{{ $reparacion->modelo }}</td>
                                <!-- <td>
                                    <span title="{{ $reparacion->descripcion_falla }}">
                                        {{ Str::limit($reparacion->descripcion_falla, 30) }}
                                    </span>
                                </td> -->
                                <!-- <td>{{ \Carbon\Carbon::parse($reparacion->fecha_ingreso)->format('d/m/Y') }}</td> -->
                                <td class="td-flex">
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
                                    <span class="badge-estado {{ $estadoClass }}">
                                        {{ $estadoText }}
                                    </span>
                                    <div class="dropdown">
                                        <button class="btn btn-dark btn-sm btn-ellipsis dropdown-toggle" type="button"
                                                id="actionsDropdown{{ $reparacion->id }}"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                title="Opciones">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="actionsDropdown{{ $reparacion->id }}">
                                            <li>
                                                <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#detailDrawer" 
                                                        data-id="{{ $reparacion->id }}" data-cliente="{{ $reparacion->cliente }}"
                                                        data-marca="{{ $reparacion->marca }}" data-modelo="{{ $reparacion->modelo }}"
                                                        data-estado="{{ $reparacion->estado }}" data-descripcion="{{ $reparacion->descripcion_falla }}"
                                                        data-fecha-ingreso="{{ $reparacion->fecha_ingreso }}" data-fecha-actualizacion="{{ $reparacion->updated_at }}">
                                                    <i class="fas fa-eye me-2"></i> Ver detalle
                                                </button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('reparaciones.edit', $reparacion->id) }}">
                                                    <i class="fas fa-edit me-2"></i> Editar
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item text-danger" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $reparacion->id }}">
                                                    <i class="fas fa-trash me-2"></i> Eliminar
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <!-- <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-dark btn-sm btn-ellipsis dropdown-toggle" type="button"
                                                id="actionsDropdown{{ $reparacion->id }}"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                title="Opciones">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="actionsDropdown{{ $reparacion->id }}">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('reparaciones.show', $reparacion->id) }}">
                                                    <i class="fas fa-eye me-2"></i> Ver detalle
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('reparaciones.edit', $reparacion->id) }}">
                                                    <i class="fas fa-edit me-2"></i> Editar
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item text-danger" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $reparacion->id }}">
                                                    <i class="fas fa-trash me-2"></i> Eliminar
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>No hay reparaciones registradas</p>
            <a href="{{ route('reparaciones.create') }}" class="btn btn-create">
                <i class="fas fa-plus"></i> Crear primera reparación
            </a>
        </div>
    @endif

    <!-- Delete Modals -->
    @foreach($reparaciones as $reparacion)
        <div class="modal fade" id="deleteModal{{ $reparacion->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-exclamation-triangle" style="color: var(--danger-color); margin-right: 0.5rem;"></i>
                            Confirmar Eliminación
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar la reparación de <strong>{{ $reparacion->cliente }}</strong>?</p>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">
                            <i class="fas fa-info-circle"></i> Esta acción no se puede deshacer.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                        <form action="{{ route('reparaciones.destroy', $reparacion->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-confirm">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
