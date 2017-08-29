<?php
include "CI_Wechat.php";
class Gethbinfo extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('redpack.php');
		$this->load->database();
		$this->load->model('hb_model');
    }
	
	public function hbinfo()
    {	
		//裂变
        $mch_billno = '1417986702201701182223306634';
		//普包
		//$mch_billno = '1417986702201701190935494518';
		//调用红包库函数
		$hb_info = $this->gethbinfo($mch_billno);
		exit($hb_info);
		$hb_arr = array(
			'mch_billno'	=> $hb_info['mch_billno'],
			'mch_id'		=> $hb_info['mch_id'],
			'detail_id'		=> $hb_info['detail_id'],
			'status'		=> $hb_info['status'],
			'send_type'		=> $hb_info['send_type'],
			'hb_type'		=> $hb_info['hb_type'],
			'total_num'		=> $hb_info['total_num'],
			'total_amount'	=> $hb_info['total_amount'],
			'reson'			=> $hb_info['reson'],
			'send_time'		=> $hb_info['send_time'],
			'refund_time'	=> $hb_info['refund_time'],
			'refund_amount'	=> $hb_info['refund_amount'],
			'act_name'		=> $hb_info['act_name'],
			'hblist'		=> $hb_info['hblist'],
			'openid'		=> $hb_info['openid'],
			'amount'		=> $hb_info['amount'],
			'rcv_time'		=> $hb_info['rcv_time']
		);
		$condition = array(
			'mch_billno'	=> $hb_info['mch_billno']
		);
		$list=$this->hb_model->get_list($condition);
        if(!empty($list)){ //如果不为空，更新用户信息
        	$this->hb_model->update($hb_arr,$mch_billno);
        }else{   
            $this->hb_model->insert($hb_arr);
        }
    }	
}



?>