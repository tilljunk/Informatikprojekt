<?php
session_start();
include("header.php");
?>
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="basiswissen">
      <div class="container">

		  <script>
			  var oldURL = document.referrer;
			  var pageName = oldURL.lastIndexOf('/');
			  oldURL = oldURL.substr(pageName+1);
			  if(oldURL == "pruefungsmodus.php")
				  document.write("<h1>Prüfungsmodus</h1>");
			  else document.write("<h1>Lernmodus</h1>");

		  </script>
      </div>
    </div>
	<?php
		if( isset($_GET['finished']) ) {
		if(isset($_POST['answers'])) {
            $floor = floor((($_POST['answers'] / $_POST['max']) * 100));
			if($floor == 0) echo '<div style="font-size: 15px" class="alert alert-danger"><center>Du hast keine Frage richtig beantwortet. :(</center></div>';
			else if($floor == 100) echo '<div style="font-size: 15px" class="alert alert-success"><center>Du hast alle Fragen richtig beantwortet! Bravo! Dieser Stoff sitzt bei dir.</center></div>';
			else if($floor >= 10 && $floor < 20) echo '<div style="font-size: 15px" class="alert alert-danger"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Da kannst du noch was verbessern!</center></div>';
            else if($floor >= 20 && $floor < 30) echo '<div style="font-size: 15px" class="alert alert-warning"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Manches (aber noch nicht alles klappt).</center></div>';
            else if($floor >= 30 && $floor < 40) echo '<div style="font-size: 15px" class="alert alert-warning"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Du kannst noch weiter üben!</center></div>';
            else if($floor >= 40 && $floor < 50) echo '<div style="font-size: 15px" class="alert alert-warning"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Fast geschafft... aber für die 4,0 reicht es noch nicht.</center></div>';
            else if($floor >= 50 && $floor < 60) echo '<div style="font-size: 15px" class="alert alert-info"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. 50% der Fragen hast du richtig beantwortet! Wenn du weiter übst, sitzt der Stoff bald bei dir :)</center></div>';
            else if($floor >= 60 && $floor < 70) echo '<div style="font-size: 15px" class="alert alert-info"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Mehr als 50% korrekt, gut so! Übe weiter!</center></div>';
            else if($floor >= 70 && $floor < 80) echo '<div style="font-size: 15px" class="alert alert-info"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Du bist ganz nah am Ziel.</center></div>';
            else if($floor >= 80 && $floor < 90) echo '<div style="font-size: 15px" class="alert alert-info"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Gute Leistung! Mit noch etwas Übung sitzt der Stoff bei dir.</center></div>';
            else if($floor >= 90 && $floor > 100) echo '<div style="font-size: 15px" class="alert alert-info"><center>Du hast '.$_POST['answers'].' von '.$_POST['max'].' Fragen richtig beantwortet. Fast alles richtig. Weiter so!</center></div>';

		}
		}
	?>
<div class="container" id="content">
<div class="row">
  		<div class="col-md-5" style="margin-left:40px;">
  		<h3>Wähle eine Rubrik aus:</h3>
		<div>
		<a href="variation_zmz.php"><button type="button" class="btn btn-primary btn-lernmodus">Variation ZmZ</button></a>
		<a href="kombination_zmz.php"><button type="button" class="btn btn-primary btn-lernmodus">Kombination ZmZ</button></a>
		<a href="variation_zoz.php"><button type="button" class="btn btn-primary btn-lernmodus">Variation ZoZ</button></a>
		<a href="kombination_zoz.php"><button type="button" class="btn btn-primary btn-lernmodus">Kombination ZoZ</button></a><br>
		<a href="komplexe.php"><button type="button" class="btn btn-primary btn-lernmodus">Komplexere Aufgaben</button></a>
		<a href="binomialverteilung.php"><button type="button" class="btn btn-primary btn-lernmodus">Binomialverteilung</button></a>
		<a href="hypergeometrischeverteilung.php"><button type="button" class="btn btn-primary btn-lernmodus">Hypergeometrische Verteilung</button></a>
		<a href="vari_kombi_gemischt.php"><button type="button" class="btn btn-info btn-lernmodus">Gemischt</button></a>
		
  		</div>
  		</div>
  		<div class="col-md-5" style="margin-left:40px;">
  		<h3 class="h_lernmodus">Sonderkategorien</h3>
		<div>
		<a href="laplace.php"><button type="button" class="btn btn-primary btn-lernmodus">Laplace</button></a>
		<a href="permutation.php"><button type="button" class="btn btn-primary btn-lernmodus">Permutation</button></a>
		<a href="summenregel.php"><button type="button" class="btn btn-primary btn-lernmodus">Summenregel</button></a>
		<a href="produktregel.php"><button type="button" class="btn btn-primary btn-lernmodus">Produktregel</button></a>
		<a href="inklusionExklusion.php"><button type="button" class="btn btn-primary btn-lernmodus">Inklusion Exklusion Prinzip</button></a>
		<a href="sonder_gemischt.php"><button type="button" class="btn btn-info btn-lernmodus">Gemischt</button></a> 
  		</div>
	</div>
	
</div>

	
	
	</div>
	
<?php
include("footeroz.php");
?>