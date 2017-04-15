<?php
/**
 * 后台模块管理
 */

class Module extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='module';
    }
    function index()
    {
        $list=$this->mastermodel->inIt($this->model_name)->getList(array(),'sort asc');
        $this->load->view('admin/module/index',array('list'=>$list));
        //return view('index',array('list'=>$list));
    }

    /**
     * 编辑
     */
    function edit()
    {
        if($parameter=$this->input->post())
        {
            $data=$parameter['data'];//input('post.data');

                if($parameter['action']=='edit')
                {
                    $id=$parameter['id'];//input('post.id','');
                    /*$modulevalid=MasterModel::inIt('module')->getCount(array('name'=>$data['name'],'id'=>array('neq',$id)));
                    if($modulevalid>0)$this->error('模块标识以存在');*/
                    try{
                        $line=$this->mastermodel->inIt($this->model_name)->updateData($data,array('id'=>$id));
                    }catch (\Exception $e)
                    {
                        $this->error('添加失败');
                    }
                    if($line)$this->success('修改成功',site_url('index'));
                    else $this->error('修改失败');
                    return false;
                }
            if(!preg_match('/^\w+$/',$data['name']))$this->error('模块标识格式错误');
            $data['name']=strtolower($data['name']);
            $modulevalid=$this->mastermodel->inIt('module')->getCount(array('name'=>$data['name']));
            if($modulevalid>0)$this->error('模块标识以存在');
                try{
                    $id= $this->mastermodel->inIt($this->model_name)->insertData($data);
                }catch (\Exception $e)
                {
                    $this->error('添加失败');
                }
                if($id&&create_module($data['name'])){
                    $this->success('添加成功',site_url('index'));
                }
                else $this->error('添加失败');
        }
        else
        {
            $id=$this->input->get('id');
            $action=$this->input->get('action');
            $_GET['action']=$action;
            if($action=='edit')
            {
                $info=$this->mastermodel->inIt($this->model_name)->getOne(array('id'=>$id));
                $this->load->vars('info',$info);
                //$this->assign('info',$info);
            }
            $this->load->view('admin/module/edit');
            //return view('edit');
        }
    }
    /**
     * 删除
     * @param string $id
     */
    function delete()
    {
        $id=$this->input->get_post('id','');
        if(!$id)$this->error('缺少数据id');
        if(!$this->model_name)$this->error('缺少数据库模型名称');
        $models=array();
        if(strpos($id,',')!==FALSE)
        {
            $models=$this->mastermodel->inIt($this->model_name)->getList(array('id in'=>$id));
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('id in'=>$id));
        }
        else
        {
            $models=$this->mastermodel->inIt($this->model_name)->getList(array('id'=>$id));
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('id'=>$id));
        }
        $dirname=str_replace('\\','/',FCPATH).'application';
        foreach($models as $row)
        {
            $path=$dirname.'/admin/controllers/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);

            $path=$dirname.'/home/controllers/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);

            $path=$dirname.'/admin/models/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);

            $path=$dirname.'/home/models/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);

            $path=$dirname.'/admin/views/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);

            $path=$dirname.'/home/views/'.$row['name'];
            if($row['name']&&file_exists($path)) rmdirr($path);
        }
        if($line)$this->success('删除成功',site_url('index'));
        else $this->error('删除失败');
    }


}
