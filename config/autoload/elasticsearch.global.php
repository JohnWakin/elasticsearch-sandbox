<?php

$authentication = array();
if (getenv('BONSAI_USERNAME') && getenv('BONSAI_PASSWORD')) {
    $authentication = array(
        'auth' => array(
            getenv('BONSAI_USERNAME'),
            getenv('BONSAI_PASSWORD'),
            'Basic'
        )
    );
}

return array(
    'elasticsearch' => array(
        'cluster' => array(
            'hosts'            => array(
                getenv('BONSAI_URL')
            ),
            'connectionParams' => $authentication
        ),
        'indexes' => array(
            'demo' => array(
                'index'   => 'demo',
                'mapping' => array()
            )
        )
    )
);
