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
			      <td class="tableleft"><span>*</span>货号</td>
                  <td><input type="text" name="gop_g_no" id="gop_g_no" value="<?php if(isset($info['gop_g_no'])) echo $info['gop_g_no']; ?>"/></td>
			      <td class="tableleft"><span>*</span>项号</td>
				  <td><input readonly type="text" name="g_no" id="g_no" value="<?php if(isset($info['g_no'])) echo $info['g_no']; ?>"/></td>
                  <!--<td><select id="g_no" name="g_no">
					 <option value="">请选择</option>
                    <?php
                    $query = $this->db->query("SELECT * FROM  item_number where record_id=".$info['record_id']);
						 foreach($query->result_array() as $row){
                        if($info['g_no']==$row['g_no']){?>
                            <option selected="selected" value="<?php echo $row['g_no'];?>"><?php echo $row['g_no'];?></option>
                        <?php }else{?>						    
                            <option value="<?php echo $row['g_no'];?>"><?php echo $row['g_no'];?></option>
                        <?php } }?>
                  </select> 
				  </td>	-->			  
		   </tr>			
			<tr>
				 <td class="tableleft">商品规格</td>
			   <td><input type="text" name="g_model" id="g_model" value="<?php if(isset($info['g_model'])) echo $info['g_model']; ?>"/></td>
			<td class="tableleft" >处理标志</td>
        <td>  
			     <select id="modify_mark" name="modify_mark">
                     <option value="1" <?php $selected='selected=selected'; if(isset($info[0]['modify_mark'])&&($info[0]['modify_mark']=='1')) echo $selected;?>>变更</option>
                    <option value="0" <?php $selected='selected=selected'; if(isset($info[0]['modify_mark'])&&($info[0]['modify_mark']=='0')) echo $selected;?>>不变</option>				
                 </select>
	   </td>
			</tr> 	
       
        <input type="hidden" name="part_id" id="part_id" value="<?php if(isset($info['part_id'])) echo $info['part_id']; ?>"/>
   
</table>
</form>
</body>
</html>  


 