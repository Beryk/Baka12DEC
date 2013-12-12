<?php
session_start();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery.colorbox.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css" />
    <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
    <script>
  $(function() {
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-user" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
  </script>
</head>

<body>

<div class="wrapper">

	<div class="header">
	</div><!-- .header-->

	<div class="middle">

		<div class="container">
    
			<div class="content">
                <div class="contentheader">
        <form>
        Search: <input type="text" name="search" />
        </form>
        </div>
		<div class="table">
        <?php
		//Car information output
		require('setup.php');
		$db = db_connect();
		$rs = mysql_query("SELECT * FROM carinfo");
		print "<table id='maintable'>";
		$var = 1;
		
		while ($row = mysql_fetch_array($rs)){
			if($var%2 == 0){
				$id = 'table_row_color_2';
				}else{
					$id = 'table_row_color_1';
					}
					
			print "<tr>";
			echo "<td id='$id' width='25px'></td>";
			echo "<td id='$id'>".$row['name']."</td>";
			echo "<td id='$id'>".$row['model']."</td>";
			echo "<td id='$id'>".$row['year']."</td>";
			echo "<td id='$id'>".$row['info']."</td>";
			echo "<td id='$id'>".$row['to']."</td>";
			echo "<td id='$id'><button id='create-user'>Create new user</button></td>";
			$var++;
			}
			$var = 1;
			print "</tr>";
			print "</table>";
			mysql_close($db);
		 ?>
		</div>
		</div><!-- .content-->
		</div><!-- .container-->

		<div class="left-sidebar">
        
			<div id="usermenu">
      
           
			<?php
			// Вывод в leftsidebar
            
            echo "<ul>";
            echo "<li>Welcome, &nbsp;<font>" . $_SESSION['user'] . "	</font></li></br></br>";
			echo "<li id='lis'><a href='index.php'><img src='images/exit.png' alt='exit'></a></li>";
            echo "</ul>";
           
		   ?>
            
            </div>
		</div><!-- .left-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<div class="footer" align="center">
	<strong>Berrryk!</strong>
</div><!-- .footer -->
<!--  OnClick Information Menu  -->
 <div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form>
  <fieldset>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all">
  </fieldset>
  </form>
</div>
 
</body>
</html>