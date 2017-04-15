<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('action'))
{
    function action($url,$var=[])
    {
        $url=array_filter(explode('/',$url));
        $function=end($url);
        array_pop($url);
        $class=end($url);$class=strtoupper(substr($class,0,1)).substr($class,1);
        array_pop($url);
        if(!class_exists($class))require_once './'.APPPATH.implode($url).'/'.$class.'.php';
        return call_user_func_array(array(new $class(), $function), $var);

    }
}

if ( ! function_exists('modelConfig'))
{
    /**
     * 获取数据库配置
     * @param $name
     * @param string $val
     * @return string
     */
    function modelConfig($name,$val='')
    {
        $CI =& get_instance();
        if($val)
        {
            if($CI->mastermodel->inIt('config')->getCount(array('name'=>$name)))
            {
                $CI->mastermodel->inIt('config')->updateData(array('content'=>$val),array('name'=>$name));
            }
            else
            {
                $CI->mastermodel->inIt('config')->insertData(array('content'=>$val,'name'=>$name));
            }
            return true;
        }
        else
        {
            if($val=$CI->cache->get('modelconfig_'.$name))return $val;
            else {
                $info=$CI->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>$name));
                $CI->cache->save('modelconfig_'.$name,$info['content']);
                return $info['content'];
            }

        }
    }
}
/**
 * 返回当前模块控制器
 */
if (!function_exists('qls_mcf'))
{
    function qls_mcf()
    {
        $CI =& get_instance();
        $baseUrl=array_filter(array($CI->uri->segment(1,''),$CI->uri->segment(2,''),$CI->uri->segment(3,'')));
        if(empty($baseUrl)){$baseUrl=explode('/',$CI->router->routes['default_controller'].'/index');}
        return implode('/',$baseUrl);
    }
}
/**
 * 删除文件夹及下面的文件
 * @param $dirname
 * @return bool
 */
function rmdirr($dirname) {

    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
    }
    $dir->close();
    return rmdir($dirname);
}

/**
 * 错误时返回结果
 * @param $msg ,错误信息
 * @parma $code,错误编码
 **/

function error_app($msg)
{
    // header('Content-Type:application/json;charset=utf-8');
    $array = array(
        're_msg'=> $msg,
        're_code'=> 'fail',
        'plulist'=> array(),
    );
    return json_encode($array);
}
/**
 * 成功时返回结果
 **/
function success_app($msg='',$data = array())
{
    //header('Content-Type:application/json;charset=utf-8');
    if(empty($data))
    {
        $array = array(
            're_msg'=> $msg,
            're_code'=> 'success',
            'plulist'=>array()
        );
    }
    else
    {
        $array = array(
            're_msg'=> $msg,
            're_code'=> 'success',
            'plulist'=>$data
        );
    }
    return json_encode($array);
}

/**
 * @param $arr
 * @param $str
 * @return int
 * 数组字段求和
 */
function arrSum($arr, $str)
{
    if (is_array($arr)) {
        $num = 0;
        foreach ($arr as $k => $v) {
            $num += $v[$str];
        }
        return $num;
    } else {
        return 0;
    }
}
/**
 * @param $arr
 * @param $str
 * @return int
 * 数组字段字段
 */
function getArrField($arr, $str)
{
    if (is_array($arr)) {
        $arr_str = array();
        foreach ($arr as $k => $v) {
            $arr_str[] = $v[$str];
        }
        return $arr_str;
    } else {
        return false;
    }
}