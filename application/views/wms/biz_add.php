<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>新增资格</title>
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
			    <td class="tableleft"><span>*</span>资格编号</td>
               <td><input type="text" name="col_code" id="col_code" /></td>
			    <td class="tableleft"><span>*</span>企业编码</td>
              <td><input type="text" name="trades_code" value="<?php echo $bus_list[0]['enterprice_code'];?>" id="trades_code" readonly /></td>		    
	</tr>  
	 <tr>
        <td class="tableleft"><span>*</span>业务类型</td>
         <td> <select id="biz_type" name="biz_type">
                     <option value="">请选择</option>
                     <option value="0">分送集报</option>
                     <option value="1">其它</option>
                 </select></td>
		<td class="tableleft">企业名称</td>
        <td><input type="text" name="trades_name" id="trades_name" value="<?php echo $bus_list[0]['enterprice_name'];?>" readonly /></td>
    </tr>    
    <tr>
       <td class="tableleft" >资格标志</td>
       <td> <select id="control_flag" name="control_flag">
                     <option value="">请选择</option>
                     <option value="0">允许</option>
                     <option value="1">不允许</option>
                 </select></td>
	     <td class="tableleft" >申请人</td>
       <td><input type="text" name="app_person" id="app_person" /></td>
    </tr> 
    <tr>
       <td class="tableleft" >开始时间</td>
       <td><input  readonly type="text" name="begin_date" id="begin_date" class="calendar"/></td>
	   <td class="tableleft" >结束时间</td>
       <td><input  readonly type="text" name="end_date" id="end_date" class="calendar"/></td>
    </tr> 
    <tr>     
	   <td class="tableleft">申请时间</td>
       <td colspan="3"><input readonly type="text" name="app_date" id="app_date" class="calendar"/></td>
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

