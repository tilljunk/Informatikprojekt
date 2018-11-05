<?php
	//DEFINITIONEN
	//Zusatzdefinitionen
	define('PLATZHALTER','###');
	define('MINIMUM_RANDOM', 1);
	define('MAXIMUM_RANDOM', 20);
	
	//DB Definition
	define('PARAMETER','param');
	define('PARAMETERLAENGE', strlen(PARAMETER) + 2);	//+2 da paramXX geschrieben wird
	define('OPERATION_OPEN', '[opr]');
	define('OPERATION_CLOSE', '[\opr]');
	
	//DB Operationen Definition
	define('ADDITION', '+');
	define('SUBTRAKTION', '-');
	define('MULTIPLIKATION', '*');
	define('DIVISION', '/');
	define('MODULO', '%');
	define('POTENZ', '^');
	define('ZUWEISUNG_OPEN', '=');
	define('ZUWEISUNG_CLOSE', ';');
	define('KLAMMER_OPEN', '(');
	define('KLAMMER_CLOSE', ')');
	define('WURZEL_OPEN', '[sqrt]');
	define('WURZEL_CLOSE', '[\sqrt]');
	define('N_WURZEL_OPEN', '[pow]');
	define('N_WURZEL_CLOSE', '[\pow]');
	define('ZUFALL_OPEN', '[ran]');
	define('ZUFALL_CLOSE', '[\ran]');
	define('MINIMUM_OPEN', '[min]');
	define('MINIMUM_CLOSE', '[\min]');
	define('MAXIMUM_OPEN', '[max]');
	define('MAXIMUM_CLOSE', '[\max]');
	define('BINOMINIALKOEFFIZIENT_OPEN', '[binc]');
	define('BINOMINIALKOEFFIZIENT_CLOSE', '[\binc]');
	define('BINOMINIALVERTEILUNG_OPEN', '[bin]');
	define('BINOMINIALVERTEILUNG_CLOSE', '[\bin]');
	define('SUMME_BINOMINIALVERTEILUNG_OPEN', '[sbin]');
	define('SUMME_BINOMINIALVERTEILUNG_CLOSE', '[\sbin]');
	define('ROUND_OPEN', '[rnd]');
	define('ROUND_CLOSE', '[\rnd]');
	
	//Alle Operatoren und das PHP-Äquivalent
	const OPERATOREN = array(	array('name' => ADDITION, 'funktion' => '+'),
								array('name' => SUBTRAKTION, 'funktion' => '-'),
								array('name' => MULTIPLIKATION, 'funktion' => '*'),
								array('name' => DIVISION, 'funktion' => '/'),
								array('name' => MODULO, 'funktion' => '%'),
								array('name' => POTENZ, 'funktion' => '**'),
								array('name' => ZUWEISUNG_OPEN, 'funktion' => '='),
								array('name' => ZUWEISUNG_CLOSE, 'funktion' => ';'),
								array('name' => KLAMMER_OPEN, 'funktion' => '('),
								array('name' => KLAMMER_CLOSE, 'funktion' => ')'),
								array('name' => WURZEL_OPEN, 'funktion' => 'sqrt('),
								array('name' => WURZEL_CLOSE, 'funktion' => ')'),
								array('name' => N_WURZEL_OPEN, 'funktion' => 'pow('),
								array('name' => N_WURZEL_CLOSE, 'funktion' => ')'),
								array('name' => ZUFALL_OPEN, 'funktion' => 'rand('),
								array('name' => ZUFALL_CLOSE, 'funktion' => ')'),
								array('name' => MINIMUM_OPEN, 'funktion' => 'min('),
								array('name' => MINIMUM_CLOSE, 'funktion' => ')'),
								array('name' => MAXIMUM_OPEN, 'funktion' => 'max('),
								array('name' => MAXIMUM_CLOSE, 'funktion' => ')'),
								array('name' => BINOMINIALKOEFFIZIENT_OPEN, 'funktion' => "binomial_coeff("),
								array('name' => BINOMINIALKOEFFIZIENT_CLOSE, 'funktion' => ")"),
								array('name' => BINOMINIALVERTEILUNG_OPEN, 'funktion' => "binomialverteilung("),
								array('name' => BINOMINIALVERTEILUNG_CLOSE, 'funktion' => ")"),
								array('name' => SUMME_BINOMINIALVERTEILUNG_OPEN, 'funktion' => "summeBinomial("),
								array('name' => SUMME_BINOMINIALVERTEILUNG_CLOSE, 'funktion' => ")"),
								array('name' => ROUND_OPEN, 'funktion' => "round("),
								array('name' => ROUND_CLOSE, 'funktion' => ")")
							);


	//FUNKTIONEN
	//Rekursive in_array Suche auf Multidimensionalen Arrays
	//https://stackoverflow.com/questions/4128323/in-array-and-multidimensional-array
	function in_array_r($needle, $haystack, $strict = false) {
		foreach($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		return false;
	}
	
	//Binomialkoeffizient rechner
	//https://secure.php.net/manual/de/ref.math.php
	function binomial_coeff($n, $k) {
		if(is_string($n)){
			$n = intval($n);
		}
		
		if(is_string($k)){
			$k = intval($k);
		}
		
		//echo "N = " . $n . " K = " . $k . "<br>";
				
		$j = $res = 1;

		if($k < 0 || $k > $n)
			return 0;
		if(($n - $k) < $k)
			$k = $n - $k;

		while($j <= $k) {
			$res *= $n--;
			$res /= $j++;
		}

		//echo "Result = " . $res . "<br>";
		
		return $res;
   }
   
   //Binomialverteilung
   function binomialverteilung($n, $k, $p){
		//N muss größer gleich K sein, Wahrscheinlichkeit muss zwischen 0 und 100 liegen
		if($n >= $k && $p >= 0 && $p <= 100){
			
			//Wird benutzt wenn Wahrscheinlichkeit in % angegeben wurde => dann durch 100 teilen
			if($p > 1){
				$p = $p / 100;
			}
			
			//Gegenwahrscheinlichkeit
			$q = 1 - $p;
			
			//Berechne Ergebnis
			$ergebnis = binomial_coeff($n,$k) * pow($p,$k) * pow($q, ($n-$k));
			
			return $ergebnis;
		} else {
			return -1;
		}
	}
	
	//Binomialverteilung Summe
	function summeBinomial($n, $k, $p){
		//N muss größer gleich K sein, Wahrscheinlichkeit muss zwischen 0 und 100 liegen
		if($n >= $k && $p >= 0 && $p <= 100){
			$ergebnis = 0;
			
			//Aufsummieren der einzelnen Wahrscheinlichkeiten
			for(;$k <= $n; $k++){
				$ergebnis += binomialverteilung($n, $k, $p);
			}
			
			return $ergebnis;
		} else {
			return -1;
		}
	}
   
	function createDynamic($text){
		$loesung = '';
		while($row = mysqli_fetch_array($result)){
			echo $row['fragetext'] . "<br>";
			$text = $row['fragetext'];
			$loesung = $row['loesungsschema'];
		}

		$newText = "";
		$arrayOperationen = array();
		$pos = 0;
		//Suche alle Operationen
		while($tempPos = strpos($text, OPERATION_OPEN, $pos)){			//Position vor [opr]
			//Alten Text übernehmen
			$newText .= substr($text, $pos, $tempPos - $pos) . PLATZHALTER;	//Neuen Text erstellen und Platzhalter (###) erstellen
			
			//Position der Operation herausfinden
			$tempPos += strlen(OPERATION_OPEN); 							//Position nach [opr]
			$tempPosEnde = strpos($text, OPERATION_CLOSE, $tempPos);		//Position vor [\opr]
			$pos = $tempPosEnde + strlen(OPERATION_CLOSE);				//Position nach [\opr]
			
			$arrayOperationen[] = array('op' => substr($text, $tempPos, $tempPosEnde - $tempPos),
										'value' => 0);	//Jeder Operation wird erst mit 0 initialisiert
			
			//echo $tempPos . " // " . $tempPosEnde . " // " . $pos . " ==> " . substr($text, $tempPos, $tempPosEnde - $tempPos) .  '<br>';
		}
		//Ende anhängen
		$newText .= substr($text, $pos, strlen($text) - $pos);
		//echo "<br><b>Platzhaltertext:</b><br>" . $newText . "<br><br>";
		
		$arrayParameter = array();
		//Parameter suchen und Platzhalter ersetzen + Zuweisung
		foreach($arrayOperationen as $key => $value){
			$operation = $value['op'];
			
			//echo "<b>" . (1 + $key) . ".Operation: " . $operation . "</b><br>";
			
			$pos = 0;
			$tempPos = strpos($operation, PARAMETER, $pos);
			//Suche zuerst nach Parameter und initialisiere diese wenn nötig
			//echo "Suche nach Parameter...<br>";
			while( $tempPos > -1 && $tempPos < strlen($operation)){
				
				//Schauen ob es eine Zuweisung (=) ist, dann wird der Parameter ersteinmal übersprungen "paramXX=...;"
				if(substr($operation, $tempPos + PARAMETERLAENGE, strlen(ZUWEISUNG_OPEN)) != ZUWEISUNG_OPEN){
					//Variable um den Parameter temporär zu speichern
					$tempParam = array( 'name' => substr($operation, $tempPos, PARAMETERLAENGE),
										'value' => 0);	//Jeder Parameter wird erst mit 0 initialisiert
					
					//Schaue in Array ob der Parameter schon erstellt wurde?
					if(count($arrayParameter) != 0 && in_array_r($tempParam['name'], $arrayParameter)){
						//Parameter wurde schon erstellt
						foreach($arrayParameter as $array){
							//Multidimensionales Array!!!
							if(in_array($tempParam['name'], $array)){
								$tempParam['value'] = $array['value'];		//Überschreibe Value von tempParam
								break;										//Schleifenabbruch, Variable wurde gefunden => kann keine andere mehr sein!
							}
						}
					} else {
						//Parameter wurde noch nicht erstellt.					
						//Erstelle Value nach Eigenschaften (noch nicht implemenetiert)
						$tempParam['value'] = rand(MINIMUM_RANDOM, MAXIMUM_RANDOM);
						
						//Trage Parameter in die Parameter-Liste ein
						$arrayParameter[] = array( 	'name' => $tempParam['name'],
													'value' => $tempParam['value']);
					}
					
					//Setze Suchposition weiter
					$pos = $tempPos + PARAMETERLAENGE;
					//echo "Position:" .  $tempPos . "-" . $pos . " ==> Name:" . $tempParam['name'] . " ==> Value:" . $tempParam['value'] . "<br>";
					$tempPos = strpos($operation, PARAMETER, $pos);
				} else {
					//Setze Suchposition weiter
					$pos = $tempPos + PARAMETERLAENGE + strlen(ZUWEISUNG_OPEN);
					//echo "Position:" .  $tempPos . "-" . $pos . " ist ein Zuweisungsparameter!<br>";
					$tempPos = strpos($operation, PARAMETER, $pos);
				}
			}
			
			//Platzhalter ersetzen einsetzen
			$platzhalterNames = array();
			$platzhalterValues = array();
			//Füge Parameter in Platzhalterliste hinzu
			foreach($arrayParameter as $param){
				$platzhalterNames[] = $param['name'];
				$platzhalterValues[] = $param['value'];
			}
			//Füge Operator-Funktionen in Platzhalterliste hinzu
			foreach(OPERATOREN as $operator){
				$platzhalterNames[] = $operator['name'];
				$platzhalterValues[] = $operator['funktion'];
			}

			//Ersetze Platzhalter
			$operation = str_replace($platzhalterNames, $platzhalterValues , $operation);
			//echo "<br>Operation ohne Platzhalter:" . $operation . "<br><br>";
			
			//Berechne die Zuweisungsparameter (sofern welche existieren) "paramXX=...;"
			$pos = 0;
			$tempPos = strpos($operation, PARAMETER, $pos);
			//echo "Suche nach Zuweisungsparameter...<br>";
			while( $tempPos > -1 && $tempPos < strlen($operation)){
				
				//Variable um den Parameter temporär zu speichern
				$tempParam = array( 'name' => substr($operation, $tempPos, PARAMETERLAENGE),
									'value' => 0);	//Jeder Parameter wird erst mit 0 initialisiert
				
				//Schaue in Array ob der Parameter schon erstellt wurde?
				if(count($arrayParameter) != 0 && in_array_r($tempParam['name'], $arrayParameter)){
					//Parameter wurde schon erstellt
					foreach($arrayParameter as $array){
						//Multidimensionales Array!!!
						if(in_array($tempParam['name'], $array)){
							$tempParam['value'] = $array['value'];		//Überschreibe Value von tempParam
							break;										//Schleifenabbruch, Variable wurde gefunden => kann keine andere mehr sein!
						}
					}
				} else {
					//Parameter wurde noch nicht erstellt.
					//paramXX={...};
					$zuweisungsAnfang = $tempPos + PARAMETERLAENGE + strlen(ZUWEISUNG_OPEN);
					$zuweisungsEnde = strpos($operation, ZUWEISUNG_CLOSE, $zuweisungsAnfang);
					$zuweisungsBefehl = substr($operation, $zuweisungsAnfang, $zuweisungsEnde - $zuweisungsAnfang);
					
					//Passe Operations an
					$operation = $tempParam['name'] . substr($operation, $zuweisungsEnde + strlen(ZUWEISUNG_CLOSE), strlen($operation) - ($zuweisungsEnde + strlen(ZUWEISUNG_CLOSE)));
					
					//Erstelle Value für Parameter nach Eigenschaften (noch nicht implemenetiert)
					//Berechne
					eval('$tempParam[\'value\'] = ' . $zuweisungsBefehl .';');
					//echo "Berechne:" . $tempParam['name'] . "=" . $zuweisungsBefehl . " = " . $tempParam['value'] . "<br>";
					//echo "<br>Die Berechnung:". $tempParam['name'] . "=" . $zuweisungsBefehl . " wurde durch " . $tempParam['name'] . " ersetzt.<br>";
					//echo "Neue Operation:" . $operation . "<br>";
					
					//Trage Parameter in die Parameter-Liste ein
					$arrayParameter[] = array( 	'name' => $tempParam['name'],
												'berechnung' => $zuweisungsBefehl,
												'value' => $tempParam['value']);
				}
				
				//Setze Suchposition weiter
				$pos = $tempPos + PARAMETERLAENGE;
				//echo "Position:" .  $tempPos . "-" . $pos . " ==> Name:" . $tempParam['name'] . " ==> Value:" . $tempParam['value'] . "<br>";
				$tempPos = strpos($operation, PARAMETER, $pos);
			}
			
			$ergebnis = 0;				
			//Füge Parameter in Platzhalterliste hinzu
			foreach($arrayParameter as $param){
				$platzhalterNames[] = $param['name'];
				$platzhalterValues[] = $param['value'];
			}

			//Ersetze Platzhalter und rechne Ergebnis aus
			$operation = str_replace($platzhalterNames, $platzhalterValues , $operation);
			eval('$ergebnis = ' . $operation . ";");
			
			//Setze für die Operation das Ergebnis fest
			$arrayOperationen[$key]['value'] = $ergebnis;
			
			//Test-Ausgabe
			//echo "<u><br>ENDE:Zugewiesenes Ergebnis: " . $arrayOperationen[$key]['op'] . " = " . $ergebnis . "</u><br><br>";
		}
	
		//Parameter ausgeben
		/*
		echo "<b>" . count($arrayParameter) ." PARAMETER GEFUNDEN</b><br>";
		foreach($arrayParameter as $value){
			echo $value['name'] . " => " . $value['value'] . "<br>";
		}
		echo "<br>";
		
		//Operationen ausgeben
		echo "<b>" . count($arrayOperationen) ." OPERATIONEN GEFUNDEN</b><br>";
		foreach($arrayOperationen as $value){
			echo $value['op'] . " => " . $value['value'] . "<br>";
			
			//Platzhalter ersetzen mit Ergebnissen der Operationen
			$newText = preg_replace('/'.PLATZHALTER.'/', $value['value'], $newText, 1);
		}
		echo "<br>";
		
		echo $newText;
		*/
		
		$arrayFrage = array( "fragetext" => $newText);
		
		//////////////////////////////////////////////////LÖSUNGSWEG//////////////////////////////////////////////////////////
		
		//echo "<br><br><br><b>LÖSUNGSWEG</b><br>";
		
		//Platzhalter ersetzen einsetzen
		$platzhalterNames = array();
		$platzhalterValues = array();
		//Füge Parameter in Platzhalterliste hinzu
		foreach($arrayParameter as $param){
			$platzhalterNames[] = $param['name'];
			$platzhalterValues[] = $param['value'];
		}
		//Füge Operator-Funktionen in Platzhalterliste hinzu
		foreach(OPERATOREN as $operator){
			$platzhalterNames[] = $operator['name'];
			$platzhalterValues[] = $operator['funktion'];
		}
		
		//echo "Lösungsschema: " . $loesung . "<br>" . strpos($loesung, OPERATION_OPEN, 0);
		
		$newText = "";
		$arrayLoesungsWege = array();
		$pos = 0;
		//Suche alle Operationen
		while(($tempPos = strpos($loesung, OPERATION_OPEN, $pos)) > -1){			//Position vor [opr]
			//Alten Text übernehmen
			$newText .= substr($loesung, $pos, $tempPos - $pos) . " " . PLATZHALTER . " ";	//Neuen Loesungs-Text erstellen und Platzhalter (###) erstellen
			
			//Position der Operation herausfinden
			$tempPos += strlen(OPERATION_OPEN); 							//Position nach [opr]
			$tempPosEnde = strpos($loesung, OPERATION_CLOSE, $tempPos);		//Position vor [\opr]
			$pos = $tempPosEnde + strlen(OPERATION_CLOSE);					//Position nach [\opr]
			
			$arrayLoesungsWege[] = array('op' => substr($loesung, $tempPos, $tempPosEnde - $tempPos),
										'value' => 0);	//Jeder Operation wird erst mit 0 initialisiert
			
			//echo $tempPos . " // " . $tempPosEnde . " // " . $pos . " ==> " . substr($loesung, $tempPos, $tempPosEnde - $tempPos) .  '<br>';
		}
		
		$arrayFrage["loesung"] = array();
		foreach($arrayLoesungsWege as $key => $value){
			//Ersetze Platzhalter
			$ergebnis = str_replace($platzhalterNames, $platzhalterValues , $value['op']);
			//echo "<br><b>" . (1 + $key) .". Lösungsweg: " . $ergebnis . "</b><br>";
			//Lösung berechnen
			eval('$ergebnis = ' . $ergebnis . ';');
			//echo "Die Lösung ist: " . $ergebnis . "<br>";
			//echo "Die Lösung ist: " . round($ergebnis * 100, 2) . "%<br>";
			
			$arrayFrage["loesung"][$key] = $ergebnis;
		}
		
		return $arrayFrage;
	}
?>