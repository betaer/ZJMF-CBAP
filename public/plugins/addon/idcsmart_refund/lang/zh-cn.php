<?php

return [
    'success_message' => '请求成功',
    'fail_message' => '请求失败',
    'param_error' => '参数错误',
    'delete_success' => '删除成功',
    'delete_fail' => '删除失败',
    'cannot_repeat_opreate' => '不可重复操作',
    'client_is_not_exist' => '客户不存在',
    'id_error' => 'ID错误',
    'refund_suspend' => '停用',
    'refund_pending' => '待审核',
    'refund_suspending' => '待停用',
    'refund_suspend_1' => '停用中',
    'refund_suspended' => '已停用',
    'refund_refund' => '已退款',
    'refund_reject' => '已驳回',
    'refund_cancelled' => '已取消',
    'refund_cancelled_button' => '取消停用',
    'refund_reject_reason' => '驳回原因',
    'refund_product_id_require' => '请选择商品ID',
    'refund_product_id_integer' => '商品ID为整数',
    'refund_type_require' => '请选择退款类型',
    'refund_type_in' => '退款类型取值为Artificial或Auto',
    'refund_require_in' => '退款要求取值为First或Same',
    'refund_range_control_require' => '购买天数控制必填',
    'refund_range_control_in' => '购买天数控制取值为0或1',
    'refund_range_require' => '购买天数必填',
    'refund_range_integer' => '购买天数为整数',
    'refund_range_egt' => '购买天数为大于等于0的整数',
    'refund_rule_require' => '请选择退款规则',
    'refund_rule_in' => '退款规则取值为Day,Month或Ratio',
    'refund_ratio_value_float' => '比例为浮点数',
    'refund_ratio_value_egt' => '比例大于等于0',
    'refund_ratio_value_elt' => '比例小于等于100',
    'refund_product_is_not_exist' => '商品不存在',
    'refund_rule_only_day_or_month' => '退款规则取值仅为Day或Month',
    'refund_rule_only_ratio' => '退款规则取值仅为Ratio',
    'refund_ratio_require' => '比例必填',
    'refund_refund_product_is_not_exist' => '退款商品不存在',
    'refund_refund_product_is_exist' => '商品已添加至退款商品,不可重复添加',
    'refund_reason_content_require' => '请填写停用原因内容',
    'refund_reason_content_max' => '内容长度不超过500个字符',
    'refund_refund_reason_is_not_exist' => '停用原因不存在',
    'refund_reason_custom_require' => '停用原因自定义是否开启必填',
    'refund_reason_custom_in' => '停用原因自定义是否开启取值为0或1',
    'refund_host_is_not_exist' => '产品不存在',
    'refund_host_cannot_suspend' => '产品不可停用',
    'refund_suspend_reason_max' => '产品停用原因不超过500个字符',
    'refund_suspend_reason_array' => '产品停用原因为数组',
    'refund_suspend_reason_is_not_exist' => '产品停用原因不存在',
    'refund_suspend_reason_require' => '请选择产品停用原因',
    'refund_refund_is_not_exist' => '停用申请不存在',
    'refund_refund_only_pending' => '停用申请仅待审核状态可操作',
    'refund_reject_reason_require' => '请填写驳回原因',
    'refund_reject_reason_max' => '驳回原因不超过2000个字符',
    'refund_refund_only_pending_or_suspending' => '停用申请仅待审核或待停用可操作',
    'refund_refund_type_in' => '停用时间为Expire或Immediate',
    'refund_product_pay_type_free' => '免费商品不可添加为退款商品',
    'refund_product_refunded' => '产品已申请停用,不可再次申请',
    # 日志
    'refund_create_refund_product' => '{admin}新增可退款商品:{product}',
    'refund_update_refund_product' => '{admin}修改可退款商品:{product}',
    'refund_delete_refund_product' => '{admin}删除可退款商品:{product}',
    'refund_create_refund_reason' => '{admin}新增退款原因:{reason}',
    'refund_update_refund_reason' => '{admin}修改退款原因:{reason}',
    'refund_delete_refund_reason' => '{admin}删除退款原因:{reason}',
    'refund_stop_refund_reason_custom' => '{admin}关闭用户自定义退款原因',
    'refund_start_refund_reason_custom' => '{admin}开启用户自定义退款原因',
    'refund_pending_refund_product' => '{admin}通过用户:{client}的停用申请,退还用户:{currency_prefix}{amount}{currency_suffix}',
    'refund_reject_refund_product' => '{admin}驳回用户:{client}的停用申请,驳回原因:{reason}',
    'refund_cancel_refund_product' => '{admin}取消用户:{client}的停用申请',
    'refund_refund_host' => '{client}停用产品:{host},退款金额:{currency_prefix}{amount}{currency_suffix}',

    # 导航
    'nav_plugin_addon_idcsmart_refund' => '退款',
    'nav_plugin_addon_refund' => '退款',
    'nav_plugin_addon_refund_list' => '停用列表',
    'nav_plugin_addon_refund_product_list' => '商品管理',

];
