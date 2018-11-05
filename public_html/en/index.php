<?php
include("header.php");
?>


<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Navigation ein-/ausblenden</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><strong>Combinatorics</strong> <span style="color:#ffffff !important;">e-learning</span></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="<?php echo "../".basename($_SERVER['PHP_SELF']); ?>">
                            <span class="flag-icon flag-icon-de"></span>
                            Deutsch
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="home">
      <div class="container">
        <h1>Welcome!</h1>
        <p>This combinatorics e-learning framework shall help students in preparing their math exam and shall deepen your knowledge of combinatorics. We hope that it is helpful for you!</p>
        
      </div>
    </div>

    
    
<div id="contenth" class="container">	
	<div class="row">
  		<div class="col-md-5">
  		<p><img src="../bilder/bingo.jpg"</p>
  		</div>
  		<div class="col-md-6">
  		<p>Please choose your mode:</p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="basiswissen.php">Basic knowledge</a></p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="lernmodus.php">Learning mode</a></p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="pruefungsmodus.php">Exam mode</a></p>
  		</div>
	</div>
</div>

<?php
include("footerh.php");
?>