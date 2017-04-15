<?php
/**
 * 后台字段管理
 */
class Field extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='field';

    }
    function index()
    {
        $model_id=$this->input->get('model_id','');
        $name=$this->input->get('name','');
        $field=$this->input->get('field','');
        $_GET['model_id']=$model_id;
        $where=array();
        if($model_id!='')$where['model_id']=$model_id;
        else $this->error('缺少模型标识');
        if($name!='')$where['name like']=$name;
        if($field!='')$where['field like']=$field;
        $list=$this->mastermodel->inIt($this->model_name.' m1')->getList($where);
        $this->load->view('admin/field/index',array('list'=>$list));
    }

    /**
     * 编辑
     */
    function edit()
    {
        $model_id=$this->input->get_post('model_id','');
        $action=$this->input->get_post('action','add');
        $id=$this->input->get_post('id','');
        $_GET['model_id']=$model_id;
        if($parameter=$this->input->post())
        {
            $data=$parameter['data'];//input('post.data');
            if(!$data['type'])$this->error('请选择数据类型');
            if(!$data['name'])$this->error('请填写字段名');
            if(!preg_match('/^\w+$/',$data['field']))$this->error('字段标识格式错误');
            if($action=='edit')
            {
                $id=$parameter['id'];//input('post.id','');
                $fieldvalid=$this->mastermodel->inIt('field')->getCount(array('model_id'=>$model_id,'field'=>$data['field'],'id !='=>$id));
                if($fieldvalid>0)$this->error('该字段标示以存在');
                $fieldold=$this->mastermodel->inIt('field')->getOne(array('id'=>$id));
                $line=$this->mastermodel->inIt($this->model_name)->updateData($data,array('id'=>$id));
                if($line){
                    $pix=$this->mastermodel->inIt($this->model_name)->dbprefix();
                    $models= $this->mastermodel->inIt('model')->getOne(array('id'=>$data['model_id']));
                    if($data['value']!=='')$defaultval="DEFAULT '{$data['value']}'";
                    else $defaultval="";
                    $type=getFieldType($data['type']);
                    $sql="ALTER TABLE {$pix}{$models['name']} CHANGE COLUMN {$fieldold['field']} {$data['field']} {$type} {$defaultval} COMMENT '{$data['title']} {$data['remark']}'";
                    //exit($sql);
                    $this->mastermodel->inIt($this->model_name)->query($sql);
                    $this->success('修改成功',site_url('index',array('model_id'=>$data['model_id'])));
                }
                else $this->error('修改失败');
                return false;
            }
                $fieldvalid=$this->mastermodel->inIt('field')->getCount(array('model_id'=>$model_id,'field'=>$data['field']));
                if($fieldvalid>0)$this->error('该字段标示以存在');
                $models= $this->mastermodel->inIt('model')->getOne(array('id'=>$data['model_id']));
                $pix=$this->mastermodel->inIt($this->model_name)->dbprefix();
                if($data['value']!=='')$defaultval="DEFAULT '{$data['value']}'";
                else $defaultval="";
                $type=getFieldType($data['type']);
                $sql="ALTER TABLE {$pix}{$models['name']} ADD COLUMN {$data['field']} {$type} {$defaultval} COMMENT '{$data['title']} {$data['remark']}'";
                $this->mastermodel->inIt($this->model_name)->query($sql);
                $id= $this->mastermodel->inIt($this->model_name)->insertData($data);
                if($id){
                    $this->success('添加成功',site_url('index',array('model_id'=>$model_id)));
                }
                else $this->error('添加失败');

        }
        else
        {
            $_GET['action']=$action;
            if($action=='edit')
            {
                $info=$this->mastermodel->inIt($this->model_name.' m1')->joinData(array(array('model m2','m1.model_id=m2.id','left')))->filed('m1.*,m2.name as model_name')->getOne(array('m1.id'=>$id));
                $this->load->vars('info',$info);
            }
            $this->load->view('admin/field/edit');
            //return view('edit');
        }
    }
    /**
     * 批量添加
     */
    function add_all()
    {
        $action=$this->input->get_post('action','add');
        $model_id=$this->input->get_post('model_id','');
        $_GET['model_id']=$model_id;
        if($parameter=$this->input->post())
        {
            $datas=$parameter['data'];
            $is_true=false;
            foreach($datas as $data)
            {
                if(!$data['type']||!$data['field'])continue;
                if(!$data['name'])$this->error('请填写字段名');
                if(!preg_match('/^\w+$/',$data['field']))continue;
                $fieldvalid=$this->mastermodel->inIt('field')->getCount(array('model_id'=>$model_id,'field'=>$data['field']));
                if($fieldvalid>0)continue;
                $data['title']='';
                $data['remark']='';
                $id= $this->mastermodel->inIt($this->model_name)->insertData($data);
                if($id){
                    $is_true=true;
                    $models= $this->mastermodel->inIt('model')->getOne(array('id'=>$data['model_id']));
                    $pix=$this->mastermodel->inIt($this->model_name)->dbprefix();
                    if($data['value']!=='')$defaultval="DEFAULT '{$data['value']}'";
                    else $defaultval="";
                    $type=getFieldType($data['type']);
                    try
                    {
                        $sql="ALTER TABLE {$pix}{$models['name']} ADD COLUMN {$data['field']} {$type} {$defaultval} COMMENT '{$data['title']} {$data['remark']}'";
                        $this->mastermodel->inIt($this->model_name)->query($sql);
                    }catch (\Exception $e)
                    {

                    }


                }
            }
            if($is_true)
            $this->success('添加成功',site_url('index',array('model_id'=>$model_id)));
            else
            $this->error('添加失败');
        }
        else
        {
            $_GET['action']=$action;
            $this->load->view('admin/field/add_all');
            //return view('add_all');
        }
    }

    /**
     * 删除
     */
    function delete()
    {
        $id=$this->input->get_post('id','');
        if(!$id)$this->error('缺少数据id');
        if(!$this->model_name)$this->error('缺少数据库模型名称');
        $arr=array();
        if(strpos($id,',')!==FALSE)
        {
            $arr= $this->mastermodel->inIt($this->model_name.' m1')->filed('m1.*,m2.name as model_name')->joinData(array(array('model m2','m1.model_id=m2.id','left')))->getList(array('m1.id'=>array('in',$id)));
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('id'=>array('in',$id)));
        }
        else
        {
            $arr= $this->mastermodel->inIt($this->model_name.' m1')->filed('m1.*,m2.name as model_name')->joinData(array(array('model m2','m1.model_id=m2.id','left')))->getList(array('m1.id'=>$id));
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('id'=>$id));

        }
        if($line){
            $pix=$this->mastermodel->inIt($this->model_name)->dbprefix();
            try
            {
                foreach($arr as $row)
                {

                    $this->mastermodel->inIt($this->model_name)->query("alter table {$pix}{$row['model_name']} drop column {$row['field']}");
                }
            }catch (\Exception $e)
            {

            }

            $this->success('删除成功',site_url('index',array('model_id'=>$arr[0]['model_id'])));
        }
        else $this->error('删除失败');
    }

    /**
     * 表单显示、列表显示 设置
     * @param string $model_id
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    function getFieldShow()
    {
        $model_id=$this->input->get_post('model_id','');
        $type=$this->input->get_post('type','1');
        if($model_id=='')
        $this->error('缺少模型标识');
        $order='is_show desc,show_srot asc';
        $list=$this->mastermodel->inIt($this->model_name)->getList(array('model_id'=>$model_id),$order);
        $this->load->vars('list',$list);
        $this->load->view('admin/field/field_show');
        //return view('field_show');
    }

    /**
     * 修改字段信息
     */
    function updateFieldShow()
    {
        $data=$this->input->post('data','');
            foreach($data as $key=>$val)
            {
                $this->mastermodel->inIt($this->model_name)->updateData($val,array('id'=>$key));
            }
            $this->success('操作成功');
    }

}
