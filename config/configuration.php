<?php 
##################################################
#             Database configuration             #
##################################################
# DB_HOST:	The MySQL server to connect to		 #
# DB_USER:	The MySQL server username			 #
# DB_PASS:	The MySQL server password			 #
# DB_NAME:	The MySQL server database			 #
#                                                #
##################################################
define('DEBUG',true); // DEBUG MODE ON

define('DB_NAME', '_YOUR DATABASE NAME_'); //Databse Name

define('DB_USER', '_YOUR USERNAME_'); //Databse UserName

define('DB_PASSWORD', '_YOUR PASSWORD_'); //Databse Password

define('DB_HOST', '_YOUR HOST NAME_'); //Databse Host

##################################################
#  Folder configuration GLOBAL LINKS             #
##################################################
# R_PATH:	The absolute path. Don't change this #
#			unless you know what you're doing!	 #
# F_PATH:	The folder to store images			 #
#												 #
#			INFO: This folder is relative to the #
#			location of your form upload		 #
#			handler. (eg: upload.php)			 #
# H_FILE:	Change this to 'true' if you want    #
#			to create/use a .htaccess file to    #
#			protect your images folder.			 #
#												 #
#			WARNING: htaccess files are not 100% #
#			reliable! It's STRONGLY advised to   #
#			use a folder outside of your		 #
#			document root instead! This option   #
#			is only there for those who are		 #
#			unable to do so and therefor have no #
#			other choice but to rely on			 #
#			htaccess!							 #
##################################################

define('URL', 'http://localhost/citi/');

########################################
# DEFAULT CONTROLLERS FOR EACH PAGE    #
########################################

define('DEFAULT_CONTROLLER', 'Home'); // Default Controller

define('DEFAULT_METHOD', 'indexCiti'); // Default Controller

define('ENCRYPTION_KEY', '_SET_YOUR_KEY_PASSWORD_'); //Encryption KEY

define('ENCRYPTION_ALGORITHM','AES-256-CBC'); // encryption Algorithm
##################################################
#              File configuration                #
##################################################
# F_SIZE:	The maximum file size in KB or MB	 #
#			Example: 512K / 2M					 #
#												 #
#			WARNING: Make sure to check the		 #
#			values of 'post_max_size' and		 #
#			'upload_max_filesize' in your		 #
#			php.ini file! This setting should	 #
#			not be larger than either of those!	 #
##################################################

define('USER_IMAGES', 'pictures'); //product images path





