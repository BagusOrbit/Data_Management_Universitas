<?php
	require_once "RepositoryMahasiswa.php";
	$repo = new RepositoryMahasiswa();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Management-Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/customes.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Masukkan Data Mahasiswa</h1>
	        <form  method="post">
		      	<div class="form-group">
			      	<div>
			          	<label>Nim</label>
						<input class="form-control" type="tex" name="nim">
			        </div>
		      	</div>
		        <div class="form-group">
		            <div>
		            	<label>Nama</label>
						<input class="form-control" type="text" name="nama">
		            </div>
		        </div>
	        	<div class="form-group">
		            <div>
		            	<label>Inisial</label>
						<input class="form-control" type="text" name="inisial">
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
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];
		if ($nim !=null && $nama != null && $inisial != null) 
		{
			$result = $repo->save($nim,$nama,$inisial);

			if ($result) 
			{
				header("location:index.php");
			}
			else
			{
				echo "Data gagal ditambahkan";
			}
		}
		else
		{
			echo "Data belum di lengkapi !!";
		}
	}
?>