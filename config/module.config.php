<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'Armenio\Shipping\Correios\Pac' => 'Armenio\Shipping\Correios\PacServiceFactory',
            'Armenio\Shipping\Correios\Sedex10' => 'Armenio\Shipping\Correios\Sedex10ServiceFactory',
            'Armenio\Shipping\Correios\SedexACobrar' => 'Armenio\Shipping\Correios\SedexACobrarServiceFactory',
            'Armenio\Shipping\Correios\SedexHoje' => 'Armenio\Shipping\Correios\SedexHojeServiceFactory',
            'Armenio\Shipping\Correios\SedexNormal' => 'Armenio\Shipping\Correios\SedexNormalServiceFactory',
        ),
    ),    
);
