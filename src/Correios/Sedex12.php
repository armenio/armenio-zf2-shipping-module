<?php

/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\Correios;

/**
 * Class Sedex12
 *
 * @package Armenio\Shipping\Correios
 */
class Sedex12 extends Correios
{
    /**
     * @var string
     */
    protected $serviceCode = '04782';

    /**
     * @param array $options
     *
     * @return Sedex12
     */
    public function setOptions($options = [])
    {
        $options['servico'] = $this->serviceCode;

        return parent::setOptions($options);
    }
}
