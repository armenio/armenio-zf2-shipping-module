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
 * SedexACobrarServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class SedexACobrarServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating SedexACobrar instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns SedexACobrar
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sedexACobrar = new SedexACobrar();
        return $sedexACobrar;
    }
}
