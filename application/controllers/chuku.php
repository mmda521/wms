<?php
/**
 *库位操作
 *
 *
 **/
class Chuku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('chuku_model'); 
		$this->load->model('item_number_model');
		$this->load->model('part_no_model');	
        $this->load->model('outpre_list_model');	
        $this->load->library('session');    
    }

	   public function welcome()
    {
         $this->load->view('wms/welcome');
		
    }
	
    /**
   
	
	
	 
	
	
	 /**
    *ajax获取数据
	查看功能
    *
    *
    * */
    public function ajax_data(){
        //获取分页第几页
        $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 5;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量

        $condition = array();
		
		 //获取进库单号
        $store_bill_no = $this->input->get_post("store_bill_no");
		//PC::debug($store_bill_no);
        if(!empty($store_bill_no)){
            $condition['store_bill_no'] = $store_bill_no;
			
        }
		
        //获取项号
		$g_no = $this->input->get_post("g_no");
		
        if(!empty($g_no)){
            $condition['g_no'] = $g_no;
			
        }
		//获取货物名称
		$g_name = $this->input->get_post("g_name");
		
        if(!empty($g_name)){
            $condition['g_name'] = $g_name;
			
        }
		//征免方式
		$duty_mode = $this->input->get_post("duty_mode");
		
        if(!empty($duty_mode)){
            $condition['duty_mode'] = $duty_mode;
			
        }
		//货号
		$cop_g_no = $this->input->get_post("cop_g_no");
		
        if(!empty($cop_g_no)){
            $condition['cop_g_no'] = $cop_g_no;
			
        }
		//商品编码
		$code_t_s = $this->input->get_post("code_t_s");
		
        if(!empty($code_t_s)){
            $condition['code_t_s'] = $code_t_s;
			
        }
		
        
        
        
        $total = $this->chuku_model->count_num($condition); 
		 // PC::debug($total);   
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->chuku_model->get_list($condition,$limit,$offset);
		 
        
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	  public function add()
    {     
	    
		 $store_bill_no = $this->input->get_post("store_bill_no");
		$condition = array();
        $condition['store_bill_no'] = $store_bill_no;
		
		$list['info'] = $this->outpre_list_model->get_list($condition);
		PC::debug($list);
         $this->load->view('wms/chuku_add',$list);
    }

	    /**
    *添加货位处理
    *
    *
    * */
    public function doadd(){
		
		$condition = array();
        $store_bill_no       = $this->input->get_post("store_bill_no");
	    $cop_g_no   = $this->input->get_post("cop_g_no");
		$condition_part['gop_g_no'] = $cop_g_no;
		$list_part= $this->part_no_model->get_data($condition_part);
		$condition_item['item_id']=$list_part['item_id'];
		$list=$this->item_number_model->get_data1($condition_item);
		
	    $g_no=$list_part['g_no'];
		$duty_mode= $list['duty_mode'];
		$g_name=$list['g_name'];
		$code_t_s=$list['code_t_s'];
		$price=$list['unit_price'];
		$g_model=$list['g_model'];
		$qty=$this->input->get_post("qty");
		$curr=$list['currency'];
		$unit=$list['unit'];
		$eci_goods_flag=$list['eci_goods_flag'];
		$unit_1=$list['unit_1'];
		$country=$list['country_code'];
		$destinationcountry=$list['aim_country'];
		$tin_name=$this->input->get_post("tin_name");
		$tin_id=$this->input->get_post("tin_id");
		$create_date=date('Y-m-d H:i:s',time());
		$create_id=$this->input->get_post("create_id");
		$qty=$this->input->get_post("qty");
		
		
		
		if(!empty($total))
		{
		    $total=$this->input->get_post("total");
		}else{
		    $total=$price*$qty;
		}
		
			
		if(!empty($cop_g_no)) {
            $condition['cop_g_no'] = $cop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
		 
		 
		if(!empty($tin_name)) {
            $condition['tin_name'] = $tin_name;
        }else {
            echo result_to_towf_new('1', 0, '库位名称不能为空', NULL);
            exit();
        }
		
		
		if(!empty($qty)) {
            $condition['qty'] = $qty;
        }else {
            echo result_to_towf_new('1', 0, '申报数量不能为空', NULL);
            exit();
        }


        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
            'store_bill_no'      =>$store_bill_no,
			'g_no'    =>$g_no,
             'g_model' =>$g_model,
			'cop_g_no'   =>$cop_g_no,			
            'g_name'        =>$g_name,
			'curr'        =>$curr,
			'duty_mode'        =>$duty_mode,
			'country'        =>$country,
			'destinationcountry' =>$destinationcountry,
			'eci_goods_flag'        =>$eci_goods_flag,
			'unit_1'        =>$unit_1,
			'curr'        =>$curr,
			'tin_name'        =>$tin_name,
			'tin_id'        =>$tin_id,
			'create_date'  =>$create_date,
			'create_id'  =>$create_id,
			'price'  =>$price,
			'qty'  =>$qty,
			'total'  =>$total,
			'code_t_s'         =>$code_t_s
			
            
        );
		
		
        $this->chuku_model->insert($data);
        echo result_to_towf_new('1', 1, 'success', null);
    }
   
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $ck_id = $this->input->get_post("ck_id");		
		$condition = array();
        $condition['ck_id'] = $ck_id;
		
		$list['info'] = $this->chuku_model->get_list($condition);  	
	    $this->load->view('wms/chuku_edit', $list);

    }
	
/**
    *处理编辑
    *
    *
    * */
     public function do_edit()
    {
		 $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 5;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量
	    $ck_id   = $this->input->get_post("ck_id");
		$g_no   = $this->input->get_post("g_no");
		$cop_g_no   = $this->input->get_post("cop_g_no");
		$g_model= $this->input->get_post("g_model");
		$g_name=$this->input->get_post("g_name");
		$tin_name=$this->input->get_post("tin_name");
		$curr=$this->input->get_post("curr");
		$code_t_s=$this->input->get_post("code_t_s");
		$tin_id=$this->input->get_post("tin_id");
		$eci_goods_flag=$this->input->get_post("eci_goods_flag");
		$unit_1=$this->input->get_post("unit_1");
		$country=$this->input->get_post("country");
		$out_start_date=$this->input->get_post("out_start_date");
		$out_end_date=$this->input->get_post("out_end_date");
		$tin_id=$this->input->get_post("tin_id");
		$create_date=date('Y-m-d H:i:s',time());
		$create_id=$this->input->get_post("create_id");
		$price=$this->input->get_post("price");
		$qty=$this->input->get_post("qty");
		$total=$this->input->get_post("total");
		
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
			
			'g_no'    =>$g_no,
             'g_model' =>$g_model,
			'cop_g_no'   =>$cop_g_no,			
            'g_name'        =>$g_name,
			'curr'        =>$curr,
			'country'        =>$country,
			'out_start_date'        =>$out_start_date,
			'out_end_date'        =>$out_end_date,
			'eci_goods_flag'        =>$eci_goods_flag,
			'unit_1'        =>$unit_1,
			'curr'        =>$curr,
			'tin_name'        =>$tin_name,
			'tin_id'        =>$tin_id,
			'create_date'  =>$create_date,
			'create_id'  =>$create_id,
			'price'  =>$price,
			'qty'  =>$qty,
			'total'  =>$total,
			'code_t_s'         =>$code_t_s
           
        );
		if(!empty($cop_g_no)) {
            $condition['cop_g_no'] = $cop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
		 
		if(!empty($g_name)) {
            $condition['g_name'] = $g_name;
        }else {
            echo result_to_towf_new('1', 0, '商品名称不能为空', NULL);
            exit();
        }
		
		 
		if(!empty($curr)) {
            $condition['curr'] = $curr;
        }else {
            echo result_to_towf_new('1', 0, '币制不能为空', NULL);
            exit();
        }
		
       $this->chuku_model->update($data,$ck_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $ck_id = $this->input->get_post("ck_id");
		 
      if ($ck_id) {
            $this->chuku_model->delete($ck_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
