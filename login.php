<!DOCTYPE html>
<html>
<?php
require_once 'header.php';
require_once 'includes/login.php';
?>
<body>
<center>

<form method="POST" action="login.php">
<br/> <br/>
<p><h2>Already have an account?</h2></p><br/><br/>
<input type="text" name="username" placeholder="Enter username or email..."><br/><br/><br/>
<input type="password" name="password" placeholder="Enter password..."...><br/><br/><br/>
<button type="submit" name="submit">Log In</button><br/><br/><br>
<p><h2>Do not have an acount?<br><a href="signup.php">sign up</a></h2><p>
</form>
</center>
<?php
if(isset($_GET["error"])){
    if($_GET["error"]=="Empty input!"){
        echo "<h3><p>Fill in all the fields!</p></h3>";
    }
    elseif ($_GET["error"]=="username/email doesn't exist"){
        echo "<h3><p>Fill in existing username/password!</p></h3>";
    }
    elseif($_GET["error"]=="Incorrect password!"){
        echo "<h3><p>Incorrect username or password!</p></h3>";
    }
}
?>
<br><br><br><br><br><br><br><br><br><br>
</body>
<footer>
<?php
require_once 'footer.php'
?>
</footer>
</body>
</html>