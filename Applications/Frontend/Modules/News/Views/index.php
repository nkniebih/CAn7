<?php
foreach ($listeNews as $news)
{
?>
  <h2><a href="news-show-<?php echo $news['id']; ?>.html"><?php echo $news['titre']; ?></a></h2>
  <p><?php echo nl2br($news['contenu']); ?></p>
<?php
} ?>

<p>Page: 
<?php 
for ($i = 1;$i<= $nombrePage;$i++)
{
?>
	<a href="news-<?php echo $i;?>.html"><?php echo $i;?></a>
<?php
}?></p>