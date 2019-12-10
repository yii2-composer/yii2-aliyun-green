<?php


require dirname(__FILE__) . '/common.php';

$result = $sdk->textScan([
    [
        'dataId' => uniqid(),
        'content' => '123123123'
    ],
]);


var_dump(\liyifei\greencontent\cores\TextScan::isPassed($result));