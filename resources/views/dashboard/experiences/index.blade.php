@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Experiences</h1>
    <a href="{{ route('experiences.create') }}" class="btn btn-primary mb-3">Add New Experience</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experiences as $experience)
                <tr>
                    <td>{{ $experience->title }}</td>
                    <td>{{ $experience->company }}</td>
                    <td>{{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}</td>
                    <td>{{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}</td>
                    <td>{{ $experience->description }}</td>
                    <td>
                        <a href="{{ route('experiences.edit', $experience) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('experiences.destroy', $experience) }}" method="POST" style="display:inline-block;">
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
