@extends('admin.layouts.base-admin')

@section('content')
    @if(session('success_created'))
        <div class="container">
            <div class="alert alert-success">
                Post "{{ session('success_created')->title }}" successfully created!
            </div>
        </div>
    @elseif(session('success_updated'))
        <div class="container">
            <div class="alert alert-success">
                Post "{{ session('success_updated')->title }}" successfully updated!
            </div>
        </div>
    @endif

    <div class="container">
        <h1>{{ $post->title }}</h1>
        <h5>Categoria: {{ $post->category->name }}</h5>
        <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="img-fluid rounded">
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection
