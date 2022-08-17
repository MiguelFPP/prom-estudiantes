<div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Estudiantes</h4>
            <a href="{{ route('students.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>
        <div class="card-body">
            @if ($students->isEmpty())
                <div class="text-center d-block"></div>
                <p class="text-danger">No hay estudiantes registrados.</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Identificacon</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->identification }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td>
                                        <button wire:click="$emit('deleteAverage', {{ $student->id }})"
                                            class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteAverage', (id) => {
            Swal.fire({
                title: 'Estas Seguro?',
                text: "No podra revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* aliminar vacante */
                    Livewire.emit('delete', id)
                    Swal.fire(
                        'Eliminada!',
                        'El promedio ha sido eliminado.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush
