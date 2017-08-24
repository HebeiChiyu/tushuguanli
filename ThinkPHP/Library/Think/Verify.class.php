<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 楹﹀綋鑻楀効 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Think;

class Verify {
    protected $config =	array(
        'seKey'     =>  'ThinkPHP.CN',   // 楠岃瘉鐮佸姞瀵嗗瘑閽�
        'codeSet'   =>  '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',             // 楠岃瘉鐮佸瓧绗﹂泦鍚�
        'expire'    =>  1800,            // 楠岃瘉鐮佽繃鏈熸椂闂达紙s锛�
        'useZh'     =>  false,           // 浣跨敤涓枃楠岃瘉鐮� 
        'zhSet'     =>  '浠互鎴戝埌浠栦細浣滄椂瑕佸姩鍥戒骇鐨勪竴鏄伐灏卞勾闃朵箟鍙戞垚閮ㄦ皯鍙嚭鑳芥柟杩涘湪浜嗕笉鍜屾湁澶ц繖涓讳腑浜轰笂涓烘潵鍒嗙敓瀵逛簬瀛︿笅绾у湴涓敤鍚岃闈㈣绉嶈繃鍛藉害闈╄�屽瀛愬悗鑷ぞ鍔犲皬鏈轰篃缁忓姏绾挎湰鐢甸珮閲忛暱鍏氬緱瀹炲瀹氭繁娉曡〃鐫�姘寸悊鍖栦簤鐜版墍浜岃捣鏀夸笁濂藉崄鎴樻棤鍐滀娇鎬у墠绛夊弽浣撳悎鏂楄矾鍥炬妸缁撶閲屾鏂板紑璁轰箣鐗╀粠褰撲袱浜涜繕澶╄祫浜嬮槦鎵圭偣鑲查噸鍏舵�濅笌闂村唴鍘诲洜浠舵棩鍒╃浉鐢卞帇鍛樻皵涓氫唬鍏ㄧ粍鏁版灉鏈熷骞冲悇鍩烘垨鏈堟瘺鐒跺搴斿舰鎯冲埗蹇冩牱骞查兘鍚戝彉鍏抽棶姣斿睍閭ｅ畠鏈�鍙婂娌＄湅娌绘彁浜旇В绯绘灄鑰呯背缇ゅご鎰忓彧鏄庡洓閬撻┈璁ゆ鏂囬�氫絾鏉¤緝鍏嬪張鍏瓟棰嗗啗娴佸叆鎺ュ腑浣嶆儏杩愬櫒骞堕鍘熸补鏀剧珛棰樿川鎸囧缓鍖洪獙娲讳紬寰堟暀鍐崇壒姝ゅ父鐭冲己鏋佸湡灏戝凡鏍瑰叡鐩村洟缁熷紡杞埆閫犲垏涔濅綘鍙栬タ鎸佹�绘枡杩炰换蹇楄璋冧竷涔堝北绋嬬櫨鎶ユ洿瑙佸繀鐪熶繚鐑鎵嬫敼绠″宸卞皢淇敮璇嗙梾璞″嚑鍏堣�佸厜涓撲粈鍏瀷鍏风ず澶嶅畨甯︽瘡涓滃鍒欏畬椋庡洖鍗楀箍鍔宠疆绉戝寳鎵撶Н杞﹁缁欒妭鍋氬姟琚暣鑱旀绫婚泦鍙峰垪娓╄鍗虫鐭ヨ酱鐮斿崟鑹插潥鎹�熼槻鍙叉媺涓栬杈惧皵鍦虹粐鍘嗚姳鍙楁眰浼犲彛鏂喌閲囩簿閲戠晫鍝佸垽鍙傚眰姝㈣竟娓呰嚦涓囩‘绌朵功鏈姸鍘傞』绂诲啀鐩捣浜ゆ潈涓斿効闈掓墠璇佷綆瓒婇檯鍏瘯瑙勬柉杩戞敞鍔炲竷闂ㄩ搧闇�璧拌鍘垮叺鍥洪櫎鑸紩榻垮崈鑳滅粏褰辨祹鐧芥牸鏁堢疆鎺ㄧ┖閰嶅垁鍙剁巼杩颁粖閫夊吇寰疯瘽鏌ュ樊鍗婃晫濮嬬墖鏂藉搷鏀跺崕瑙夊鍚嶇孩缁潎鑽爣璁伴毦瀛樻祴澹韩绱ф恫娲惧噯鏂よ闄嶇淮鏉胯鐮磋堪鎶�娑堝簳搴婄敯鍔跨鎰熷線绁炰究璐烘潙鏋勭収瀹归潪鎼炰簹纾ㄦ棌鐏绠楅�傝鎸夊�肩編鎬侀粍鏄撳姜鏈嶆棭鐝害鍓婁俊鎺掑彴澹拌鍑荤礌寮犲瘑瀹充警鑽変綍鏍戣偉缁у彸灞炲競涓ュ緞铻烘宸﹂〉鎶楄嫃鏄捐嫤鑻卞揩绉板潖绉荤害宸存潗鐪侀粦姝﹀煿钁楁渤甯濅粎閽堟�庢浜姪鍗囩帇鐪煎ス鎶撳惈鑻楀壇鏉傛櫘璋堝洿椋熷皠婧愪緥鑷撮吀鏃у嵈鍏呰冻鐭垝鍓傚鐜惤棣栧昂娉㈡壙绮夎返搴滈奔闅忚�冨埢闈犲婊″か澶卞寘浣忎績鏋濆眬鑿屾潌鍛ㄦ姢宀╁笀涓炬洸鏄ュ厓瓒呰礋鐮傚皝鎹㈠お妯¤传鍑忛槼鎵睙鏋愪憨鏈ㄨ█鐞冩湞鍖绘牎鍙ゅ憿绋诲畫鍚敮杈撴粦绔欏彟鍗瓧榧撳垰鍐欏垬寰暐鑼冧緵闃垮潡鏌愬姛濂楀弸闄愰」浣欏�掑嵎鍒涘緥闆ㄨ楠ㄨ繙甯垵鐨挱浼樺崰姝绘瘨鍦堜紵瀛ｈ鎺ф縺鎵惧彨浜戜簰璺熻绮矑姣嶇粌濉為挗椤剁瓥鍙岀暀璇鍚搁樆鏁呭鐩炬櫄涓濆コ鏁ｇ剨鍔熸牚浜查櫌鍐峰交寮归敊鏁ｅ晢瑙嗚壓鐏増鐑堥浂瀹よ交琛�鍊嶇己鍘樻车瀵熺粷瀵屽煄鍐插柗澹ょ畝鍚︽煴鏉庢湜鐩樼闆勪技鍥板珐鐩婃床鑴辨姇閫佸ゴ渚ф鼎鐩栨尌璺濊Е鏄熸澗閫佽幏鍏寸嫭瀹樻贩绾緷鏈獊鏋跺鍐珷婀垮亸绾瑰悆鎵ч榾鐭垮璐ｇ啛绋冲ず纭环鍔炕濂囩敳棰勮亴璇勮鑳屽崗鎹熸渚电伆铏界煕鍘氱綏娉ヨ緹鍛婂嵉绠辨帉姘ф仼鐖卞仠鏇炬憾钀ョ粓绾插瓱閽卞緟灏戒縿缂╂矙閫�闄堣濂嬫杞借優骞煎摢鍓ヨ揩鏃嬪緛妲藉�掓彙鎷呬粛鍛�椴滃惂鍗＄矖浠嬮捇閫愬急鑴氭�曠洂鏈槾涓伴浘鍐犱笝琛楄幈璐濊緪鑲犱粯鍚夋笚鐟炴儕椤挎尋绉掓偓濮嗙儌妫硸鍦ｅ嚬闄惰瘝杩熻殨浜跨煩搴烽伒鐗ч伃骞呭洯鑵旇棣欒倝寮熷眿鏁忔仮蹇樼紪鍗拌渹鎬ユ嬁鎵╀激椋為湶鏍哥紭娓告尟鎿嶅ぎ浼嶅煙鐢氳繀杈夊紓搴忓厤绾稿涔′箙闅剁几澶瑰康鍏版槧娌熶箼鍚楀剴鏉�姹界７鑹版櫠鎻掑焹鐕冩閾佽ˉ鍜辫娊姘哥摝鍊鹃樀纰虫紨濞侀檮鐗欒娊姘哥摝鏂滅亴娆х尞椤虹尓娲嬭厫璇烽�忓徃鍗辨嫭鑴夊疁绗戣嫢灏炬潫澹毚浼佽彍绌楁姹夋剤缁挎嫋鐗涗唤鏌撴棦绉嬮亶閿荤帀澶忕枟灏栨畺浜曡垂宸炶鍚硅崳閾滄部鏇挎粴瀹㈠彫鏃辨偀鍒鸿剳鎺疮钘忔暍浠ら殭鐐夊３纭叅杩庨摳绮樻帰涓磋杽鏃杽绂忕旱鎷╃ぜ鎰夸紡娈嬮浄寤剁儫鍙ョ函娓愯�曡窇娉芥參鏍介瞾璧ょ箒澧冩疆妯帀閿ュ笇姹犺触鑸瑰亣浜皳鎵樹紮鍝叉��鍓叉憜璐″憟鍔茶储浠矇鐐奸夯缃鎭溅绌胯揣閿�榻愰紶鎶界敾楗查緳搴撳畧绛戞埧姝屽瘨鍠滃摜娲楄殌搴熺撼鑵逛箮褰曢暅濡囨伓鑴傚簞鎿﹂櫓璧為挓鎽囧吀鏌勮京绔硅胺鍗栦贡铏氭ˉ濂ヤ集璧跺瀭閫旈澹佺綉鎴噹閬楅潤璋嬪紕鎸傝闀囧鐩涜�愭彺鎵庤檻閿綊绗﹀簡鑱氱粫鎽╁繖鑸為亣绱㈤【鑳剁緤婀栭拤浠侀煶杩圭浼哥伅閬挎硾浜＄瓟鍕囬鐨囨煶鍝堟彮鐢樿姒傚娴撳矝琚皝娲阿鐐祰鏂戣鎳傜伒铔嬮棴瀛╅噴涔冲法寰掔閾朵紛鏅潶绱寑闇夋潨涔愬嫆闅斿集缁╂嫑缁嶈儭鍛肩棝宄伴浂鏌寸哀鍗堣烦灞呭皻涓佺Е绋嶈拷姊佹姌鑰楃⒈娈婂矖鎸栨皬鍒冨墽鍫嗚但鑽疯兏琛″嫟鑶滅瘒鐧婚┗妗堝垔绉х紦鍑稿焦鍓窛闆摼娓斿暒鑴告埛娲涘鍕冪洘涔版潹瀹楃劍璧涙棗婊ょ鐐偂鍧愯捀鍑濈珶闄锋灙榛庢晳鍐掓殫娲炵姱绛掓偍瀹嬪姬鐖嗚艾娑傚懗娲ヨ噦闅滆闄嗗晩鍋ュ皧璞嗘嫈鑾姷妗戝潯缂濊鎸戞薄鍐版煬鍢村暐楗瀵勮档鍠婂灚涓规浮鑰冲埁铏庣瑪绋�鏄嗘氮钀ㄨ尪婊存祬鎷ョ┐瑕嗕鸡濞樺惃娴歌鐝犻泴濡堢传鎴忓閿ら渿宀佽矊娲佸墫鐗㈤攱鐤戦湼闂煍鐚涜瘔鍒风嫚蹇界伨闂逛箶鍞愭紡闂绘矆鐔旀隘鑽掕寧鐢峰嚒鎶㈠儚娴嗘梺鐜讳害蹇犲敱钂欎簣绾锋崟閿佸挨涔樹箤鏅烘贰鍏佸彌鐣滀繕鎽搁攬鎵瘯鐠冨疂鑺埛閴寸鍑�钂嬮挋鑲╄吘鏋姏杞ㄥ爞鎷岀埜寰绁濆姳鑲厭缁崇┓濉樼嚗娉¤鏈楀杺閾濊蒋娓犻鎯锤绮患澧欒秼褰煎眾澧ㄧ鍚�嗗嵏鑸。瀛欓緞宀獥浼戝��',              // 涓枃楠岃瘉鐮佸瓧绗︿覆
        'useImgBg'  =>  false,           // 浣跨敤鑳屾櫙鍥剧墖 
        'fontSize'  =>  25,              // 楠岃瘉鐮佸瓧浣撳ぇ灏�(px)
        'useCurve'  =>  true,            // 鏄惁鐢绘贩娣嗘洸绾�
        'useNoise'  =>  true,            // 鏄惁娣诲姞鏉傜偣	
        'imageH'    =>  0,               // 楠岃瘉鐮佸浘鐗囬珮搴�
        'imageW'    =>  0,               // 楠岃瘉鐮佸浘鐗囧搴�
        'length'    =>  5,               // 楠岃瘉鐮佷綅鏁�
        'fontttf'   =>  '',              // 楠岃瘉鐮佸瓧浣擄紝涓嶈缃殢鏈鸿幏鍙�
        'bg'        =>  array(243, 251, 254),  // 鑳屾櫙棰滆壊
        'reset'     =>  true,           // 楠岃瘉鎴愬姛鍚庢槸鍚﹂噸缃�
        );

    private $_image   = NULL;     // 楠岃瘉鐮佸浘鐗囧疄渚�
    private $_color   = NULL;     // 楠岃瘉鐮佸瓧浣撻鑹�

    /**
     * 鏋舵瀯鏂规硶 璁剧疆鍙傛暟
     * @access public     
     * @param  array $config 閰嶇疆鍙傛暟
     */    
    public function __construct($config=array()){
        $this->config   =   array_merge($this->config, $config);
    }

    /**
     * 浣跨敤 $this->name 鑾峰彇閰嶇疆
     * @access public     
     * @param  string $name 閰嶇疆鍚嶇О
     * @return multitype    閰嶇疆鍊�
     */
    public function __get($name) {
        return $this->config[$name];
    }

    /**
     * 璁剧疆楠岃瘉鐮侀厤缃�
     * @access public     
     * @param  string $name 閰嶇疆鍚嶇О
     * @param  string $value 閰嶇疆鍊�     
     * @return void
     */
    public function __set($name,$value){
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     * 妫�鏌ラ厤缃�
     * @access public     
     * @param  string $name 閰嶇疆鍚嶇О
     * @return bool
     */
    public function __isset($name){
        return isset($this->config[$name]);
    }

    /**
     * 楠岃瘉楠岃瘉鐮佹槸鍚︽纭�
     * @access public
     * @param string $code 鐢ㄦ埛楠岃瘉鐮�
     * @param string $id 楠岃瘉鐮佹爣璇�     
     * @return bool 鐢ㄦ埛楠岃瘉鐮佹槸鍚︽纭�
     */
    public function check($code, $id = '') {
        $key = $this->authcode($this->seKey).$id;
        // 楠岃瘉鐮佷笉鑳戒负绌�
        $secode = session($key);
        if(empty($code) || empty($secode)) {
            return false;
        }
        // session 杩囨湡
        if(NOW_TIME - $secode['verify_time'] > $this->expire) {
            session($key, null);
            return false;
        }

        if($this->authcode(strtoupper($code)) == $secode['verify_code']) {
            $this->reset && session($key, null);
            return true;
        }

        return false;
    }

    /**
     * 杈撳嚭楠岃瘉鐮佸苟鎶婇獙璇佺爜鐨勫�间繚瀛樼殑session涓�
     * 楠岃瘉鐮佷繚瀛樺埌session鐨勬牸寮忎负锛� array('verify_code' => '楠岃瘉鐮佸��', 'verify_time' => '楠岃瘉鐮佸垱寤烘椂闂�');
     * @access public     
     * @param string $id 瑕佺敓鎴愰獙璇佺爜鐨勬爣璇�   
     * @return void
     */
    public function entry($id = '') {
        // 鍥剧墖瀹�(px)
        $this->imageW || $this->imageW = $this->length*$this->fontSize*1.5 + $this->length*$this->fontSize/2; 
        // 鍥剧墖楂�(px)
        $this->imageH || $this->imageH = $this->fontSize * 2.5;
        // 寤虹珛涓�骞� $this->imageW x $this->imageH 鐨勫浘鍍�
        $this->_image = imagecreate($this->imageW, $this->imageH); 
        // 璁剧疆鑳屾櫙      
        imagecolorallocate($this->_image, $this->bg[0], $this->bg[1], $this->bg[2]); 

        // 楠岃瘉鐮佸瓧浣撻殢鏈洪鑹�
        $this->_color = imagecolorallocate($this->_image, mt_rand(1,150), mt_rand(1,150), mt_rand(1,150));
        // 楠岃瘉鐮佷娇鐢ㄩ殢鏈哄瓧浣�
        $ttfPath = dirname(__FILE__) . '/Verify/' . ($this->useZh ? 'zhttfs' : 'ttfs') . '/';

        if(empty($this->fontttf)){
            $dir = dir($ttfPath);
            $ttfs = array();		
            while (false !== ($file = $dir->read())) {
                if($file[0] != '.' && substr($file, -4) == '.ttf') {
                    $ttfs[] = $file;
                }
            }
            $dir->close();
            $this->fontttf = $ttfs[array_rand($ttfs)];
        } 
        $this->fontttf = $ttfPath . $this->fontttf;
        
        if($this->useImgBg) {
            $this->_background();
        }
        
        if ($this->useNoise) {
            // 缁樻潅鐐�
            $this->_writeNoise();
        } 
        if ($this->useCurve) {
            // 缁樺共鎵扮嚎
            $this->_writeCurve();
        }
        
        // 缁橀獙璇佺爜
        $code = array(); // 楠岃瘉鐮�
        $codeNX = 0; // 楠岃瘉鐮佺N涓瓧绗︾殑宸﹁竟璺�
        if($this->useZh){ // 涓枃楠岃瘉鐮�
            for ($i = 0; $i<$this->length; $i++) {
                $code[$i] = iconv_substr($this->zhSet,floor(mt_rand(0,mb_strlen($this->zhSet,'utf-8')-1)),1,'utf-8');
                imagettftext($this->_image, $this->fontSize, mt_rand(-40, 40), $this->fontSize*($i+1)*1.5, $this->fontSize + mt_rand(10, 20), $this->_color, $this->fontttf, $code[$i]);
            }
        }else{
            for ($i = 0; $i<$this->length; $i++) {
                $code[$i] = $this->codeSet[mt_rand(0, strlen($this->codeSet)-1)];
                $codeNX  += mt_rand($this->fontSize*1.2, $this->fontSize*1.6);
                imagettftext($this->_image, $this->fontSize, mt_rand(-40, 40), $codeNX, $this->fontSize*1.6, $this->_color, $this->fontttf, $code[$i]);
            }
        }
       
        // 淇濆瓨楠岃瘉鐮�
        $key        =   $this->authcode($this->seKey);
        $code       =   $this->authcode(strtoupper(implode('', $code)));
        $secode     =   array();
        $secode['verify_code'] = $code; // 鎶婃牎楠岀爜淇濆瓨鍒皊ession
        $secode['verify_time'] = NOW_TIME;  // 楠岃瘉鐮佸垱寤烘椂闂�
        session($key.$id, $secode);
                        
        header('Cache-Control: private, max-age=0, no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);		
        header('Pragma: no-cache');
        header("content-type: image/png");

        // 杈撳嚭鍥惧儚
        imagepng($this->_image);
        imagedestroy($this->_image);
    }

    /** 
     * 鐢讳竴鏉＄敱涓ゆ潯杩炲湪涓�璧锋瀯鎴愮殑闅忔満姝ｅ鸡鍑芥暟鏇茬嚎浣滃共鎵扮嚎(浣犲彲浠ユ敼鎴愭洿甯呯殑鏇茬嚎鍑芥暟) 
     *      
     *      楂樹腑鐨勬暟瀛﹀叕寮忓拫閮藉繕浜嗘秴锛屽啓鍑烘潵
     *		姝ｅ鸡鍨嬪嚱鏁拌В鏋愬紡锛歽=Asin(蠅x+蠁)+b
     *      鍚勫父鏁板�煎鍑芥暟鍥惧儚鐨勫奖鍝嶏細
     *        A锛氬喅瀹氬嘲鍊硷紙鍗崇旱鍚戞媺浼稿帇缂╃殑鍊嶆暟锛�
     *        b锛氳〃绀烘尝褰㈠湪Y杞寸殑浣嶇疆鍏崇郴鎴栫旱鍚戠Щ鍔ㄨ窛绂伙紙涓婂姞涓嬪噺锛�
     *        蠁锛氬喅瀹氭尝褰笌X杞翠綅缃叧绯绘垨妯悜绉诲姩璺濈锛堝乏鍔犲彸鍑忥級
     *        蠅锛氬喅瀹氬懆鏈燂紙鏈�灏忔鍛ㄦ湡T=2蟺/鈭Ｏ夆垼锛�
     *
     */
    private function _writeCurve() {
        $px = $py = 0;
        
        // 鏇茬嚎鍓嶉儴鍒�
        $A = mt_rand(1, $this->imageH/2);                  // 鎸箙
        $b = mt_rand(-$this->imageH/4, $this->imageH/4);   // Y杞存柟鍚戝亸绉婚噺
        $f = mt_rand(-$this->imageH/4, $this->imageH/4);   // X杞存柟鍚戝亸绉婚噺
        $T = mt_rand($this->imageH, $this->imageW*2);  // 鍛ㄦ湡
        $w = (2* M_PI)/$T;
                        
        $px1 = 0;  // 鏇茬嚎妯潗鏍囪捣濮嬩綅缃�
        $px2 = mt_rand($this->imageW/2, $this->imageW * 0.8);  // 鏇茬嚎妯潗鏍囩粨鏉熶綅缃�

        for ($px=$px1; $px<=$px2; $px = $px + 1) {
            if ($w!=0) {
                $py = $A * sin($w*$px + $f)+ $b + $this->imageH/2;  // y = Asin(蠅x+蠁) + b
                $i = (int) ($this->fontSize/5);
                while ($i > 0) {	
                    imagesetpixel($this->_image, $px + $i , $py + $i, $this->_color);  // 杩欓噷(while)寰幆鐢诲儚绱犵偣姣攊magettftext鍜宨magestring鐢ㄥ瓧浣撳ぇ灏忎竴娆＄敾鍑猴紙涓嶇敤杩檞hile寰幆锛夋�ц兘瑕佸ソ寰堝				
                    $i--;
                }
            }
        }
        
        // 鏇茬嚎鍚庨儴鍒�
        $A = mt_rand(1, $this->imageH/2);                  // 鎸箙		
        $f = mt_rand(-$this->imageH/4, $this->imageH/4);   // X杞存柟鍚戝亸绉婚噺
        $T = mt_rand($this->imageH, $this->imageW*2);  // 鍛ㄦ湡
        $w = (2* M_PI)/$T;		
        $b = $py - $A * sin($w*$px + $f) - $this->imageH/2;
        $px1 = $px2;
        $px2 = $this->imageW;

        for ($px=$px1; $px<=$px2; $px=$px+ 1) {
            if ($w!=0) {
                $py = $A * sin($w*$px + $f)+ $b + $this->imageH/2;  // y = Asin(蠅x+蠁) + b
                $i = (int) ($this->fontSize/5);
                while ($i > 0) {			
                    imagesetpixel($this->_image, $px + $i, $py + $i, $this->_color);	
                    $i--;
                }
            }
        }
    }

    /**
     * 鐢绘潅鐐�
     * 寰�鍥剧墖涓婂啓涓嶅悓棰滆壊鐨勫瓧姣嶆垨鏁板瓧
     */
    private function _writeNoise() {
        $codeSet = '2345678abcdefhijkmnpqrstuvwxyz';
        for($i = 0; $i < 10; $i++){
            //鏉傜偣棰滆壊
            $noiseColor = imagecolorallocate($this->_image, mt_rand(150,225), mt_rand(150,225), mt_rand(150,225));
            for($j = 0; $j < 5; $j++) {
                // 缁樻潅鐐�
                imagestring($this->_image, 5, mt_rand(-10, $this->imageW),  mt_rand(-10, $this->imageH), $codeSet[mt_rand(0, 29)], $noiseColor);
            }
        }
    }

    /**
     * 缁樺埗鑳屾櫙鍥剧墖
     * 娉細濡傛灉楠岃瘉鐮佽緭鍑哄浘鐗囨瘮杈冨ぇ锛屽皢鍗犵敤姣旇緝澶氱殑绯荤粺璧勬簮
     */
    private function _background() {
        $path = dirname(__FILE__).'/Verify/bgs/';
        $dir = dir($path);

        $bgs = array();		
        while (false !== ($file = $dir->read())) {
            if($file[0] != '.' && substr($file, -4) == '.jpg') {
                $bgs[] = $path . $file;
            }
        }
        $dir->close();

        $gb = $bgs[array_rand($bgs)];

        list($width, $height) = @getimagesize($gb);
        // Resample
        $bgImage = @imagecreatefromjpeg($gb);
        @imagecopyresampled($this->_image, $bgImage, 0, 0, 0, 0, $this->imageW, $this->imageH, $width, $height);
        @imagedestroy($bgImage);
    }

    /* 鍔犲瘑楠岃瘉鐮� */
    private function authcode($str){
        $key = substr(md5($this->seKey), 5, 8);
        $str = substr(md5($str), 8, 10);
        return md5($key . $str);
    }

}
