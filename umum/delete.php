<?php 
	include("../koneksi.php");
	require("../fungsi.php");

	$classFunction = new allFunction();
	// Get id from URL to delete that user
	$id = $_GET['id'];

    $result = $koneksi->query("SELECT * FROM tbl_member_umum WHERE id_umum=$id");
    while($user_data = mysqli_fetch_array($result))
	{
	    $fotoumum = $user_data['foto_umum'];
	}
    $classFunction->deleteImage($fotoumum);

	// Delete user row from table based on given id
	$result = $koneksi->query("DELETE FROM tbl_member_umum WHERE id_umum=$id");

	// After delete redirect to Home, so that latest user list will be displayed.
    header("Location: ../admin_umum.php");


 ?>