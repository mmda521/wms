<?php
/**
 *库位操作
 *
 *
 **/
class Month_report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        //$this->load->helper('guid');
        $this->load->library("common_page");  
        $this->load->model('month_report_model');      
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
         $this->load->view('wms/month_report');
		
    }
	
	
	
	
	/*导出功能 */
	 public function ajax_data_export(){	  			
	 $condition = array();
		
		 //获取月报编号
        $report_no = $this->input->get_post("report_no");
        if(!empty($report_no)){
            $condition['report_no'] = $report_no;
        }
		
        //获取申报年份
        $app_year = $this->input->get_post("app_year");
        if(!empty($app_year)){
            $condition['app_year'] = $app_year;
        }
		//获取企业名称
		 $app_month = $this->input->get_post("app_month");
        if(!empty($app_month)){
            $condition['app_month'] = $app_month;
        }
		//当前状态
		 $step_id = $this->input->get_post("step_id");
        if(!empty($wh_name)){
            $condition['wh_name'] = $wh_name;
        }
		//申报月份
		 $app_month = $this->input->get_post("app_month");
        if(!empty($app_month)){
            $condition['app_month'] = $app_month;
        }
		
        //创建时间
		 $create_date = $this->input->get_post("create_date");
        if(!empty($create_date)){
            $condition['create_date'] = $create_date;
        }
       
        
        $total = $this->month_report_model->export_data($condition);      
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
                          ->setCellValue('A'.$num, $v['report_no'])    
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
        
		 //获取月报编号
        $report_no = $this->input->get_post("report_no");
        if(!empty($report_no)){
            $condition['report_no'] = $report_no;
        }
		
        //获取申报年份
        $app_year = $this->input->get_post("app_year");
        if(!empty($app_year)){
            $condition['app_year'] = $app_year;
        }
		//获取企业名称
		 $trade_name = $this->input->get_post("trade_name");
        if(!empty($app_month)){
            $condition['app_month'] = $app_month;
        }
		//当前状态
		 $step_id = $this->input->get_post("step_id");
        if(!empty($wh_name)){
            $condition['wh_name'] = $wh_name;
        }
		//申报月份
		 $app_month = $this->input->get_post("app_month");
        if(!empty($app_month)){
            $condition['app_month'] = $app_month;
        }
		
       
		 //创建时间
		 $create_date = $this->input->get_post("create_date");
        if(!empty($create_date)){
            $condition['create_date'] = $create_date;
        }
       
        
        
        $total = $this->month_report_model->count_num($condition); 
		PC::debug(23425);     
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->month_report_model->get_list($condition,$limit,$offset);
	
		
		//PC::debug($list);
        echo result_to_towf_new($list, 1, '成功', $page_string) ;
    }

	
	
	 /**
   

	    /**
    
	
	
    /**
    *打开编辑
    *
    *
    * */
     public function edit()
    {
        $report_no = $this->input->get_post("report_no");		
		$condition = array();
        $condition['report_no'] = $report_no;
		
		$list['info'] = $this->month_report_model->get_list($condition);  
      PC::debug($report_no);	
	    $this->load->view('wms/month_report_edit', $list);

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
        $report_no = $this->input->get_post("report_no");
		
        $report_no = $this->input->get_post("report_no");
		 if(!empty($report_no)) {
            $condition['report_no'] = $report_no;
        }else {
            echo result_to_towf_new('1', 0, '检索号不能为空', NULL);
            exit();
        }
		
		
       
	    echo result_to_towf_new('1', 1, 'success', null);
    }

	
/**
   

	
	 /**
    *删除库位信息
    *
    *
    * */
     public function delete()
    { 
         $report_no = $this->input->get_post("report_no");
		 //PC::debug($GUID);
      if ($report_no) {
            $this->month_report_model->delete($report_no);
           
        }
		echo result_to_towf_new('1', 1, 'success', null);
    }

   
}
