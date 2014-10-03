<?php

return array(
    'elasticsearch' => array(
        'cluster' => array(
            'hosts'            => array(
                getenv('BONSAI_URL')
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
