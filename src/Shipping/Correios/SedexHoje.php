<?php
namespace Armenio\Shipping\Shipping\Correios;
use Armenio\Shipping\Shipping\Correios;
/**
* SedexHoje
* 
* Retrieves delivery cost from Correios
*/
class SedexHoje extends Correios
{
	public $serviceCode = '40290';

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