<?php
/**
 *库位操作
 *
 *
 **/
class outpre_head extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('outpre_head_model');
		$this->load->model('bus_record_model');      
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
         $this->load->view('wms/outpre_head');
		
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
        
		
		 //获取出库单号
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
		if(!empty($cur_status)){
            $condition['cur_status<'] = 4;
			
        }
		//获取时间段
		$create_date1 = $this->input->get_post("create_date1");
        if(!empty($create_date1)){
            $condition['create_date>'] = $create_date1;
        }
		
		
        $create_date2 = $this->input->get_post("create_date2");
        if(!empty($create_date2)){
            $condition['create_date<'] = $create_date2;
        }
        
        
        
        $total = $this->outpre_head_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->outpre_head_model->get_list($condition,$limit,$offset);
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
				  $list[$k]['cur_status']="确报预录入";
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
         $this->load->view('wms/outpre_head_add');
    }

	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
		
		$list = $this->bus_record_model->get_data(); 
		$enterprice_name=$list['enterprice_name']; 
		$enterprice_code=$list['enterprice_code']; 
        $store_bill_no       = $this->input->get_post("store_bill_no");
		
		
		 
        $ems_no   = $this->input->get_post("ems_no");
		 
		$store_type= $this->input->get_post("store_type");
		$trade_code=$enterprice_code;
		$trade_name=$enterprice_name;
		$entry_id=$this->input->get_post("entry_id");
		$provider_code = $this->input->get_post("provider_code");
        $provider_name = $this->input->get_post("provider_name");
        $orders_no   = $this->input->get_post("orders_no");
		$contr_no=$this->input->get_post("contr_no");
		$pre_start_date=$this->input->get_post("pre_start_date");
		$pre_end_date=$this->input->get_post("pre_end_date");
		$out_start_date=$this->input->get_post("out_start_date");
		$out_end_date=$this->input->get_post("out_end_date");
		$create_date=date('Y-m-d H:i:s',time());
		$create_person=$this->input->get_post("create_person");
		$customs=$this->input->get_post("customs");

		$cur_status=0;
		
		 if(!empty($ems_no)) {
            $condition['ems_no'] = $ems_no;
        }else {
            echo result_to_towf_new('1', 0, '账册编号不能为空', NULL);
            exit();
        }
		if(!empty($store_type)) {
            $condition['store_type'] = $store_type;
        }else {
            echo result_to_towf_new('1', 0, '出库方式不能为空', NULL);
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
		


        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
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
			'cur_status'      =>$cur_status,
			'create_date'  =>$create_date,
			'customs'      =>$customs,
			'create_person'      =>$create_person,
			'out_start_date'         =>$out_start_date,
            'out_end_date'      =>$out_end_date,
			'pre_start_date'         =>$pre_start_date,
            'pre_end_date'      =>$pre_end_date
        );
		//PC::debug($data);
        //echo $status;
        //break;
		
        $this->outpre_head_model->insert($data);
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
        $outpre_head_id = $this->input->get_post("outpre_head_id");		
		$condition = array();
        $condition['outpre_head_id'] = $outpre_head_id;
		
		$list['info'] = $this->outpre_head_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/outpre_head_edit', $list);

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
		$outpre_head_id  = $this->input->get_post("outpre_head_id");
		
		$store_bill_no   = $this->input->get_post("store_bill_no");
		
        $ems_no   = $this->input->get_post("ems_no"); 
		$store_type= $this->input->get_post("store_type");
		$trade_code=$this->input->get_post("trade_code");
		$trade_name=$this->input->get_post("trade_name");
		$entry_id=$this->input->get_post("entry_id");
		$provider_code = $this->input->get_post("provider_code");
        $provider_name = $this->input->get_post("provider_name");
        $orders_no   = $this->input->get_post("orders_no");
		$contr_no=$this->input->get_post("contr_no");
		$pre_start_date=$this->input->get_post("pre_start_date");
		$pre_end_date=$this->input->get_post("pre_end_date");
		$out_start_date=$this->input->get_post("out_start_date");
		$out_end_date=$this->input->get_post("out_end_date");
		$create_person=$this->input->get_post("create_person");
		$customs=$this->input->get_post("customs");
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
			'customs'      =>$customs,
			'create_person'      =>$create_person,
			'out_start_date'         =>$out_start_date,
            'out_end_date'      =>$out_end_date,
			'pre_start_date'         =>$pre_start_date,
            'pre_end_date'      =>$pre_end_date
        );
			 if(!empty($ems_no)) {
            $condition['ems_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '账册编号不能为空', NULL);
            exit();
        }
		if(!empty($store_type)) {
            $condition['store_type'] = $store_type;
        }else {
            echo result_to_towf_new('1', 0, '出库方式不能为空', NULL);
            exit();
        }
		if(!empty($qty)) {
            $condition['pre_start_date'] = $pre_start_date;
        }else {
            echo result_to_towf_new('1', 0, '预报开始时间不能为空', NULL);
            exit();
        }
		if(!empty($pre_end_date)) {
            $condition['total'] = $total;
        }else {
            echo result_to_towf_new('1', 0, '预报结束时间不能为空', NULL);
            exit();
        }
		
       $this->outpre_head_model->update($data,$outpre_head_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $outpre_head_id = $this->input->get_post("outpre_head_id");
		 
      if ($outpre_head_id) {
            $this->outpre_head_model->delete($outpre_head_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
