<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>资格详情</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<table class="table table-bordered table-hover m10">
			<tr>
			     <td class="tableleft">资格编号</td>
                 <td><input type="text" name="col_code" id="col_code" value="<?php echo $info[0]['col_code'];?>" readonly/></td>
			     <td class="tableleft">企业编号</td>
                 <td><input type="text" name="trades_code" id="trades_code" value="<?php echo $info[0]['trades_code'];?>" readonly/></td>				    
		   </tr>
			<tr>
			 <td class="tableleft">业务类型</td>
			 <td><input type="text" id="biz_type" name="biz_type" value="<?php echo $info[0]['biz_type']==0?"分送集报":"其它"; ?>" readonly/></td>
			 <td class="tableleft">企业名称</td>
             <td><input type="text" name="trades_name" id="trades_name" value="<?php echo $info[0]['trades_name'];?>" readonly/></td>
		   </tr>
		   <tr>
		        <td class="tableleft">资格标志</td>
                <td><input type="text" id="control_flag" name="control_flag" value="<?php echo $info[0]['control_flag']?"允许":"不允许";?>" readonly/></td>				 				 
			    <td class="tableleft">申请人</td>
                 <td><input type="text" name="app_person" id="app_person" value="<?php if(isset($info[0]['app_person'])) echo $info[0]['app_person']; ?>" readonly/></td>		
		   </tr>
		   <tr>
	              <td class="tableleft">开始时间</td>
                  <td><input readonly type="text" name="begin_date" id="begin_date" value="<?php echo $info[0]['begin_date'];?>" readonly/></td>
                   <td class="tableleft">结束时间</td>
                  <td><input readonly type="text" name="end_date" id="end_date" value="<?php echo $info[0]['end_date']; ?>"/></td>		
			</tr>
	 		<tr>
         <td class="tableleft">申请时间</td>
         <td colspan="3"><input readonly type="text" name="app_date" id="app_date" value="<?php echo $info[0]['app_date']; ?>"/></td>
    </tr>    
    <input type="hidden" name="control_id" id="control_id" value="<?php echo $info[0]['control_id']; ?>"/>
</table>
</body>
</html>