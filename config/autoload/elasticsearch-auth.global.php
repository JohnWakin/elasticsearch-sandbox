<?php

if (getenv('ES_USERNAME') && getenv('ES_PASSWORD')) {
    return array(
        'elasticsearch' => array(
            'cluster' => array(
                'connectionParams' => array(
                    'auth' => array(
                        getenv('ES_USERNAME'),
                        getenv('ES_PASSWORD'),
                        'Basic'
                    )
                )
            )
        )
    );
}

return array();
