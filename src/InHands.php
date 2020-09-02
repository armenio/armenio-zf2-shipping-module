<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping;

use Zend\Json;

/**
 * Class InHands
 * @package Armenio\Shipping
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
        if (is_array($options) && !empty($options)) {
            foreach ($options as $optionKey => $optionValue) {
                if (isset($this->options[$optionKey])) {
                    $this->options[$optionKey] = $optionValue;
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
                $configs = Json\Json::decode($configs, true);
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

        $result = [
            'shipping_price' => $this->formatNumber('0'),
            'shipping_time' => 0,
        ];

        return $result;
    }
}
