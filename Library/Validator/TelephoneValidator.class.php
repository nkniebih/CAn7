<?php
namespace Library\Validator;

class TelephoneValidator extends \Library\Validator
{
	public function isValid($value)
	{
		return preg_match('/^[0-9]{9}[0-9]$/', $value);
	}
}