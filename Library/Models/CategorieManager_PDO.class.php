<?php
namespace Library\Models;

use \Library\Entities\Categorie;

class CategorieManager_PDO extends CategorieManager
{
  public function getAll()
  {
    $sql = 'SELECT id, auteur, nom, remarque FROM site_categorie ORDER BY id DESC';
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Categorie');
    
    $listeCategorie = $requete->fetchAll();
    
    $requete->closeCursor();
    
    return $listeCategorie;
  }
  
  public function getAllName()
  {
  	$sql = 'SELECT id, nom FROM site_categorie ORDER BY id ASC';
  
  	$requete = $this->dao->query($sql);
  	$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Categorie');
  
  	$listeCategorie = $requete->fetchAll();
  
  	$requete->closeCursor();
  	
  	$liste = array();
  	foreach ($listeCategorie as $categorie)
  	{
  		array_push($liste, array($categorie->id(),$categorie->nom()));
  	}
  	
  	return $liste;
  }
  
  public function getUnique($id)
  {
  	$requete = $this->dao->prepare('SELECT id, auteur, nom, remarque FROM site_categorie WHERE id = :id');
  	$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
  	$requete->execute();
  
  	$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Categorie');
  
  	if ($categorie = $requete->fetch())
  	{
  
  		return $categorie;
  	}
  
  	return null;
  }
  
  public function count()
  {
  	return $this->dao->query('SELECT COUNT(*) FROM site_categorie')->fetchColumn();
  }
  
  protected function add(Categorie $categorie)
  {
  	$requete = $this->dao->prepare('INSERT INTO site_categorie SET auteur = :auteur, nom = :nom, remarque = :remarque');
  
  	$requete->bindValue(':auteur', $categorie->auteur());
  	$requete->bindValue(':nom', $categorie->nom());
  	$requete->bindValue(':remarque', $categorie->remarque());
  
  	$requete->execute();
  }
  
  protected function modify(Categorie $categorie)
  {
  	$requete = $this->dao->prepare('UPDATE site_categorie SET auteur = :auteur, nom = :nom, remarque = :remarque WHERE id = :id');
  
  	$requete->bindValue(':auteur', $categorie->auteur());
  	$requete->bindValue(':nom', $categorie->nom());
  	$requete->bindValue(':remarque',$categorie->remarque());
  	$requete->bindValue(':id', $categorie->id(), \PDO::PARAM_INT);
  
  	$requete->execute();
  }
  
  public function delete($id)
  {
  	$this->dao->exec('DELETE FROM site_categorie WHERE id = '.(int) $id);
  }
}