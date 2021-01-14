@extends('layouts.main')
@section('content')


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
    <span><i class="fas fa-table"></i> Baju </span> 
    <a href="{{ route('baju.create') }}" class=" ml-auto btn btn-primary">Tambah Data</a></div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $data as $i => $d )
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ ucwords($d->nama) }}</td>
                    <td>{{ ucwords($d->merk) }}</td>
                    <td>{{ ucwords($d->jenis) }}</td>
                    <td>{{ ucwords($d->warna) }}</td>
                    <td class="d-flex">
                        <a href="{{ route('baju.edit' , $d->id) }}" class="btn btn-primary mr-2 btn-sm">Edit</a>
                        <form action="{{ route('baju.destroy' , $d->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" name="delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
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