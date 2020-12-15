@extends('layouts.admin')

@section('adminContent')
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
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
                    <td class="align-middle">{{ $post->author->name }}</td>

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
                    <td width="200px">
                        <form class="d-inline-block" action="" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">
                                Show
                            </button>
                        </form>
                        <form class="d-inline-block" action="" method="POST">
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
