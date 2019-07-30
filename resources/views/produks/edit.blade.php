@extends('navbar.app')

@section('content')
<br>
<h1 class="text-center">D A T A - P R O D U K S</h1>
<hr>
<div class="">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Produks</h5>
			</div>
			<div class="modal-body">
				<form action="{{route('produks.update',['id'=>$produks->id])}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input class="form-control" type="hidden" name="_method" value="PUT">
					<input class="form-control" type="hidden" name="id" value="{{ $produks->id }}">
					<div class="form-group">
						<label>Nama Produks</label>
						<input class="form-control" type="hidden" name="_method" value="PUT">
						<input class="form-control" type="text" name="nama_produks" value="{{ $produks->nama_produks }}">
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input class="form-control" type="hidden" name="_method" value="PUT">
						<input class="form-control" type="text" name="jumlah" value="{{ $produks->jumlah }}">
					</div>
					<div class="form-group">
						<label>Harga Beli</label>
						<input class="form-control" type="hidden" name="_method" value="PUT">
						<input class="form-control" type="text" name="hargabeli" value="{{ $produks->hargabeli }}">
					</div>
					<div class="form-group">
						<label>Harga Jual</label>
						<input class="form-control" type="hidden" name="_method" value="PUT">
						<input class="form-control" type="text" name="hargajual" value="{{ $produks->hargajual }}">
					</div>
					<div class="form-group">
						<label>Kategori</label>
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
					<div class="form-group">
                        <label>Upload gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" value="">{{ $produks->deskripsi }}</textarea>
                    </div>
					<button class="btn btn-success btn-circle" type="submit" name="submit"><i class="fas fa-check"></i></button>
				</form>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-danger btn-block" name="submit" type="submit" onclick="history.back(-1)">
					<span class="icon text-white-50">
						<i class="fas fa-arrow-left"></i>
					</span>
					<span class="text">Batal</span>
				</button>
			</div>
		</div>
	</div>
</div>
@endsection