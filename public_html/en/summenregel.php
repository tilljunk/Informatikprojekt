<?php session_start();

include("header.php");

$type = "Summenregel";
$category = "Summenregel";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
?>

<script>
	const type= "Summenregel";
	const cat = "Summenregel";
</script>

      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Learning mode > Sum rule</h2>
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
         include("eingabehilfe.php");
         ?>
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
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseFive">
          Sum rule
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
       <strong>Sum rule</strong><br/>
There are n elements with property a and m elements with property b. The a and b properties cannot be taken or occur at the same time. Therefore, there are n+m possibilities to select one object with property a or b. 
<br/>
<strong>Example:</strong><br/>
In a car rental company there are 3 small cars and 7 middle-sized cars. When you need to choose one of the cars, you have in total 3+7 possibilities to choose.
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