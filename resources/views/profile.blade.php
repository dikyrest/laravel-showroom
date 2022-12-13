@extends('templates.layout')

@section('title', 'Profile')

@section('content')
@if (session('status') == 'Success')
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@elseif (session('status') == 'Failed')
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
    </div>
@endif
<div class="row text-center">
    <h1>Profile</h1>
</div>
<div class="container w-50">
    <form action="/profile" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="mb-3">
            <label for="navbar-color" class="form-label">Warna Navbar</label>
            <select class="form-select" id="navbar-color" name="navbar_color">
                <option value="blue" selected>Biru</option>
                <option value="grey">Abu-abu</option>
                <option value="lightgreen">Hijau</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection