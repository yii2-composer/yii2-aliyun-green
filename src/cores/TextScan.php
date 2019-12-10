<?php


namespace liyifei\greencontent\cores;


use yii\helpers\ArrayHelper;

class TextScan
{
    // 是否通过
    public static function isPassed($responses)
    {
        $data = [];
        if ($responses) {
            foreach ($responses as $response) {
                $data[$response->dataId] = true;
                if ($response->code == 200) {
                    foreach ($response->results as $result) {
                        if ($result->suggestion !== 'pass') {
                            $data[$response->dataId] = false;
                            break;
                        }
                    }
                } else {
                    $data[$response->dataId] = false;
                }
            }
        }
        return $data;
    }

    public static function unpassedLabels($responses)
    {
        $labels = [];

        foreach ($responses as $response) {
            if ($response->code == 200) {
                foreach ($response->results as $result) {
                    if ($result->details) {
                        $labels = array_merge($labels, ArrayHelper::getColumn($result->details, 'label'));
                    }
                }
            }
        }

        return $labels;
    }
}