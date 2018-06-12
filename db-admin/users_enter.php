<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/xhtml1-loose.dtd">

<?php
/*
	Copyright (C) GPLv2 2011-2018 Nathan A. Mourey II <nmoureyii@gmail.com>
*/
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>MySQL Database Managment.</title>
	<link rel="stylesheet" type="text/css" href="css/users.css" />
</head>

<body>
<div id="user"><h2>Users on system.</h2></div>
<?php 
	// include rutines.
	include "config/functions.php";

	// get a list of users.
	$usr_list = get_user_list();
	print $usr_list;
?>

</body>
</html>
