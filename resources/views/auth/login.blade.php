@extends('layouts.app')

@section('content')
<div class="col-md-9 mx-auto">
    <div class="row" style="padding-top: 5%;">
        <div class="d-none d-sm-none d-md-block col-md-8" style="padding-right: 50px;">
            <img src="{{asset("assets/img/imgLogin.jpg")}}" class="imagenLogin img-fluid">
        </div>
        <!-- /.login-logo -->
        <div class="card card-login col-md-4 mx-auto " style="width: 400px;">
            <div class="card-body login-card-body">
                <img src="{{asset("assets/img/logo-autofact.png")}}" class=" mx-auto d-block img-fluid my-4"
                    alt="Veramonte" width="300" height="auto">
                <form method="POST" action="{{ route('login') }}" class="pt-5">
                    @csrf
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <div class="alert-text">
                            @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif --}}
                    <div class="input-group mb-3">
                        <input id="email" placeholder="email" type="text"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="input-group mb-3">
                        <input id="password" placeholder="Contraseña" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <button type="submit" class="btn bg-autofact text-white float-right">
                                Iniciar sesión
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
@endsection