<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 16:14
 */
class Appalipayscancode{
    private $appId='';
    private $seller_id='';
    private $private_key='';
    private $subject='';
    private $scan_public_key='';
    function __construct($app_id='',$seller_id='',$private_key='',$subject='',$scan_public_key='')
    {
       if($app_id) $this->appId=$app_id;
        if($seller_id) $this->seller_id=$seller_id;
        if($private_key) $this->private_key=$private_key;
        if($subject) $this->subject=$subject;
        if($scan_public_key) $this->scan_public_key=$scan_public_key;
    }

    /**
     * @param $ordersn
     * @param $auth_code
     * @param $totalAmount
     * @param $notify_url
     * @return array
     */
    function index($ordersn,$auth_code,$totalAmount,$notify_url)
    {

        require_once 'alipay/lib/f2fpay/model/builder/AlipayTradePayContentBuilder.php';
        require_once 'alipay/lib/f2fpay/service/AlipayTradeService.php';
        $config=array(
            //签名方式,默认为RSA2(RSA2048)
            'sign_type' => "RSA",

            //支付宝公钥
            'alipay_public_key' => $this->scan_public_key,

            //商户私钥
            'merchant_private_key' => $this->private_key,

            //编码格式
            'charset' => "UTF-8",

            //支付宝网关
            'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

            //应用ID
            'app_id' => $this->appId,

            //异步通知地址,只有扫码支付预下单可用
            'notify_url' => $notify_url,

            //最大查询重试次数
            'MaxQueryRetry' => "10",

            //查询间隔
            'QueryDuration' => "3"
        );
        $barPayRequestBuilder = new \AlipayTradePayContentBuilder();
        $barPayRequestBuilder->setOutTradeNo($ordersn);
        $barPayRequestBuilder->setTotalAmount($totalAmount);
        $barPayRequestBuilder->setAuthCode($auth_code);
        $barPayRequestBuilder->setTimeExpress("5m");
        $barPayRequestBuilder->setSubject($this->subject);
        $barPay = new AlipayTradeService($config);
        $barPayResult = $barPay->barPay($barPayRequestBuilder);
        $result=array('code'=>0,'msg'=>'支付宝支付失败','obj'=>$barPayResult);
        switch ($barPayResult->getTradeStatus()) {
            case "SUCCESS":
                $result['code']=1;
                $result['msg']='支付宝支付成功';
                break;
            case "FAILED":

                break;
            case "UNKNOWN":
                $result['msg']='系统异常，订单状态未知!!!';
                break;
            default:
                $result['msg']='不支持的交易状态，交易返回异常!!!';
                break;
        }
        return $result;
    }
}