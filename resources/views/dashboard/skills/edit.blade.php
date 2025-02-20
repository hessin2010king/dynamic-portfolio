@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Skill</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Skill Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $skill->name }}" required>
        </div>

        <div class="form-group">
            <label for="percentage">Proficiency (%)</label>
            <input type="number" name="percentage" id="percentage" class="form-control" value="{{ $skill->percentage }}" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">Update Skill</button>
    </form>
</div>
@endsection
