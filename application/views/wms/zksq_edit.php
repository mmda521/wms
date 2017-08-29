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

<form action="#" method="post" class="definewidth m2"  name="edit_form" id="edit_form" style="height:200px ; overflow:auto">
<table class="table table-bordered table-hover m10">
     
	  <tr>	    
        <td><input type="hidden" name="zksq_head_id" id="zksq_head_id"   value="<?php if(isset($info[0]['zksq_head_id'])) echo $info[0]['zksq_head_id']; ?>" /></td> 
    </tr> 
     <tr>	    
        <td class="tableleft">进库单号</td>
        <td><input type="text" name="store_bill_no" id="store_bill_no"  value="<?php if(isset($info[0]['store_bill_no'])) echo $info[0]['store_bill_no']; ?>"/></td>
    
        <td class="tableleft"><span>*</span>账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" value="<?php if(isset($info[0]['ems_no'])) echo $info[0]['ems_no']; ?>" /></td>
    </tr> 
	 <tr>
        <td class="tableleft">转库编号</td>
        <td><input type="text" name="zk_no" id="zk_no" value="<?php if(isset($info[0]['zk_no'])) echo $info[0]['zk_no']; ?>" /></td>
    
        <td class="tableleft">经营单位名称</td>
        <td><input type="text" name="trade_name" id="trade_name" value="<?php if(isset($info[0]['trade_name'])) echo $info[0]['trade_name']; ?>"/></td>
    </tr> 		
    <tr>
        <td class="tableleft" >转库开始时间</td>
        <td><input type="text" name="zk_start_date" id="zk_start_date" class="calendar" value="<?php if(isset($info[0]['zk_start_date'])) echo $info[0]['zk_start_date']; ?>"/></td>
    
        <td class="tableleft" >转库结束时间</td>
        <td><input type="text" name="zk_end_date" id="zk_end_date" class="calendar" value="<?php if(isset($info[0]['zk_end_date'])) echo $info[0]['zk_end_date']; ?>"/></td>
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


 