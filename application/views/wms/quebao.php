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
<form action="<?php echo site_url("quebao/ajax_data_export");?>" method="post">
     <table class="table table-bordered table-hover" >
         <tr>
		 <td class="tableleft">进库单号</td>
         <td><input type="text" name="store_bill_no" id="store_bill_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">账册编号</td>
         <td><input type="text" name="ems_no" id="ems_no" class="abc input-default" placeholder="" value=""></td>
             <td class="tableleft">报关单号</td>
			 
			 <td><input type="text" name="entry_id" id="entry_id" class="abc input-default" placeholder="" value=""></td>
             
             </tr>
        <tr> 
		 <tr><td class="tableleft">入库方式</td>
         <td> <select id="store_type" name="store_type">
                     <option value="">全部</option>
                     <option value="1">保税仓货物逐笔报关</option>
					 <option value="2">出口监管仓库物逐笔报关</option>
                     <option value="3">出口监管仓分送集报</option>
                 </select></td>
         <td class="tableleft">当前状态</td>
         <td> <select id="cur_status" name="cur_status">
                     <option value="">全部</option>
                     <option value="4">确报预录入</option>
					 <option value="5">确报待审批</option>
					 <option value="6">审批通过</option>
					 <option value="7">审批退回</option>
					
                 </select></td>
             <td class="tableleft">申报时间（开始）</td>
			 <td><input type="text" name="declare_date1" id="declare_date1" class="calendar" placeholder="" value=""></td>
         
             </tr>
			 <tr>
		        <td class="tableleft">申报时间（结束）</td>
                 <td><input type="text" name="declare_date2" id="declare_date2" class="calendar" placeholder="" value=""></td>
                 
    
			 
         <tr>
			<td colspan="6" style="text-align: center;"><button type="button" class="btn btn-primary" onClick="common_request(1)">查询</button>&nbsp;&nbsp;
			<button type="reset" class="btn btn-primary" id="res">重置</button><a class="btn btn-success" name="success" href="javascript:void(0);" onClick="report()" title="申报">申报</a></td>
		 </tr>
     </table>
</form>
<table class="table table-bordered table-hover definewidth">
    <thead>
    <tr>
	    <th><input type="checkbox" id="selAll" onClick="selectAll()"/></th>
		 <th>编辑</th>
		<th>当前状态</th> 
        <th>进库单号</th>
        <th>账册编号</th>
        <th>报关单号</th>
		<th>入库方式</th>
		<th>经营单位名称</th>
		<th>预报开始时间</th>
		<th>预报结束时间</th>
        
       
    </tr>
    </thead>
  <tbody id="result_">
  </tbody>  
  </table>
  <div id="page_string" style="float:right;">
  
  </div> 

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
  var url="<?php echo site_url("quebao/ajax_data");?>?inajax=1";
  var data_ = {
    'page':page,
    'time':<?php echo time();?>,
    'action':'ajax_data',
	//'guid':$("#guid").val(),
	'store_bill_no':$("#store_bill_no").val(),
    'ems_no':$("#ems_no").val(),
	
    'entry_id':$("#entry_id").val(),
	'cur_status':$("#cur_status").val(),
   
	'store_type':$("#store_type").val(),
    'trade_name':$("#trade_name").val(),
	'declare_date1':$("#declare_date1").val(),
	'declare_date2':$("#declare_date2").val()
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
		  shtml+='<td width="20px"><input type="checkbox" name="checkAll[]" onclick="setSelectAll();" value="'+list[i]['putpre_head_id']+'"/></td>';   
          shtml+='<td><a href="javascript:void(0)" name="success" onclick=\'edit(\"'+list[i].putpre_head_id+'\")\' class="icon-edit" title="编辑'+list[i]['putpre_head_id']+'"></a></td>';		  		  
          shtml+='<td>'+list[i]['cur_status']+'</td>';
          shtml+='<td>'+list[i]['store_bill_no']+'</td>';
          shtml+='<td>'+list[i]['ems_no']+'</td>';
          shtml+='<td>'+list[i]['entry_id']+'</td>';
          shtml+='<td>'+list[i]['store_type']+'</td>';
		  shtml+='<td>'+list[i]['trade_name']+'</td>';
          shtml+='<td>'+list[i]['pre_start_date']+'</td>';
		  shtml+='<td>'+list[i]['pre_end_date']+'</td>';
		  
		  
		  
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

function del(){
        var selectCount = 0;
        var data = [] ;
        var o = select_data() ;
        selectCount = o.selectCount ;
        data = o.data ;
        if(selectCount == 0 ){
            BUI.Message.Alert('请选择数据进行删除','error');
            return false ;
        }
        BUI.Message.Confirm('删除后不可恢复,是否确定删除操作',function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('quebao/delete');?>" ,
                data: {"putpre_head_id":data},
                cache:false,
                dataType:"json",
                //  async:false,
                success: function(msg){
                    if(msg.resultcode<0){
                        BUI.Message.Alert('没有权限执行此操作','error');
                        return false ;
                    }else if(msg.resultcode == 0 ){
                        BUI.Message.Alert(msg.resultinfo.errmsg ,'error');                        
                        return false ;
                    }else{
                        BUI.Message.Alert('删除成功！');
						common_request(1);
                    }
                },
                beforeSend:function(){
                    $("#result_").html('<font color="red"><img src="<?php echo base_url();?>webroot/CBS_Platform/Images/progressbar_microsoft.gif"></font>');
                },
                error:function(){
                    BUI.Message.Alert('服务器繁忙请稍后','error');
                }

            });
        },'question');

    }
	function report(){
		var selectCount = 0;
        var data = [] ;
        var o = select_data() ;
        selectCount = o.selectCount ;
        data = o.data ;
        if(selectCount == 0 ){
            BUI.Message.Alert('请选择数据进行申报','error');
            return false ;
        }
		BUI.Message.Confirm('确定申报操作?',function(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('quebao/quebao_report_send');?>" ,
                data: {"putpre_head_id":data},
                cache:false,
                dataType:"json",
                //  async:false,
                success: function(msg){
                    if(msg.resultcode<0){
                        BUI.Message.Alert('没有权限执行此操作','error');
                        return false ;
                    }else if(msg.resultcode == 0 ){
                        BUI.Message.Alert(msg.resultinfo.errmsg ,'error');                        
                        return false ;
                    }else{
                        BUI.Message.Alert('数据发送成功','error');
						common_request(1);
                    }
                },
                beforeSend:function(){
                    $("#result_").html('<font color="red"><img src="<?php echo base_url();?>webroot/CBS_Platform/Images/progressbar_microsoft.gif"></font>');
                },
                error:function(){
                    BUI.Message.Alert('服务器繁忙请稍后','error');
                }

            });
        },'question');	
	}

    function select_data(){
        var obj=document.getElementsByName("checkAll[]");
        var count = obj.length;
        var selectCount = 0;
        var data = [] ;
        for(var i = 0; i < count; i++)
        {
            if(obj[i].checked == true)
            {
                selectCount++;
                data.push(obj[i].value);
            }
        }
        var o = {
            'selectCount':selectCount ,
            'data':data
        } ;
        return o ;
    }
	
	  //添加子类
  //_typeid 分类ID
  //_id 父级ID
 function edit(putpre_head_id){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"进库确报信息",
      width:600,
      height:350,
      loader : {
        url : '<?php echo site_url("quebao/edit");?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
	  buttons:[],
	 
     
    });
    dialog.show();
    dialog.get('loader').load({"putpre_head_id":putpre_head_id});
  }
   
  
  function ajax_data(page){
  common_request(page); 
}
</script>