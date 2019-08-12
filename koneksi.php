<?php

$koneksi = new mysqli('localhost', 'root', '','clubhouse');
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>