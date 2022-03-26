<!DOCTYPE html>
<html>
<head>
	<title>Rumah Sakit</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style>
	.container{
		position: absolute;
		left: 25%;
	}
</style>
<body>
<div class="container">
	<div class="row">
		<div class="col col-md-6 justify-content-center align-items-center">

			<h3 class="text-center">Tambah Data Rumah Sakit</h3>

			<div class="text-center">	
				<a href="/hospital" class="btn btn-success"> Kembali</a>
			</div>

			<br/>
			<br/>

			<form action="/hospital/store" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<b><label for="">Nama :</label></b>
					<input type="text" name="nama" class="form-control" placeholder="Nama Rumah Sakit" autocomplete="off"  required="required">
				</div>
				<div class="form-group">
					<b><label for="">Alamat :</label></b>
					<input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah Sakit" autocomplete="off"  required="required">
				</div>
				<div class="form-group">
					<b><label for="">Email :</label></b>
					<input type="text" name="email" class="form-control" placeholder="Email Rumah Sakit" autocomplete="off"  required="required">
				</div>
				<div class="form-group">
					<b><label for="">No. Telepon :</label></b>
					<input type="text" name="telepon" class="form-control" placeholder="No. Telepon Rumah Sakit" autocomplete="off">
				</div>
				<input type="submit" class="btn btn-primary" style="float: right" value="Simpan Data">
			</form>
		</div>
	</div>
</div>
</body>
</html>