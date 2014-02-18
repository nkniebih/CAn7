<?php
namespace Library\Models;

use \Library\Entities\Materiel;

class MaterielManager_PDO extends MaterielManager
{
  public function getAll()
  {
    $sql = 'SELECT id, auteur, nom, prix, quantite, dateAjout, remarque, puissance, id_categorie, image, reparation,poids,volume FROM site_materiel ORDER BY id DESC';
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Materiel');
    
    $listeMateriel = $requete->fetchAll();
    
    foreach ($listeMateriel as $materiel)
    {
     	$materiel->setDateAjout(new \DateTime($materiel->dateAjout()));
		$requeteCat = $this->dao->prepare('SELECT id, auteur, nom, remarque FROM site_categorie WHERE id = :id');
    	$requeteCat->bindValue(':id', (int) $materiel->id_categorie(), \PDO::PARAM_INT);
    	$requeteCat->execute();
    	$requeteCat->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Categorie');
    	if($categorie = $requeteCat->fetch())
    	{
    		$materiel->setCategorie($categorie);
    	}
    	$requeteCat->closeCursor(); 
    }
    $requete->closeCursor();
    
    return $listeMateriel;
  }
  
  public function getUnique($id)
  {
  	$requete = $this->dao->prepare('SELECT id, auteur, nom, prix, quantite, dateAjout, remarque, puissance, id_categorie, image,poids,reparation,volume FROM site_materiel WHERE id = :id');
  	$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
  	$requete->execute();
  
  	$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Materiel');
  
  	if ($materiel = $requete->fetch())
  	{
  		$materiel->setDateAjout(new \DateTime($materiel->dateAjout()));
  
  		return $materiel;
  	}
  
  	return null;
  }
  
  public function count()
  {
  	return $this->dao->query('SELECT COUNT(*) FROM site_materiel')->fetchColumn();
  }
  
  protected function add(Materiel $materiel)
  {
  	$requete = $this->dao->prepare('INSERT INTO site_materiel SET auteur = :auteur, nom = :nom, prix = :prix, quantite = :quantite, dateAjout = NOW(), remarque = :remarque, puissance = :puissance,id_categorie = :id_categorie, image = :image, reparation=:reparation,poids=:poids, volume=:volume');
  
  	$requete->bindValue(':auteur', $materiel->auteur());
  	$requete->bindValue(':nom', $materiel->nom());
  	$requete->bindValue(':prix', $materiel->prix());
  	$requete->bindValue(':quantite',$materiel->quantite(), \PDO::PARAM_INT);
  	$requete->bindValue(':puissance',$materiel->puissance(), \PDO::PARAM_INT);
  	$requete->bindValue(':remarque',$materiel->remarque());
  	$requete->bindValue(':id_categorie',$materiel->categorie()->id());
  	$requete->bindValue(':image',$materiel->image());
  	$requete->bindValue(':reparation',$materiel->reparation(), \PDO::PARAM_INT);
  	$requete->bindValue(':poids',$materiel->poids());
  	$requete->bindValue(':volume',$materiel->volume());
  
  	$requete->execute();
  }
  
	protected function modify(Materiel $materiel)
  {
  	$requete = $this->dao->prepare('UPDATE site_materiel SET auteur = :auteur, nom = :nom, prix = :prix, quantite = :quantite, remarque = :remarque, puissance = :puissance, id_categorie =:id_categorie, image =:image, reparation=:reparation,poids=:poids,volume=:volume WHERE id = :id');
  
  	$requete->bindValue(':auteur', $materiel->auteur());
  	$requete->bindValue(':nom', $materiel->nom());
  	$requete->bindValue(':prix', $materiel->prix());
  	$requete->bindValue(':quantite',$materiel->quantite(), \PDO::PARAM_INT);
  	$requete->bindValue(':puissance',$materiel->puissance(), \PDO::PARAM_INT);
  	$requete->bindValue(':remarque',$materiel->remarque());
  	$requete->bindValue(':id', $materiel->id(), \PDO::PARAM_INT);
  	$requete->bindValue(':id_categorie', $materiel->categorie()->id());
  	$requete->bindValue(':image',$materiel->image());
  	$requete->bindValue(':reparation',$materiel->reparation(), \PDO::PARAM_INT);
  	$requete->bindValue(':poids',$materiel->poids());
  	$requete->bindValue(':volume',$materiel->volume());
  	
  	$requete->execute();
  }
  
 	public function delete($id)
  {
  	$materiel = $this->getUnique($id);  	
  	/**if(file_exists('/Users/nicolas/Sites/CAn7/Web/'.$materiel->image()))
  	{
  		umask(0777);
  		chmod('/Users/nicolas/Sites/CAn7/Web/'.$materiel->image(),0777);
  		unlink('/Users/nicolas/Sites/CAn7/Web/'.$materiel->image());
  	}**/
  	$this->dao->exec('DELETE FROM site_materiel WHERE id = '.(int) $id);
  	
  }
	
  	public function getAllCategorie($id)
  	{
  		$requete = $this->dao->prepare('SELECT id,auteur,nom,prix,quantite, dateAjout,remarque,puissance,id_categorie, image,poids,reparation,volume FROM site_materiel WHERE id_categorie =:id_categorie');
		$requete->bindValue(':id_categorie',(int) $id, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Materiel');
		$listeMateriel = $requete->fetchAll();
		
		foreach ($listeMateriel as $materiel)
		{
			$materiel->setDateAjout(new \DateTime($materiel->dateAjout()));
			$requeteCat = $this->dao->prepare('SELECT id, auteur, nom, remarque FROM site_categorie WHERE id = :id');
			$requeteCat->bindValue(':id', (int) $materiel->id_categorie(), \PDO::PARAM_INT);
			$requeteCat->execute();
			$requeteCat->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Categorie');
			if($categorie = $requeteCat->fetch())
			{
				$materiel->setCategorie($categorie);
			}
			$requeteCat->closeCursor();
		}
		$requete->closeCursor();
		return $listeMateriel;
  	}
}