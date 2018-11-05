<?php
include("header.php");
?>


<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="basiswissen">
      <div class="container">
        <h1>Basiswissen</h1>
      </div>
    </div>



<div class="container" id="content">
	<div class="row">
  		<div class="col-md-5">
  		<h3 class="h_stichproben">Stichproben</h3>


<button style="width:150px;" type="button" id="po_button" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="top" data-content="<p><strong>Variation Ziehen mit Zurücklegen</strong><br/>Die Reihenfolge ist wichtig.<br/>Formel: <img src='bilder/variation3.jpg'></p>" data-original-title="" title="">Variation</br>ZmZ</button>
<button style="width:150px;" type="button" id="po_button2" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="top" data-content="<p><strong>Kombination Ziehen mit Zurücklegen</strong><br/>Die Reihenfolge ist unwichtig.<br/>Formel: <img src='bilder/kombi3.jpg'></p>" data-original-title="" title="">Kombination</br>ZmZ</button><br/>
<button style="width:150px;" type="button" id="po_button3" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<p><strong>Variation Ziehen ohne Zurücklegen</strong><br/>Die Reihenfolge ist wichtig.<br/>Formel: <img src='bilder/variation1.png'></p>" data-original-title="" title="">Variation</br>ZoZ</button>
<button style="width:150px;" type="button" id="po_button4" class="btn btn-default" data-html="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<p><strong>Kombination Ziehen ohne Zurücklegen</strong><br/>Die Reihenfolge ist unwichtig.<br/>Formel: <img src='bilder/kombi1.jpg'></p>" data-original-title="" title="">Kombination</br>ZoZ</button>
<br/><br/>
<div class="panel-group" id="accordion">
  		<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsevari">
          Variation
        </a>
      </h4>
    </div>
    <div id="collapsevari" class="panel-collapse collapse">
      <div class="panel-body">
       Bei der Variation werden k Elemente aus einer n-elementigen Menge gezogen. Die Reihenfolge in der Resultat-Liste ist dabei wichtig.<br/><br/>
       <strong>Erklärung</strong><br />
       <strong>n:</strong> Anzahl der Objekte in Urne<br />
       <strong>k:</strong> Anzahl der Ziehungen = Elemente in der Resultat-Liste<br />
       <br />
       Kann jedes Element nur einmal gezogen werden, handelt es sich um eine Variation ohne Wiederholung <strong>(Ziehen ohne Zurücklegen=ZoZ)</strong>.<br/>
       Formel: <img src="bilder/variation1.png"><br/>
       <strong>Beispiel:</strong><br/>
       An einem Pferderennen nehmen 10 Pferde teil. Wie viele Möglichkeiten gibt es für die ersten drei Plätze?<br/>
       Lösung: <img src="bilder/variation2.png"><br/><br/>
       <strong>Beispiel mit Urnenmodell:</strong><br/>
       Bei einem Contest nehmen 10 Teilnehmer teil. Wie viele Möglichkeiten gibt es, die Top 3 zusammenzustellen?<br/>
       <img src="bilder/urne_zoz_contest.png">
       <br/><br/>
       Kann jedes Element beliebig oft gezogen werden, handelt es sich um eine Variation mit Wiederholung <strong>(Ziehen mit Zurücklegen=ZmZ)</strong><br/>
       Formel: <img src="bilder/variation3.jpg"><br/>
       <strong>Beispiel:</strong><br/>
       Wie viele Möglichkeiten gibt es ein 5 stelliges Wort aus dem Alphabet zu  bilden?<br/>
       Lösung: <img src="bilder/variation4.jpg"><br/><br/>
       <strong>Beispiel mit Urnenmodell:</strong><br/>
       Ein Fahrradschloss besteht aus vier Ringen mit den Einstellmoeglichkeiten von 0 bis 9. Wie viele Moeglichkeiten gibt es einen Code einzustellen?<br/>
       <img src="bilder/urne_fahrradschloss.png">
       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsekomb">
          Kombination
        </a>
      </h4>
    </div>
    <div id="collapsekomb" class="panel-collapse collapse">
      <div class="panel-body">
       Bei der Kombination werden k Elemente aus einer n-elementigen Menge gezogen. Die Reihenfolge in der resultierenden Teilmenge spielt keine Rolle.
       <br/><br/>
       <strong>Erklärung</strong><br />
       <strong>n:</strong> Anzahl der Objekte in Urne<br />
       <strong>k:</strong> Anzahl der Ziehungen = Elemente in der resultierenden Teilmenge<br />
       <br />
       Kann jedes Element nur einmal gezogen werden, handelt es sich um eine Kombination ohne Wiederholung 
       <strong>(Ziehen ohne Zurücklegen = ZoZ)</strong>.<br/><br />
       Formel: <img src="bilder/kombi1.jpg"><br/><br />
       <strong>Beispiel:</strong><br/>
       Lotto Ziehung 6 aus 49: Wieviele M&ouml;glichkeiten gibt es?<br/>
       Lösung: <img src="bilder/kombi2.jpg"><br/>
       <img src="bilder/urne_zoz_kombinatorik.png">
       <br/><br/>
       Kann jedes Element beliebig oft gezogen werden, handelt es sich um eine Kombination mit Wiederholung<strong> (Ziehen mit Zurücklegen = ZmZ)</strong>.<br/>
       <br />
       Formel: <img src="bilder/kombi3.jpg"><br/>
       <br />
       <strong>Beispiel:</strong><br/>
       Aus einer Urne mit 6 Kugeln zieht man 3 mal eine Kugel und legt sie wieder zurück.<br/>
       Lösung: <img src="bilder/kombi4.jpg"><br/><br/>
       <strong>Beispiel mit Urnenmodell</strong><br/>
       Frage: Ein Obsthändler packt als Sonderangebot 10 Früchte vier verschiedener Sorten in Tüten. Wie viele verschiedene Fruchttüten kann es geben?<br/>
       <br />
       Lösung: <img src="bilder/kombination_zmz_obsttueten.png">
       <br /> <br />
       n-1 ist die Anzahl der Trennblätter, die man braucht, um in einer nach Objektklassen geordneten Menge AA|BBB|C|DDDDD die (hier: 4) Objektklassen zu trennen, daher kommt es zu dem „n-1“ in der Formel.
       <br /><br />
       <img src="bilder/urne_zmz_fruechte.png">
       </div>
    </div>
  </div>
    
  </div>

  		</div>
  		<div class="col-md-6">
			<h3 class="h_zusatzwissen">Zusatzwissen</h3>
			<div class="panel-group" id="accordionzwei">
			
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseOne">
					  Permutation
					</a>
				  </h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse">
				  <div class="panel-body">
				   Die Permutation ist eine Spezialform der Variation, bei der alle n Elemente ohne Zur&uumlcklegen gezogen werden (n=k, ZoZ).<br><br>
				   <strong>Beispiel:</strong><br/>
				   Bei einer Schnitzeljagd müssen 5 Stationen erreicht werden. Die	Menge der Elemente n ist also 5 und auch k ist 5, da alle Stationen erreicht werden müssen.</div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseTwo">
					  Laplacesche Wahrscheinlichkeit
					</a>
				  </h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
				  <div class="panel-body">
					Bei	der	Laplacesche	Wahrscheinlichkeit sind alle Möglichkeiten des Versuchsausgangs gleichwahrscheinlich.<br>
					<table><tr>
					<td style="padding-top:10px; padding-right:10px;">P(A) = </td><td><u>Anzahl der zu A gehörigen möglichen Versuchsausgänge</u></td><td style="padding-top:10px; padding-right:10px; padding-left:10px;"> = </td><td><u>günstige Fälle</u></td>
					</tr><tr>
					<td></td><td>Anzahl der überhaupt möglichen Versuchsausgänge</td><td></td><td>mögliche Fälle</td></tr>
				  </table>
				  <br>
				  <br>
				 <strong>Beispiel:</strong>
				 <p>Wie	hoch ist die Wahrscheinlichkeit	beim Würfelwurf	eine 4 zu würfeln?<br>
					P({4})	=	1/6<br><br>
					Wie	hoch	ist	die	Wahrscheinlichkeit	eine	3	oder	5	zu	würfeln?<br>
					P({3, 5}) = 2/6</p>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseThree">
					  Fakultät
					</a>
				  </h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
				  <div class="panel-body">
					<p>n! wird „n-Fakultät“ gelesen. <br/>
					Formel:n! = 1 ∙ 2 ∙…∙ n, n ∈ <img src="bilder/natuerlichezahl.png"><br/><br/>
					<strong>Beispiel:</strong><br/>
					5! = 1 ∙ 2 ∙ 3 ∙ 4 ∙ 5	
					<br/><br/>	
					<strong>Sonderregel:</strong><br/>
					0! = 1</p>
				  </div>
				</div>
			  </div>
				<div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseFour">
					  Binomialkoeffizient
					</a>
				  </h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse">
				  <div class="panel-body">
					Für n, k ∈ <img src="bilder/natuerlichezahl.png"> &cup; {0} mit k ≤ n definiert man:<br/>
					<img src="bilder/binomialko.jpg"><br/>
					(Die letzte Regel gilt nur f&uuml;r k > 0.)
					<br/>
					<strong>Beispiel:</strong><br>
					<img src="bilder/binomialko_1.jpg"><br/><br/>
					<strong>Ein paar Regeln</strong><br>
					<img src="bilder/binomialko_2.jpg">
				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseFive">
					  Summenregel
					</a>
				  </h4>
				</div>
				<div id="collapseFive" class="panel-collapse collapse">
				  <div class="panel-body">
				   <strong>Summenregel</strong><br/>
					Es gibt n Elemente mit Eigenschaft a und m Elemente mit Eigenschaft b. Die Eigenschaften a und b schließen sich gegenseitig aus. Dann gibt es n+m Möglichkeiten, ein Objekt mit der Eigenschaft a oder b auszuwählen.<br/><br/>
			<strong>Beispiel:</strong><br/>
			In einer	Mietwagenfirma	gibt	es	3	Kleinwagen	und	7	Mittelklassewagen.	Da	man	sich für eines der Objekte entscheiden muss, gibt es insgesamt 3+7 Möglichkeiten.	
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseSix">
					  Produktregel
					</a>
				  </h4>
				</div>
				<div id="collapseSix" class="panel-collapse collapse">
				  <div class="panel-body">
				   <strong>Produktregel</strong><br/>
					Kann man etwas in zwei Teilschritte unterteilen, und gibt es im 1. Teilschritt n und im 2. Teilschritt m Möglichkeiten, so gibt es insgesamt n*m Möglichkeiten.	
					<br /><br />
			<strong>Beispiel:</strong><br /> Es gibt 3 Routen von Gummersbach nach Köln und 4 Routen von Köln nach Aachen. Insgesamt gibt es 3*4 Möglichkeiten, von Gummersbach nach Aachen zu fahren.
				  </div>
				</div>
			  </div>
				<!--Inklusion Exklusion Prinzip-->
				<div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseSeven">
						 Inklusion Exklusion Prinzip
						</a>
					  </h4>
					</div>
					<div id="collapseSeven" class="panel-collapse collapse">
						<div class="panel-body">
							<p>F&uuml;r disjunkte Mengen gilt die Summenregel.</p>
							<p>
								F&uuml;r nicht disjunkte Mengen wird das Inklusions-Exklusions-Prinzip benutzt. 
								Dabei wird die Anzahl der Mengen summiert und die doppelten/(N vorkommenden) Elemente, einmal/(N -1 mal) entfernt.
							</p>
							<p>
							<p><u>Zwei Mengen</u><br> |A &cup; B| = |A| + |B| - |A &cap; B|</p>
							<p><u>Drei Mengen</u><br> |A &cup; B &cup; C| = |A| + |B| + |C| - |A &cap; B| - |A &cap; C| - |B &cap; C| + |A &cap; B &cap; C|</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php
include("footeroz.php");
?>