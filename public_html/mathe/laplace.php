<?php session_start();
include("header.php");

$type = "Laplace";
$category = "Laplace";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);
?>

<script>
	const type= "Laplace";
	const cat = "Laplace";
</script>

<div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navigation ein-/ausblenden</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><strong>Kombinatorik</strong> <span style="color:#ffffff !important;">Lernprogramm</span></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="basiswissen.php">Basiswissen</a></li>
            <li class="active"><a href="lernmodus.php">Lernmodus</a></li>
            <li><a href="pruefungsmodus.php">Pr&uuml;fungsmodus</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
      <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="lernmodusfrage">
      <div class="container">
		<div id="inner">
        <h2>Lernmodus > Laplace</h2>
			<p>Frage: <span id="q"><?php get_question($q_min_max[0]); ?></span></p>
		</div>
        <ul class="nav nav-pills">
			<li class="active"><a href="#" id="tip" data-toggle="popover" data-placement="top" data-content="<?php echo $tt[0]; ?>" data-original-title="" title="">Tip <span class="badge" id="ttc"><?php echo $tt[2]; ?></span></a></li>
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
                         Laplacesche Wahrscheinlichkeit
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                          Bei der Laplacesche Wahrscheinlichkeit sind alle Möglichkeiten des Versuchsausgangs gleichwahrscheinlich.<br>
                           <table><tr>
                           <td style="padding-top:10px; padding-right:10px;">P(A) = </td><td><u>Anzahl der zu A gehörigen möglichen Versuchsausgänge</u></td><td style="padding-top:10px; padding-right:10px; padding-left:10px;"> = </td><td><u>günstige Fälle</u></td>
                           </tr><tr>
                           <td></td><td>Anzahl der überhaupt möglichen Versuchsausgänge</td><td></td><td>mögliche Fälle</td></tr>
                           </table>
                            <br>
                             <br>
                            <strong>Beispiel:</strong>
                           <p>Wie hoch ist die Wahrscheinlichkeit beim Würfelwurf eine 4 zu würfeln?<br>
                           P({4})  = 1/6<br><br>
                           Wie hoch  ist die Wahrscheinlichkeit  eine  3 oder  5 zu  würfeln?<br>
                           P({3, 5}) = 2/6</p>
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