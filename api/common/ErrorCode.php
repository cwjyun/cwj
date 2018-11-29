<?php
namespace common;

class ErrorCode {
	//外部error code
	const SUCCEED = 0;
	
	/** 异常 */
	const ERROR = -1;

    /** 异常 */
    const ERROR2 = 1;
	
	//保存到DB失败
	const FAILDED_TO_SAVE_DB = 10000;
	
	//字段格式有误
	const FAILDED_TO_VALIDATE = 10001;
	
	//app id错误
	const INVALID_APP_ID = 10002;

	//sign缺失
	const MISSING_SIGN = 10003;
	
	//sign校验失败
	const INVALID_SIGN = 10004;
	
	/** 无效的请求参数 */
	const REQUEST_PARAMS_INVALID = 10006;
	
	/** 权限不足 */
	const PERMISSION_DENIED = 10007;
	
	//内部error code

	/** 课件名称已存在*/
	const COURSEWARE_ALREADY_EXISTS = 10010;
}