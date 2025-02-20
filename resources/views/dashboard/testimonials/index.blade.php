@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Testimonials</h1>
    <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add New Testimonial</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Company</th>
                <th>Quote</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->position }}</td>
                    <td>{{ $testimonial->company }}</td>
                    <td>{{ $testimonial->quote }}</td>
                    <td>
                        <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
