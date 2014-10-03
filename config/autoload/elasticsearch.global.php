<?php

return array(
    'elasticsearch' => array(
        'cluster' => array(
            'hosts'            => array(
                getenv('ES_URL')
            )
        ),
        'indexes' => array(
            'demo' => array(
                'index'   => 'demo',
                'mapping' => array()
            )
        )
    )
);
