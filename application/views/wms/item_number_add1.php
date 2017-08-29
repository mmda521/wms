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
<table class="table table-bordered table-hover m10">
     <tr>
			    <td class="tableleft"><span>*</span>项号</td>
               <td><input type="text" name="g_no" id="g_no" /></td>
			    <td class="tableleft"><span>*</span>商品编号</td>
              <td><input type="text" name="code_t_s" id="code_t_s" /></td>		    
	</tr>  
	 <tr>
        <td class="tableleft"><span>*</span>征免方式</td>
        <td><input type="text" name="duty_mode" id="duty_mode" /></td>
		<td class="tableleft"><span>*</span>商品名称</td>
        <td><input type="text" name="g_name" id="g_name" /></td>
    </tr>    
    <tr>
       <td class="tableleft" >产销国</td>
       <td><input type="text" name="country_code" id="country_code" /></td>
	     <td class="tableleft" >规格型号</td>
       <td><input type="text" name="g_model" id="g_model" /></td>
    </tr> 
    <tr>
       <td class="tableleft" >最终目的国</td>
       <td><input type="text" name="aim_country" id="aim_country" /></td>
	    <td class="tableleft" ><span>*</span>表头id</td>
	    <td><select id="record_id" name="record_id">
			      <option value="">请选择</option>
                    <?php
                    $query = $this->db->query('SELECT * FROM  kbook_record');
					
                    foreach($query->result_array() as $row){
                        if($row['record_id']){?>
                            <option><?php echo $row['record_id'];?></option>
                        <?php } }?>
              </select>				
		</td>		
    </tr> 	
</table>
</form>
</body>
</html> 

