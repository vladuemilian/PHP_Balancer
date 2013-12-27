<?php namespace Vladuemilian\Balancer\Src;

use Vladuemilian\Balancer\Core\IValidator;
use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

class Validator implements IValidator
{
	
	private $errors = array();

	public function isValid( IBuyer $buyer, IProduct $product )
	{


		return false;
	}



	public function getErrors()
	{
		return $this->errors;
	}
}
