<?php
// 对接你的数据库
return array(
	'mysql' => array(
		//数据库地址
		'MYSQL_HOST' => '127.0.0.1', 
		//数据库端口一般是3306
		'MYSQL_PORT' => '3306',    
		//数据库用户名 
		'MYSQL_USER' => 'mima',  
		//数据库密码    
		'MYSQL_PASS' => 'mima', 
		//数据库表名         
		'MYSQL_DB'   => 'mima',  
		//数据库编码，一般utf8即可 
		'MYSQL_CHARSET' => 'utf8',  
	),
	'config' => array(
		//调试模式
		'DEBUG' => 'false',
	),
);
?>