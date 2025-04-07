@extends('layout.main-layout')
@section('main-container')
<div class="main">
	<div class="d-flex justify-content-center pb-1">
		<div class="header d-flex justify-content-between w-100">
			<h4>Idea: {{ $idea->title }}</h4>
		</div>
	</div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between border-bottom pb-2">
                <label>Title: {{ $idea->title }}</label>
                <form method="POST" action="{{ route('idea.like', $idea->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-heart fa-sm fa-fw mr-2 text-red-500"></i>
                        {{ $likes }}
                    </button>
                </form>
            </div>
            <div class="pt-2">
                Text: {{ $idea->text }}
            </div>
        </div>
    </div>
    <div class="my-2">Comments</div>
    <div>
        <form method="POST" action="{{ route('idea.comment', $idea->id) }}">
            @csrf
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <label>Add new comment</label>
                    <input type="text" class="form-control" id="text" name="text" value="{{ old('text') }}">
                    <div class="d-flex mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    @if ($errors->any())
                        <ul class="px-4 py-2 bg-red-100">
                        @foreach ($errors->all() as $error)
                        <li class="my-2 text-red-500">{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </form>
    </div>
	<div class="d-flex flex-column gap-2 pb-5">
		@foreach ($comments as $key => $comment)
		<div class="card mt-2">
			<div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <label>Comment by- {{ $comment->first_name }} {{ $comment->last_name }}</label>
                    <label>Created at- {{ $comment->date }}</label>
                </div>
				<div class="pt-2">
                    Text: {{ $comment->text }}
                </div>
			</div>
		  </div>
		@endforeach
	</div>
</div>
@endsection
