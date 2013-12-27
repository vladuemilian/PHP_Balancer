<?php namespace Vladuemilian\Balancer\Src;

use Vladuemilian\Balancer\Core\ITransfer;
use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IProduct;

class Transfer implements ITransfer
{
	
	private $errors = array();

	private $success = false;

	public function transfer( IBuyer $from, IBuyer $to, $amount )
	{
		
		if( $from->getBalance() >= $to->getBalance() )
		{
			$from->setBalance( $from->getBalance() - (int) $amount );
			$to->setBalance( $to->getBalance() + (int) $amount );

			$this->success = true;
			return true;
		}
		$this->errors[] = 'e_funds';
		return false;


	}
	
	public function rollback()
	{
		//todo
	}

	public function getErrors()
	{
		return $this->errors;
	}

	public function success()
	{
		return $this->success;
	}

}
