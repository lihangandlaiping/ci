<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 11:23
 */
//require_once 'U_Indexs.php';
class AppIndex extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    private function validtoken($request_info = '')
    {
        $id = $this->input->get('uid');
        $source = $this->input->get('source');
        $yzcode = $this->input->get('yzcode');
        $pwd = 'abcdef';
        if (empty($id) || empty($source) || empty($yzcode)) exit(error_app('缺少必要参数'));
        //生成校验码
        $my_str = 'uid=' . $id . '&source=' . $source . '&request_info=' . $request_info . $pwd;
        $my_cond = base64_encode(md5($my_str));
        if ($yzcode != $my_cond) exit(error_app('签名验证失败'));
    }


    /**
     * 获取书目信息
     */
    function GetPluInfo()
    {
        $bdate = $this->input->get('bdate');
        $edate = $this->input->get('edate');
        $page = $this->input->get('page') ?: '1';
        if ($page < 1) $page = 1;
        $page_size = $this->input->get('page_size') ?: '20';
//        $this->validtoken(json_encode(array('bdate'=>$bdate,'edate'=>$edate)));
        if (empty($bdate)) $bdate = date('Y-m-d');
        if (empty($edate)) $edate = date('Y-m-d H:i:s');
        $where = array('exp' => "pr.h_input_date >= '" . $bdate . "' AND pr.h_input_date <= '" . $edate . '\'', 'pr.h_exist' => '1');
        $limit = $page_size . ',' . (($page - 1) * $page_size);
        $count = $this->mastermodel->inIt('db_product pr')->getCount($where);
        $list = $this->mastermodel->inIt('db_product pr')->getList($where, '', '', $limit);
//        $list=$this->mastermodel->inIt('db_product pr')->filed('pr.h_id,pr.h_isbn,pr.h_name,pr.h_type,pr.pub_id,pr.h_output_price,pr.h_writer,pr.h_publish_date,pr.h_input_date,pub.pub_name,ty.type_name,type_id,tym.type_name type_name_max')->joinData(array(array('db_publishs pub','pr.pub_id=pub.pub_id','left'),array('dz_type ty','ty.h_type=pr.h_type','left'),array('dz_type_master tym','tym.type_id=ty.type_id','left')))->getList($where,'','',$limit);
        $list = $this->mastermodel->inIt('db_product pr')->filed('pr.h_id,pr.h_isbn,pr.h_name,pr.h_type,pr.pub_id,pr.h_output_price,pr.h_writer,pr.h_publish_date,pr.h_input_date,pub.pub_name,ty.type_name,tym.type_name type_name_max,ty.type_id')->joinData(array(array('db_publishs pub', 'pr.pub_id=pub.pub_id', 'left'), array('dz_type ty', 'ty.h_type=pr.h_type', 'left'), array('dz_type tym', 'ty.type_id=tym.h_type', 'left')))->getList($where, '', '', $limit);
        $pages = floor($count / $page_size);
        if ($count % $page_size != 0) $pages += 1;
        $datas = array();
        foreach ($list as $key => $value) {
            $datas[$key]['BCODE'] = $value['h_id']; //id
            $datas[$key]['ISBN'] = $value['h_isbn']; //isbn
            $datas[$key]['TITLE'] = iconv('GBK', 'UTF-8', $value['h_name']); //书名
            $datas[$key]['DTPCODE'] = $value['type_id'];//大分类ID
            $datas[$key]['DTPNAME'] = iconv('GBK', 'UTF-8', $value['type_name_max']);//大分类名称
            $datas[$key]['CLSCODE'] = $value['h_type'];//小分类ID
            $datas[$key]['CLSNAME'] = iconv('GBK', 'UTF-8', $value['type_name']);//小分类名称
            $datas[$key]['PUBLISHER'] = $value['pub_id'];//出版社代码
            $datas[$key]['PUBNAME'] = iconv('GBK', 'UTF-8', $value['pub_name']);//出版社名称
            $datas[$key]['PRICE'] = $value['h_output_price'];//价格
            $datas[$key]['AUTHOR'] = iconv('GBK', 'UTF-8', $value['h_writer']);//作者
            $datas[$key]['PUBDATE'] = $value['h_publish_date'];//出版时间
            $datas[$key]['CREDATE'] = $value['h_input_date'];//创建时间
        }
        exit(success_app('操作成功', $datas));
    }

    /**
     * 库存查询
     */
    function GetPluQty()
    {
        $request_info = $this->input->get('request_info', '');
//        $this->validtoken($request_info);
        $page = $this->input->get('page') ?: '1';
        if ($page < 1) $page = 1;
        $page_size = $this->input->get('page_size') ?: '20';
        $where = array('pr.h_exist' => '1');
        if (!empty($request_info)) {
            $request_info = json_decode($request_info);
            if (!empty($request_info['store'])) {
                $where['st.station_id'] = $request_info['store'];
            }
            if (!empty($request_info['BCODE'])) {
                $ids = array_filter(array_values($request_info['BCODE']));
                if (!empty($ids)) {
                    $where['pr.h_id'] = array('in', $ids);
                }
            }
        }
        $limit = $page_size . ',' . (($page - 1) * $page_size);
//        $count= $this->mastermodel->inIt('db_product pr')->getCount($where);
//        $list=$this->mastermodel->inIt('db_product pr')->filed('pr.h_id,pr.h_isbn,pr.h_name,pr.h_type,pr.pub_id,pr.h_output_price,pr.h_writer,pr.h_publish_date,pr.h_input_date,pub.pub_name,ty.type_name,type_id,tym.type_name type_name_max')->joinData(array(array('db_publishs pub','pr.pub_id=pub.pub_id','left'),array('dz_type ty','ty.h_type=pr.h_type','left'),array('dz_type_master tym','tym.type_id=ty.type_id','left')))->getList($where,'','',$limit);
        $list = $this->mastermodel->inIt('db_product pr')->filed('pr.h_id,pr.h_isbn,pr.h_name,pr.h_type,pr.pub_id,pr.h_output_price,pr.h_writer,pr.h_publish_date,pr.h_input_date,pub.pub_name,ty.type_name,ty.type_id,sta.h_amount,st.station_id,tym.type_name type_name_max')->joinData(array(array('db_publishs pub', 'pr.pub_id=pub.pub_id', 'left'), array('dz_type ty', 'ty.h_type=pr.h_type', 'left'), array('dz_type tym', 'ty.type_id=tym.h_type', 'left'), array('db_stocks_amount sta', 'sta.h_id=pr.h_id', 'right'), array('db_stocks st', 'sta.s_id=st.s_id', 'left')))->getList($where, '', '', $limit);
//        $pages=floor($count/$page_size);
//        if($count%$page_size!=0)$pages+=1;
        $datas = array();
        foreach ($list as $key => $value) {
            $datas[$key]['BCODE'] = $value['h_id']; //id
            $datas[$key]['ISBN'] = $value['h_isbn']; //isbn
            $datas[$key]['TITLE'] = iconv('GBK', 'UTF-8', $value['h_name']); //书名
            $datas[$key]['DTPCODE'] = $value['type_id'];//大分类ID
            $datas[$key]['DTPNAME'] = iconv('GBK', 'UTF-8', $value['type_name_max']);//大分类名称
            $datas[$key]['CLSCODE'] = $value['h_type'];//小分类ID
            $datas[$key]['CLSNAME'] = iconv('GBK', 'UTF-8', $value['type_name']);//小分类名称
            $datas[$key]['PUBLISHER'] = $value['pub_id'];//出版社代码
            $datas[$key]['PUBNAME'] = iconv('GBK', 'UTF-8', $value['pub_name']);//出版社名称
            $datas[$key]['PRICE'] = $value['h_output_price'];//价格
            $datas[$key]['AUTHOR'] = iconv('GBK', 'UTF-8', $value['h_writer']);//作者
            $datas[$key]['PUBDATE'] = $value['h_publish_date'];//出版时间
            $datas[$key]['CREDATE'] = $value['h_input_date'];//创建时间
            $datas[$key]['QTY'] = $value['h_amount'];//库存数量
            $datas[$key]['store'] = $value['station_id'];//库存数量
        }
        exit(success_app('操作成功', $datas));
    }

    /**
     * 下订单/取消订单
     */
    function LibraryOrder()
    {
        $request_info=array('type'=>'1','store'=>'G001','ordernumber'=>'99999999','plulist'=>array(array('BCODE'=>'00000000000001000020','price'=>'1','qty'=>'1')));
        $request_info=json_encode($request_info);
//        $request_info = $this->input->get('request_info', '');
//        $this->validtoken($request_info);
        $request_info = json_decode($request_info,true);
        if (empty($request_info) || empty($request_info)) exit(error_app('缺少必要参数'));
        if (empty($request_info['type']) || !in_array($request_info['type'], array(1, 0))) exit(error_app('交易类型错误'));
        if (empty($request_info['store'])) exit(error_app('缺少店号'));//G001
        if (empty($request_info['plulist'])) exit(error_app('缺少图书信息'));
        if (empty($request_info['ordernumber'])) exit(error_app('缺少订单号'));
        if ($request_info['type'] == '1') {
            //生成订单
            //订单总金额
            $money = 0;
            $books_num=0;
            $books_list=array();
            $books_ids=array();
            foreach ($request_info['plulist'] as $value){
                if(empty($value['price']) || empty($value['qty']))exit(error_app('缺少图书信息'));
                $money+=$value['price'];
                $books_num+=$value['qty'];
                $books_ids[]=$value['BCODE'];
                $books_list[$value['BCODE']]=$value;
            }
            //获取批销单号
            $ordersn = $this->getOrderSn($request_info['store']);
            //生成主表明细
            $this->addOrder($money,count($request_info['plulist']),$ordersn,$request_info['store'],$request_info['ordernumber'],$books_num);
            //生成批销单明细
            $this->addOrderList($books_list,$books_ids,$ordersn,$request_info['store']);
            //主表检查
            $this->inspectTable($ordersn);
            //批销单审核

            //批销单出库

        } else {
            //取消订单
            $ordersn=$this->abolishOrder($request_info['ordernumber']);
        }
        unset($request_info['plulist']);
        $request_info['cqxhnumber'] = $ordersn;
        exit(success_app('处理成功', $request_info));
    }

    private function getOrderSn($store)
    {
        $query=$this->db->query('DECLARE @dj_id CHAR(15)
Begin Transaction  
EXEC Up_CreateCustomCode \'XS\',\''.$store.'\',@dj_id OUTPUT  
 COMMIT Transaction
SELECT @dj_id');
        $result = $query->result_array();
        $query->free_result(); // $query 将不再可用
        return $result[0]['computed'];
    }

    private function addOrder($money,$num,$ordersn,$store,$ordernumber,$books_num)
    {
        $row=array(
            'px_id'=>$ordersn ,//单据号
            'station_id'=>$store ,//站点编号
            'd_id' =>'0',//部门编号
            'input_date' =>time(),//录入日期
//            'input_date' =>date('Y-m-d H:i:s'),//录入日期
            'o_id_input' =>'0',//录单员
//            'o_id_operator' =>'',
            'i_class_id'=>'0' ,//发票种类
            'total_amount' =>$books_num,//总数量
            'total_count' =>$num,//品种数
            'total_money' =>$money,//总金额
            'real_money' =>$money,//总实洋
            'c_id'=>'0' ,//客户编号
            'consignment_style_id' =>'0',//货运方式
            'tax_rate' =>'0',//税率
            'other_money' =>'0',//其它费用 可负
            'stock_arrear' =>'0',//库存结清情况 是否已全部发货
//            'o_id_stock'=>'0' ,
            'money_arrear'=>'0' ,//款结清情况
//            'money_date'=>'0' ,
            'sale_style_id' =>'0',//销售方式
            'pici'=>'0' ,//批次
            'is_verify'=>'0' ,//是否审核(0:未审核1:审核)
            'o_id_verify'=>'0' ,//审核人
            'verify_date'=>time() ,//审核日期
//            'verify_date'=>date('Y-m-d H:i:s') ,//审核日期
            'is_destroy'=>'0' ,//是否作废(0:未作废1:作废)
            'destroy_date' =>'',//作废日期
            'o_id_destroy'=>'' ,//作废操作人
            'receipts_class'=>'xs' ,//单据类别 xs 销售, xt退货  check
            'stock_date'=>time() ,//实际发货日期
//            'stock_date'=>date('Y-m-d H:i:s') ,//实际发货日期
            'arrear_date'=>time() ,//结算期限
//            'arrear_date'=>date('Y-m-d H:i:s') ,//结算期限
            'sell_reason' =>'',//订货依据
            'prn' =>'',//是否已打印
            'c_number' =>'',//本客户第几单  本号根据客户基本信息生成
            'pz_id' =>$ordernumber,//凭证单号
//            'pz_flag'=>'' ,
            'memo' =>'图书馆借阅订单',//备注
//            'pack_flag'=>'' ,
//            'notrigger'=>'' ,
//            'shelf_flag'=>'' ,
//            'train_pack'=>'' ,
//            'transport_number' =>'',
//            'send_station' =>'',
//            'send_money'=>'' ,
//            'o_id_take'=>'' ,
//            'o_id_open' =>'',
//            'last_mod_date'=>'' ,
//            'last_trans_date' =>'',
//            'dis_flag' =>'',
//            'o_id_sh' =>'',
//            'sh_date' =>'',
//            'sh_flag'=>'' ,
//            'product_pack' =>'',
//            'th_th_style_id' =>'',
//            'wl_ys_style_id' =>'',
//            'o_id_money'=>''
        );
        $id = $this->mastermodel->inIt('yw_px')->insertData($row);
        var_dump(1);exit;
        if($id){
            return $id;
        }else{
            exit(error_app('生成批销主单失败'));
        }
    }

    /**
     * 添加明细
     * @param $books_list
     * @param $books_ids
     * @param $ordersn
     * @param $store
     * @return mixed
     */
    private function addOrderList($books_list,$books_ids,$ordersn,$store)
    {
        $where=array('pr.h_id'=>array('in',$books_ids),'st.station_id'=>$store);
        $list = $this->mastermodel->inIt('db_product pr')->filed('pr.h_id,pr.h_output_price h_price,st.s_id,sta.h_amount,st.s_name')->joinData(array( array('db_stocks_amount sta', 'sta.h_id=pr.h_id', 'right'), array('db_stocks st', 'sta.s_id=st.s_id', 'left')))->getList($where);
        $data=array();
        foreach ($list as $key=>$value){
            $data['px_id']=$ordersn;
            $data['h_id']=$value['h_id'];
            $data['s_id']=$value['s_id'];
            $data['h_amount']=$value['h_amount'];
            $data['h_price']=$value['h_price'];
            $data['h_discount']='0';
            $data['sort_number']='0';
            $data['inferior_amount']=$books_list[$value['h_id']]['qty'] ;
            $data['deformity_amount']='0';
            $data['h_amount_xs']='0';
            $data['h_amount_js']='0';
            $data['h_discount_arrear']='0';
            $data['memo']='图书馆借阅';
        }
        $id = $this->mastermodel->inIt('yw_px_item')->insertData($data);
        if($id){
            return $id;
        }else{
            exit(error_app('生成批销主单失败'));
        }
    }


    private function inspectTable($ordersn)
    {
        $order_sn=$this->db->query('EXEC dbo.Up_Check_PX_Group \''.$ordersn.'\'');
    }


    private function auditTable($ordersn)
    {
        $this->db->query("UPDATE yw_px SET is_verify='1',verify_date=GETDATE(),o_id_verify='1' WHERE px_id='".$ordersn.'\'');
    }

    private function stockRemoval($ordersn)
    {
        $this->db->query("UPDATE yw_px SET stock_arrear='1',stock_date=GETDATE(),o_id_stock='1' WHERE px_id='".$ordersn.'\'');
    }

    private function abolishOrder($ordersn)
    {
        $ordersns=$this->mastermodel->inIt('yw_px')->filed('px_id')->getOne(array('pz_id'=>$ordersn));
        if(empty($ordersns['px_id'])) {
            exit(error_app('批销不存在'));
        }else{
            $ordersns=$ordersns['px_id'];
        }
        $id = $this->mastermodel->inIt('yw_px')->updateData(array('is_destroy'=>'0','destroy_date'=>time(),'o_id_destroy'=>'0'),array('pz_id'=>$ordersn));
        if($id){
            return $ordersns;
        }else{
            exit(error_app('取消批销主单失败'));
        }
    }

}