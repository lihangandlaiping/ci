<?php
/**
 * 后台菜单管理
 */

class Menu extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='menu';
    }
    function index()
    {
        $parent_id=$this->input->get_post('parent_id',0);
        $this->load->view('admin/index/basehead');
        $list=$this->mastermodel->inIt('menu')->getList(array('pid'=>$parent_id));
        $this->load->view('admin/menu/index',array('parent_id'=>$parent_id,'list'=>$list));
        $this->load->view('admin/index/basefooter');
    }

    /**
     * 编辑
     */
    function edit()
    {
        if($parameter=$this->input->post())
        {
            $id=$this->input->post('id');
            $action=$this->input->post('action','add');
            $data=$parameter['data'];
            if($data['pid']>0)
            {
                $orgs=$this->mastermodel->inIt('menu')->filed('org')->getOne(array('id'=>$data['pid']));
                $data['org']=$orgs['org']?$orgs['org'].','.$data['pid']:$data['pid'];
            }
            else
            {
                $data['org']='';
            }
            if($action=='edit')
            {
                $id=$parameter['id'];
                $line=$this->mastermodel->inIt('menu')->updateData($data,array('id'=>$id));
                if($line)$this->success('修改成功',site_url('index'));
                else $this->error('修改失败');
                return false;
            }
            $id= $this->mastermodel->inIt('menu')->insertData($data);
            if($id)$this->success('添加成功',site_url('index'));
            else $this->error('添加失败');
        }
        else
        {
            $id=$this->input->get('id');
            $action=$this->input->get('action','add');
            $_GET['action']=$action;
            if($action=='edit')
            {
                $info=$this->mastermodel->inIt('menu')->getOne(array('id'=>$id));
                $this->load->vars('info',$info);
            }
            $menu=$this->mastermodel->inIt('menu')->getList(array('pid'=>0),'sort asc');

            $this->load->view('admin/menu/edit',array('menu'=>$menu));

        }
    }



}
