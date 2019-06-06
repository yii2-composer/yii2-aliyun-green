<?php

$path = dirname(__FILE__);

require_once $path . '/../../vendor/autoload.php';
require_once($path . '/../../vendor/yiisoft/yii2/Yii.php');
@(Yii::$app->charset = 'UTF-8');

$config = json_decode(file_get_contents($path . '/config'), true);

$sdk = new \liyifei\greencontent\Green([
    'accessKeyId' => $config['ak'],
    'accessKeySecret' => $config['sk'],
    'regionId' => $config['r'],
]);