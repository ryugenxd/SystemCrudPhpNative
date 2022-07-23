<?php
require "../__MODULE__/__module.php";
if(isset($_POST["add"])){
	if(add($_POST) > 0){
		echo "<script>alert(\"Data Berhasil Di Tambahkan\");</script>";
	}else{
      echo "<script>alert(\"Data Gagal Di Tambahkan\");</script>";
    }
}
?>
<!Doctype html>
<html lang="id">
	<head>
		<link rel="short icon" href="#"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
		<title>Add List</title>
		<link rel="stylesheet" href="../css/add.css"/>
	</head>
	<body>
		<!-- JUDUL HALAMAN -->
			
			<div class="title">
				<h1>TAMBAKAN DATA</h1>
			</div>
			
		<!-- End Judul -->
	   <!-- BUTTON ADD DATA -->
		<br>
		<a class="link" href="../index.php"><span class="add">
			BACK TO LIST
		</span></a>
		<!-- END BUTTON ADD-->
		<br>
		<div class="container">
			
			<div class="wrapper">
			<!-- Tabel formulir -->
			<table >
				<form action="" method="post"  enctype="multipart/form-data" >
				<!-- input data -->
				<h4>BIOGRAFI: </h4>
				<tr>
					<tf><label for="img" >image: </label><input id="img" name="gambar" type="file" accept="image/*" /></td>
				</tr>
				<tr>
					<td class="form">
						<textarea id="bio" name="bio" cols="30" rows="5"></textarea>
                    </td>
				</tr>
				<tr>
					<td><div class="foto"></div></td>
				</tr>
				<tr class="container">
					<td>
						<input   class="btn-add" name="add" type='submit' value="ADD DATA"/>
					</td>
				</tr>
				</form>
			</table>
			<!-- End tabel -->
			<div>
		</div>
		<script src="../js/add.js"></script>
	</body>
</html>