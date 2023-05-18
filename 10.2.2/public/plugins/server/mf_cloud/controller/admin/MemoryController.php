<?php
namespace server\mf_cloud\controller\admin;

use server\mf_cloud\model\OptionModel;
use server\mf_cloud\validate\MemoryValidate;

/**
 * @title 魔方云(自定义配置)-内存配置
 * @desc 魔方云(自定义配置)-内存配置
 * @use server\mf_cloud\controller\admin\MemoryController
 */
class MemoryController{

	/**
	 * 时间 2023-01-31
	 * @title 添加内存配置
	 * @desc 添加内存配置
	 * @url /admin/v1/mf_cloud/memory
	 * @method  POST
	 * @author hh
	 * @version v1
     * @param   int product_id - 商品ID require
     * @param   string type - 配置方式(radio=单选,step=阶梯,total=总量) require
     * @param   int value - 内存(GB) requireIf,type=radio
     * @param   int min_value - 最小值
     * @param   int max_value - 最大值
     * @param   int step - 步长
     * @param   object price - 周期价格(如{"5":"12"},5是周期ID,12是价格) require
     * @return  int id - 通用配置ID
	 */
	public function create(){
		$param = request()->param();

		$MemoryValidate = new MemoryValidate();
		if (!$MemoryValidate->scene('create')->check($param)){
            return json(['status' => 400 , 'msg' => lang_plugins($MemoryValidate->getError())]);
        }
        $param['rel_type'] = OptionModel::MEMORY;

		$OptionModel = new OptionModel();

		$result = $OptionModel->optionCreate($param);
		return json($result);
	}

	/**
	 * 时间 2023-01-31
	 * @title 内存配置列表
	 * @desc 内存配置列表
	 * @url /admin/v1/mf_cloud/memory
	 * @method  GET
	 * @author hh
	 * @version v1
     * @param   int page - 页数
     * @param   int limit - 每页条数
     * @param   int product_id - 商品ID
     * @return  array list - 列表数据
     * @return  int list[].id - 通用配置ID
     * @return  string list[].type - 配置方式(radio=单选,step=阶梯,total=总量)
     * @return  int list[].value - 内存
     * @return  int list[].min_value - 最小值
     * @return  int list[].max_value - 最大值
     * @return  string list[].price - 价格
     * @return  string list[].duration - 周期
     * @return  int count - 总条数
	 */
	public function list(){
		$param = request()->param();

		$param['rel_type'] = OptionModel::MEMORY;
        $param['rel_id'] = 0;
        $param['orderby'] = 'value,min_value';
        $param['sort'] = 'asc';

        $field = 'id,type,value,min_value,max_value';

		$OptionModel = new OptionModel();

		$data = $OptionModel->optionList($param, $field);

		$result = [
			'status' => 200,
			'msg'    => lang_plugins('message_success'),
			'data'	 => $data,
		];
		return json($result);
	}

	/**
	 * 时间 2023-01-31
	 * @title 修改内存配置
	 * @desc 修改内存配置
	 * @url /admin/v1/mf_cloud/memory/:id
	 * @method  PUT
	 * @author hh
	 * @version v1
     * @param   int id - 通用配置ID require
     * @param   int value - 内存(GB)
     * @param   int min_value - 最小值
     * @param   int max_value - 最大值
     * @param   int step - 步长
     * @param   object price - 周期价格(如{"5":"12"},5是周期ID,12是价格) require
	 */
	public function update(){
		$param = request()->param();

		$MemoryValidate = new MemoryValidate();
		if (!$MemoryValidate->scene('update')->check($param)){
            return json(['status' => 400 , 'msg' => lang_plugins($MemoryValidate->getError())]);
        }        
		$OptionModel = new OptionModel();

		$result = $OptionModel->optionUpdate($param);
		return json($result);
	}

	/**
	 * 时间 2023-01-31
	 * @title 删除内存配置
	 * @desc 删除内存配置
	 * @url /admin/v1/mf_cloud/memory/:id
	 * @method  DELETE
	 * @author hh
	 * @version v1
	 * @param   int id - 内存配置ID require
	 */
	public function delete(){
		$param = request()->param();

		$OptionModel = new OptionModel();

		$result = $OptionModel->optionDelete((int)$param['id'], OptionModel::MEMORY);
		return json($result);
	}

	/**
	 * 时间 2023-01-31
	 * @title 内存配置详情
	 * @desc 内存配置详情
	 * @url /admin/v1/mf_cloud/memory/:id
	 * @method  GET
	 * @author hh
	 * @version v1
     * @param   int id - 配置ID require
     * @return  int id - 配置ID
     * @return  string type - 配置方式(radio=单选,step=阶梯,total=总量)
     * @return  int value - 内存
     * @return  int min_value - 最小值
     * @return  int max_value - 最大值
     * @return  int step - 最小变化值
     * @return  int duration[].id - 周期ID
     * @return  string duration[].name - 周期名称
     * @return  string duration[].price - 价格
	 */
	public function index(){
		$param = request()->param();

		$OptionModel = new OptionModel();

		$data = $OptionModel->memoryIndex((int)$param['id']);

		$result = [
			'status' => 200,
			'msg'    => lang_plugins('message_success'),
			'data'	 => $data,
		];
		return json($result);
	}



}