<?php
declare(strict_types=1);

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'jobiq',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : APP_ROOT . '/var/logs/app.log',
            'level' => Monolog\Logger::DEBUG,
        ]
    ],
];
