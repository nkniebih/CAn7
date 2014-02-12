<?php
namespace Library\Field;

class SelectField extends \Library\Field
{
  protected $options =array();
  protected $multiple;
  protected $size;
  
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    $widget .= '<label>'.$this->label.'</label><select name="'.$this->name.'"';
    if(!empty($this->size))
    {
    	$widget .= ' SIZE="'.$this->size.'"';
    }
    if($this->multiple)
    {
    	$widget .= ' MULTIPLE';
    }
    $widget .=' />';
    
    foreach ($this->options as $option)
    {
    	if(!empty($option[0])&&!empty($option[1])&&empty($option[2]))
    	{
    		$widget .='<option value="'.$option[0].'">'.$option[1];
    	}
    	if(!empty($option[0])&&!empty($option[1])&&!empty($option[2]))
    	{
    		$widget .='<option value="'.$option[0].'" SELECTED>'.$option[1];
    	}
    }
    
    return $widget .= '<select>';
  }
  
  public function setSize($size)
  {
    $size = (int) $size;
    
    if ($size > 0)
    {
      $this->size = $size;
    }
    else
    {
      throw new \RuntimeException('Le nombre d\'élément affichable doit être un nombre supérieur à 0');
    }
  }
  public function setMultiple($multiple)
  {
  	if (is_bool($multiple))
  	{
  		$this->multiple = $multiple;
  	}
  	else
  	{
  		throw new \RuntimeException('Le multiple doit est un boolean');
  	}
  }
  
  public function setOptions(array $options)
  {
  	if(empty($option))
  	{
  		$this->options=$options;
  	}
  	else 
  	{
  		throw new \RuntimeException('Les options ne doivent pas être null');	
  	}
  }
}