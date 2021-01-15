@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Tambah Stok </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('stok.store') }}" method="post">
        @csrf
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label>Nama</label>
                    <h4>{{ $baju->nama }}</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Merk</label>
                    <h4>{{ $baju->merk }}</h4>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="form-group col-12 col-md-6">
                    <label>Warna</label>
                    <h4>{{ $baju->warna }}</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Jenis</label>
                    <h4>{{ $baju->jenis }}</h4>
                </div>
            </div>
            <h6 class="mb-3">Size Baju</h6>
            <div class="form-row mb-4">
                <div class="form-group col">
                    <input type="hidden" name="baju_id" value="{{ $baju->id }}">
                    <label>S</label>
                    <input type="number" class="form-control" name="small" value="{{ old('small') }}">
                    @error('small')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>M</label>
                    <input type="number" class="form-control" name="medium" value="{{ old('medium') }}">
                    @error('medium')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>L</label>
                    <input type="number" class="form-control" name="large" value="{{ old('large') }}">
                    @error('large')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>XL</label>
                    <input type="number" class="form-control" name="extralarge" value="{{ old('extralarge') }}">
                    @error('extralarge')
                        <small class="text-danger"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-secondary" href="{{ route('stok.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection