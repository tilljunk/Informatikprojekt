<?php
define('DBUSER','root');
define('DBPWD','');
define('DBHOST','localhost');
define('DBNAME','kombi');

// Create connection
$mysql = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);

// Check connection
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

/* change character set to utf8 */
if (!mysqli_set_charset($mysql, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($mysql));
    exit();
}

echo "Connected successfully<br>";





/*
// Variablen für den Connect deklarieren
$host="localhost";
$user="root";
$pw="";
$db="kombi";

// Verbindung zu Host und Datenbank
// Verbindung zum Server
$sql=@mysql_connect($host,$user,$pw) or die ("Die Verbindung zum Server <b>".$host. "</b> ist gescheitert.<p></p>Bitte kontrollieren Sie ob der SQL Server aktiv ist.<p></p>");
$mysqli = new mysqli($host, $user, $pw, $db);

// Verbindung zur Datenbank
$sql1 = @mysql_select_db($db, $sql) or die ("Die Verbindung zur Datenbank <b>".$db."</b> ist gescheitert. <p></p>");

mysql_query($sql1);
*/
?>