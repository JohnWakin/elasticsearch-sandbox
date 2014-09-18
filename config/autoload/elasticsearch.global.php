<?php

return array(
    'elasticsearch' => array(
        'cluster' => array(
            'hosts'            => array(
                getenv('BONSAI_URL')
            ),
            'connectionParams' => array(
                'auth' => array(
                    getenv('BONSAI_USERNAME'),
                    getenv('BONSAI_PASSWORD'),
                    'Basic'
                )
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
