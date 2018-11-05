<?php
include_once "connect.inc.php";

$user = "konen";
$pw = md5("MatheKonen");

if(!isset($_POST['login'])){
  ?>  <html>
            <head>

            </head>
            <body>

            <form action="insert_questions.php" method="post">
        Nutzername: <input type="text" name="user"><br>
    Passwort: <input type="password" name="pw"><br>
                <input type="submit" name="login" value="Login">
            </form>

            </body>
            </html>
<?php
}


if(isset($_POST['login'])) {
    if ($_POST['user'] == $user && md5($_POST['pw']) == $pw) {
       echo' <html>
    <head>
        <meta charset="utf-8"/>

    </head>

    <body>

    <form action="insert_questions.php" method="post">
            Hier die Frage einegben: <textarea cols="35" rows="4" name="Frage"></textarea><br/>
        Hier die Kategorie eingeben:
        <select name="kat">
            <option value="Kombination">Kombination</option>
            <option value="Variation">Variation</option>
            <option value="Permutation">Permutation</option>
            <option value="Laplace">Laplace</option>
            <option value="Summenregel">Summenregel</option>
            <option value="Produktregel">Produktregel</option>
            <option value="Komplexe">Komplexe Aufgaben</option>
        </select><br/>
        Hier die Art eingeben:
        <select name="art">
            <option value="ZoZ">ZoZ</option>
            <option value="ZmZ">ZmZ</option>
            <option value="Nothing">Keine Kombination/Variation-Aufgabe</option>
        </select><br/>

        <input type="submit" name="senden" value="Einfuegen">
    </form>


    </body>
    </html>

    ';

    if (isset($_POST['senden'])) {
        $frage = trim($_POST['Frage']);
        if (empty($frage)) {
            echo "Die Frage darf nicht leer sein";
        } else {
            print_r($_POST);
            $kat = $_POST['kat'];
            if ($_POST['art'] == "Nothing")
                $art = $_POST['kat'];

            mysql_query("SET NAMES 'utf8'");
            $sql = "INSERT INTO fragenpool (Frage,Kategorie,Art)
                VALUES ('$frage','$kat','$art')";

            $result = mysql_query($sql);

            $id = mysql_insert_id();
            echo $id;

            $sql1 = "UPDATE fragenpool SET RA_ID='$id' WHERE F_ID='$id'";

            mysql_query($sql1);

        }
    }
    } else {
         ?>
            <html>
            <head>

            </head>
            <body>

            <form action="insert_questions.php" method="post">
                Nutzername: <input type="text" name="user"><br>
                Passwort: <input type="password" name="pw"><br>
                <input type="submit" name="login" value="Login">
            </form>

            </body>
            </html>

            <?php
        }
    }
    else echo "Ungültiger Login";
    ?>