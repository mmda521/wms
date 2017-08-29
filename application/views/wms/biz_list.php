<!DOCTYPE HTML>
<html>
 <head>
  <title>业务资格</title>
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
         <td class="tableleft">资格编号</td>
         <td><input type="text" name="col_code" id="col_code" class="abc input-default" placeholder="" value=""></td>
             <td class="tableleft">企业编号</td>
             <td><input type="text" name="trades_code" id="trades_code" class="abc input-default" placeholder="" value=""></td>
             <td class="tableleft">业务类型</td>
             <td>  <select id="biz_type" name="biz_type">
                     <option value="">请选择</option>
                     <option value="0">分送集报</option>
                     <option value="1">其它</option>
                 </select></td>
             </tr>
         <tr>
			<td colspan="6" style="text-align: center;"><button type="button" class="btn btn-primary" onclick="common_request(1)">查询</button>&nbsp;&nbsp;
			<button type="reset" class="btn btn-primary" id="res">重置</button></td>
		 </tr>
	<!--<a class="btn btn-success" name="success" href="javascript:void(0);" onclick="add_()" title="新增信息">新增</a><a class="btn btn-success" name="success" href="javascript:void(0);" onclick="del()" title="删除信息">删除</a><a class="btn btn-success" name="success" href="javascript:void(0);" onclick="report()" title="申报">申报</a><button type="submit" class="btn btn-success" >导出</button>-->
     </table>
</form>
<table class="table table-bordered table-hover definewidth">
    <thead>
    <tr>
	    <!--<th><input type="checkbox" id="selAll" onclick="selectAll()"/></th>-->
		 <th>查询</th>
        <th>当前状态</th>
        <th>资格编号</th>
        <th>企业名称</th>
        <th>业务类型</th>
        <th>资格标志</th>
        <th>开始时间</th>
       
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
  var url="<?php echo site_url("Search/biz_ajax_data");?>?inajax=1";
  var data_ = {
    'page':page,
    'time':<?php echo time();?>,
    'action':'ajax_data',
	'col_code':$("#col_code").val(),
	'trades_code':$("#trades_code").val(),
    'biz_type':$("#biz_type").val()
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
		  <!--shtml+='<td width="20px"><input type="checkbox" name="checkAll[]" onclick="setSelectAll();" value="'+list[i]['control_id']+'"/></td>';-->   
          shtml+='<td><a href="javascript:void(0)" name="success" onclick=\'edit(\"'+list[i].control_id+'\")\' class="icon-edit" title="查询'+list[i]['control_id']+'"></a></td>';		  		  
          shtml+='<td>'+list[i]['status']+'</td>';
          shtml+='<td>'+list[i]['col_code']+'</td>';
          shtml+='<td>'+list[i]['trades_name']+'</td>';
          shtml+='<td>'+list[i]['biz_type']+'</td>';
          shtml+='<td>'+list[i]['control_flag']+'</td>';
          shtml+='<td>'+list[i]['begin_date']+'</td>';
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
function edit(control_id){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"业务资格信息",
      width:600,
      height:350,
      loader : {
        url : '<?php echo site_url("Search/biz_info");?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
      success:function(){
        submit_edit(control_id); //编辑级别分类处理
        this.close();
      }
    });
    dialog.show();
    dialog.get('loader').load({"control_id":control_id});
  }
  
function ajax_data(page){
  common_request(page); 
}
</script>