<?php

/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\Correios;

/**
 * Class SedexNormal
 *
 * @package Armenio\Shipping\Correios
 */
class SedexNormal extends Correios
{
    /**
     * @var string
     */
    protected $serviceCode = '04014';

    /**
     * @param array $options
     *
     * @return SedexNormal
     */
    public function setOptions($options = [])
    {
        if (empty($options['servico'])) {
            $options['servico'] = $this->serviceCode;
        }

        return parent::setOptions($options);
    }
}
