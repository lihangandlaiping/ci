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
 * @param $list
 * @param int $level
 */
function get_menu_select($list,$val=0,$level=0)
{

    foreach($list as $key=>$row)
    {
        $kg='';
        for($i=0;$i<$level;$i++)
        {
            $kg.='&nbsp;&nbsp;&nbsp;&nbsp;';
        }
        if($kg!='')$kg=$kg.'|-';
        $is_selected=$row['id']==$val?'selected=selected':'';
        $html="<option valusd='{$row['title']}' {$is_selected} value='{$row['id']}'>{$kg}{$row['title']}</option>";
        echo $html;
        $CI =& get_instance();
        $newlist=$CI->mastermodel->inIt('menu')->getList(array('pid'=>$row['id'],'hide'=>1));

        if($list) get_menu_select($newlist,$val,$level+1);
    }
}
/**
 * 创建一个模块
 * @param $dirname 模块路径
 * @return bool
 */
function create_module($name)
{
    $dirname=str_replace('\\','/',FCPATH).'application';
    if(@mkdir($dirname.'/admin/controllers/'.$name,0777)&&@mkdir($dirname.'/home/controllers/'.$name,0777)&&@mkdir($dirname.'/home/models/'.$name,0777)&&@mkdir($dirname.'/admin/models/'.$name,0777)&&@mkdir($dirname.'/home/views/'.$name,0777)&&@mkdir($dirname.'/admin/views/'.$name,0777))
    {
        return true;
    }
    return false;
}
/**
 * 生成模型文件
 * @param $mudel
 * @param $model
 */
function createControllerView($mudel,$model)
{
    $model2=strtoupper(substr($model,0,1)).substr($model,1);
    $CI =& get_instance();
    $base_controller=$CI->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>'base_controller'));
    $base_view_index=$CI->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>'base_view_index'));
    $base_view_edit=$CI->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>'base_view_edit'));
    $dirname=str_replace('\\','/',FCPATH).'application';
    $controllersa="<?php
    class {$model2}admin extends MY_Controller
{
private ".'$mudel_name='."'{$mudel}';
function __construct()
    {
        parent::__construct();
        ".'$this->model_name = '."'{$model}';
    }
    ";
    $controllersh="<?php
    class {$model2}home extends MY_Controller
{
private ".'$mudel_name='."'{$mudel}';
function __construct()
    {
        parent::__construct();
        ".'$this->model_name = '."'{$model}';
    }
    ";
    $models="<?php
    class {$model2} extends MY_Model
{
    function __construct(".'$table='."'')
    {
        parent::__construct(".'$table'.");
    }
    public function inIt(".'$table='."'')
    {
        return new static(".'$table'.");
    }
}";
    if(!file_exists($dirname.'/admin/views/'.$mudel.'/'.$model))@mkdir($dirname.'/admin/views/'.$mudel.'/'.$model,0777);
    if(!file_exists($dirname.'/home/views/'.$mudel.'/'.$model))@mkdir($dirname.'/home/views/'.$mudel.'/'.$model,0777);
    $adminc=$dirname.'/admin/controllers/'.$mudel.'/'.$model2.'admin.php';
    $adminm=$dirname.'/admin/models/'.$mudel.'/'.$model2.'.php';
    $adminv1=$dirname.'/admin/views/'.$mudel.'/'.$model.'/index.php';
    $adminv2=$dirname.'/admin/views/'.$mudel.'/'.$model.'/edit.php';

    $homec=$dirname.'/home/controllers/'.$mudel.'/'.$model2.'home.php';
    $homem=$dirname.'/home/models/'.$mudel.'/'.$model2.'.php';
    $homev=$dirname.'/home/views/'.$mudel.'/'.$model.'/index.php';

    file_put_contents($adminc,$controllersa.$base_controller['content'].'
    }');

    file_put_contents($homec,$controllersh.'
    }');

    file_put_contents($adminm,$models);

    file_put_contents($homem,$models);

    file_put_contents($adminv1,$base_view_index['content']);

    file_put_contents($adminv2,$base_view_edit['content']);

    file_put_contents($homev,'<html>M</html>');

}
/**
 * 获取 字段类型
 * @param string $key
 * @return array
 */
function getFieldType($key='')
{
    $arr= array(
        'string'=>'varchar(255) NOT NULL',
        'textarea'=>'text NOT NULL',
        'password'=>'char(32) NOT NULL',
        'editor'=>'text NOT NULL',
        'num'=>'int(10) UNSIGNED NOT NULL',
        'money'=>'decimal(10,2)',
        'date'=>'int(10) NOT NULL',
        'datetime'=>'int(10) NOT NULL',
        'bool'=>'tinyint(2) NOT NULL',
        'select'=>'char(50) NOT NULL',
        'linkage'=>'varchar(100) NOT NULL',
        'radio'=>'char(10) NOT NULL',
        'checkbox'=>'varchar(100)',
        'thumb'=>'varchar(100) NOT NULL',
        'images'=>'mediumtext',
        'attach'=>'varchar(255) NOT NULL',
        'attachs'=>'mediumtext',
        'tablefield'=>'varchar(255) NOT NULL',

    );
    if($key!='')return $arr[$key];
    else return $arr;
}
/**
 * 获取表 的关联查询对象
 * @param $name
 * @return mixed
 */
function tableRelation($name)
{
    $CI =& get_instance();
    $list=$CI->mastermodel->inIt('field f')->filed('f.*')->joinData(array(array('model m','m.id=f.model_id','left')))->getList(array('m.name'=>$name,'f.type'=>'tablefield'));
    $join=array();
    foreach($list as $row)
    {
        if(!$row['extra'])continue;
        $extra=array_filter(preg_split('/[\r\n]+/s',$row['extra']));
        $newarray=array();
        foreach($extra as $r)
        {
            $tmp=explode(':',$r);
            if(isset($tmp[1]))
                $newarray[trim($tmp[0])]=trim($tmp[1]);
        }
        if(!isset($newarray['db_table']))continue;
        $join[]=array("{$newarray['db_table']} `{$newarray['db_table']}_{$row['field']}`","{$name}.{$row['field']}={$newarray['db_table']}_{$row['field']}.{$newarray['primary_key']}",'left');

    }
    return $join;
}
/**
 * 后台权限验证
 */
function adminAouth($roleid,$menuid)
{
    $CI =& get_instance();
    $rules=$CI->mastermodel->inIt('user_role')->filed('rules')->getOne(array('roleid'=>$roleid));
    $rules=explode(',',$rules['rules']?:'');
    if(in_array($menuid,$rules))
    {
        return true;
    }
    else
    {
        return false;
    }
}

/**
 * 获取上级菜单
 * @param $id
 * @param string $str
 * @return string
 */
function getParentMenu($id,$str='')
{
    $CI =& get_instance();
    $rules=$CI->mastermodel->inIt('menu m1')->filed('m1.pid,m2.title,m2.url')->joinData(array(array('menu m2','m1.pid=m2.id','left')))->getOne(array('m1.id'=>$id));
    if($rules['url'])$str="<a href='".site_url($rules['url'])."'>{$rules['title']}</a>>>".$str;
    if($rules['pid'])
    {
        getParentMenu($rules['pid'],$str);
    }
    return $str;
}