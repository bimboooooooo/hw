@extends('layouts.app')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <table class="table table-striped table-bordered table-dark">
            <thead class="thead-light">
            <tr class="text-center">
                <th class="align-middle" scope="col">ID</th>
                <th class="align-middle" scope="col">Title</th>
                <th class="align-middle" scope="col">Slug</th>
                <th class="align-middle" scope="col">Author</th>
                <th class="align-middle" scope="col">Categories</th>
                <th class="align-middle" scope="col">Tags</th>
                <th class="align-middle" scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="text-center">
                    <th class="align-middle" scope="row">{{$post->id }}</th>
                    <td class="align-middle">{{ $post->title }}</td>
                    <td class="align-middle">{{ $post->slug }}</td>
                    <td class="align-middle">{{ $post->Author->name }}</td>

                    <td class="align-middle">
                        @foreach($post->categories as $category)
                            <div class="badge badge-info">
                                {{ $category->title }}
                            </div>
                        @endforeach
                    </td>
                    <td class="align-middle">
                        @foreach($post->tags as $tag)
                            <div class="badge badge-warning">
                            {{ $tag->title }}
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <form class="d-inline" action="{{route('posts.show',$post->id,true)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">
                                Show
                            </button>
                        </form>
                        <form class="d-inline" action="{{route('posts.destroy',$post->id,true)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-outline-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')

@endpush
