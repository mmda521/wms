<?php
/**
 *库位操作
 *
 *
 **/
class Quebao extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
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
         $this->load->view('wms/quebao');
		
    }
	//申报功能
	public function quebao_report_send(){
        $putpre_head_id = $this->input->get_post("putpre_head_id");
		//PC::debug($putpre_head_id);
		foreach($putpre_head_id as $key =>$v){
			$condition=array('id' => $v);
		}
        //PC::debug($v);
		//exit;
        header("Content-type:text/html; charset=utf-8");
        ini_set('soap.wsdl_cache_enabled', "0"); //关闭wsdl缓存
        $soap = new SoapClient('http://192.168.17.99:8090/IN_STORE.asmx?wsdl');
//获取配置扫描类型
        $return = $soap->IN_store_ensure($condition);

        echo result_to_towf_new('1', 1, '成功', null);
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
            $condition['cur_status'] = 2;
			
        }
		
		
		$declare_date1 = $this->input->get_post("declare_date1");
        if(!empty($declare_date1)){
            $condition['declare_date>'] = $declare_date1;
        }
		
		
        $declare_date2 = $this->input->get_post("declare_date2");
        if(!empty($declare_date2)){
            $condition['declare_date<'] = $declare_date2;
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
				  $list[$k]['cur_status']="预报审批通过";
				  break;
				case 3 :
				  $list[$k]['cur_status']="预报审批退回";
				  break;
				case 4 :
				  $list[$k]['cur_status']="确保预录入";
				  break;
				case 5 :
				  $list[$k]['cur_status']="确报待审批";
				  break;
				case 6 :
				  $list[$k]['cur_status']="确报审批通过";
				  break;
				case 7 :
				  $list[$k]['cur_status']="确报审批退回";
				  break;
				default:
				    $list[$k]['cur_status']="缺少状态值";	 			 
			}    
			switch($v['store_type'])
			 {
                case 1 :
				  $list[$k]['store_type']="保税仓货物逐笔报关";
				  break;
			    case 2 :
				  $list[$k]['store_type']="出口监管仓库物逐笔报关";
				  break;
				case 3 :
				  $list[$k]['store_type']="出口监管仓分送集报";
				  break;
				
				default:
				    $list[$k]['store_type']="缺少出库方式值";	 			 
			}                       
          
            
        }
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	

  
	
	
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
		//PC::debug($putpre_head_id);
		$list['info'] = $this->putpre_head_model->get_data($condition);
	      
     // PC::debug($list);	
	    $this->load->view('wms/quebao_edit', $list);

    }
	 public function head_edit()
    {
        $putpre_head_id = $this->input->get_post("putpre_head_id");		
		$condition = array();
        $condition['putpre_head_id'] = $putpre_head_id;
		
		$list['info'] = $this->putpre_head_model->get_data($condition);	
	switch($list['info']['store_type'])
			 {
                case 1 :
				  $list['info']['store_type']="保税仓货物逐笔报关";
				  break;
			    case 2 :
				  $list['info']['store_type']="出口监管仓库物逐笔报关";
				  break;
				case 3 :
				  $list['info']['store_type']="出口监管仓分送集报";
				  break;
				
				default:
				    $list['info']['store_type']="缺少出库方式值";	 			 
			}                       
	    $this->load->view('wms/quebao_head_edit', $list);

    }
	public function list_edit()
    {
        $store_bill_no = $this->input->get_post("store_bill_no");	
			
		$condition = array();
        $condition['store_bill_no'] = $store_bill_no;
		
		$list['info'] = $this->putpre_head_model->get_list($condition);  
        	
	    $this->load->view('wms/quebao_list_edit', $list);

    }
	public function quebao_ruku()
    {
        $store_bill_no = $this->input->get_post("store_bill_no");
		//PC::debug($store_bill_no);		
		$condition = array();
        $condition['store_bill_no'] = $store_bill_no;
		
		$list['info'] = $this->putpre_head_model->get_list($condition);  
        	
	    $this->load->view('wms/quebao_ruku', $list);

    }
	
	/*处理货位添加
*/
  public function add()
    {     
	     $store_bill_no = $this->input->get_post("store_bill_no");
		 $condition = array();
        $condition['store_bill_no'] = $store_bill_no;
		
		$list['info'] = $this->putpre_head_model->get_list($condition);
         $this->load->view('wms/quebao_ruku_add');
    }

	    /**
    *添加货位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
        $store_bill_no = $this->input->get_post("store_bill_no");
	    $g_no   = $this->input->get_post("g_no");
		$cop_g_no   = $this->input->get_post("cop_g_no");
		$g_model= $this->input->get_post("g_model");
		$g_name=$this->input->get_post("g_name");
		$qty=$this->input->get_post("qty");
		$tin_name=$this->input->get_post("tin_name");
		$curr=$this->input->get_post("curr");
		$price=$this->input->get_post("price");
		$code_t_s=$this->input->get_post("code_t_s");
		$total=$this->input->get_post("total");
		
		
	
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
            $condition['qty'] = $curr;
        }else {
            echo result_to_towf_new('1', 0, '币制不能为空', NULL);
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
		if(!empty($total)) {
            $condition['total'] = $total;
        }else {
            echo result_to_towf_new('1', 0, '总价不能为空', NULL);
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
			'tin_name'        =>$tin_name,
			'qty'         =>$qty,
			'code_t_s'         =>$code_t_s,
			'price'         =>$price,
			'total'         =>$total
			
            
        );
		
        //echo $status;
        //break;
		
        $this->ruku_model->insert($data);
		//PC::debug(34);
        //showmessage("添加库位成功","sample2/index",3,1);
        echo result_to_towf_new('1', 1, 'success', null);
    }
   
    /*处理编辑
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
		$trade_code=$this->input->get_post("trade_code");
		$trade_name=$this->input->get_post("trade_name");
		$entry_id=$this->input->get_post("entry_id");
		$provider_code = $this->input->get_post("provider_code");
        $provider_name = $this->input->get_post("provider_name");
        $orders_no   = $this->input->get_post("orders_no");
		$contr_no=$this->input->get_post("contr_no");
		$in_start_date=$this->input->get_post("in_start_date");
		$in_end_date=$this->input->get_post("in_end_date");
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
			'in_start_date'         =>$in_start_date,
            'in_end_date'      =>$in_end_date
        );
	   PC::debug($data);
		
		
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
