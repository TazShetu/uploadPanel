<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="icon" href="{{asset('joli/favicon.ico')}}" type="image/x-icon"/>
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" href="{{asset('bubbly/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('joli/css/theme-default.css')}}"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container lightmode">
    <div class="login-box animated fadeInDown">
        <div>
            <h1 class="text-center text-light">
                <a href="{{url('/')}}" style="text-decoration: none !important; color: inherit !important;">Twinbit Limited</a>
            </h1>
        </div>
        <div class="login-body">
            <div class="login-title"><span class="text-secondary">Log In</span></div>
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{session('error')}}
                </div>
            @endif
            <form action="{{ route('login') }}" class="form-horizontal" method="post">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="email" name="email"
                               class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                               value="{{old('email')}}" autofocus placeholder="E-mail" required>
                        @if($errors->has('email'))
                            <span class="help-block text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" name="password"
                               class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                               placeholder="Password" required>
                        @if($errors->has('password'))
                            <span class="help-block text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary" for="remember" style="margin-left: 17px;">
                                Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
{{--                    <div class="col-md-6">--}}
{{--                        <a href="{{ route('password.request') }}" class="btn btn-link btn-block">Forgot your--}}
{{--                            password?</a>--}}
{{--                    </div>--}}
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-info btn-block">Log In</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; {{date('Y')}} Twinbit
            </div>
        </div>
    </div>

</div>

</body>
</html>










{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Login') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
