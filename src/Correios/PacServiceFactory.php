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
 * PacServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class PacServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating Pac instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns Pac
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $pac = new Pac();
        return $pac;
    }
}
