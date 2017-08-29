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
        <td class="tableleft">延期单号</td>
        <td><input type="text" name="store_bill_no" id="store_bill_no" /></td>
    
        <td class="tableleft"><span>*</span>进库单号</td>
        <td><input type="text" name="store_in_no" id="store_in_no" /></td>
    </tr> 
	 <tr>
        <td class="tableleft">库位名称</td> 
	    <td><input type="text" name="tin_name" id="tin_name" /></td>
			
    
        <td class="tableleft"><span>*</span>货号</td>
        <td><input type="text" name="cop_g_no" id="cop_g_no" /></td>
    </tr> 		
    <tr>
        <td class="tableleft" >项号</td>
        <td><input type="text" name="g_no" id="g_no"/></td>
    
        <td class="tableleft" >商品编码</td>
        <td><input type="text" name="code_t_s" id="code_t_s" /></td>
    </tr>
	
	<tr>
        <td class="tableleft" >货物名称</td>
        <td><input type="text" name="g_name" id="g_name" /></td>
    
        <td class="tableleft" >入库数量</td>
        <td><input type="text" name="qty" id="qty" /></td>
    </tr>
	<tr> 
	<td class="tableleft" >计量单位</td>
        <td><input type="text" name="unit" id="unit" /></td>
    
        <td class="tableleft" >单价</td>
        <td><input type="text" name="price" id="price" /></td>
	
	</tr>
	<tr>
        <td class="tableleft" >总价</td>
        <td><input type="text" name="total" id="total" /></td>
		 <td class="tableleft" >币制</td>
        <td><input type="text" name="curr" id="curr" /></td>
    </tr>
    <tr>
        <td class="tableleft" >延期日期</td>
        <td><input type="text" name="delay_date" class="calendar" id="delay_date" /></td>
		<td class="tableleft" >入库有效期</td>
        <td><input type="text" name="in_delay_date" class="calendar" id="in_delay_date" /></td>
		
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

