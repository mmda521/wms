<?php
/**
 *库位操作
 *
 *
 **/
class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page"); 
		$this->load->model('location_model'); 
        $this->load->model('biz_model');
		$this->load->model('bus_record_model');
		$this->load->model('kuweiguanli_model');
		$this->load->model('zhangce_model');
		$this->load->model('part_no_model');       
        $this->load->library('session');    
    }
	//库位查询
	public function location_search()
    {
		 $this->load->view("wms/kw.php");
	}
	 /**
    *ajax获取数据
	查看功能
    *
    *
    * */
    public function location_ajax_data(){
        //获取分页第几页
        $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 30;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量
		$condition = array();
        //获取库位编号
        $location_no = $this->input->get_post("location_no");
		if(!empty($location_no)){
            $condition['location_no'] = $location_no;
		}
		//获取企业编码
        $ep_no = $this->input->get_post("ep_no");
        if(!empty($ep_no)){
            $condition['ep_no'] = $ep_no;
        }
		//获取企业名称
		 $ep_name = $this->input->get_post("ep_name");
        if(!empty($ep_name)){
            $condition['ep_name'] = $ep_name;
        }
		//获取仓库名称
		 $wh_name = $this->input->get_post("wh_name");
        if(!empty($wh_name)){
            $condition['wh_name'] = $wh_name;
        }
		//获取库位名称
		 $location_name = $this->input->get_post("location_name");
        if(!empty($location_name)){
            $condition['location_name'] = $location_name;
        }
		//获取储库性质
		 $st_nature = $this->input->get_post("st_nature");
        if(!empty($st_nature)){
            $condition['st_nature'] = $st_nature;
        }
		//获取启用时间
		//$start_time = $this->input->get_post("start_time");
        //if(!empty($start_time)){
            //$condition['start_time'] = $start_time;
        //}
		//获取使用年限
		 $use_year = $this->input->get_post("use_year");
        if(!empty($use_year)){
            $condition['use_year'] = $use_year;
        }
		//获取最大容量
		 $max_capacity = $this->input->get_post("max_capacity");
        if(!empty($max_capacity)){
            $condition['max_capacity'] = $max_capacity;
        }
		//启用状态
        //$status = $this->input->get_post("status");
        //if(in_array($status,array('Y','N',true))){
            //$condition['status'] = $status; 
        //}
        $total = $this->kuweiguanli_model->count_num($condition);   
        $page_string = $this->common_page->page_string($total, $limit, $page);
		$list = $this->kuweiguanli_model->get_list($condition,$limit,$offset);
        //foreach($list as $k=>$v){
            //$list[$k]['status'] = ($v['status'] == 'Y' )?"启用":'<font color="red">停用</font>';          
            //$list[$k]['regdate'] = date("Y-m-d H:i:s",$v['regdate']);
        //}
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }
	
	//库位详情
	public function location_info()
    {
		$location_id = $this->input->get_post("location_id");		
		$condition = array();
        $condition['location_id'] = $location_id;
		$list['info'] = $this->kuweiguanli_model->get_list($condition);	
	    $this->load->view('wms/location_info',$list);
	}
	
	//业务资格查询
	public function biz_search()
    {
         $this->load->view("wms/biz_list.php");
		
    }
	
	//搜索功能
	public function biz_ajax_data(){
        //获取分页第几页
        $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 5;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量

        $condition = array();
        
		
		 //获取检索号
        $col_code = $this->input->get_post("col_code");
        if(!empty($col_code)){
            $condition['col_code'] = $col_code;
        }
		
        //获取库位号
        $trades_code = $this->input->get_post("trades_code");
        if(!empty($trades_code)){
            $condition['trades_code'] = $trades_code;
        }

        //启用状态
        $biz_type = $this->input->get_post("biz_type"); 
		 //PC::debug($status);
        if(in_array($biz_type,array('Y','N',true))){
            $condition['biz_type'] = $biz_type; 
        }
        
        $total = $this->biz_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->biz_model->get_list($condition,$limit,$offset);
        foreach($list as $k=>$v){
            $list[$k]['biz_type'] = ($v['biz_type'] == '0' )?"分送集报":"其它";          
            //$list[$k]['regdate'] = date("Y-m-d H:i:s",$v['regdate']);、
		}
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string);
    }
	
	//资格详情
	public function biz_info()
    {
		$control_id = $this->input->get_post("control_id");		
		$condition = array();
        $condition['control_id'] = $control_id;
		$list['info'] = $this->biz_model->get_list($condition);	
	    $this->load->view('wms/biz_info',$list);
	}
	
	//账册查询
	public function book_search()
    {
         $this->load->view('wms/book_list');
		
    }
	//账册搜索
	public function book_ajax_data()
	{
		//获取分页第几页
        $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 5;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量

        $condition = array();
        
		
		 //获取检索号
        $pre_enter_no = $this->input->get_post("pre_enter_no");
        if(!empty($pre_enter_no)){
            $condition['pre_enter_no'] = $pre_enter_no;
        }
		
        //获取库位号
        $eci_ems_no = $this->input->get_post("eci_ems_no");
        if(!empty($eci_ems_no)){
            $condition['eci_ems_no'] = $eci_ems_no;
        }

        //启用状态
        $book_type = $this->input->get_post("book_type"); 
		//PC::debug($status);
        if(in_array($book_type,array('Y','N',true))){
            $condition['book_type'] = $book_type; 
        }
		
		  //启用状态
       $cur_status = $this->input->get_post("cur_status"); 
        if(!empty($cur_status)){
            $condition['cur_status'] = $cur_status; 
        }
		//$cur_status ='0';
        
        $total = $this->zhangce_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->zhangce_model->get_list($condition,$limit,$offset);
        foreach($list as $k=>$v){
            $list[$k]['book_type'] = ($v['book_type'] == 'Y' )?"K账册":"J账册";          
            //$list[$k]['cur_status'] = ($v['cur_status'] == '0' )?"预录入":"其他"; 
			if($list[$k]['cur_status'] = ($v['cur_status'] == '0' )  )   
			{$list[$k]['cur_status']='预录入';}
		    else if($list[$k]['cur_status'] = ($v['cur_status'] == '1' ) )
            {$list[$k]['cur_status']='待审批';}	
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '2' ) )
            {$list[$k]['cur_status']='审批通过';}		
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '3' ) )
            {$list[$k]['cur_status']='变更审批通过';}		
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '4' ) )
            {$list[$k]['cur_status']='变更退单';}	
        }
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
	}
	//账册详情
	public function book_info()
	{
		$record_id = $this->input->get_post("record_id");		
		$condition = array('record_id' => $record_id);
		$list['book_info'] = $this->zhangce_model->get_list($condition);
		$list['part_list'] = $this->part_no_model->get_list($condition); 
		//print_r($list['book_info']);
		//echo ("</br>");
		//print_r($list['part_list']);
		//exit; 	
	    $this->load->view('wms/book_info', $list);
	}
	
	//进库查询
	public function in_store_search()
    {
         $this->load->view('wms/welcome');
		
    }
	//出库查询
	public function out_store_search()
    {
         $this->load->view('wms/welcome');
    }
}