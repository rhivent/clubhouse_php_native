<?php
// include database connection file
include("../koneksi.php");
require("../fungsi.php");

$classFunction = new allFunction();
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $nama_umum = $_POST['namaumum'];
    $jenisMember = $_POST['jenismember'];
    $jenisPaket = $_POST['jenispaket'];
    $_alamat = $_POST['alamat'];
    $tgllahir = $_POST['birth'];
    $terbilang = $_POST['terbilang'];
    $oldfoto = $_POST['oldfoto'];


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


  if ($_FILES['fotoumum']['name'] == ""){
    	
    // update user data
    	$result = $koneksi->query("UPDATE tbl_member_umum SET nama_umum='$nama_umum',jenis_member='$jenisMember',jenis_paket='$jenispaket1',biaya='$jenisPaket',alamat='$_alamat',tgl_lahir='$tgllahir',foto_umum='$oldfoto',masa_berlaku=$masa_berlaku WHERE id_umum=$id") or die(mysqli_error($koneksi));
	}else{
    	$newFoto = time()."_".$_FILES['fotoumum']['name'];
		// update user data
    	$result = $koneksi->query("UPDATE tbl_member_umum SET nama_umum='$nama_umum',jenis_member='$jenisMember',jenis_paket='$jenispaket1',biaya='$jenisPaket',alamat='$_alamat',tgl_lahir='$tgllahir',foto_umum='$newFoto',masa_berlaku=$masa_berlaku WHERE id_umum=$id") or die(mysqli_error($koneksi));
      
      // echo "<pre>";
      // var_dump($_POST);
      // echo "</pre>";
      // var_dump($result);
      // var_dump($newFoto);
      // die();
    	$classFunction->uploadImage($_FILES['fotoumum'],$newFoto);
    	$classFunction->deleteImage($oldfoto);

	}


    // Redirect to homepage to display updated user in list
    header("Location: ../admin_umum.php");
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = $koneksi->query("SELECT tbl_member_umum.*,jenis_paket.* FROM tbl_member_umum LEFT JOIN jenis_paket ON tbl_member_umum.jenis_paket=jenis_paket.id_jenis_paket WHERE id_umum=$id");

while($user_data = mysqli_fetch_array($result))
{
  // echo "<pre>";
  // var_dump($user_data);
  // echo "</pre>";
  // die();
    $name = $user_data['nama_umum'];
    $member = $user_data['jenis_member'];
    $paket = $user_data['jenis_paket'];
    $alamat = $user_data['alamat'];
    $biaya = $user_data['harga'];
    $birth = $user_data['tgl_lahir'];
    $fotoumum = $user_data['foto_umum'];
    $terbilang = $user_data['terbilang'];
}


  $get_jenis_member=$koneksi->query("SELECT * FROM jenis_member ORDER BY id_jenismember ASC");
  $option_member = '<option>Pilih Jenis Member</option>';
  while($row = mysqli_fetch_array($get_jenis_member))
  {
    if($row['kode_jenis_member'] == $member){
      $option_member .= '<option value = "'.$row['kode_jenis_member'].'" selected>'.$row['nama_jenis_member'].'</option>';
    }else{
      $option_member .= '<option value = "'.$row['kode_jenis_member'].'">'.$row['nama_jenis_member'].'</option>';
    }

  }
  
  $get_jenis_paket=$koneksi->query("SELECT * FROM jenis_paket ORDER BY id_jenis_paket ASC");
  $option_paket = '<option>Pilih Jenis Paket</option>';
  while($row = mysqli_fetch_array($get_jenis_paket))
  {

    if($row['id_jenis_paket'] == (int)$paket){
      $option_paket .= '<option value = "'.$row['harga'].'" selected>'.$row['nama_jenis_paket'].'</option>';
    }else if((int)$paket == 1){
      $option_paket .= '<option value = "'.$row['harga'].'" id="harian123">'.$row['nama_jenis_paket'].'</option>';
    }else{
      $option_paket .= '<option value = "'.$row['harga'].'">'.$row['nama_jenis_paket'].'</option>';
    }

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
           <form action="" class="needs-validation was-validated" novalidate method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="id" value=<?= $_GET['id'];?>>
            <input type="hidden" name="oldfoto" value=<?= $fotoumum;?>>
            <div class="modal-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Lengkap</label>
                    <input type="text" class="form-control" id="validationCustom01" name="namaumum" placeholder="Nama Anda" value="<?= $name;?>" required autofocus>
                  
                  </div>

                    <div class="col-md-4 mb-3">
                      <label for="recipient-name" class="col-form-label">Jenis Member</label>
                      <select class="custom-select jenismember" name="jenismember" id="jenismember" required>
                        <?= $option_member;?>
                      </select>
                     
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="recipient-name" class="col-form-label">Jenis Paket</label>
                      <select class="custom-select jenispaket" id="jenispaket"  name="jenispaket" required>
                        <?= $option_paket;?>
                      </select>
                    </div>
              </div>

            <div class="form-group">
               <label for="validationCustom05">Alamat</label>
              <textarea class="form-control is-invalid" id="validationCustom05" name="alamat" placeholder="Ketikkan alamat lengkap Anda" required><?= $alamat;?></textarea>
              

            </div>

            <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="biaya">Biaya</label>
              <input type="text" class="form-control" disabled id="biaya" name="biaya" placeholder="Rp #######" value="<?= $biaya;?>" required/>
             
            </div>

            <div class="col-md-3 mb-3">
              <label for="birth">Tgl Lahir</label>
              <input type="date" class="form-control" id="birth" name="birth" placeholder="Input Tgl Lahir" value="<?= $birth;?>" required>
           
            </div>
            <div class="col-md-3 mb-3">
              <label for="foto">FOTO PROFIL</label>
              <input type="file" class="form-control" id="foto1" name="fotoumum" placeholder="Input Foto" onchange="return fileValidation1()">
              <div id="imagePreview1"><img src="../our_images/<?= $fotoumum;?>" width="100px"></div>
             
            </div>
            
          </div>

          <div class="form-group">
            <label for="validationCustom09">Terbilang Harga</label>
            <input class="form-control is-invalid" id="validationCustom09" name="terbilang" placeholder="Ketikkan harga pembayaran dalam huruf" value="<?= $terbilang;?>" required>
          </div>

            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="update">UPDATE &gt;&gt;&gt;</button>
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
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
    <script>
      $(".jenispaket").change(function () {
        $("#biaya").val($('#jenispaket').val());
      });
    </script>
    <script>
       $('.jenismember').change(function () {
            if ($('#jenismember').val() == 'isidentil') {
              $(".jenispaket option[value='15000']").removeClass("d-none");
              $(".jenispaket option[value='450000']").addClass("d-none");
              $(".jenispaket option[value='800000']").addClass("d-none");
              $(".jenispaket option[value='1200000']").addClass("d-none");
              var harga = $("#harian123").val();
              $("#biaya").val(harga);
            }else if($('#jenismember').val() != 'isidentil'){
              $(".jenispaket option[value='15000']").addClass("d-none");
              $(".jenispaket option[value='450000']").removeClass("d-none");
              $(".jenispaket option[value='800000']").removeClass("d-none");
              $(".jenispaket option[value='1200000']").removeClass("d-none");
            }

            // if($('#jenismember').val() != 'isidentil'){
            //   $(".jenispaket option[value='15000']").remove();
            // }
        })

        function fileValidation1(){
          var fileInput = document.getElementById('foto1');
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
                        document.getElementById('imagePreview1').innerHTML = '<img width="100px" src="'+e.target.result+'"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    </script>
</body>
</html>