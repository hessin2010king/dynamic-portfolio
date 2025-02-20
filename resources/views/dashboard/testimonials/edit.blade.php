@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Testimonial</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $testimonial->name }}" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ $testimonial->position }}" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ $testimonial->company }}" required>
        </div>

        <div class="form-group">
            <label for="quote">Quote</label>
            <textarea name="quote" id="quote" class="form-control" required>{{ $testimonial->quote }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Testimonial</button>
    </form>
</div>
@endsection
