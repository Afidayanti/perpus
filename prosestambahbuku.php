<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kode_buku = $_POST['kode_buku'];
        $judul = $_POST['judul'];
        $tahun_terbit = $_POST['tahun_terbit'];
        
        // include database connection file
        include_once("koneksi.php");
                
        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO buku(kode_buku,judul,tahun_terbit) VALUES('$kode_buku','$judul','$tahun_terbit')");
        
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:buku.php");
    }
    ?>