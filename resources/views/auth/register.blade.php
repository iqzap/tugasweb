@extends('layouts.navbar') @section('content')
<link href="{{ asset('css/stylere.css') }}" rel="stylesheet">
    <div class="regBox">
        <img src="{{ asset('desain/cb.png') }}" class="avatar">
        <h1 class="h1y">Welcome to Registation</h1>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
        <p>Nama</p>
        <input type="text" name="name" id="name" placeholder="Enter Your Name">
            @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
        <p>NRP</p>
        <input type="text" name="nrp" placeholder="Enter Your NRP">
            @if ($errors->has('nrp'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('nrp') }}</strong>
                                        </span> @endif
        <p>Email</p>
        <input type="text" name="email" id="email" placeholder="Enter Your Email">
            @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" required>
             @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
        <p>Confirm Password</p>
        <input type="password" id="password-confirm" placeholder="Enter Password" name="password_confirmation" required>
        <input type="submit">
        </form>
    </div>
@endsection
