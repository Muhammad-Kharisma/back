@extends('layout.app')

@section('content')
<br>
<table class="table table-bordered">
	<tr>
		<td>ID</td>		
		<td>ID Penjualan</td>		
		<td>ID Produks</td>
		<td>Total Harga</td>		
		<td>Tools</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{ $v->id}}</td>		
		<td>{{ $v->penjualan_id}}</td>		
		<td>{{ $v->produks_id}} - {{ $v->produks->nama_produks }}</td>				
		<td>{{ $v->total_harga }}</td>					
		
		<td>			
			<form action="{{route('detail_penjualan.destroy', ['id'=>$v->id])}}" method="post">
				<a class="btn btn-success" href="{{route('detail_penjualan.edit', ['id'=>$v->id])}}">Ubah</a> | 
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button class="btn btn-danger" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();">
					Hapus
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
<a class="btn btn-primary" href="{{route('detail_penjualan.create')}}">Tambah</a>
@endsection