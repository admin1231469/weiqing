<?php 
	global $_W,$_GPC;
	$op = isset($_GPC['op'])?$_GPC['op']:'list';
	


	
	//批量删除
	if(checksubmit('suborder')){
		
		if( empty( $_GPC['checkid'] ) ) message('请先选择数据');
		foreach ($_GPC['checkid'] as $v) {
			
			pdo_update('zofui_groupshop_user',array('verify'=>2),array('uniacid'=>$_W['uniacid'],'openid'=>$v));
			Util::deleteCache('fsuser',$v);
		}


		message('操作完成',referer(),'success');
	}
	
	
	
	if($op == 'list'){
		$where = array('uniacid'=>$_W['uniacid']);	

		if( $_GPC['status'] == 1 ) $where['verify'] = 1;

		$info = Util::getAllDataInSingleTable('zofui_groupshop_user',$where,$_GPC['page'],10,'`id` DESC');
		$list = $info[0];
		$pager = $info[1];

		if( !empty( $list ) ) {
			foreach ($list as &$v) {
				$v['params'] = iunserializer( $v['params'] );
			}
			unset( $v );
		}
		
	}
	
	
	if($op == 'pass'){
		
		pdo_update('zofui_groupshop_user',array('verify'=>2),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['id']));
		Util::deleteCache('fsuser',$_GPC['id']);

		message('操作完成',referer(),'success');
	}
	
	if($op == 'nopass'){
		
		pdo_update('zofui_groupshop_user',array('verify'=>0),array('uniacid'=>$_W['uniacid'],'openid'=>$_GPC['id']));
		Util::deleteCache('fsuser',$_GPC['id']);

		message('操作完成',referer(),'success');
	}
	
	
	include $this->template('web/user');