<?php
// memanggil library FPDF
require('phpfpdf/fpdf.php');
include 'koneksi.php';
$id = $_GET['id'];
$warga_umum = $koneksi->query("SELECT tbl_member_umum.*,jenis_paket.* ,jenis_member.*
            FROM tbl_member_umum 
            LEFT JOIN jenis_paket 
            ON tbl_member_umum.jenis_paket=jenis_paket.id_jenis_paket 
            LEFT JOIN jenis_member
            ON tbl_member_umum.jenis_member=jenis_member.kode_jenis_member WHERE id_umum=$id");
while ($row = mysqli_fetch_array($warga_umum)){
	$nomorkartu = $row['nomor_kartu'];
	$nama = $row['nama_umum'];
	$terbilang = $row['terbilang'];
    $harga = "Rp. ".number_format($row['biaya'],0,'','.');
    $gunamembayar = "SEWA FASILITAS CLUB HOUSE SELAMA ".strtoupper($row['nama_jenis_paket'])."";
}
// echo $nama;
// die();
$arraybln=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); 
$bln=$arraybln[date('n')-1]; 
$thn=date('Y');
$tgl=date('d');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
/*membuat file PDF untuk dicetak*/ 
$pdf->setMargins(10,6,10); 
$pdf->AddPage(); 
$pdf->SetFont('Arial','B',13); 
$pdf->Cell(0,5,'CLUB HOUSE',0,1,'L'); 
$pdf->SetFont('Arial','',11); 
$pdf->MultiCell(0,5,'Jl. Panembahan Senopati No.56'." \n".'0293-777 9090'); 
$pdf->SetLineWidth(0.8);
$pdf->Line(10,28,199,28);
// $pdf->Ln(8); 
$pdf->SetFont('Arial','B',13);
$pdf->Cell(60,5,'',0,0,''); 
$pdf->Cell(0,5,'TANDA BUKTI PEMBAYARAN',0,1,'L'); 
$pdf->SetLineWidth(0.4); 
// $pdf->Rect(60,30,80,13);/*ubah ukuran Kotak Judul -> Rect(sumbu x, sumbu y, lebar kotak,tinggi kotak)*/ 
$pdf->SetFont('Arial','',11);
$pdf->Ln(10); 
$pdf->Cell(35,5,'Telah Terima Dari :',0,0,'L'); 
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,strtoupper($nama),0,1,'J'); 
// $pdf->Line(50,56,150,56);
// $pdf->Rect(50,61,115,10); 
// $pdf->Rect(50,74,115,10);
$pdf->Ln(6); 
$pdf->Cell(33,5,'Uang Sejumlah :',0,0,'L'); 
// $pdf->Cell(113,11,$terbilang,'J'); 
$pdf->Cell(0,5,$terbilang,0,1,'J'); 
$lnBreak=6;
$pdf->Ln($lnBreak); 
$pdf->Cell(40,5,'Untuk Pembayaran :',0,0,'L');
$pdf->Cell(0,5,$gunamembayar,0,1,'J'); 
// $pdf->Line(50,97,150,97); 
$pdf->Ln(6); 
$pdf->Cell(116,5,'',0,0,'');
$pdf->SetFont('Arial','U',12); 
$pdf->Cell(0,5,'Magelang'.', '.$tgl.' '.$bln.' '.$thn,0,1,'L'); 
$pdf->Ln(10); 
$pdf->SetFont('Arial','',14); 
$pdf->Cell(116,5,$harga.',-',0,1,'L'); 
// $pdf->Rect(8,116,50,10); 
$pdf->SetFont('Arial','',12); 
$pdf->Cell(120,5,'',0,0,'L'); 
$pdf->SetFont('Arial','BU',14);
$pdf->Cell(30,5,'( CLUB HOUSE )',0,1,'L'); 

$pdf->Output();
?>