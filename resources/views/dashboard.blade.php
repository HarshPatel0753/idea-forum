@extends('layout.main-layout')
@section('main-container')
    <div>
        @foreach ($ideas as $key => $idea)
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between border-bottom pb-2">
                    <label class="">{{ $idea->title }}</label>
                </div>
                <div class="pt-2">
                    {{ $idea->text }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
