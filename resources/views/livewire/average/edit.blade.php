<div>
    @if (session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
            <a href="{{ route('averages.edit', $exist) }}" class="alert-link">Editelo aqui</a>.
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Nuevo Promedio</h4>
            <a href="{{ route('averages.index') }}" class="btn btn-primary">
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent='update'>
                <div class="form-group mb-2">
                    <label for="student">Nombre Estudiante</label>
                    <div wire:ignore>
                        <select id="student" class="form-control select2" wire:model="student">
                            <option value="0" selected>Seleccione un Estudiante</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->identification }} |
                                    {{ $student->name }}
                                    {{ $student->surname }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('student')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial1">Parcial 1</label>
                    <input type="number" class="form-control" id="partial1" name="partial1"
                        placeholder="Ingrese Nota del Parcial 1" step="any" wire:model.lazy='partial1'
                        wire:change='calculateFinal'>
                    @error('partial1')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial2">Parcial 2</label>
                    <input type="number" class="form-control" id="partial2" name="partial2"
                        placeholder="Ingrese Nota del Parcial 2" step="any" wire:model.lazy='partial2'
                        wire:change='calculateFinal'>
                    @error('partial2')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial3">Parcial 3</label>
                    <input type="number" class="form-control" id="partial3" name="partial3"
                        placeholder="Ingrese Nota del Parcial 3" step="any" wire:model.lazy='partial3'
                        wire:change='calculateFinal'>
                    @error('partial3')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <div wire:loading wire:target='store'>
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div wire:loading.class='visually-hidden' wire:target='store'>
                        Guardar
                    </div>
                </button>
            </form>
        </div>
        {{-- show the average final --}}
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <h4>
                        Promedio Final: {{ $final === null ? '0' : $final }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2').on('change', function() {
                @this.set('student', $(this).val())
            });
        });
    </script>
@endpush
