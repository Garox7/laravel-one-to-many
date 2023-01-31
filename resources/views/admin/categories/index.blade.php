@extends('admin.layouts.base-admin')

@section('content')
    @if (session('success_deleted'))
        <div class="container">
            <div class="alert alert-warning">
                Category "{{ session('success_deleted')->title }}" successfully deleted!
            </div>
        </div>
    @endif

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', ['category' => $category]) }}">
                            <button class="btn btn-primary">Leggi</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category]) }}">
                            <button class="btn btn-warning">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="post">
                            @csrf()
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            <a href="{{ route('admin.categories.create') }}"><button class="btn btn-primary">Aggiungi categoria</button></a>
        </div>
        {{-- <div class="flex-center">
            {{ $posts->links() }}
        </div> --}}
    </div>
@endsection
