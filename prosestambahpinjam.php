<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nisn = $_POST['nisn'];
        $kode_buku = $_POST['kode_buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $kurangstok="";
        // include database connection file
        include_once("koneksi.php");

        $ambildata = mysqli_query($koneksi,"select * from buku where kode_buku='$kode_buku'");
        while ($tampil = mysqli_fetch_array($ambildata)){ 
            $kurangstok=$tampil['stok_buku']-1;
                                            } 
                                            echo "$kurangstok";
                                            // die();
        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO pinjam(nisn,kode_buku,tgl_pinjam,tgl_kembali) VALUES('$nisn','$kode_buku','$tgl_pinjam','$tgl_kembali')");
        $query  = "UPDATE buku SET stok_buku = '$kurangstok'";
        $query .= "WHERE kode_buku = '$kode_buku'";
        $result2 = mysqli_query($koneksi, $query);
        
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:pinjam.php");
    }
    ?>