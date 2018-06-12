<?php

/*
	Copyright (C) GPLv2 2011 Nathan A. Mourey II <nmoureyii@ne.rr.com>

	Note: The db access methods are not as clean as they could
	be due to useing an older version of PHP.

	Change the global variables below to suite your configuration.
	The only one that really should need changing is $password.

*/

// global vars.
$hostname = "localhost"; 
$database = "mysql";
$username = "root";
$password = "";

/* List of users, files or directories to remove from output.   Keep the following format.
 * For example to add another item to exclude the following line would look you can user
 * all the perl style regular expressions.  Notic below I disallow listing any databases
 * starts with test but not any database that ends with test.
 * like :  $remove_list = "/map32.exe|perl|nmoureyii/";
 */

$remove_list = "/map32.exe|perl/";
 
$db_remove_list = "/information_schema|^test/";

/*******************  You should not need to go below this line. **********************/

function db_connect(){
	global $hostname;
	global $database;
	global $username; 
	global $password;

	$result = new mysqli($hostname, $username, $password, $database);

        if ( !$result ) {
                throw new Exception('Could not connect to the database');
        } else {
                return $result;
        }
}

// Get list of databases on system.
function get_db_list(){
	global $db_remove_list;
        $sql = "SHOW DATABASES";

	$conn = db_connect();
        $result = $conn->query($sql);

        if ( !$result ) {
                throw new Exception('Could not connect to the database');
        }

	$html = "<ul id='user_list'>";
        while ($row = $result->fetch_assoc()){
		$db_name = $row['Database'];
		if ( !preg_match($db_remove_list, $db_name) ) {
			$html .= "<li ><a href=\"tables.php?q=$db_name\" target=\"form\">$db_name</a></li>\n";
		}
	}
	$html .= "</ul>";
	return $html;
}

function get_table_list($db_name){
	$conn = db_connect();
	$q = sprintf("SHOW TABLES FROM `%s`", $db_name);
	$result = $conn->query($q) or die('Query failed. ' . mysql_error());

	
	if ($result->num_rows > 0){
		$html = "<h3>Tables in MySQL Database $db_name</h3>";
		$html .= "<div id=\"db_tables\"><ul>";
		while ( $row = $result->fetch_row() ) {
			$html .= "<li><a href=\"describe_table.php?table=$row[0]&db=$db_name\">$row[0]</a></li>";	
		}
		$html .= "</ul></div>";
	} else {
		$html .= "<span id=\"no_tables\">No tables pressent.</span>";
	}
	return $html;
}

function describe_table($db_table, $db_name){
	$color = true;
	
	$conn = db_connect();
	$conn->select_db($db_name);

	$q = sprintf("SHOW COLUMNS FROM `%s`", $db_table);
	$result = $conn->query($q) or die('Query failed. ' . mysql_error());

	$html = "<div><center><h3>Schema for table $db_table</h3></center></div>";
	$html .= "<div id=\"fields\"><p/><center><table cellpadding=\"0\" cellspaceing=\"0\"><thead><tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th><thead><tbody>";
	while ($row = $result->fetch_row() ) {
		if ($color){
			$html .= "<tr class=\"even\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
			$color = false;
		} else {
			$html .= "<tr class=\"odd\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
			$color = true;
		}
	}
	$html .= "</tbody></table></center></div>";
	return $html;
}

?>
