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
            <tr>
			    <td class="tableleft"><span>*</span>项号</td>
               <td><input readonly type="text" name="g_no" id="g_no" value="<?php if(isset($info[0]['g_no'])) echo $info[0]['g_no'];?>"/></td>
			    <td class="tableleft"><span>*</span>商品编号</td>
              <td><input type="text" name="code_t_s" id="code_t_s" value="<?php if(isset($info[0]['code_t_s'])) echo $info[0]['code_t_s'];?>"/></td>		    
			</tr> 
            <tr>
			    <td class="tableleft">序号</td>
               <td><input type="text" name="cop_no" id="cop_no" value="<?php if(isset($info[0]['cop_no'])) echo $info[0]['cop_no'];?>"/></td>
			    <td class="tableleft">成品料件标志</td>
              <td><input type="text" name="eci_goods_flag" id="eci_goods_flag" value="<?php if(isset($info[0]['eci_goods_flag'])) echo $info[0]['eci_goods_flag'];?>"/></td>		    
			</tr>  			
			 <tr>
				<td class="tableleft"><span>*</span>征免方式</td>
				<td><input type="text" name="duty_mode" id="duty_mode" value="<?php if(isset($info[0]['duty_mode'])) echo $info[0]['duty_mode'];?>"/></td>
				<td class="tableleft"><span>*</span>商品名称</td>
				<td><input type="text" name="g_name" id="g_name" value="<?php if(isset($info[0]['g_name'])) echo $info[0]['g_name'];?>"/></td>
			</tr>    
			<tr>
			   <td class="tableleft" >产销国</td>
			   <td><input type="text" name="country_code" id="country_code" value="<?php if(isset($info[0]['country_code'])) echo $info[0]['country_code'];?>"/></td>
				 <td class="tableleft" >规格型号</td>
			   <td><input type="text" name="g_model" id="g_model" value="<?php if(isset($info[0]['g_model'])) echo $info[0]['g_model'];?>"/></td>
			</tr> 
			<tr>
			  <td class="tableleft" >最终目的地</td>
			   <td><input type="text" name="aim_country" id="aim_country" value="<?php if(isset($info[0]['aim_country'])) echo $info[0]['aim_country'];?>"/></td>			
			   <td class="tableleft" >申报申报计量单位</td>
			   <td><input type="text" name="unit" id="unit" value="<?php if(isset($info[0]['unit'])) echo $info[0]['unit'];?>"/></td>
			 </tr> 	
            <tr>
			   <td class="tableleft" >法定申报计量单位</td>
			   <td><input type="text" name="unit_1" id="unit_1" value="<?php if(isset($info[0]['unit_1'])) echo $info[0]['unit_1'];?>"/></td>
			 <td class="tableleft" >处理标志</td>
        <td>  
			     <select id="modify_mark" name="modify_mark">
                     <option value="1" <?php $selected='selected=selected'; if(isset($info[0]['modify_mark'])&&($info[0]['modify_mark']=='1')) echo $selected;?>>变更</option>
                    <option value="0" <?php $selected='selected=selected'; if(isset($info[0]['modify_mark'])&&($info[0]['modify_mark']=='0')) echo $selected;?>>不变</option>				
                 </select>
	   </td>
			</tr> 	
        <input type="hidden" name="item_id" id="item_id" value="<?php if(isset($info[0]['item_id'])) echo $info[0]['item_id'];?>"/>
   
</table>
</form>
</body>
</html>  


 