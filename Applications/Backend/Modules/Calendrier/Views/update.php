<h2>Modifier un calendrier</h2>
<form action="" method="post">
	<p>
		<?php  echo $form; ?>
		<input type="hidden" name="id" value="<?php echo $calendrier['id']; ?>" />
   		<input type="submit" value="Modifier" name="modifier" />
	</p>
</form>