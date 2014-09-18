<?php
namespace Application\Factory;

use Elasticsearch\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ElasticSearchClientFactory
 * @package Application\Factory
 */
class ElasticSearchClientFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Elasticsearch\Client
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Client(
            $serviceLocator->get('config')['elasticsearch']['cluster']
        );
    }
}
