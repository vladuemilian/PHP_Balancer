<?php namespace Vladuemilian\Balancer;

use Vladuemilian\Balancer\Core\IOrder;
use Vladuemilian\Balancer\Core\IProduct;
use Vladuemilian\Balancer\Core\IBuyer;
use Vladuemilian\Balancer\Core\IAuthorizator;
use Vladuemilian\Balancer\Core\ITransfer;
use Vladuemilian\Balancer\Core\INotifier;
use Vladuemilian\Balancer\Core\IValidator;
use Vladuemilian\Balancer\Core\ILogger;

/*
 *
 * Main Class of the package.
 *
 */
class Order implements IOrder
{

	private $errors = array();

	public function __construct(
		IBuyer $buyer,
		IValidator $validator,
		INotifier $notifier,
		ITransfer $transfer,
		ILogger $logger,
		IAuthorizator $authorizator
	)
	{
		$this->buyer = $buyer;
		$this->validator = $validator;
		$this->notifier = $notifier;
		$this->transfer = $transfer;
		$this->logger = $logger;
		$this->authorizator = $authorizator;

	}

	/*
	 * Buy a product
	 *
	 * @param IProduct $product
	 *
	 * @return bool
	 *
	 */
	public function buy( IProduct $product )
	{
		//let's made some checks to see if everything is ok with this transaction attempt
		if( $this->validator->isValid( $this->buyer, $product ) )
		{
			//make transfer
			if( $this->transfer( $this->buyer, $product->getAuthor(), $product->getPrice() ) != true )
			{
				$this->errors = array_merge( $this->errors, $this->transfer->getErrors() );
				return false;
			}

			//authorizing the user
			if( $this->authorizator->authorize( $this->buyer, $product ) != true )
			{
				$this->errors = array_merge( $this->errors, $this->authorizator->getErrors() );

				//if authorization fails, rollback the balance transfer
				$this->transfer->rollback();
				return false;
			}

			//once we are here, transfer are made and authorization was successfully done

			//notify the users
			$this->notifier->notify( $this->buyer, $product );

			//log the transaction
			$this->logger->log( $this->buyer, $product );

			return true;
		}

		$this->errors = array_merge( $this->errors, $this->validator->getErrors() );
		return false;

	}

	/*
	 *
	 * @return bool - true on success, false otherwise
	 *
	 */
	public function success()
	{
		return $this->success;
	}

	/*
	 *
	 * @return array - an array with unique string ids of errors: e_funds, e_valid, e_transfer
	 *
	 */
	public function getErrors()
	{
		return $this->errors;
	}
}
