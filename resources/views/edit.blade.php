@extends('templates.layout')

@section('title', 'Edit')

@section('content')
<div class="row">
    <h1>Edit</h1>
    <p>Edit Mobil {{ $showroom->name }}</p>
</div>
<div class="row">
    <div class="col-md-3 w-auto">
        <img src="{{ asset('storage/' . $showroom->image) }}" class="shadow me-3 rounded">
    </div>
    <div class="col-md-5">
        <form action="/items/{{ $showroom->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $showroom->name }}">
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="owner" name="owner" value="{{ $showroom->owner }}">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merk</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $showroom->brand }}">
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
                <input type="text" class="form-control" id="purchase_date" name="purchase_date" value="{{ $showroom->purchase_date }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $showroom->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pembayaran</label>
                <div class="hstack gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Lunas"
                            id="paid" {{ $showroom->status == 'Lunas' ? 'checked' : '' }}>
                        <label class="form-check-label" for="paid">
                            Lunas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Belum Lunas"
                            id="npaid" {{ $showroom->status == 'Belum Lunas' ? 'checked' : '' }}>
                        <label class="form-check-label" for="npaid">
                            Belum Lunas
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection