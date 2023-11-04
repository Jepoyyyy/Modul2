@extends('admin.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<a href="{{ route('admin.index') }}" type="button"
    class="btn btn-primary rounded">Kembali</a>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#restoreModal{{ $data->id_hp }}">
                    Restore
                </button>
                <!-- Modal -->
                    
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
                    </form>
                </div>
            </div>
        </div>

        </tr>
        @endforeach
    </tbody>
</table>
@stop
