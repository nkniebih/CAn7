<p style="text-align: center"><a href="/admin/categorie-insert.html">Ajouter d'une catégorie</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreCategorie; ?> Catégorie(s). En voici la liste :</p>

<table>
  <tr><th>Auteur</th><th>Nom</th><th>Remarque</th><th>Action</th></tr>
<?php
foreach ($listeCategorie as $categorie)
{
  echo '<tr><td>', $categorie['auteur'], '</td><td>', $categorie['nom'], '</td><td>', $categorie['remarque'], '</td><td><a href="categorie-update-', $categorie['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="categorie-delete-', $categorie['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>