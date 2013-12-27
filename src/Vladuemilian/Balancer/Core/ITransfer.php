<?php namespace Vladuemilian\Balancer\Core;

use Vladuemilian\Balancer\Core\IBuyer;

interface ITransfer
{

	/*
	 *
	 *
	 * @return bool 
	 *
	 */
	public function transfer( IBuyer $from, IBuyer $to, $amount );
	
	/*
	 *
	 *
	 * @return bool
	 *
	 */
	public function rollback();

	/*
	 *
	 * 
	 * @return array
	 *
	 */
	public function getErrors();

	/*
	 *
	 * @return bool
	 *
	 */
	public function success();

}

