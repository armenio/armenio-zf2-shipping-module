<?php

/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\Correios;

/**
 * Class Pac
 *
 * @package Armenio\Shipping\Correios
 */
class Pac extends Correios
{
    /**
     * @var string
     */
    protected $serviceCode = '04510';

    /**
     * @param array $options
     *
     * @return Pac
     */
    public function setOptions($options = [])
    {
        $options['servico'] = $this->serviceCode;

        return parent::setOptions($options);
    }
}
