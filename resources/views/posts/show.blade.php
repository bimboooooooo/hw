@extends('layouts.app')

@section('content')
    <div class="container col-md-6 card" style="width: 18rem;">
        <img class="card-img-top" src="{{$posts->image}}" alt="{{ $posts->image->alt }}">
        <div class="card-body">
            <h5 class="card-title">{{ $posts->title }}</h5>
            <p class="card-text">{{ $posts->content }}</p>
        </div>
    </div>
@endsection
