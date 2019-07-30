@extends('navbarbrg.app')

@section('content')
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Kode Jenis</td>
            <td>Harga</td>
            <td>About</td>

        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($data as $i=>$v)
            <tr>
                <td>{{ $v->kd_barang }}</td>
                <td>{{ $v->nm_barang }}</td>
                <td>{{ $v->kd_jenis }}</td>
                <td>{{ $v->harga }}</td>
                <td>
                    <form action="{{route('barang.destroy',['id'=>$v->kd_barang])}}" method="post">
                        <a class="btn btn-success" href="{{route('barang.edit',['id'=>$v->kd_barang])}}">Ubah</a>
                        |
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tr>
</tbody>
</table>
<a class="btn btn-primary" href="{{route("barang.create")}}">Tambah Data</a>
@endsection

