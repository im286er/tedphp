<?php
return array(
	//'配置项'=>'配置值'
	'url_model'          => '1', 		 //URL模式      1,普通模式 2,PATH INFO 模式 3,phpinfo伪静态 //2和3 暂时不继续编写
	'URL_HTML_SUFFIX'	 => 'html',		 //模板后缀

	//模板配置
	// '__PUBLIC__'		 => strlen(str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])))>1 ? 
	// 						str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])).'/Public' : 
	// 						str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])).'Public',
	
	//子目录，当应用在更目录的时候返回空，当在子目录的时候返回子目录，格式如下：/dir1/dir2/dir3
	'CHILDREN_DIR'		 => strlen(str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])))>1 ? 
							str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])) : 
							'',
							
	// 定义当前请求的系统常量
	'REQUEST_METHOD'	 => $_SERVER['REQUEST_METHOD'],
	'IS_GET'			 => $_SERVER['REQUEST_METHOD'] =='GET' ? true : false,
	'IS_POST' 			 => $_SERVER['REQUEST_METHOD'] =='POST' ? true : false,
	'IS_PUT'			 => $_SERVER['REQUEST_METHOD'] =='PUT' ? true : false,
	'IS_DELETE'			 => $_SERVER['REQUEST_METHOD'] =='DELETE' ? true : false,
	
	//操作提示的模板
    'JUMP_PAGE'          => FRAMEWORK_PATH."Template/jump.html",
	'SHOW_PAGE'			 => FRAMEWORK_PATH."Template/show.html",
	
	// //数据库相关配置
	// 'DB_TYPE'   	=> 'mysql', // 数据库类型
	// 'DB_HOST'   	=> '127.0.0.1', // 服务器地址
	// 'DB_NAME'   	=> '', // 数据库名
	// 'DB_USER'   	=> '', // 用户名
	// 'DB_PASSWORD'	=> '', // 密码
	// 'DB_PORT'   	=> '3306', // 端口
	// 'DB_PREFIX' 	=> 'test_', // 数据库表前缀 
	// 'DB_CHARSET'	=> 'utf8' // 字符集


    // +----------------------------------------------------------------------
    // | 应用设置
    // +----------------------------------------------------------------------

    // 应用命名空间
    'app_namespace'          => 'app',
    // 应用调试模式
    'app_debug'              => true,
    // 应用Trace
    'app_trace'              => false,
    // 应用模式状态
    'app_status'             => '',
    // 是否支持多模块
    'app_multi_module'       => true,
    // 注册的根命名空间
    'root_namespace'         => [],
    // 扩展配置文件
    'extra_config_list'      => ['config','database','route'],
    // 扩展函数文件
    'extra_file_list'        => [FRAMEWORK_PATH . 'helper' . '.php'],
    // 默认输出类型
    'default_return_type'    => 'html',
    // 默认AJAX 数据返回格式,可选json xml ...
    'default_ajax_return'    => 'json',
    // 默认JSONP格式返回的处理方法
    'default_jsonp_handler'  => 'jsonpReturn',
    // 默认JSONP处理方法
    'var_jsonp_handler'      => 'callback',
    // 默认时区
    'default_timezone'       => 'PRC',
    // 是否开启多语言
    'lang_switch_on'         => false,
    // 默认全局过滤方法 用逗号分隔多个
    'default_filter'         => '',
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 是否启用控制器类后缀
    'controller_suffix'      => false,

    // +----------------------------------------------------------------------
    // | 模块设置
    // +----------------------------------------------------------------------

    // 默认模块名
    'default_module'         => 'index',
    // 禁止访问模块
    'deny_module_list'       => ['common'],
    // 默认控制器名
    'default_controller'     => 'Index',
    // 默认操作名
    'default_action'         => 'index',
    // 默认验证器
    'default_validate'       => '',
    // 默认的空控制器名
    'empty_controller'       => 'Error',
    // 操作方法后缀
    'action_suffix'          => '',
    // 自动搜索控制器
    'controller_auto_search' => false,

    // +----------------------------------------------------------------------
    // | URL设置
    // +----------------------------------------------------------------------

    // PATHINFO变量名 用于兼容模式
    'var_pathinfo'           => 's',
    // 兼容PATH_INFO获取
    'pathinfo_fetch'         => ['ORIG_PATH_INFO', 'REDIRECT_PATH_INFO', 'REDIRECT_URL'],
    // pathinfo分隔符
    'pathinfo_depr'          => '/',
    // URL伪静态后缀
    'url_html_suffix'        => 'html',
    // URL普通方式参数 用于自动生成
    'url_common_param'       => false,
    // URL参数方式 0 按名称成对解析 1 按顺序解析
    'url_param_type'         => 0,
    // 是否开启路由
    'url_route_on'           => true,
    // 是否强制使用路由
    'url_route_must'         => false,
    // 域名部署
    'url_domain_deploy'      => false,
    // 域名根，如.thinkphp.cn
    'url_domain_root'        => '',
    // 是否自动转换URL中的控制器和操作名
    'url_convert'            => true,
    // 默认的访问控制器层
    'url_controller_layer'   => 'controller',
    // 表单请求类型伪装变量
    'var_method'             => '_method',

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DIRECTORY_SEPARATOR,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',

        // '__public__'   => './public'
        '__public__'   => strlen(str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])))>1 ? 
                            str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])).'/public' : 
                            str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])).'public',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => ['__PUBLIC1__'=>'./public'],
    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => FRAMEWORK_PATH . 'tpl' . DIRECTORY_SEPARATOR . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => FRAMEWORK_PATH . 'tpl' . DIRECTORY_SEPARATOR . 'dispatch_jump.tpl',

    // +----------------------------------------------------------------------
    // | 异常及错误设置
    // +----------------------------------------------------------------------

    // 异常页面的模板文件
    'exception_tmpl'         => FRAMEWORK_PATH . 'tpl' . DIRECTORY_SEPARATOR . 'think_exception.tpl',

    // 错误显示信息,非调试模式有效
    'error_message'          => '页面错误！请稍后再试～',
    // 显示错误信息
    'show_error_msg'         => false,
    // 异常处理handle类 留空使用 \think\exception\Handle
    'exception_handle'       => '',

    // +----------------------------------------------------------------------
    // | 日志设置
    // +----------------------------------------------------------------------

    'log'                    => [
        // 日志记录方式，支持 file socket
        'type' => 'File',
        // 日志保存目录
        'path' => '',
    ],

    // +----------------------------------------------------------------------
    // | Trace设置
    // +----------------------------------------------------------------------

    'trace'                  => [
        //支持Html Console
        'type' => 'Html',
    ],




    // +-----------------------------------------------------------------------
    // | Auth配置
    // +-----------------------------------------------------------------------
    'auth_config' => array(
        // 用户组数据表名
        //'auth_group' => 'tp_group',
        // 用户-用户组关系表
        //'auth_group_access' => 'tp_group_access',
        // 权限规则表
        //'auth_rule' => 'tp_rule',
        // 用户信息表
        //'auth_user' => 'tp_admin'
        'auth_group'        => 'workgroup',
        'auth_group_access' => 'workgroup_user',
        'auth_rule'         => 'auth_rule',
        'auth_user'         => 'group_employee'
    ),
 
   






);