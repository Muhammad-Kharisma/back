@extends('layout.app')

@section('content')
<form method="post" action="{{route("kategori.store")}}">
	{{ csrf_field() }}
	<br>
	<label>ID Kategori</label>
	<input class="form-control" type="text" readonly="true" name="id">
	<br>
	<label>Nama Kategori</label>
	<input class="form-control" type="text" name="nama_kategori">
	<br>
	<!-- <label>Nama Barang</label>
	<select class="form-control">
		@foreach($data as $v)
		@foreach($v->produks as $pro)
		<option >{{ $pro->nama }}</option>
		@endforeach
		@endforeach
	</select>
	<br> -->
	<button class="btn btn-success" type="submit">Simpan</button> | 
	<button class="btn btn-danger" type="reset">Reset</button> |
	<button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection