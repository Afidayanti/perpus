<?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $kat_buku = $_POST['kat_buku'];
        
        // include database connection file
        include_once("koneksi.php");
                
        // Insert user data into table
        $result = mysqli_query($koneksi, "INSERT INTO kategori_buku(kat_buku) VALUES('$kat_buku')");
        
        // Show message when user added
        // echo "User added successfully. <a href='index.php'>View Users</a>";
        header("location:kategori_buku.php");
    }
    ?>