<?php
require_once 'includes/function.php';
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    require_once 'dbh.php';
    require_once 'function.php';
if(emptyinputlogin($username, $password) !==false){
        header("location: login.php?error=Emptyinput!");
        exit();
    }
    else{
        loginuser($data, $username,$password);
        header("location: home.php");
        exit();
    }
    }
    ?>