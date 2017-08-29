<?php
/**
 *库位操作
 *
 *
 **/
class Ckquebao_list extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('outpre_list_model');      
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
         $this->load->view('wms/quebao_list');
		
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
    *
   
	
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
		if(!empty($total)) {
            $condition['total'] = $total;
        }else {
            echo result_to_towf_new('1', 0, '总价不能为空', NULL);
            exit();
        }
		 
		if(!empty($g_name)) {
            $condition['qty'] = $qty;
        }else {
            echo result_to_towf_new('1', 0, '申报数量不能为空', NULL);
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
