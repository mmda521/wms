<?php
/**
 *库位操作
 *
 *
 **/
class Zhangce extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('common_function');
        $this->load->library("common_page");  
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
     public function index()
    {
         $this->load->view('wms/zhangce');
		
    }
	
	
	
	
	/*导出功能 */
	 public function ajax_data_export(){	  			
	 $condition = array();
		
		 //获取检索号
        $index_no = $this->input->get_post("index_no");
        if(!empty($index_no)){
            $condition['index_no'] = $index_no;
        }
		
        //获取库位号
        $goodssite_no = $this->input->get_post("goodssite_no");
        if(!empty($goodssite_no)){
            $condition['goodssite_no'] = $goodssite_no;
        }

        //启用状态
        $status = $this->input->get_post("status");
		 //PC::debug($status);
        if(in_array($status,array('Y','N',true))){
            $condition['status'] = $status; 
        }
        
        $total = $this->location_model->export_data($condition);      
	    foreach($total as $k=>$v){
            $total[$k]['STATUS'] = ($v['STATUS'] == 'Y' )?"启用":"停用";          
        }
      $this->load->library("phpexcel");//ci框架中引入excel类
	  $PHPExcel = new PHPExcel();	  
	  //$PHPExcel->getProperties()->setTitle("库位信息导出")->setDescription("备份数据");	 
      $PHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','检索号')
            ->setCellValue('B1','库位号')
            ->setCellValue('C1','库位说明')
            ->setCellValue('D1','操作人员')
			->setCellValue('E1','操作时间')
            ->setCellValue('F1','状态');			 
		   foreach($total as $k => $v){
             $num=$k+2;
             $PHPExcel->setActiveSheetIndex(0)
                         //Excel的第A列，uid是你查出数组的键值，下面以此类推
                          ->setCellValue('A'.$num, $v['INDEX_NO'])    
                          ->setCellValue('B'.$num, $v['GOODSSITE_NO'])
                          ->setCellValue('C'.$num, $v['GOODSSITE_NOTE'])
						  ->setCellValue('D'.$num, $v['OPERUSER_ID'])    
                          ->setCellValue('E'.$num, $v['OPERDATE'])
                          ->setCellValue('F'.$num, $v['STATUS']);
            }			
			 $PHPExcel->getActiveSheet()->setTitle('库位信息导出-'.date('Y-m-d',time()));
			 //设置宽度
			 $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			//设置水平居中
			$PHPExcel->getActiveSheet()->getStyle('A1:F1000')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		   
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
            ->setCellValue('A1','检索号')
            ->setCellValue('B1','库位号')
            ->setCellValue('C1','库位说明')
            ->setCellValue('D1','操作人员')
			->setCellValue('E1','操作时间')
            ->setCellValue('F1','状态')			 
		  	 ->setCellValue('A2',1)
            ->setCellValue('B2','c1')
            ->setCellValue('C2',65)
            ->setCellValue('D2',23)
			->setCellValue('E2','2015-09-15 15:33:58')
            ->setCellValue('F2','启用');
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
		 //PC::debug($status);
        if(in_array($cur_status,array('Y','N',true))){
            $condition['cur_status'] = $cur_status; 
        }
        
        $total = $this->zhangce_model->count_num($condition);      
        $page_string = $this->common_page->page_string($total, $limit, $page);

        $list = $this->zhangce_model->get_list($condition,$limit,$offset);
        foreach($list as $k=>$v){
            $list[$k]['book_type'] = ($v['book_type'] == 'Y' )?"K账册":"J账册";          
            $list[$k]['cur_status'] = ($v['cur_status'] == 'Y' )?"启用":"停用"; 
            
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
         $this->load->view('wms/zhangce_add');
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

        //echo $status;
        //break;
        $this->zhangce_model->insert($data);
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
		$list['info'] = $this->zhangce_model->get_list($condition);  
     // PC::debug($list);	
	    $this->load->view('wms/zhangce_edit', $list);

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
    }

	
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
