<?php
foreach ($listeMateriel as $materiel)
{
	?>
	<h2><a href="materiel-<?php echo $materiel['id'];?>.html"><?php echo $materiel['nom'];?></a></h2>
	<?php
}
