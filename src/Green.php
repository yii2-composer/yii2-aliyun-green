<?php


namespace liyifei\greencontent;


use Aliyun\Core\Config;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use liyifei\greencontent\requests\TextScanRequest;
use yii\base\Component;
use yii\base\Exception;

class Green extends Component
{
    public $accessKeyId;

    public $accessKeySecret;

    public $regionId;

    private $_client;

    public function init()
    {
        Config::load();
        $iClientProfile = DefaultProfile::getProfile($this->regionId, $this->accessKeyId, $this->accessKeySecret);
        $this->_client = new DefaultAcsClient($iClientProfile);
        parent::init();
    }

    /**
     * @desc 文本扫描
     * @param $tasks
     * @return mixed
     * @throws Exception
     */
    public function textScan($tasks)
    {
        $request = new TextScanRequest();
        $request->setMethod('POST');
        $request->setAcceptFormat('JSON');

        $request->setContent(json_encode([
            'tasks' => $tasks,
            'scenes' => 'antispam'
        ]));

        $response = $this->_client->getAcsResponse($request);

        if ($response->code !== 200) {
            throw new Exception($response->msg);
        }

        return $response->data;
    }
}