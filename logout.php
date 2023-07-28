<?php
    //logout
    session_start();
    session_destroy();
    // arahkan ke halaman cek_login.php 
    header("location: http://localhost/perpus");
?>