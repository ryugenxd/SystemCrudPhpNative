<?php
require "../__MODULE__/__module.php";
$id=$_GET['id'];
$file = $_GET['name'];
if(isset($id) && isset($file)){
if(delete($id)){
	echo "<script>alert('DATA BERHASIL DI HAPUS '.$file.'');document.location.href='../index.php';</script>";
}else{
	echo "<script>alert('DATA GAGAL DI HAPUS');document.location.href='../index.php';</script>";
}
}
