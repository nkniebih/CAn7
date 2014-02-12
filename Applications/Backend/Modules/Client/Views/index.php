<p style="text-align: center"><a href="/admin/client-insert.html">Ajouter un client</a></p>
<p style="text-align: center">Il y a actuellement <?php echo $nombreClient; ?> Client(s). En voici la liste :</p>

<table>
  <tr><th>Auteur</th><th>Nom</th><th>Organisation</th><th>Email</th><th>Telephone</th><th>Adresse</th><th>Code Postale</th><th>Ville</th><th>Action</th></tr>
<?php
foreach ($listeClient as $client)
{
  echo '<tr><td>', $client['auteur'], '</td><td>', $client['nom'], '</td><td>', $client['organisation'],'</td><td>', $client['email'], '</td><td>', $client['telephone'], '</td><td>', $client['adresse'], '</td><td>',$client['codepostale'],'</td><td>', $client['ville'], '</td><td><a href="client-update-', $client['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="client-delete-', $client['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>