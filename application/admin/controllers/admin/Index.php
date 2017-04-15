<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
function __construct()
{
    parent::__construct();
    $_GET=array_merge($this->uri->uri_to_assoc(4),$_GET);
    load_class('Model', 'core');
    $this->load->library(array('mastermodel','session'));
    $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
}
    /**
     * 成功提示
     * @param $msg
     * @param string $data
     * @param string $url
     * @param string $code
     */
    protected function success($msg,$url='',$data='',$code='1')
    {
        if($this->input->is_ajax_request())
        {
            exit(json_encode(array('msg'=>$msg,'data'=>$data,'url'=>$url,'code'=>$code)));
        }
        else
        {
            $path = str_replace("\\", "/", FCPATH);

            $this->load->setViewPath(array($path.'public/coreview/'=>true));
            $this->load->view('tip',array('msg'=>$msg,'data'=>$data,'url'=>$url,'code'=>$code));
            echo $this->output->get_output();exit;
        }
    }
    /**
     * 错误提示
     * @param $msg
     * @param string $data
     * @param string $url
     * @param string $code
     */
    protected function error($msg,$url='',$data='',$code='0')
    {
        if($this->input->is_ajax_request())
        {
            exit(json_encode(array('msg'=>$msg,'data'=>$data,'url'=>$url,'code'=>$code)));
        }
        else
        {
            $path = str_replace("\\", "/", FCPATH);

            $this->load->setViewPath(array($path.'public/coreview/'=>true));

            $this->load->view('tip',array('msg'=>$msg,'data'=>$data,'url'=>$url,'code'=>$code));
            echo $this->output->get_output();exit;
        }
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $admin_user=$this->session->userdata('admin_user');
        if(!$admin_user)
        {
            return redirect('login');
        }
        $menus=$this->mastermodel->inIt('user_role')->getOne(array('roleid'=>$admin_user['roleid']),'rules');
        $orgs=$this->mastermodel->inIt('menu')->getList(array('id'=>$menus['rules'],'org !='=>''));
        $str=$menus['rules'];
        foreach($orgs as $row)
        {
            if($row['org'])
                $str.=",{$row['org']}";
        }

        $auth=array_unique(explode(',',$str));
        $this->cache->save('admin_auth', $auth, 300);
        $menulist=$this->mastermodel->inIt('menu')->getList(array('pid'=>0),'sort asc');
        $data['menus']=$auth;
        $data['menulist']=$menulist;
        $data['admin_user']=$admin_user;
        $data['admin_footer_title']=$this->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>'admin_footer_title'));
        $data['web_url']=$this->mastermodel->inIt('config')->filed('content')->getOne(array('name'=>'web_url'));
		$this->load->view('admin/index/index',$data);
	}
    /**
     * 左侧菜单
     * @param int $pid
     * @param int $level
     * @return mixed
     */
    function left_menu($pid=0,$level=0)
    {

        $list= $this->mastermodel->inIt('menu m1')->filed('m1.*,m2.id as m2id')->joinData(array(array('menu m2','m1.id=m2.pid','left')))->getList(array('m1.pid'=>$pid,'m1.hide'=>1),'m1.sort asc','m1.id');
       /* $list=MasterModel::inIt('menu m1')->field('m1.*,m2.id as m2id')->getListData(array('m1.pid'=>$pid,'m1.hide'=>1),'m1.sort asc','m1.id',array(array('menu m2','m1.id=m2.pid','left')));*/

        $a= $this->load->view('admin/index/left_menu',array('list'=>$list,'level'=>$level),true);
        return  $a;
    }
    /**
     * 登录
     */
    function login()
    {
        if($parameter=$this->input->post())
        {
            $uName=$parameter['uName'];
            $pass=$parameter['pass'];
            if($uName=='')$this->error('请填写用户名',site_url('login'));
            if($pass=='')$this->error('请填写用户密码',site_url('login'));
            $modle=$this->mastermodel->inIt('user');
            $info=$modle->getOne(array('username'=>$uName));
            if(!$info)$this->error('用户名错误');
            else
            {
                if($info['password']!=$pass)$this->error('用户密码错误',url('login'));
                if($info['status']!=1)$this->error('改账号已被禁用',url('login'));
                $this->session->set_userdata('admin_user',$info);

                $this->success('登录成功',site_url('index'));
            }
            return false;
        }

        if($this->session->userdata('admin_user'))
        {
            exit("<script>parent.location.href='".site_url('admin/index')."';</script>");
        }

        $this->load->view('admin/index/login');
    }
    /**
     * 退出登录
     */
    function loginOut()
    {
        $this->session->unset_userdata('admin_user');
        header("Location: http://".$_SERVER['HTTP_HOST'].site_url('index'));
    }
    /**
     *清除缓存
     */
    function deleteCache()
    {
        $dir=$dirname=str_replace('\\','/',FCPATH).'application/admin/cache';
        $a=rmdirr($dir);
        $this->success('清除成功');
    }

    /**
     * 修改当前用户密码
     */
    function updatePass($id='',$pass='')
    {
        $id=$this->mastermodel->inIt('user')->updateData(array('password'=>$pass),array('id'=>$id));
        if($id)$this->success('修改成功');
        else $this->error('修改失败');
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */