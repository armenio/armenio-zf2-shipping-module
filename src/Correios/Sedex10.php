<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */
 
namespace Armenio\Shipping\Correios;
use Armenio\Shipping\Correios\AbstractCorreios;
/**
* Sedex10
* 
* Retrieves delivery cost from Correios
*/
class Sedex10 extends AbstractCorreios
{
	protected $serviceCode = '40215';

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