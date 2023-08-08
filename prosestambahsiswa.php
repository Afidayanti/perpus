<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kelas = $_POST['kelas'];
        
        // include database connection file
        include_once("koneksi.php"); 

        $result =mysqli_query($koneksi, "SELECT nisn FROM siswa where nisn='$nisn'");
        $cek_id=mysqli_num_rows($result);
        if ($cek_id > 0){
                    echo "<script>alert('NISN Sudah Digunakan');history.go(-1) </script>";
            }else{
                $result = mysqli_query($koneksi,"INSERT INTO siswa(nisn,nama,alamat,kelas) VALUES('$nisn','$nama','$alamat','$kelas')");
                    header('location:siswa.php');} 
    }
    ?>