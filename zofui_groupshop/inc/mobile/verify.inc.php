<?php
	global $_W,$_GPC;
	$userinfo = model_user::initUserInfo(); //用户信息
	$_GPC['do'] = 'verify';
	
	
	
	
	$initParams = array(
		'do' => 'verify',
		'orderid' => $order['orderid'],
		'sharedata' => array(
			'title' => $this->module['config']['sharetitle'],
			'desc' => $this->module['config']['sharedesc'],
			'link' => '',
			'imgUrl' => tomedia($this->module['config']['sharepic'])
		)		
	);	
	$title = '提交验证';
	
	
	include $this->template('verify');