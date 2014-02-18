<p style="text-align: center"><a href="/admin/calendrier-insert.html">Ajouter d'un calendrier</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreCalendrier; ?> Calendrier(s). En voici la liste :</p>

<table>
  <tr><th>Nom</th><th>Action</th></tr>
<?php
foreach ($listeCalendrier as $calendrier)
{
  echo '<tr><td>', $calendrier['nom'], '</td><td><a href="calendrier-update-', $calendrier['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="calendrier-delete-', $calendrier['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>