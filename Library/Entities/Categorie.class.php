<?php
namespace Library\Entities;

class Categorie extends \Library\Entity
{
	protected $auteur,
	$nom,
	$remarque;

	const AUTEUR_INVALIDE = 1;
	const NOM_INVALIDE = 2;
	const REMARQUE_INVALIDE = 5;


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

	public function setRemarque($remarque)
	{
		if(!is_string($remarque)|| empty($remarque))
		{
			$this->erreurs[] = self::REMARQUE_INVALIDE;
		}
		else
		{
			$this->remarque = $remarque;
		}
	}

	//	GETTERS //
	public function auteur()
	{
		return $this->auteur;
	}

	public function nom()
	{
		return $this->nom;
	}

	public function remarque()
	{
		return $this->remarque;
	}
}
