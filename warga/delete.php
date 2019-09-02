<?php 
	include("../koneksi.php");
	require("../fungsi.php");

	$classFunction = new allFunction();
	// Get id from URL to delete that user
	$id = $_GET['id'];

    $result = $koneksi->query("SELECT * FROM tbl_member_warga WHERE id_warga=$id");
    while($user_data = mysqli_fetch_array($result))
	{
	    $fotowarga = $user_data['foto_warga'];
	}
    $classFunction->deleteImage($fotowarga);

	// Delete user row from table based on given id
	$result = $koneksi->query("DELETE FROM tbl_member_warga WHERE id_warga=$id");

	// After delete redirect to Home, so that latest user list will be displayed.
    header("Location: ../admin_warga.php");


 ?>