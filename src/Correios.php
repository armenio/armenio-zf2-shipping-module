<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping;

use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Json;

/**
 * Class Correios
 * @package Armenio\Shipping
 */
class Correios extends AbstractShipping
{
    /**
     * @var array
     */
    protected $options = [
        'nCdServico' => '',
        'sCepOrigem' => '',
        'sCepDestino' => '',
        'nVlPeso' => '',
        'nCdFormato' => 1,
        'nVlComprimento' => 0,
        'nVlAltura' => 0,
        'nVlLargura' => 0,
        'nVlDiametro' => 0,
        'sCdMaoPropria' => 'N',
        'nVlValorDeclarado' => 0,
        'sCdAvisoRecebimento' => 'N',
        'strRetorno' => 'XML',
    ];

    /**
     * @var array
     */
    protected $params = [
        'login' => 'nCdEmpresa',
        'senha' => 'sDsSenha',
        'servico' => 'nCdServico',
        'origem' => 'sCepOrigem',
        'destino' => 'sCepDestino',
        'peso' => 'nVlPeso',
        'altura' => 'nVlAltura',
        'largura' => 'nVlLargura',
        'comprimento' => 'nVlComprimento',
    ];

    /**
     * @var array
     */
    protected $configs = [
        'nCdEmpresa' => '',
        'sDsSenha' => '',
    ];

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options = [])
    {
        if (is_array($options) && !empty($options)) {
            foreach ($options as $optionKey => $optionValue) {
                if (isset($this->params[$optionKey])) {
                    if (isset($this->options[$this->params[$optionKey]])) {
                        $this->options[$this->params[$optionKey]] = $optionValue;
                    }
                }
            }
        }

        return $this;
    }

    /**
     * @param string|null $option
     * @return array|mixed
     */
    public function getOptions($option = null)
    {
        if ($option !== null) {
            return $this->options[$option];
        }

        return $this->options;
    }

    /**
     * @param string|array $configs
     * @return $this
     */
    public function setConfigs($configs)
    {
        if (is_string($configs)) {
            try {
                $configs = Json\Json::decode($configs, 1);
            } catch (\Exception $e) {

            }
        }

        if (is_array($configs) && !empty($configs)) {
            foreach ($configs as $key => $value) {
                if (isset($this->configs[$key])) {
                    $this->configs[$key] = $value;
                }
            }
        }

        return $this;
    }

    /**
     * @param string|null $config
     * @return array|mixed
     */
    public function getConfigs($config = null)
    {
        if ($config !== null) {
            return $this->configs[$config];
        }

        return $this->configs;
    }

    /**
     * @param string $number
     * @return mixed
     */
    protected function formatNumber($number)
    {
        $formatted = str_replace('.', '', $number);
        $formatted = str_replace(',', '.', $formatted);

        return $formatted;
    }

    /**
     * @return array
     */
    public function getShippingDetails()
    {
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $client = new Client($url);
        $client->setAdapter(new Curl());
        $client->setMethod('GET');
        $client->setOptions([
            'curloptions' => [
                CURLOPT_HEADER => false,
                CURLOPT_CONNECTTIMEOUT => 0,
                CURLOPT_TIMEOUT => 60,
            ]
        ]);

        $client->setParameterGet($this->configs + $this->options);

        try {
            $response = $client->send();

            $body = $response->getBody();

            $shippingDetails = new \SimpleXMLElement($body);

            $service = $shippingDetails->cServico;

            if (empty($service->Erro)) {
                $result = [
                    'service_code' => $this->options[$this->params['servico']],
                    'shipping_price' => $this->formatNumber((string)$service->Valor),
                    'shipping_time' => (int)$service->PrazoEntrega,
                ];
            } else {
                $result = [
                    'error' => print_r($service->Erro, true),
                ];
            }
        } catch (\Exception $e) {
            $result = [
                'error' => $e->getMessage(),
            ];
        }

        return $result;
    }
}
