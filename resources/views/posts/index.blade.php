@extends('layouts.app')

@push('styles')

@endpush

@section('content')
    <div class="container">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Author</th>
                <th scope="col">Categories</th>
                <th scope="col">Tags</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->athor }}</td>
                <td>{{ $post->category }}</td>
                <td>{{ $post->tag }}</td>
                <td>
                    <form class="btn btn-outline-success" action="" method="post">
                        @csrf
                        Show
                    </form>
                    <form class="btn btn-danger" action="" method="post">
                        @csrf
                        Delete
                    </form>
                </td>
                <td></td>
            </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')

@endpush
