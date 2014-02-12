<?php
namespace Library\Validator;

class FloatPositiveValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return $value >= 0;
  }
}