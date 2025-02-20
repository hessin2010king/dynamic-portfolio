@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Skills</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Add New Skill</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Proficiency (%)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->percentage }}%</td>
                    <td>
                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('skills.destroy', $skill) }}" method="POST" style="display:inline-block;">
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
