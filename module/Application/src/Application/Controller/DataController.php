<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class DataController
 * @package Application\Controller
 */
class DataController extends AbstractActionController
{
    public function loadAction()
    {
        $response = array();
        $accounts = $this->getServiceLocator()->get('config')['data']['dummy']['accounts'];

        // drop index if exists
        try {
            $this->getServiceLocator()
                ->get('elasticsearch')
                ->indices()
                ->delete(
                    array(
                        'index' => $this->getServiceLocator()->get('config')['elasticsearch']['indexes']['demo']['index']
                    )
                );
        } catch (\Exception $e) {
            $this->getServiceLocator()
                ->get('log.app')
                ->emerg($e->getCode() . ': ' . $e->getMessage());
        }

        // create index
        $this->getServiceLocator()
            ->get('elasticsearch')
            ->indices()
            ->create(
                array(
                    'index' => $this->getServiceLocator()->get('config')['elasticsearch']['indexes']['demo']['index']
                )
            );

        // load data in
        foreach ($accounts as $account) {
            $account = json_decode(file_get_contents($account), true);

            $response[] = $this->getServiceLocator()
                ->get('elasticsearch')
                ->index(
                    array(
                        'index' => 'demo',
                        'type'  => 'internal',
                        'id'    => $account['guid'],
                        'body'  => $account
                    )
                );

        }

        return json_encode(
            array(
                'response' => $response
            )
        );
    }
}
