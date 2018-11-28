<?php
/**
 * 配置文件
 */
$consoleDir = '/console-admin/public';
return [
	'root' => '',
	
	'console-admin-url' => $consoleDir.'/admin/public/doAdminLogin',
	'admin_type' => 1,
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
	'change_url' => '/main-admin/public/',
    'rider_status_html' => array(
        '1'  => '启用中',
        '2'  => '调度中',
        '3'  => '休息中',
        '4'  => '停用中',
    ),
    'user_admin_type' => array(
        '总控台角色'  => '1',
        '调度台角色'  => '2',
    ),
    'user_type' => array(
        'admin'  => '1',
        '普通管理员'  => '2',
        '调度台管理员'  => '3',
        '骑手'  => '4',
    ),
    'CLIENT_IP' => '47.96.164.241',
    'redis-ip' => '127.0.0.1',
    'commission_model' => array(
    	'1' => '比例分成',
    	'2' => '固定金额',
    	'3' => '比例分成+固定金额',
    ),
    'main-url' => 'main-admin',
    'console-url' => 'console-admin',
];
