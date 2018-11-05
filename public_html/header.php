<?php
//error_reporting('E_NOTICE');
include_once "connect.inc.php";
include_once "init_functions.php";

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");

?>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Kombinatorik Lernprogramm</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="css/flag-icon-css-master/css/flag-icon.min.css" />
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="js/content_jquery.js"></script>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64313655-1', 'auto');
  ga('send', 'pageview');

</script>

    <script type=text/javascript">
	$('document').ready(function(){
		$('#myPopOver').popover();
		$('#myPopOver').on('click', function (e) {
    $('.#myPopOver').not(this).popover('hide');
});
	});
	</script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
		$(document).ready(function(){
			$(".popover-examples a").popover({
				placement: 'top'
			});
            
				
			
			var clicks = 0;
			var tips = 1;
			$("#tip").popover();
			$("#tip").click(function() {
				if(clicks++ % 2 == 1) return;
				var count = parseInt($("#ttc").html());
				if(count == 0) return;
				if(count == 1) $(this).attr('data-content', $("#tt-text-no").html());
				if(count >= 2){

					$(this).attr('data-content', $("#tt"+tips).html());
					tips++;
				}
				$("#ttc").html(count-1);
			});

			$("#next").click(function(e) {
				tips = 1;
			});

		});
	</script>

<?php if(isset($_POST['loesen'])){?>
$(document).ready(function() {
   $(function() 
	{
	$('#form').css("visibility", "hidden");
	});
	});

<?php }

?>

</head>
<body>

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
				<?php
				if($_SERVER['PHP_SELF'] == "/basiswissen.php")
					echo '<li class="active"><a href="basiswissen.php">Basiswissen</a></li>';
					else echo '<li><a href="basiswissen.php">Basiswissen</a></li>';
				if($_SERVER['PHP_SELF'] == "/lernmodus.php")
					echo '<li class="active"><a href="lernmodus.php">Lernmodus</a></li>';
					else echo '<li><a href="lernmodus.php">Lernmodus</a></li>';
				if($_SERVER['PHP_SELF'] == "/pruefungsmodus.php")
					echo '<li class="active"><a href="pruefungsmodus.php">Pr&uuml;fungsmodus</a></li>';
					else echo '<li><a href="pruefungsmodus.php">Pr&uuml;fungsmodus</a></li>';
?>
				<li style="float: right;">
					<a href="<?php echo "/en".$_SERVER['PHP_SELF']; ?>">
						<span class="flag-icon flag-icon-us"></span>
						English
					</a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>