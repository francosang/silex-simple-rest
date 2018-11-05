<?php
require __DIR__ . '/prod.php';
$app['debug'] = true;
$app['log.level'] = Monolog\Logger::DEBUG;
$app['db.options'] = array(
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'id3431696_base_loca',
    'user'      => 'id3431696_base_loca_user',
    'password'  => 'base_loca_pass',
    'charset'   => 'utf8mb4',
);
