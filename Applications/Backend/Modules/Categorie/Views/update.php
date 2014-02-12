<h2>Modifier une catégorie</h2>
<form action="" method="post">
	<p>
		<?php  echo $form; ?>
		<input type="hidden" name="id" value="<?php echo $categorie['id']; ?>" />
   		<input type="submit" value="Modifier" name="modifier" />
	</p>
</form>