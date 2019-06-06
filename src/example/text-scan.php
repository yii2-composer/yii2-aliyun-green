<?php


require dirname(__FILE__) . '/common.php';

$result = $sdk->textScan([
    [
        'dataId' => uniqid(),
        'content' => ' 测试的，不一样 毒品小姐 内容'
    ],
]);

print_r($result);