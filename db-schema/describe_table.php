<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/xhtml1-loose.dtd">

<?php
	// Copyright (C) GPLv2 2011 Nathan A. Mourey II <nmoureyii@ne.rr.com>

	include "config/functions.php";
	$db_table  	= $_REQUEST['table'];
	$db_name 	= $_REQUEST['db'];

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>MySQL Database Managment.</title>
	<link rel="stylesheet" type="text/css" href="css/db.css" />
</head>


<body>
	<div id="title"><h2>MySQL Database Schema Viewing Tool.</h2></div>
<?php
	if ($db_table && $db_name) {
	/* If user is in db.  List there databases. */
		$html = describe_table($db_table, $db_name);
		print $html;
		print "<p/><div><center><h3><a href=\"tables.php?q=$db_name\">Return list of tables in database $db_name</a></h3></center></div>";
	
	} else {
		print "<span id=\"desc_error\">Internal Error.</span>";
	}
?>
<p id="copyright">Copyright &copy; <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_top">GPLv2</a> 2011  
<a href="mailto:nmoureyii@ne.rr.com">Nathan A. Mourey II</a></p> 
</body>
</html>
