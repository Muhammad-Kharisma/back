@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - K O N S U M E N</h1>
<hr>
<!-- <a class="btn btn-primary float-right fa fa-plus-circle" data-toggle="modal" data-target="#tambah"></a> -->
<br>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nama Konsumen</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
        </tr>
        
    </thead>
    <tbody>
        <tr>
            @foreach($data as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->nama_konsumen }}</td>
                <td>{{ $v->jk }}</td>
                <td>{{ $v->email }}</td>
                <td>{{ $v->no_telp }}</td>
                <td>{{ $v->alamat }}</td>
                <!-- <td>
                    <form action="{{route('konsumen.destroy',['id'=>$v->id])}}" method="post">
                        <a class="btn btn-warning fa fa-edit" href="{{route("konsumen.edit",["id"=>$v->id])}}"></a>
                        |
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger fa fa-minus-circle" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();"></button>
                    </form>
                </td> -->
            </tr>
            @endforeach
        </tr>
    </tbody>
</table>
<!-- <div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Konsumen</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('konsumen.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" readonly="true" name="id">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input class="form-control" type="text" name="nama_konsumen">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control" type="text" name="jk">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input class="form-control" type="text" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary fa fa-save"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div> -->
@endsection

