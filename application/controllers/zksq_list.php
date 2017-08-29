<?php
/**
 *库位操作
 *
 *
 **/
class Zksq_list extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page"); 
        $this->load->model('zksq_list_model');      
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
         $this->load->view('wms/zksq_list');
		
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
        $store_bill_no = $this->input->get_post("store_bill_no");
		
		
        if(!empty($store_bill_no)){
            $condition['store_bill_no'] = $store_bill_no;
			
        }
		
        //获取商品编号
		$code_t_s = $this->input->get_post("code_t_s");
		
        if(!empty($code_t_s)){
            $condition['code_t_s'] = $code_t_s;
			
        }
		//获取货号
		$cop_g_no = $this->input->get_post("cop_g_no");
		
        if(!empty($cop_g_no)){
            $condition['cop_g_no'] = $cop_g_no;
			
        }
		//获取项号
		$g_no = $this->input->get_post("g_no");
		
        if(!empty($g_no)){
            $condition['g_no'] = $g_no;
			
        }

      //转出库位名称  
       $zc_tin_name = $this->input->get_post("zc_tin_name");
        if(!empty($zc_tin_name)){
            $condition['zc_tin_name'] = $zc_tin_name;
        }
		
		 //转入库位名称
        $zr_tin_name = $this->input->get_post("zr_tin_name");
        if(!empty($zr_tin_name)){
            $condition['zr_tin_name'] = $zr_tin_name;
        }
      
        $total = $this->zksq_list_model->count_num($condition); 
		     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->zksq_list_model->get_list($condition,$limit,$offset);
		 
        
		
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	 /**
    *新增库位页面
    *
    *
    * */
     public function add()
    {      
         $this->load->view('wms/zksq_list_add');
    }
	public function doadd(){
		$condition = array();
		$g_no= $this->input->get_post("g_no");
		$cop_g_no= $this->input->get_post("cop_g_no");
		$code_t_s=$this->input->get_post("code_t_s");
		$qty=$this->input->get_post("qty");
		$zc_tin_name=$this->input->get_post("zc_tin_name");
        $zr_tin_name= $this->input->get_post("zr_tin_name");
		$g_name=$this->input->get_post("g_name");
		$yk_start_date=$this->input->get_post("yk_start_date");
		$yk_end_date=$this->input->get_post("yk_end_date");
		$store_bill_no=$this->input->get_post("store_bill_no");
		$unit=$this->input->get_post("unit");
		$create_date=date('Y-m-d H:i:s',time());
		 
		
		 if(!empty($store_bill_no)) {
            $condition['store_bill_no'] = $store_bill_no;
        }else {
            echo result_to_towf_new('1', 0, '转出单进库编号不能为空', NULL);
            exit();
        }

		if(!empty($yk_start_date)) {
            $condition['yk_start_date'] = $yk_start_date;
        }else {
            echo result_to_towf_new('1', 0, '移库开始时间不能为空', NULL);
            exit();
        }
		if(!empty($yk_end_date)) {
            $condition['yk_end_date'] = $yk_end_date;
        }else {
            echo result_to_towf_new('1', 0, '移库结束时间不能为空', NULL);
            exit();
        }
		if(!empty($qty)) {
            $condition['qty'] = $qty;
        }else {
            echo result_to_towf_new('1', 0, '移库申报数量不能为空', NULL);
            exit();
        }
		
		if(!empty($zr_tin_name)) {
            $condition['zr_tin_name'] = $zr_tin_name;
        }else {
            echo result_to_towf_new('1', 0, '转入库位单位不能为空', NULL);
            exit();
        }


        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
            'store_bill_no'      =>$store_bill_no,
			'g_no'    =>$g_no,
            'cop_g_no'  =>$cop_g_no,
			'code_t_s'   =>$code_t_s,			
            'g_name'=>$g_name,
            'zc_tin_name'        =>$zc_tin_name,
			'zr_tin_name'        =>$zr_tin_name,
			'qty'    =>$qty,
			'unit'    =>$unit,
			'yk_start_date'         =>$yk_start_date,
            'yk_end_date'      =>$yk_end_date,
			'create_date'  =>$create_date
        );
		//PC::debug($data);
        //echo $status;
        //break;
		
        $this->zksq_list_model->insert($data);
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
        $zksq_list_id = $this->input->get_post("zksq_list_id");		
		$condition = array();
        $condition['zksq_list_id'] = $zksq_list_id;
		
		$list['info'] = $this->zksq_list_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/zksq_list_edit', $list);

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
		$zksq_list_id = $this->input->get_post("zksq_list_id");
        $store_bill_no = $this->input->get_post("store_bill_no");
        $g_name = $this->input->get_post("g_name");
		$g_no = $this->input->get_post("g_no");
		$cop_g_no = $this->input->get_post("cop_g_no");
		$code_t_s = $this->input->get_post("code_t_s");
		$yk_start_date = $this->input->get_post("yk_start_date");
		$yk_end_date = $this->input->get_post("yk_end_date");
	    $unit = $this->input->get_post("unit");
		$qty = $this->input->get_post("qty");
		$zr_tin_name = $this->input->get_post("zr_tin_name");
		 if(!empty($store_bill_no)) {
            $condition['store_bill_no'] = $store_bill_no;
        }else {
            echo result_to_towf_new('1', 0, '转出单进库单号不能为空', NULL);
            exit();
        }
		 if(!empty($yk_start_date)) {
            $condition['yk_start_date'] = $yk_start_date;
        }else {
            echo result_to_towf_new('1', 0, '移库开始时间不能为空', NULL);
            exit();
        }
		 if(!empty($yk_end_date)) {
            $condition['yk_end_date'] = $yk_end_date;
        }else {
            echo result_to_towf_new('1', 0, '移库结束时间不能为空', NULL);
            exit();
        }
		 if(!empty($qty)) {
            $condition['qty'] = $qty;
        }else {
            echo result_to_towf_new('1', 0, '移库申报数量不能为空', NULL);
            exit();
        }
		 if(!empty($zr_tin_name)) {
            $condition['zr_tin_name'] = $zr_tin_name;
        }else {
            echo result_to_towf_new('1', 0, '转入库位名称不能为空', NULL);
            exit();
        }
		
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
            'store_bill_no'    =>$store_bill_no,
			'g_no'      =>$g_no,
			'code_t_s'    =>$code_t_s,
            'cop_g_no'  =>$cop_g_no,
			'zr_tin_name'  =>$zr_tin_name,
			'qty'  =>$qty,
			'yk_start_date'  =>$yk_start_date,
			'yk_end_date'  =>$yk_end_date,
			'unit'         =>$unit,
            'yk_start_date'      =>$yk_start_date
        );
		
       $this->zksq_list_model->update($data,$zksq_list_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $zksq_list_id = $this->input->get_post("zksq_list_id");
		 
      if ($zksq_list_id) {
           $this->zksq_list_model->delete($zksq_list_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
