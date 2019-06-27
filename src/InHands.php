<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio for the source repository
 */

namespace Armenio\Shipping;

use Zend\Json;

/**
 * InHands
 *
 * Retrieves shipping cost from Correios
 */
class InHands extends AbstractShipping
{
    /**
     * @var array
     */
    protected $options = [
        'servico' => '',
        'destino' => '',
        'peso' => '',
        'altura' => 0,
        'largura' => 0,
        'comprimento' => 0,
    ];

    /**
     * @var array
     */
    protected $configs = [

    ];

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options = [])
    {
        foreach ($options as $optionKey => $optionValue) {
            if (isset($this->options[$optionKey])) {
                $this->options[$optionKey] = $optionValue;
            }
        }

        return $this;
    }

    /**
     * @param null $option
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
     * @param string $jsonStringConfigs
     * @return $this
     */
    public function setConfigs($jsonStringConfigs = '')
    {
        try {
            $options = Json\Json::decode($jsonStringConfigs, 1);
            foreach ($options as $optionKey => $optionValue) {
                if (isset($this->configs[$optionKey])) {
                    $this->configs[$optionKey] = $optionValue;
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

    /**
     * @param null $credential
     * @return array|mixed
     */
    public function getConfigs($credential = null)
    {
        if ($credential !== null) {
            return $this->configs[$credential];
        }

        return $this->configs;
    }

    /**
     * @param $number
     * @return mixed
     */
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

        $result = [
            'shipping_price' => $this->formatNumber('0'),
            'shipping_time' => 0,
        ];

        //print_r($result);

        return $result;
    }
}