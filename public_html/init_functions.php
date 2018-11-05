<?php

include("dynamicfunctions.php");	//NEU NOVEMBER 2018

function output_next_button($max) {
	if(isset($_SESSION['a_fragen']) && $_SESSION['a_fragen'] >= $max) {
		//echo '<input type="button" id="next" onclick="document.location.href=\'lernmodus.php?finished=1\';" value="Abschlie&szlig;en">';
		echo '<button id="next">Nächste Frage</button>';
	} else {
		echo '<form id="nb">';
		echo '<button id="next">Nächste Frage</button>';
		echo '</form>';
	}
}

function get_max($category, $type){
    if($category == "gemischt" AND $type="VariKombi")
        return mysql_num_rows(mysql_query("SELECT * from fragenpool where Kategorie = 'Komplexe' OR Kategorie = 'Variation' OR Kategorie = 'Kombination'"));
    else if($category == "gemischt" AND $type="sonder")
        return mysql_num_rows(mysql_query("SELECT * from fragenpool where Kategorie = 'Laplace' OR Kategorie = 'Permutation' OR Kategorie = 'Summenregel' OR Kategorie = 'Produktregel'"));
    else if($category == "gemischt" AND $type="Prüfung")
        return mysql_num_rows(mysql_query("SELECT * from fragenpool"));
    else
         return mysql_num_rows(mysql_query("SELECT * from fragenpool where Kategorie = '$category' AND Art = '$type'"));
}


function get_qMinMax($category, $type){
    if($category == "gemischt" AND $type="VariKombi")
        return mysql_fetch_row(mysql_query("SELECT F_ID FROM fragenpool where Kategorie = 'Komplexe' OR Kategorie = 'Variation' OR Kategorie = 'Kombination' ORDER BY RAND() LIMIT 1"));
    else if($category == "gemischt" AND $type="sonder")
        return mysql_fetch_row(mysql_query("SELECT F_ID FROM fragenpool where Kategorie = 'Laplace' OR Kategorie = 'Permutation' OR Kategorie = 'Summenregel' OR Kategorie = 'Produktregel' ORDER BY RAND() LIMIT 1"));
    else if($category == "gemischt" AND $type="Prüfung")
        return mysql_fetch_row(mysql_query("SELECT F_ID FROM fragenpool ORDER BY RAND() LIMIT 1"));
    else
        return mysql_fetch_row(mysql_query("SELECT min(F_ID),max(F_ID) FROM fragenpool where Kategorie = '$category' AND Art = '$type'"));
}

function get_tts($id){
    $tt = mysql_fetch_row(mysql_query("SELECT Tipp1,Tipp2,Tipp3,Tipp4,Tipp5 from tooltipps,fragenpool where tooltipps.TT_ID = fragenpool.TT_ID AND fragenpool.F_ID = ". $id));
    if($tt[1] == null) unset($tt[1]);
    if($tt[2] == null) unset($tt[2]);
    if($tt[3] == null) unset($tt[3]);
    if($tt[4] == null) unset($tt[4]);
   // if($tt[1] == null) { $tt[2] = 1; } else $tt[2] = 2;
    return $tt;
}


function get_question($id){
    $sql_results = "SELECT Frage from fragenpool where F_ID = ".$id;
    $query = mysql_query($sql_results);
    echo mysql_result($query,0);
}

function get_id($id){
    $sql_results = "SELECT F_ID from fragenpool where F_ID = ".$id;
    $query = mysql_query($sql_results);

    echo mysql_result($query,0);

}

////////////////////////////////////NEUE FUNKTIONEN AB NOVEMBER 2018//////////////////////////////////////////////////////
function holeFragen($category){
	global $mysql;	//Greife auf Globale Variable zu
	$result = null;
	$fragen = null;
    if($category == "IEPrinzip")
        $result = mysqli_query($mysql,"SELECT * FROM dynamischefragen d LEFT OUTER JOIN kategorien k ON k.kID = d.kategorie WHERE k.bezeichnung = 'Inklusion Exklusion Prinzip' ORDER BY RAND()");
    else if($category == "Binomial")
        $result = mysqli_query($mysql,"SELECT * FROM dynamischefragen d LEFT OUTER JOIN kategorien k ON k.kID = d.kategorie WHERE k.bezeichnung = 'Binomialverteilung' ORDER BY RAND()");
    else if($category == "Hypergeo")
		$result = mysqli_query($mysql,"SELECT * FROM dynamischefragen d LEFT OUTER JOIN kategorien k ON k.kID = d.kategorie WHERE k.bezeichnung = 'Hypergeometrische Verteilung' ORDER BY RAND()");
    else{
		echo "Kategorie " . $category . " existiert nicht!";
	}
	
	if(mysqli_num_rows($result) > 0){
		$fragen = array();
	}
	
	//Solange Fragen vorhanden sind => diese dynamisch berechnen
	while($row = mysqli_fetch_array($result)){
		$fragen[] = createDynamic($row['fragetext'], $row['loesungsschema']);
	}
	
	return $fragen;
}


?>