<?php
use Library\Entities\Event;
namespace \Library\Entities;

class Formation extends Event
{
	protected $responsable;
	protected $type;
	protected $document;
	
	const RESPONSABLE_INVALIDE = 1;
	const TYPE_INVALIDE = 2;
	const DOCUMENT_INVALIDE = 3;
	
	public function setResponsable($val)
	{
		if (!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::RESPONSABLE_INVALIDE;
		}
		else
		{
			$this->responsable = $val;
		}
	}
	public function setType($val)
	{
		if (!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::TYPE_INVALIDE;
		}
		else
		{
			$this->type = $val;
		}
	}
	public function setDocument($val)
	{
		if (!is_string($val) || empty($val))
		{
			$this->erreurs[] = self::DOCUMENT_INVALIDE;
		}
		else
		{
			$this->document = $val;
		}
	}
	//GETTERS//
	public function reponsable()
	{
		return $this->responsable;
	}
	public function type()
	{
		return $this->type;
	}
	public function document()
	{
		return $this->document;
	}
}