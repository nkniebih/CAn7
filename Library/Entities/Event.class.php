<?php
namespace Library\Entities;

abstract class Event extends \Library\Entity
{
	protected $name;
	protected $dateD;
	protected $dateF;
	protected $auteur;
	
	const NAME_INVALIDE = 1;
	const AUTEUR_INVALIDE = 2;
	
	public function setName($val)
	{
		if (!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::NAME_INVALIDE;
		}
		else
		{
			$this->name = $val;
		}
	}
	
	public function setDateD(\DateTime $val)
	{
		$this->dateD = $val;
	}
	
	public function setDateF(\DateTime $val)
	{
		$this->dateF = $val;
	}
	
	public function setAuteur($val)
	{
		if (!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::AUTEUR_INVALIDE;
		}
		else
		{
			$this->auteur = $val;
		}
	}
	
	// GETTERS //
	public function name()
	{
		return $this->name;
	}
	
	public function dateD()
	{
		return $this->dateD;
	}
	
	public function dateF()
	{
		return $this->dateF;
	}
	
	public function auteur()
	{
		return $this->auteur;
	}
}