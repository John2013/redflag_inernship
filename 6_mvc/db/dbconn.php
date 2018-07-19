<?

$dbconn = pg_connect("host=" . PROPS['db']['host'] . " dbname=" . PROPS['db']['dbname'] .
	" user=" . PROPS['db']['user'] . " password=".PROPS['db']['password']."")
or die('Could not connect: ' . pg_last_error());

define('DBCONN', $dbconn);