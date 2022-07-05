<?php
require_once 'dbh.php';
if(isset($_POST["submit"])){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $conf_password=$_POST["conf_password"];
    $dob=$_POST["dob"];
require_once 'function.php';
if(emptyinputsignup($firstname, $lastname, $email, $username, $password, $conf_password,$dob) !==false){
    header("location: ../signup.php?error=emptyinput!");
    exit();
}
if(invalidusername($username) !==false){
    header ("location: ''/signup,php?error=invalidusername");
    exit();
}
if(invalidemail($email)!==false){
    header("location: ../signup.php?error=invalidemail");
    exit();
}
  if(passwordmatch($password, $conf_password)!==false){
    header("location: ../signup.php?error=passwordmissmatch");
    exit();
  } 
     if(usernameExists($data, $username, $email)!==false){
    header("location: ../signup.php?error=usernameexists");
    exit();
}
insertuser($data, $firstname,$lastname,$email,$username,$password,$dob);
}
else{
    header("location: ../signup.php");
    exit();
}
