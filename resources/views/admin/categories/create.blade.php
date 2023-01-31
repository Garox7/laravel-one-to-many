@extends('admin.layouts.base-admin')

@section('content')
    <form action="{{ route('admin.categories.store') }}" class="needs-validation" method="post" novalidate>
        @csrf()

        {{-- NAME  --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            <div class="invalid-feedback">
                @error('name')
                    <ul>
                        @foreach ($errors->get('name') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- SLUG  --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
            <div class="invalid-feedback">
                @error('slug')
                    <ul>
                        @foreach ($errors->get('slug') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- DESCRIZIONE --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrivi la Categoria</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            <div class="invalid-feedback">
                @error('description')
                    <ul>
                        @foreach ($errors->get('description') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Crea</button>
        </div>
    </form>
@endsection
