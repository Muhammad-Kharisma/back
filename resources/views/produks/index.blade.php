@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - P R O D U K S</h1>
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
            <th>#ID</th>
            <th>Nama Produks</th>
            <th>Stock</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($data as $i=>$v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->nama_produks }}</td>
                <td>{{ $v->jumlah }}</td>
                <td>{{ $v->hargabeli }}</td>
                <td>{{ $v->hargajual }}</td>
                <td>{{ $v->kategori->nama_kategori }}</td>
                <td>
                    <img src="{{$v->getGambar()}}" width="40px" height="40px" class="img-circle" alt="User Image">
                </td>
                <td>{{ $v->deskripsi }}</td>
                <td>
                    <form action="{{route('produks.destroy',['id'=>$v->id])}}" method="post">
                        <a class="btn btn-warning fas fa-edit btn-circle" href="{{route("produks.edit",["id"=>$v->id])}}"></a>
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
                <h5 class="modal-title">Tambah Produks</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" readonly="true" name="id">
                    <div class="form-group">
                        <label>Nama Produks</label>
                        <input class="form-control" type="text" name="nama_produks">
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input class="form-control" type="number" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input class="form-control" type="number" name="hargabeli">
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input class="form-control" type="number" name="hargajual">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option>Pilih ..</option>
                            @foreach($kategori as $v)
                            <option 
                            value=" {{ $v->id }} "
                            @if ($v->id == $post->kategori_id)
                            selected
                            @endif
                            >
                            <!-- {{ $v->id }} -  -->{{ $v->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Upload gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
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
</div>
@endsection

