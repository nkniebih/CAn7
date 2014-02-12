<?php
namespace  Library\Entities;

class Upload extends \Library\Entity
{
	protected $extensions = array();
	protected $maxsize;
	protected $dir;
	protected $url;
	
	public function isValid()
	{
		
	}
	
	public function move($index,$subdestination,$name)
	{
   		//Test1: fichier correctement uploadé
     	if (!isset($index) OR $index['error'] > 0) return FALSE;
   		//Test2: taille limite
    	if ($this->maxsize !== FALSE AND $index['size'] > $this->maxsize) return FALSE;
   		//Test3: extension
     	$ext = substr(strrchr($index['name'],'.'),1);
     	if ($this->extensions !== FALSE AND !in_array($ext,$this->extensions)) return FALSE;
   		//Déplacement
   		$destination = $this->dir;
   		$destination .=$subdestination;
		$name =str_replace(' ', '_', $name);  
 		$destination .=$name;
   		$destination .=".".$ext;
		if(move_uploaded_file($index['tmp_name'],$destination))
     	{
     		$this->setUrl("upload/".$subdestination."".$name.".".$ext);
     		return true;
     	}
     	else 
     	{
     		return false;
     	}
	}
	
	public function setExtensions(array $extensions)
	{
		if(!is_array($extensions))
		{
			$this->extensions = FALSE;
		}
		else
		{
			$this->extensions = $extensions;
		}
	}
	
	public function setMaxsize($max)
	{
		if(is_int($max))
		{
			$this->maxsize = $max;
		}
		else 
		{
			$this->maxsize = 0;
		}
	}
	
	public function setDir($dir)
	{
		$this->dir = $dir;
	}
	
	public function setUrl($url)
	{
		if(is_string($url))
		{
			$this->url = $url;
		}
	}
	public function extensions()
	{
		return $this->extensions;
	}
	
	public function maxsize()
	{
		return $this->maxsize;
	}
	
	public function url()
	{
		return $this->url;
	}
	
	public function dir()
	{
		return $this->dir;
	}
	
}