@extends('navbar.app')

@section('content')

<form method="post" action="{{route('penjualan.update',['id'=>$penjualan->id])}}">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<br>
	<label>ID Penjualan</label>
	<input class="form-control" type="hidden" name="_method" value="PUT">
	<input class="form-control" type="text" readonly="true" name="id" value="{{ $penjualan->id }}">
	<br>
	<label>ID Pelanggan - Nama Pelanggan</label>
	<select name="id_pelanggan" class="form-control">
		@foreach($pelanggan as $v)
		<option 
		value=" {{ $v->id }} "
		@if ($v->id == $post->id_pelanggan)
		selected
		@endif
		>
		{{ $v->id }} - {{ $v->nama_pelanggan }}</option>
		@endforeach
	</select>
	<br>
	<label>Tanggal</label>
	<input class="form-control" type="hidden" name="_method" value="PUT">
	<input class="form-control" type="date" name="tanggal" value="{{ $penjualan->tanggal }}">
	<br>
	<button class="btn btn-success" type="submit">Simpan</button> | 
	<button class="btn btn-danger" type="reset">Reset</button> |
	<button class="btn btn-warning" type="button" onclick="history.back(-1)">Back</button>
</form>
@endsection