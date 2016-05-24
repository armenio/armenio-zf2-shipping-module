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
 * Sedex10ServiceFactory
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 *
 *
 */
class Sedex10ServiceFactory implements FactoryInterface
{
    /**
     * zend-servicemanager v2 factory for creating Sedex10 instance.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @returns Sedex10
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sedex10 = new Sedex10();
        return $sedex10;
    }
}
