<?php
/**
 *库位操作
 *
 *
 **/
class Quebao_list extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('putpre_list_model');      
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
		
        
        
        
        $total = $this->putpre_list_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->putpre_list_model->get_list($condition,$limit,$offset);
		 
        
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
        $putpre_list_id = $this->input->get_post("putpre_list_id");		
		$condition = array();
        $condition['putpre_list_id'] = $putpre_list_id;
		
		$list['info'] = $this->putpre_list_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/putpre_list_edit', $list);

    }
	
/**
    *处理编辑
    *
    *
    * */
   
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $putpre_list_id = $this->input->get_post("putpre_list_id");
		 
      if ($putpre_list_id) {
            $this->putpre_list_model->delete($putpre_list_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
