@extends('layouts.app')

@section('content')
    <div class="container card col-3">
        <img class="card-img mt-3" src="{{ $final_path }}" alt="">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <div class="mb-3">
            <form class="d-inline" action="{{route('posts.destroy',$post->id,true)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="confirm('Are you sure?')" class="btn btn-block btn-outline-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
