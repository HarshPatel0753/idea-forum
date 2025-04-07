@extends('layout.main-layout')
@section('main-container')
    <div>
        <div class="d-flex justify-content-center pb-1">
            <div class="header d-flex justify-content-between w-100">
                <h4>Ideas</h4>
            </div>
        </div>
        @foreach ($ideas as $key => $idea)
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="row">
                        <label class="">Title: {{ $idea->title }}</label>
                        <label class="">Posted By: {{ $idea->first_name }} {{ $idea->last_name }}</label>
                        <div>Created at: {{ $idea->date }}</div>
                    </div>
                    <div>
                        <a href="{{ route('idea.view', $idea->id) }}"><button type="button"
                            class="btn btn-outline-primary btn-sm">View</button></a>
                    </div>
                </div>
                <div class="pt-2">
                    Text: {{ $idea->text }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
