<?php
namespace Armenio\Shipping\Shipping\Correios;
use Armenio\Shipping\Shipping\Correios;
/**
* Sedex10
* 
* Retrieves delivery cost from Correios
*/
class Sedex10 extends Correios
{
	public $serviceCode = '40215';

	/**
	* __construct
	* 
	* @param array $options
	*/
	public function __construct($options = array())
	{
		$userParam = 'servico';
		$options[$userParam] = $this->serviceCode;

		parent::__construct($options);
	}
   
}