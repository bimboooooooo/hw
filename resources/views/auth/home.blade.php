@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Enter') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('newUser') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
                                <div class="col-md-6">
                                    <input id="phoneNumber" type="tel" class="form-control {{--@error('email') is-invalid @enderror--}}" name="phoneNumber" required autocomplete="phone" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-outline-success">
                                        {{ __('Enter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
