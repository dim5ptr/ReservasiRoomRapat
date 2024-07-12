@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Ruang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ruang.update', $ruang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $ruang->nama }}" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas:</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ $ruang->kapasitas }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" step="0.01" name="harga" id="harga" class="form-control" value="{{ $ruang->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Ruang</button>
    </form>
</div>
@endsection
