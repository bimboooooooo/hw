@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
        <div class="col-md-3 d-inline-block">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    {{  Auth::user()->name . __(' Admin Panel') }}
                </div>
                <div class="card-body">
                    <a href="{{route('admin.users')}}" class="btn btn-outline-success d-block mb-2">
                        Users
                    </a>
                    <a href="{{route('admin.Posts')}}" class="btn btn-outline-primary d-block mb-2">
                        Posts
                    </a>
                    <a href="" class="btn btn-outline-danger d-block">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 d-inline-block">
            <div class="card">
            @yield('adminContent')
            </div>
        </div>
        </div>
    </div>
@endsection
