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
    <div class="card-body ">
        <h5 class="card-title fw-bolder mb-3 ">Tambah Data Handphone</h5>
        <form method="post" action="{{route('admin.store')}}">
            @csrf
            <div class="mb-3">
                <label for="nama_hp" class="form-label">Nama Handphone</label>
                <input type="text" class="form-control" id="nama_hp" name="nama_hp">
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk_hp" name="merk_hp">
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Rilis</label>
                <input type="text" class="form-control" id="tgl_hp" name="tgl_hp">
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">OS</label>
                <input type="text" class="form-control" id="id_os" name="id_os">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop
