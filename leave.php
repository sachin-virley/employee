<?php
session_start();
    unset($_SESSION['alogin']);
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
?>