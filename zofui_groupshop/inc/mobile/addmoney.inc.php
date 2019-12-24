<?php
	global $_W,$_GPC;
	$userinfo = model_user::initUserInfo(); //用户信息
	
	if( checksubmit('add') ){

		$money = sprintf('%.2f',$_GPC['money']);
		if( $money*1 <= 0 ){
			message('充值金额必须大于0','refresh','error');
		}
		
		$orderid = createOrderId($userinfo['id']);
		
		$givemoney = 0;
		$give = iunserializer( $this->module['config']['addparams'] );
		if( !empty( $give ) && is_array( $give ) ) {
			$givearr = array();
			foreach ($give as $v) {
				if( $money >= $v['num'] ){
					$givearr[] = $v['give']*1;
				}
			}
			$givemoney = @max( $givearr );
		}

		$data = array(
			'uniacid' => $_W['uniacid'],
			'userid' => $userinfo['id'],
			'openid' => $userinfo['openid'],
			'orderid' => $orderid,
			'totalmoney' => $money,
			'givemoney' => $givemoney,
			'status' => 0,
			'createtime' => time(),
		);
		
		$res = pdo_insert('zofui_groupshop_addorder',$data);
		
		if($res){
			$params = returnPay($orderid,$money,'充值余额');
			//$params['ttttt'] = 'addmoney';
			$mine = array('sendpay'=>0);

			$this->pay($params,$mine);
		}

	}else{

		$give = iunserializer( $this->module['config']['addparams'] );
		
		$initParams = array(
			'op' => $_GPC['op'],
			'sharedata' => array(
				'title' => '充值',
				'desc' => '充值',
				'link' => '',
				'imgUrl' => tomedia($this->module['config']['sharepic'])
			)
		);
		$title = '充值';
		
		include $this->template('addmoney');
	}
	


	//生成订单号,gid商品id
	function createOrderId($uid){
		return date("YmdHis") . $_W['uniacid'] .$uid . rand(10000,99999);
	}
	
	function returnPay($orderid,$fee,$title){
		global $_W;
		$params['tid'] = $orderid;
		$params['user'] = $_W['openid'];
		$params['fee'] = $fee;
		$params['title'] = cutstr($title,40, false);
		$params['ordersn'] = $orderid;
		$params['module'] = "zofui_groupshop";		
		return $params;
	}

