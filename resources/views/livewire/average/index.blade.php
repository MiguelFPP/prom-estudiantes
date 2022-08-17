<div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Notas Promedio</h4>
            <a href="{{ route('averages.create') }}" class="btn btn-primary">
                Nuevo
            </a>
        </div>
        <div class="card-body">
            @if ($averages->isEmpty())
                <div class="text-center d-block"></div>
                <p class="text-danger">No hay notas promedio registradas.</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Nombre</th>
                            <th>Parcial 1</th>
                            <th>Parcial 2</th>
                            <th>Parcial 3</th>
                            <th>Final 3</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($averages as $average)
                                <tr>
                                    <td>{{ $average->student->name }} {{ $average->student->surname }} </td>
                                    <td>{{ $average->partial1 }}</td>
                                    <td>{{ $average->partial2 }}</td>
                                    <td>{{ $average->partial3 }}</td>
                                    <td>{{ $average->final }}</td>
                                    <td>
                                        <button wire:click="$emit('deleteAverage', {{ $average->id }})"
                                            class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                        <a href="{{ route('averages.edit', $average) }}" class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 d-flex justify-content-center">
                    {!! $averages->links() !!}
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
