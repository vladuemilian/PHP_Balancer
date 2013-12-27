<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IProduct;

interface IOrder
{
	/*
	 *
	 * Buy a product
	 *
	 * @return bool
	 *
	 */
	public function buy( IProduct $product );

	/*
	 *
	 *
	 *
	 */
	public function success();

	/*
	 *
	 *
	 *
	 *
	 */
	public function getErrors();
}
