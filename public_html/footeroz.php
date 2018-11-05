<div id="footer">
      <div class="container">
          <div class="logo"><img src="bilder/TH_Koeln_Logo.svg"><span class="impressum"><a href="impressum.php">Impressum</a></span></div>
        <div style="float:right; margin-top: 10px;"><a href="index.php" class="iconsfooter"><i class="glyphicon glyphicon-home" style="font-size:30px !important; color:#ffffff !important;"></i></a></div>
      </div>
    </div>

<?php
if( isset($tt) ) {
	echo '<div id="tt-text-no" style="display:none;">Keine Tipps mehr vorhanden.</div>';
	echo '<div id="tt-text-next" style="display:none;">'.$tt[1].'</div>';
}
?>
    </body>
</html>

    <script>
$("#po_button").popover();
$("#po_button2").popover();
$("#po_button3").popover();
$("#po_button4").popover();
$('#po_button').on('click', function () {
    $('#po_button2').popover('hide');
    $('#po_button3').popover('hide');
    $('#po_button4').popover('hide');
});
$('#po_button2').on('click', function () {
    $('#po_button').popover('hide');
    $('#po_button3').popover('hide');
    $('#po_button4').popover('hide');
});
$('#po_button3').on('click', function () {
    $('#po_button').popover('hide');
    $('#po_button2').popover('hide');
    $('#po_button4').popover('hide');
});
$('#po_button4').on('click', function () {
    $('#po_button').popover('hide');
    $('#po_button2').popover('hide');
    $('#po_button3').popover('hide');
});
</script>