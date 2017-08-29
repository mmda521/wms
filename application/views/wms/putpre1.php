<?php
/**
 *库位操作
 *
 *
 **/
class Putpre extends CI_Controller {

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
         $this->load->view('wms/putpre');
		
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
		$cur_status = $this->input->get_post("cur_status");
		
        if(!empty($cur_status)){
            $condition['cur_status'] = $cur_status;
			
        }
		 if(empty($cur_status)){
            $condition['cur_status<'] = 4;
			
        }
		//创建时间（开始）
		$pre_start_date = $this->input->get_post("pre_start_date");
		
        if(!empty($pre_start_date)){
            $condition['pre_start_date'] = $pre_start_date;
			
        }
		
		//创建时间（结束）
		$pre_end_date = $this->input->get_post("pre_end_date");
		
        if(!empty($pre_end_date)){
            $condition['pre_end_date'] = $pre_end_date;
			
        }
        
        
        
        $total = $this->putpre_head_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->putpre_head_model->get_list($condition,$limit,$offset);
		 foreach($list as $k=>$v){
             switch($v['cur_status'])
			 {
                case 0 :
				  $list[$k]['cur_status']="预报预录入";
				  break;
			    case 1 :
				  $list[$k]['cur_status']="预报待审批";
				  break;
				case 2 :
				  $list[$k]['cur_status']="审批通过";
				  break;
				case 3 :
				  $list[$k]['cur_status']="审批退回";
				  break;
				case 4 :
				  $list[$k]['cur_status']="收到海关入库回执";
				  break;
				case 5 :
				  $list[$k]['cur_status']="确报待审批";
				  break;
				case 6 :
				  $list[$k]['cur_status']="确报审批通过";
				  break;
				case 7 :
				  $list[$k]['cur_status']="审批退回";
				  break;
				default:
				    $list[$k]['cur_status']="缺少状态值";	 			 
			}          
          
            
        }
		 
        
		
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	 /**
    *新增库位页面
    *
    *
    * */
     public function add()
    {      
         $this->load->view('wms/putpre_add');
    }

	    /**
    *添加库位处理
    *
    *
    * */
   
	
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $putpre_head_id = $this->input->get_post("putpre_head_id");		
		$condition = array();
        $condition['putpre_head_id'] = $putpre_head_id;
		
		$list['info'] = $this->putpre_head_model->get_list($condition);  
   	
	    $this->load->view('wms/putpre_edit', $list);

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
		
		$putpre_head_id= $this->input->get_post("putpre_head_id");
		$store_bill_no   = $this->input->get_post("store_bill_no");
		
        $ems_no   = $this->input->get_post("ems_no"); 
		$store_type= $this->input->get_post("store_type");
		$in_start_date=$this->input->get_post("in_start_date");
		$in_end_date=$this->input->get_post("in_end_date");
		$trade_code=$this->input->get_post("trade_code");
		$trade_name=$this->input->get_post("trade_name");
		$entry_id=$this->input->get_post("entry_id");
		$provider_code = $this->input->get_post("provider_code");
        $provider_name = $this->input->get_post("provider_name");
        $orders_no   = $this->input->get_post("orders_no");
		$contr_no=$this->input->get_post("contr_no");
		$pre_start_date=$this->input->get_post("pre_start_date");
		$pre_end_date=$this->input->get_post("pre_end_date");
		$customs=$this->input->get_post("customs");
		$create_person=$this->input->get_post("create_person");
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
			 
             'store_bill_no'      =>$store_bill_no,
			'ems_no'    =>$ems_no,
            'store_type'  =>$store_type,
			'trade_code'   =>$trade_code,			
            'trade_name'=>$trade_name,
            'entry_id'        =>$entry_id,
			'provider_name'    =>$provider_name,
			'provider_code'         =>$provider_code,
			'orders_no'         =>$orders_no,
            'contr_no'      =>$contr_no,
			'create_person'         =>$create_person,
			'customs'         =>$customs,
			'in_start_date'         =>$in_start_date,
            'in_end_date'      =>$in_end_date,
			'pre_start_date'         =>$pre_start_date,
            'pre_end_date'      =>$pre_end_date
        );
		  if(!empty($store_bill_no)) {
            $condition['store_bill_no'] = $ems_no;
        }else {
            echo result_to_towf_new('1', 0, '进库单号不能为空', NULL);
            exit();
        }
		 if(!empty($ems_no)) {
            $condition['ems_no'] = $ems_no;
        }else {
            echo result_to_towf_new('1', 0, '账册编号不能为空', NULL);
            exit();
        }
		 if(!empty($store_type)) {
            $condition['store_type'] = $store_type;
        }else {
            echo result_to_towf_new('1', 0, '入库方式不能为空', NULL);
            exit();
        }
		if(!empty($pre_start_date)) {
            $condition['pre_start_date'] = $pre_start_date;
        }else {
            echo result_to_towf_new('1', 0, '预报开始时间不能为空', NULL);
            exit();
        }
		if(!empty($pre_end_date)) {
            $condition['pre_end_date'] = $pre_end_date;
        }else {
            echo result_to_towf_new('1', 0, '预报结束时间不能为空', NULL);
            exit();
        }
		
		
       $this->putpre_head_model->update($data,$putpre_head_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $putpre_head_id = $this->input->get_post("putpre_head_id");
		 
      if ($putpre_head_id) {
            $this->putpre_head_model->delete($putpre_head_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   

   
}
