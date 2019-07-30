@extends('navbarbrg.app')

@section('content')
<form method="post" action="{{route("barang.store")}}">
    {{ csrf_field() }}
    <br>
    <label>Kode Barang</label>
    <input class="form-control" type="text" readonly="true" name="kd_barang">
    <label>Nama Barang</label>
    <input class="form-control" type="text" name="nm_barang">
    <label>Kode Jenis</label>
    <input class="form-control" type="text" name="kd_jenis">
    <label>Harga</label>
    <input class="form-control" type="text" name="harga">
    <br>
    <button class="btn btn-success" type="submit">Simpan</button> | 
    <button class="btn btn-danger" type="reset">Reset</button> |
    <button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection