@extends('navbarbrg.app')

@section('content')

<form method="post" action="{{route('barang.update',['id'=>$barang->kd_barang])}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <br>
     <label>Kode Barang</label>
    <input class="form-control" type="hidden" name="_method" value="PUT">
    <input class="form-control" type="text" readonly="true" name="kd_barang" value="{{ $barang->kd_barang }}">
    <br>
    <label>Nama Barang</label>
    <input class="form-control" type="hidden" name="_method" value="PUT">
    <input class="form-control" type="text" name="nm_barang" value="{{ $barang->nm_barang }}">
    <br>
    <label>Kode Jenis</label>
    <input class="form-control" type="hidden" name="_method" value="PUT">
    <input class="form-control" type="text" name="kd_jenis" value="{{ $barang->kd_jenis }}">
    <br>
    <label>Harga</label>
    <input class="form-control" type="hidden" name="_method" value="PUT">
    <input class="form-control" type="text" name="harga" value="{{ $barang->harga }}">
    <br>
    <button class="btn btn-success" type="submit">Simpan</button> | 
    <button class="btn btn-danger" type="reset">Reset</button> |
    <button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection