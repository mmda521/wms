<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>新增库位</title>
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
<input type="hidden" name="action" value="doadd"/>
<table class="table table-bordered table-hover m10">
	<tr>	    
        <td class="tableleft"><span>*</span>库位编号</td>
        <td><input type="text" name="location_no" id="location_no" /></td>
        <td class="tableleft"><span>*</span>企业编码</td>
        <td><input type="text" name="ep_no" id="ep_no" value="<?php echo $bus_info[0]['enterprice_code']; ?>" readonly/></td>
    </tr> 
	 <tr>
        <td class="tableleft"><span>*</span>企业名称</td>
        <td><input type="text" name="ep_name" id="ep_name" value="<?php echo $bus_info[0]['enterprice_name']; ?>" readonly/></td>
        <td class="tableleft">仓库名称</td>
        <td><input type="text" name="wh_name" id="wh_name" /></td>
    </tr> 		
    <tr>
        <td class="tableleft" >库位名称</td>
        <td><input type="text" name="location_name" id="location_name"/></td>
        <td class="tableleft" >储库性质</td>
        <td>
             <select id="st_nature" name="st_nature">
                     <option value="">请选择</option>
                     <option value="0">保税</option>
                     <option value="1">其它</option>
            </select>
         	</td>
    </tr>
	<tr>
        <td class="tableleft" >启用时间</td>
        <td><input type="text" name="start_time" class="calendar" id="start_time"/></td>
        <td class="tableleft" >使用年限</td>
        <td><input type="text" name="use_year" id="use_year" /></td>
    </tr>
	<tr> 
        <td class="tableleft" >最大容量</td>
        <td><input type="text" name="max_capacity" id="max_capacity" /></td>
		<!--<td class="tableleft">当前状态</td>
		<td><select id="status" name="status">
                     <option value="">请选择</option>
                     <option value="Y">启用</option>
                     <option value="N">停用</option>
                 </select></td>-->
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

