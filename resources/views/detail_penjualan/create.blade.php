@extends('layout.app')

@section('content')
<form method="post" action="{{route('penjualan_detail.store')}}">
	{{ csrf_field() }}
	<br>
	<label>ID Penjualan Detail</label>
	<input class="form-control" type="text" readonly="true" name="id">
	<br>
	<div class="form-group">
		<label>ID Penjualan - Nama Pelanggan</label>
		<select name="id_penjualan" class="form-control">
			@foreach($penjualan as $v)
			<option 
			value=" {{ $v->id }} "
			@if ($v->id == $post1->id_penjualan)
			selected
			@endif
			>
			{{ $v->id }} - {{ $v->pelanggan->nama_pelanggan }}</option>
			@endforeach
		</select>
	</div>
	<br>
	<div class="form-group">
		<label>ID Produks - Nama Produks</label>
		<select name="id_produks" class="form-control">
			@foreach($produks as $v)
			<option 
			value=" {{ $v->id }} "
			@if ($v->id == $post2->id_produks)
			selected
			@endif
			>
			{{ $v->id }} - {{ $v->nama }}</option>
			@endforeach
		</select>
	</div>
	<br>	
	<label>Jumlah</label>
	<input class="form-control" type="text" name="jumlah">
	<br>
	<button class="btn btn-success" type="submit">Simpan</button> | 
	<button class="btn btn-danger" type="reset">Reset</button> |
	<button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection