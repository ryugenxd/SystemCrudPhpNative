<?php

/*******************************************
*        CONNECT KE DATABASE               *
* DB Name = ryugen_store                       *
* TABLE Name = data                              *
*  VALUE TABEL :                                   *
*  - id primery key auto increment             *
*  - gambar varchar  255                         *
*  - bio text                                            *
********************************************/
#HOST
define("HOST","127.0.0.1"); 
#USER
define("USER","root");
#PASS
define("PASS","1234");
#DB
define("DB","ryugen_store");

#__conek ke mysqli server
$koneksi = mysqli_connect(HOST,USER,PASS,DB);

#__fungsi query perintah 
function query($data){
	#global_variabel
	global $koneksi;
	$hasil = mysqli_query($koneksi,$data);
	$array = [];
	#menghitung row /baris data base
	while($row = mysqli_fetch_assoc($hasil)){
		$array[]=$row;
		#memasaukan kedalam variabel array 
	}
	return $array;
}

#__fungsi add list
function add($data){
	global $koneksi;
	$gambar = upload();
	$bio = htmlspecialchars($data['bio']);
	if(!$gambar){
		return false;
	}
	$query ="INSERT INTO data (gambar,bio) VALUES ('$gambar','$bio')";
	mysqli_query($koneksi,$query);
	return mysqli_affected_rows($koneksi);
}

#__upload file
function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES["gambar"]['error'];
	$tmpNama = $_FILES["gambar"]["tmp_name"];
	if($error === 4){
		echo "<script>
       alert('Pilih Gambar Terlebih Dahulu !');
       </script>";
		return false;
	}
	$ekstensi_file = ["jpg","jpeg","png","gif"];
	$ekstensi_gambar = explode('.',$namaFile);
	$ekstensi_gambar = strtolower(end($ekstensi_gambar));
	if(!in_array($ekstensi_gambar,$ekstensi_file)){
		echo "<script>
        alert('Ma\'af berkas yang anda upload tidak di izinkan');
        </script>";
		return false;
	}
	if($ukuranFile > 1000000){
		echo "<script>
        alert('Ma\'af Ukuran File terlalu Besar');
        </script>";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .='.';
	$namaFileBaru .= $ekstensi_gambar;
	move_uploaded_file($tmpNama,"../img/".$namaFileBaru);
	return "img/".$namaFileBaru;
}

#_________function delete kolom database 

function delete($id){
	global $koneksi;
	$query = "DELETE FROM data WHERE id=$id";
	mysqli_query($koneksi,$query);
	#fdelete($file);
	return mysqli_affected_rows($koneksi);
}
#__________function delete file

function fdelete($nameF){
	$nama = glob($namaF);
	foreach( $nama as $F){
		if(is_file($F))
		unlink($F);
	}
}