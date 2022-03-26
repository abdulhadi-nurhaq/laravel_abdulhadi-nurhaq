<!DOCTYPE html>
<html>
<head>
	<title>Pasien</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <style type="text/css">
        .cari {
            float : right;
            margin-bottom : 20px;
        }
    </style>
</head>
<body>
    <table border="1" align="center" width="100%" cellpadding="10" cellspacing="0" style="background-color: #e3f2fd">
        <tr height="50">
            <td align="center">
                <a href="/hospital"> Data Rumah Sakit</a> |
                <a href="/pasien"> Data Pasien</a> |
                <a href="/logout">Logout</a> 
            </td>
        </tr>
    </table>
    <div class="container">
		<div class="card">
			<div class="card-body">

				<h3 class="text-center">Data Pasien</h3>

                @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif

				<form action="/pasien/cari" method="GET" class="form-inline">
					<a href="/pasien/tambah" class="btn btn-primary ml-3"> + Tambah Pasien Baru</a>					
					<div class="cari">
						<input class="form-control" type="text" name="cari" placeholder="Cari Nama Pasien" value="<?php echo old('cari') ?>">
						<input class="btn btn-primary ml-3" type="submit" value="CARI">
					</div>
				</form>

				<br/>

				<table class="table table-bordered">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No. Telepon</th>
                        <th class="text-center">ID Rumah Sakit</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    <?php
                        $no = 1;
                        foreach($pasien as $p){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no ?>.</td>
                            <td><?php echo $p->nama ?></td>
                            <td style="width: 300px"><?php echo $p->alamat ?></td>
                            <td class="text-center"><?php echo $p->telepon ?></td>
                            <td class="text-center"><?php echo $p->hospital_id ?></td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="/pasien/edit/<?php echo $p->id ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/pasien/hapus/<?php echo $p->id ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            $no = $no + 1;
                            }
                        ?>
                </table>
            </div>
		</div>
	</div>
</body>
</html>