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
                <a class="navbar-brand" href="index.php"><strong>Kombinatorik</strong> <span style="color:#ffffff !important;">Lernprogramm</span></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="<?php echo "/en".$_SERVER['PHP_SELF']; ?>">
                            <span class="flag-icon flag-icon-us"></span>
                            English
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="home">
      <div class="container">
        <h1>Willkommen!</h1>
        <p>Dieses Kombinatorik Lernprogramm soll Studenten beim Lernen für Prüfungen helfen und/oder das Verständnis des Themas festigen. Wir hoffen, dass es dir eine Hilfe ist.</p>
        
      </div>
    </div>

    
    
<div id="contenth" class="container">	
	<div class="row">
  		<div class="col-md-5">
  		<p><img src="bilder/bingo.jpg"</p>
  		</div>
  		<div class="col-md-6">
  		<p>Bitte wähle deinen Modus aus:</p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="basiswissen.php">Basiswissen</a></p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="lernmodus.php">Lernmodus</a></p>
  		<p><a class="btn btn-primary btn-lg" style="width:300px;" role="button" href="pruefungsmodus.php">Prüfungsmodus</a></p>
  		</div>
	</div>
</div>

<?php
include("footerh.php");
?>