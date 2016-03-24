<?php
namespace Armenio\Shipping\Shipping\Correios;
use Armenio\Shipping\Shipping\Correios;
/**
* Pac
* 
* Retrieves delivery cost from Correios
*/
class Pac extends Correios
{
	public $serviceCode = '41106';
	
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