<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/11 0011
 * Time: 14:39
 */
return [
    'auth_secret_key' => '159357',
    'iv'          => '1234567812345678',
    'assessment' => '3600', //考核时间
    'waybill_limit'=> 10,
    'cipher'      => 'aes-256-cbc',    //AES加密模式
    'openssl_key'=> '1234567812345678', //AES加密key
    'ToBeAssigned' => 1, //待指派
    'ToBeArrived'  => 2, //待到店
    'ToBeTaked'    => 3, //待取餐
    'ToBeSend'     => 4, //待送达
    'Finished'     => 5, //已完成
    'Canceled'     => 6, //已取消
    'NotAccepted' => 7, // 未接单
    'operationLog' => [
        '1' => '下单',
        '2' => '团队接单',
        '3' => '呼单',
        '4' => '指派',
        '5' => '到店',
        '6' => '取餐',
        '7' => '送达',
        '8' => '运单取消',
        '9' => '运单取消',
        '10' => '改派'
    ],
    'operationLogStatus' => [
        1,2,3,4,5,6,7,8,9,10
    ],
    'waybillStatus' => [
        '1' => '待指派',
        '2' => '待到店',
        '3' => '待取餐',
        '4' => '待送达',
        '5' => '已完成',
        '6' => '已取消'
    ],
    'correspondStatus' => [
        '2' => '5',
        '3' => '6',
        '4' => '7',
    ],
    'pi' => '3.14159265358979324',
    'radius' => 200,
	'redis-ip' => '127.0.0.1'

];