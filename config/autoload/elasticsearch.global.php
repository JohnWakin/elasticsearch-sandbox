<?php

$hosts = array();
if (getenv('ES_URL')) {
    $hosts = array(
        getenv('ES_URL')
    );
}

return array(
    'elasticsearch' => array(
        'cluster' => array(
            'hosts' => $hosts
        ),
        'indexes' => array(
            'demo' => array(
                'index'   => 'demo',
                'mapping' => array()
            )
        )
    )
);
