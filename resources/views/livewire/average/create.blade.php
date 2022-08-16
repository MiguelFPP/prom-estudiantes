<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Nuevo Promedio</h4>
            <a href="{{ route('averages.index') }}" class="btn btn-primary">
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent='store'>
                <div class="form-group mb-2">
                    <label for="student">Nombre Estudiante</label>
                    <input type="text" class="form-control" id="student" name="student"
                        placeholder="Nombre del Estudiante" wire:model.lazy='student'>
                    @error('student')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial1">Parcial 1</label>
                    <input type="number" class="form-control" id="partial1" name="partial1" placeholder="Parcial 1"
                        step="any" wire:model.lazy='partial1' wire:change='calculateFinal'>
                    @error('partial1')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial2">Parcial 2</label>
                    <input type="number" class="form-control" id="partial2" name="partial2" placeholder="Parcial 2"
                        step="any" wire:model.lazy='partial2' wire:change='calculateFinal'>
                    @error('partial2')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="partial3">Parcial 3</label>
                    <input type="number" class="form-control" id="partial3" name="partial3" placeholder="Parcial 3"
                        step="any" wire:model.lazy='partial3' wire:change='calculateFinal'>
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
