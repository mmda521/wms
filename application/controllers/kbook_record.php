<?php
/**
 *库位操作
 *
 *
 **/
class Kbook_record extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page");  
        $this->load->model('kbook_record_model');  
        $this->load->model('bus_record_model'); 
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
         $this->load->view('wms/kbook_record');
		
    }
	
	
	 public function change()
    {
		$record_id = $this->input->get_post("record_id");
		//PC::debug($record_id);
        $condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
         $this->load->view('wms/kbook_record_change',$condition);
		
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
		//PC::debug($record_id);
        if(!empty($record_id)){
            $condition['record_id'] = $record_id;
        }
		
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

        //
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
        
        $total = $this->kbook_record_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->kbook_record_model->get_list($condition,$limit,$offset);
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
		$condition = array();
	    $list['info'] = $this->bus_record_model->get_data($condition);
		//PC::debug($list);
		//print_r($list['info']);
		//exit;
        $this->load->view('wms/kbook_record_add',$list);
    }

	
	  public function add_add()
    {
		$condition = array();
	    $list['info'] = $this->bus_record_model->get_data($condition);
		//PC::debug($list);
		//print_r($list['info']);
		//exit;
        $this->load->view('wms/kbook_record_add_add',$list);
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
        $pre_enter_no       = $this->input->get_post("pre_enter_no");
        //PC::debug(12);		
        $eci_ems_no   = $this->input->get_post("eci_ems_no");
        $ems_no   = $this->input->get_post("ems_no");
		 $trade_code   = $this->input->get_post("trade_code");
        $trade_name    = $this->input->get_post("trade_name");
        $book_type = $this->input->get_post("book_type");
        $owner_code    = $this->input->get_post("owner_code");
		 if(!empty($owner_code)) {
            $condition['owner_code'] = $owner_code;
        }else {
            echo result_to_towf_new('1', 0, '收发货单位代码不能为空', NULL);
            exit();
        }
        $owner_name = $this->input->get_post("owner_name");
		 if(!empty($owner_name)) {
            $condition['owner_name'] = $owner_name;
        }else {
            echo result_to_towf_new('1', 0, '收发货单位名称不能为空', NULL);
            exit();
        }
		$master_customs    = $this->input->get_post("master_customs");
		 if(!empty($master_customs)) {
            $condition['master_customs'] = $master_customs;
        }else {
            echo result_to_towf_new('1', 0, '主管海关不能为空', NULL);
            exit();
        }
        $declare_code = $this->input->get_post("declare_code");
		$declare_name    = $this->input->get_post("declare_name");
        $area_code = $this->input->get_post("area_code");
		$custom_area_code = $this->input->get_post("custom_area_code");
		$ems_type    = $this->input->get_post("ems_type");
        $pay_mode = $this->input->get_post("pay_mode");
		$master_ftc = $this->input->get_post("master_ftc");
		$eci_ems_level    = $this->input->get_post("eci_ems_level");
        $step_id = $this->input->get_post("step_id");
		$create_person = $this->input->get_post("create_person");
		$cur_status ='0';
		$modify_mark ='3';
        //插入数据
        $data = array(
            'pre_enter_no'      =>$pre_enter_no,
            'eci_ems_no'  =>$eci_ems_no,
			'ems_no'   =>$ems_no,			
            'trade_code'=>$trade_code,
            'trade_name'        =>$trade_name,
			'book_type'   =>$book_type,			
            'owner_code'=>$owner_code,
            'owner_name'        =>$owner_name,
			'master_customs'        =>$master_customs,
			'declare_code'        =>$declare_code,
			'declare_name'        =>$declare_name,
			'area_code'        =>$area_code,
			'cur_status'        =>$cur_status,
			'modify_mark'        =>$modify_mark,			
			'custom_area_code'        =>$custom_area_code,
			'ems_type'        =>$ems_type,
			'pay_mode'        =>$pay_mode,
			'master_ftc'        =>$master_ftc,
			'eci_ems_level'        =>$eci_ems_level,
			'step_id'        =>$step_id,
			'create_person'        =>$create_person,
			'create_date'      =>date('Y-m-d H:i:s',time())
        );
        //PC::debug($data);
        //echo $status;
        //break;
        $this->kbook_record_model->insert($data);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	
	  public function doadd_add(){
		$condition = array();
		$cur_status='0';
		 $modify_mark       = $this->input->get_post("modify_mark");
        $pre_enter_no       = $this->input->get_post("pre_enter_no");
        //PC::debug(12);		
        $eci_ems_no   = $this->input->get_post("eci_ems_no");
        $ems_no   = $this->input->get_post("ems_no");
		 $trade_code   = $this->input->get_post("trade_code");
        $trade_name    = $this->input->get_post("trade_name");
        $book_type = $this->input->get_post("book_type");
        $owner_code    = $this->input->get_post("owner_code");
		 if(!empty($owner_code)) {
            $condition['owner_code'] = $owner_code;
        }else {
            echo result_to_towf_new('1', 0, '收发货单位代码不能为空', NULL);
            exit();
        }
        $owner_name = $this->input->get_post("owner_name");
		 if(!empty($owner_name)) {
            $condition['owner_name'] = $owner_name;
        }else {
            echo result_to_towf_new('1', 0, '收发货单位名称不能为空', NULL);
            exit();
        }
		$master_customs    = $this->input->get_post("master_customs");
		 if(!empty($master_customs)) {
            $condition['master_customs'] = $master_customs;
        }else {
            echo result_to_towf_new('1', 0, '主管海关不能为空', NULL);
            exit();
        }
        $declare_code = $this->input->get_post("declare_code");
		$declare_name    = $this->input->get_post("declare_name");
        $area_code = $this->input->get_post("area_code");
		$custom_area_code = $this->input->get_post("custom_area_code");
		$ems_type    = $this->input->get_post("ems_type");
        $pay_mode = $this->input->get_post("pay_mode");
		$master_ftc = $this->input->get_post("master_ftc");
		$eci_ems_level    = $this->input->get_post("eci_ems_level");
        $step_id = $this->input->get_post("step_id");
		$create_person = $this->input->get_post("create_person");

        //插入数据
        $data = array(
            'pre_enter_no'      =>$pre_enter_no,
            'eci_ems_no'  =>$eci_ems_no,
			'ems_no'   =>$ems_no,			
            'trade_code'=>$trade_code,
            'trade_name'        =>$trade_name,
			'book_type'   =>$book_type,			
            'owner_code'=>$owner_code,
            'owner_name'        =>$owner_name,
			'master_customs'        =>$master_customs,
			'declare_code'        =>$declare_code,
			'declare_name'        =>$declare_name,
			'area_code'        =>$area_code,
			'cur_status'        =>$cur_status,
			'modify_mark'        =>$modify_mark,			
			'custom_area_code'        =>$custom_area_code,
			'ems_type'        =>$ems_type,
			'pay_mode'        =>$pay_mode,
			'master_ftc'        =>$master_ftc,
			'eci_ems_level'        =>$eci_ems_level,
			'step_id'        =>$step_id,
			'create_person'        =>$create_person,
			'create_date'      =>date('Y-m-d H:i:s',time())
        );
        //PC::debug($data);
        //echo $status;
        //break;
        $this->kbook_record_model->insert($data);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $record_id = $this->input->get_post("record_id");		
		$condition = array();
        $condition['record_id'] = $record_id;
		//PC::debug($GUID);
		$list['info'] = $this->kbook_record_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/kbook_record_edit', $list);

    }
	
	
	  public function edit_edit()
    {
        $record_id = $this->input->get_post("record_id");		
		$condition = array();
        $condition['record_id'] = $record_id;
		//PC::debug($GUID);
		$list['info'] = $this->kbook_record_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/kbook_record_edit_edit', $list);

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
		$record_id       = $this->input->get_post("record_id");
		$list=$this->kbook_record_model->export_data($record_id);
		if($list['cur_status']=='0'||$list['cur_status']=='1'||$list['cur_status']=='3'||$list['cur_status']=='4')
		{
			echo result_to_towf_new('1', 0, '只有审批通过、变更审批通过、变更退单的单证才可以进行变更操作！', NULL);
            exit();
		}
		else
		{
			$modify_mark       = $this->input->get_post("modify_mark");
			if($modify_mark=='1')
			{
				$cur_status='4';
			}
			
			 $pre_enter_no       = $this->input->get_post("pre_enter_no");		
			$eci_ems_no   = $this->input->get_post("eci_ems_no");
			$ems_no   = $this->input->get_post("ems_no");
			 $trade_code   = $this->input->get_post("trade_code");
			$trade_name    = $this->input->get_post("trade_name");
			$book_type = $this->input->get_post("book_type");
			$owner_code    = $this->input->get_post("owner_code");
			 if(!empty($owner_code)) {
				$condition['owner_code'] = $owner_code;
			}else {
				echo result_to_towf_new('1', 0, '收发货单位代码不能为空', NULL);
				exit();
			}
			$owner_name = $this->input->get_post("owner_name");
			 if(!empty($owner_name)) {
				$condition['owner_name'] = $owner_name;
			}else {
				echo result_to_towf_new('1', 0, '收发货单位名称不能为空', NULL);
				exit();
			}
			$master_customs    = $this->input->get_post("master_customs");
			 if(!empty($master_customs)) {
				$condition['master_customs'] = $master_customs;
			}else {
				echo result_to_towf_new('1', 0, '主管海关不能为空', NULL);
				exit();
			}
			$declare_code = $this->input->get_post("declare_code");
			$declare_name    = $this->input->get_post("declare_name");
			$area_code = $this->input->get_post("area_code");
			
			$custom_area_code = $this->input->get_post("custom_area_code");
			$ems_type    = $this->input->get_post("ems_type");
			$pay_mode = $this->input->get_post("pay_mode");
			$master_ftc = $this->input->get_post("master_ftc");
			$eci_ems_level    = $this->input->get_post("eci_ems_level");
			$step_id = $this->input->get_post("step_id");
			$create_person    = $this->input->get_post("create_person");
			//插入数据
			$data = array(
			    'modify_mark'      =>$modify_mark,
				'cur_status'      =>$cur_status,
				'pre_enter_no'      =>$pre_enter_no,
				'eci_ems_no'  =>$eci_ems_no,
				'ems_no'   =>$ems_no,			
				'trade_code'=>$trade_code,
				'trade_name'        =>$trade_name,
				'book_type'   =>$book_type,			
				'owner_code'=>$owner_code,
				'owner_name'        =>$owner_name,
				'master_customs'        =>$master_customs,
				'declare_code'        =>$declare_code,
				'declare_name'        =>$declare_name,
				'area_code'        =>$area_code,
				'custom_area_code'=>$custom_area_code,
				'ems_type'        =>$ems_type,
				'pay_mode'        =>$pay_mode,
				'master_ftc'        =>$master_ftc,
				'eci_ems_level'        =>$eci_ems_level,
				'step_id'        =>$step_id,
				'create_person'        =>$create_person
			);
		   $this->kbook_record_model->update($data,$record_id);
			echo result_to_towf_new('1', 1, 'success', null);
		}
		//PC::debug($list);
       
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
		$record_id       = $this->input->get_post("record_id");
		$modify_mark       = $this->input->get_post("modify_mark");
		$pre_enter_no       = $this->input->get_post("pre_enter_no");		
			$eci_ems_no   = $this->input->get_post("eci_ems_no");
			$ems_no   = $this->input->get_post("ems_no");
			 $trade_code   = $this->input->get_post("trade_code");
			$trade_name    = $this->input->get_post("trade_name");
			$book_type = $this->input->get_post("book_type");
			$owner_code    = $this->input->get_post("owner_code");
			 if(!empty($owner_code)) {
				$condition['owner_code'] = $owner_code;
			}else {
				echo result_to_towf_new('1', 0, '收发货单位代码不能为空', NULL);
				exit();
			}
			$owner_name = $this->input->get_post("owner_name");
			 if(!empty($owner_name)) {
				$condition['owner_name'] = $owner_name;
			}else {
				echo result_to_towf_new('1', 0, '收发货单位名称不能为空', NULL);
				exit();
			}
			$master_customs    = $this->input->get_post("master_customs");
			 if(!empty($master_customs)) {
				$condition['master_customs'] = $master_customs;
			}else {
				echo result_to_towf_new('1', 0, '主管海关不能为空', NULL);
				exit();
			}
			$declare_code = $this->input->get_post("declare_code");
			$declare_name    = $this->input->get_post("declare_name");
			$area_code = $this->input->get_post("area_code");
			
			$custom_area_code = $this->input->get_post("custom_area_code");
			$ems_type    = $this->input->get_post("ems_type");
			$pay_mode = $this->input->get_post("pay_mode");
			$master_ftc = $this->input->get_post("master_ftc");
			$eci_ems_level    = $this->input->get_post("eci_ems_level");
			$step_id = $this->input->get_post("step_id");
			$create_person    = $this->input->get_post("create_person");
			//插入数据
			$data = array(
			 'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,
				'pre_enter_no'      =>$pre_enter_no,
				'eci_ems_no'  =>$eci_ems_no,
				'ems_no'   =>$ems_no,			
				'trade_code'=>$trade_code,
				'trade_name'        =>$trade_name,
				'book_type'   =>$book_type,			
				'owner_code'=>$owner_code,
				'owner_name'        =>$owner_name,
				'master_customs'        =>$master_customs,
				'declare_code'        =>$declare_code,
				'declare_name'        =>$declare_name,
				'area_code'        =>$area_code,
				'custom_area_code'=>$custom_area_code,
				'ems_type'        =>$ems_type,
				'pay_mode'        =>$pay_mode,
				'master_ftc'        =>$master_ftc,
				'eci_ems_level'        =>$eci_ems_level,
				'step_id'        =>$step_id,
				'create_person'        =>$create_person
			);
		   $this->kbook_record_model->update($data,$record_id);
			echo result_to_towf_new('1', 1, 'success', null);
		
		//PC::debug($list);
       
    }
	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $record_id = $this->input->get_post("record_id");
		 //PC::debug($record_id);
      if ($record_id) {
            $this->kbook_record_model->delete($record_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
