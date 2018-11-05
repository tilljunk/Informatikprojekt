<?php session_start();

include_once "connect.inc.php";

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");

$input = $_POST['bla'];


//Variablendeklaration
$counter = $_POST['counter'];
$next = $_POST['next'];
$type = $_POST['type'];
$rightid = $_POST['rightid'];
$cat = $_POST['cat'];
$rnd = $_POST['rnd'];
$rid = $_POST['rid'];
$lid = $_POST['lid'];
$dl = $_POST['dl'];
$count = $_POST['count'];



//Funktion zum runden
function float2rat($n, $tolerance = 1.e-6) {
    $h1=1; $h2=0;
    $k1=0; $k2=1;
    $b = 1/$n;
    do {
        $b = 1/$b;
        $a = floor($b);
        $aux = $h1; $h1 = $a*$h1+$h2; $h2 = $aux;
        $aux = $k1; $k1 = $a*$k1+$k2; $k2 = $aux;
        $b = $b-$a;
    } while (abs($n-$h1/$k1) > $n*$tolerance);

    return "$h1/$k1";
}

//Fakultät rekursiv
function fak($n) {
    if($n > 0)
        return $n * fak($n-1);
    else
        return 1;
}


//Funktion für das Laden der richtigen Antwort
function get_right_answer($counter, $input, $type, $cat){
    $r_answer = "SELECT Answer from right_answers AS ra, fragenpool AS f WHERE f.RA_ID = ra.RA_ID AND ra.RA_ID = ".$counter;
    $r2_answer = "SELECT Answer2 from right_answers AS ra, fragenpool AS f WHERE f.RA_ID = ra.RA_ID AND ra.RA_ID = ".$counter;

    $query = mysql_query($r_answer);
    $query2 = mysql_query($r2_answer);
    $antwort2_result = mysql_result($query2,0);
    $antwort_result = mysql_result($query,0);


    switch($cat){
        case "Variation":
            if($type == "ZmZ"){
                if(strpos($input, '^') != false){
                    $calc = strpos($input, '^');
                    $part1 = substr($input,0,$calc);
                    $part2 = substr($input,$calc+1);
                    $calculation = pow($part1,$part2);
                }
                else $calculation = eval('return '.$input.';');
            }
            else{
                if(strpos($input, "/") !== FALSE AND strpos($input, "!") !== FALSE){
                    $calculation = explode("/", $input, 2);
                    $part1 = substr($calculation[0],0,-1);
                    $part1 = eval('return '.$part1.';');
                    $part1 = fak($part1);

                    $part2 = substr($calculation[1],0,-1);
                    $part2 = eval('return '.$part2.';');
                    $part2 = fak($part2);

                    $calculation = $part1 / $part2;


                }
                elseif(substr_count($input, '!') == 1){
                    $calculation = substr($input,0,-1);
                    $calculation = fak($calculation);
                }
                elseif(strpos($input, "/") !== FALSE){
                    $calculation = explode("/", $input, 2);
                    $calculation = $calculation[0] / $calculation[1];

                }
                elseif(strpos($input, "o") !== FALSE){
                    $calculation = explode("o", $input, 2);
                    $part1 = substr($calculation[0],0,-1);
                    $part1 = eval('return '.$part1.';');
                    $part1 = fak($part1);

                    $part2 = substr($calculation[1],0,-1);
                    $part2 = eval('return '.$part2.';');
                    $part2 = fak($part2);

                    $calculation = $part1 / $part2;

                }
                elseif(substr_count($input, '*') > 0){

                    $calculation = eval('return '.$input.';');
                }
                else $calculation = $input;
            }
            break;

        case "Kombination":

            if(strpos($input, "/") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, '/') == 1
                OR strpos($input, "ü") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, 'ü') == 1
                OR strpos($input, "o") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, 'o') == 1
                OR strpos($input, "ü") !== FALSE OR strpos($input, "o") !== FALSE){

                $chars = array("(" => "", ")" => "");
                $input = strtr ( $input , $chars );


                if(strpos($input, "/") !== FALSE)
                    $calculation = explode("/", $input, 2);
                else if(strpos($input, "ü") !== FALSE)
                    $calculation = explode("ü", $input, 2);
                else if(strpos($input, "o") !== FALSE)
                    $calculation = explode("o", $input, 2);
                $part1 = $calculation[0];
                $part1 = eval('return '.$part1.';');
                $part1 = fak($part1);
                $part2 = $calculation[1];

                if(strpos($part2, "*") !== FALSE) {
                    $part2 = explode("*", $part2, 2);
                    $part2[0] = substr($part2[0], 0, -1);
                    $part3 = fak($part2[1]);

                    $part2 = eval('return ' . $part2[0] . ';');
                    $part2 = fak($part2);
                    $calculation = $part1 / ($part2 * $part3);
                }
                else {
                    $part2 = fak($part2) * fak(($calculation[0] - $part2));
                    $calculation =  $part1 / $part2;
                }

            }
            elseif(strpos($input, "/") !== FALSE AND substr_count($input, '/') == 1){
                $calculation = explode("/", $input, 2);
                $calculation = $calculation[0] / $calculation[1];

            }
            elseif(substr_count($input, '!') == 1){
                $calculation = substr($input,0,-1);
                $calculation = fak($calculation);
            }
            elseif(strpos($input, "(") !== FALSE AND strpos($input, ")") !== FALSE AND strpos($input, "o") !== FALSE){
                $chars = array("(" => "", ")" => "");
                $input = strtr ( $input , $chars );

                $parts = explode("o", $input, 2);

                $parts[0] = eval('return ' . $parts[0] . ';');
                $parts[0] = fak($parts[0]);

                $parts[1] = eval('return ' . $parts[1] . ';');
                $parts[1] = fak($parts[1]);
                    }
            else $calculation = eval('return ' . $input . ';');
            break;

        case "Laplace": {
            if(substr_count($input, ',') > 0){  $input = str_replace(",",".",$input);
                $calculation = float2rat($input);
            }
            else if(strpos($input, "/") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, '/') == 1
                OR strpos($input, "ü") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, 'ü') == 1
                OR strpos($input, "o") !== FALSE AND strpos($input, "!") !== FALSE AND substr_count($input, 'o') == 1){

                $chars = array("(" => "", ")" => "");
                $input = strtr ( $input , $chars );

                if(strpos($input, "/") !== FALSE)
                    $calculation = explode("/", $input, 2);
                else if(strpos($input, "ü") !== FALSE)
                    $calculation = explode("ü", $input, 2);
                else if(strpos($input, "o") !== FALSE)
                    $calculation = explode("o", $input, 2);
                $part1 = substr($calculation[0],0,-1);


                if(substr_count($part1, "*") > 0){
                    $part1_2 = explode("*", $part1, 2);
                    $part1_2[1] = fak($part1_2[1]);
                    $part1 = $part1_2[0]."*".$part1_2[1];
                    $part1 = eval('return ' . $part1 . ';');

                }

                $part2 = substr($calculation[1],0,-1);


                                if(strpos($part2, "*") !== FALSE) {
                                    $part2 = explode("*", $part2, 2);
                                    $part2[0] = substr($part2[0], 0, -1);
                                    $part3 = fak($part2[1]);

                                    $part2 = eval('return ' . $part2[0] . ';');
                                    $part2 = fak($part2);
                                    $calculation = $part1 / ($part2 * $part3);
                                }
                                else {
                                    $part2 = fak($part2) * fak(($calculation[0] - $part2));
                                    $calculation = $part1 / $part2;
                                }
                
            }
            else{
                $calculation = eval('return '.$input.';');
                if(abs($calculation-$antwort_result) < 1E-6){
                    $calculation = $antwort_result;
                }
            }

            break;
        }
        case "Summenregel": {
            $calculation = eval('return '.$input.';');

            break;
        }
        case "Produktregel":
            $calculation = eval('return '.$input.';');
            break;

        case "Permutation":
            if(substr_count($input, '!') == 1){
                $calculation = substr($input,0,-1);
                $calculation = fak($calculation);
            }
            elseif (substr_count($input, '!') > 1 AND substr_count($input, '*') > 0){
                $calc = explode("*", $input, substr_count($input, '!'));
                $calculation = 1;
                for($i = 0; $i < count($calc); $i++){
                    $calc[$i] = substr($calc[$i],0,-1);
                    $calc[$i] = fak($calc[$i]);
                    $calculation *= $calc[$i];
                }

            }
            else if(substr_count($input, '*') > 0){
                $calculation = eval('return '.$input.';');
            }
            else $calculation = eval('return '.$input.';');

            break;

        case "Komplexe":
            if(substr_count($input, "%") == 1){
                $parts = explode("%", $input);
                $calculation = eval('return '.$parts[0].';');
                $calculation .= $parts[1];
                $calculation = $input;
            }
            else if(substr_count($input, "/") > 0 AND substr_count($input, "^") > 0 AND substr_count($input, "-") > 0){
                $parts = explode("-", $input);
                $part2 = explode("/", $parts[1]);
                $part2[0] = eval('return '.$part2[0].';');

                $part3 = explode("^",$part2[1]);
                $part3 = pow($part3[0],$part3[1]);

                $calculation = $part2[0] / $part3;
                $calculation = 1- $calculation;
                $calculation *= 100;
                $calculation = round($calculation, 3);
                $calculation .= "%";
            }
            else{
                $calculation = eval('return '.$input.';');
                $calculation *= 100;
                $calculation = round($calculation, 3);
                $calculation .= "%";
            }
        break;
    }

    //Prüfen ob die berechnete Eingabe gleich der richtigen ist
    if($calculation != $antwort_result){
        echo "Deine Antwort $input ($calculation) ist leider falsch.";
        echo "<br>";
        echo "Die richtige Antwort lautet $antwort_result ($antwort2_result)";
        $_SESSION['answer'] = 0;
    }
    elseif($calculation == $antwort_result){
        echo "Deine Antwort $input ($calculation) ist richtig!";
        $_SESSION['answer'] = 1;
    }
}

//Laden der Frage
function get_question($counter){
    $sql_results = "SELECT Frage from fragenpool where F_ID = $counter";
    $query = mysql_query($sql_results);

    echo mysql_result($query,0);

}

//Bei random Fragen jeweils die richtigen Laden
if($_POST['rnd'] == 'Sonder') $result = mysql_query("SELECT F_ID FROM fragenpool where
												Kategorie = 'Laplace' OR Kategorie = 'Permutation' OR Kategorie = 'Summenregel'
												OR Kategorie = 'Produktregel' ORDER BY RAND() LIMIT 5");

else if($_POST['rnd'] == 'VariKombi') $result = mysql_query("SELECT F_ID FROM fragenpool where
												Kategorie = 'Kombination' OR Kategorie = 'Variation' ORDER BY RAND() LIMIT 5");
else if($_POST['rnd'] == 'Pruefung') $result = mysql_query("SELECT F_ID FROM fragenpool ORDER BY RAND() LIMIT 10");
else $result = mysql_query("SELECT F_ID FROM fragenpool where Kategorie = '$cat' AND Art = '$type'");


if($rid != NULL){
    $rid = explode(',', $rid);
    $qid = array_shift($rid);
    $rid = implode(",", $rid);
} else $qid = get_question_ids($result, $counter);



//typ der Frage holen
function get_type($qid){
    $sql_results = "SELECT Art from fragenpool where F_ID = $qid";
    $query = mysql_query($sql_results);

    return mysql_result($query,0);
}

//Kategorie holen
function get_category($qid){
    $sql_results = "SELECT Kategorie from fragenpool where F_ID = $qid";
    $query = mysql_query($sql_results);

    return mysql_result($query,0);

}

//Bild holen (Momentan keinen nutzen)
function get_img($id, $category, $type){
    $sql_results = "SELECT img from fragenpool where Kategorie = '$category' AND Art = '$type' AND F_ID = ".$id;
    $query = mysql_query($sql_results);
    $img = mysql_result($query,0);
    return $img;
}

//IDS der Fragen holen
function get_question_ids($result, $question_id) {
    $i = 0;
    $rstring = "";

    while($row=mysql_fetch_row($result)) {
        $return[] = $row;
        $rstring .= $return[$i][0].",";
        $i++;
    }

    if($question_id < 0) return $rstring;
    else return $return[$question_id][0];
}

//Tooltips aus der DB holen
function get_tips($counter){
    $tt = mysql_fetch_row(mysql_query("SELECT Tipp1,Tipp2,Tipp3,Tipp4,Tipp5 from tooltipps,fragenpool where tooltipps.TT_ID = fragenpool.TT_ID AND fragenpool.F_ID = ". $counter));
    if($tt[1] == null) unset($tt[1]);
    if($tt[2] == null) unset($tt[2]);
    if($tt[3] == null) unset($tt[3]);
    if($tt[4] == null) unset($tt[4]);
    // if($tt[1] == null) { $tt[2] = 1; } else $tt[2] = 2;
    return $tt;

}

//Downloads holen aus den Ordnern der Qustion ID!
function get_downloads($qid, $count){
    $path= "downloads/loesungen/".$qid;
    $directory = scandir($path);
    $directory = array_diff($directory, array('.', '..'));
    if($qid == 38 OR $qid == 39) {
        echo '
                       Die Excel-Mappe bietet für die Geburtstags-Fragen 2 und 3 im Blatt „Rechnung“ das Ganze zusammengefasst und im Blatt „Simulation aller Fälle“ noch eine anschauliche Tabelle mit allen Fällen und ermöglicht damit eine unabhängige Kontrolle und Bestätigung der Rechnung.
                      <br /><br /> Lösungen: <br />
                      <a href="downloads/geburtstag_wochentag.xlsx" download>Geburtstags Wochentag</a><br /><br />';
    }
    else echo "Lösungen: <br />";
    $i = 1;
    //Laden aller dateien in dem Ordner
    foreach($directory as $value){
        echo "<a href='$path/$value' download>Handschriftliche L&ouml;sung der $count. Aufgabe</a>";
        $i++;
    }

}

if(isset($_POST['id'])) {
    $gt = get_type($_POST['id']);
    $gc = get_category($_POST['id']);
}
else{
    $gt = get_type($qid);
    $gc = get_category($qid);
}

?>

<!-- Hier werden alle Ausgaben "geschrieben" und vom Javascript aufgefangen -->
<html>
<head></head>
<body>
<div id="ra"><?php if(isset($input)) get_right_answer($rightid, $input,$type, $cat); ?></div>
<span id="question"><?php get_question($qid); ?></span>
<span id="tips"><?php
    foreach(get_tips($qid) as $value){
        echo $value.";";
    }
    ?></span>
<span id="tips_content"><?php echo count(get_tips($qid))
    ; ?></span>
<span id="rid"><?php echo $qid; ?></span>
<span id="rnd"><?=$rid; ?></span>
<span id="cat"><?php echo $gc; ?></span>
<span id="type"><?php echo $gt; ?></span>
<span id="img"><?php echo get_img($qid, $cat, $type); ?></span>
<span id="answer">
<?php echo $_SESSION['answer']; ?>
</span>
<span id="dl"><?php get_downloads($dl,$count); ?></span>
</body>
</html>