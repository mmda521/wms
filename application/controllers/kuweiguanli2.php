<?php
/**
 *库位操作
 *
 *
 **/
class Kuweiguanli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('kuweiguanli_model');      
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
         $this->load->view('wms/kuweiguanli');
		
    }
	
	
	
	
	/*导出功能 */
	 public function ajax_data_export(){	  			
	 $condition = array();
		
		//获取库位号
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
		//仓库名称
		 $wh_name = $this->input->get_post("wh_name");
        if(!empty($wh_name)){
            $condition['wh_name'] = $wh_name;
        }
		//库位名称
		 $location_name = $this->input->get_post("location_name");
        if(!empty($location_name)){
            $condition['location_name'] = $location;
        }
		
		//储库性质
		 $st_nature = $this->input->get_post("st_nature");
        if(!empty($st_nature)){
            $condition['st_nature'] = $st_nature;
        }
		//启用时间
		 $start_time = $this->input->get_post("start_time");
        if(!empty($start_time)){
            $condition['start_time'] = $start_time;
        }
        //使用年限
		 $use_year = $this->input->get_post("use_year");
        if(!empty($use_year)){
            $condition['use_year'] = $use_year;
        }
        //启用状态
        $status = $this->input->get_post("status");
		 //PC::debug($status);
        if(in_array($status,array('Y','N',true))){
            $condition['status'] = $status; 
        }
        
        $total = $this->kuweiguanli_model->export_data($condition);      
	    foreach($total as $k=>$v){
            $total[$k]['status'] = ($v['status'] == 'Y' )?"启用":"停用";          
        }
		
      $this->load->library("phpexcel");//ci框架中引入excel类
	  $PHPExcel = new PHPExcel();	  
	  //$PHPExcel->getProperties()->setTitle("库位信息导出")->setDescription("备份数据");	 
      $PHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','库位号')
            ->setCellValue('B1','企业编码')
            ->setCellValue('C1','企业名称')
            ->setCellValue('D1','仓库名称')
			->setCellValue('E1','库位名称')
            ->setCellValue('F1','储库性质')
			->setCellValue('G1','启用时间')
			->setCellValue('H1','使用年限')
			->setCellValue('I1','最大容量')
			->setCellValue('J1','状态');			 
		   foreach($total as $k => $v){
             $num=$k+2;
             $PHPExcel->setActiveSheetIndex(0)
                         //Excel的第A列，uid是你查出数组的键值，下面以此类推
                          ->setCellValue('A'.$num, $v['location_no'])    
                          ->setCellValue('B'.$num, $v['ep_no'])
                          ->setCellValue('C'.$num, $v['ep_name'])
						  ->setCellValue('D'.$num, $v['wh_name'])    
                          ->setCellValue('E'.$num, $v['location_name'])
                          ->setCellValue('F'.$num, $v['st_nature'])
						  ->setCellValue('G'.$num, $v['start_time'])
						  ->setCellValue('H'.$num, $v['use_year'])
						  ->setCellValue('I'.$num, $v['max_capacity'])
						  ->setCellValue('J'.$num, $v['status']);
            }			
			 $PHPExcel->getActiveSheet()->setTitle('库位信息导出-'.date('Y-m-d',time()));
			 //设置宽度
			 $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			//设置水平居中
			$PHPExcel->getActiveSheet()->getStyle('A1:J1000')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		   
           // $PHPExcel->setActiveSheetIndex(0);
			header('Pragma:public');
             header("Content-Type: application/vnd.ms-excel;charset=uft8");  
			  header("Content-Disposition:attachment; filename=FILE".date("YmdHis").".xlsx");  
			$objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);	
            //$objWriter = new PHPExcel_Writer_Excel5($PHPExcel);
            $objWriter->save('php://output');	
    }
	
	
	/*下载模板 */
	 public function ajax_data_templet(){	  			
      $this->load->library("phpexcel");//ci框架中引入excel类
	  $PHPExcel = new PHPExcel();	  
	  //$PHPExcel->getProperties()->setTitle("库位信息导出")->setDescription("备份数据");	
      //设置当前的sheet	  
      $PHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','库位编号')
            ->setCellValue('B1','企业编码')
            ->setCellValue('C1','企业名称')
            ->setCellValue('D1','仓库名称')
			->setCellValue('E1','库位名称')
            ->setCellValue('F1','储库性质')
			->setCellValue('G1','启用时间')	
			->setCellValue('H1','使用年限')
			->setCellValue('I1','最大容量')
			->setCellValue('J1','状态')		 
		  	->setCellValue('A2',1)
            ->setCellValue('B2','c1')
            ->setCellValue('C2','ep_name')
            ->setCellValue('D2','wh_name')
			->setCellValue('E2','location_name')
			->setCellValue('F2','wms')
			->setCellValue('G2','2015-09-15 15:33:58')
            ->setCellValue('H2','10')
			->setCellValue('I2','100')
			->setCellValue('J2','启用');
			//设置单元格的字体颜色
            $PHPExcel->getActiveSheet()->getStyle( 'A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			$PHPExcel->getActiveSheet()->getStyle( 'B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
            $PHPExcel->getActiveSheet()->getStyle( 'F1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
			//$objActSheet->getColumnDimension( 'E')->setWidth(30);
			 $PHPExcel->getActiveSheet()->setTitle('库位信息导出模板-'.date('Y-m-d',time()));         
			 //创建第二个工作表
            $msgWorkSheet = new PHPExcel_Worksheet($PHPExcel, 'take_care'); //创建一个工作表
            $PHPExcel->addSheet($msgWorkSheet); //插入工作表
            $PHPExcel->setActiveSheetIndex(1); //切换到新创建的工作表
			$PHPExcel->getActiveSheet()->mergeCells('A2:C3');
			$PHPExcel->getActiveSheet()->mergeCells('A4:C5');
			$PHPExcel->getActiveSheet()->mergeCells('A6:C7');
			$PHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A2','红色标示的字段不可以为空')
            ->setCellValue('A4','重量和价值必须为正数')
            ->setCellValue('A6','件数必须为正整数');
			$PHPExcel->getActiveSheet()->setTitle('库位信息导出注意事项');
			 header('Pragma:public');
             header("Content-Type: application/vnd.ms-excel;charset=uft8");  
			 header("Content-Disposition:attachment; filename=库位信息下载模板.xlsx");  
			$objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);	
            //$objWriter = new PHPExcel_Writer_Excel5($PHPExcel);
            $objWriter->save('php://output');
			// $objPHPExcel->disconnectWorksheets();
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
		 //PC::debug($status);
        //if(in_array($status,array('Y','N',true))){
            //$condition['status'] = $status; 
        //}
        
        $total = $this->kuweiguanli_model->count_num($condition);   
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->kuweiguanli_model->get_list($condition,$limit,$offset);
        foreach($list as $k=>$v){
            $list[$k]['tin_status'] = ($v['tin_status'] == '1' )?"启用":'<font color="red">闲置</font>';          
            //$list[$k]['regdate'] = date("Y-m-d H:i:s",$v['regdate']);
            
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
         $this->load->view('wms/kuweiguanli_add');
    }

	    /**
    *添加库位处理
    *
    *
    * */
    public function doadd(){
		$condition = array();
        $location_no       = $this->input->get_post("location_no");
		 if(!empty($location_no)) {
            $condition['location_no'] = $location_no;
        }else {
            echo result_to_towf_new('1', 0, '库位编号不能为空', NULL);
            exit();
        }
        $ep_no   = $this->input->get_post("ep_no");
		 if(!empty($ep_no)) {
            $condition['ep_no'] = $ep_no;
        }else {
            echo result_to_towf_new('1', 0, '企业编码不能为空', NULL);
            exit();
        }
		$location_name= $this->input->get_post("location_name");
		$start_time=$this->input->get_post("start_time");
		$use_year=$this->input->get_post("use_year");
		$max_capacity=$this->input->get_post("max_capacity");
		$wh_name    = $this->input->get_post("wh_name");
        $st_nature = $this->input->get_post("st_nature");
        $ep_name   = $this->input->get_post("ep_name");
		//$status=$this->input->get_post("status");
		 if(!empty($ep_name)) {
            $condition['ep_name'] = $ep_name;
        }else {
            echo result_to_towf_new('1', 0, '企业名称不能为空', NULL);
            exit();
        }
		if(!empty($wh_name)) {
            $condition['wh_name'] = $wh_name;
        }else {
            echo result_to_towf_new('1', 0, '仓库名称不能为空', NULL);
            exit();
        }
		if(!empty($wh_name)) {
            $condition['st_nature'] = $st_nature;
        }else {
            echo result_to_towf_new('1', 0, '储库性质不能为空', NULL);
            exit();
        }
        //if(!empty($status)) {
            //$condition['status'] = $status;
        //}else {
            //echo result_to_towf_new('1', 0, '请选择状态', NULL);
           // exit();
        //}


        //插入数据
        $data = array(
           // 'guid'          =>guid_create(),
            'location_no'      =>$location_no,
			'location_name'    =>$location_name,
            'ep_no'  =>$ep_no,
			'ep_name'   =>$ep_name,			
            'st_nature'=>$st_nature,
            'use_year'        =>$use_year,
			'max_capacity'    =>$max_capacity,
			'wh_name'         =>$wh_name,
			//'status'         =>$status,
            'start_time'      =>date('Y-m-d H:i:s',time())
        );
        //echo $status;
        //break;
        $this->kuweiguanli_model->insert($data);
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
        $location_id = $this->input->get_post("location_id");		
		$condition = array();
        $condition['location_id'] = $location_id;
		
		$list['info'] = $this->kuweiguanli_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/kuweiguanli_edit', $list);

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
        $location_id = $this->input->get_post("location_id");
		
        $location_no = $this->input->get_post("location_no");
		//PC::debug($location_id);
		 if(!empty($location_no)) {
            $condition['location_no'] = $location_no;
        }else {
            echo result_to_towf_new('1', 0, '检索号不能为空', NULL);
            exit();
        }
		$ep_no   = $this->input->get_post("ep_no");
		 if(!empty($ep_no)) {
            $condition['ep_no'] = $ep_no;
        }else {
            echo result_to_towf_new('1', 0, '库位号不能为空', NULL);
            exit();
        }
		$ep_name   = $this->input->get_post("ep_name");		
		$wh_name    = $this->input->get_post("wh_name");
		$location_name    = $this->input->get_post("location_name");
		$st_nature    = $this->input->get_post("st_nature");
        $start_time         = $this->input->get_post("start_time");
		$use_year    = $this->input->get_post("use_year");
		$max_capacity=$this->input->get_post("max_capacity");
		$status=$this->input->get_post("status");
		 //if(!empty($status)) {
            //$condition['status'] = $status;
        //}else {
            //echo result_to_towf_new('1', 0, '启用状态不能为空', NULL);
            //exit();
        //}
         //编辑数据
        $data = array(  
             //'guid'          =>guid_create(),
            'location_no'      =>$location_no,
			'location_name'    =>$location_name,
            'ep_no'  =>$ep_no,
			'ep_name'   =>$ep_name,			
            'st_nature'=>$st_nature,
            'use_year'        =>$use_year,
			'max_capacity'    =>$max_capacity,
			'wh_name'         =>$wh_name,
			//'status'         =>$status,
            'start_time'      =>date('Y-m-d H:i:s',time())
        );
		
       $this->kuweiguanli_model->update($data,$location_id);
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $location_id = $this->input->get_post("location_id");
		 //PC::debug($GUID);
      if ($location_id) {
            $this->kuweiguanli_model->delete($location_id);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
