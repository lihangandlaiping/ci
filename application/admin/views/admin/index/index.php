<?php $this->load->view('admin/index/header');?>
<div id="wrapper">
    <?php $this->load->view('admin/index/nav');?>
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php $this->load->view('admin/index/top');?>
        <div class="row J_mainContent" name="content-main" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="" frameborder="0" data-id="index_v1.html" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right"><?php echo !empty($admin_footer_title['content'])?$admin_footer_title['content']:'';?> </div>
        </div>
    </div>
    <!--右侧部分结束-->


</div>
<?php $this->load->view('admin/index/footer');?>

