<?php
namespace Library\Validator;

class NotNullValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return $value != '';
  }
}