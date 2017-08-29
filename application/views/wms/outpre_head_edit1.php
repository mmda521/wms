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

<form action="#" method="post" class="definewidth m2"  name="edit_form" id="edit_form" style="height:330px ; overflow:auto">
<table class="table table-bordered table-hover m10">
     
	  <tr>	    
        
        <td><input type="hidden" name="outpre_head_id" id="outpre_head_id"   value="<?php if(isset($info[0]['outpre_head_id'])) echo $info[0]['outpre_head_id']; ?>" /></td>
    
       
    </tr> 
     <tr>	    
        <td class="tableleft"><span>*</span>出库单号</td>
        <td><input type="text" name="store_bill_no" id="store_bill_no"  value="<?php if(isset($info[0]['store_bill_no'])) echo $info[0]['store_bill_no']; ?>"/></td>
    
        <td class="tableleft"><span>*</span>账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" value="<?php if(isset($info[0]['ems_no'])) echo $info[0]['ems_no']; ?>" /></td>
    </tr> 
	 <tr>
        <td class="tableleft"><span>*</span>出库方式</td>
        <td><input type="text" name="store_type" id="store_type" value="<?php if(isset($info[0]['store_type'])) echo $info[0]['store_type']; ?>"/></td>
    
        <td class="tableleft">经营单位代码</td>
        <td><input type="text" name="trade_code" id="trade_code" value="<?php if(isset($info[0]['trade_code'])) echo $info[0]['trade_code']; ?>"/></td>
    </tr> 		
    <tr>
        <td class="tableleft" >经营单位名称</td>
        <td><input type="text" name="trade_name" id="trade_name" value="<?php if(isset($info[0]['trade_name'])) echo $info[0]['trade_name']; ?>"/></td>
    
        <td class="tableleft" >供货商编号</td>
        <td><input type="text" name="provider_code" id="provider_code" value="<?php if(isset($info[0]['provider_code'])) echo $info[0]['provider_code']; ?>"/></td>
    </tr>
	
	<tr>
        <td class="tableleft" >提单号/转关单号</td>
        <td><input type="text" name="orders_no" id="orders_no" value="<?php if(isset($info[0]['orders_no'])) echo $info[0]['orders_no']; ?>"/></td>
    
        <td class="tableleft" >出库合同号</td>
        <td><input type="text" name="contr_no" id="contr_no" value="<?php if(isset($info[0]['contr_no'])) echo $info[0]['contr_no']; ?>"/></td>
    </tr>
	<tr> 
	<td class="tableleft" >预报开始时间</td>
        <td><input type="text" name="pre_start_date" id="pre_start_date" value="<?php if(isset($info[0]['pre_start_date'])) echo $info[0]['pre_start_date']; ?>"/></td>
    
        <td class="tableleft" >预报结束时间</td>
        <td><input type="text" name="pre_end_date" id="pre_end_date" value="<?php if(isset($info[0]['pre_end_date'])) echo $info[0]['pre_end_date']; ?>"/></td>
	
	</tr>
	<tr>
        <td class="tableleft" >供货商名称</td>
        <td><input type="text" name="provider_name" id="provider_name"  value="<?php if(isset($info[0]['provider_name'])) echo $info[0]['provider_name']; ?>"/></td>
		 <td class="tableleft" >报关单号</td>
        <td><input type="text" name="entry_id" id="entry_id" value="<?php if(isset($info[0]['entry_id'])) echo $info[0]['entry_id']; ?>"/></td>
    </tr>
    
      
</table>
</form>
</body>
</html>  


 