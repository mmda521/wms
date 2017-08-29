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
	     <td class="tableleft"><span>*</span>进库单号</td>
         <td><input type="text" name="store_bill_no" id="store_bill_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft"><span>*</span>申报数量</td>
         <td><input type="text" name="qty" id="qty" class="abc input-default" placeholder="" value=""></td>  
     </tr>
	 
	 <tr>
		 <td class="tableleft"><span>*</span>货号</td>
         <td><input type="text" name="cop_g_no" id="cop_g_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">总价</td>
         <td><input type="text" name="total" id="total" class="abc input-default" placeholder="" value=""></td>
     </tr>
        
	 
		
		
	 <tr>
	     <td class="tableleft">创建人编号</td>
         <td><input type="text" name="create_id" id="create_id" class="abc input-default" placeholder="" value=""></td>
		  
     </tr>
		
		  
    
</table>
</form>
</body>
</html>  

