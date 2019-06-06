<?php


namespace liyifei\greencontent\cores;


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
}