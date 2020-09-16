<?php

/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\Correios;

/**
 * Class Sedex10
 *
 * @package Armenio\Shipping\Correios
 */
class Sedex10 extends Correios
{
    /**
     * @var string
     */
    protected $serviceCode = '04790';

    /**
     * @param array $options
     *
     * @return Sedex10
     */
    public function setOptions($options = [])
    {
        $options['servico'] = $this->serviceCode;

        return parent::setOptions($options);
    }
}
