<?php
namespace Application\Model\Entity;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Callback;

/**
 * Class Search
 * @package Application\Model
 */
class Search implements InputFilterAwareInterface
{

    /**
     * @var string
     */
    protected $index = '';

    /**
     * @var string
     */
    protected $query = '';

    /**
     * @var array
     */
    protected $result = array();

    /**
     * @var InputFilter
     */
    protected $inputFilter;

    /**
     * @param array $data
     * @return Search
     */
    public function exchangeArray(array $data)
    {
        (!isset($data['index'])) ?: $this->setIndex($data['index']);
        (!isset($data['query'])) ?: $this->setQuery($data['query']);
        (!isset($data['result'])) ?: $this->setResult($data['result']);

        return $this;
    }

    /**
     * @param InputFilterInterface $inputFilter
     * @return void|InputFilterAwareInterface
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
     * @return InputFilter|InputFilterInterface
     */
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(
                array(
                    'name'       => 'index',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min'      => 3,
                                'max'      => 16,
                            ),
                        ),
                    ),
                )
            );

            $inputFilter->add(
                array(
                    'name'       => 'query',
                    'required'   => true,
                    'filters'    => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 5000,
                            ),
                        ),
                        array(
                            'name'    => 'Callback',
                            'options' => array(
                                'message'  => array(
                                    Callback::INVALID_VALUE => 'Not valid json'
                                ),
                                'callback' => function ($value, $context = array()) {
                                    json_decode($value);

                                    return (json_last_error() == JSON_ERROR_NONE);
                                }
                            ),
                        ),
                    ),
                )
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    /**
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param string $index
     *
     * @return Search
     */
    public function setIndex($index)
    {
        $this->index = (string)$index;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return Search
     */
    public function setQuery($query)
    {
        $this->query = (string)$query;

        return $this;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param array $result
     *
     * @return Search
     */
    public function setResult(array $result)
    {
        $this->result = $result;

        return $this;
    }
}
