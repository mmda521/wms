<?php 
if (! defined('BASEPATH')) {
	exit('Access Denied');
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>编辑资格</title>
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
			    <td class="tableleft">预录入号</td>
               <td><input type="text" name="pre_enter_no" id="pre_enter_no" value="<?php echo $book_info[0]['pre_enter_no'];?>" readonly/></td>
			    <td class="tableleft">账册编号</td>
              <td><input type="text" name="eci_ems_no" id="eci_ems_no" value="<?php echo $book_info[0]['eci_ems_no']; ?>" readonly/></td>		    
	</tr>  
	 <tr>      
		<td class="tableleft">K2000账册编号</td>
        <td><input type="text" name="ems_no" id="ems_no" value="<?php echo $book_info[0]['ems_no']; ?>" readonly/></td>
		<td class="tableleft">经营单位代码</td>
        <td><input readonly type="text" name="trade_code" id="trade_code" value="<?php echo $book_info[0]['trade_code']; ?>" readonly/></td>
    </tr>    
    <tr>
       <td class="tableleft" >经营单位名称</td>
       <td><input readonly type="text" name="trade_name" id="trade_name" value="<?php echo $book_info[0]['trade_name']; ?>" readonly/></td>
	    <td class="tableleft">账册类型</td>           
			 <td><input type="text" name="book_type" id="book_type" value="<?php echo $book_info[0]['book_type']=="Y"?"K账册":"J账册";?>" readonly /></td>
    </tr> 
    <tr>
       <td class="tableleft" >收发货单位代码</td>
       <td><input type="text" name="owner_code" id="owner_code" value="<?php echo $book_info[0]['owner_code']; ?>" readonly/></td>
	     <td class="tableleft" >收发货单位名称</td>
       <td><input type="text" name="owner_name" id="owner_name" value="<?php echo $book_info[0]['owner_name']; ?>" readonly /></td>
    </tr> 
    <tr>     
	   <td class="tableleft">主管海关</td>
       <td ><input  type="text" name="master_customs" id="master_customs" value="<?php  echo $book_info[0]['master_customs'];?>" readonly/></td>
	   <td class="tableleft" >申请单位代码</td>
       <td ><input  type="text" name="declare_code" id="declare_code" value="<?php echo $book_info[0]['declare_code'];?>" readonly/></td>
    </tr> 
    <tr>
       <td class="tableleft" >申请单位名称</td>
       <td><input type="text" name="declare_name" id="declare_name" value="<?php echo $book_info[0]['declare_name']; ?>" readonly/></td>
	     <td class="tableleft" >地区代码</td>
       <td><input type="text" name="area_code" id="area_code" value="<?php echo $book_info[0]['area_code']; ?>" readonly/></td>
    </tr> 
   <tr>
       <td class="tableleft" >海关区域代码</td>
       <td><input type="text" name="custom_area_code" id="custom_area_code" value="<?php echo $book_info[0]['custom_area_code']; ?>" readonly/></td>
	     <td class="tableleft" >H2000账册类型</td>
       <td><input type="text" name="ems_type" id="ems_type" value="<?php echo $book_info[0]['ems_type']; ?>" readonly/></td>
    </tr> 
   <tr>
       <td class="tableleft" >保税方式</td>
       <td><input type="text" name="pay_mode" id="pay_mode" value="<?php echo $book_info[0]['pay_mode']; ?>" readonly/></td>
	     <td class="tableleft" >主管外经贸</td>
       <td><input type="text" name="master_ftc" id="master_ftc" value="<?php echo $book_info[0]['master_ftc']; ?>" readonly/></td>
    </tr> 
 <tr>
	    <td class="tableleft">账册级别</td>           
			 <td><input type="text" name="eci_ems_level" id="eci_ems_level" value="<?php echo $book_info[0]['eci_ems_level']=="LHJ"?"料号级":"项号级";?>" readonly/></td>
		<td class="tableleft" >当前环节</td>
       <td><input type="text" name="step_id" id="step_id" value="<?php echo $book_info[0]['step_id']; ?>"/ readonly></td>
    </tr> 
   <tr>
		<td class="tableleft" >创建人</td>
       <td><input type="text" name="create_person" id="create_person" value="<?php echo $book_info[0]['create_person']; ?>" readonly/></td>
       <td class="tableleft" >处理标志</td>
       <td><input type="text" id="modify_mark" name="modify_mark" value="<?php echo $book_info[0]["modify_mark"]==0?"不变":"变更";?>" readonly/></td>
	</tr>	
        <input type="hidden" name="record_id" id="record_id" value="<?php echo $book_info[0]['record_id']; ?>" readonly/>
   
</table>
</body>
</html>