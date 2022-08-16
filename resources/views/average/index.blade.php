@extends('app')
@section('content')
    <h1>Notas promedio</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @livewire('average.index')
            </div>
        </div>
    </div>
@endsection
