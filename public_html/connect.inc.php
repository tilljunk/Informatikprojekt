<?php
// Variablen für den Connect deklarieren
$host="localhost";
$user="root";
$pw="";
$db="kombi";

// Verbindung zu Host und Datenbank
// Verbindung zum Server
$sql=@mysql_connect($host,$user,$pw) or die ("Die Verbindung zum Server <b>".$host. "</b> ist gescheitert.<p></p>Bitte kontrollieren Sie ob der SQL Server aktiv ist.<p></p>");
//$mysqli = new mysqli($host, $user, $pw, $db);
$mysql = mysqli_connect($host, $user, $pw, $db);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//printf("Initial character set: %s\n", mysqli_character_set_name($mysql));

/* change character set to utf8 */
if (!mysqli_set_charset($mysql, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($mysql));
    exit();
} else {
    //printf("Current character set: %s\n", mysqli_character_set_name($mysql));
}


if (!$mysql) {
    echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
    echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Verbindung zur Datenbank
$sql1 = @mysql_select_db($db, $sql) or die ("Die Verbindung zur Datenbank <b>".$db."</b> ist gescheitert. <p></p>");

mysql_query($sql1);
?>