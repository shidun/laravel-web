<?php
$mainDir = '/main-admin/public';
return [
    'root' => '',
    'root_url' => '/console-admin/public',
    'main-admin-url' => $mainDir,
    'main-admin-login-url' => $mainDir.'/admin/public/login',
    'redis-ip' => '127.0.0.1',
    'admin_type' => 2,
    'super_admin_id' => 7,
    'waybill_limit' => 20,
    'rider_limit' => 10,
    'ToBeAssigned' => 1, //待指派
    'ToBeArrived'  => 2, //待到店
    'ToBeTaked'    => 3, //待取餐
    'ToBeSend'     => 4, //待送达
    'Finished'     => 5, //已完成
    'Canceled'     => 6, //已取消
    'assessment'   => 3600,  //考核时间
    'waybillStatus' => [
        '1' => '待指派',
        '2' => '待到店',
        '3' => '待取餐',
        '4' => '待送达',
        '5' => '已完成',
        '6' => '取消运单'
    ],
    'operationLog' => [
        '1' => '下单',
        '2' => '接单',
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
    'correspondStatus' => [
        '1' => '4',
        '2' => '5',
        '3' => '6',
        '4' => '7',
    ],
	'examination_time' => 3600,
	'pages' => 20,
	'waybill_limit' => 20,
	'sex' => array(
		'1' => '男士',
		'2' => '女士'
	),
	'is_reassign' => array(
		'未改派' => 1,
		'被改派' => 2,
	),
	'waybill_time' => array(
		array(
			'id' => 1,
			'name' => '及时运单'
		),
    	array(
    		'id' => 2,
    		'name' => '超时运单'
    	),
    	array(
    		'id' => 3,
    		'name' => '取消运单'
    	),
	),
	//运单的状态
	'waybill_log_status' => array(
		'1'  => '下单',
		'2'  => '商户接单',
		'3'  => '呼单',
		'4'  => '派单',
		'5'  => '骑手到店',
		'6'  => '取餐',
		'7'  => '送达',
		'8'  => '用户取消',
		'9'  => '商家取消',
		'10' => '被改派'
	),
	'waybill_status' => array(
		'待指派'  => '1',
		'待到店'  => '2',
		'待取餐'  => '3',
		'待送达'  => '4',
		'已完成'  => '5',
		'取消运单'  => '6',
	),
    'user_type' => array(
        'admin'  => '1',
        '普通管理员'  => '2',
        '调度台管理员'  => '3',
        '骑手'  => '4',
    ),
    'user_admin_type' => array(
        '总控台角色'  => '1',
        '调度台角色'  => '2',
    ),
    'rider_status' => array(
        array(
            'id' => 1,
            'name' => '启用中'
        ),
        array(
            'id' => 2,
            'name' => '调度中'
        ),
        array(
            'id' => 3,
            'name' => '休息中'
        ),
        array(
            'id' => 4,
            'name' => '停用中'
        ),
    ),
    'rider_status_html' => array(
        '1'  => '启用中',
        '2'  => '调度中',
        '3'  => '休息中',
        '4'  => '停用中',
    ),
    'platform_type' => array(
        '1' => '美团',
        '2' => '饿了么'
    ),
    'SMS_CODE' => 'SMS_149420570',
    'testData_url' => false,
];
