<?php
require "__MODULE__/__module.php";
$views = query("SELECT * FROM data");
?>
<!Doctype html>
<html lang="id">
	<head>
		<link rel="short icon" href="#"/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no"/>
		<title>RYUGEN STORY</title>
		<link rel="stylesheet" href="./css/daftar.css"/>
	</head>
	<body>
		<div class="container">
		<!-- JUDUL HALAMAN -->
			
			<div class="title">
				<h1>BIODATA</h1>
			</div>
			
		<!-- End Judul -->
	   <br>
	   <!-- BUTTON ADD DATA -->
		<a class="link" href="./__INDEX__/add.php"><span class="add">
			ADD LIST
		</span></a>
		<!-- END BUTTON ADD-->
			
		<!--- LIST DATA -->
		<?php $nomor=1;?>
		<table color="white" class="list" border="1" cellpadding="5" cellspacing="10">
			<!-- fix bug tabel loop 2x : jangan di loop di sini -->
			<thead style="background:#00BBFF;">
				<tr>
					<th>NO</th>
					<th>FOTO</th>
					<th>BIOGRAFI</th>
					<th>SETTING</th>
				</tr>
			</thead>
			<?php foreach($views as $vi) :?>
			<tbody class="bio">
				<tr>
					<td class="isi"><?=$nomor;?>.</td>
					<td><img alt="GAMBAR" width="50px" src="<?=$vi['gambar'];?>"/></td>
					<td class="isi"><?=$vi['bio'];?></td>
					<td><a  id="btn-delete" class="link" href="./__INDEX__/delete.php?id=<?=$vi['id'];?>&&name=<?=$vi['gambar'];?>">DELETE</a></td>
				</tr>
			</tbody>
			<?php $nomor++;?>
			<?php endforeach;?>
		</table>
		<!-- END LIST DATA -->
		</div>
	</body>
</html>