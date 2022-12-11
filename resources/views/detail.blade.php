@extends('templates.layout')

@section('title', 'Detail')

@section('content')
<h1>{{ $showroom->name }}</h1>
<p>Detail Mobil {{ $showroom->name }}</p>

<div class="d-flex justify-content-around flex-wrap">
    <div class="align-self-center w-50rem">
        <img src="{{ asset('storage/' . $showroom->image) }}" class="shadow me-3 rounded img-fluid">
    </div>
    <div class="align-self-center w-40rem">
        <form action="/items/{{ $showroom->id }}/edit" method="get" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $showroom->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="owner" name="owner" value="{{ $showroom->owner }}" disabled>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merk</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $showroom->brand }}" disabled>
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
                <input type="text" class="form-control" id="purchase_date" name="purchase_date" value="{{ $showroom->purchase_date }}" disabled>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $showroom->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input type="file" class="form-control" id="image" name="image" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pembayaran</label>
                <div class="hstack gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Lunas"
                            id="paid" disabled {{ $showroom->status == 'Lunas' ? 'checked' : '' }}>
                        <label class="form-check-label" for="paid">
                            Lunas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Belum Lunas"
                            id="npaid" disabled {{ $showroom->status == 'Belum Lunas' ? 'checked' : '' }}>
                        <label class="form-check-label" for="npaid">
                            Belum Lunas
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-warning">Edit</button>
        </form>
    </div>
</div>
@endsection