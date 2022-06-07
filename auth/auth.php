<?php
    session_start();
    if(!$_SESSION['login']){
        header("location: /science/sciday/auth/login.php");
        exit;
    }
    
?>