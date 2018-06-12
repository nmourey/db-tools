Copyright (C) GPLv2 2011-2018 Nathan A. Mourey II <nmoureyii@gmail.com>
This is the README for the 'MySQL Database Tools' 

This software is redistributable under terms of the GNU GENERAL PUBLIC
LICENSE version 2.0

GPLv2.0 License is located in the docs/ directory.

db-tools have been tested :

        Fedora 28 64Bit
        Apache 2.4.33
        PHP 7.x
        MariaDB 10.2

        // May or may not work, YMMV

	CentOS 6.x 32bit and 64bit. (With centos-release-cr installed)
	Apache/2.2.15 (CentOS)
	PHP Version 5.3.3
	MySQL Client version 5.1.52
	

This software is targeted toward teachers needing a quick means of 
createing databases and viewing schema's their students have 
created.

Documentation on db-admin and db-schema can be found in the 
following files in the db-tools/doc directory :

	README_db_admin.txt
	README_db_schema.txt

-----------------------------------------------------------------
-		IMPORTANT CONFIGURATION INFORMATION 		-
-----------------------------------------------------------------
Things that may need configuring in the following files :

	db-admin/config/functions.php
	db-schema/config/functions.php

1.) Change the global variables for your database
configuration.

NOTE: The php-process package needs to be installed in order to
work with CentOS 6.2 and Fedora 16.


*****************************************************************
*			Secureing the site.			*
*****************************************************************

	To protect the program with a password, apache webserver
must have the following setting:

httpd.conf:    AllowOverride AuthConfig

The .htaccess file must configured and be in the db-admin directory.
The .htaccess file must be configured and have the AuthUserFile 
point must point to the .htpasswd file.

********************************************************************
			ACKNOLAGEMENTS
********************************************************************

Function for creating random passwords:
http://www.totallyphp.co.uk/code/create_a_random_password.htm

