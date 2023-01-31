@extends('admin.layouts.base-admin')

@section('content')
    @if(session('success_created'))
        <div class="container">
            <div class="alert alert-success">
                La categoria "{{ session('success_created')->name }}" è stata aggiunta con successo.
            </div>
        </div>
    @elseif(session('success_updated'))
        <div class="container">
            <div class="alert alert-success">
                La categoria "{{ session('success_updated')->name }}" è stata aggiornata con successo.
            </div>
        </div>
    @endif

    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p>
            {{ $category->description }}
        </p>

        <ul>
            @foreach ($category->post as $post)
                <li><a href="{{ route('admin.posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
