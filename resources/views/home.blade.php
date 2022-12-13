@extends('templates.layout')

@section('title', 'Home')

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
<div class="row align-items-center pt-5">
    <div class="col-sm">
        <div class="row">
            <h1>Selamat Datang Di Show Room {{ Auth::user()->name ?? '' }}</h1>
                <p>Ini adalah show room dengan layanan berkualitas</p>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <img src="{{ asset('storage/logo-ead.png') }}" class="card-img-top">
            </div>
            <div class="col-sm">
            Tsania Rifqa Annisa - NIM
            </div>
        </div>
    </div>
    <div class="col-sm">
        <img src="{{ asset('storage/car.jpg') }}" class="shadow me-3 w-100 rounded">
    </div>
</div>
@endsection