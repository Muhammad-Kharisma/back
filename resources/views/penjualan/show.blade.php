@extends('navbar.app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- <br>
			<button class="btn btn-warning float-right" type="button" onclick="history.back(-1)">Back</button> -->
			<br>
			<h2 class="text-center">D E T A I L - P E N J U A L A N</h2>
			<hr>
			<button  class="btn btn-warning btn-block" name="submit" type="submit" onclick="history.back(-1)">
				<span class="icon text-white-50">
					<i class="fas fa-arrow-left"></i>
				</span>
				<span class="text">Back</span>
			</button>
			<hr>
			<button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Penjualan</button>

		</div>
	</div>

	<h5>
		<strong>Nama Konsumen : {{ $data->konsumen->nama_konsumen }}</strong>
	</h5>
	<h5>
		<strong>Tanggal Pembelian : {{ $data->tanggal }}</strong>
	</h5>

	<hr>
	<table class="table table-hover text-center">
		<tr>
			<td><strong>#ID Penjualan</strong></td>
			<td><strong>Nama Produks</strong></td>
			<td><strong>Kategori</strong></td>
			<td><strong>Harga Produks</strong></td>
			<td><strong>Jumlah Beli</strong></td>
			<td><strong>Total Harga</strong></td>
			<th>Photo Produks</th>
			<td><strong>Tools</strong></td>
		</tr>
		@php
		$total = 0;
		@endphp
		@foreach($data->detail_penjualan as $pen)
		<tr>
			<td>{{ $pen->penjualan->id }}</td>
			<td>{{ $pen->produks->nama_produks }}</td>
			<td>{{ $pen->produks->kategori->nama_kategori }}</td>
			<td>{{ $pen->produks->hargajual }}</td>
			<td>{{ $pen->jumlah }}</td>
			<td>{{ $pen->produks->hargajual * $pen->jumlah }}</td>
			<td>
				<img src="{{$pen->produks->getGambar()}}" width="40px" height="40px" class="img-circle" alt="User Image">
			</td>
			<td>			
				<form action="{{route('detail_penjualan.destroy', ['id'=>$pen->id])}}" method="post">
					{{csrf_field()}}
					{{method_field('DELETE')}}
					<button class="btn btn-danger" type="button" onclick="if (confirm('Hapus ?')) this.form.submit();">
						Hapus
					</button>
				</form>
			</td>
		</tr>
		@php
		$total += $pen->produks->hargajual * $pen->jumlah;
		@endphp
		@endforeach


	</table>
	<hr>
	<h5>
		<strong>
			Total Belanja : Rp. {{ $total }}
		</strong>
	</h5>
	<hr>
	<div class="modal fade" id="exampleModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Detail</h5>
				</div>
				<div class="modal-body">
					<form action="{{ route('detail_penjualan.store') }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="penjualan_id" value="{{ $data->id }}">
						<div class="form-group">
							<label>Nama Produks</label>
							<select name="produks_id" class="form-control">
								<option value="">Pilih</option>
								@foreach($produks as $b)
								<option value="{{ $b->id }}">{{ $b->nama_produks }}  - {{ $b->kategori->nama_kategori }} ( Rp. {{ $b->hargajual }} )</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" name="jumlah" class="form-control">
						</div>
						<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
	@endsection