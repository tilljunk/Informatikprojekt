<?php session_start();
include("header.php");

$type = "Hypergeo";
$category = "Hypergeo";

$fragenindex = 0;
$fragen = holeFragen($category);
$max = count($fragen);
$tt = array("Noch keine Tooltips vorhanden!");

//echo $fragen[0]['fragetext'] . " ==> " . $fragen[0]['loesung'][0];

/*
$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
*/
?>

<script>
	const type= "Hypergeo";
	const cat = "Hypergeo";
	
	//Übergabe aler Fragen
	const dynamischeFragen = JSON.parse('<?php echo json_encode($fragen);?>');
</script>
    
      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $fragenindex ?></div>
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Lernmodus > Hypergeometrische Verteilung</h2>
			<p>Frage: <span id="q"><?php echo $fragen[$fragenindex]['fragetext']; ?></span></p>
		</div>
        <ul class="nav nav-pills">
            <li class="active"><a href="#" id="tip" data-toggle="popover" data-placement="top" data-content="<?php echo $tt[0]; ?>" data-original-title="" title="">Tip <span class="badge" id="ttc"><?php echo count($tt); ?></span></a></li>		</ul>
      </div>
    </div>


<div class="container">
	<div id="container_move">
		<div class="row">
			<div class="col-md-5">
				<?php include("eingabehilfe.php"); ?>
				<div class="form">
					<?php include("loesung_eingabefeld.php"); ?>
				</div>
				<div class="answer_box" id="ab"></div>
				<h4 style="margin-top: 70px;">Frage <span id="qnr">1</span> / <span id="max"><?php echo $max; ?></span></h4>
				<div class="next">
					<?php output_next_button($max); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-group" id="accordion">
					 <div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseTwo">
							 Hypergeometrische Verteilung
							</a>
						  </h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
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
	
</div>


<?php
include("footermz.php");
?>