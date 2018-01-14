@extends('layouts.navbar') @section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <div class="loginBox bodyx">
        <img src="{{ asset('desain/log.png') }}" class="avatar">
        <h1 class="h1x">Login Here</h1>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
        <p>NRP</p>
        <input type="text" name="nrp" id="nrp" placeholder="Enter NRP">
        @if ($errors->has('nrp'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('nrp') }}</strong>
                                        </span> @endif
        <p>Password</p>
        <input type="password" name="password" id="password" placeholder="Enter Password">
    @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
        <input type="submit" name="" value="Login">
        <a href="{{ route('register') }}">Don't have an account?</a><br>
        </form>

    </div>

@endsection