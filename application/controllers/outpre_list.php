<?php
/**
 *库位操作
 *
 *
 **/
class Outpre_list extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('outpre_list_model');
		$this->load->model('item_number_model');
		$this->load->model('part_no_model');      
        $this->load->library('session');    
    }

	   public function welcome()
    {
         $this->load->view('wms/welcome');
		
    }
	
    /**
    *index页面
    *
    *
    * */
     public function index()
    {
         $this->load->view('wms/outpre_list');
		
    }
	
	
	 
	
	
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
		
        
        
        
        $total = $this->outpre_list_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->outpre_list_model->get_list($condition,$limit,$offset);
		 
        
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	 /**
    *新增库位页面
    *
    *
    * */
     public function add()
    {      
         $this->load->view('wms/outpre_list_add');
    }

	    /**
    *添加库位处理
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
		$tin_name   = $this->input->get_post("tin_name");
		$tin_id   = $this->input->get_post("tin_id");
		$duty_mode= $list['duty_mode'];
		$g_name=$list['g_name'];
		$code_t_s=$list['code_t_s'];
		$price=$list['unit_price'];
		$qty=$this->input->get_post("qty");
		$curr=$list['currency'];
		$unit=$list['unit'];
		$eci_goods_flag=$list['eci_goods_flag'];
		$unit_1=$list['unit_1'];
		$country=$list['country_code'];
		$destinationcountry=$list['aim_country'];
		$g_model=$list['g_model'];
		$create_id=$this->input->get_post("create_id");
        $create_date=date('Y-m-d H:i:s',time());
		
		
		if(!empty($total))
		{
		    $total=$this->input->get_post("total");
		}else{
		    $total=$price*$qty;
		}
	  
		 if(!empty($tin_id)) {
            $condition['tin_id'] = $tin_id;
        }else {
            echo result_to_towf_new('1', 0, '库位编号不能为空', NULL);
            exit();
        }
		 if(!empty($tin_name)) {
            $condition['tin_name'] = $tin_name;
        }else {
            echo result_to_towf_new('1', 0, '库位名称不能为空', NULL);
            exit();
        }
		
		if(!empty($store_bill_no)) {
            $condition['store_bill_no'] = $store_bill_no;
        }else {
            echo result_to_towf_new('1', 0, '出库单号不能为空', NULL);
            exit();
        }
		  
		if(!empty($cop_g_no)) {
            $condition['cop_g_no'] = $cop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
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
            'duty_mode'  =>$duty_mode,
			'cop_g_no'   =>$cop_g_no,			
            'g_name'        =>$g_name,
			'g_model'        =>$g_model,
			'price'        =>$price,
			'total'        =>$total,
			'qty'        =>$qty,
			'curr'        =>$curr,
			'unit'        =>$unit,
			'unit_1'        =>$unit_1,
			'eci_goods_flag'  =>$eci_goods_flag,
			'country'        =>$country,
			'destinationcountry'  =>$destinationcountry,
		     'create_date'  =>   $create_date,
			'create_id'    =>$create_id,
			'tin_id'           =>$tin_id,
			'tin_name'         =>$tin_name,
			'code_t_s'         =>$code_t_s
            
        );
		PC::debug($data);
        $this->outpre_list_model->insert($data);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $outpre_list_id = $this->input->get_post("outpre_list_id");		
		$condition = array();
        $condition['outpre_list_id'] = $outpre_list_id;
		
		$list['info'] = $this->outpre_list_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/outpre_list_edit', $list);

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
		$outpre_list_id  = $this->input->get_post("outpre_list_id");
	    $store_bill_no   = $this->input->get_post("store_bill_no");
		$g_no   = $this->input->get_post("g_no");
		$cop_g_no   = $this->input->get_post("cop_g_no");
		$duty_mode= $this->input->get_post("duty_mode");
		$g_name=$this->input->get_post("g_name");
		$code_t_s=$this->input->get_post("code_t_s");
		$price=$this->input->get_post("price");
		$total=$this->input->get_post("total");
		$qty=$this->input->get_post("qty");
		$curr=$this->input->get_post("curr");
		$g_model=$this->input->get_post("g_model");
		$tin_name=$this->input->get_post("tin_name");
		$unit=$this->input->get_post("unit");
		$eci_goods_flag=$this->input->get_post("eci_goods_flag");
		$unit_1=$this->input->get_post("unit_1");
		$country=$this->input->get_post("country");
		$create_id=$this->input->get_post("create_id");
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
			'store_bill_no'    =>$store_bill_no,
			'g_no'    =>$g_no,
            'duty_mode'  =>$duty_mode,			
            'cop_g_no'=>$cop_g_no,
            'price'        =>$price,
			'total'        =>$total,
			'g_name'        =>$g_name,
			'curr'        =>$curr,
			'qty'        =>$qty,
			'g_model'    =>$g_model,
			'tin_name'   =>$tin_name,
			'unit'        =>$unit,
			'unit_1'        =>$unit_1,
			'eci_goods_flag'  =>$eci_goods_flag,
			'country'        =>$country,
			'create_id'        =>$create_id,
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
		if(!empty($qty)) {
            $condition['qty'] = $qty;
        }else {
            echo result_to_towf_new('1', 0, '申报数量不能为空', NULL);
            exit();
        }
		if(!empty($total)) {
            $condition['total'] = $total;
        }else {
            echo result_to_towf_new('1', 0, '总价不能为空', NULL);
            exit();
        }
       $this->outpre_list_model->update($data,$outpre_list_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $outpre_list_id = $this->input->get_post("outpre_list_id");
		 
      if ($outpre_list_id) {
            $this->outpre_list_model->delete($outpre_list_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
