<?php

if (getenv('BONSAI_USERNAME') && getenv('BONSAI_PASSWORD')) {
    return array(
        'elasticsearch' => array(
            'cluster' => array(
                'connectionParams' => array(
                    'auth' => array(
                        getenv('BONSAI_USERNAME'),
                        getenv('BONSAI_PASSWORD'),
                        'Basic'
                    )
                )
            )
        )
    );
}

return array();
