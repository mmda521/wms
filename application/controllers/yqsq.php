<?php
/**
 *库位操作
 *
 *
 **/
class Yqsq extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page"); 
        $this->load->model('yqsq_model');      
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
         $this->load->view('wms/yqsq');
		
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
		$store_in_no = $this->input->get_post("store_in_no");
		
        if(!empty($store_in_no)){
            $condition['store_in_no'] = $store_in_no;
			
        }
		
		//库位名称
		$tin_name = $this->input->get_post("tin_name");
		
        if(!empty($tin_name)){
            $condition['tin_name'] = $tin_name;
			
        }
		//当前状态
		$step_id = $this->input->get_post("step_id");
		
        if(!empty($step_id)){
            $condition['step_id'] = $step_id;
			
        }
		//时间段查询
		$create_date1 = $this->input->get_post("create_date1");
        if(!empty($create_date1)){
            $condition['create_date>'] = $create_date1;
        }
		
		
        $create_date2 = $this->input->get_post("create_date2");
        if(!empty($create_date2)){
            $condition['create_date<'] = $create_date2;
        }
        
        
        $total = $this->yqsq_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->yqsq_model->get_list($condition,$limit,$offset);
		 
        
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
         $this->load->view('wms/yqsq_add');
    }

	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
        $store_bill_no       = $this->input->get_post("store_bill_no");		 
        $store_in_no   = $this->input->get_post("store_in_no"); 
		$tin_name= $this->input->get_post("tin_name");
		$g_no=$this->input->get_post("g_no");
		$code_t_s=$this->input->get_post("code_t_s");
		 //$entry_id=$this->input->get_post("entry_id");
		$cop_g_no = $this->input->get_post("cop_g_no");
        $qty = $this->input->get_post("qty");
        $price   = $this->input->get_post("price");
		$total=$this->input->get_post("total");
		$curr=$this->input->get_post("curr");
		$unit=$this->input->get_post("unit"); 
		$g_name=$this->input->get_post("g_name");
		$delay_date=$this->input->get_post("delay_date");
		$in_delay_date=$this->input->get_post("in_delay_date");
		$create_date=date('Y-m-d H:i:s',time());
		if(!empty($store_in_no)) {
            $condition['store_in_no'] = $store_in_no;
        }else {
            echo result_to_towf_new('1', 0, '进库单号不能为空', NULL);
            exit();
        }
		if(!empty($cop_g_no)) {
            $condition['cop_g_no'] = $cop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
            'store_bill_no'      =>$store_bill_no,
			'store_in_no'    =>$store_in_no,
            'tin_name'  =>$tin_name,
			'cop_g_no'   =>$cop_g_no,			
            'g_no'=>$g_no,
			'code_t_s'    =>$code_t_s,
			'g_name'         =>$g_name,
			'qty'         =>$qty,
            'total'      =>$total,
			'delay_date'      =>$delay_date,
			'in_delay_date'      =>$in_delay_date,
			'unit'         =>$unit,
            'curr'      =>$curr,
			'price'      =>$price,
			'create_date'  =>$create_date
			
        ); 
		
		
        $this->yqsq_model->insert($data);
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
        $yq_id = $this->input->get_post("yq_id");		
		$condition = array();
        $condition['yq_id'] = $yq_id;
		
		$list['info'] = $this->yqsq_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/yqsq_edit', $list);

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
		$yq_id = $this->input->get_post("yq_id");
        $store_bill_no = $this->input->get_post("store_bill_no");
        $store_in_no = $this->input->get_post("store_in_no");
		
		$cop_g_no   = $this->input->get_post("cop_g_no");
		 if(!empty($cop_g_no)) {
            $condition['cop_g_no'] = $cop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
		$code_t_s   = $this->input->get_post("code_t_s");		
		$qty    = $this->input->get_post("qty");
		$tin_name    = $this->input->get_post("tin_name");
		$g_name    = $this->input->get_post("g_name");
        $g_no = $this->input->get_post("g_no");
		$unit   = $this->input->get_post("unit");
		$curr=$this->input->get_post("curr");
		$total=$this->input->get_post("total");
		$price=$this->input->get_post("price");
		 
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
            'store_bill_no'    =>$store_bill_no,
			'store_in_no'      =>$store_in_no,
			'g_name'    =>$g_name,
            'g_no'  =>$g_no,
			'cop_g_no'   =>$cop_g_no,			
            'code_t_s'   =>$code_t_s,
            'qty'        =>$qty,
			'curr'    =>$curr,
			'total'         =>$total,
			'price'         =>$price,
            'tin_name'      =>$tin_name,
			'unit'      =>$unit
			
        );
		
       $this->yqsq_model->update($data,$yq_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $yq_id = $this->input->get_post("yq_id");
		 
      if ($yq_id) {
            $this->yqsq_model->delete($yq_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
