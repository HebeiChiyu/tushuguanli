<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * ThinkPHP鎯緥閰嶇疆鏂囦欢
 * 璇ユ枃浠惰涓嶈淇敼锛屽鏋滆瑕嗙洊鎯緥閰嶇疆鐨勫�硷紝鍙湪搴旂敤閰嶇疆鏂囦欢涓瀹氬拰鎯緥涓嶇鐨勯厤缃」
 * 閰嶇疆鍚嶇О澶у皬鍐欎换鎰忥紝绯荤粺浼氱粺涓�杞崲鎴愬皬鍐�
 * 鎵�鏈夐厤缃弬鏁伴兘鍙互鍦ㄧ敓鏁堝墠鍔ㄦ�佹敼鍙�
 */
defined('THINK_PATH') or exit();
return  array(
    /* 搴旂敤璁惧畾 */
    'APP_USE_NAMESPACE'     =>  true,    // 搴旂敤绫诲簱鏄惁浣跨敤鍛藉悕绌洪棿
    'APP_SUB_DOMAIN_DEPLOY' =>  false,   // 鏄惁寮�鍚瓙鍩熷悕閮ㄧ讲
    'APP_SUB_DOMAIN_RULES'  =>  array(), // 瀛愬煙鍚嶉儴缃茶鍒�
    'APP_DOMAIN_SUFFIX'     =>  '', // 鍩熷悕鍚庣紑 濡傛灉鏄痗om.cn net.cn 涔嬬被鐨勫悗缂�蹇呴』璁剧疆    
    'ACTION_SUFFIX'         =>  '', // 鎿嶄綔鏂规硶鍚庣紑
    'MULTI_MODULE'          =>  true, // 鏄惁鍏佽澶氭ā鍧� 濡傛灉涓篺alse 鍒欏繀椤昏缃� DEFAULT_MODULE
    'MODULE_DENY_LIST'      =>  array('Common','Runtime'),
    'CONTROLLER_LEVEL'      =>  1,
    'APP_AUTOLOAD_LAYER'    =>  'Controller,Model', // 鑷姩鍔犺浇鐨勫簲鐢ㄧ被搴撳眰 鍏抽棴APP_USE_NAMESPACE鍚庢湁鏁�
    'APP_AUTOLOAD_PATH'     =>  '', // 鑷姩鍔犺浇鐨勮矾寰� 鍏抽棴APP_USE_NAMESPACE鍚庢湁鏁�

    /* Cookie璁剧疆 */
    'COOKIE_EXPIRE'         =>  0,       // Cookie鏈夋晥鏈�
    'COOKIE_DOMAIN'         =>  '',      // Cookie鏈夋晥鍩熷悕
    'COOKIE_PATH'           =>  '/',     // Cookie璺緞
    'COOKIE_PREFIX'         =>  '',      // Cookie鍓嶇紑 閬垮厤鍐茬獊
    'COOKIE_SECURE'         =>  false,   // Cookie瀹夊叏浼犺緭
    'COOKIE_HTTPONLY'       =>  '',      // Cookie httponly璁剧疆

    /* 榛樿璁惧畾 */
    'DEFAULT_M_LAYER'       =>  'Model', // 榛樿鐨勬ā鍨嬪眰鍚嶇О
    'DEFAULT_C_LAYER'       =>  'Controller', // 榛樿鐨勬帶鍒跺櫒灞傚悕绉�
    'DEFAULT_V_LAYER'       =>  'View', // 榛樿鐨勮鍥惧眰鍚嶇О
    'DEFAULT_LANG'          =>  'zh-cn', // 榛樿璇█
    'DEFAULT_THEME'         =>  '',	// 榛樿妯℃澘涓婚鍚嶇О
    'DEFAULT_MODULE'        =>  'Index',  // 榛樿妯″潡
    'DEFAULT_CONTROLLER'    =>  'Index', // 榛樿鎺у埗鍣ㄥ悕绉�
    'DEFAULT_ACTION'        =>  'index', // 榛樿鎿嶄綔鍚嶇О
    'DEFAULT_CHARSET'       =>  'utf-8', // 榛樿杈撳嚭缂栫爜
    'DEFAULT_TIMEZONE'      =>  'PRC',	// 榛樿鏃跺尯
    'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 榛樿AJAX 鏁版嵁杩斿洖鏍煎紡,鍙�塉SON XML ...
    'DEFAULT_JSONP_HANDLER' =>  'jsonpReturn', // 榛樿JSONP鏍煎紡杩斿洖鐨勫鐞嗘柟娉�
    'DEFAULT_FILTER'        =>  'htmlspecialchars', // 榛樿鍙傛暟杩囨护鏂规硶 鐢ㄤ簬I鍑芥暟...

    /* 鏁版嵁搴撹缃� */
    'DB_TYPE'               =>  '',     // 鏁版嵁搴撶被鍨�
    'DB_HOST'               =>  '', // 鏈嶅姟鍣ㄥ湴鍧�
    'DB_NAME'               =>  '',          // 鏁版嵁搴撳悕
    'DB_USER'               =>  '',      // 鐢ㄦ埛鍚�
    'DB_PWD'                =>  '',          // 瀵嗙爜
    'DB_PORT'               =>  '',        // 绔彛
    'DB_PREFIX'             =>  '',    // 鏁版嵁搴撹〃鍓嶇紑
    'DB_PARAMS'          	=>  array(), // 鏁版嵁搴撹繛鎺ュ弬鏁�    
    'DB_DEBUG'  			=>  TRUE, // 鏁版嵁搴撹皟璇曟ā寮� 寮�鍚悗鍙互璁板綍SQL鏃ュ織
    'DB_FIELDS_CACHE'       =>  true,        // 鍚敤瀛楁缂撳瓨
    'DB_CHARSET'            =>  'utf8',      // 鏁版嵁搴撶紪鐮侀粯璁ら噰鐢╱tf8
    'DB_DEPLOY_TYPE'        =>  0, // 鏁版嵁搴撻儴缃叉柟寮�:0 闆嗕腑寮�(鍗曚竴鏈嶅姟鍣�),1 鍒嗗竷寮�(涓讳粠鏈嶅姟鍣�)
    'DB_RW_SEPARATE'        =>  false,       // 鏁版嵁搴撹鍐欐槸鍚﹀垎绂� 涓讳粠寮忔湁鏁�
    'DB_MASTER_NUM'         =>  1, // 璇诲啓鍒嗙鍚� 涓绘湇鍔″櫒鏁伴噺
    'DB_SLAVE_NO'           =>  '', // 鎸囧畾浠庢湇鍔″櫒搴忓彿

    /* 鏁版嵁缂撳瓨璁剧疆 */
    'DATA_CACHE_TIME'       =>  0,      // 鏁版嵁缂撳瓨鏈夋晥鏈� 0琛ㄧず姘镐箙缂撳瓨
    'DATA_CACHE_COMPRESS'   =>  false,   // 鏁版嵁缂撳瓨鏄惁鍘嬬缉缂撳瓨
    'DATA_CACHE_CHECK'      =>  false,   // 鏁版嵁缂撳瓨鏄惁鏍￠獙缂撳瓨
    'DATA_CACHE_PREFIX'     =>  '',     // 缂撳瓨鍓嶇紑
    'DATA_CACHE_TYPE'       =>  'File',  // 鏁版嵁缂撳瓨绫诲瀷,鏀寔:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH'       =>  TEMP_PATH,// 缂撳瓨璺緞璁剧疆 (浠呭File鏂瑰紡缂撳瓨鏈夋晥)
    'DATA_CACHE_KEY'        =>  '',	// 缂撳瓨鏂囦欢KEY (浠呭File鏂瑰紡缂撳瓨鏈夋晥)    
    'DATA_CACHE_SUBDIR'     =>  false,    // 浣跨敤瀛愮洰褰曠紦瀛� (鑷姩鏍规嵁缂撳瓨鏍囪瘑鐨勫搱甯屽垱寤哄瓙鐩綍)
    'DATA_PATH_LEVEL'       =>  1,        // 瀛愮洰褰曠紦瀛樼骇鍒�

    /* 閿欒璁剧疆 */
    'ERROR_MESSAGE'         =>  '椤甸潰閿欒锛佽绋嶅悗鍐嶈瘯锝�',//閿欒鏄剧ず淇℃伅,闈炶皟璇曟ā寮忔湁鏁�
    'ERROR_PAGE'            =>  '',	// 閿欒瀹氬悜椤甸潰
    'SHOW_ERROR_MSG'        =>  false,    // 鏄剧ず閿欒淇℃伅
    'TRACE_MAX_RECORD'      =>  100,    // 姣忎釜绾у埆鐨勯敊璇俊鎭� 鏈�澶ц褰曟暟

    /* 鏃ュ織璁剧疆 */
    'LOG_RECORD'            =>  false,   // 榛樿涓嶈褰曟棩蹇�
    'LOG_TYPE'              =>  'File', // 鏃ュ織璁板綍绫诲瀷 榛樿涓烘枃浠舵柟寮�
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR',// 鍏佽璁板綍鐨勬棩蹇楃骇鍒�
    'LOG_FILE_SIZE'         =>  2097152,	// 鏃ュ織鏂囦欢澶у皬闄愬埗
    'LOG_EXCEPTION_RECORD'  =>  false,    // 鏄惁璁板綍寮傚父淇℃伅鏃ュ織

    /* SESSION璁剧疆 */
    'SESSION_AUTO_START'    =>  true,    // 鏄惁鑷姩寮�鍚疭ession
    'SESSION_OPTIONS'       =>  array(), // session 閰嶇疆鏁扮粍 鏀寔type name id path expire domain 绛夊弬鏁�
    'SESSION_TYPE'          =>  '', // session hander绫诲瀷 榛樿鏃犻渶璁剧疆 闄ら潪鎵╁睍浜唖ession hander椹卞姩
    'SESSION_PREFIX'        =>  '', // session 鍓嶇紑
    //'VAR_SESSION_ID'      =>  'session_id',     //sessionID鐨勬彁浜ゅ彉閲�

    /* 妯℃澘寮曟搸璁剧疆 */
    'TMPL_CONTENT_TYPE'     =>  'text/html', // 榛樿妯℃澘杈撳嚭绫诲瀷
    'TMPL_ACTION_ERROR'     =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 榛樿閿欒璺宠浆瀵瑰簲鐨勬ā鏉挎枃浠�
    'TMPL_ACTION_SUCCESS'   =>  THINK_PATH.'Tpl/dispatch_jump.tpl', // 榛樿鎴愬姛璺宠浆瀵瑰簲鐨勬ā鏉挎枃浠�
    'TMPL_EXCEPTION_FILE'   =>  THINK_PATH.'Tpl/think_exception.tpl',// 寮傚父椤甸潰鐨勬ā鏉挎枃浠�
    'TMPL_DETECT_THEME'     =>  false,       // 鑷姩渚︽祴妯℃澘涓婚
    'TMPL_TEMPLATE_SUFFIX'  =>  '.html',     // 榛樿妯℃澘鏂囦欢鍚庣紑
    'TMPL_FILE_DEPR'        =>  '/', //妯℃澘鏂囦欢CONTROLLER_NAME涓嶢CTION_NAME涔嬮棿鐨勫垎鍓茬
    // 甯冨眬璁剧疆
    'TMPL_ENGINE_TYPE'      =>  'Think',     // 榛樿妯℃澘寮曟搸 浠ヤ笅璁剧疆浠呭浣跨敤Think妯℃澘寮曟搸鏈夋晥
    'TMPL_CACHFILE_SUFFIX'  =>  '.php',      // 榛樿妯℃澘缂撳瓨鍚庣紑
    'TMPL_DENY_FUNC_LIST'   =>  'echo,exit',    // 妯℃澘寮曟搸绂佺敤鍑芥暟
    'TMPL_DENY_PHP'         =>  false, // 榛樿妯℃澘寮曟搸鏄惁绂佺敤PHP鍘熺敓浠ｇ爜
    'TMPL_L_DELIM'          =>  '{',            // 妯℃澘寮曟搸鏅�氭爣绛惧紑濮嬫爣璁�
    'TMPL_R_DELIM'          =>  '}',            // 妯℃澘寮曟搸鏅�氭爣绛剧粨鏉熸爣璁�
    'TMPL_VAR_IDENTIFY'     =>  'array',     // 妯℃澘鍙橀噺璇嗗埆銆傜暀绌鸿嚜鍔ㄥ垽鏂�,鍙傛暟涓�'obj'鍒欒〃绀哄璞�
    'TMPL_STRIP_SPACE'      =>  true,       // 鏄惁鍘婚櫎妯℃澘鏂囦欢閲岄潰鐨刪tml绌烘牸涓庢崲琛�
    'TMPL_CACHE_ON'         =>  true,        // 鏄惁寮�鍚ā鏉跨紪璇戠紦瀛�,璁句负false鍒欐瘡娆￠兘浼氶噸鏂扮紪璇�
    'TMPL_CACHE_PREFIX'     =>  '',         // 妯℃澘缂撳瓨鍓嶇紑鏍囪瘑锛屽彲浠ュ姩鎬佹敼鍙�
    'TMPL_CACHE_TIME'       =>  0,         // 妯℃澘缂撳瓨鏈夋晥鏈� 0 涓烘案涔咃紝(浠ユ暟瀛椾负鍊硷紝鍗曚綅:绉�)
    'TMPL_LAYOUT_ITEM'      =>  '{__CONTENT__}', // 甯冨眬妯℃澘鐨勫唴瀹规浛鎹㈡爣璇�
    'LAYOUT_ON'             =>  false, // 鏄惁鍚敤甯冨眬
    'LAYOUT_NAME'           =>  'layout', // 褰撳墠甯冨眬鍚嶇О 榛樿涓簂ayout

    // Think妯℃澘寮曟搸鏍囩搴撶浉鍏宠瀹�
    'TAGLIB_BEGIN'          =>  '<',  // 鏍囩搴撴爣绛惧紑濮嬫爣璁�
    'TAGLIB_END'            =>  '>',  // 鏍囩搴撴爣绛剧粨鏉熸爣璁�
    'TAGLIB_LOAD'           =>  true, // 鏄惁浣跨敤鍐呯疆鏍囩搴撲箣澶栫殑鍏跺畠鏍囩搴擄紝榛樿鑷姩妫�娴�
    'TAGLIB_BUILD_IN'       =>  'cx', // 鍐呯疆鏍囩搴撳悕绉�(鏍囩浣跨敤涓嶅繀鎸囧畾鏍囩搴撳悕绉�),浠ラ�楀彿鍒嗛殧 娉ㄦ剰瑙ｆ瀽椤哄簭
    'TAGLIB_PRE_LOAD'       =>  '',   // 闇�瑕侀澶栧姞杞界殑鏍囩搴�(椤绘寚瀹氭爣绛惧簱鍚嶇О)锛屽涓互閫楀彿鍒嗛殧 
    
    /* URL璁剧疆 */
    'URL_CASE_INSENSITIVE'  =>  true,   // 榛樿false 琛ㄧずURL鍖哄垎澶у皬鍐� true鍒欒〃绀轰笉鍖哄垎澶у皬鍐�
    'URL_MODEL'             =>  2,       // URL璁块棶妯″紡,鍙�夊弬鏁�0銆�1銆�2銆�3,浠ｈ〃浠ヤ笅鍥涚妯″紡锛�
    // 0 (鏅�氭ā寮�); 1 (PATHINFO 妯″紡); 2 (REWRITE  妯″紡); 3 (鍏煎妯″紡)  榛樿涓篜ATHINFO 妯″紡
    'URL_PATHINFO_DEPR'     =>  '/',	// PATHINFO妯″紡涓嬶紝鍚勫弬鏁颁箣闂寸殑鍒嗗壊绗﹀彿
    'URL_PATHINFO_FETCH'    =>  'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 鐢ㄤ簬鍏煎鍒ゆ柇PATH_INFO 鍙傛暟鐨凷ERVER鏇夸唬鍙橀噺鍒楄〃
    'URL_REQUEST_URI'       =>  'REQUEST_URI', // 鑾峰彇褰撳墠椤甸潰鍦板潃鐨勭郴缁熷彉閲� 榛樿涓篟EQUEST_URI
    // 'URL_HTML_SUFFIX'       =>  'html',  // URL浼潤鎬佸悗缂�璁剧疆
    'URL_HTML_SUFFIX'       =>  '',  // URL浼潤鎬佸悗缂�璁剧疆
    'URL_DENY_SUFFIX'       =>  'ico|png|gif|jpg', // URL绂佹璁块棶鐨勫悗缂�璁剧疆
    'URL_PARAMS_BIND'       =>  true, // URL鍙橀噺缁戝畾鍒癆ction鏂规硶鍙傛暟
    'URL_PARAMS_BIND_TYPE'  =>  0, // URL鍙橀噺缁戝畾鐨勭被鍨� 0 鎸夊彉閲忓悕缁戝畾 1 鎸夊彉閲忛『搴忕粦瀹�
    'URL_PARAMS_FILTER'     =>  false, // URL鍙橀噺缁戝畾杩囨护
    'URL_PARAMS_FILTER_TYPE'=>  '', // URL鍙橀噺缁戝畾杩囨护鏂规硶 濡傛灉涓虹┖ 璋冪敤DEFAULT_FILTER
    'URL_ROUTER_ON'         =>  false,   // 鏄惁寮�鍚疷RL璺敱
    'URL_ROUTE_RULES'       =>  array(), // 榛樿璺敱瑙勫垯 閽堝妯″潡
    'URL_MAP_RULES'         =>  array(), // URL鏄犲皠瀹氫箟瑙勫垯

    /* 绯荤粺鍙橀噺鍚嶇О璁剧疆 */
    'VAR_MODULE'            =>  'm',     // 榛樿妯″潡鑾峰彇鍙橀噺
    'VAR_ADDON'             =>  'addon',     // 榛樿鐨勬彃浠舵帶鍒跺櫒鍛藉悕绌洪棿鍙橀噺
    'VAR_CONTROLLER'        =>  'c',    // 榛樿鎺у埗鍣ㄨ幏鍙栧彉閲�
    'VAR_ACTION'            =>  'a',    // 榛樿鎿嶄綔鑾峰彇鍙橀噺
    'VAR_AJAX_SUBMIT'       =>  'ajax',  // 榛樿鐨凙JAX鎻愪氦鍙橀噺
    'VAR_JSONP_HANDLER'     =>  'callback',
    'VAR_PATHINFO'          =>  's',    // 鍏煎妯″紡PATHINFO鑾峰彇鍙橀噺渚嬪 ?s=/module/action/id/1 鍚庨潰鐨勫弬鏁板彇鍐充簬URL_PATHINFO_DEPR
    'VAR_TEMPLATE'          =>  't',    // 榛樿妯℃澘鍒囨崲鍙橀噺
    'VAR_AUTO_STRING'		=>	false,	// 杈撳叆鍙橀噺鏄惁鑷姩寮哄埗杞崲涓哄瓧绗︿覆 濡傛灉寮�鍚垯鏁扮粍鍙橀噺闇�瑕佹墜鍔ㄤ紶鍏ュ彉閲忎慨楗扮鑾峰彇鍙橀噺

    'HTTP_CACHE_CONTROL'    =>  'private',  // 缃戦〉缂撳瓨鎺у埗
    'CHECK_APP_DIR'         =>  true,       // 鏄惁妫�鏌ュ簲鐢ㄧ洰褰曟槸鍚﹀垱寤�
    'FILE_UPLOAD_TYPE'      =>  'Local',    // 鏂囦欢涓婁紶鏂瑰紡
    'DATA_CRYPT_TYPE'       =>  'Think',    // 鏁版嵁鍔犲瘑鏂瑰紡

);
