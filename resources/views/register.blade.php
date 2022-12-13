@extends('templates.auth')

@section('title', 'Register')

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
    <h1>Register</h1>
</div>
<div class="row">
    <div class="col-md-3 w-auto">
        <img src="{{ asset('storage/car.jpg') }}" >
    </div>
    <div class="col-md-5">
        <form action="/register" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p>Anda sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>
@endsection