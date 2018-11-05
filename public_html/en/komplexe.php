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
        <h2>Learning mode > Complex problems</h2>
			<p>Question: <span id="q"><?php get_question($q_min_max[0]); ?></span></p>
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
		<h4 style="margin-top: 70px;">Question <span id="qnr">1</span> / <span id="max"><?php echo $max; ?></span></h4>
		<div class="next">
		<?php output_next_button($max); ?>
		</div>
	
  		</div>
            <div class="col-md-6">
          <div class="alert alert-info" role="alert">In this problem we expect a decimal number (= percentage value) for the solution. Please enter it as decimal number with 5 digits after the decimal point. <br />
For example 12.345% is coded as 0.12345. Or enter it as a fraction.</div>
    
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Important note on this question
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body bg_info">
                                  <p> Since this question belongs to the "complex problems" category, with the help of professor Konen we have prepared a handwritten explanation and solution outline.
                                      You can download this handwritten solution in PDF format if you click on the Solve button without entering any solution (or after entering a wrong solution).</p><br />
                                </div>
                            </div>
                        </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordionzwei" href="#collapseDownloads">
                          Additional material
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