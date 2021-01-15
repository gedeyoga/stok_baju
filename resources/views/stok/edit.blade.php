@extends('layouts.main')
@section('content')

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <span><i class="fas fa-plus"></i> Update Stok </span> 
    </div>
    <div class="card-body">
        <form action="{{ route('stok.update' , $data->id) }}" method="post">
        @csrf
        @method('PATCH')
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label>Nama</label>
                    <h4>{{ $data->baju->nama }}</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Merk</label>
                    <h4>{{ $data->baju->merk }}</h4>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="form-group col-12 col-md-6">
                    <label>Warna</label>
                    <h4>{{ $data->baju->warna }}</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Jenis</label>
                    <h4>{{ $data->baju->jenis }}</h4>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="form-group col-12 col-md-6">
                    <label>Small</label>
                    <h4>{{ $data->small }} pcs</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Medium</label>
                    <h4>{{ $data->medium }} pcs</h4>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="form-group col-12 col-md-6">
                    <label>Large</label>
                    <h4>{{ $data->large }} pcs</h4>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Extra Large</label>
                    <h4>{{ $data->extralarge }} pcs</h4>
                </div>
            </div>
            
            <h6 class="mb-3">Update Size Baju</h6>
            <div class="form-row mb-4">
                <div class="form-group col">
                    <input type="hidden" name="baju_id" value="{{ $data->baju->id }}">
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
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" href="{{ route('stok.index') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection