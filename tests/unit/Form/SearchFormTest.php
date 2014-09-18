<?php
namespace ApplicationTest\Form;

use Application\Form\SearchForm;

class SearchFormTest extends \Codeception\TestCase\Test
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

    public function testForm()
    {
        $form = new SearchForm();

        $this->assertInstanceOf('Application\Form\SearchForm',
            $form
        );

        $this->assertCount(3, $form->getElements());
    }
}
