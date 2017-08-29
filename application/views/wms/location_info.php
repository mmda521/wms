<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>库位详情</title>
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
        
        <td><input type="hidden" name="location_id" id="location_id"  value="<?php if(isset($info[0]['location_id'])) echo $info[0]['location_id']; ?>"  /></td>
    </tr>
    <tr>
        <td class="tableleft">库位编号</td>
        <td><input type="text" name="location_no" id="location_no" value="<?php if(isset($info[0]['location_no'])) echo $info[0]['location_no']; ?>" readonly /></td>
        <td class="tableleft">企业编码</td>
        <td><input type="text" name="ep_no" id="ep_no" value="<?php if(isset($info[0]['ep_no'])) echo $info[0]['ep_no']; ?>" readonly/></td>
    </tr> 
	  <tr>
        <td class="tableleft">企业名称</td>
        <td><input type="text" name="ep_name" id="ep_name" value="<?php if(isset($info[0]['ep_name'])) echo $info[0]['ep_name']; ?>" readonly/></td>
        <td class="tableleft">仓库名称</td>
        <td><input type="text" name="wh_name" id="wh_name" value="<?php if(isset($info[0]['wh_name'])) echo $info[0]['wh_name']; ?>" readonly/></td>
    </tr> 
	 <tr>
        <td class="tableleft">库位名称</td>
        <td><input type="text" name="location_name" id="location_name" value="<?php if(isset($info[0]['location_name'])) echo $info[0]['location_name']; ?>" readonly/></td>
        <td class="tableleft">储库性质</td>
        <td>
        <input type="text" id="st_nature" name="st_nature" value="<?php echo $info[0]['st_nature']==0?"保税":"其它";?>" readonly />
        </td>
    </tr> 		
    <tr>
        <td class="tableleft">启用时间</td>
        <td><input type="text" name="start_time" id="start_time" value="<?php if(isset($info[0]['start_time'])) echo $info[0]['start_time'];?>" readonly/></td>
        <td class="tableleft">使用年限</td>
        <td><input type="text" name="use_year" id="use_year"  value="<?php if(isset($info[0]['use_year'])) echo $info[0]['use_year']; ?>" readonly/></td>
    </tr>
	<tr>
        <td class="tableleft">最大容量</td>
        <td><input type="text" name="max_capacity" id="max_capacity"  value="<?php if(isset($info[0]['max_capacity'])) echo $info[0]['max_capacity']; ?>" readonly/></td>
        <td class="tableleft">状态</td>
        <td><input type="text" name="status" id="status" value="<?php echo $info[0]['status']==0?"闲置":"占用"; ?>" readonly/>
        </td>
    </tr>    
</table>
</body>
</html>