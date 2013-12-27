<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

interface IValidator
{
	/*
	 *
	 * @return bool
	 *
	 */
	public function isValid( IBuyer $buyer, IProduct $product );

	/*
	 *
	 * @return array - an array with errors indexes
	 *
	 */
	public function getErrors();

	
}
