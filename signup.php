<!DOCTYPE html>
<html>
<?php
require_once 'header.php';
require_once 'includes/function.php';
?>
<body>
<center>
<form method="POST" action="includes/signup.php">
<br>
<br>
<input type="text" name="firstname" placeholder="enter firstname"><br><br>
<input type="text" name="lastname" placeholder="enter lastname"><br><br>
<input type="email" name="email" placeholder="enter  email address"><br><br>
<input type="text" name="username" placeholder="enter username"><br><br>
<input type="password" name="password" placeholder="enter password"><br><br>
<input type="password" name="conf_password" placeholder="confirm  password"><br><br>
<input type="date" name="dob" placeholder="enter dob"><br><br>
<button type="submit" name="submit">sign up</button><br><br>
<h3><a href="login.php">Log In</a></h3>
</form>
</center>
<?php error_reporting (E_ALL ^ E_NOTICE);
?>
<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput!"){
        echo "<p><h3>Fill in all the fields!</h3></p>";
    }
    elseif($_GET["error"]=="Invalidusername"){
        echo "<p><h3>enter the correct username!</h3></p>";
    }
}elseif($_GET["error"]=="invalidemail"){
    echo "<p><h3>Enter the correct email!</h3></p>";
}
 elseif($_GET["error"]=="passwordmissmatch"){
    echo "<p><h3>password does not match!</h3></p>";
}
 elseif($_GET["error"]=="usernameexists!"){
    echo "<p><h3>Username already exists!</h3></p>";
}
elseif($_GET["error"]=="stmt failed!"){
    echo "<p><h3>Oops! something went wrong.please try again later.</h3></p>";
}
elseif($_GET["error"]=="none!"){
    echo "<p><h3>signup successfull!</h3></p>";
}

?>
<br><br><br><br><br><br><br>
</body>
<footer>
<?php
require_once 'footer.php';
?>
</footer>
</    body>
</html>