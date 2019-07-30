@extends('layout.app')

@section('content')
<form method="post" action="{{route("produks.store")}}">
	{{ csrf_field() }}
	<br>
	<label>ID Produks</label>
	<input class="form-control" type="text" readonly="true" name="id">
	<br>
	<label>Nama Produks</label>
	<input class="form-control" type="text" name="nama_produks">
	<br>
	<label>Jumlah</label>
	<input class="form-control" type="text" name="jumlah">
	<br>
	<label>Harga Beli</label>
	<input class="form-control" type="text" name="hargabeli">
	<br>
	<label>Harga Jual</label>
	<input class="form-control" type="text" name="hargajual">
	<br>
	<div class="form-group">
		<label>ID Kategori - Nama Kategori</label>
		<select name="kategori_id" class="form-control">
			<option>Pilih ..</option>
			@foreach($kategori as $v)
			<option 
			value=" {{ $v->id }} "
			@if ($v->id == $post->kategori_id)
			selected
			@endif
			>
			{{ $v->id }} - {{ $v->nama_kategori }}</option>
			@endforeach
		</select>
	</div>
	<br>
	<button class="btn btn-success" type="submit">Simpan</button> | 
	<button class="btn btn-danger" type="reset">Reset</button> |
	<button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection