<?php
class Weixin {
    private $appid='wx642b2e28dbebd317';//微信appid
    private $appsecret='5c200cf07238ab97259a16574227fca5';//微信应用密钥
    private $mchid='';//微信商户号
    private $appkey='';//微信支付秘钥
    private $vouchername='';//微信接口凭证路径 access_token存放
    private $js_ticket='';//微信接口凭证路径ticket存放
    private $token='mytoken';
   function __construct()
   {

   }

    /**
     * 响应事件
     */
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            //file_put_contents('wx.txt',$postObj);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $msgType=$postObj->MsgType;
            $keyword = trim($postObj->Content);
            $time = time();
            $postObjArray=array();
            foreach($postObj as $key=>$val)
            {
                $postObjArray[$key]=$val;
            }
            switch($msgType)
            {

                case 'event':
                    if($postObj->Event=='subscribe')//订阅
                    {

                    }
                    elseif($postObj->Event=='LOCATION')//上报地理位置
                    {

                        echo 'success';
                    }
                    elseif($postObj->Event=='CLICK')
                    {

                    }
                    break;
                case 'text':
                    break;
            }

        }else {
            echo "";
            exit;
        }
        echo "";
        exit;
    }

    /**
     * 创建菜单
     * @param $data
     * @return array
     */
     function crate_menu($data)
    {
        $access_token=$this->get_access_token();
        $url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
        // var_dump($create_data);exit;
        $result=$this->send_request($url,'post',$data);
        $result=json_decode($result,true);
        if($result['errcode']==0)
            return array('code'=>1,'msg'=>'菜单生成成功');
        return array('code'=>0,'msg'=>'菜单生成失败');
    }

    /**发送模板消息
     * @param $openid
     * @param $template_id
     * @param $url
     * @param $data
     * @return bool
     */
     function send_template_message($openid,$template_id,$url,$data)
    {
        $access_token=$this->get_access_token();
        $urls="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
        $data=array("touser"=>$openid,'template_id'=>$template_id,'url'=>$url,'data'=>$data);
        $result=$this->send_request($urls,'post',$data);
        $result=json_decode($result,true);
        if($result['errcode']==0)
            return true;
        return false;
    }
    /**
     * 获取js 凭证
     * @return mixed
     */
    function get_js_config()
    {
        $hash = '';
        $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < 16; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        $data['noncestr']=$hash;
        $data['jsapi_ticket']=$this->get_js_ticket();
        $data['timestamp']=time();
        $data['url=']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        ksort($data);
        $str='';
        foreach($data as $key=>$val)
        {
            $str.='&';
            $str.=$key.'='.$val;
        }
        $str=mb_substr($str,1,'utf-8');
        $data['signature']=sha1($str);
        return $data;
    }

    /**
     * 获取Js调用凭证
     * @return bool
     */
    function get_js_ticket()
    {
        $CI =& get_instance();
        $data=$CI->cache->get('js_ticket');//file_get_contents($this->js_ticket);
        $data=unserialize($data);
        if(empty($data)||$data['endtime']<time())
        {
            $access_token=$this->get_access_token();
            $url="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$access_token}&type=jsapi";
            $result=$this->send_request($url);
            $result=json_decode($result,true);
            if($result['errcode']==0)
            {
                $CI->cache->save('js_ticket',array('access_token'=>$result['access_token']),7000);
                //file_put_contents($this->js_ticket,serialize(array('access_token'=>$result['access_token'],'endtime'=>time()+7000)));
                return $result['ticket'];
            }
            unlink($this->js_ticket);
            return false;
        }
        else
        {
            return $data['access_token'];
        }
    }
    /**
     * 获取相对空闲的一个客服
     * @return mixed
     */
    function get_line_info()
    {
        $access_token=$this->get_access_token();
        $url="https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token={$access_token}";
        $result=$this->send_request($url);
        $result=json_decode($result,true);
        $list=$result['kf_online_list'];
        if(!empty($list))
        {
            for($i=0;$i<count($list)-1;$i++)
            {
                for($j=$i+1;$j<count($list);$j++)
                {
                    if($list[$i]['accepted_case']>$list[$j]['accepted_case'])
                    {
                        $k=$list[$i];
                        $list[$i]=$list[$j];
                        $list[$j]=$k;
                    }
                }
            }
            $info=$list[0];
            return $info;
        }
    }

    /**
     * 检验微信接入
     * @return bool
     */
    protected  function checkSignature()
    {
        $signature = $_GET["signature"];    //微信加密签名
        $timestamp = $_GET["timestamp"];    //时间戳
        $nonce = $_GET["nonce"];            //随机数
        $token = $this->token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);      //进行字典序排序
        //sha1加密后与签名对比
        if( sha1(implode($tmpArr)) == $signature ){
            return true;
        }else{
            return false;
        }

    }

    /**
     * 上传图片素材到微信
     */
    function upload_img_wx($file)
    {
        $filename=$_SERVER['DOCUMENT_ROOT'].__ROOT__.$file;
        $img=pathinfo($filename);
        $imginfo=filesize($filename);
        //$imginfo=$imginfo/1000;
        //$type=filetype($filename);
        $data['media']='@'.$filename;
        $data['form-data']=array('filename'=>$file,'content-type'=>$img['extension'],'filelength'=>$imginfo);
        $access_token=$this->get_access_token();
        $result=$this->send_request("https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token={$access_token}",'post',$data);
        $result=json_decode($result,true);
        if($result['url'])
        {
            return $result['url'];
        }
       return false;
    }


    /**
     * 根据openid 进行群发
     */
    function mass_openid($data)
    {
            $access_token=$this->get_access_token();
            $result=$this->send_request("https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token={$access_token}",'post',json_encode($data));
            $result=json_decode($result,true);
            if($result['errcode']==0)
            {
                return true;
            }
            return false;
    }
    /**
     * 转发到服务
     */
    function send_service($postObj)
    {
        //if(empty($kfaccount)){echo '';exit;}
        $content=" <xml>
     <ToUserName><![CDATA[%s]]></ToUserName>
     <FromUserName><![CDATA[%s]]></FromUserName>
     <CreateTime>%s</CreateTime>
     <MsgType><![CDATA[transfer_customer_service]]></MsgType>
 </xml>";
        $resultStr=sprintf($content, $postObj->FromUserName, $postObj->ToUserName, time());
        echo $resultStr;exit;
    }
    /**
     * 发送纯文本类容
     * @param $postObj
     * @param $content
     */
    function send_text_content($postObj,$contents)
    {
        $content="<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        $resultStr=sprintf($content, $postObj->FromUserName, $postObj->ToUserName, time(), $contents);
        echo $resultStr;exit;
    }

    /**
     * 图文推送
     * @param $postObj
     * @param array $data
     */
    function send_img_text_content($postObj,$data=array())
    {
        $count=count($data);
        $content="<xml>
<ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
<FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
<CreateTime>".time()."</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>{$count}</ArticleCount>
<Articles>";
        foreach($data as $key=>$val)
        {
            $content.="<item>
<Title><![CDATA[".$val['tile']."]]></Title>
<Description><![CDATA[".$val['content']."]]></Description>
<PicUrl><![CDATA[".$val['img']."]]></PicUrl>";
            if($val['url'])
            {
                $content.="<Url><![CDATA[".$val['url']."]]></Url>";
            }
        $content.="</item>";
        }
        $content.="</Articles>
</xml>";
        echo $content;exit;
    }
    /**
     * 获取用户openid
     */
    function get_openid()
    {
        $CI =& get_instance();
        $openid=$CI->session->userdata('wx_openid');
        if($openid)return $openid;
        if(!isset($_GET['code']))
        {
            $redirect_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $redirect_url=urlencode($redirect_url);
            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->appid}&redirect_uri={$redirect_url}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
            redirect($url);return false;
        }
        else
        {
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appsecret}&code={$_GET['code']}&grant_type=authorization_code";
            $result=$this->send_request($url);
            $result=json_decode($result,true);
            if(isset($result['errcode']))
            {
                return false;
            }
            else
            {
                $openid=$result['openid'];
                $access_token=$result['access_token'];
                $url="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid={$this->appid}&grant_type=refresh_token&refresh_token={$result['refresh_token']} ";
                $result=$this->send_request($url);
                $result=json_decode($result,true);
                if(isset($result['access_token'])){return $result['openid'];}
                $CI->session->set_userdata('wx_openid',$openid);
                return $openid;
            }
        }
    }
    /**
     * 网页授权
     * @return mixed
     */
    protected function authorize()
    {
        if(!isset($_GET['code']))
        {
            $redirect_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->appid}&redirect_uri={$redirect_url}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
            redirect($url);return false;
        }
        else
        {
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->appsecret}&code={$_GET['code']}&grant_type=authorization_code";
            $result=$this->send_request($url);
            $result=json_decode($result,true);
            if(isset($result['errcode']))
            {
                return false;
            }
            else
            {
                $openid=$result['openid'];
                $access_token=$result['access_token'];
                $url="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid={$this->appid}&grant_type=refresh_token&refresh_token={$result['refresh_token']} ";
                $result=$this->send_request($url);
                $result=json_decode($result,true);
                if(isset($result['access_token'])){$access_token=$result['access_token'];$openid=$result['openid'];}
                //$access_token=$this->get_access_token();
                $url="https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
                $result=$this->send_request($url);
                $result=json_decode($result,true);
                if(isset($result['errcode']))
                {
                    exit('用户信息拉取失败');
                }
                return $result;
            }
        }

    }

    /**
     * 获取微信用户的信息
     */
    protected function get_wx_user($openid)
    {
        $access_token=$this->get_access_token();
        if($access_token===false)
        {
           exit('access_token获取失败');
        }
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";
        $result=$this->send_request($url);
        $result=json_decode($result,true);
        if(isset($result['errcode']))
        {
            exit('获取失败');
        }
        else
        {
            return $result;
        }
    }
    /**
     * 获取 access_token
     * @return bool
     */
    protected function get_access_token()
    {
        $CI =& get_instance();
        $data=$CI->cache->get('vouchername');//file_get_contents($this->vouchername);
        $data=unserialize($data);
        if(empty($data)||$data['endtime']<time())
        {
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appid}&secret={$this->appsecret}";
            $result=$this->send_request($url);
            $result=json_decode($result,true);
            $bey=$CI->cache->save('vouchername',array('access_token'=>$result['access_token']),7000);//file_put_contents($this->vouchername,serialize(array('access_token'=>$result['access_token'],'endtime'=>time()+7000)));
            if($bey>0&&isset($result['access_token']))
            {
                return $result['access_token'];
            }
            else
            {
               // unlink($this->vouchername);
                return false;
            }
        }
        else
        {
            return $data['access_token'];
        }
    }

    /**
     * 微信签名
     */
     function wxSign($data,$keys)
    {
        ksort($data);
        $str='';
        foreach($data as $key=>$val)
        {
            if($val)
            {
                if($str!='')$str.='&';
                $str.="{$key}={$val}";
            }
        }
        $str.='&key='.$keys;
        $sign=strtoupper(MD5($str));
        return $sign;
    }

    /**
     * @param $url
     * @param string $type 请求方式
     * @param string $postdata post数据 数组格式
     * @return mixed
     */
    protected function send_request($url,$type='get',$postdata='')
    {

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //设置访问路径
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); //设置可以返回字符串
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        $head=array('User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36');
        curl_setopt($ch, CURLOPT_HTTPHEADER,$head);
        if($type=='post')
        {

            curl_setopt($ch, CURLOPT_POST,TRUE);//post请求
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);//设置传递的参数

        }
        $request=curl_exec($ch);
        curl_close($ch);
        return $request;
    }
}