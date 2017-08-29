<?php
/**
 *库位操作
 *
 *
 **/
class Zksq extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page"); 
        $this->load->model('zksq_head_model');      
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
         $this->load->view('wms/zksq');
		
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
        
		
		 //获取转库编号
        $zk_no = $this->input->get_post("zk_no");
		
        if(!empty($zk_no)){
            $condition['zk_no'] = $zk_no;
			
        }
		
        //获取账册编号
		$ems_no = $this->input->get_post("ems_no");
		
        if(!empty($ems_no)){
            $condition['ems_no'] = $ems_no;
			
        }
		//获取报关单号
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
       // PC::debug($condition);
        $total = $this->zksq_head_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->zksq_head_model->get_list($condition,$limit,$offset);
		 
        
		
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	 /**
    *新增库位页面
    *
    *
    * */
     public function add()
    {      
         $this->load->view('wms/zksq_add');
    }
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $zksq_head_id = $this->input->get_post("zksq_head_id");		
		$condition = array();
        $condition['zksq_head_id'] = $zksq_head_id;
		
		$list['info'] = $this->zksq_head_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/zksq_edit', $list);

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
		$zksq_head_id = $this->input->get_post("zksq_head_id");
        $store_bill_no = $this->input->get_post("store_bill_no");
        $zk_no = $this->input->get_post("zk_no");
		$ems_no = $this->input->get_post("ems_no");
		$zk_start_date = $this->input->get_post("zk_start_date");
		$zk_end_date = $this->input->get_post("zk_end_date");
	    $trade_name = $this->input->get_post("trade_name");
		 if(!empty($zk_no)) {
            $condition['zk_no'] = $zk_no;
        }else {
            echo result_to_towf_new('1', 0, '转库编号不能为空', NULL);
            exit();
        }
		
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
            'store_bill_no'    =>$store_bill_no,
			'zk_no'      =>$zk_no,
			'trade_name'    =>$trade_name,
            'ems_no'  =>$ems_no,
			'zk_end_date'         =>$zk_end_date,
            'zk_start_date'      =>$zk_start_date
        );
		
       $this->zksq_head_model->update($data,$zksq_head_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $zksq_head_id = $this->input->get_post("zksq_head_id");
		 
      if ($zksq_head_id) {
           $this->zksq_head_model->delete($zksq_head_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
