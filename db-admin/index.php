<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" 
"http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-frameset.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"/> 

<?php
/*
	Copyright (C) GPLv2 2011-2018 Nathan A. Mourey II <nmoureyii@gmail.com>
*/
?>


<html>
<head>
	<title>MySQL Database Viewing Tool.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/> 
	<link rel="stylesheet" type="text/css" href="css/users.css" />
</head>

<!-- <?php $host = gethostname() ?> -->

<center>
       <!--  <h2>You are currnetly connected to : <?php echo $host; ?></h2> -->
	<h2><a href="../">Return to Main MySQL Tools Menu.</a></h2>
	<table border="1" cellpadding="0">
		<tr><td valign="top" width="25%">
			<iframe frameborder="no" scrolling="yes"  width="100%" height="800" name="list" src="users_enter.php" title="iFrame Test."></iframe>
		</td><td width="100%">
			<iframe frameborder="no" scrolling="yes"  width="100%" height="800" name="form" src="main.php" title="iFrame Test."></iframe>
		</td></tr>
	</table>
</center>
</html>
