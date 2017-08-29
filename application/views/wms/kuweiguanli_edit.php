<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>编辑库位</title>
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

<form action="#" method="post" class="definewidth m2"  name="edit_form" id="edit_form" style="height:330px ; overflow:auto">
<table class="table table-bordered table-hover m10">
    
	 <tr>
        
        <td><input type="hidden" name="location_id" id="location_id"  value="<?php if(isset($info[0]['location_id'])) echo $info[0]['location_id']; ?>"  /></td>
    </tr>
    <tr>
        <td class="tableleft"><span>*</span>库位编号</td>
        <td><input type="text" name="location_no" id="location_no" value="<?php if(isset($info[0]['location_no'])) echo $info[0]['location_no']; ?>" /></td>
        <td class="tableleft"><span>*</span>企业编码</td>
        <td><input type="text" name="ep_no" id="ep_no" value="<?php if(isset($info[0]['ep_no'])) echo $info[0]['ep_no']; ?>" /></td>
    </tr> 
	  <tr>
        <td class="tableleft"><span>*</span>企业名称</td>
        <td><input type="text" name="ep_name" id="ep_name" value="<?php if(isset($info[0]['ep_name'])) echo $info[0]['ep_name']; ?>" /></td>
        <td class="tableleft"><span>*</span>仓库名称</td>
        <td><input type="text" name="wh_name" id="wh_name" value="<?php if(isset($info[0]['wh_name'])) echo $info[0]['wh_name']; ?>" /></td>
    </tr> 
	 <tr>
        <td class="tableleft"><span>*</span>库位名称</td>
        <td><input type="text" name="location_name" id="location_name" value="<?php if(isset($info[0]['location_name'])) echo $info[0]['location_name']; ?>" /></td>
        <td class="tableleft">储库性质</td>
        <td>
             <select id="st_nature" name="st_nature">
                     <option value="0" <?php $selected='selected=selected'; if(isset($info[0]['st_nature'])&&($info[0]['st_nature']=='0')) echo $selected;?>>保税</option>
                     <option value="0" <?php $selected='selected=selected'; if(isset($info[0]['st_nature'])&&($info[0]['st_nature']=='1')) echo $selected;?>>其它</option>
            </select>
         	</td>
    </tr> 		
    <tr>
        <td class="tableleft">启用时间</td>
        <td><input type="text" name="start_time" id="start_time" class="calendar"  value="<?php if(isset($info[0]['start_time'])) echo $info[0]['start_time']; ?>" /></td>
        <td class="tableleft">使用年限</td>
        <td><input type="text" name="use_year" id="use_year"  value="<?php if(isset($info[0]['use_year'])) echo $info[0]['use_year']; ?>" /></td>
    </tr>
	<tr>
        <td class="tableleft">最大容量</td>
        <td><input type="text" name="max_capacity" id="max_capacity"  value="<?php if(isset($info[0]['max_capacity'])) echo $info[0]['max_capacity']; ?>" /></td>
        <td class="tableleft">状态</td>
        <td><select name="status" id="status" >
        	<option value="0" <?php $selected='selected=selected'; if(isset($info[0]['status'])&&($info[0]['st_nature']=='0')) echo $selected;?>>闲置</option>
            <option value="1" <?php $selected='selected=selected'; if(isset($info[0]['status'])&&($info[0]['st_nature']=='1')) echo $selected;?>>占用</option>
        </select>
        </td>
        <!--<td class="tableleft"><span>*</span>启用状态</td>
        <td>
            <input type="radio" name="status" value="Y" checked/> 启用
            <input type="radio" name="status" value="N"/> 停用
        </td>-->
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


 