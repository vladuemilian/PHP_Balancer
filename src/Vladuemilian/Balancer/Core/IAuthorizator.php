<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

interface IAuthorizator
{

	public function authorize( IBuyer $buyer, IProduct $product );

	public function getErrors();
}
