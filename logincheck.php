<?php 
require('setup.php');
$db = db_connect();

$rs = mysql_query("select 'Ok' res from 'users' where name='".$_REQUEST['login']."' 
and password='".$_REQUEST['password']."'", $db);
$row = mysql_fetch_array($rs);

if ($row['res'] == 'Ok')   
 {

    header("Location: main.php");
  }
  else
	{
		header("Location: index.php?error=1"); 
	}
?>