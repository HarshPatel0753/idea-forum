@extends('layout.main-layout')
@section('main-container')
<div class="main">
	<div class="d-flex justify-content-center pb-1">
		<div class="header d-flex justify-content-between w-100">
			<h4>Idea Page</h4>
			<a href="{{ route('idea.form') }}"><button type="button" class="btn btn-outline-primary btn-sm">
				Add
			</button></a>
		</div>
	</div>
	<div class="d-flex flex-column gap-2 pb-5">
		@foreach ($ideas as $key => $idea)
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-between border-bottom pb-2">
                    <label class="">{{ $idea->title }}</label>
                    <div>
                        <a href="{{ route('idea.view', $idea->id) }}"><button type="button"
                            class="btn btn-outline-primary btn-sm">View</button></a>
                        <a href="{{ route('idea.edit', $idea->id) }}"><button type="button"
                            class="btn btn-outline-success btn-sm">Edit</button></a>
                        <a href="{{ route('idea.destroy', $idea->id) }}"><button type="button"
                            class="btn btn-outline-danger btn-sm">Delete</button></a>
                    </div>
                </div>
				<div class="pt-2">
                    {{ $idea->text }}
                </div>
			</div>
		  </div>
		@endforeach
        {{ $ideas->links('pagination::bootstrap-5') }}
	</div>
</div>
@endsection
