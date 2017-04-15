<?php
/**
 * 后台管理员
 */
class Adminuser extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='user';
    }
    function index()
    {
        $name=$this->input->get_post('name','');
        $status=$this->input->get_post('status','');
        $where=array();
        if($name!='')$where['u.username like']=$name;
        if($status!='')$where['u.status']=$status;
        $list=$this->mastermodel->inIt('user u')->filed('u.*,ur.rolename')->joinData(array(array('user_role ur','ur.roleid=u.roleid','left')))->getList($where,'id desc');
        $this->load->view('admin/adminuser/index',array('list'=>$list));
        //$list=$this->getListData('user u',$where,'u.*,ur.rolename','id desc',null,array(array('user_role ur','ur.roleid=u.roleid','left')));
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
                $line=$this->mastermodel->inIt('user')->updateData($data,array('id'=>$id));
                if($line)$this->success('修改成功',site_url('index'));
                else $this->error('修改失败');
                return false;
            }
            $id= $this->mastermodel->inIt('user')->insertData($data);
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
                $info=$this->mastermodel->inIt('user')->getOne(array('id'=>$id));
                $this->load->vars('info',$info);
                //$this->assign('info',$info);
            }
            $role=$this->mastermodel->inIt('user_role')->getList(array('disabled'=>1),'listorder asc');
            $this->load->view('admin/adminuser/edit',array('role'=>$role));
           /* $this->assign('role',$role);
            return view('edit');*/
        }
    }

}
