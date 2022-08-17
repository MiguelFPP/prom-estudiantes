<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Editar Estudiante</h4>
            <a href="{{ route('students.index') }}" class="btn btn-primary">
                Volver
            </a>
        </div>
        <div class="card-body">
            <form action="" wire:submit.prevent='update'>
                <div class="form-group mb-2">
                    <label for="identification">Identificacion</label>
                    <input type="number" class="form-control" id="identification" name="identification"
                        placeholder="Ingrese Identficacion del Estudiante" wire:model.lazy='identification'>
                    @error('identification')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="partial1" name="name"
                        placeholder="Ingrese el Nombre del Estudiante" step="any" wire:model.lazy='name'>
                    @error('name')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="surname">Apellido</label>
                    <input type="text" class="form-control" id="surname" name="surname"
                        placeholder="Ingrese el Apellido del Estudiante" step="any" wire:model.lazy='surname'>
                    @error('surname')
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
                        Actualizar
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
