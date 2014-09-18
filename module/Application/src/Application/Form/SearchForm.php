<?php
namespace Application\Form;

use Zend\Form\Form;

/**
 * Class SearchForm
 * @package Application\Form
 */
class SearchForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('search');

        $this->add(
            array(
                'name'       => 'index',
                'type'       => 'Text',
                'options'    => array(
                    'label' => 'Index',
                ),
                'attributes' => array(
                    'class'    => 'form-control',
                    'value'    => 'demo',
                    'readonly' => true
                )
            )
        );

        $this->add(
            array(
                'name'       => 'query',
                'type'       => 'Textarea',
                'options'    => array(
                    'label' => 'Query body (json)',
                ),
                'attributes' => array(
                    'value' => '{ "query": { "match_all":{} }}',
                    'class' => 'form-control',
                    'rows'  => 20,
                )
            )
        );

        $this->add(
            array(
                'name'       => 'submit',
                'type'       => 'Submit',
                'attributes' => array(
                    'value' => 'Search',
                    'id'    => 'submitbutton',
                    'class' => 'btn btn-success'
                ),
            )
        );
    }
}
