@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                @livewire('student.edit', ['student' => $student])
            </div>
        </div>
    </div>
@endsection