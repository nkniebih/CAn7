<?php
namespace Library\Validator;

class CodepostaleValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return $value >0 && $value<100000;
  }
}