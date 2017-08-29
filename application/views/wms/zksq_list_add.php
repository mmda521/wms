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
<input type="hidden" name="action" value="doadd"/>
<table class="table table-bordered table-hover m10">
 
     <tr>	    
        <td class="tableleft"><span>*</span>转出单进库单号</td>
         <td><input type="text" name="store_bill_no" id="store_bill_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">货号</td>
         <td><input type="text" name="cop_g_no" id="cop_g_no" class="abc input-default" placeholder="" value=""></td>
    </tr> 
	 <tr>
         <td class="tableleft">项号</td>
		 <td><input type="text" name="g_no" id="g_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">商品编码</td>
         <td><input type="text" name="code_t_s" id="code_t_s" class="abc input-default" placeholder="" value=""></td>
    </tr> 		
    <tr>
      <td class="tableleft"><span>*</span>移库开始时间</td>
			 <td><input type="text" name="yk_start_date" id="yk_start_date" class="calendar" placeholder="" value=""></td>
		      <td class="tableleft"><span>*</span>移库结束时间</td>
              <td><input type="text" name="yk_end_date" id="yk_end_date" class="calendar" placeholder="" value=""></td>
    </tr>
	 <tr>
     <td class="tableleft">转出库位名称</td>
     <td><input type="text" name="zc_tin_name" id="zc_tin_name" class="abc input-default" placeholder="" value=""></td>
	 <td class="tableleft"><span>*</span>转入库位名称</td>
	 <td><input type="text" name="zr_tin_name" id="zr_tin_name" class="abc input-default" placeholder="" value=""></td>
    </tr>
	<tr>
         <td class="tableleft">货物名称</td>
         <td><input type="text" name="g_name" id="g_name" class="abc input-default" placeholder="" value=""></td>
		 <td class="tableleft"><span>*</span>移库申报数量</td>
         <td><input type="text" name="qty" id="qty" class="abc input-default" placeholder="" value=""></td>
    </tr>
	<tr>
         <td class="tableleft"><span>*</span>移库申报单位</td>
         <td><input type="text" name="unit" id="unit" class="abc input-default" placeholder="" value=""></td>
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


 