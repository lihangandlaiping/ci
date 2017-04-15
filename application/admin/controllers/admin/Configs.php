<?php
/**
 * 后台配置管理
 */
class Configs extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='config';
    }
    function index()
    {
        $name=$this->input->get_post('name');
        $title=$this->input->get_post('title');
        $where=array('m1.is_show'=>1);
        if($name!='')$where['m1.name']=array('like','%'.$name.'%');
        if($title!='')$where['m1.title']=array('like','%'.$title.'%');
        $list=$this->mastermodel->inIt($this->model_name.' m1')->filed('m1.*')->getPageList($where);
        $this->load->vars('list',$list['list']);
        $this->load->vars('_p',$list['page']);
        //$list=$this->getListData( $this->model_name.' m1',$where,'m1.*,m.name as module_name','','',array(array('module m','m.id=m1.module_id','left')));

        $this->load->view('admin/config/index');
        //$this->assign('module',$module);
       // return view('index',array('list'=>$list));
    }

    /**
     * 编辑
     */
    function edit($id='',$action='add')
    {
        $id=$this->input->get_post('id','');
        $action=$this->input->get_post('action','add');
        if($parameter=$this->input->post())
        {
            $data=$parameter['data'];//('post.data');
            $data['content']=$parameter['data_contents'];
            if($parameter['action']=='edit')
            {
                $id=$parameter['id'];
                $line=$this->mastermodel->inIt($this->model_name)->updateData($data,array('id'=>$id));
                if($line){
                    $this->success('修改成功',site_url('index'));
                }
                else $this->error('修改失败');
                return false;
            }
                $id= $this->mastermodel->inIt($this->model_name)->insertData($data);
                if($id){
                    $this->success('添加成功',site_url('index'));
                }
                else $this->error('添加失败');
        }
        else
        {
            $_GET['action']=$action;
            if($action=='edit')
            {
                $info=$this->mastermodel->inIt($this->model_name.' m1')->getOne(array('m1.id'=>$id));
                $this->load->vars('info',$info);
            }

            $this->load->view('admin/config/edit');
        }
    }

    /**
     *
     */
    function data_content()
    {
        $type=$this->input->get_post('type','1');
        $val=$this->input->get_post('val','');
        $this->load->library('form');
        $html='';
        if($type==1)
        {

            $html=$this->form->textearaform('data_contents',$val?$val:'');//字符串文本格式
        }
        else if($type==2)
        {

            $html = $this->form->timeform('data_contents',$val?$val:date('Y-m-d'));//日期格式
        }
        else if($type==3)
        {

            $html = $this->form->initImgUpload('data_contents',$val?$val:'');//图片上传
        }
        else if($type==4)
        {

            $html = $this->form->initFileUpload('data_contents',$val?$val:'');//文件上传
        }
        exit($html);
    }


}
