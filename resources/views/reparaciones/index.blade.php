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
                                            'entregado' => 'badge-entregado',
                                            'en_reparacion' => 'badge-en-reparacion',
                                            'reparado' => 'badge-reparado',
                                            'ingresado' => 'badge-ingresado',
                                            default => 'badge-pendiente'
                                        };
                                        $estadoText = match($reparacion->estado) {
                                            'entregado' => 'Entregado',
                                            'en_reparacion' => 'En Reparación',
                                            'reparado' => 'Reparado',
                                            'ingresado' => 'Ingresado',
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

    <!-- Detail Sidedrawer -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="detailDrawer" aria-labelledby="detailDrawerLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="detailDrawerLabel">
                <i class="fas fa-eye me-2"></i>Detalle de Reparación
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="detail-content">
                <div class="detail-section">
                    <h6 class="detail-section-title">Información del Cliente</h6>
                    <div class="detail-field">
                        <label>Nombre</label>
                        <p id="detail-cliente">-</p>
                    </div>
                </div>

                <div class="detail-section">
                    <h6 class="detail-section-title">Información del Dispositivo</h6>
                    <div class="detail-field">
                        <label>Marca</label>
                        <p id="detail-marca">-</p>
                    </div>
                    <div class="detail-field">
                        <label>Modelo</label>
                        <p id="detail-modelo">-</p>
                    </div>
                </div>

                <div class="detail-section">
                    <h6 class="detail-section-title">Detalles de la Reparación</h6>
                    <div class="detail-field">
                        <label>Descripción de Falla</label>
                        <p id="detail-descripcion" style="white-space: pre-wrap;">-</p>
                    </div>
                    <div class="detail-field">
                        <label>Estado</label>
                        <div id="detail-estado-container"></div>
                    </div>
                </div>

                <div class="detail-section">
                    <h6 class="detail-section-title">Fechas</h6>
                    <div class="detail-field">
                        <label>Fecha de Ingreso</label>
                        <p id="detail-fecha-ingreso">-</p>
                    </div>
                    <div class="detail-field">
                        <label>Última Actualización</label>
                        <p id="detail-fecha-actualizacion">-</p>
                    </div>
                </div>

                <div class="detail-actions">
                    <a href="#" id="detail-edit-link" class="btn btn-edit-full">
                        <i class="fas fa-edit me-2"></i> Editar Reparación
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('detailDrawer').addEventListener('show.bs.offcanvas', function(e) {
            const button = e.relatedTarget;
            const id = button.getAttribute('data-id');
            const cliente = button.getAttribute('data-cliente');
            const marca = button.getAttribute('data-marca');
            const modelo = button.getAttribute('data-modelo');
            const estado = button.getAttribute('data-estado');
            const descripcion = button.getAttribute('data-descripcion');
            const fechaIngreso = button.getAttribute('data-fecha-ingreso');
            const fechaActualizacion = button.getAttribute('data-fecha-actualizacion');

            // Llenar los campos
            document.getElementById('detail-cliente').textContent = cliente;
            document.getElementById('detail-marca').textContent = marca;
            document.getElementById('detail-modelo').textContent = modelo;
            document.getElementById('detail-descripcion').textContent = descripcion;

            // Formatear y mostrar fechas
            const fechaIngresoObj = new Date(fechaIngreso);
            const fechaIngresoFormatted = fechaIngresoObj.toLocaleDateString('es-AR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            
            const fechaActualizacionObj = new Date(fechaActualizacion);
            const fechaActualizacionFormatted = fechaActualizacionObj.toLocaleDateString('es-AR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            }) + ' ' + fechaActualizacionObj.toLocaleTimeString('es-AR', {
                hour: '2-digit',
                minute: '2-digit'
            });

            document.getElementById('detail-fecha-ingreso').textContent = fechaIngresoFormatted;
            document.getElementById('detail-fecha-actualizacion').textContent = fechaActualizacionFormatted;

            // Mostrar estado con badge
            const estadoText = {
                'ingresado': 'Ingresado',
                'en_reparacion': 'En Reparación',
                'reparado': 'Reparado',
                'entregado': 'Entregado',
                'pendiente': 'Pendiente'
            }[estado] || 'Pendiente';

            const estadoClass = {
                'ingresado': 'badge-ingresado',
                'en_reparacion': 'badge-en-reparacion',
                'reparado': 'badge-reparado',
                'entregado': 'badge-entregado',
                'pendiente': 'badge-pendiente'
            }[estado] || 'badge-pendiente';

            document.getElementById('detail-estado-container').innerHTML = 
                `<span class="badge-estado ${estadoClass}">${estadoText}</span>`;

            // Actualizar enlace de editar
            document.getElementById('detail-edit-link').href = `{{ route('reparaciones.edit', ':id') }}`.replace(':id', id);
        });
    </script>
@endsection
