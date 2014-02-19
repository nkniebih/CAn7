<h2>Modifier une formation</h2>
<form action="" method="post" enctype="multipart/form-data">
	<p>
		<?php  echo $form; ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
   		<input type="submit" value="Modifier" name="modifier" />
	</p>
</form>