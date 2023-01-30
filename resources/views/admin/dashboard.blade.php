@extends('admin.layouts.base-admin')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="my-container">
        <div class="dashboard-container">
            <div class="dashboard-title">
                <i class='bx bx-calendar-alt icon'></i>
                <span class="title">Dashboard</span>
            </div>
            <table class="dashboard-table">
                <thead>
                    <tr class="table-title-col">
                        <th scope="col">ID Post</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Anteprima</th>
                        <th scope="col">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
