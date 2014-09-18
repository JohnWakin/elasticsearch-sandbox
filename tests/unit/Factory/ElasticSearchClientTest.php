<?php
namespace ApplicationTest\Factory;


use Application\Factory\ElasticSearchClientFactory;

class ElasticSearchClientTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testCreateService()
    {
        $serviceLocator = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceLocator->shouldReceive('get')
            ->with('config')
            ->andReturn(
                array(
                    'elasticsearch' => array(
                        'cluster' => array(
                            'hosts' => array(
                                'localhost'
                            )
                        )
                    )
                )
            );

        $this->assertInstanceOf('Elasticsearch\Client',
            (new ElasticSearchClientFactory())
                ->createService($serviceLocator)
        );
    }

}
