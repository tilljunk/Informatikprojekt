<?php 

function get_question($qid){
$sql_results = "SELECT Frage from fragenpool where F_ID = ".$qid;
$query = mysql_query($sql_results);

echo mysql_result($query,0);

}

	
		function get_question_ids($result, $question_id) {
				while($row=mysql_fetch_row($result)) {
				$return[] = $row;
			}
			return $return[$question_id][0];
		}
		
		
	function get_img(){	
		return mysql_result(mysql_query("SELECT img from fragenpool where Kategorie = 'Variation' AND Art = 'ZmZ' AND F_ID = ".$_SESSION['counter']),0);	
	}


function get_right_answer($counter){
	
	$calc = strpos($_POST['eingabe'], '^');
$r_answer = "SELECT Answer from right_answers AS ra, fragenpool AS f WHERE f.RA_ID = ra.RA_ID AND ra.RA_ID = ".$_SESSION['counter'];
$r2_answer = "SELECT Answer2 from right_answers AS ra, fragenpool AS f WHERE f.RA_ID = ra.RA_ID AND ra.RA_ID = ".$_SESSION['counter'];

$query = mysql_query($r_answer);
$query2 = mysql_query($r2_answer);
$antwort2_result = mysql_result($query2,0);
$antwort_result = mysql_result($query,0);
$eingabe = $_POST['eingabe'];


$part1 = substr($eingabe,0,$calc);
$part2 = substr($eingabe,$calc+1);

$calculation = pow($part1,$part2);
if(isset($_POST['loesen']) AND $eingabe != $antwort_result AND $eingabe != $antwort2_result){
echo "Ihre Antwort $eingabe ist leider falsch.";
echo "<br>";
echo "Die richtige Antwort lautet $antwort_result oder $antwort2_result";
}
elseif(isset($_POST['loesen']) AND ($calculation == $antwort_result)){
echo "Ihre Antwort $eingabe ist richtig!";
	$_SESSION['ra']++;
}

}


?>