<?php
/**
 *库位操作
 *
 *
 **/
class putpre_head extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page"); 
        $this->load->model('putpre_head_model');      
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
         $this->load->view('wms/putpre_head');
		
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
		
        //获取账册编号
		$ems_no = $this->input->get_post("ems_no");
		
        if(!empty($ems_no)){
            $condition['ems_no'] = $ems_no;
			
        }
		//获取报关单号
		$entry_id = $this->input->get_post("entry_id");
		
        if(!empty($entry_id)){
            $condition['entry_id'] = $entry_id;
			
        }
		//入库方式
		$store_type = $this->input->get_post("store_type");
		
        if(!empty($store_type)){
            $condition['store_type'] = $store_type;
			
        }
		//当前状态
		$step_id = $this->input->get_post("step_id");
		
        if(!empty($step_id)){
            $condition['step_id'] = $step_id;
			
        }
		//创建时间（开始）
		$pre_start_date = $this->input->get_post("pre_start_date");
		
        if(!empty($pre_start_date)){
            $condition['pre_start_date'] = $store_bill_no;
			
        }
		//创建时间（结束）
		$pre_end_date = $this->input->get_post("pre_end_date");
		
        if(!empty($pre_end_date)){
            $condition['pre_end_date'] = $pre_end_date;
			
        }
        
        
        
        $total = $this->putpre_head_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->putpre_head_model->get_list($condition,$limit,$offset);
		 
        
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
         $this->load->view('wms/putpre_head_add');
    }

	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
        $store_bill_no       = $this->input->get_post("store_bill_no");		 
        $ems_no   = $this->input->get_post("ems_no"); 
		$store_type= $this->input->get_post("store_type");
		$trade_code=$this->input->get_post("trade_code");
		$trade_name=$this->input->get_post("trade_name");
		 //$entry_id=$this->input->get_post("entry_id");
		$provider_code = $this->input->get_post("provider_code");
        $provider_name = $this->input->get_post("provider_name");
        $orders_no   = $this->input->get_post("orders_no");
		$contr_no=$this->input->get_post("contr_no");
		$pre_start_date=$this->input->get_post("pre_start_date");
		$pre_end_date=$this->input->get_post("pre_end_date"); 
		
        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
            'store_bill_no'      =>$store_bill_no,
			'ems_no'    =>$ems_no,
            'store_type'  =>$store_type,
			'trade_code'   =>$trade_code,			
           'trade_name'=>$trade_name,
           // 'entry_id'        =>$entry_id,
			  'provider_name'    =>$provider_name,
			'provider_code'         =>$provider_code,
			'orders_no'         =>$orders_no,
            'contr_no'      =>$contr_no,
			'pre_start_date'         =>$pre_start_date,
            'pre_end_date'      =>$pre_end_date
        ); 
		//PC::debug($data);
        //echo $status;
        //break;
		
        $this->putpre_head_model->insert($data);
		//PC::debug(34);
        //showmessage("添加库位成功","sample2/index",3,1);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $location_no = $this->input->get_post("location_no");		
		$condition = array();
        $condition['location_no'] = $location_no;
		
		$list['info'] = $this->putpre_head_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/putpre_head_edit', $list);

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
        $location_no = $this->input->get_post("location_no");
		
        $location_no = $this->input->get_post("location_no");
		 if(!empty($location_no)) {
            $condition['location_no'] = $location_no;
        }else {
            echo result_to_towf_new('1', 0, '检索号不能为空', NULL);
            exit();
        }
		$ep_no   = $this->input->get_post("ep_no");
		 if(!empty($ep_no)) {
            $condition['ep_no'] = $ep_no;
        }else {
            echo result_to_towf_new('1', 0, '库位号不能为空', NULL);
            exit();
        }
		$ep_name   = $this->input->get_post("ep_name");		
		$wh_name    = $this->input->get_post("wh_name");
		$location_name    = $this->input->get_post("location_name");
		$st_nature    = $this->input->get_post("st_nature");
        $start_time         = $this->input->get_post("start_time");
		$use_year    = $this->input->get_post("use_year");
		$max_capacity=$this->input->get_post("max_capacity");
		$status=$this->input->get_post("status");
		 if(!empty($status)) {
            $condition['status'] = $status;
        }else {
            echo result_to_towf_new('1', 0, '启用状态不能为空', NULL);
            exit();
        }
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
            'location_no'      =>$location_no,
			'location_name'    =>$location_name,
            'ep_no'  =>$ep_no,
			'ep_name'   =>$ep_name,			
            'st_nature'=>$st_nature,
            'use_year'        =>$use_year,
			'max_capacity'    =>$max_capacity,
			'wh_name'         =>$wh_name,
			'status'         =>$status,
            'start_time'      =>date('Y-m-d H:i:s',time())
        );
		
       $this->putpre_head_model->update($data,$location_no);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $location_no = $this->input->get_post("location_no");
		 //PC::debug($GUID);
      if ($location_no) {
            $this->putpre_head_model->delete($location_no);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
