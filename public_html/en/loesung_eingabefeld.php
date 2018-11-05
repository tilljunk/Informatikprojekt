<form id="form_aufgabe" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input id="eingabe" type="text" name="eingabe" maxlength="40" placeholder="Your solution" ';">
	<button id="loesen">Solve</button>
	<span class="check"><?php if(isset($antwort)) { echo "<br>"; echo $antwort;} ?></span>
</form>