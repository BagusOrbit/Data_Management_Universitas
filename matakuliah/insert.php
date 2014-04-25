<?php
	require_once "RepositoryMakul.php";
	$repo = new RepositoryMakul();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Management-Data Matakuliah</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/customes.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Masukkan Data Matakuliah</h1>
	        <form  method="post">
		      	<div class="form-group">
			      	<div>
			          	<label>Kode Matakuliah</label>
						<input class="form-control" type="tex" name="kode_makul">
			        </div>
		      	</div>
		        <div class="form-group">
		            <div>
		            	<label>Nama Matakuliah</label>
						<input class="form-control" type="text" name="nama_makul">
		            </div>
		        </div>
	        	<div class="form-group">
		            <div>
		            	<label>SKS</label>
						<input class="form-control" type="text" name="sks" placeholder="masukkan angka">
		            </div>
	          	</div> 	
		        <div class="form-group">
		            <div>
		              <button type="submit" class="btn btn-primary">Simpan</button>
		              <a href="index.php"><button type="button" class="btn btn-success">Batal</button></a>
		            </div>
		        </div>
	        </form>
		</div>
	</div>

</body>
</html>
<?php 
	if ($_POST) 
	{
		$kode_makul = $_POST['kode_makul'];
		$nama_makul = $_POST['nama_makul'];
		$sks = $_POST['sks'];
		if ($kode_makul !=null && $nama_makul != null && $sks != null) 
		{
			$result = $repo->Save($kode_makul,$nama_makul,$sks);
			if ($result) 
			{
				header("location:index.php");
			}
			else
			{
				echo "Data Gagal disimpan !!";
			}	
		}
		else
		{
			echo "Data belum di lengkapi !!";
		}
	}
?>