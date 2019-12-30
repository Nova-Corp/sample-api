<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Tuupola\\Middleware\\' => array($vendorDir . '/tuupola/cors-middleware/src'),
    'Tuupola\\' => array($vendorDir . '/tuupola/base62/src'),
    'Slim\\Middleware\\' => array($vendorDir . '/tuupola/slim-basic-auth/src', $vendorDir . '/tuupola/slim-jwt-auth/src'),
    'Slim\\' => array($vendorDir . '/slim/slim/Slim'),
    'Psr\\Log\\' => array($vendorDir . '/psr/log/Psr/Log'),
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-message/src'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Neomerx\\Cors\\' => array($vendorDir . '/neomerx/cors-psr7/src'),
    'Firebase\\JWT\\' => array($vendorDir . '/firebase/php-jwt/src'),
    'FastRoute\\' => array($vendorDir . '/nikic/fast-route/src'),
);