<?php
include "koneksi.php";
require('vendor/fpdf184/fpdf.php');

$ambildata = mysqli_query($koneksi,"SELECT * FROM pinjam ,buku, siswa WHERE siswa.nisn=pinjam.nisn AND buku.kode_buku=pinjam.kode_buku");
                                       
//Inisiasi untuk membuat header kolom
$column_judul = "";
$column_nama = "";
$column_tgl_kembali = "";
$column_tgl_dikembalikan = "";
$column_terlambat = "";
$column_denda = "";
$column_status = "";


//For each row, add the field to the corresponding column
 while ($tampil = mysqli_fetch_array($ambildata))
{
    $judul = $tampil["judul"];
    $nama = $tampil["nama"];
    $tgl_kembali = $tampil["tgl_kembali"];
    $tgl_pinjam = $tampil["tgl_dikembalikan"];
    $tgl_terlambat = $tampil["terlambat"];
    $tgl_denda = $tampil["denda"];
    $status = $tampil["status"];
 
    

    $column_judul = $column_judul.$judul."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_tgl_kembali = $column_tgl_kembali.$tgl_kembali."\n";
    $column_tgl_dikembalikan = $column_tgl_dikembalikan.$tgl_dikembalikan."\n";
    $column_terlambat = $column_terlambat.$terlambat."\n"; 
    $column_denda = $column_denda.$denda."\n"; 
    $column_status = $column_status.$status."\n";  
    
}
//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PENGEMBALIAN BUKU MIN 45 ACEH BESAR',0,0,'C');
$pdf->Ln(); 

//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position); 
$pdf->SetX(5);
$pdf->Cell(35,8,'Judul Buku',1,0,'C',1); 
$pdf->Cell(35,8,'Nama Anggota',1,0,'C',1); 
$pdf->Cell(30,8,'Tgl Kembali',1,0,'C',1);
$pdf->Cell(30,8,'Tgl Dikembalikan',1,0,'C',1);
$pdf->Cell(25,8,'Terlambat',1,0,'C',1);
$pdf->Cell(20,8,'Denda',1,0,'C',1); 
$pdf->Cell(25,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(35,8,$column_judul,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(35,8,$column_nama,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(75);
$pdf->MultiCell(30,8,$column_tgl_kembali,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(30,8,$column_tgl_dikembalikan,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(25,8,$column_terlambat,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(20,8,$column_denda,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(25,8,$column_status,1);
$pdf->Output();
?>

<!-- <table class="table table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Tanggal Di Kembalikan</th>
                                            <th>Terlambat Bayar</th>
                                            <th>Denda</th>
                                            <th>status</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        $no=1;
                                        $ambildata = mysqli_query($koneksi,"SELECT * FROM pinjam ,buku, siswa WHERE siswa.nisn=pinjam.nisn AND buku.kode_buku=pinjam.kode_buku");
                                        while ($tampil = mysqli_fetch_array($ambildata)){ ?>
                                            
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$tampil['judul']?></td>
                                                <td><?=$tampil['nama']?></td>
                                                <td><?=$tampil['tgl_kembali']?></td>
                                                <td><?=$tampil['tgl_dikembalikan']?></td>
                                                <?php 
                                                // Menghitung terlambat bayar
                                                // hanya menampilkan data yang terlambat
                                                // $q = $koneksi->query("SELECT * FROM pinjam WHERE CURDATE() > tgl_kembali");
                                            
                                                // $no = 1;
                                                // while($r = $q->fetch_assoc()) { 
                                                $t = date_create($tampil['tgl_dikembalikan']);
                                                $n = date_create($tampil['tgl_kembali']);
                                                $terlambat = date_diff($t, $n);
                                                $hari = $terlambat->format("%a");
                                            // menghitung denda
                                                $denda = $hari * 1000;
                                                
 
                                                ?>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "0";
                                                    }else {
                                                        echo $hari;
                                                    }
                                                    ?></td>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "0";
                                                    }else {
                                                        echo $denda;
                                                    }
                                                    ?></td>
                                                <td><?php 
                                                    if ($tampil['status']==0) {
                                                        echo "Belom Di Kembalikan";
                                                    }else {
                                                        echo "Sudah Di kembalikan";
                                                    }
                                                    ?></td>
                                                <td>
                                                  
                                                

                                            </td>
                                           </tr> 
                                        <?php 
                                    $no++;
                                    } ?>
                                    
                                    </tbody>
                                </table>

                                <p>jumlah Pinjam</p>
                        

                <script>
                    window.print();
                </script> -->