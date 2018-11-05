<div id="footer">
      <div class="container">
          <div class="logo"><img src="bilder/TH_Koeln_Logo.svg"><span class="impressum"><a href="impressum.php">Impressum</a></span></div>
        <div style="float:right; margin-top:10px;"><a href="javascript:history.back(1);" class="iconsfooter"><span style="padding-right:25px;"><i class="glyphicon glyphicon-arrow-left" style="font-size:30px !important; color:#ffffff !important;"></i></span></a><a href="index.php"><i class="glyphicon glyphicon-home" style="font-size:30px !important; color:#ffffff !important;"></i></a></div>
      </div>
    </div>

<?php
if($tt) {

    echo '<div id="tt-text-no" style="display:none;">Keine Tips mehr vorhanden.</div>';
    echo '<div id="tt-text-next" style="display:none;">';
    for($i = 1; $i < count($tt); $i++){
        echo "<span id='tt$i'>$tt[$i]</span>";
    }
    echo "</div>";
}
?>
</html>

<script>

<?php 

if(isset($_POST['loesen'])){
?>

$('.form').css('visibility', 'hidden');
	


<?php }?>
</script>