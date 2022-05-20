<?php

return [
    'except' => ['_debugbar.*', 'larecipe.*', 'horizon.*'],
    'groups' => [
        'admin' => ['admin.*'],
        'front' => ['front.*'],
        'supervisor' => ['supervisor.*'],
    ],
];
