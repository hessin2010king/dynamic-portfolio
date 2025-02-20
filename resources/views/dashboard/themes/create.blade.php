@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Theme</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('themes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Theme Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="css_path">CSS Path</label>
            <input type="text" name="css_path" id="css_path" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Theme</button>
    </form>
</div>
@endsection
