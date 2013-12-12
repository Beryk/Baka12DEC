<?php
session_start();
if (isset($_POST['loginbtn'])){
$dbhandle = mysql_connect("localhost", "vadim", "53279");
$selected = mysql_select_db("carsaloon", $dbhandle);
$login = $_POST['lgn'];
$pass = $_POST['password'];

$query = mysql_query("SELECT name, password FROM users WHERE name='$login' AND password='$pass'");

if(mysql_num_rows($query) > 0){
	$_SESSION['user'] = $login;
	$_SESSION['password'] = $pass;
	header("location:main.php");
	}else{
	echo '<script>alert("Wrong username or password!"); ////</script>';
	
}
mysql_close($dbhandle);
}else if(isset($_POST['registration'])){
	header("location:registration.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car saloon</title>
<link rel="stylesheet" type="text/css" href="css/Mycss.css">
<!-- Downloaded scripts and styles for registration! -->
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/progression.min.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/progression.min.js"></script>
</head>
<body>
 <div id="indexw">
  <div id="indexcontent">
  
  <form id="login" method="post" action="">
   <div class="formrow">
    <label>Login:</label>
    <input type="text" name="lgn" />
    </div>
    
    <div class="formrow">
     <label>Password:</label>
     <input type="password" name="password" />
    </div>
    <div id="indexbtns">
     <input type="submit" id="sbmtlgnbtn" name="loginbtn" value="Login" />
     <input type="submit" id="sbmtregbtn" name="registration" value="Register" />
     </div>
    </form>
    
    </div> <!-- end content -->
    </div> <!-- end indexwrapper -->
<!--<form method="post" action="registration.html">
<p>Login:<input id="logintxt" type="text" name="login" /></p>
<p>Password: <input type="password" name="password"  /></p>
<input type="submit" name="signin" value="Sign In">

	<form>
	<input id="regbtn"type="submit" name="registration" value="Registration" />
	</form>

</form>
</div>-->
</body>
</html>
