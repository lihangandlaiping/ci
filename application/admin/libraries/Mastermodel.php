<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 16:28
 */
class Mastermodel extends MY_Model
{
    function __construct($table='')
    {
        parent::__construct($table);
    }
    public function inIt($table='')
    {
        return new static($table);
    }
}