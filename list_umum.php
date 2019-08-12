<?php
include_once("koneksi.php");

// Fetch all users data from database
$result = mysqli_query($koneksi, "SELECT tbl_member_umum.*,jenis_paket.* ,jenis_member.*
            FROM tbl_member_umum 
            LEFT JOIN jenis_paket 
            ON tbl_member_umum.jenis_paket=jenis_paket.id_jenis_paket 
            LEFT JOIN jenis_member
            ON tbl_member_umum.jenis_member=jenis_member.kode_jenis_member 
            ORDER BY id_umum ASC");
?>

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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        table{
            width:100%;
        }
        #example_filter{
            float:right;
        }
        #example_paginate{
            float:right;
        }
        label {
            display: inline-flex;
            margin-bottom: .5rem;
            margin-top: .5rem;
           
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
         <button title="HOME" type="button" class="btn btn-md btn-primary" onclick="location.href = 'index.php';">&lt; HOME</button>
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr class="text-center">
                    <!-- <th><input type="checkbox" onclick="checkAll(this)"></th> -->
                    <th>No</th>
                    <th>No Kartu</th>
                    <th>NAMA</th>
                    <th>Status</th>
                    <th>Member</th>
                    <th>Paket</th>
                    <th>Biaya</th>
                    <th>Masa Berlaku</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $no=1;
                    while($user_data = mysqli_fetch_array($result)) { ?> 
                <tr>
                    <td class="text-center"><?= $no; ?></td>
                    <td class="text-center"><?= $user_data['nomor_kartu']; ?></td>
                    <td><?= $user_data['nama_umum']; ?></td>
                    <td class="text-center"><span class="badge badge-primary"><?= $user_data['status']; ?></span></td>
                    <td class="text-center"><?= $user_data['nama_jenis_member']; ?></td>
                    <td class="text-center"><?= $user_data['nama_jenis_paket']; ?></td>
                    <td class="text-center">Rp <?= number_format($user_data['biaya'],0,'','.'); ?></td>
                    <td class="text-center"><?= $user_data['masa_berlaku']; ?></td>
                    <td class="text-center"><img src="our_images/<?= $user_data['foto_umum']; ?>" width="100px"></td>

                </tr>
                <?php $no++;}?>
                
            </tbody>
            <tfoot>
                <!-- <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr> -->
            </tfoot>
        </table>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable(
                
                 {     

              "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
               } 
                );
        } );


        // function checkAll(bx) {
        //   var cbs = document.getElementsByTagName('input');
        //   for(var i=0; i < cbs.length; i++) {
        //     if(cbs[i].type == 'checkbox') {
        //       cbs[i].checked = bx.checked;
        //     }
        //   }
        // }
    </script>
</body>
</html>