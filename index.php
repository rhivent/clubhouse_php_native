<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="website sistem pakar">
    <meta name="author" content="mr k">
    <link rel="icon" href="image/3.png">

    <title>CLUB HOUSE</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <style type="text/css">
         /* Container holding the image and the text */
        .container {
          position: relative;
          text-align: center;
          color: white;
        }
        .container {
          max-width: 100%;
        }
        /* Bottom left text */
        .bottom-left {
          position: absolute;
          bottom: 8px;
          left: 16px;
        }

        /* Top left text */
        .top-left {
          position: absolute;
          top: 8px;
          left: 16px;
        }

        /* Top right text */
        .top-right {
          position: absolute;
          top: 8px;
          right: 16px;
        }

        /* Bottom right text */
        .bottom-right {
          position: absolute;
          bottom: 8px;
          right: 16px;
        }

        /* Centered text */
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        } 
      </style>
</head>
<body>

  <div class="container">
    <img src="image/bg-1.gif" alt="Snow" style="width:100%;">
    <div class="centered text-dark">

      <div class="card text-center">
        <div class="card-header">
          <h2>CLUB<code>HOUSE</code></h2>
        </div>
        <div class="card-body">
          <h5 class="card-title"><kbd>Alexsandro Selo Widjojo</kbd> (1733004)</h5>
          <p class="card-text">S1 SISTEM INFORMASI</p>
          <div style="margin: 0px auto;">
            <button title="Member Warga" type="button" class="btn btn-md btn-success" data-target="#exampleModal" data-toggle="modal" data-whatever="@getbootstrap">MEMBER WARGA</button>
            <button title="Member Umum" type="button" class="btn btn-md btn-warning" data-target="#exampleModal1" data-toggle="modal" data-whatever="@getbootstrap">MEMBER UMUM</button>
            <button title="Isidentil" type="button" class="btn btn-md btn-info" data-target="#exampleModal2" data-toggle="modal" data-whatever="@getbootstrap">Isidentil</button>
            <button title="Karyawan" type="button" class="btn btn-md btn-secondary pull-right" data-target="#exampleModal3" data-toggle="modal" data-whatever="@getbootstrap">Karyawan</button>
          </div>
          <hr>
          <div style="margin: 0px auto;">
            <button title="List Member Warga" type="button" class="btn btn-md btn-success" onclick="location.href = 'list_warga.php';">LIST MEMBER WARGA</button>
            <button title="List Member Umum/Isidentil" type="button" onclick="location.href='list_umum.php';" class="btn btn-md btn-warning pull-right">LIST MEMBER UMUM</button>
          </div>
        </div>
        <div class="card-footer text-muted"></div>
      </div>

    </div>

  </div>
   

    <main role="main">

      <!---------------- MODAL ----------------->
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">REGISTRASI MEMBER <kbd class="bg-warning">UMUM</kbd></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="data.php" class="needs-validation was-validated" novalidate method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Lengkap</label>
                    <input type="text" class="form-control" id="validationCustom01" name="namaumum" placeholder="Nama Anda" required autofocus>
                    <!-- <div class="invalid-feedback">
                      Ketikan Nama Lengkap Anda
                    </div> -->
                  </div>

                    <div class="col-md-4 mb-3">
                      <label for="recipient-name" class="col-form-label">Jenis Member</label>
                      <select class="custom-select jenismember" name="jenismember" id="jenismember" required>
                        <option selected value="default">Pilih Jenis Member</option>
                        <option value="isidentil">Isidentil</option>
                        <option value="B1">Single</option>
                        <option value="B2">Couple</option>
                        <option value="B3">Group</option>
                      </select>
                      <!-- <div class="invalid-feedback">
                        Pilih Jenis Member.
                      </div> -->
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="recipient-name" class="col-form-label">Jenis Paket</label>
                      <select class="custom-select jenispaket" id="jenispaket"  name="jenispaket" required>
                        <option>Pilih Jenis Paket</option>
                        <option value="15000" id="harian123">Harian</option>
                        <option value="450000">1 Bulan</option>
                        <option value="800000">2 Bulan</option>
                        <option value="1200000">3 Bulan</option>
                      </select>
                     <!--  <div class="invalid-feedback">
                        Pilih Jenis Paket.
                      </div>  -->
                    </div>
              </div>

            <div class="form-group">
               <label for="validationCustom05">Alamat</label>
              <textarea class="form-control is-invalid" id="validationCustom05" name="alamat" placeholder="Ketikkan alamat lengkap Anda" required></textarea>
              <!-- <div class="invalid-feedback">
                Ketikkan alamat Anda.
              </div> -->

            </div>

            <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="biaya">Biaya</label>
              <input type="text" class="form-control" disabled id="biaya" name="biaya" placeholder="Rp #######" value="" required/>
              <!-- <div class="invalid-feedback">
                Pilih Jenis Paket. Otomatis biaya terisi.
              </div> -->
            </div>
              <!-- <input type="file" name="fo123toumum"> -->

            <div class="col-md-3 mb-3">
              <label for="birth">Create Date</label>
              <input type="text" class="form-control" disabled value="<?= date('d-m-Y'); ?>" id="birth" name="birth" placeholder="<?= date('d-m-Y'); ?>" required>
              <!-- <div class="invalid-feedback">
                Upload Foto Anda
              </div> -->
            </div>
            <div class="col-md-3 mb-3">
              <label for="foto">FOTO PROFIL</label>
              <input type="file" class="form-control" id="foto1" name="fotoumum" placeholder="Input Foto" onchange="return fileValidation1()" required>
              <div id="imagePreview1"></div>
              <!-- <div class="invalid-feedback">
                Upload Foto Anda
              </div> -->
            </div>
            <!-- <div class="col-md-3 mb-3">
              <label for="validationCustom05">Zip</label>
              <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div> -->
          </div>

          <div class="form-group">
            <label for="validationCustom09">Terbilang Harga</label>
            <input class="form-control is-invalid" id="validationCustom09" name="terbilang" placeholder="Ketikkan harga pembayaran dalam huruf" required>
              <!-- <div class="invalid-feedback">
                Ketikkan harga pembayaran Anda.
              </div> -->
          </div>

          <!-- <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div> -->
          <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="submit1">Lanjut &gt;&gt;&gt;</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">REGISTER MEMBER <kbd class="bg-success">WARGA</kbd></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="data.php" method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="form-group">
                  <label for="message-text" class="col-form-label">No Kavling </label>
                    <input aria-describedby="nomorkavling" type="text" name="nokavling" class="form-control" placeholder="Isikan Nomor Kavling" required>
                    <small id="nomorkavling" class="form-text text-muted">
                      Contohnya : M-110 artinya Kavling Blok-M Nomor Rumah 110
                    </small>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Nama Lengkap </label>
                  <input aria-describedby="namawarga" type="text" name="namawarga" class="form-control" placeholder="Isikan Nama Anda" required autofocus>
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
                  <input aria-describedby="telephone" type="text" name="telp" class="form-control" min="999999" max="9999999999999" max-leght="" placeholder="Isikan Nomor HP/Telp" required>
                  <small id="telephone" class="form-text text-muted">
                      Contohnya : 081234567890/0293123456
                  </small>
                </div>
                <div class="form-group">
                  <label for="foto">FOTO PROFIL</label>
                  <input type="file" class="form-control" id="foto" name="fotowarga" placeholder="Input Foto" onchange="return fileValidation()" required>
                  <div id="imagePreview" ></div>
                  <!-- <div class="invalid-feedback">
                    Upload Foto Anda
                  </div> -->
                </div>
            </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="submit">Lanjut &gt;&gt;&gt;</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </main>

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
      // $(".jenismember").change(function () {
      //   $("#jenispaket").val($('#jenismember').val());
      // });
    </script>
    <script>
       $('.jenismember').change(function () {
            if ($('#jenismember').val() == 'isidentil') {
              // $("#jenispaket").attr("disabled","disabled");
              // $("#harian123").attr("selected","selected");
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
    
</html>