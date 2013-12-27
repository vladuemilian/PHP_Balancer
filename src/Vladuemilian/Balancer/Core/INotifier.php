<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

interface INotifier
{
	public function notify( IBuyer $buyer, IProduct $product);
}
