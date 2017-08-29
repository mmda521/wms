<!DOCTYPE HTML>
<html>
 <head>
  <title>库位查询</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/webroot/CBS_Platform/Css/style.css" /> 
	<link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/bui-min.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/jquery-1.8.1.min.js"></script> 	
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/bui-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/Js/validate/validator.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/Js/admin.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/bui-min.js"></script>
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
<form action="<?php echo site_url("kuweiguanli/ajax_data_export");?>" method="post">
     <table class="table table-bordered table-hover" >
         <tr>
		 <td class="tableleft">库位编号</td>
         <td><input type="text" name="location_no" id="location_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">仓库名称</td>
         <td><input type="text" name="wh_name" id="wh_name" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">库位名称</td>
         <td><input type="text" name="location_name" id="location_name" class="abc input-default" placeholder="" value=""></td>
         <!--<td class="tableleft">企业编码</td>
         <td><input type="text" name="ep_no" id="ep_no" class="abc input-default" placeholder="" value=""></td>
             <td class="tableleft">企业名称</td>
			 
			 <td><input type="text" name="ep_name" id="ep_name" class="abc input-default" placeholder="" value=""></td>-->
             
             </tr>
        <tr> 
		 <tr>
             <td class="tableleft">储库性质</td>
             <td>
             <select id="st_nature" name="st_nature">
                     <option value="">请选择</option>
                     <option value="0">保税</option>
                     <option value="1">其它</option>
            </select>
         	</td>
            <td class="tableleft">使用年限</td>
                 <td><input type="text" name="use_year" id="use_year" class="abc input-default" placeholder="" value=""></td>
                 <td class="tableleft">最大容量</td>
				 <td><input type="text" name="max_capacity" id="max_capacity" class="abc input-default" placeholder="" value=""></td>
             </tr>
			 <!--<tr>
		        <td class="tableleft">启用时间</td>
                 <td><input type="text" name="start_time" id="start_name" class="abc input-default" placeholder="" value=""></td>
                 
             
             </tr>
			 <tr>
			     <td class="tableleft">状态</td>
                 <td><input type="text" name="status" id="status" class="abc input-default" placeholder="" value=""></td></tr>-->
			 
         <tr>
			<td colspan="6" style="text-align: center;"><button type="button" class="btn btn-primary" onClick="common_request(1)">查询</button>&nbsp;&nbsp;
			<button type="reset" class="btn btn-primary" id="res">重置</button></td>
		 </tr>
	<!--<a class="btn btn-success" name="success" href="javascript:void(0);" onClick="add_()" title="新增库位信息">新增</a><a class="btn btn-success" name="success" href="javascript:void(0);" onClick="del()" title="删除库位信息">删除</a><button type="submit" class="btn btn-success" >导出</button>-->
     </table>
</form>
<table class="table table-bordered table-hover definewidth">
    <thead>
    <tr>
	    <!--<th><input type="checkbox" id="selAll" onClick="selectAll()"/></th>-->
		<th>查阅</th>
		<th>库位编号</th> 
        <th>企业编码</th>
        <th>企业名称</th>
        <th>库位名称</th>
		<th>仓库名称</th>
		<th>储库性质</th>
		<th>启用时间</th>
        <th>使用年限</th>
		<th>最大容量</th>
        <th>状态</th>
    </tr>
    </thead>
  <tbody id="result_">
  </tbody>  
  </table>
  <div id="page_string" style="float:right;">
  
  </div> 

</body>
</html>  
<script>
$(document).ready(function(){
	
		//重置
		$("#res").click(function(){
			
			$("form :input").val('');

			});
			//end
		});	
$(function () {
  common_request(1);
});

function common_request(page){
  var url="<?php echo site_url("Search/location_ajax_data");?>?inajax=1";
  var data_ = {
    'page':page,
    'time':<?php echo time();?>,
    'action':'ajax_data',
	//'guid':$("#guid").val(),
	'location_no':$("#location_no").val(),
    'ep_no':$("#ep_no").val(),
	'max_capacity':$("#max_capacity").val(),
    'ep_name':$("#ep_name").val(),
	'location_name':$("#location_name").val(),
    'st_nature':$("#st_nature").val(),
	'use_year':$("#use_year").val(),
	'wh_name':$("#wh_name").val(),
	'start_time':$("#start_time").val()
  } ;
  $.ajax({
       type: "POST",
       url: url,
       data: data_,
       cache:false,
       dataType:"json",
     //  async:false,
       success: function(msg){
      var shtml = '' ;
      var list = msg.resultinfo.list;
      if(msg.resultcode<0){
        BUI.Message.Alert("没有权限执行此操作",'error');
        return false ;
      }else if(msg.resultcode == 0 ){
        BUI.Message.Alert(msg.resultinfo.errmsg,'error');
        return false ;        
      }else{        
        for(var i in list){
          shtml+='<tr>';
		 <!-- shtml+='<td width="20px"><input type="checkbox" name="checkAll[]" onclick="setSelectAll();" value="'+list[i]['location_id']+'"/></td>';-->   
          shtml+='<td><a href="javascript:void(0)" name="success" onclick=\'edit(\"'+list[i].location_id+'\")\' class="icon-edit" title="查阅'+list[i]['location_id']+'"></a></td>';		  		  
          shtml+='<td>'+list[i]['location_no']+'</td>';
          shtml+='<td>'+list[i]['ep_no']+'</td>';
          shtml+='<td>'+list[i]['ep_name']+'</td>';
          shtml+='<td>'+list[i]['wh_name']+'</td>';
          shtml+='<td>'+list[i]['location_name']+'</td>';
		  shtml+='<td>'+list[i]['st_nature']+'</td>';
          shtml+='<td>'+list[i]['start_time']+'</td>';
		  shtml+='<td>'+list[i]['use_year']+'</td>';
		  shtml+='<td>'+list[i]['max_capacity']+'</td>';
		  shtml+='<td>'+list[i]['status']+'</td>';
		  shtml+='</tr>';                          
        }
        $("#result_").html(shtml);
        
        $("#page_string").html(msg.resultinfo.obj);
      }
     },
       beforeSend:function(){
        $("#result_").html('<font color="red"><img src="<?php echo base_url();?>webroot/CBS_Platform/Images/progressbar_microsoft.gif"></font>');
       },
       error:function(){
         BUI.Message.Alert("服务器繁忙",'error');
       }
      
    });   
}
	
function edit(location_id){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"库位信息",
      width:600,
      height:350,
      loader : {
        url : '<?php echo site_url("Search/location_info");?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
      //success:function(){
        //submit_edit(location_id); //编辑级别分类处理
        //this.close();
      //}
    });
    dialog.show();
    dialog.get('loader').load({"location_id":location_id});
} 
function ajax_data(page){
  common_request(page); 
}
</script>