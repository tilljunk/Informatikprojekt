<?php session_start();

include("header.php");

$type = "Produktregel";
$category = "Produktregel";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
?>

	<script>
		const type= "Produktregel";
		const cat = "Produktregel";
	</script>

	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
	<div class="jumbotron" id="lernmodusfrage">
		<div class="container">
			<div id="inner">
				<h2>Learning mode > Product rule</h2>
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
					<?php include("eingabehilfe.php"); ?>
					<div class="form">
						<?php include("loesung_eingabefeld.php"); ?>
					</div>
					<div class="answer_box" id="ab"></div>
					<h4 style="margin-top: 70px;">Question <span id="qnr">1</span> / <span id="max"><?php echo $max; ?></span></h4>
					<div class="next">
						<?php output_next_button($max); ?>
					</div>

				</div>
				<div class="col-md-6">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseProduktregel">
										Product rule
									</a>
								</h4>
							</div>
							<div id="collapseProduktregel" class="panel-collapse collapse">
								<div class="panel-body">
									<strong>Product rule</strong><br/>
									If a problem can be divided into 2 subproblems which are executed one after another, and if there are n possibilities for the 1st subproblem and m possibilities for the 2nd subproblem, then there are n*m possibilities in total.
									<br /><br />
									<strong>Example:</strong><br /> There are 3 routes from Gummersbach to Cologne and 4 routes from Cologne to Aachen. Then there are in total 3*4 = 12 possible routes from Gummersbach to Aachen.
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