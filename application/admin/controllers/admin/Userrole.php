<?php
/**
 * 后台角色
 */
class Userrole extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='user_role';
    }
    function index()
    {
        $name=$this->input->get_post('name');
        $status=$this->input->get_post('status');
        $where=array();
        if($name!='')$where['rolename like']=$name;
        if($status!='')$where['disabled']=$status;
        $list=$this->mastermodel->inIt($this->model_name)->getList($where,'listorder asc');
        //$list=$this->getListData($this->model_name,$where,null,'listorder');
        $this->load->view('admin/userrole/index',array('list'=>$list));

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
                $line=$this->mastermodel->inIt('user_role')->updateData($data,array('roleid'=>$id));
                if($line)$this->success('修改成功',site_url('index'));
                else $this->error('修改失败');
                return false;
            }
            $id= $this->mastermodel->inIt('user_role')->insertData($data);
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
                $info=$this->mastermodel->inIt('user_role')->getOne(array('roleid'=>$id));
                $this->load->vars('info',$info);
                //$this->assign('info',$info);
            }
            $this->load->view('admin/userrole/edit');
            //return view('edit');
        }
    }

    /**
     * 菜单权限
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    function role()
    {
        $id=$this->input->get_post('id');
        if($parameter=$this->input->post())
        {
            $menu=$parameter['menu'];//input('post.menu');
            $line=$this->mastermodel->inIt('user_role')->updateData(array('rules'=>implode(',',$menu)),array('roleid'=>$id));
            if($line)$this->success('授权成功',site_url('index'));
            else
                $this->error('授权失败');
        }
        else
        {
            $menulist=$this->mastermodel->inIt('user_role')->getOne(array('roleid'=>$id),'rules');
            $menulist=$menulist['rules'];
            $this->load->vars('menulist',explode(',',$menulist));
            $this->load->vars('id',$id);

        }
        $this->load->view('admin/userrole/role');
        //return view('role');
    }
    function roletest($pid=0,$level=0)
    {
        $list=$this->mastermodel->inIt('menu')->getList(array('pid'=>$pid),'sort asc');
        if(!$list)return '';
        return $this->load->view('admin/userrole/roleline',array('list'=>$list,'level'=>$level),true);

    }
    /**
     * 删除
     * @param string $id
     */
    function delete()
    {
        $id=$this->input->get('id');
        if(!$id)$this->error('缺少数据id');
        if(!$this->model_name)$this->error('缺少数据库模型名称');
        if(strpos($id,',')!==FALSE)
        {
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('roleid in'=>$id));
        }
        else
        {
            $line=$this->mastermodel->inIt($this->model_name)->deleteData(array('roleid'=>$id));
        }
        if($line)$this->success('删除成功',site_url('index'));
        else $this->error('删除失败');
    }

}
