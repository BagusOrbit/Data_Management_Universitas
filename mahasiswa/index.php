<?php 

require_once "RepositoryMahasiswa.php";

$repo = new RepositoryMahasiswa();


if (isset($_GET['aksi']) and $_GET['aksi'] == 'hapus') 
	{
		if ($repo->delete($_GET['id'])) 
		{
			header("location:index.php");
		}
		else
		{
			echo "Data gagal di hapus";
		}
	}

if (isset($_GET['q'])) 
	{
		
		$result = $repo->getByKatakunci($_GET['q']);
	}
	else
	{
		$result= $repo->getAll();
	}
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
<h1>Data Mahasiswa</h1>
	<div class="row">
		<div class="col-md-4">
			<form class="form-inline" method="get">
				<input type="text" class="form-control" placeholder="cari" name="q">
				<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
			</form><br>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4" align="right" >
			<a href="../index.php"><button class="btn btn-warning" ><i class="glyphicon glyphicon-home"></i></button></a>
			<a href="insert.php"><button class="btn btn-primary" ><i class="glyphicon glyphicon-plus"></i></button></a>
		</div>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th width="20">No.</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Inisial</th>
			<th>Aksi</th>
		</tr>
		<?php
			$no = 1;
			foreach ($result as $row) 
			{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->nim; ?></td>
			<td><?php echo $row->nama; ?></td>
			<td><?php echo $row->inisial; ?></td>
			<td align="right">
				<a href="edit.php?id=<?php echo $row->id; ?>"><button class="btn btn-info" ><i class="glyphicon glyphicon-edit"></i></button></a>
				<a href="index.php?id=<?php echo $row->id; ?>&aksi=hapus" onclick="return confirm('Yakin akan di hapus');"><button class="btn btn-danger" ><i class="glyphicon glyphicon-remove"></i></button></a>
			</td>
		</tr>
		<?php 
			}
		?>
		<tr>
			<td colspan="5"><?php echo "Total data : ".$repo->rowCount(); ?></td>
		</tr>
	</table>

</div>




	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>