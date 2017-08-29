<?php
/**
 *库位操作
 *
 *
 **/
class Zhangce_change extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page");  
        $this->load->model('zhangce_model');
        $this->load->model('item_number_model'); 
        $this->load->model('part_no_model'); 		
        $this->load->library('session');    
    }

	
    /**
    *index页面
    *
    *
    * */
     public function index()
    {
         $this->load->view('wms/zhangce_change');
		
    }
	
	
		//申报功能
	public function report_send(){
        $record_id = $this->input->get_post("record_id");
		//
		foreach($record_id as $key =>$v){
			$condition=array('record_id' => $v);
			$list = $this->item_number_model->get_data($condition); 
			//PC::debug($list);
			$data = $this->part_no_model->array_data($condition); 
			//PC::debug($data);
			$count=0;
			if(!(empty($list)&&empty($data)))
			{
			 echo result_to_towf_new('1', 0, '变更表体数据中不存在新增、变更数据，请新增数据后申报', NULL);
             exit();
			}
			foreach($list as $k1=>$v1)
			{
				if($v1['modify_mark']!='0')
				{
					$count++;
				}
			}
			foreach($data as $k2=>$v2)
			{
				if($v2['modify_mark']!='0')
				{
					$count++;
				}
			}
		  if($count==0)
		  {
			echo result_to_towf_new('1', 0, '当前环节不可以进行操作', NULL);
            exit();
		  }
		
		}
        
        header("Content-type:text/html; charset=utf-8");
        ini_set('soap.wsdl_cache_enabled', "0"); //关闭wsdl缓存
       $soap = new SoapClient('http://192.168.17.99:8090/BOOK.asmx?wsdl');
//获取配置扫描类型
        $return = $soap->CreatBeiGengXml($condition);

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
        
        $total = $this->zhangce_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->zhangce_model->get_list($condition,$limit,$offset);
        foreach($list as $k=>$v){
            $list[$k]['book_type'] = ($v['book_type'] == 'Y' )?"K账册":"J账册";  
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
         $this->load->view('wms/zhangce_add_change');
    }

	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
        $pre_enter_no       = $this->input->get_post("pre_enter_no");		
        $eci_ems_no   = $this->input->get_post("eci_ems_no");
        $ems_no   = $this->input->get_post("ems_no");
		 $tarde_code   = $this->input->get_post("tarde_code");
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
        //插入数据
        $data = array(
            'pre_enter_no'      =>$pre_enter_no,
            'eci_ems_no'  =>$eci_ems_no,
			'ems_no'   =>$ems_no,			
            'tarde_code'=>$tarde_code,
            'trade_name'        =>$trade_name,
			'book_type'   =>$book_type,			
            'owner_code'=>$owner_code,
            'owner_name'        =>$owner_name,
			'master_customs'        =>$master_customs,
			'declare_code'        =>$declare_code,
			'declare_name'        =>$declare_name,
			'area_code'        =>$area_code
        );
        $this->zhangce_model->insert($data);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	 public function edit()
    {   
         $record_id = $this->input->get_post("record_id");
		 //PC::debug($record_id);
         $condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
        //PC::debug($condition);		 
         $this->load->view('wms/zhangce_edit_change',$condition);
    }
    /**
    *打开编辑
    *
    *
    * */
  /*    public function edit()
    {
        $record_id = $this->input->get_post("record_id");		
		$condition = array();
        $condition['record_id'] = $record_id;
		//PC::debug($GUID);
		$list['info'] = $this->zhangce_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/zhangce_edit', $list);
    } */
	
/**
    *处理编辑
    *
    *
    * */
    /*  public function do_edit()
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
       $pre_enter_no       = $this->input->get_post("pre_enter_no");		
        $eci_ems_no   = $this->input->get_post("eci_ems_no");
        $ems_no   = $this->input->get_post("ems_no");
		 $tarde_code   = $this->input->get_post("tarde_code");
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
        //插入数据
        $data = array(
            'pre_enter_no'      =>$pre_enter_no,
            'eci_ems_no'  =>$eci_ems_no,
			'ems_no'   =>$ems_no,			
            'tarde_code'=>$tarde_code,
            'trade_name'        =>$trade_name,
			'book_type'   =>$book_type,			
            'owner_code'=>$owner_code,
            'owner_name'        =>$owner_name,
			'master_customs'        =>$master_customs,
			'declare_code'        =>$declare_code,
			'declare_name'        =>$declare_name,
			'area_code'        =>$area_code
        );
       $this->zhangce_model->update($data,$record_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    } */

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $record_id = $this->input->get_post("record_id");
		 //PC::debug($GUID);
      if ($record_id) {
            $this->zhangce_model->delete($record_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
