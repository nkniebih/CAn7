<?php
namespace Library\Validator;

class EmailValidator extends \Library\Validator
{
  public function isValid($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}