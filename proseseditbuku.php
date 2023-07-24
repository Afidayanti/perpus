<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kode_buku = $_POST['kode_buku'];
        $judul = $_POST['judul'];
        $tahun_terbit = $_POST['tahun_terbit'];
        
        // include database connection file
        
        include_once("koneksi.php");

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET nisn='$nisn',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE buku SET kode_buku = '$kode_buku', judul = '$judul', tahun_terbit = '$tahun_terbit'";
        $query .= "WHERE kode_buku = '$kode_buku'";
        $result = mysqli_query($koneksi, $query);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:buku.php");
    }
    ?>