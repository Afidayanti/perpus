<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id_pinjam'];
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];
        
        // include database connection file
        
        include_once("koneksi.php");

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET id='$id',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE pinjam SET status = 1 ,tgl_dikembalikan = '$tgl_dikembalikan'";
        $query .= "WHERE id_pinjam = '$id'";
        $result = mysqli_query($koneksi, $query);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:balik.php");
    }
    ?>