@extends('admin.layout')

@section('content')

<h4 class="mt-5 r">Data Penjualan</h4>

<a href="{{ route('admin.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('admin.archive') }}" type="button" class="btn btn-success rounded-3">Archive Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<form action="GET">
    
</form>
<table class="table table-hover mt-4 ">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Merk</th>
            <th>Tahun</th>
            <th>OS</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->nama_hp }}</td>
            <td>{{ $data->merk_hp }}</td>
            <td>{{ $data->tgl_hp }}</td>
            <td>{{ $data->nama_os }}</td>
            <td>
                <a href="{{ route('admin.edit', $data->id_hp) }}" type="button"
                    class="btn btn-primary rounded-3">Ubah</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_hp }}">
                    Hapus
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_hp }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.delete', $data->id_hp) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
            </td>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </tr>
        @endforeach
    </tbody>
</table>
@stop
