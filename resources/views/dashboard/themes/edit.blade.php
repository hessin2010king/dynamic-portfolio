@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Theme</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('themes.update', $theme) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Theme Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $theme->name }}" required>
        </div>

        <div class="form-group">
            <label for="css_path">CSS Path</label>
            <input type="text" name="css_path" id="css_path" class="form-control" value="{{ $theme->css_path }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Theme</button>
    </form>
</div>
@endsection
