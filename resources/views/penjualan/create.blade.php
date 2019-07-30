@extends('layout.app')

@section('content')
<h1 class=""></h1>
<form method="post" action="{{route('penjualan.store')}}">
	{{ csrf_field() }}
	<br>
	<label>ID Penjualan</label>
	<input class="form-control" type="text" readonly="true" name="id">
	<br>
	<div class="form-group">
		<label>Pelanggan</label>
		<select name="konsumen_id" class="form-control">
			<option value="">Pilih</option>
			@foreach($konsumen as $v)
			<option 
			value=" {{ $v->id }} "
			@if ($v->id == $post->konsumen_id)
			selected
			@endif
			>
			{{ $v->id }} - {{ $v->nama_konsumen }}</option>
			@endforeach
		</select>
	</div>
	<br>	
	<label>Tanggal</label>
	<input class="form-control" type="date" name="tanggal">
	<br>
	<button class="btn btn-success" type="submit">Simpan</button> | 
	<button class="btn btn-danger" type="reset">Reset</button> |
	<button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection