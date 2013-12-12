<?php
	$dbhandle = mysql_connect("localhost", "vadim", "53279");
	$selected = mysql_select_db("carsaloon", $dbhandle);
	if(isset($_POST['user']) && isset($_POST['pass'])){
    	$user = $_POST['user'];
    	$pass = $_POST['pass'];
	
	if(($user=="") || ($pass=="")) {
		echo '<script>alert("There are empty fields!");</script>';
		
		}else{
    
    $query = mysql_query("SELECT * FROM users WHERE name='$user'");
	
    if(mysql_num_rows($query) > 0){
    	echo '<script>alert("Username already exists!"); </script>';
    }else{
    	mysql_query("INSERT INTO users (name , password) VALUES ('$user', '$pass')");
		//echo '<script>alert("You were successfully registered!");</script>';
        header("location:index.php");
		exit;
		
		
  }
 }
}
													
  mysql_close();
?>
<html>
<body>
<form method="POST" action="user_registr.php">
  <p>Username:</p>
  <input type="text" name="user" />
  <p>Password:</p>
  <input type="password" name ="pass" />
  <br />
  <input type="submit" value="Register" />
</form>
</body>
</html>