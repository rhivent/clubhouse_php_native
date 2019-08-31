<?php
include ("koneksi.php");
require_once("fungsi.php");
// echo "<pre>";
// var_dump($_POST);
// var_dump($_FILES);
// echo "</pre>";
// die();
$classFunction = new allFunction();
if(isset($_POST['submit'])){
	try {
       $fileName = time()."_".$_FILES['fotowarga']['name'];
       $sql = "INSERT INTO tbl_member_warga (no_kavling,nama_warga,telp,tgl_daftar,barcode,foto_warga) VALUES ('".$_POST['nokavling']."','".$_POST['namawarga']."','".$_POST['telp']."','".date('Y-m-d H:i:s')."','".$classFunction->generateRandomString()."','".$fileName."')";
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $classFunction->uploadImage($_FILES['fotowarga'],$fileName);       

    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('Data berhasil di simpan');
         window.location.href='index.php';
         </script>";
}

if(isset($_POST['submit3'])){
  try {
       $fileName = time()."_".$_FILES['fotokryawan']['name'];
       $sql = "INSERT INTO tbl_member_karyawan (nama_karyawan,jabatan,telp,tgl_daftar,barcode,foto_karyawan) VALUES ('".$_POST['namakarywan']."','".$_POST['jenisjbtn']."','".$_POST['telp']."','".date('Y-m-d H:i:s')."','".$classFunction->generateRandomString()."','".$fileName."')";
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $classFunction->uploadImage($_FILES['fotokryawan'],$fileName);       

    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('Data berhasil di simpan');
         window.location.href='index.php';
         </script>";
}

if(isset($_POST['submit1'])){
	$masa_berlaku ="";
	if($_POST['jenispaket'] == "15000"){
		$masa_berlaku = "DATE_ADD('".date('Y-m-d')."', INTERVAL 1 DAY)";
	}else if($_POST['jenispaket'] == "450000"){
		$masa_berlaku = "DATE_ADD('".date('Y-m-d')."', INTERVAL 30 DAY)";
	}else if($_POST['jenispaket'] == "800000"){
		$masa_berlaku = "DATE_ADD('".date('Y-m-d')."', INTERVAL 60 DAY)";
	}else{
		$masa_berlaku = "DATE_ADD('".date('Y-m-d')."', INTERVAL 90 DAY)";
	}

	$jenispaket1 = "";
	if($_POST['jenispaket'] == "15000"){
		$jenispaket1 = "1";
	}else if($_POST['jenispaket'] == "450000"){
		$jenispaket1 = "2";
	}else if($_POST['jenispaket'] == "800000"){
		$jenispaket1 = "3";
	}else{
		$jenispaket1 = "4";
	}

	try {
       $fileName = time()."_".$_FILES['fotoumum']['name'];
       $sql = "INSERT INTO tbl_member_umum (nomor_kartu,nama_umum,barcode,status,jenis_member,jenis_paket,alamat,tgl_lahir,foto_umum,biaya,tgl_aktifitas,masa_berlaku) VALUES ('".mt_rand(9999, 99999)."','".$_POST['namaumum']."','".$classFunction->generateRandomString()."','active','".$_POST['jenismember']."','".$jenispaket1."','".$_POST['alamat']."','".$_POST['birth']."','".$fileName."','".$_POST['jenispaket']."','".date('Y-m-d')."',".$masa_berlaku."); ";

       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $classFunction->uploadImage($_FILES['fotoumum'],$fileName);       

    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('SILAHKAN MELAKUKAN PEMBAYARAN SEBESAR Rp ".number_format($_POST['jenispaket'],0,'','.')."');
         window.location.href='index.php';
         </script>";
}

if(isset($_POST['submit2'])){
  $masa_berlaku = "DATE_ADD('".date('Y-m-d')."', INTERVAL 1 DAY)";

  try {
       $fileName = time()."_".$_FILES['fotoumum']['name'];
       $sql = "INSERT INTO tbl_member_isidentil (nomor_kartu,nama_umum,barcode,status,jenis_member,jenis_paket,alamat,tgl_lahir,foto_umum,biaya,terbilang,tgl_aktivitas,masa_berlaku) VALUES ('".mt_rand(99999, 999999)."','".$_POST['namaumum']."','".$classFunction->generateRandomString()."','active','".$_POST['jenismember']."','".$_POST['jenispaket']."','".$_POST['alamat']."','".$_POST['birth']."','".$fileName."','".$_POST['biaya']."','".$_POST['terbilang']."','".date('Y-m-d')."',".$masa_berlaku."); ";

       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $classFunction->uploadImage($_FILES['fotoumum'],$fileName);       

    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('SILAHKAN MELAKUKAN PEMBAYARAN SEBESAR Rp ".number_format($_POST['biaya'],0,'','.')."');
         window.location.href='index.php';
         </script>";
}




?>