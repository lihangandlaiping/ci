<?php
/**
 * 后台数据表
 */
class Model extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model_name = 'model';
    }

    function index($modul_id = '', $name = '')
    {
        $modul_id=$this->input->get_post('modul_id','');
        $name=$this->input->get_post('name','');
        $where = array();
        if ($modul_id != '') $where['m1.modul_id'] = $modul_id;
        if ($name != '') $where['m1.name like'] = $name;
        $list=$this->mastermodel->inIt($this->model_name. ' m1')->filed('m1.*,m2.name as modul_name')->joinData(array(array('module m2', 'm2.id=m1.modul_id', 'left')))->getList($where);
        //$list = $this->getListData($this->model_name . ' m1', $where, 'm1.*,m2.name as modul_name', '', '', array(array('module m2', 'm2.id=m1.modul_id', 'left')));
        $module = $this->mastermodel->inIt('module')->getList(array(), 'sort asc');
       /* $this->load->vars('module', $module);
        $this->load->vars('modul_id', $modul_id);*/
        $this->load->view('admin/model/index',array('list' => $list,'module'=>$module,'modul_id'=>$modul_id));
        //return view('index', array('list' => $list,'module'=>$module,'modul_id'=>$modul_id));
    }

    /**
     * 编辑
     */
    function edit()
    {
        if ($parameter=$this->input->post()) {
            $data = $parameter['data'];//input('post.data');
            if ($parameter['action'] == 'edit') {
                $id = $parameter['id'];//input('post.id', '');
               /* $modelvalid=MasterModel::inIt('model')->getCount(array('name'=>$data['name'],'id' => array('neq',$id)));
                if($modelvalid>0)$this->error('该数据库标识以存在');*/
                $line = $this->mastermodel->inIt($this->model_name)->updateData($data, array('id' => $id));
                if ($line) $this->success('修改成功', site_url('index',array('modul_id'=>isset($data['modul_id'])?$data['modul_id']:'')));
                else $this->error('修改失败');
                return false;
            }
            if (!preg_match('/^\w+$/', $data['name'])) $this->error('模型标识格式错误');
            $modelvalid=$this->mastermodel->inIt('model')->getCount(array('name'=>$data['name']));
            if($modelvalid>0)$this->error('该数据库标识以存在');
            $id = $this->mastermodel->inIt($this->model_name)->insertData($data);
            if ($id) {
                $pix=$this->mastermodel->inIt($this->model_name)->dbprefix();
                $this->mastermodel->inIt($this->model_name)->query("CREATE TABLE {$pix}{$data['name']} (
  id int(10) NOT NULL auto_increment,
  PRIMARY KEY  (id)
) ENGINE={$data['engine_type']} AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;");
                $module = $this->mastermodel->inIt('module m')->filed('m.name')->getOne(array('m.id' => $data['modul_id']));
                createControllerView($module['name'], $data['name']);
                $this->success('添加成功', site_url('index',array('modul_id'=>isset($data['modul_id'])?$data['modul_id']:'')));
            } else $this->error('添加失败');


        } else {
           $id= $this->input->get('id');
            $action= $this->input->get('action');
            $_GET['action'] = $action;
            if ($action == 'edit') {
                $info = $this->mastermodel->inIt($this->model_name)->getOne(array('id' => $id));
            } else {
                $info['modul_id'] = $this->input->get('modul_id', '');
            }
            $module = $this->mastermodel->inIt('module')->getList(null, 'sort asc');
            $this->load->view('admin/model/edit',array('info'=>$info,'module'=>$module));
            //return view('edit');
        }
    }

    /**
     * 删除
     */
    function delete()
    {
        $id=$this->input->get_post('id','');
        if (!$id) $this->error('缺少数据id');
        if (!$this->model_name) $this->error('缺少数据库模型名称');
        $arr = array();
        if (strpos($id, ',') !== FALSE) {
            $arr = $this->mastermodel->inIt($this->model_name)->getList(array('id in' => $id));
            $line = $this->mastermodel->inIt($this->model_name)->deleteData(array('id in' => $id));
        } else {
            $arr =$this->mastermodel->inIt($this->model_name)->getList(array('id' => $id));
            $line = $this->mastermodel->inIt($this->model_name)->deleteData(array('id' => $id));
        }
        if ($line) {
            $pix = $this->mastermodel->inIt($this->model_name)->dbprefix();
            foreach ($arr as $row) {
                $this->mastermodel->inIt($this->model_name)->query("DROP TABLE {$pix}{$row['name']}");
            }
            $this->success('删除成功', site_url('index'));
        } else $this->error('删除失败');
    }

    /**
     * 需要显示的字段
     * @param string $id
     */
    function show_filed()
    {
        $id=$this->input->get_post('id','');
        if (!$id)
            $this->error('缺少模型标识');
        $model =$this->mastermodel->inIt('model')->getOne(array('id' => $id));
        $fields = !empty($model['show_filed'])?$model['show_filed']: '';
        if (!$fields) {
            $field =$this->mastermodel->inIt('field f')->filed('f.field,f.name,f.type,ma.name as tables')->joinData(array(array('model ma', 'ma.id=f.model_id', 'left')))->getList(array('f.model_id' => $id, 'f.is_column' => 2));
            foreach($field as $key=>$row)
            {
                $field[$key]['field']=$field[$key]['tables'].'.'.$field[$key]['field'];
                $field[$key]['tables']=$field[$key]['tables'].'_this';
            }
        } else {
            $field = unserialize($fields);
        }
        $this->load->vars('fieldlist', $field);
        $field =$this->mastermodel->inIt('field')->filed('extra,field')->getList(array('model_id' => $id, 'type' => 'tablefield'));
        $newtable = array(array('table'=>!empty($model['name'])?$model['name']:'','field'=>'this'));
        foreach ($field as $row) {
            $vals = array_filter(preg_split('/[\r\n]+/s', $row['extra']));
            foreach ($vals as $v) {
                $v = explode(':', $v);
                if ($v[0] == 'db_table' && $v[1]) {
                    $newtable[]=array('table'=>$v[1],'field'=>$row['field']);
                }
            }
        }
        $this->load->library(array('form'));
        $this->load->vars('form', $this->form);
        $this->load->vars('tables', $newtable);
        $this->load->vars('model_id', $id);
        $this->load->vars('listaction',$model['listaction']);
        $this->load->vars('thismodelname', !empty($model['name'])?$model['name']:'');
        $this->load->view('admin/model/show_filed');
    }

    /**
     * 获取字段
     * @param string $name
     */
    function selectfiled($name = '')
    {
        $list =$this->mastermodel->inIt('field f')->filed('f.*')->joinData(array(array('model m', 'm.id=f.model_id', 'left')))->getListData(array('m.name' => $name));
        array_unshift($list,array('name'=>'id','field'=>'id','type'=>'num'));
        echo json_encode($list);
    }

    /**
     * 保存列表显示字段
     */
    function saveShowField()
    {
        $data = $this->input->post('data','');//input('post.data');
        $model_id = $this->input->post('model_id','');//input('post.model_id', '');
        $listaction=$this->input->post('listaction','');
        $listaction=implode(',',$listaction);
        $newarr = array();
        foreach ($data as $key => $val) {
            $extra = '';
            $field='';
            if ($offset=strrpos($val['field'], '_')) {
                $field=substr($val['field'],$offset+1);
                $a=substr($val['field'],0,$offset).'.'.$field;
            } else {
                $a = $val['field'];
            }
            if (in_array($val['type'], array('bool', 'select', 'radio', 'checkbox', 'tablefield', 'linkage'))) {
                $extras =$this->mastermodel->inIt('model m')->filed('f.extra')->joinData(array(array('field f', 'f.model_id=m.id', 'left')))->getOne(array('m.name' => substr($val['tables'],0,strrpos($val['tables'],'_')), 'f.field' => $field));
                $extra = $extras['extra'];
            }
            $newarr[] = array('field' => $a, 'name' => $val['name'], 'tables' => $val['tables'], 'type' => $val['type'], 'extra' => $extra, 'searchd' => $val['searchd']);
        }
        $line =$this->mastermodel->inIt($this->model_name)->updateData(array('show_filed' => serialize($newarr),'listaction'=>$listaction), array('id' => $model_id));
        if ($line)
            $this->success('保存成功');
        else
            $this->error('保存失败');

    }

    /**
     * 导出数据备份
     * @param string $model_id
     */
    function backup($model_id = '',$bz='')
    {
        $this->load->library(array('dbmanage'));
        $dirname=str_replace('\\','/',FCPATH).'application/admin';
        @mkdir($dirname . '/database',0777);
        $dirpath = $dirname . '/database/' . date('YmdHis') . '/';
        @mkdir($dirpath,0777);
        file_put_contents($dirpath.'bz.txt',$bz);
        $dbs = $this->dbmanage->config($this->mastermodel->db()->hostname,$this->mastermodel->db()->username,$this->mastermodel->db()->password, $this->mastermodel->db()->database);
        $model =$this->mastermodel->inIt('model')->getOne(array('id' => $model_id));
        //$dbs->backup('yanyu_field',APP_PATH.'data/',100);
        //$dbs->restore(APP_PATH.'data/20160928132708_yanyu_field_v1.sql');
        //var_dump( $dbs->msg);
        if ($model_id != '' && $model) {
            $dbs->backup($this->mastermodel->dbprefix() . $model['name'], $dirpath, 100);
        } else {
            $dbs->backup('', $dirpath, 100);
        }
    }

    /**
     * 导入数据备份
     */
    function restore($name='')
    {
        $dirname=str_replace('\\','/',FCPATH).'application/admin';
        $dirpath = $dirname . '/database/' . $name . '/';
        $dbs = $this->dbmanage->config($this->mastermodel->db()->hostname,$this->mastermodel->db()->username,$this->mastermodel->db()->password, $this->mastermodel->db()->database);
        if (false != ($handle = opendir ( $dirpath ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&strpos($file,'.sql')) {
                    $dbs->restore($dirpath.$file);
                }
            }
            //关闭句柄
            closedir ( $handle );
        }

    }

    /**
     * 备份管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    function selectDatabase()
    {
        $dir=str_replace('\\','/',FCPATH).'application/admin' . '/database/';
        $dirArray=array();
        if (false != ($handle = opendir ( $dir ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&!strpos($file,".")) {
                    $dirArray[$i]=$file;
                    $i++;
                }
            }
            //关闭句柄
            closedir ( $handle );
        }

        for($i=0;$i<count($dirArray)-1;$i++)
        {
            for($j=$i+1;$j<count($dirArray);$j++)
            {
                if($dirArray[$j]>$dirArray[$i])
                {
                    $k=$dirArray[$i];
                    $dirArray[$i]=$dirArray[$j];
                    $dirArray[$j]=$k;
                }
            }
        }
        $bz=array();
        foreach($dirArray as $row)
        {
            $bz[$row]=file_get_contents($dir.$row.'/bz.txt');
        }
        $this->load->vars('dirArray',$dirArray);
        $this->load->vars('bz',$bz);
        $this->load->view('admin/model/selectdatabase');
        //return view('selectdatabase');
    }
    /**
     * 获取字段
     * @param string $name
     */
    function selectfield()
    {
        $name=$this->input->get_post('name','');
        $list = $this->mastermodel->inIt('field f')->filed('f.*')->joinData(array(array('model m', 'm.id=f.model_id', 'left')))->getList(array('m.name' => $name));
        array_unshift($list,array('name'=>'id','field'=>'id','type'=>'num'));
        echo json_encode($list);
    }
    /**
     * 下载数据备份
     * @param string $name
     */
    function downloaddatabase($name='')
    {
        $files=str_replace('\\','/',FCPATH).'application/admin' . '/database/'.$name.'/';
        $dirArray=array();
        if (false != ($handle = opendir ( $files ))) {
            $i=0;
            while ( false !== ($file = readdir ( $handle )) ) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".."&&!strpos($file,".txt")) {
                    $dirArray[$i]=$files.$file;
                    $i++;
                }
            }
            //关闭句柄
            closedir ( $handle );
        }
        $filename = str_replace('\\','/',FCPATH).'application/admin'. "/".session_id().".zip"; // 最终生成的文件名（含路径）
// 生成文件
        @unlink($filename);
        $zip = new ZipArchive (); // 使用本类，linux需开启zlib，windows需取消php_zip.dll前的注释
        if ($zip->open ( $filename, ZIPARCHIVE::CREATE ) !== TRUE) {
            exit ( '无法打开文件，或者文件创建失败' );
        }
//$fileNameArr 就是一个存储文件路径的数组 比如 array('/a/1.jpg,/a/2.jpg....');

        foreach ( $dirArray as $val ) {
            $zip->addFile ( $val, basename ( $val ) ); // 第二个参数是放在压缩包中的文件名称，如果文件可能会有重复，就需要注意一下
        }
        $zip->close (); // 关闭
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        ob_clean();
        flush();
        readfile($filename);
        @unlink($filename);
    }

    /**
     * 删除数据备份
     * @param string $name
     */
    function deletedatabase($name='')
    {
        if(!$name)$this->error('数据错误');
        $file=YANYU_ROOT . '/database/'.$name.'/';
        $a=rmdirr($file);
        $this->success('删除成功');

    }

}
