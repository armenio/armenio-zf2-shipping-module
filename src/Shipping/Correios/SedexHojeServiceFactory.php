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
 * SedexHojeServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class SedexHojeServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating SedexHoje instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns SedexHoje
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sedexHoje = new SedexHoje();
        return $sedexHoje;
    }
}
