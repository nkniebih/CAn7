<?php
namespace Library\Entities;

class Materiel extends \Library\Entity
{
	protected $auteur,
			  $nom,
			  $prix,
			  $quantite,
			  $dateAjout,
			  $remarque,
			  $puissance,
			  $categorie,
			  $id_categorie,
			  $image,
			  $poids,
			  $reparation;
	
	const AUTEUR_INVALIDE = 1;
	const NOM_INVALIDE = 2;
	const PRIX_INVALIDE = 3;
	const QUANTITE_INVALIDE = 4;
	const REMARQUE_INVALIDE = 5;
	const PUISSANCE_INVALIDE = 6;
	const POIDS_INVALIDE = 7;
	const REPARATION_INVALIDE = 8;

	public function isValid()
	{
		return !(empty($this->auteur) || empty($this->nom)); 
	}

	// SETTERS //
	public function setAuteur($auteur)
	{
		if(!is_string($auteur)|| empty($auteur))
		{
			$this->erreurs[] = self::AUTEUR_INVALIDE;
		}
		else
		{
			$this->auteur = $auteur;
		}
		
	}
	
	public function setNom($nom)
	{
		if(!is_string($nom)|| empty($nom))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
		}
		else
		{
			$this->nom = $nom;
		}
	}
	
	public function setPrix($prix)
	{
		if(!is_float($prix))
		{
			$this->erreurs[] = self::PRIX_INVALIDE;
		}
		else
		{
			$this->prix = $prix;
		}
	}
	
	public function setQuantite($quantite)
	{
		if(!is_float($quantite))
		{
			$this->erreurs[] = self::QUANTITE_INVALIDE;				
		}
		else
		{
			$this->quantite = $quantite;
		}
		
	}
	
	public function setDateAjout(\DateTime $dateAjout)
	{
		$this->dateAjout = $dateAjout;
	}
	
	public function setRemarque($remarque)
	{
		if(!is_string($remarque))
		{
			$this->erreurs[] = self::REMARQUE_INVALIDE;
		}
		else
		{
			$this->remarque = $remarque;
		}
	}
	
	public function setPuissance($puissance)
	{
		if(!is_float($puissance))
		{
			$this->erreurs[] = self::PUISSANCE_INVALIDE;
		}
		else
		{
			$this->puissance=$puissance;	
		}		
	}
	
	public function setId_categorie($id_categorie)
	{
		$this->id_categorie=$id_categorie;
	}
	
	public function setCategorie(\Library\Entities\Categorie $categorie)
	{
		if(is_object($categorie))
		{
			$this->categorie=$categorie;
		}
	}
	
	public function setImage($image)
	{
		$this->image = $image;
	}
	
	public function setPoids($poids)
	{
		if(!is_float($poids))
		{
			$this->erreurs[]= self::POIDS_INVALIDE;
		}
		else 
		{
			$this->poids = $poids;
		}
	}
	
	public function setReparation($reparation)
	{
		if(!is_float($reparation))
		{
			$this->erreurs[] = $reparation;
		}
		else 
		{
			$this->reparation = $reparation;
		}
	}
	
	//	GETTERS //
	public function auteur()
	{
		return $this->auteur;
	}
	
	public function dateAjout()
	{
		return $this->dateAjout;
	}
	
	public function nom()
	{
		return $this->nom;
	}
	
	public function prix()
	{
		return $this->prix;
	}
	
	public function puissance()
	{
		return $this->puissance;
	}
	
	public function quantite()
	{
		return $this->quantite;
	}
	
	public function remarque()
	{
		return $this->remarque;
	}
	
	public function categorie()
	{
		return $this->categorie;
	}
	
	public function id_categorie()
	{
		return $this->id_categorie;
	}
	
	public function image()
	{
		return $this->image;
	}
	
	public function reparation()
	{
		return $this->reparation;
	}
	
	public function poids()
	{
		return $this->poids;
	}
}
