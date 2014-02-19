<p style="text-align: center"><a href="/admin/formation-insert.html">Ajouter d'une formation</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreFormation; ?> Formation. En voici la liste :</p>

<table>
  <tr>
  	<th>Auteur</th>
  	<th>Nom</th>
  	<th>Date Début</th>
  	<th>Date Fin</th>
  	<th>Responsable</th>
  	<th>Type</th>
  	<th>Document</th>
  	<th>Action</th>
  </tr>
<?php
foreach ($listeFormation as $formation)
{
  echo '<tr>
			<td>', $formation['auteur'], '</td>
			<td>', $formation['nom'], '</td>
			<td>', $formation['dateD']->format('d/m/Y à H\hi'), '</td>
			<td>', $formation['dateF']->format('d/m/Y à H\hi'), '</td>
			<td>', $formation['responsable'], '</td>
  			<td>', $formation['type'], '</td>
  			<td>',$formation['document'],'</td>
			<td><a href="formation-update-', $formation['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="formation-delete-', $formation['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td>
		</tr>', "\n";
}
?>
</table>