<p style="text-align: center"><a href="/admin/materiel-insert.html">Ajouter d'un materiel</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreMateriel; ?> Matériel. En voici la liste :</p>

<table>
  <tr><th>Auteur</th><th>Nom</th><th>Catégorie</th><th>Date d'ajout</th><th>Prix</th><th>Quantité</th><th>En Réparation</th><th>Puissance</th><th>Poids</th><th>Remarque</th><th>Action</th></tr>
<?php
foreach ($listeMateriel as $materiel)
{
  echo '<tr><td>', $materiel['auteur'], '</td><td>', $materiel['nom'], '</td><td>', $materiel->categorie()['nom'],'<td>le ', $materiel['dateAjout']->format('d/m/Y à H\hi'), '</td><td>', $materiel['prix'], '</td><td>', $materiel['quantite'], '</td><td>',$materiel['reparation'],'</td><td>', $materiel['puissance'], '</td><td>',$materiel['poids'],'</td><td>', $materiel['remarque'], '</td><td><a href="materiel-update-', $materiel['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="materiel-delete-', $materiel['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>