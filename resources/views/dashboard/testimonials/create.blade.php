@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Testimonial</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('testimonials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quote">Quote</label>
            <textarea name="quote" id="quote" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Add Testimonial</button>
    </form>
</div>
@endsection
