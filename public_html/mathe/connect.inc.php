<?php
// Variablen für den Connect deklarieren
$host="localhost";
$user="kombi";
$pw="Kombi4GM";
$db="kombi";

// Verbindung zu Host und Datenbank
// Verbindung zum Server
$sql=@mysql_connect($host,$user,$pw) or die ("Die Verbindung zum Server <b>".$host. "</b> ist gescheitert.<p></p>Bitte kontrollieren Sie ob der SQL Server aktiv ist.<p></p>");
$mysqli = new mysqli($host, $user, $pw, $db);

// Verbindung zur Datenbank
$sql1 = @mysql_select_db($db, $sql) or die ("Die Verbindung zur Datenbank <b>".$db."</b> ist gescheitert. <p></p>");

mysql_query($sql1);
?>