<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $id_ruang = $_POST['id_ruang'];
        
        // include database connection file
        include_once("koneksi.php");
                
        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO siswa(nisn,nama,alamat,id_ruang) VALUES('$nisn','$nama','$alamat','$id_ruang')");
        
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:siswa.php");
    }
    ?>