@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - K A T E G O R I</h1>
<hr>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Kategori</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('kategori.update',['id'=>$kategori->id])}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input class="form-control" type="hidden" name="_method" value="PUT">
                <input class="form-control" type="hidden" name="id" value="{{ $kategori->id }}">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input class="form-control" type="hidden" name="_method" value="PUT">
                    <input class="form-control" type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                </div>
                <button class="btn btn-success btn-circle" type="submit" name="submit"><i class="fas fa-check"></i></button>
            </form>
        </div>
        <div class="modal-footer">
            <button  class="btn btn-danger btn-block" name="submit" type="submit" onclick="history.back(-1)">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Batal</span>
            </button>
        </div>
    </div>
</div>
@endsection

