<?php
namespace Library;

abstract class Field
{
  protected $errorMessage;
  protected $label;
  protected $name;
  protected $validators = array();
  protected $value;
  protected $required;
  
  public function __construct(array $options = array())
  {
    if (!empty($options))
    {
      $this->hydrate($options);
    }
  }
  
  abstract public function buildWidget();
  
  public function hydrate($options)
  {
    foreach ($options as $type => $value)
    {
      $method = 'set'.ucfirst($type);
      
      if (is_callable(array($this, $method)))
      {
        $this->$method($value);
      }
    }
  }
  
  public function isValid()
  {
  	if (!isset($this->value) && !$this->required)
  	{
  		return true;
  	}
  	else
  	{
  		foreach ($this->validators as $validator)
  		{
   			if(!$validator->isValid($this->value))
   			{
   				$this->errorMessage = $validator->errorMessage();
   				return false;
   			}	
   		}
   		return true;
  	}
  }
  
  public function label()
  {
    return $this->label;
  }
  
  public function name()
  {
    return $this->name;
  }
  
  public function value()
  {
    return $this->value;
  }
  
  public function validators()
  {
  	return $this->validators;
  }
  
  public function required()
  {
  	return $this->required;
  }
  
  public function setLabel($label)
  {
    if (is_string($label))
    {
      $this->label = $label;
    }
  }
  
  public function setName($name)
  {
    if (is_string($name))
    {
      $this->name = $name;
    }
  }
  
  public function setValidators(array $validators)
  {
  	foreach ($validators as $validator)
  	{
  		if($validator instanceof Validator && !in_array($validator, $this->validators))
  		{
  			$this->validators[] = $validator;
  		}
  	}
  }
  public function setValue($value)
  {
    if (is_string($value) || is_float($value))
    {
      $this->value = $value;
    }    
  }
  
  public function setRequired($required)
  {
  	if(is_bool($required))
  	{
  		$this->required= $required;
  	}
  }
}