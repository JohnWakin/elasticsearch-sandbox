<?php
namespace ApplicationTest\Model\Entity;

use Application\Model\Entity\Search;

class SearchEntityTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Search
     */
    protected $entity;

    protected function _before()
    {
        $this->entity = new Search();
    }

    protected function _after()
    {
    }

    public function testInstance()
    {
        $this->assertInstanceOf('Application\Model\Entity\Search',
            $this->entity
        );
    }

    public function testExchangeArrayEmpty()
    {
        $this->assertInstanceOf('Application\Model\Entity\Search', $this->entity->exchangeArray(array()));

        $this->assertTrue(is_string($this->entity->getIndex()));
        $this->assertTrue(is_string($this->entity->getQuery()));
        $this->assertTrue(is_array($this->entity->getResult()));

        $this->assertEmpty($this->entity->getIndex());
        $this->assertEmpty($this->entity->getQuery());
        $this->assertEmpty($this->entity->getResult());
    }

    public function testExchangeArray()
    {
        $data = array(
            'index'  => 'test-index',
            'query'  => 'test-query',
            'result' => array('test-result'),
        );

        $this->assertInstanceOf('Application\Model\Entity\Search', $this->entity->exchangeArray($data));

        $this->assertTrue(is_string($this->entity->getIndex()));
        $this->assertTrue(is_string($this->entity->getQuery()));
        $this->assertTrue(is_array($this->entity->getResult()));

        $this->assertEquals($data['index'], $this->entity->getIndex());
        $this->assertEquals($data['query'], $this->entity->getQuery());
        $this->assertEquals($data['result'], $this->entity->getResult());
    }

    public function testGetInputFilter()
    {
        $this->assertInstanceOf('Zend\InputFilter\InputFilter', $this->entity->getInputFilter());
        $this->assertEquals(2, $this->entity->getInputFilter()->count());
    }

    public function testValidationSuccessful()
    {
        $data = array(
            'index'  => 'test-index',
            'query'  => json_encode(array('name' => 'value'))
        );

        $this->assertInstanceOf('Application\Model\Entity\Search', $this->entity->exchangeArray($data));

        $this->assertTrue($this->entity->isValid());

        $this->assertEmpty($this->entity->getErrorMessages()['errors']);
    }

    public function testValidationFailure()
    {
        $data = array(
            'index'  => '',
            'query'  => ''
        );

        $this->assertInstanceOf('Application\Model\Entity\Search', $this->entity->exchangeArray($data));

        $this->assertFalse($this->entity->isValid());
        $this->assertNotEmpty($this->entity->getErrorMessages());
        $this->assertEquals(2, count($this->entity->getErrorMessages()['errors']));
    }
}
