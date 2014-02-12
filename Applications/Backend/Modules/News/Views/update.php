<h2>Modifier une news</h2>
<form action="" method="post">
	<p>
		<?php  echo $form; ?>
		<input type="hidden" name="id" value="<?php echo $news['id']; ?>" />
   		<input type="submit" value="Modifier" name="modifier" />
	</p>
</form>