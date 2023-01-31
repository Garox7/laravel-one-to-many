@extends('admin.layouts.base-admin')

@section('content')
    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        @csrf()
        @method('put')

        {{-- TITLE  --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            <div class="invalid-feedback">
                @error('title')
                    <ul>
                        @foreach ($errors->get('title') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- SLUG  --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
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

        {{-- URL IMAGE  --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
            <div class="invalid-feedback">
                @error('image')
                    <ul>
                        @foreach ($errors->get('image') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- FILE IMAGE  --}}
        <div class="mb-3">
            <label for="file_path" class="form-label">Importa file</label>
            <input type="file" class="form-control @error('file_path') is-invalid @enderror" id="file_path" name="file_path" aria-label="file example" required>
            <div class="invalid-feedback">
                @error('file_path')
                    <ul>
                        @foreach ($errors->get('file_path') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- CONTENUTO POST --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">Inserisci l'anteprima del post</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
            <div class="invalid-feedback">
                @error('excerpt')
                    <ul>
                        @foreach ($errors->get('excerpt') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- ANTEPRIMA TESTO --}}
        <div class="mb-3">
            <label for="content" class="form-label">Inserisci il contenuto del post</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
            <div class="invalid-feedback">
                @error('content')
                    <ul>
                        @foreach ($errors->get('content') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Applica modifiche</button>
        </div>
    </form>
@endsection
