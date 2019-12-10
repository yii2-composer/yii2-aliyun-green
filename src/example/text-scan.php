<?php


require dirname(__FILE__) . '/common.php';

$result = $sdk->textScan([
    [
        'dataId' => uniqid(),
        'content' => ' 测试的，庆丰包子不一样 毒品 冰毒小姐 内容'
    ],
]);


var_dump(\liyifei\greencontent\cores\TextScan::unpassedLabels($result));