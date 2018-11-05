<?php
	include("connect.inc.php");
	include("dynamicfunctions.php");

	//DB Abfrage
	$sql = "SELECT * FROM `binominialFragen`";
	$result = mysqli_query($mysql, $sql) or die (mysqli_error($mysql));
	
	//session_start();
	//$error = array();
?>

<!--Website-->
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Test Binominial</title>
	</head>

	<body>
		<?php
			$text = '';
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
				$newText .= substr($text, $pos, $tempPos - $pos) . " " . PLATZHALTER . " ";	//Neuen Text erstellen und Platzhalter (###) erstellen
				
				//Position der Operation herausfinden
				$tempPos += strlen(OPERATION_OPEN); 							//Position nach [opr]
				$tempPosEnde = strpos($text, OPERATION_CLOSE, $tempPos);		//Position vor [\opr]
				$pos = $tempPosEnde + strlen(OPERATION_CLOSE);				//Position nach [\opr]
				
				$arrayOperationen[] = array('op' => substr($text, $tempPos, $tempPosEnde - $tempPos),
											'value' => 0);	//Jeder Operation wird erst mit 0 initialisiert
				
				echo $tempPos . " // " . $tempPosEnde . " // " . $pos . " ==> " . substr($text, $tempPos, $tempPosEnde - $tempPos) .  '<br>';
			}
			//Ende anhängen
			$newText .= substr($text, $pos, strlen($text) - $pos);
			echo "<br><b>Platzhaltertext:</b><br>" . $newText . "<br><br>";
			
			$arrayParameter = array();
			//Parameter suchen und Platzhalter ersetzen + Zuweisung
			foreach($arrayOperationen as $key => $value){
				$operation = $value['op'];
				
				echo "<b>" . (1 + $key) . ".Operation: " . $operation . "</b><br>";
				
				$pos = 0;
				$tempPos = strpos($operation, PARAMETER, $pos);
				//Suche zuerst nach Parameter und initialisiere diese wenn nötig
				echo "Suche nach Parameter...<br>";
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
						echo "Position:" .  $tempPos . "-" . $pos . " ==> Name:" . $tempParam['name'] . " ==> Value:" . $tempParam['value'] . "<br>";
						$tempPos = strpos($operation, PARAMETER, $pos);
					} else {
						//Setze Suchposition weiter
						$pos = $tempPos + PARAMETERLAENGE + strlen(ZUWEISUNG_OPEN);
						echo "Position:" .  $tempPos . "-" . $pos . " ist ein Zuweisungsparameter!<br>";
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
				echo "<br>Operation ohne Platzhalter:" . $operation . "<br><br>";
				
				//Berechne die Zuweisungsparameter (sofern welche existieren) "paramXX=...;"
				$pos = 0;
				$tempPos = strpos($operation, PARAMETER, $pos);
				echo "Suche nach Zuweisungsparameter...<br>";
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
						echo "Berechne:" . $tempParam['name'] . "=" . $zuweisungsBefehl . " = " . $tempParam['value'] . "<br>";
						echo "<br>Die Berechnung:". $tempParam['name'] . "=" . $zuweisungsBefehl . " wurde durch " . $tempParam['name'] . " ersetzt.<br>";
						echo "Neue Operation:" . $operation . "<br>";
						
						//Trage Parameter in die Parameter-Liste ein
						$arrayParameter[] = array( 	'name' => $tempParam['name'],
													'berechnung' => $zuweisungsBefehl,
													'value' => $tempParam['value']);
					}
					
					//Setze Suchposition weiter
					$pos = $tempPos + PARAMETERLAENGE;
					echo "Position:" .  $tempPos . "-" . $pos . " ==> Name:" . $tempParam['name'] . " ==> Value:" . $tempParam['value'] . "<br>";
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
				echo "<u><br>ENDE:Zugewiesenes Ergebnis: " . $arrayOperationen[$key]['op'] . " = " . $ergebnis . "</u><br><br>";
			}
		
			//Parameter ausgeben
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
			
			//////////////////////////////////////////////////LÖSUNGSWEG//////////////////////////////////////////////////////////
			
			echo "<br><br><br><b>LÖSUNGSWEG</b><br>";
			
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
			
			echo "Lösungsschema: " . $loesung . "<br>" . strpos($loesung, OPERATION_OPEN, 0);
			
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
				
				echo $tempPos . " // " . $tempPosEnde . " // " . $pos . " ==> " . substr($loesung, $tempPos, $tempPosEnde - $tempPos) .  '<br>';
			}
			
			foreach($arrayLoesungsWege as $key => $value){
				//Ersetze Platzhalter
				$ergebnis = str_replace($platzhalterNames, $platzhalterValues , $value['op']);
				echo "<br><b>" . (1 + $key) .". Lösungsweg: " . $ergebnis . "</b><br>";
				//Lösung berechnen
				eval('$ergebnis = ' . $ergebnis . ';');
				echo "Die Lösung ist: " . $ergebnis . "<br>";
				echo "Die Lösung ist: " . round($ergebnis * 100, 2) . "%<br>";
			}
			
		?>
	</body>

</html>
