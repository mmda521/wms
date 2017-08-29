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

<form action="#" method="post" class="definewidth m2"  name="edit_form" id="edit_form" style="height:330px ; overflow:auto">
<table class="table table-bordered table-hover m10">

   
    <tr>
        <td class="tableleft"><span>*</span>月报编号：</td>
        <td><input type="text" name="report_no" id="report_no"  disabled  value="<?php if(isset($info[0]['report_no'])) echo $info[0]['report_no']; ?>"  /></td>
		<td class="tableleft"><span>*</span>账册编号：</td>
        <td><input type="text" name="ems_no" id="ems_no"  disabled  value="<?php if(isset($info[0]['ems_no'])) echo $info[0]['ems_no']; ?>"  /></td>
    </tr> 
	  <tr>
        <td class="tableleft"><span>*</span>当前状态：</td>
        <td><input type="text" name="step_id" id="report_no"  disabled  value="<?php if(isset($info[0]['step_id'])) echo $info[0]['step_id']; ?>"  /></td>
		<td class="tableleft"><span>*</span>经营企业编码：</td>
        <td><input type="text" name="trade_code" id="trade_code"  disabled  value="<?php if(isset($info[0]['trade_code'])) echo $info[0]['trade_code']; ?>"  /></td>
    </tr>  
	<tr>
        <td class="tableleft"><span>*</span>经营企业名称：</td>
        <td><input type="text" name="trade_name" id="trade_name"  disabled  value="<?php if(isset($info[0]['trade_name'])) echo $info[0]['trade_name']; ?>"  /></td>
		<td class="tableleft"><span>*</span>主管海关：</td>
        <td><input type="text" name="customs_code" id="customs_code"  disabled  value="<?php if(isset($info[0]['customs_code'])) echo $info[0]['customs_code']; ?>"  /></td>
    </tr> 
	 <tr>
        <td class="tableleft"><span>*</span>申报年份：</td>
        <td><input type="text" name="app_year" id="app_year"  disabled  value="<?php if(isset($info[0]['app_year'])) echo $info[0]['app_year']; ?>"  /></td>
		<td class="tableleft"><span>*</span>申报月份：</td>
        <td><input type="text" name="app_month" id="app_month"  disabled  value="<?php if(isset($info[0]['app_month'])) echo $info[0]['app_month']; ?>"  /></td>
    </tr> 
	<tr>
        <td class="tableleft"><span>*</span>区域代码：</td>
        <td><input type="text" name="area_code" id="area_code"  disabled  value="<?php if(isset($info[0]['area_code'])) echo $info[0]['area_code']; ?>"  /></td>
		<td class="tableleft"><span>*</span>创建人：</td>
        <td><input type="text" name="create_person" id="create_person"  disabled  value="<?php if(isset($info[0]['create_person'])) echo $info[0]['create_person']; ?>"  /></td>
    </tr> 
	<tr>
        <td class="tableleft"><span>*</span>申报人：</td>
        <td><input type="text" name="declare_person" id="declare_person"  disabled  value="<?php if(isset($info[0]['declare_person'])) echo $info[0]['declare_person']; ?>"  /></td>
		<td class="tableleft"><span>*</span>审批人：</td>
        <td><input type="text" name="approve_person" id="approve_person"  disabled  value="<?php if(isset($info[0]['approve_person'])) echo $info[0]['approve_person']; ?>"  /></td>
    </tr> 
    
      
</table>
</form>
</body>
</html>  


 