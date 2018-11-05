<?php session_start();
include("header.php");

$type = "ZoZ";
$category = "Variation";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);

?>

<script>
	const type= "ZoZ";
	const cat = "Variation";
</script>

      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Learning mode > Variation w/o-rep</h2>
			<p>Question: <span id="q"><?php get_question($q_min_max[0]); ?></span></p>
		</div>
        <ul class="nav nav-pills">
			<li class="active"><a href="#" id="tip" data-toggle="popover" data-placement="top" data-content="<?php echo $tt[0]; ?>" data-original-title="" title="">Tip <span class="badge" id="ttc"><?php echo count($tt); ?></span></a></li>
		</ul>
      </div>
    </div>


<div class="container">
		<div id="container_move">
		<div class="row">
  		<div class="col-md-5">
          <?php
include_once("eingabehilfe.php");
?>
  		<div class="form">
<?php include_once("loesung_eingabefeld.php"); ?>
		</div>
		<div class="answer_box" id="ab"></div>
		<h4 style="margin-top: 70px;">Question <span id="qnr">1</span> / <span id="max"><?php echo $max; ?></span></h4>
		<div class="next">
		<?php output_next_button($max); ?>
		</div>
	
  		</div>
            <div class="col-md-6">
              <p>What is n, what is k? Look into <a href="basiswissen.php">Basic knowledge</a>.</p>
              <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Formulary
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img src="bilder/formelsammlung.jpg">      </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Variation w/o-rep
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <p>This question refers to a problem of kind 'variation, w/o-rep (without repetition)'</p><br />
                                    <img src="../bilder/urne_zoz_contest.png" alt="">     </div>
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