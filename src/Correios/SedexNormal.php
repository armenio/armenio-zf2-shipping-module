<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio for the source repository
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
	protected $serviceCode = '40010';

	/**
	* setOptions
	* 
	* @param array $options
	*/
	public function setOptions($options = array())
	{
		$options['servico'] = $this->serviceCode;

		return parent::setOptions($options);
	}   
}