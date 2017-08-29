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
<form action="<?php echo site_url("biz/ajax_data_export");?>" method="post">
     <table class="table table-bordered table-hover" >
         <tr>
			 <td class="tableleft">预录入号</td>
			 <td><input type="text" name="pre_enter_no" id="pre_enter_no" /></td>
			 <td class="tableleft">账册编号</td>
             <td><input type="text" name="eci_ems_no" id="eci_ems_no" /></td>
             <td class="tableleft">账册类型</td>
             <td>  
			     <select id="book_type" name="book_type">
                     <option value="">全部</option>
                     <option value="Y">K账册</option>
                     <option value="N">J账册</option>
                 </select>
			</td>
         </tr>
		  <tr>
             <td class="tableleft">当前状态</td>
             <td colspan="5">  
			    <select id="cur_status" name="cur_status">
                     <option value="">全部</option>
                     <option value="0">预录入</option>
                     <option value="1">待审批</option>
					 <option value="2">审批通过</option>
                     <option value="3">变更审批通过</option>
					 <option value="4">变更退单</option>
                 </select>
			 </td>
         </tr>
         <tr>
			<td colspan="6" style="text-align: center;"><button type="button" class="btn btn-primary" onclick="common_request(1)">查询</button>&nbsp;&nbsp;
			<button type="reset" class="btn btn-primary" id="res">重置</button></td>
		 </tr>
	<!--<a class="btn btn-success" name="success" href="javascript:void(0);" onclick="add_()" title="新增信息">新增</a><a class="btn btn-success" name="success" href="javascript:void(0);" onclick="del()" title="删除信息">删除</a><button type="submit" class="btn btn-success" >导出</button><a class="btn btn-success" name="success" href="javascript:void(0);" onclick="report()" title="申报">申报</a>-->
     </table>
</form>
<table class="table table-bordered table-hover definewidth">
    <thead>
    <tr>
	    <!--<th><input type="checkbox" id="selAll" onclick="selectAll()"/></th>-->
		<th>查阅</th>
        <th>当前状态</th>
        <th>账册编号</th>
        <th>账册类型</th>
        <th>经营单位名称</th>
        <th>主管海关</th>
        <th>预录入号</th>
        <th>H2000帐册</th>
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
  var url="<?php echo site_url("Search/book_ajax_data");?>?inajax=1";
  var data_ = {
    'page':page,
    'time':<?php echo time();?>,
    'action':'ajax_data',
	'pre_enter_no':$("#pre_enter_no").val(),
	'eci_ems_no':$("#eci_ems_no").val(),
    'book_type':$("#book_type").val(),
	'cur_status':$("#cur_status").val(),
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
		  <!--shtml+='<td width="20px"><input type="checkbox" name="checkAll[]" onclick="setSelectAll();" value="'+list[i]['record_id']+'"/></td>';-->   
          shtml+='<td><a href="javascript:void(0)" name="success" onclick=\'edit(\"'+list[i].record_id+'\")\' class="icon-edit" title="查阅'+list[i]['record_id']+'"></a></td>';		  		  
          shtml+='<td>'+list[i]['cur_status']+'</td>';
          shtml+='<td>'+list[i]['eci_ems_no']+'</td>';
          shtml+='<td>'+list[i]['book_type']+'</td>';
          shtml+='<td>'+list[i]['trade_name']+'</td>';
          shtml+='<td>'+list[i]['master_customs']+'</td>';
          shtml+='<td>'+list[i]['pre_enter_no']+'</td>';
		  shtml+='<td>'+list[i]['ems_no']+'</td>';
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

 	function edit(record_id){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"账册详情",
      width:900,
      height:450,
      loader : {
        url : '<?php echo site_url("Search/book_info");?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
	  buttons:[],
    });
    dialog.show();
    dialog.get('loader').load({"record_id":record_id});
  }
function ajax_data(page){
  common_request(page); 
}
</script>