<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio
 */

namespace Armenio\Shipping\Correios;

use Armenio\Shipping\Correios;

/**
 * Class SedexHoje
 * @package Armenio\Shipping\Correios
 */
class SedexHoje extends Correios
{
    /**
     * @var string
     */
    protected $serviceCode = '04804';

    /**
     * @param array $options
     * @return SedexHoje
     */
    public function setOptions($options = [])
    {
        $options['servico'] = $this->serviceCode;

        return parent::setOptions($options);
    }
}
