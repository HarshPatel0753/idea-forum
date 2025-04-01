@extends('layout.main-layout')
@section('main-container')
<div class="card login-card shadow-sm p-4 grid gap-3">
    <h4 class="text-center mb-4">Create Form</h4>
    <form method="POST" action="{{ route('idea.create_or_update') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" placeholder="Enter text here" id="text" style="height: 100px" name="text" value="{{ old('text') }}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
    @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
        <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</div>
@endsection
