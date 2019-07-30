@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - P E N J U A L A N</h1>
<hr>
<a href="" class="btn btn-primary btn-circle float-right btn-lg" data-toggle="modal" data-target="#tambah">
    <strong>Add</strong>
</a>
<br>
<br>
<table class="table table-hover text-center">
	<tr>
		<td><strong>#ID</strong></td>		
		<td><strong>Konsumen</strong></td>
		<td><strong>Tanggal</strong></td>			
		<td><strong>Tools</strong></td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{ $v->id}}</td>		
		<td>{{ $v->konsumen->nama_konsumen }}</td>				
		<td>{{ $v->tanggal }}</td>
		<td>			
			<form action="{{route('penjualan.destroy', ['id'=>$v->id])}}" method="post">
				<a href="{{route('penjualan.show', ['id'=>$v->id])}}" class="btn btn-info btn-circle">
					<i class="fas fa-info-circle"></i>

				</a> |
				<!-- <a class="btn btn-warning fa fa-edit" href="{{route('penjualan.edit', ['id'=>$v->id])}}"></a> | --> 
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button class="btn btn-danger btn-circle" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();"><i class="fas fa-trash"></i></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Register Penjualan</h5>
			</div>
			<div class="modal-body">
				<form action="{{ route('penjualan.store') }}" method="POST">
					{{ csrf_field() }}
					<input class="form-control" type="hidden" readonly="true" name="id">
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
					<div class="form-group">
						<label>Tanggal</label>
						<input class="form-control" type="date" name="tanggal">
					</div>
					<button type="submit" name="submit" class="btn btn-primary fa fa-save"></button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>
@endsection