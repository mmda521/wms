<?php
/**
 *库位操作
 *
 *
 **/
class Item_number extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page");  
        $this->load->model('item_number_model'); 
        $this->load->model('part_no_model');
        $this->load->model('zhangce_model');		
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
     public function record()
    {
         $this->load->view('wms/item_number');
		
    }
	
	/**
    *index页面
    *
    *
    * */
     public function change()
    {
		$record_id = $this->input->get_post("record_id");
		//PC::debug($record_id);
		$condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
         $this->load->view('wms/item_number_change',$condition);
		
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
        
		$record_id = $this->input->get_post("record_id");
        if(!empty($record_id)){
            $condition['record_id'] = $record_id;
        }
		 //获取检索号
        $g_no = $this->input->get_post("g_no");
        if(!empty($g_no)){
            $condition['g_no'] = $g_no;
        }
		
        //获取库位号
        $code_t_s = $this->input->get_post("code_t_s");
        if(!empty($code_t_s)){
            $condition['code_t_s'] = $code_t_s;
        }

		 $g_name = $this->input->get_post("g_name");
        if(!empty($g_name)){
            $condition['g_name'] = $g_name;
        }

        $total = $this->item_number_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);
        $list = $this->item_number_model->get_list($condition,$limit,$offset);
	/* 	 foreach($list as $k=>$v){
             if($list[$k]['cur_status'] =='0')   
			    {
				$list[$k]['cur_status'] = '备案预录入';
				} 
             else if($list[$k]['cur_status'] =='1')   
			    {
				  if($list[$k]['modify_mark']=='3')
				  {
					  $list[$k]['cur_status'] = '待审批';
					  $list[$k]['modify_mark'] = '新增';
				  }
				  else
				  {
					 $list[$k]['cur_status'] = '待审批';
					  $list[$k]['modify_mark'] = '修改';  
				  }
				
				} 
             else if($list[$k]['cur_status'] =='2')   
			    {
				$list[$k]['cur_status'] = '审批通过';
				$list[$k]['modify_mark'] = '不变'; 
				} 
             else if($list[$k]['cur_status'] =='3')   
			    {
				  if($list[$k]['modify_mark']=='3')
				  {
					  $list[$k]['cur_status'] = '审批退单';
					  $list[$k]['modify_mark'] = '新增';
				  }
				  else
				  {
					 $list[$k]['cur_status'] = '审批退单';
					  $list[$k]['modify_mark'] = '修改';  
				  }
				
				} 
            else
			  {
				$list[$k]['cur_status'] = '变更预录入';
				$list[$k]['modify_mark'] = '修改';
			  }				
        } */
		//PC::debug($list);
		foreach($list as $k=>$v){
           if($list[$k]['cur_status'] = ($v['cur_status'] == '0' )  )   
			{$list[$k]['cur_status']='预录入';}
		    else if($list[$k]['cur_status'] = ($v['cur_status'] == '1' ) )
            {$list[$k]['cur_status']='待审批';}	
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '2' ) )
            {$list[$k]['cur_status']='审批通过';}		
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '3' ) )
            {$list[$k]['cur_status']='审批退单';}		
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '4' ) )
            {$list[$k]['cur_status']='变更预录入';}
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '5' ) )
            {$list[$k]['cur_status']='变更审批通过';}		
            else if($list[$k]['cur_status'] = ($v['cur_status'] == '6' ) )
            {$list[$k]['cur_status']='变更退单';}
		
           if($list[$k]['modify_mark'] = ($v['modify_mark'] == '0' )  )   
			{$list[$k]['modify_mark']='不变';}
		    else if($list[$k]['modify_mark'] = ($v['modify_mark'] == '1' ) )
            {$list[$k]['modify_mark']='变更';}	
            else if($list[$k]['modify_mark'] = ($v['modify_mark'] == '3' ) )
            {$list[$k]['modify_mark']='备案';}		
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
         $record_id    = $this->input->get_post("record_id");
		$condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
         $this->load->view('wms/item_number_add',$condition);
    }
	

		  public function add_add()
    { 
         $this->load->view('wms/item_number_add_add');
    }
	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
		$cur_status='0';
		$modify_mark       = $this->input->get_post("modify_mark");			
			
        $g_no       = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
        $code_t_s   = $this->input->get_post("code_t_s");
		 if(!empty($code_t_s)) {
            $condition['code_t_s'] = $code_t_s;
        }else {
            echo result_to_towf_new('1', 0, '商品编号不能为空', NULL);
            exit();
        }
		
        $duty_mode   = $this->input->get_post("duty_mode");
		 if(!empty($duty_mode)) {
            $condition['duty_mode'] = $duty_mode;
        }else {
            echo result_to_towf_new('1', 0, '征免方式不能为空', NULL);
            exit();
        }
		 $g_name   = $this->input->get_post("g_name");
		  if(!empty($g_name)) {
            $condition['g_name'] = $g_name;
        }else {
            echo result_to_towf_new('1', 0, '商品名称不能为空', NULL);
            exit();
        }
        $country_code    = $this->input->get_post("country_code");
        $g_model = $this->input->get_post("g_model");
        $aim_country    = $this->input->get_post("aim_country");
		 $record_id   = $this->input->get_post("record_id");
		 //PC::debug($record_id);
		  if(!empty($record_id)) {
            $condition['record_id'] = $record_id;
        }else {
            echo result_to_towf_new('1', 0, '账册编号不能为空', NULL);
            exit();
        }
		
		
		$cop_no    = $this->input->get_post("cop_no");
        $eci_goods_flag = $this->input->get_post("eci_goods_flag");
        $unit    = $this->input->get_post("unit");
		 $unit_1   = $this->input->get_post("unit_1");
        //插入数据
        $data = array(
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,			
            'g_no'      =>$g_no,
            'code_t_s'  =>$code_t_s,
			'duty_mode'   =>$duty_mode,			
            'g_name'=>$g_name,
            'country_code'        =>$country_code,
			'g_model'   =>$g_model,			
            'aim_country'=>$aim_country,
			'record_id'=>$record_id,
			'cop_no'        =>$cop_no,
			'eci_goods_flag'   =>$eci_goods_flag,			
            'unit'=>$unit,
			'unit_1'=>$unit_1,
        );

        //echo $status;
        //break;
        $this->item_number_model->insert($data);
        //showmessage("添加库位成功","sample2/index",3,1);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	   public function doadd_add(){
		$condition = array();
		$cur_status='0';
		$modify_mark       = $this->input->get_post("modify_mark");
        $g_no       = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
        $code_t_s   = $this->input->get_post("code_t_s");
		 if(!empty($code_t_s)) {
            $condition['code_t_s'] = $code_t_s;
        }else {
            echo result_to_towf_new('1', 0, '商品编号不能为空', NULL);
            exit();
        }
		
        $duty_mode   = $this->input->get_post("duty_mode");
		 if(!empty($duty_mode)) {
            $condition['duty_mode'] = $duty_mode;
        }else {
            echo result_to_towf_new('1', 0, '征免方式不能为空', NULL);
            exit();
        }
		 $g_name   = $this->input->get_post("g_name");
		  if(!empty($g_name)) {
            $condition['g_name'] = $g_name;
        }else {
            echo result_to_towf_new('1', 0, '商品名称不能为空', NULL);
            exit();
        }
        $country_code    = $this->input->get_post("country_code");
        $g_model = $this->input->get_post("g_model");
        $aim_country    = $this->input->get_post("aim_country");
		 $record_id   = $this->input->get_post("record_id");
		 //PC::debug($record_id);
		  if(!empty($record_id)) {
            $condition['record_id'] = $record_id;
        }else {
            echo result_to_towf_new('1', 0, '账册编号不能为空', NULL);
            exit();
        }
		
		
		$cop_no    = $this->input->get_post("cop_no");
        $eci_goods_flag = $this->input->get_post("eci_goods_flag");
        $unit    = $this->input->get_post("unit");
		 $unit_1   = $this->input->get_post("unit_1");
        //插入数据
        $data = array(
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,			
            'g_no'      =>$g_no,
            'code_t_s'  =>$code_t_s,
			'duty_mode'   =>$duty_mode,			
            'g_name'=>$g_name,
            'country_code'        =>$country_code,
			'g_model'   =>$g_model,			
            'aim_country'=>$aim_country,
			'record_id'=>$record_id,
			'cop_no'        =>$cop_no,
			'eci_goods_flag'   =>$eci_goods_flag,			
            'unit'=>$unit,
			'unit_1'=>$unit_1,
        );

        //echo $status;
        //break;
        $this->item_number_model->insert($data);
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
        $item_id = $this->input->get_post("item_id");		
		$condition = array();
        $condition['item_id'] = $item_id;
		//PC::debug($GUID);
		$list['info'] = $this->item_number_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/item_number_edit', $list);

    }
	
	 public function edit_edit()
    {
        $item_id = $this->input->get_post("item_id");		
		$condition = array();
        $condition['item_id'] = $item_id;
		//PC::debug($GUID);
		$list['info'] = $this->item_number_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/item_number_edit_edit', $list);

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
		$condition = array();
        $modify_mark      = $this->input->get_post("modify_mark");
			if($modify_mark=='1')
			{
				$cur_status='4';
			}
		$item_id       = $this->input->get_post("item_id");
        $g_no       = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
        $code_t_s   = $this->input->get_post("code_t_s");
		 if(!empty($code_t_s)) {
            $condition['code_t_s'] = $code_t_s;
        }else {
            echo result_to_towf_new('1', 0, '商品编号不能为空', NULL);
            exit();
        }
		
        $duty_mode   = $this->input->get_post("duty_mode");
		 if(!empty($duty_mode)) {
            $condition['duty_mode'] = $duty_mode;
        }else {
            echo result_to_towf_new('1', 0, '征免方式不能为空', NULL);
            exit();
        }
		 $g_name   = $this->input->get_post("g_name");
		  if(!empty($g_name)) {
            $condition['g_name'] = $g_name;
        }else {
            echo result_to_towf_new('1', 0, '商品名称不能为空', NULL);
            exit();
        }
        $country_code    = $this->input->get_post("country_code");
        $g_model = $this->input->get_post("g_model");
        $aim_country    = $this->input->get_post("aim_country");
		
		 $cop_no    = $this->input->get_post("cop_no");
        $eci_goods_flag = $this->input->get_post("eci_goods_flag");
        $unit    = $this->input->get_post("unit");
		$unit_1    = $this->input->get_post("unit_1");
        //插入数据
        $data = array(
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,
            'g_no'      =>$g_no,
            'code_t_s'  =>$code_t_s,
			'duty_mode'   =>$duty_mode,			
            'g_name'=>$g_name,
            'country_code'        =>$country_code,
			'g_model'   =>$g_model,			
            'aim_country'=>$aim_country,
			'cop_no'=>$cop_no,
            'eci_goods_flag'        =>$eci_goods_flag,
			'unit'   =>$unit,			
            'unit_1'=>$unit_1,
        );

       $this->item_number_model->update($data,$item_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	   public function do_edit_edit()
    {
		 $page = $this->input->get_post("page"); 
        if($page <=0 ){
            $page = 1 ;
        }
        //数据分页
        $limit = 5;//每一页显示的数量
        $offset = ($page-1)*$limit;//偏移量
		$condition = array();
		$cur_status='0';
		$modify_mark       = $this->input->get_post("modify_mark");
		$item_id       = $this->input->get_post("item_id");
        $g_no       = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
        $code_t_s   = $this->input->get_post("code_t_s");
		 if(!empty($code_t_s)) {
            $condition['code_t_s'] = $code_t_s;
        }else {
            echo result_to_towf_new('1', 0, '商品编号不能为空', NULL);
            exit();
        }
		
        $duty_mode   = $this->input->get_post("duty_mode");
		 if(!empty($duty_mode)) {
            $condition['duty_mode'] = $duty_mode;
        }else {
            echo result_to_towf_new('1', 0, '征免方式不能为空', NULL);
            exit();
        }
		 $g_name   = $this->input->get_post("g_name");
		  if(!empty($g_name)) {
            $condition['g_name'] = $g_name;
        }else {
            echo result_to_towf_new('1', 0, '商品名称不能为空', NULL);
            exit();
        }
        $country_code    = $this->input->get_post("country_code");
        $g_model = $this->input->get_post("g_model");
        $aim_country    = $this->input->get_post("aim_country");
		
		 $cop_no    = $this->input->get_post("cop_no");
        $eci_goods_flag = $this->input->get_post("eci_goods_flag");
        $unit    = $this->input->get_post("unit");
		$unit_1    = $this->input->get_post("unit_1");
        //插入数据
        $data = array(
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,
            'g_no'      =>$g_no,
            'code_t_s'  =>$code_t_s,
			'duty_mode'   =>$duty_mode,			
            'g_name'=>$g_name,
            'country_code'        =>$country_code,
			'g_model'   =>$g_model,			
            'aim_country'=>$aim_country,
			'cop_no'=>$cop_no,
            'eci_goods_flag'        =>$eci_goods_flag,
			'unit'   =>$unit,			
            'unit_1'=>$unit_1,
        );

       $this->item_number_model->update($data,$item_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }
	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $item_id = $this->input->get_post("item_id");
		 
      if ($item_id) {
		    $this->db->trans_start();
		    $this->part_no_model->delete_item_id($item_id);
            $this->item_number_model->delete($item_id);
            $this->db->trans_complete();
		}
		else
		{
		 echo result_to_towf_new('1', 0, '项号id不能为空', NULL);
            exit();	
		}
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
