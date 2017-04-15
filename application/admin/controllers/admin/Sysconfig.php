<?php
class Sysconfig extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->model_name='config';
    }

    /**
     * 编辑
     */
    function edit()
    {
        if($parameter=$this->input->post())
        {
            $data=$parameter['data'];//input('post.data');
            foreach($data as $key=>$val)
            {
                $this->mastermodel->inIt($this->model_name)->updateData(array('content'=>$val),array('name'=>$key));
            }
            $this->success('编辑成功',site_url('edit'));
        }
        else
        {
            $info=$this->mastermodel->inIt($this->model_name.' m1')->getList(array('m1.name in'=>'web_url,admin_footer_title,web_seo_keyword,web_seo_describe,admin_page_size,admin_backup_size'));
            $newinfo=array();
            foreach($info as $row)
            {
                $newinfo[$row['name']]=$row['content'];
            }
            $this->load->vars('info',$newinfo);
            $this->load->view('admin/sysconfig/edit');
        }
    }




}
