<?php session_start();

include("header.php");

$type = "Komplexe";
$category = "Komplexe";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
?>

<script>
	const type= "Komplexe";
	const cat = "Komplexe";
</script>
    
      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Lernmodus > Komplexere Aufgaben</h2>
			<p>Frage: <span id="q"><?php get_question($q_min_max[0]); ?></span></p>
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
<!--<button>n<sup>k</sup></button> -->
			<?php include("loesung_eingabefeld.php"); ?>
		</div>
		<div class="answer_box" id="ab"></div>
		<h4 style="margin-top: 70px;">Frage <span id="qnr">1</span> / <span id="max"><?php echo $max; ?></span></h4>
		<div class="next">
		<?php output_next_button($max); ?>
		</div>
	
  		</div>
            <div class="col-md-6">
          <div class="alert alert-info" role="alert">Bei dieser Aufgabe wird nach einer Prozentzahl = Dezimalzahl als Ergebnis gesucht. Bitte gib das Ergebnis als Dezimalzahl mit einem Punkt als Komma und 5  Nachkommastellen ein. <br />
            Beispiel: 12.345% wird als 0.12345 eingegeben. - Oder gib es als Bruch ein.</div>
    
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Wichtiger Hinweis zur Aufgabe
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body bg_info">
                                  <p>Da diese Aufgabe zu der Kategorie "Komplexere Aufgaben" gehört, haben wir für euch gemeinsam mit Herrn Konen eine handschriftliche Erläuterung mit Lösungsskizze vorbereitet. Diese handschriftliche Erläuterung findest du, wenn du ein falsches oder gar kein Ergebnis eingibst und auf "Lösen" klickst.</p><br />
                                </div>
                            </div>
                        </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseDownloads">
                          Zusatzmaterial
                        </a>
                      </h4>
                    </div>
                    <div id="collapseDownloads" class="panel-collapse collapse">
                      <div class="panel-body">

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