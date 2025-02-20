@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Skill</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Skill Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="percentage">Proficiency (%)</label>
            <input type="number" name="percentage" id="percentage" class="form-control" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">Add Skill</button>
    </form>
</div>
@endsection
