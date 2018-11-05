<form id="form_aufgabe" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input id="eingabe" type="text" name="eingabe" maxlength="40" value="Deine Lösung" onfocus="if( this.value == 'Deine Lösung' ) this.value = '';" onblur="if( this.value == '' ) this.value = 'Deine Lösung';">
				<button id="loesen">Lösen</button>
				<span class="check"><?php if(isset($antwort)) { echo "<br>"; echo $antwort;} ?></span>
			</form>