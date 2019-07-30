<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form action="{{ url('/') }}" method="post">
		{{ csrf_field() }}
		<input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" value="">
		<button type="submit">
			Post
		</button>
	</form>
</body>
</html>