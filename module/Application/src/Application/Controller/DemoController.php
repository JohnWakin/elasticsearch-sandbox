<?php
namespace Application\Controller;

use Application\Form\SearchForm;
use Application\Model\Entity\Search;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package Application\Controller
 */
class DemoController extends AbstractActionController
{
    public function indexAction()
    {
        $message      = '';
        $form         = new SearchForm();
        $searchEntity = new Search();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($searchEntity->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $searchEntity->exchangeArray($form->getData());

                try {
                    $searchEntity = $this->getServiceLocator()
                        ->get('application.service.elasticsearch')
                        ->search($searchEntity);
                } catch (\Exception $e) {
                    $this->getServiceLocator()
                        ->get('log.app')
                        ->emerg($e->getMessage());
                    $searchEntity->setResult(array('Error' => $e->getMessage()));
                }
            }
        }

        return new ViewModel(
            array(
                'form'         => $form,
                'searchEntity' => $searchEntity
            )
        );
    }
}
