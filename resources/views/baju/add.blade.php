@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-table"></i>Tambah Baju </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('baju.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label>Nama Baju</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Merk</label>
                <input type="text" class="form-control" name="merk" value="{{ old('merk') }}">
                @error('merk')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Jenis Baju</label>
                <input type="text" class="form-control" name="jenis" value="{{ old('jenis') }}">
                @error('jenis')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Warna Baju</label>
                <input type="text" class="form-control" name="warna" value="{{ old('warna') }}">
                @error('warna')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('baju.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection