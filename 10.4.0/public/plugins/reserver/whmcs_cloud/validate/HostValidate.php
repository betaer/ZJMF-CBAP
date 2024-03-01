<?php
namespace reserver\whmcs_cloud\validate;

use think\Validate;
use app\common\model\HostModel;

/**
 * @title 产品参数验证
 * @use  reserver\whmcs_cloud\validate\HostValidate
 */
class HostValidate extends Validate{

	protected $rule = [
		'id'  => 'require|integer|checkAuth:thinkphp',
	];

	protected $message  =   [
		'id.require' => 'res_whmcs_cloud_id_error',
		'id.integer' => 'res_whmcs_cloud_id_error',
		'id.checkAuth' => 'res_whmcs_cloud_host_not_found',
	];

	protected $scene = [
		'auth' 			=> ['id'],
	];

	public function checkAuth($hostId){
		$HostModel = HostModel::find($hostId);
		if(empty($HostModel)){
			return false;
		}
		// 前台用户验证
		$app = app('http')->getName();
        if($app == 'home'){
        	if($HostModel['client_id'] != get_client_id()){
        		return false;
        	}
        }
        return true;
	}
}