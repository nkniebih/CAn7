<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>
      <?php if (!isset($title)) { ?>
        Mon super site
      <?php } else { echo $title; } ?> - Admin
    </title>
    
    <meta http-equiv="Content-type" content="text/html" charset="utf-8"/>
    
    <link rel="stylesheet" href="/css/Envision.css" type="text/css" />
  </head>
  
  <body>
    <div id="wrap">
      <div id="header">
        <h1 id="logo-text"><a href="/">Mon super site</a></h1>
        <p id="slogan">Comment ça « il n'y a presque rien » ?</p>
      </div>
      
      <div  id="menu">
        <ul>
          <li><a href="/">Accueil</a></li>
          <?php if ($user->isAuthenticated()) { ?>
          <li><a href="/admin/">Admin :</a></li>
          <li><a href="/admin/news">News</a></li>
          <li><a href="/admin/materiel">Matériel</a></li>
          <li><a href="/admin/categorie">Categorie</a></li>
          <li><a href="/admin/client">Client</a></li>
          <li><a href="/admin/devis">Devis</a></li>
          <?php } ?>
        </ul>
      </div>
      
      <div id="content-wrap">
        <div id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>
          
          <?php echo $content; ?>
        </div>
      </div>
    
      <div id="footer"></div>
    </div>
  </body>
</html>