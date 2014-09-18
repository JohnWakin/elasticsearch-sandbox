<?php
namespace Application\Service;

use Application\Model\Entity\Search as SearchEntity;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ElasticSearch
 * @package Application\Service
 */
class ElasticSearch
{

    /**
     * @var ServiceLocatorInterface
     */
    private $sm;

    public function __construct(ServiceLocatorInterface $sm)
    {
        $this->sm = $sm;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceManager()
    {
        return $this->sm;
    }

    /**
     * @param SearchEntity $searchEntity
     * @return SearchEntity
     */
    public function search(SearchEntity $searchEntity)
    {
        $searchEntity->setResult(
            $this->getServiceManager()
                ->get('elasticsearch')
                ->search(
                    array(
                        'index' => $searchEntity->getIndex(),
                        'body'  => $searchEntity->getQuery()
                    )
                )
        );

        return $searchEntity;
    }
}
