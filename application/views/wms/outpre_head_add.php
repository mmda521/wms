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
<input type="hidden" name="action" value="doadd">
<table class="table table-bordered table-hover m10">

    <tr>	    
        <td class="tableleft"><span>*</span>出库单号</td>
        <td><input type="text" name="store_bill_no" id="store_bill_no" /></td>
    
        <td class="tableleft"><span>*</span>账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" /></td>
    </tr> 
	<tr>	    
        <td class="tableleft">对接海关区域代码</td>
        <td><input type="text" name="customs" id="customs"/></td>
    
        <td class="tableleft">创建人</td>
        <td><input type="text" name="create_person" id="create_person"/></td>
    </tr> 
	 <tr>
        <td class="tableleft"><span>*</span>出库方式</td>
        <td><select id="store_type" name="store_type">
                     <option value="">全部</option>
                     <option value="1">保税仓货物逐笔报关</option>
					 <option value="2">出口监管仓库物逐笔报关</option>
                     <option value="3">出口监管仓分送集报</option>
                 </select></td>
        <td class="tableleft" >供货商编号</td>
        <td><input type="text" name="provider_code" id="provider_code" /></td>
       
    </tr> 		
	
	<tr>
        <td class="tableleft" >提单号/转关单号</td>
        <td><input type="text" name="orders_no" id="orders_no" /></td>
    
        <td class="tableleft" >出库合同号</td>
        <td><input type="text" name="contr_no" id="contr_no" /></td>
    </tr>
	<tr> 
	<td class="tableleft" ><span>*</span>预报开始时间</td>
        <td><input type="text" name="pre_start_date" class="calendar" id="pre_start_date" /></td>
    
        <td class="tableleft" ><span>*</span>预报结束时间</td>
        <td><input type="text" name="pre_end_date" class="calendar" id="pre_end_date" /></td>
	
	</tr>
	<tr> 
	<td class="tableleft" ><span>*</span>出库开始时间</td>
        <td><input type="text" name="out_start_date" class="calendar" id="out_start_date" /></td>
    
        <td class="tableleft" ><span>*</span>出库结束时间</td>
        <td><input type="text" name="out_end_date" class="calendar" id="out_end_date" /></td>
	
	</tr>
	<tr>
        <td class="tableleft" >供货商名称</td>
        <td><input type="text" name="provider_name" id="provider_name" /></td>
		 <td class="tableleft" >报关单号</td>
        <td><input type="text" name="entry_id" id="entry_id" /></td>
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
