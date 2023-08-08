<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id_siswa = $_POST['id_siswa'];
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kelas = $_POST['kelas'];
        
        // include database connection file
        
        include_once("koneksi.php");

        // Insert user data into table
        // $result = mysqli_query($koneksi, "UPDATE pinjam SET nisn='$nisn',kode_buku='$kode_buku',tgl_pinjam='$tgl_pinjam',tgl_kembali'$tgl_kembali' WHERE id_pinjam='$id_pinjam'");
        // echo $result;
        $query  = "UPDATE siswa SET nisn = '$nisn', nama = '$nama', alamat = '$alamat', kelas = '$kelas'";
        $query .= "WHERE id_siswa = '$id_siswa'";
        $result = mysqli_query($koneksi, $query);
        // die();
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:siswa.php");
    }
    ?>