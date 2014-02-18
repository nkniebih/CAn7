<?php
namespace Library\Entities;

class Calendrier extends \Library\Entity
{
	protected $events = array();
	protected $nom;
	
	const NOM_INVALIDE = 1;
	const EVENTS_INVALIDE = 2;
	
	public function isValid()
	{
		return !empty($this->nom);
	}
	
	public function nom()
	{
		return $this->nom;
	}
	public function setNom($val)
	{
		if(!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::NOM_INVALIDE;
		}
		else 
		{
			$this->nom = $val;
		}
		
	}
	public function events()
	{
		return $this->events;
	}
	
	public function setEvents(array $val)
	{
		if(!is_array($val))
		{
			$this->erreurs[] = self::EVENTS_INVALIDE;
		}
		else
		{
			$this->events = $val;
		}
	}
}