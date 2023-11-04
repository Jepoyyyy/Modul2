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

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Handphone</h5>
        <form method="post" action="{{ route('admin.update', $data->id_hp) }}">
            @csrf
            <div class="mb-3">
                <label for="nama_hp" class="form-label">Nama Handphone</label>
                <input type="text" class="form-control" id="nama_hp" name="nama_hp"
                    value="{{ $data->nama_hp }}">
            </div>
            <div class="mb-3">
                <label for="merk_hp" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk_hp" name="merk_hp" value="{{ $data->merk_hp }}">
            </div>
            <div class="mb-3">
                <label for="tgl_hp" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tgl_hp" name="tgl_hp" value="{{ $data->tgl_hp }}">
            </div>
            <div class="mb-3">
                <label for="id_os" class="form-label">OS</label>
                <input type="text" class="form-control" id="id_os" name="id_os" value="{{ $data->id_os }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop
