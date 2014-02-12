<?php
namespace Library\Field;

class PictureField extends \Library\Field
{
	protected $maxsize;
	
	public function buildWidget()
	{
		$widget = "";
		if (!empty($this->errorMessage))
		{
			$widget .= $this->errorMessage.'<br />';
		}
		$widget .='<label>'.$this->label.'</label>';
    	$widget .=	'<input type="hidden" name="MAX_FILE_SIZE" value="'.$this->maxsize.'" />
        			<input type="file" name="image_tmp" />';
    	if(!is_null($this->value()))
    	{
    		$widget .='<img src=../'.$this->value().' width="50%" />';
    	}
        				
		return $widget;
	}
	
	public function setMaxsize($max)
	{
		$max = (int) $max;
	
		if ($max > 0)
		{
			$this->maxsize = $max;
		}
		else
		{
			throw new \RuntimeException('La taille maximale doit être un nombre supérieur à 0');
		}
	}

}