@extends('layouts.admin')

@section('adminContent')
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered table-dark">
            <thead class="thead-light">
            <tr class="text-center">
                <th class="align-middle" scope="col">ID</th>
                <th class="align-middle" scope="col">Name</th>
                <th class="align-middle" scope="col">Email</th>
                <th class="align-middle" scope="col">Number</th>
                <th class="align-middle" scope="col">Created at</th>
                <th class="align-middle" scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="text-center">
                    <th class="align-middle" scope="row">{{ $user->id }}</th>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->number}}</td>
                    <td class="align-middle">{{ $user->created_at}}</td>
                    <td width="200px">
                        <form class="d-inline" action="{{--{{route('',$user->id,true)}}--}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Deactivate
                            </button>
                        </form>
                        <form class="d-inline" action="{{--{{route('',$user->id,true)}}--}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-danger">
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
