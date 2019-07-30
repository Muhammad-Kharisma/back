@extends('layout.app')

@section('content')
<form method="post" action="{{route("konsumen.store")}}">
    {{ csrf_field() }}
    <br>
    <label>ID Konsumen</label>
    <input class="form-control" type="text" readonly="true" name="id">
    <br>
    <label>Nama Konsumen</label>
    <input class="form-control" type="text" name="nama_konsumen">
    <br>
    <label>Jenis Kelamin</label>
    <input class="form-control" type="text" name="jk">
    <!-- <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control">
            <option>Pilih ..</option>
            <option value="selected">L</option>
            <option value="selected">P</option>
            
        </select>
    </div> -->
    <br>
    <label>No. Telepon</label>
    <input class="form-control" type="text" name="no_telp">
    <br>
    <label>Alamat</label>
    <input class="form-control" type="text" name="alamat">
    <br>
    <button class="btn btn-success" type="submit">Simpan</button> | 
    <button class="btn btn-danger" type="reset">Reset</button> |
    <button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection