<?php session_start();

include("header.php");

$type = "ZoZ";
$category = "Kombination";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
?>

<script>
	const type= "ZoZ";
	const cat = "Kombination";
</script>

      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Lernmodus > Kombination ZoZ</h2>
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
              <div class="panel-group" id="accordion">
                        <?php include("includes/collapse_nk.php"); ?>
                        <?php include("includes/collapse_formelsammlung.php"); ?>
                         <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Kombination ZoZ
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <p>Bei dieser Frage handelt es sich um eine Aufgabe der Art Variation ZoZ (Ziehen ohne Zurücklegen)</p><br />
                                    <img src="bilder/urne_zoz_kombinatorik.png" alt="">     </div>
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