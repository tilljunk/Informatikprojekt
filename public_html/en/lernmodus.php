<?php
session_start();
include("header.php");
?>
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="basiswissen">
      <div class="container">
        <h1>Learning mode</h1>
      </div>
    </div>
	<?php
		if(isset($_GET['finished'])) {
		if(isset($_POST['answers'])) {
            $floor = floor((($_POST['answers'] / $_POST['max']) * 100));
			if($floor == 0) echo '<div style="font-size: 15px" class="alert alert-danger"><center>You did not answer any question correctly. :(( </center></div>';
			else if($floor == 100) echo '<div style="font-size: 15px" class="alert alert-success"><center>You answered all questions correctly! Bravo! You are the wizard of combinatorics! :-)</center></div>';
			else if($floor >= 10 && $floor < 20) echo '<div style="font-size: 15px" class="alert alert-danger"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. You can improve on this!</center></div>';
            else if($floor >= 20 && $floor < 30) echo '<div style="font-size: 15px" class="alert alert-warning"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. Something (but not everything!) works out.</center></div>';
            else if($floor >= 30 && $floor < 40) echo '<div style="font-size: 15px" class="alert alert-warning"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' Fragen richtig beantwortet. You may continue to practice!</center></div>';
            else if($floor >= 40 && $floor < 50) echo '<div style="font-size: 15px" class="alert alert-warning"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. Nearly done... but it will not yet last to pass the exam.</center></div>';
            else if($floor >= 50 && $floor < 60) echo '<div style="font-size: 15px" class="alert alert-info"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. 50% correctly done! If you continue to practice, you will reach the goal :)</center></div>';
            else if($floor >= 60 && $floor < 70) echo '<div style="font-size: 15px" class="alert alert-info"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. More than 50% correct, well done! Continue to practice!</center></div>';
            else if($floor >= 70 && $floor < 80) echo '<div style="font-size: 15px" class="alert alert-info"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. Well done! With a little more practice you will succeed.</center></div>';
            else if($floor >= 80 && $floor < 90) echo '<div style="font-size: 15px" class="alert alert-info"><center>You answered '.$_POST['answers'].' of '.$_POST['max'].' questions correctly. You nearly hit the target!</center></div>';
            else if($floor >= 90 && $floor > 100) echo '<div style="font-size: 15px" class="alert alert-info"><center>You answered '.$_POST['answers'].' von '.$_POST['max'].' questions correctly. Nearly everything perfect. Keep it up!</center></div>';

		}
		}
	?>
<div class="container" id="content">
<div class="row">
  		<div class="col-md-5" style="margin-left:40px;">
  		<h3>Choose a category:</h3>
		<div>
		<a href="variation_zmz.php"><button type="button" class="btn btn-primary btn-lernmodus">Variation<br />w-rep</button></a>
		<a href="kombination_zmz.php"><button type="button" class="btn btn-primary btn-lernmodus">Combination<br />w-rep</button></a>
		<a href="variation_zoz.php"><button type="button" class="btn btn-primary btn-lernmodus">Variation<br />w/o-rep</button></a>
		<a href="kombination_zoz.php"><button type="button" class="btn btn-primary btn-lernmodus">Combination<br />w/o-rep</button></a><br>
		<a href="komplexe.php"><button type="button" class="btn btn-primary btn-lernmodus">More complex<br />problems</button></a>
    <a href="vari_kombi_gemischt.php"><button type="button" class="btn btn-info btn-lernmodus">Mixed</button></a>
		
  		</div>
  		</div>
  		<div class="col-md-5" style="margin-left:40px;">
  		<h3 class="h_lernmodus">Special categories:</h3>
		<div>
		<a href="laplace.php"><button type="button" class="btn btn-primary btn-lernmodus">Laplace</button></a>
		<a href="permutation.php"><button type="button" class="btn btn-primary btn-lernmodus">Permutation</button></a>
		<a href="summenregel.php"><button type="button" class="btn btn-primary btn-lernmodus">Sum rule</button></a>
		<a href="produktregel.php"><button type="button" class="btn btn-primary btn-lernmodus">Product rule</button></a><br>
		<a href="sonder_gemischt.php"><button type="button" class="btn btn-info btn-lernmodusmix">Mixed</button></a> 
  		</div>
	</div>
	
</div>

	
	
	</div>
	
<?php
include("footeroz.php");
?>