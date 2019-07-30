@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - K A T E G O R I</h1>
<hr>
<a href="" class="btn btn-primary btn-circle float-right btn-lg" data-toggle="modal" data-target="#tambah">
    <strong>Add</strong>
</a>
<br>
<br>
<br>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <td><strong>#ID</strong></td>
            <td><strong>Nama Kategori</strong></td>
            <td><strong>Produks</strong></td>
            <!-- <td><strong>Harga Produks</strong></td> -->
            <td><strong>Tools</strong></td>

        </tr>
        
    </thead>
    <tbody>
        <tr>
            @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->nama_kategori }}</td>
                <td>
                    @foreach($v->produks as $pro)
                    {{ $pro->nama_produks }}<br>
                    @endforeach
                </td>
                <!-- <td>{{ $pro->hargajual }}</td> -->
                <td>
                    <form action="{{route('kategori.destroy',['id'=>$v->id])}}" method="post">
                        <a href="{{route('kategori.edit',['id'=>$v->id])}}" class="btn btn-warning btn-circle">
                            <i class="fas fa-edit"></i>
                        </a>
                        |
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-circle" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" readonly="true" name="id">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori">
                    </div>
                    <a href="">
                        <button  class="btn btn-success btn-circle" name="submit" type="submit"><i class="fas fa-check"></i></button>
                    </a>
                    
                </form>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                    <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                    <span class="text">Batal</span>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

