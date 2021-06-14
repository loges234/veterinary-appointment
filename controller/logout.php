<?php
    session_start();

    unset($_SESSION['admin']);
    header('location:../admin/login.php');

    unset($_SESSION['SP_id']);
    unset($_SESSION['Profile']);
    header('location:../SP_Log.php');

    unset($_SESSION['pro_id']);
    unset($_SESSION['Profile']);
    header('location:../SP_Log.php');

    unset($_SESSION['user_id']);
    header('location:../User/index.php');
    
?>