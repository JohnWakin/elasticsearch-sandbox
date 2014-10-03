<?php

return array(
    'log' => array(
        'log.app' => array(
            'writers' => array(
                array(
                    'name' => 'stream',
                    'priority' => 1000,
                    'options' => array(
                        'stream' => 'data/logs/app.log',
                    ),
                ),
            ),
        ),
    ),
);
