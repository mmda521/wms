<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>添加企业信息</title>
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
<form  class="definewidth m2"  name="add_form" id="add_form" style="height:330px ; overflow:auto">
<input type="hidden" name="action" value="doadd">
<table class="table table-bordered table-hover m10">
     <tr>
			    <td class="tableleft"><span>*</span>企业编码</td>
               <td><input type="text" name="enterprice_code" id="enterprice_code" /></td>
			    <td class="tableleft"><span>*</span>企业名称</td>
              <td><input type="text" name="enterprice_name" id="enterprice_name" /></td>		    
	</tr>  
	 <tr>
        <td class="tableleft">企业类型</td>
        <td>
            <select id="enterprice_type" name="enterprice_type">
                     <option value="">请选择</option>
                     <option value="0">(保税仓)公共型保税仓</option>
                     <option value="1">(保税仓)自用型保税仓</option>
            </select>
        </td>
		<td class="tableleft"><span>*</span>关区名称</td>
        <td><input type="text" name="custom_name" id="custom_name" /></td>
    </tr>    
    <tr>
       <td class="tableleft" ><span>*</span>区域名称</td>
       <td><input type="text" name="area_name" id="area_name" /></td>
	     <td class="tableleft" >组织机构代码</td>
       <td><input type="text" name="org_code" id="org_code" /></td>
    </tr> 
    <tr>
       <td class="tableleft" >企业注册名称</td>
       <td><input type="text" name="enterprice_full_name" id="enterprice_full_name" /></td>
	     <td class="tableleft" >注册日期</td>
       <td><input readonly type="text" name="record_date" id="record_date" class="calendar" /></td>
    </tr> 
    <tr>     
	   <td class="tableleft" >企业英文名称</td>
       <td ><input  type="text" name="enterprice_ename" id="enterprice_ename"/></td>
	    <td class="tableleft" >有效日期</td>
       <td ><input  readonly type="text" name="valid_date" id="valid_date" class="calendar"/></td>
    </tr> 		
</table>
</form>
</body>
</html> 
 <script type="text/javascript">
      BUI.use('bui/calendar',function(Calendar){
        var datepicker = new Calendar.DatePicker({
          trigger:'.calendar',
          autoRender : true
        });
      });
</script> 

