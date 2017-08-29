<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title> 搜索表单</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/style.css" />  
	<link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/bui-min.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/jquery-1.8.1.min.js"></script> 	
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/bui-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/Js/validate/validator.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
 </head>
 <body>
<form  class="definewidth m2"  name="add_form" id="add_form" style="height:100px ; overflow:auto">
<table class="table table-bordered table-hover m10">
     <tr>
		 <td class="tableleft"><span>*</span>项号</td>
         <td><input type="text" name="g_no" id="g_no" /></td>
		 <td class="tableleft"><span>*</span>商品编号</td>
         <td><input type="text" name="code_t_s" id="code_t_s" /></td>		    
	</tr> 
    <tr>
		 <td class="tableleft">序号</td>
         <td><input type="text" name="cop_no" id="cop_no" /></td>
		 <td class="tableleft">成品料件标志</td>
         <td><input type="text" name="eci_goods_flag" id="eci_goods_flag" /></td>		    
	</tr>  	
	 <tr>
        <td class="tableleft"><span>*</span>征免方式</td>
        <td><input type="text" name="duty_mode" id="duty_mode" /></td>
		<td class="tableleft"><span>*</span>商品名称</td>
        <td><input type="text" name="g_name" id="g_name" /></td>
    </tr>    
    <tr>
       <td class="tableleft" >产销国</td>
       <td><input type="text" name="country_code" id="country_code" /></td>
	     <td class="tableleft" >规格型号</td>
       <td><input type="text" name="g_model" id="g_model" /></td>
    </tr> 
    <tr>
       <td class="tableleft" >最终目的国</td>
       <td><input type="text" name="aim_country" id="aim_country" /></td>
	     <td class="tableleft" ><span>*</span>账册编号</td>
	    <td><select id="record_id" name="record_id">
			      <option value="">请选择</option>
                    <?php
                    $query = $this->db->query('SELECT * FROM  kbook_record');
					
                    foreach($query->result_array() as $row){
                        if($row['eci_ems_no']){?>
                            <option value="<?php echo $row['record_id'];?>"><?php echo $row['eci_ems_no'];?></option>
                        <?php } }?>
              </select>				
		</td>		
    </tr>
    <tr>
       <td class="tableleft" >申报申报计量单位</td>
       <td><input type="text" name="unit" id="unit" /></td>
	     <td class="tableleft">法定申报计量单位</td>
       <td><input type="text" name="unit_1" id="unit_1" /></td>
    </tr> 	
	 <tr>
	   <td class="tableleft" >处理标志</td>
        <td colspan="3">  
			     <select id="modify_mark" name="modify_mark">
                     <option value="">全部</option>
                     <option value="3">备案</option>
                     <!--<option value="1">变更</option>
					 <option value="0">不变</option>-->
                 </select>
	   </td>
    </tr> 	
<!--   <tr>
      <td class="tableleft">当前状态</td>
             <td>  <select id="cur_status" name="cur_status">
                     <option value="">请选择</option>
                     <option value="0">备案预录入</option>
                     <option value="1">待审批</option>
					 <option value="2">审批通过</option>
					 <option value="3">审批退单</option>
					 <option value="4">变更预录入</option>
                 </select>
	        </td>
	  <td class="tableleft">处理标志</td>
             <td>  <select id="process_mark" name="process_mark">
                     <option value="">请选择</option>
                     <option value="0">新增</option>
                     <option value="1">修改</option>
					 <option value="2">不变</option>
                 </select>
	         </td>
    </tr>  -->		
</table>
</form>
</body>
</html> 

