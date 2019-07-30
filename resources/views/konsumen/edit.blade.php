@extends('layout.app')

@section('content')

<div class="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('konsumen.update',['id'=>$konsumen->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input class="form-control" type="hidden" name="_method" value="PUT">
                    <input class="form-control" type="hidden" name="id" value="{{ $konsumen->id }}">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input class="form-control" type="hidden" name="_method" value="PUT">
                        <input class="form-control" type="text" name="nama_konsumen" value="{{ $konsumen->nama_konsumen }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control" type="hidden" name="_method" value="PUT">
                        <input class="form-control" type="text" name="jk" value="{{ $konsumen->jk }}">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input class="form-control" type="hidden" name="_method" value="PUT">
                        <input class="form-control" type="text" name="jk" value="{{ $konsumen->no_telp }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="hidden" name="_method" value="PUT">
                        <input class="form-control" type="text" name="alamat" value="{{ $konsumen->alamat }}">
                    </div>
                    <button class="btn btn-success fa fa-plus-circle" type="submit" name="submit">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger fa fa-minus" type="button" onclick="history.back(-1)">Batal</button>
            </div>
        </div>
    </div>
</div>
@endsection