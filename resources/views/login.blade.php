@extends('templates.auth')

@section('title', 'Login')

@section('content')
@if (Session::has('status') && Session::get('status') == 'Success')
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@elseif (Session::has('status') && Session::get('status') == 'Failed')
    <div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
<div class="row text-center">
    <h1>Login</h1>
</div>
<div class="row">
    <div class="col-md-3 w-auto">
        <img class="w-100" src="{{ asset('storage/car.jpg') }}" >
    </div>
    <div class="col-md-5">
        <form action="/login/" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" value="Y" id="rememberMe" name="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember Me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p>Anda belum punya akun? <a href="/register">Daftar</a></p>
    </div>
</div>
@endsection