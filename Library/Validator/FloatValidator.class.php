<?php
namespace Library\Validator;

class FloatValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return is_float($value);
  }
}