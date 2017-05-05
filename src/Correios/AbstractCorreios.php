<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio for the source repository
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\AbstractShipping;
use SimpleXMLElement;
use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Json;

/**
 * Correios
 *
 * Retrieves shipping cost from Correios
 */
class AbstractCorreios extends AbstractShipping
{
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

    protected $credentials = [
        'nCdEmpresa' => '',
        'sDsSenha' => '',
    ];

    public function setOptions($options = [])
    {
        foreach ($options as $optionKey => $optionValue) {
            if (isset($this->params[$optionKey])) {
                if (isset($this->options[$this->params[$optionKey]])) {
                    $this->options[$this->params[$optionKey]] = $optionValue;
                }
            }
        }

        return $this;
    }

    public function getOptions($option = null)
    {
        if ($option !== null) {
            return $this->options[$option];
        }

        return $this->options;
    }

    public function setCredentials($jsonStringCredentials = '')
    {
        try {
            $options = Json\Json::decode($jsonStringCredentials, 1);
            foreach ($options as $optionKey => $optionValue) {
                if (isset($this->params[$optionKey])) {
                    if (isset($this->credentials[$this->params[$optionKey]])) {
                        $this->credentials[$this->params[$optionKey]] = $optionValue;
                    }
                }
            }

            $isException = false;
        } catch (Json\Exception\RecursionException $e2) {
            $isException = true;
        } catch (Json\Exception\RuntimeException $e) {
            $isException = true;
        } catch (Json\Exception\InvalidArgumentException $e3) {
            $isException = true;
        } catch (Json\Exception\BadMethodCallException $e4) {
            $isException = true;
        }

        if ($isException === true) {
            //código em caso de problemas no decode
        }

        return $this;
    }

    public function getCredentials($credential = null)
    {
        if ($credential !== null) {
            return $this->credentials[$credential];
        }

        return $this->credentials;
    }

    protected function formatNumber($number)
    {
        $formatted = str_replace('.', '', $number);
        $formatted = str_replace(',', '.', $formatted);

        return $formatted;
    }

    /**
     * Returns shipping's cost
     *
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
            ]
        ]);
        $client->setParameterGet($this->credentials + $this->options);

        $response = $client->send();

        $body = $response->getBody();

        $shippingDetails = new SimpleXMLElement($body);

        $service = $shippingDetails->cServico;

        if (empty($service->Erro)) {
            $result = [
                'service_code' => $this->options[$this->params['servico']],
                'shipping_price' => $this->formatNumber((string)$service->Valor),
                'shipping_time' => (int)$service->PrazoEntrega
            ];
        } else {
            $result = [
                'error' => print_r($service->Erro, true)
            ];
        }

        return $result;
    }
}