<?php
	require_once "RepositoryMahasiswa.php";
	$repo = new RepositoryMahasiswa();
	$rows = $repo->getById($_GET['id']);
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
			<h1>Edit Data Mahasiswa</h1>
	        <form  method="post">
	        	<input type="hidden" name="id" value="<?php echo $rows->id; ?>" />
		      	<div class="form-group">
			      	<div>
			          	<label>Nim</label>
						<input class="form-control" type="tex" name="nim" value="<?php echo $rows->nim ?>">
			        </div>
		      	</div>
		        <div class="form-group">
		            <div>
		            	<label>Nama</label>
						<input class="form-control" type="text" name="nama" value="<?php echo $rows->nama ?>">
		            </div>
		        </div>
	        	<div class="form-group">
		            <div>
		            	<label>Inisial</label>
						<input class="form-control" type="text" name="inisial" value="<?php echo $rows->inisial ?>">
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
		$id = $_POST['id'];
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$inisial = $_POST['inisial'];

		$result = $repo->Update($nim,$nama,$inisial,$id);
		if ($result) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal ditambahkan";
		}

	}