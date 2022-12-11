@extends('templates.layout')

@section('title', 'Items')

@section('content')
    <h1>My Show Room</h1>
    <p>List Show Room Febrilia Putri Inzani - 1202201378</p>

    @if (Session::has('status') && Session::get('status') == 'Success')
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @elseif (Session::has('status') && Session::get('status') == 'Failed')
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="d-flex justify-content-start flex-wrap mb-3">
        @foreach ($showrooms as $showroom)           
            <div class="card shadow me-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $showroom->image) }}" class="card-img-top" alt="{{ $showroom->image }}">
                <div class="card-body">
                    <h5>{{ $showroom->name }}</h5>
                    <p>{{ $showroom->description }}</p>
                </div>
                <div class="d-flex justify-content-around pb-3">
                    <a href="/items/{{ $showroom->id }}" class="btn btn-primary">Detail</a>
                    <form action="/items/{{ $showroom->id }}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection