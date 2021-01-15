@extends('layouts.main')
@section('content')


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <span><i class="fas fa-boxes"></i> Stok Baju </span> 
    <div class="card-body">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3 class="text-success mb-3">Barang Baru</h3>
            <p>Barang yang baru saja dimasukkan akan tampil disini.</p>
            <div style="overflow-y: scroll; height: 200px" class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $stokBaru as $i => $d )
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                {{ ucwords($d->nama) }} <br>
                            <small> {{ ucwords($d->jenis) }} | {{ ucwords($d->warna) }}</small>
                            </td>
                            <td> <a class="btn btn-primary btn-sm" href="{{ route('stok.create' , $d->id) }}">Tambah Stok</a> </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h3 class="text-danger mb-3">Stok Kosong</h3>
            <p>Barang yang jumlah stoknya 0 akan tampil disini.</p>
            <div style="overflow-y: scroll; height: 200px" class="table-responsive">
                <table  class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $stokKosong as $i => $d )
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                {{ ucwords($d->baju->nama) }} <br>
                            <small> {{ ucwords($d->baju->jenis) }} | {{ ucwords($d->baju->warna) }}</small>
                            </td>
                            <td> <a class="btn btn-primary btn-sm" href="{{ route('stok.edit' , $d->id) }}">Update Stok</a> </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Stok Baju</h3>
            <p>Baju yang memiliki stok akan tampil disini.</p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $stokIsi as $i => $d )
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                {{ ucwords($d->baju->nama) }} <br>
                            <small> {{ ucwords($d->baju->jenis) }} | {{ ucwords($d->baju->warna) }}</small>
                            </td>
                            <td>
                                S : {{ $d->small }} | 
                                M : {{ $d->medium }} | 
                                L : {{ $d->large }} | 
                                XL : {{ $d->extralarge }}
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('stok.edit' , $d->id) }}">Update Stok</a> 
                                <form action="{{ route('stok.destroy' , $d->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type='submit'>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection

@push('alert')
  @if(session('status'))
  <script>
    $('#alertModal').modal('show');
  </script>
  @endif
@endpush