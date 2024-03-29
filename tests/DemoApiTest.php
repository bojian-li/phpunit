<?php
/**
 * RoommateApiTest.php
 *
 * @author libojian <bojian.li@foxmail.com>
 * @since 2022/11/26 7:53 PM
 * @version 0.1
 */

namespace Bojian\Phpunit\tests;


use Bojian\Phpunit\BaseApi;

class DemoApiTest extends BaseApi
{
    protected $writeRout = true;

    /**
     * get请求
     * @return void
     */
    public function testGetConfig()
    {
        $params = [
            'city_id' =>[
                'value' => 7,
                'description' => '城市Id',
            ],
        ];

        $result = $this->get('api/roommate/getConfig', $this->setApiParam($params));
        $this->assertSame(0, $result['error_code'] ?? 1);
        $reqState = $this->sendApiDocsFile($params, 'docs');
        $respState = $this->sendApiDocsFile($result);

        echo 'sendApiDocsFileState：' . json_encode([$reqState, $respState]);
    }

    /**
     * post请求
     * @return void
     */
    public function testCreate()
    {
        $params = [
            'school_id' =>[
                'value' => 7,
                'description' => '学校Id',
            ],
            'unit_id' =>[
                'value' => 2269,
                'description' => '户型Id',
            ],
            'unit_name' =>[
                'value' => 'Classic En-Suite',
                'description' => '户型名称',
            ],
            'expectations' =>  [
                'value' => '发个广告2',
                'description' => '对室友期望',
            ],

        ];

        $result = $this->post('roommate/create', $this->setApiParam($params));
        $this->assertSame(0, $result['error_code'] ?? 1);
        $reqState = $this->sendApiDocsFile($params, 'docs');
        $respState = $this->sendApiDocsFile($result);

        echo 'sendApiDocsFileState：' . json_encode([$reqState, $respState]);
    }
}
