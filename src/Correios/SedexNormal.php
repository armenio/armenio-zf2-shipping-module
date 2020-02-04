<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */
 
namespace Armenio\Shipping\Correios;
use Armenio\Shipping\Correios\AbstractCorreios;
/**
* SedexNormal
* 
* Retrieves delivery cost from Correios
*/
class SedexNormal extends AbstractCorreios
{
	protected $serviceCode = '04014';

	/**
	* setOptions
	* 
	* @param array $options
	*/
	public function setOptions($options = [])
	{
		$options['servico'] = $this->serviceCode;

		return parent::setOptions($options);
	}   
}