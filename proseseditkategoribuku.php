<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $kat_buku = $_POST['kat_buku'];
        
        // include database connection file
        
        include_once("koneksi.php");

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET id='$id',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE kategori_buku SET id = '$id', kat_buku = '$kat_buku'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:kategori_buku.php");
    }
    ?>