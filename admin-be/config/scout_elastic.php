<?php

return [
    'client' => [
        'hosts' => [
            env('SCOUT_ELASTIC_HOST', '15.185.78.54:6757'),
        ],
    ],
    'update_mapping' => env('SCOUT_ELASTIC_UPDATE_MAPPING', true),
    'indexer' => env('SCOUT_ELASTIC_INDEXER', 'single'),
    'document_refresh' => env('SCOUT_ELASTIC_DOCUMENT_REFRESH'),
];
