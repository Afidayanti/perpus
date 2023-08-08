<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kode_buku = $_POST['kode_buku'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $stok_buku = $_POST['stok_buku'];
        $kat_buku = $_POST['kat_buku'];
        
        include_once("koneksi.php"); 

        $result =mysqli_query($koneksi, "SELECT kode_buku FROM buku where kode_buku='$kode_buku'");
        $cek_id=mysqli_num_rows($result);
        if ($cek_id > 0){
                    echo "<script>alert(' Kode Buku Sudah Digunakan');history.go(-1) </script>";
            }else{
                $result = mysqli_query($koneksi,"INSERT INTO buku(kode_buku,judul,pengarang,penerbit,tahun_terbit,stok_buku,id_kat) VALUES('$kode_buku','$judul','$pengarang','$penerbit','$tahun_terbit','$stok_buku','$kat_buku')");
                    header('location:buku.php');} 
    }
    ?>