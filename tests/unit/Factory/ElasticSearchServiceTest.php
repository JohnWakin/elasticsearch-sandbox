<?php
namespace ApplicationTest\Factory;


use Application\Factory\ElasticSearchServiceFactory;

class ElasticSearchServiceTest extends \Codeception\TestCase\Test
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
        $this->assertInstanceOf('Application\Service\ElasticSearch',
            (new ElasticSearchServiceFactory())
                ->createService(
                    \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface')
                )
        );
    }

}
