<?php

namespace common;

/**
 * 返回值类
 * 
*/
class Result
{
	//返回代码。0代表成功，非0代表失败
	public $code = 0;
	
	//HTTP状态或内部错误代码。0代表成功，非0代表失败
	//public $statusCode = 0;
	
	//返回描述。返回失败时需填写描述
	public $message = '';
	
	//返回的具体数据
	public $data = [];
}