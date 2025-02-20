@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Experience</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('experiences.update', $experience) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $experience->title }}" required>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ $experience->company }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $experience->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $experience->end_date }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $experience->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Experience</button>
    </form>
</div>
@endsection
