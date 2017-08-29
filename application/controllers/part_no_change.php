<?php
/**
 *库位操作
 *
 *
 **/
class Part_no_change extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page");  
        $this->load->model('part_no_model');
        $this->load->model('item_number_model');
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
	   public function change()
    {
		$record_id = $this->input->get_post("record_id");
		//PC::debug($record_id);
		$condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
         $this->load->view('wms/part_no_change',$condition);
		
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
        $gop_g_no = $this->input->get_post("gop_g_no");
        if(!empty($gop_g_no)){
            $condition['gop_g_no'] = $gop_g_no;
        }
		
        $gode_t_s = $this->input->get_post("gode_t_s");
        if(!empty($gode_t_s)){
            $condition['gode_t_s'] = $gode_t_s;
        }

       $g_name = $this->input->get_post("g_name");
        if(!empty($g_name)){
            $condition['g_name'] = $g_name;
        }
		//项号列表
	    $total = $this->part_no_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);
        $list = $this->part_no_model->get_list($condition,$limit,$offset);
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
          foreach($list as $k=>$v){          
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
	   echo result_to_towf_new($list, 1, '成功', $page_string);
    }

	
	
	 /**
    *新增库位页面
    *
    *
    * */

	     public function add()
    { 
         $record_id    = $this->input->get_post("record_id");
		 //PC::debug($record_id);
		 $condition = array();
		 $condition['info'] =$this->zhangce_model->export_data($record_id);	
         $this->load->view('wms/part_no_add',$condition);
    }
	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
		$cur_status='0';
		$record_id       = $this->input->get_post("record_id");
		 $modify_mark       = $this->input->get_post("modify_mark");
        $gop_g_no       = $this->input->get_post("gop_g_no");
		 if(!empty($gop_g_no)) {
            $condition['gop_g_no'] = $gop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
        $g_no   = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
		$g_model   = $this->input->get_post("g_model");
		 $list=$this->item_number_model->export_data($g_no);
		 
        //插入数据
        $data = array(
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,
            'gop_g_no'      =>$gop_g_no,
            'g_no'  =>$g_no,
			'g_model'      =>$g_model,
			'record_id'=>$list['record_id'],
			'gode_t_s'=>$list['code_t_s'],
			'g_name'=>$list['g_name'],			
			'item_id'=>$list['item_id'],
           'country_code'=>$list['country_code'],
        );

        PC::debug($data);
        $this->part_no_model->insert($data);
        //showmessage("添加库位成功","sample2/index",3,1);
        echo result_to_towf_new('1', 1, 'success', null);
    }
	
	
	 public function add_add()
    {      
         $this->load->view('wms/part_no_add');
    }
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $part_id = $this->input->get_post("part_id");		
		$condition = array();
        $condition['part_id'] = $part_id;
		$list['info'] = $this->part_no_model->get_data($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/part_no_edit', $list);

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
		$part_id = $this->input->get_post("part_id");
		 $gop_g_no       = $this->input->get_post("gop_g_no");
		 if(!empty($gop_g_no)) {
            $condition['gop_g_no'] = $gop_g_no;
        }else {
            echo result_to_towf_new('1', 0, '货号不能为空', NULL);
            exit();
        }
        $g_no   = $this->input->get_post("g_no");
		 if(!empty($g_no)) {
            $condition['g_no'] = $g_no;
        }else {
            echo result_to_towf_new('1', 0, '项号不能为空', NULL);
            exit();
        }
		$g_model   = $this->input->get_post("g_model");
        $list=$this->item_number_model->export_data($g_no);
		 
        //插入数据
        $data = array(
		
		    'modify_mark'      =>$modify_mark,
			'cur_status'      =>$cur_status,
            'gop_g_no'      =>$gop_g_no,
            'g_no'  =>$g_no,
			'g_model'      =>$g_model,
			'gode_t_s'=>$list['code_t_s'],
			'g_name'=>$list['g_name'],
			'item_id'=>$list['item_id'],
           'country_code'=>$list['country_code'],
        );
       $this->part_no_model->update($data,$part_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $part_id = $this->input->get_post("part_id");
		 //PC::debug($GUID);
      if ($part_id) {
            $this->part_no_model->delete($part_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
