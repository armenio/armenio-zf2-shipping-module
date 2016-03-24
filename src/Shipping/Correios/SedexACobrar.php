<?php
namespace Armenio\Shipping\Shipping\Correios;
use Aircode\Shipping\Shipping\Correios;
/**
* SedexACobrar
* 
* Retrieves delivery cost from Correios
*/
class SedexACobrar extends Correios
{
	public $serviceCode = '40045';

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