<?php 
	global $_W,$_GPC;
	$op = isset($_GPC['op'])?$_GPC['op']:'list';
	


	
	//批量删除
	if(checksubmit('delete')){
		$res = WebCommon::deleteDataInWeb($_GPC['checkid'],'zofui_groupshop_addorder');
		message('操作完成,成功删除'.$res[0].'项，失败'.$res[1].'项',referer(),'success');
	}
	
	
	
	if($op == 'list'){
		$where = array('uniacid'=>$_W['uniacid']);	

		if( $_GPC['status'] == 1 ) $where['status'] = 1;

		$info = Util::getAllDataInSingleTable('zofui_groupshop_addorder',$where,$_GPC['page'],10,'`id` DESC');
		$list = $info[0];
		$pager = $info[1];

		if( !empty( $list ) ) {
			foreach ($list as &$v) {
				$v['user'] = model_user::getSingleUser( $v['openid'] );
			}
		}

	}
	
	if($op == 'delete'){
		
		pdo_delete('zofui_groupshop_addorder',array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));
		message('删除成功',referer(),'success');
	}
	
	
	include $this->template('web/addorder');