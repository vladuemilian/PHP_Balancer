<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

interface ILogger
{
	public function log( IBuyer $buyer, IProduct $product );
}
