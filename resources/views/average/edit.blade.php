@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                @livewire('average.edit', ['average' => $average])
            </div>
        </div>
    </div>
@endsection