@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Project</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="date">Project Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="thumbnail">Project Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="url">Project URL (optional)</label>
            <input type="url" name="url" id="url" class="form-control">
        </div>
        <div class="form-group">

            <label for="slug">Project Slug</label>

            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">

            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', $project->meta_title ?? '') }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', $project->meta_description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ old('meta_keywords', $project->meta_keywords ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">Add Project</button>
    </form>
</div>
@endsection
