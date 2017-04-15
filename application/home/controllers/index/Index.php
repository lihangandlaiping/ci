<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 11:23
 */
//require_once 'U_Indexs.php';
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
$k=$this->db->query("DECLARE @dj_id CHAR(15)
Begin Transaction  
EXEC Up_CreateCustomCode 'XS','2',@dj_id OUTPUT  
 COMMIT Transaction
SELECT @dj_id");
var_dump($k);
        }

}