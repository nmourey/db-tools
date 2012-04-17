Copyright (C) GPLv2 2011 Nathan A. Mourey II <nmoureyii@ne.rr.com>
This is the README for the 'MySQL Database User Management Tool' 

This software is redistributable under terms of the GNU GENERAL PUBLIC
LICENSE version 2.0

GPLv2.0 License is located in the docs/ directory.

Software tested :

        CentOS 6.2 32bit.
        Apache/2.2.15 (CentOS)
        PHP Version 5.3.3
        MySQL Client version 5.1.52


This software is targeted toward teachers needing a quick means of 
creating MySQL user accounts for students that already have normal 
Unix accounts.

Drawbacks : 
db.css needs to be cleaned up. I'm sure that their is a lot more to 
be done.  Can become cumbersome with large number of user accounts.
Need to sort the user names on the left alphabeticaly.

At this time it is very basic.  It allows creation of MySQL database 
users for users that already have a Unix login.  It grants the user 
with '*' (Full) permissions for there databases, which they need to 
create themselves.  The default database name for a user is the 
same as their Unix login id followed an '_'. ie, 'nmoureyii_' would
be my default database name.

The user can create and drop any database that follows this convention. 
For example their granted permission to create and drop databases 
that start with the following:

	nmoureyii_	

The use can now create and drop a databases called:
	
	nmoureyii_test1
	nmoureyii_test2

But can not create any database that doesn't begin with:
	
	nmoureyii_

The user cannot see any databases but thier own.

Once a users MySQL account is enabled they can login with the
following command:

$ mysql -u unix_account_name -p

They will then be prompted for the password that was assigned to 
them when their database was created.  Next the user can change
their password with the following command:

mysql> SET PASSWORD = PASSWORD("password");

This now becomes the new password for loging into the database.

-----------------------------------------------------------------
-		IMPORTANT CONFIGURATION INFORMATION 		-
-----------------------------------------------------------------
Things that may need configuring in the following file :
	config/functions.php

1.) Change the global variables for your database
configuration.

2.) If there are files/directories in /home that you would like
to exclued from the list of users that apears on the left side pane
add the entry to the $remove_list in the top of the 


NOTE: In order for the db-admin tool to work on CentOS 6.2 the
php-process package needs to be installed.

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

		** RHEL and CentOS users **

If you have selinux enabled you may need to run the following commnad. 
(You may not need to have the 'R' for recursive. I have not tested it.)

chcon -Rv --type=httpd_sys_content_t /home

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




