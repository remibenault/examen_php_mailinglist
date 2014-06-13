<?php

// CONNECTION TO DATABASE

define('DB_SERVER', 'mysql51-79.perso');
define('DB_USERNAME', 'remibena281091')
define('DB_PASSWORD', 'cet673S2');
define('DB_DATABASE', 'remibena281091');

$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());

?>