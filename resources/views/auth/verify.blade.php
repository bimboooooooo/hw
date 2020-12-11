@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Phone Number') }}</div>
                    <div class="card-body">
                        <p class="alert alert-info">{{ __('Before proceeding, please check your phone for a verification code.') }}</p>
                        <form method="POST" action="{{route('verify')}}">
                            <input type="hidden" value="{{$number}}" name="phoneNumber">
                            @csrf
                            <div class="form-group row">
                                <label for="code"
                                       class="col-md-4 col-form-label-lg text-md-right">{{ __('Verification Code:') }}</label>
                                <div class="col-md-6">
                                    <input id="code" type="text"
                                           class="form-control @isset($message) is-invalid @endisset" name="code"
                                           required autocomplete="code" autofocus>
                                    @isset($message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @endisset
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify') }}
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
