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

<form action="#" method="post" class="definewidth m2"  name="edit_form" id="edit_form" style="height:100px ; overflow:auto">
<table class="table table-bordered table-hover m10">
     
     	    
        <input type="text" name="ck_id" id="ck_id"  value="<?php if(isset($info[0]['ck_id'])) echo $info[0]['ck_id']; ?>"/>
	 
	   
<tr>
		 <td class="tableleft"><span>*</span>货号</td>
         <td><input type="text" name="cop_g_no" id="cop_g_no" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['cop_g_no'])) echo $info[0]['cop_g_no']; ?>"/></td>
         <td class="tableleft">项号</td>
          <td><input type="text" name="g_no" id="g_no" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['g_no'])) echo $info[0]['g_no']; ?>"/></td>   
             </tr>
        <tr>
		
		 <td class="tableleft">原产国/产销国</td>
         <td><input type="text" name="country" id="country" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['country'])) echo $info[0]['country']; ?>"/></td>
		 <td class="tableleft">库位号</td>
         <td><input type="text" name="tin_id" id="tin_id" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['tin_id'])) echo $info[0]['tin_id']; ?>"/></td>
          </tr>
	 
		 <tr><td class="tableleft">商品编码</td>
         <td><input type="text" name="code_t_s" id="code_t_s" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['code_t_s'])) echo $info[0]['code_t_s']; ?>"/></td>
		 <td class="tableleft"><span>*</span>商品名称</td>
         <td><input type="text" name="g_name" id="g_name" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['g_name'])) echo $info[0]['g_name']; ?>"/></td>
		
          </tr>
		  <tr><td class="tableleft"><span>*</span>币制</td>
         <td><input type="text" name="curr" id="curr" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['curr'])) echo $info[0]['curr']; ?>"/></td>
		 <td class="tableleft"><span>*</span>申报数量</td>
         <td><input type="text" name="qty" id="qty" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['qty'])) echo $info[0]['qty']; ?>"/></td>
          </tr>
		  <tr><td class="tableleft">货物规格</td>
         <td><input type="text" name="g_model" id="g_model" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['g_model'])) echo $info[0]['g_model']; ?>"/></td>
		  <td class="tableleft"><span>*</span>库位名称</td>
         <td><input type="text" name="tin_name" id="tin_name" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['tin_name'])) echo $info[0]['tin_name']; ?>"/></td>
		  
          </tr>
		  <tr><td class="tableleft">单价</td>
         <td><input type="text" name="price" id="price" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['price'])) echo $info[0]['price']; ?>"/></td>
		  <td class="tableleft"><span>*</span>总价</td>
         <td><input type="text" name="total" id="total" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['total'])) echo $info[0]['total']; ?>"/></td>
          </tr>
		  <tr><td class="tableleft">第一法定单位</td>
         <td><input type="text" name="unit_1" id="unit_1" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['unit_1'])) echo $info[0]['unit_1']; ?>"/></td>
		  <td class="tableleft">成品料件标志</td>
         <td><select id="eci_goods_flag" name="eci_goods_flag">
                     <option value="3" selected>料件</option>
                     <option value="1">成品</option>
                 </select></td>
		  
          </tr>
		  <tr><td class="tableleft">创建人编号</td>
         <td><input type="text" name="create_id" id="create_id" class="abc input-default" placeholder="" value="<?php if(isset($info[0]['create_id'])) echo $info[0]['create_id']; ?>"/></td>
		  
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


 