<?php
/**
 * Rafael Armenio <rafael.armenio@gmail.com>
 *
 * @link http://github.com/armenio for the source repository
 */
 
namespace Armenio\Shipping\Correios;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 *
 *
 * SedexNormalServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class SedexNormalServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating SedexNormal instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns SedexNormal
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sedexNormal = new SedexNormal();
        return $sedexNormal;
    }
}
