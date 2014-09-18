<?php
namespace ApplicationTest\Service;

use Application\Model\Entity\Search;
use Application\Service\ElasticSearch;

class ElasticSearchTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var ElasticSearch
     */
    protected $service;

    protected function _before()
    {
        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceLocator->shouldReceive('get')
            ->with('elasticsearch')
            ->andReturn(\Mockery::self());

        $serviceLocator->shouldReceive('search')
            ->with(
                array(
                    'index' => 'test-index',
                    'body'  => 'test-query'
                )
            )
            ->andReturn(
                array('test-response', 'test-data')
            );

        $this->service = new ElasticSearch($serviceLocator);
    }

    protected function _after()
    {
    }

    public function testInstance()
    {
        $this->assertInstanceOf('Application\Service\ElasticSearch',
            $this->service
        );
    }

    public function testSearch()
    {
        $entity = new Search();
        $entity->setIndex('test-index');
        $entity->setQuery('test-query');

        $expected = (new Search())
            ->setIndex('test-index')
            ->setQuery('test-query')
            ->setResult(array('test-response', 'test-data'));

        $this->assertEquals($expected, $this->service->search($entity));
    }
}
