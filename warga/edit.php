<?php
// include database connection file
include("../koneksi.php");
require("../fungsi.php");

$classFunction = new allFunction();
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nokavling=$_POST['nokavling'];
    $namawarga=$_POST['namawarga'];
    $telp=$_POST['telp'];
    $oldfoto=$_POST['oldfoto'];

    if ($_FILES['fotowarga']['name'] == ""){
    	
    // update user data
    	$result = $koneksi->query("UPDATE tbl_member_warga SET no_kavling='$nokavling',nama_warga='$namawarga',telp='$telp',foto_warga='$oldfoto' WHERE id_warga=$id") or die(mysqli_error($koneksi));;
	}else{
    	$newFoto = time()."_".$_FILES['fotowarga']['name'];
		// update user data
    	$result = $koneksi->query("UPDATE tbl_member_warga SET no_kavling='$nokavling',nama_warga='$namawarga',telp='$telp',foto_warga='$newFoto' WHERE id_warga=$id") or die(mysqli_error($koneksi));;

    	$classFunction->uploadImage($_FILES['fotowarga'],$newFoto);
    	$classFunction->deleteImage($oldfoto);

	}


    // Redirect to homepage to display updated user in list
    header("Location: ../admin_warga.php");
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = $koneksi->query("SELECT * FROM tbl_member_warga WHERE id_warga=$id");

while($user_data = mysqli_fetch_array($result))
{
    $no_kavling = $user_data['no_kavling'];
    $name = $user_data['nama_warga'];
    $telephone = $user_data['telp'];
    $fotowarga = $user_data['foto_warga'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="website sistem pakar">
    <meta name="author" content="mr k">
    <link rel="icon" href="../image/3.png">

    <title>CLUB HOUSE</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>

	<div class="container">

      <div class="card ">
        <div class="card-header text-center">
          <h2>CLUB<code>HOUSE</code></h2>
        </div>
        <div class="card-body">
          <form action="" method="post" name="update_user" enctype="multipart/form-data" role="form">
          	<input type="hidden" name="id" value=<?= $_GET['id'];?>>
          	<input type="hidden" name="oldfoto" value=<?= $fotowarga;?>>
            <div class="col-md-6" style="margin: 0px auto;">
                <div class="form-group">
                  <label for="message-text" class="col-form-label">No Kavling </label>
                    <input aria-describedby="nomorkavling" type="text" name="nokavling" value="<?= $no_kavling;?>" class="form-control" placeholder="Isikan Nomor Kavling" required>
                    <small id="nomorkavling" class="form-text text-muted">
                      Contohnya : M-110 artinya Kavling Blok-M Nomor Rumah 110
                    </small>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Nama Lengkap </label>
                  <input aria-describedby="namawarga" type="text" name="namawarga" class="form-control" value="<?= $name;?>" placeholder="Isikan Nama Anda" required autofocus>
                    <small id="namawarga" class="form-text text-muted">
                      Contohnya : Riventus
                    </small>
                </div>
                <!-- <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Jenis Kelamin :</label>
                  <select class="form-control" name="jeniskelamin">
                    <option selected="selected">Pilih Jenis Kelamin</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki-laki</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Telp </label>
                  <input aria-describedby="telephone" type="text" name="telp" class="form-control" value="<?= $telephone;?>" min="999999" max="9999999999999" max-leght="" placeholder="Isikan Nomor HP/Telp" required>
                  <small id="telephone" class="form-text text-muted">
                      Contohnya : 081234567890/0293123456
                  </small>
                </div>
                <div class="form-group">
                  <label for="foto">FOTO PROFIL</label>
                  <input type="file" class="form-control" id="foto" name="fotowarga" placeholder="Input Foto" onchange="return fileValidation()">
                  <div id="imagePreview" ><img src="../our_images/<?= $fotowarga;?>" width="100px"></div>
                  <!-- <div class="invalid-feedback">
                    Upload Foto Anda
                  </div> -->
                </div>
            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="update" onclick="return confirm('Anda yakin merubah data ?')">UPDATE &gt;&gt;&gt;</button>
                </div>
              </form>
        </div>
        <div class="card-footer text-muted"></div>
      </div>

    </div>

  </div>

	

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
  <script>
    function fileValidation(){
          var fileInput = document.getElementById('foto');
          var filePath = fileInput.value;
          var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if(!allowedExtensions.exec(filePath)){
                alert('Extensi file hanya boleh .jpeg.jpg.png.gif');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img width="100px" src="'+e.target.result+'"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    </script>
</body>
</html>