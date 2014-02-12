<?php
namespace Library\Entities;

class Client extends \Library\Entity
{
	protected $auteur;
	protected $nom;
	protected $organisation;
	protected $email;
	protected $telephone;
	protected $adresse;
	protected $codepostale;
	protected $ville;
	
	const AUTEUR_INVALIDE = 1;
	const NOM_INVALIDE = 2;
	const ORGANISATION_INVALIDE = 3;
	const EMAIL_INVALIDE = 4;
	const TELEPHONE_INVALIDE = 5;
	const ADRESSE_INVALIDE = 6;
	const CODEPOSTALE_INVALIDE = 7;
	const VILLE_INVALIDE = 8;
	
	public function isValid()
	{
		return !(empty($this->nom) || empty($this->auteur) || empty($this->email));
	}
	
	//SETTERS //
	public function setAuteur($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::AUTEUR_INVALIDE;
		}
		else
		{
			$this->auteur = $var;
 		}
	}
	public function setNom($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
		}
		else
		{
			$this->nom = $var;
		}
	}
	public function setOrganisation($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::ORGANISATION_INVALIDE;
		}
		else
		{
			$this->organisation = $var;
		}
	}
	public function setEmail($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::EMAIL_INVALIDE;
		}
		else
		{
			$this->email = $var;
		}
	}
	public function setTelephone($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::TELEPHONE_INVALIDE;
		}
		else
		{
			$this->telephone = $var;
		}
	}
	public function setAdresse($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::ADRESSE_INVALIDE;
		}
		else
		{
			$this->adresse = $var;
		}
	}
	public function setCodepostale($var)
	{
		if(!is_float($var))
		{
			$this->erreurs[] = self::CODEPOSTALE_INVALIDE;
		}
		else
		{
			$this->codepostale = $var;
		}
	}
	public function setVille($var)
	{
		if(!is_string($var)|| empty($var))
		{
			$this->erreurs[] = self::VILLE_INVALIDE;
		}
		else
		{
			$this->ville = $var;
		}
	}
	
	// GETTERS //
	public function auteur()
	{
		return $this->auteur;
	}	
	public function nom()
	{
		return $this->nom;
	}
	public function organisation()
	{
		return $this->organisation;
	}
	public function email()
	{
		return $this->email;
	}
	public function telephone()
	{
		return $this->telephone;
	}
	public function adresse()
	{
		return $this->adresse;
	}
	public function codepostale()
	{
		return $this->codepostale;
	}
	public function ville()
	{
		return $this->ville;
	}
}
