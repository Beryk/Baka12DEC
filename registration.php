<?php
$dbhandle = mysql_connect("localhost", "vadim", "53279");
$selected = mysql_select_db("carsaloon", $dbhandle);

	if(isset($_POST['submit'])){
		$user = $_POST['username'];
    	$pass = $_POST['password1'];
		$secpass = $_POST['password2'];
		$mail = $_POST['email'];
	
	if(($user=="") || ($pass=="") || ($secpass=="") || ($mail=="")) {
		echo '<script>alert("There are empty fields!");</script>';
		
		}else{
		
    
        $query = mysql_query("SELECT * FROM users WHERE name='$user'");
	
    if(mysql_num_rows($query) > 0){
    	echo '<script>alert("Username already exists!"); </script>';
    }else{
		$query = mysql_query("SELECT * FROM users WHERE mail='$mail'");
		if(mysql_num_rows($query) > 0){
			echo '<script>alert("E-mail adress is already taken!"); </script>';
		}else{
    	mysql_query("INSERT INTO users (name , password, mail) VALUES ('$user', '$pass', '$mail')");
		
        mysql_close($dbhandle);
        header("location:index.php");
		exit;
					}
		  		}
 			}
		}
	
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Guided Registration Form - Design Shack Demo</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/progression.min.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/progression.min.js"></script>
</head>

<body>
  <div id="topbar">
  <a href="index.php">Back to Login</a>
  </div>
  
  <div id="w">
    <div id="content">
      <h1>Simple Guided Registration Form</h1>
      
      <form id="registerform" method="post" action="#">
        <div class="formrow">
          <label for="username">Username</label>
          <input data-progression="" type="text" name="username" id="username" class="basetxt" tabindex="1" data-helper="Any name with at least 3 characters.">
          <p class="errmsg">Please add some more characters</p>
        </div>
        
        <div class="formrow">
          <label for="password1">Password</label>
          <input data-progression="" type="password" name="password1" id="password1" class="basetxt" tabindex="3" data-helper="Make sure you can remember it!">
        </div>
        
        <div class="formrow">
          <label for="password2">Password(again)</label>
          <input data-progression="" type="password" name="password2" id="password2" class="basetxt" tabindex="4" data-helper="Please re-enter the password again.">
          <p class="errmsg">Passwords do not match!</p>
        </div>
        
        <div class="formrow">
          <label for="email">Email Address</label>
          <input data-progression="" type="email" name="email" id="email" class="basetxt" tabindex="2" data-helper="Where do we send your verification email?">
          <p class="errmsg">Please enter a proper e-mail</p>
        </div>
        
        <input type="submit" name="submit" id="submitformbtn" class="submitbtn" value="Sign Up">
      </form>
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $("#registerform").progression({
    tooltipWidth: '200',
    tooltipPosition: 'right',
    tooltipOffset: '0',
    showProgressBar: false,
    showHelper: true,
    tooltipFontSize: '14',
    tooltipFontColor: 'fff',
    progressBarBackground: 'fff',
    progressBarColor: '7ea2de',
    tooltipBackgroundColor: 'a5bce5',
    tooltipPadding: '7',
    tooltipAnimate: true
  })
  //.submit(function(e){
    //e.preventDefault();
  //});
  
  $('#username').on('blur', function(){
    var currval = $(this).val();
    
    if(currval.length < 3) {
      $(this).next('.errmsg').slideDown();
    } else {
      // the username is 6 or more characters and we hide the error
      $(this).next('.errmsg').slideUp();
    }
  });
  
  $('#email').on('blur', function(){
    // email regex source http://stackoverflow.com/a/17968929/477958
    var mailval = $(this).val();
    
    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
    if(!pattern.test(mailval)) {
      $(this).next('.errmsg').slideDown()
    } else {
      $(this).next('.errmsg').slideUp();
    }
  });
  
  $('#password2').on('blur', function(){
    var pwone = $('#password1').val();
    var pwtwo = $(this).val();
    
    if(pwtwo.length < 1 || pwone != pwtwo) {
      $(this).next('.errmsg').slideDown();
    } else if(pwone == pwtwo) {
      // both passwords match and we hide the error
      $(this).next('.errmsg').slideUp();
    }
  });
});
</script>
</body>
</html>