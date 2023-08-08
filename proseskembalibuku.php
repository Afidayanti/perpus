<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id_pinjam'];
        $kode_buku = $_POST['kode_buku'];
        $tgl_dikembalikan = $_POST['tgl_dikembalikan'];
        
        // include database connection file
        
        include_once("koneksi.php");

         $ambildata = mysqli_query($koneksi,"select * from buku where kode_buku='$kode_buku'");
            while ($tampil = mysqli_fetch_array($ambildata)){ 
            $kurangstok=$tampil['stok_buku']+1;
                                            } 
                                            echo "$kurangstok";

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET id='$id',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE pinjam SET status = 1 ,tgl_dikembalikan = '$tgl_dikembalikan'";
        $query .= "WHERE id_pinjam = '$id'";
        $result = mysqli_query($koneksi, $query);
        $query2  = "UPDATE buku SET stok_buku = '$kurangstok'";
        $query2 .= "WHERE kode_buku = '$kode_buku'";
        $result2 = mysqli_query($koneksi, $query2);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:balik.php");
    }
    ?>