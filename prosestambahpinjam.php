<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nisn = $_POST['nisn'];
        $kode_buku = $_POST['kode_buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        
        // include database connection file
        include_once("koneksi.php");
                
        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO pinjam(nisn,kode_buku,tgl_pinjam,tgl_kembali) VALUES('$nisn','$kode_buku','$tgl_pinjam','$tgl_kembali')");
        
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:pinjam.php");
    }
    ?>