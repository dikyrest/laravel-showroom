@extends('templates.layout')

@section('title', 'Home')

@section('content')
<div class="row justify-content-md-center align-items-center pt-5">
    <div class="col-sm align-items-center">
        <h1>Selamat Datang Di Show Room {{ Auth::user()->name ?? '' }}</h1>
        <p>Ini adalah show room dengan layanan berkualitas</p>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/logo-ead.png') }}" class="card-img-top">
            </div>
            <div class="col-sm">
            Febrilia Putri Inzani_1202201378
            </div>
        </div>
    </div>
    <div class="col-sm align-items-center">
        <img src="{{ asset('storage/car.jpg') }}" class="shadow me-3 rounded">
    </div>
</div>
@endsection