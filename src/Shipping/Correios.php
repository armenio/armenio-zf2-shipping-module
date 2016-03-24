<?php
namespace Armenio\Shipping\Shipping;
use Aircode\Shipping\Shipping;

use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Json\Json;

use Aircode\Currency as ArmenioCurrency;

/**
* Correios
* 
* Retrieves shipping cost from Correios
*/
class Correios extends Shipping
{	
	protected $_params = array();

	/**
	* Constructor
	* 
	* @param array $options
	* @return __construct
	*/
	public function __construct($options = array())
	{
		$userParam = 'config';
		if( ! empty( $options[$userParam] ) ){

			try{
				$config = Json::decode($options[$userParam], 1);

				$this->_params['login'] = $config['login'];
				$this->_params['senha'] = $config['senha'];
			
				$isException = false;
			} catch (\Zend\Json\Exception\RuntimeException $e) {
				$isException = true;
			} catch (\Zend\Json\Exception\RecursionException $e2) {
				$isException = true;
			} catch (\Zend\Json\Exception\InvalidArgumentException $e3) {
				$isException = true;
			} catch (\Zend\Json\Exception\BadMethodCallException $e4) {
				$isException = true;
			}

			if( $isException === true ){
				//código em caso de problemas no decode
			}
		}

		$userParam = 'servico';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'origem';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'destino';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'peso';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'altura';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'largura';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}

		$userParam = 'comprimento';
		if( ! empty( $options[$userParam] ) ){
			$this->_params[$userParam] = $options[$userParam];
		}
	}
	
	/**
	* Returns shipping's cost
	* 
	* @return float
	*/
	public function getShippingDetails()
	{
		$result = array();
		
		try{
			$uri = 'http://aircode.com.br/webservice/correios/frete';
			$client = new Client($uri);
			$client->setAdapter(new Curl());
			$client->setMethod('POST');
			$client->setOptions(array(
				'curloptions' => array(
					CURLOPT_HEADER => false,
				)
			));
			$client->setParameterPost($this->_params);

			
			$response = $client->send();
			
			$body = $response->getBody();
			
			$result = Json::decode($body, 1);

			if( ! empty($result['shipping_price']) ){
				$result['shipping_price'] = ArmenioCurrency::normalize($result['shipping_price']);
			}

			$isException = false;
		} catch (\Zend\Http\Exception\RuntimeException $e){
			$isException = true;
		} catch (\Zend\Http\Client\Adapter\Exception\RuntimeException $e){
			$isException = true;
		} catch (\Zend\Json\Exception\RuntimeException $e) {
			$isException = true;
		} catch (\Zend\Json\Exception\RecursionException $e2) {
			$isException = true;
		} catch (\Zend\Json\Exception\InvalidArgumentException $e3) {
			$isException = true;
		} catch (\Zend\Json\Exception\BadMethodCallException $e4) {
			$isException = true;
		}

		if( $isException === true ){
			//código em caso de problemas no decode
		}

		return $result;
	}
}