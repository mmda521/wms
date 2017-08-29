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
			    <td class="tableleft">预录入号</td>
               <td><input type="text" name="pre_enter_no" id="pre_enter_no" value="<?php if(isset($info[0]['pre_enter_no'])) echo $info[0]['pre_enter_no']; ?>"/></td>
			    <td class="tableleft">账册编号</td>
              <td><input type="text" name="eci_ems_no" id="eci_ems_no" value="<?php if(isset($info[0]['eci_ems_no'])) echo $info[0]['eci_ems_no']; ?>"/></td>		    
	</tr>  
	 <tr>      
		<td class="tableleft">K2000账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" value="<?php if(isset($info[0]['ems_no'])) echo $info[0]['ems_no']; ?>"/></td>
		<td class="tableleft">经营单位代码</td>
        <td><input type="text" name="tarde_code" id="tarde_code" value="<?php if(isset($info[0]['tarde_code'])) echo $info[0]['tarde_code']; ?>"/></td>
    </tr>    
    <tr>
       <td class="tableleft" >经营单位名称</td>
       <td><input type="text" name="trade_name" id="trade_name" value="<?php if(isset($info[0]['trade_name'])) echo $info[0]['trade_name']; ?>"/></td>
	    <td class="tableleft">账册类型</td>           
			 <td>
					 <select id="book_type" name="book_type">
					<option value="Y" <?php $selected='selected=selected'; if(isset($info[0]['book_type'])&&($info[0]['book_type']=='Y')) echo $selected;?>>K账册</option>
					<option value="N" <?php $selected='selected=selected'; if(isset($info[0]['book_type'])&&($info[0]['book_type']=='N')) echo $selected;?>>J账册</option>
					</select> 
			 </td>
    </tr> 
    <tr>
       <td class="tableleft" ><span>*</span>收发货单位代码</td>
       <td><input type="text" name="owner_code" id="owner_code" value="<?php if(isset($info[0]['owner_code'])) echo $info[0]['owner_code']; ?>"/></td>
	     <td class="tableleft" ><span>*</span>收发货单位名称</td>
       <td><input type="text" name="owner_name" id="owner_name" value="<?php if(isset($info[0]['owner_name'])) echo $info[0]['owner_name']; ?>"/></td>
    </tr> 
    <tr>     
	   <td class="tableleft"><span>*</span>主管海关</td>
       <td ><input  type="text" name="master_customs" id="master_customs" value="<?php if(isset($info[0]['master_customs'])) echo $info[0]['master_customs']; ?>"/></td>
	   <td class="tableleft" >申请单位代码</td>
       <td ><input  type="text" name="declare_code" id="declare_code" value="<?php if(isset($info[0]['declare_code'])) echo $info[0]['declare_code']; ?>"/></td>
    </tr> 
    <tr>
       <td class="tableleft" >申请单位名称</td>
       <td><input type="text" name="declare_name" id="declare_name" value="<?php if(isset($info[0]['declare_name'])) echo $info[0]['declare_name']; ?>"/></td>
	     <td class="tableleft" >地区代码</td>
       <td><input type="text" name="area_code" id="area_code" value="<?php if(isset($info[0]['area_code'])) echo $info[0]['area_code']; ?>"/></td>
    </tr> 	
        <input type="hidden" name="record_id" id="record_id" value="<?php if(isset($info[0]['record_id'])) echo $info[0]['record_id']; ?>"/>
   
</table>
</form>
</body>
</html>  


 