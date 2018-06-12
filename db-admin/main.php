<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/xhtml1-loose.dtd">

<?php
	// Copyright (C) GPLv2 2011-2018 Nathan A. Mourey II <nmoureyii@gmail.com>

	include "config/functions.php";
	$update = $_REQUEST['update'];
	$db_name = $_REQUEST['db_name'];
	$pass = $_REQUEST['pass'];
	$name = $_REQUEST['name'];

	$db_name = fix_str($db_name);
	$pass = fix_pass($pass);

	if ( check_user($name) ){
		$user_in_db = "<div id=\"user_db\"><span id=\"in_db_now\">NOTICE: User is already in the database.
				If you change the database name while updating the user's password you may orphan the user's
				previous database.</span></div>";
	}
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>MySQL User Database Creation Tool.</title>
	<link rel="stylesheet" type="text/css" href="css/db.css" />
</head>


<body>
	<div id="title"><h2>MySQL User Database Creation Tool.</h2></div>
<?php
	/* This is a little crazy.  Needs cleaning up. */
	if ($update == 1 ) {
	/* Updating an existing user in the db. */
		if ( !$db_name || !$pass) {
			print $error;
			exit;
		} elseif ( !$name ) {
			/* should never reach here. */
			print "Internal Error.  Please go back and reload the page.";
			exit;
		}
		/* 
		 * check for user being in the db already.  If so drop user and
		 * recreate.
		 */
		if ( check_user($name) ) {
			del_user($name);
		} 

		add_user($name, $pass);
		add_db($db_name, $name);
		
		$i_added = make_string_added_to_db($name, $db_name);
		print "$i_added $back";
		
	} elseif ($name) {
	/* Adding a user to the database. */
		$userinfo = posix_getpwnam($name);
		$fname = $userinfo['gecos'];
		$uinfo = "$name - $fname ";
		$html = print_form($user_in_db, $uinfo, $name, $password_notice);
		print $html;
	} else {
		print "$welcome";
	}
?>
<p id="copyright">Copyright &copy; <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_top">GPLv2</a> 2011  <a href="mailto:nmoureyii@ne.rr.com">Nathan A. Mourey II</a></p> 
</body>
</html>
