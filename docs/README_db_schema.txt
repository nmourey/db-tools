Copyright (C) GPLv2 2011 Nathan A. Mourey II <nmoureyii@ne.rr.com>
This is the README for the 'MySQL Database Schema Tool' 

This software is redistributable under terms of the GNU GENERAL PUBLIC
LICENSE version 2.0

GPLv2.0 License is located in the docs/ directory.

Software tested :

	CentOS 5.5 32bit.
	Apache/2.2.3 (CentOS)
	PHP Version 5.1.6
	MySQL Client version 5.0.77
	

This software is targeted toward teachers needing a quick means of 
viewing MySQL databases schema's their students have created.

This now becomes the new password for loging into the database.

-----------------------------------------------------------------
-		IMPORTANT CONFIGURATION INFORMATION 		-
-----------------------------------------------------------------
Things that may need configuring in the following file :
	config/functions.php

1.) Change the global variables for your database
configuration.

*****************************************************************
*			Secureing the site.			*
*****************************************************************

	To protect the program with a password, apache webserver
must have the following setting:

httpd.conf:    AllowOverride AuthConfig

The .htaccess file must configured and be in the db-admin directory.
The .htaccess file must be configured and have the AuthUserFile 
point must point to the .htpasswd file.

*****************************************************************

********************************************************************
		Declared Functions in config/functions.php
********************************************************************

function db_connect()
function get_user_list()
function check_user($user)
function del_user($user)
function add_user($user, $pass)
function add_db($db, $user)
function update_pass($user, $pass)
function fix_pass($str)
function fix_str($str)
function make_string_added_to_db($name, $db_name)
function print_form($user_in_db, $uinfo, $name, $password_notice)

********************************************************************
			ACKNOLAGEMENTS
********************************************************************
Joseph J. Barton IV - <joebarton@comcast.net>  UI Testing and spelling.

Function for creating random passwords:
http://www.totallyphp.co.uk/code/create_a_random_password.htm




