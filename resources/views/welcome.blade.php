@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12 border border-secondary rounded mt-5">
            <div class="col-md-12 text-center">
                <h1><b>Welcome</b></h1>
            </div>
            <div class="col-md-12 d-flex mb-3">
                <div class="col-md-6">
                    <form action="{{route('login')}}" method="GET">
                        <button class="btn btn-lg btn-outline-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{route('register')}}" method="GET">
                        <button class="btn btn-lg btn-outline-success btn-block">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
