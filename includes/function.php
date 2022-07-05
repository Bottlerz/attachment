<?php
require_once 'dbh.php';
function emptyinputsignup($firstname, $lastname, $email, $username, $password, $conf_password,$dob){
    $result;
    if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)
     || empty($conf_password)){
  $result =true;
  }else {
$result=false;
   }
return $result;
}
function invalidusername($username){
    $result;
    if(!preg_match(("/^[a-zA-Z0-9]*$/"), $username)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function invalidemail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function passwordmatch($password, $conf_password){
    $result;
    if($password !== $conf_password){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function usernameExists($data, $username,$email ){
    $sql="SELECT * FROM user WHERE username = ? OR email = ?;";
    $stmt=mysqli_stmt_init($data);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed!!");
        exit();
    }
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysql_stmt_execute($stmt);
$resultdata=mysqli_stmt_get_result($stmt);
if($row=mysql_fetch_assoc($resultdata)){
    return $row;
}else{
    $result=false;
    return $result;
}
mysqli_stmt_close($stmt);

}
function insertuser($data, $firstname, $lastname, $email, $username, $password, $dob){
    $sql="INSERT INTO user (firsname, lastname, email, username, password, dob)VALUES(?, ?, ?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($data);
    if(!mysqli_stmt-prepare($stmt, $sql)){
        header("location: ../signup.php?error=none=stmtfailed");
        exit();
    }
$hashedpassword=password_hash($password, PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $username, $hashedpassword, $dob);
mysqli_stmt_execute($stmt);
mysql_stmt_close($stmt);
header("location: ../signup.php?error=none");
exit();
}
function emptyinputlogin($username, $password){
    $result;
    if(empty($username)|| empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}
function loginuser($data, $username, $password){
    $usernameExists=usernameExists($data, $username, $username);
    if($usernameExists===false){
        header("location: login.php?error=username/emaildoesn'texist");
        exit();
    }
    $hashedpassword=$usernameExists["password"];
    $checkpassword=password_verify($password, $hashedpassword);
    if($checkpassword===false){
        header("location: login.php?error=incorrectpassword!");
        exit();
    }
    elseif($checkpassword===true){
        session_start();
        $_SESSION["usernmame"]=$usernameExist["username"];
        $_SESSION["password"]=$usernameExist["password"];
        header("location: home.php");
        exit();

    }
}

