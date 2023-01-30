@extends('layouts.app')

@section('content')
    @if (session('success_deleted'))
        <div class="container">
            <div class="alert alert-warning">
                Post "{{ session('success_deleted')->title }}" successfully deleted!
            </div>
        </div>
    @endif

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Anteprima</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->excerpt }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', ['post' => $post]) }}">
                            <button class="btn btn-primary">Leggi</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}">
                            <button class="btn btn-warning">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                            @csrf()
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
