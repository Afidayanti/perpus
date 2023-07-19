<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id_pinjam = $_POST['id_pinjam'];
        $nisn = $_POST['nisn'];
        $kode_buku = $_POST['kode_buku'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];
        
        // include database connection file
        
        include_once("koneksi.php");

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET nisn='$nisn',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE pinjam SET nisn = '$nisn', kode_buku = '$kode_buku', tgl_pinjam = '$tgl_pinjam', tgl_kembali = '$tgl_kembali'";
        $query .= "WHERE id_pinjam = '$id_pinjam'";
         $result = mysqli_query($koneksi, $query);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:pinjam.php");
    }
    ?>