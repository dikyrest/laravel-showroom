@extends('templates.layout')

@section('title', 'Add')

@section('content')
    <h1>Tambah Mobil</h1>
    <p>Tambah mobil baru Anda ke list showroom.</p>

    <div class="container w-50">
        <form action="/items" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="car-name" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="car-name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="owner" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="owner" name="owner" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Merk</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Beli</label>
                <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input class="form-control form-control-lg" id="image" name="image" type="file" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pembayaran</label>
                <div class="hstack gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Lunas"
                            id="paid">
                        <label class="form-check-label" for="paid">
                            Lunas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status"
                            id="npaid" value="Belum Lunas" checked>
                        <label class="form-check-label" for="npaid">
                            Belum Lunas
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection