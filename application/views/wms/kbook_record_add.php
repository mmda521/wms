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
			    <td class="tableleft">预录入号</td>
               <td><input type="text" name="pre_enter_no" id="pre_enter_no" /></td>
			    <td class="tableleft">账册编号</td>
              <td><input type="text" name="eci_ems_no" id="eci_ems_no" /></td>		    
	</tr>  
	 <tr>      
		<td class="tableleft">K2000账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" /></td>
		<td class="tableleft">经营单位代码</td>
        <td><input type="text" name="trade_code" id="trade_code" value="<?php if(isset($info['enterprice_code'])) {echo $info['enterprice_code'];} ?>"/></td>
    </tr>    
    <tr>
       <td class="tableleft" >经营单位名称</td>
       <td><input type="text" name="trade_name" id="trade_name" value="<?php if(isset($info['enterprice_name'])) {echo $info['enterprice_name'];} ?>"/></td>
	    <td class="tableleft">账册类型</td>
             <td>  
			     <select id="book_type" name="book_type">
                     <option value="">全部</option>
                     <option value="Y">K账册</option>
                     <option value="N">J账册</option>
                 </select>
		     </td>
    </tr> 
    <tr>
       <td class="tableleft" ><span>*</span>收发货单位代码</td>
       <td><input type="text" name="owner_code" id="owner_code" /></td>
	     <td class="tableleft" ><span>*</span>收发货单位名称</td>
       <td><input type="text" name="owner_name" id="owner_name"/></td>
    </tr> 
    <tr>     
	   <td class="tableleft"><span>*</span>主管海关</td>
       <td ><input  type="text" name="master_customs" id="master_customs"/></td>
	   <td class="tableleft" >申请单位代码</td>
       <td ><input  type="text" name="declare_code" id="declare_code"/></td>
    </tr> 
    <tr>
       <td class="tableleft" >申请单位名称</td>
       <td><input type="text" name="declare_name" id="declare_name" /></td>
	     <td class="tableleft" >区域代码</td>
       <td><input type="text" name="area_code" id="area_code"/></td>
    </tr> 
 <tr>
       <td class="tableleft" >海关区域代码</td>
       <td><input type="text" name="custom_area_code" id="custom_area_code" /></td>
	    <td class="tableleft" >H2000账册类型</td>
       <td><input type="text" name="ems_type" id="ems_type" /></td>
	   
    </tr> 	
 <tr>
         <td class="tableleft" >保税方式</td>
       <td><input type="text" name="pay_mode" id="pay_mode"/></td>
       <td class="tableleft" >主管外经贸</td>
       <td><input type="text" name="master_ftc" id="master_ftc" /></td>
	    
    </tr> 	
<tr>
       <td class="tableleft">账册级别</td>
             <td>  
			     <select id="eci_ems_level" name="eci_ems_level">
                     <option value="">全部</option>
                     <option value="LHJ">料号级</option>
                     <option value="XHJ">项号级账册</option>
                 </select>
		     </td>
       <td class="tableleft" >当前环节</td>
       <td><input type="text" name="step_id" id="step_id" /></td>	   
    </tr> 
<tr>
	    <td class="tableleft" >创建人</td>
       <td><input type="text" name="create_person" id="create_person" /></td> 
	    <td class="tableleft" >处理标志</td>
        <td>  
			     <select id="modify_mark" name="modify_mark">
                     <option value="">全部</option>
                     <option value="3">备案</option>
                     <option value="1">变更</option>
					 <option value="0">不变</option>
                 </select>
	   </td>
    </tr> 	
</table>
</form>
</body>
</html> 


