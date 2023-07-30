<?php namespace EasyDonate;

use EasyDonate\Managers\RequestManager;
use EasyDonate\Managers\PaymentManager;
use EasyDonate\Exceptions\BadMethodCallException;
use EasyDonate\Exceptions\BadMethodSyntaxException;

class Sdk
{
	protected $requestManager;

	public function __construct(string $key, int $version = 3)
	{
		$this->requestManager = new RequestManager($key, $version);
	}

	public function __call(string $method, array $arguments)
	{
		if (!preg_match('/get([a-zA-Z]+)/', $method, $matches)) {
			throw new BadMethodSyntaxException("Method \"{$method}\" has incorrect syntax");
		}

		$class = "EasyDonate\Methods\\{$matches[1]}";
		if (!class_exists($class)) {
			throw new BadMethodCallException("Method \"{$method}\" does not exists");
		}

		return $class::get($this->requestManager, $arguments);
	}

	public function payment()
	{
		return new PaymentManager($this->requestManager);
	}
}
