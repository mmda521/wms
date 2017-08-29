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
<form action="<?php echo site_url("yqsq/ajax_data_export");?>" method="post">
     <table class="table table-bordered table-hover" >
         <tr>
		 <td class="tableleft">延期单号</td>
         <td><input type="text" name="store_bill_no" id="store_bill_no" class="abc input-default" placeholder="" value=""></td>
         <td class="tableleft">进库单号</td>
         <td><input type="text" name="store_in_no" id="store_in_no" class="abc input-default" placeholder="" value=""></td>
             <td class="tableleft">库位名称</td>
			 <td><input type="text" name="tin_name" id="tin_name" class="abc input-default" placeholder="" value=""></td>
             </tr>
        <tr> 
		 <tr><td class="tableleft">当前状态</td>
         <td> <select id="step_id" name="step_id">
                     <option value="">全部</option>
                     <option value="1">预报</option>
					 <option value="2">确保</option>
                     <option value="3">预录入</option>
                 </select></td>
             <td class="tableleft">创建时间（开始）</td>
			 <td><input type="text" name="create_date1" id="create_date1" class="calendar" placeholder="" value=""></td>
         
             
		        <td class="tableleft">创建时间（结束）</td>
                 <td><input type="text" name="create_date2" id="create_date2" class="calendar" placeholder="" value=""></td>
			 
         <tr>
			<td colspan="6" style="text-align: center;"><button type="button" class="btn btn-primary" onClick="common_request(1)">查询</button>&nbsp;&nbsp;
			<button type="reset" class="btn btn-primary" id="res">重置</button></td>
		 </tr>
	<a class="btn btn-success" name="success" href="javascript:void(0);" onClick="add_()" title="新增库位信息">新增</a><a class="btn btn-success" name="success" href="javascript:void(0);" onClick="del()" title="删除库位信息">删除</a><button type="submit" class="btn btn-success" >导出</button>
     </table>
</form>
<table class="table table-bordered table-hover definewidth">
    <thead>
    <tr>
	    <th><input type="checkbox" id="selAll" onClick="selectAll()"/></th>
		 <th>编辑</th>
		<th>当前状态</th> 
        <th>延期日期</th>
		<th>入库有效期</th>
        <th>延期单号</th>
        <th>进库单号</th>
		<th>库位名称</th>
		<th>货号</th>
		<th>项号</th>
		<th>入库数量</th>
		<th>创建时间</th>
        
       
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
  var url="<?php echo site_url("yqsq/ajax_data");?>?inajax=1";
  var data_ = {
    'page':page,
    'time':<?php echo time();?>,
    'action':'ajax_data',
	//'guid':$("#guid").val(),
	'store_bill_no':$("#store_bill_no").val(),
    'store_in_no':$("#store_bill_no").val(),
    'tin_name':$("#tin_name").val(),
	'step_id':$("#step_id").val(),
	 'create_date1':$("#create_date1").val(),
	'create_date2':$("#create_date2").val()
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
		  shtml+='<td width="20px"><input type="checkbox" name="checkAll[]" onclick="setSelectAll();" value="'+list[i]['yq_id']+'"/></td>';   
          shtml+='<td><a href="javascript:void(0)" name="success" onclick=\'edit(\"'+list[i].yq_id+'\")\' class="icon-edit" title="编辑'+list[i]['yq_id']+'"></a></td>';		  		  
          shtml+='<td>'+list[i]['step_id']+'</td>';
          shtml+='<td>'+list[i]['delay_date']+'</td>';
		  shtml+='<td>'+list[i]['in_delay_date']+'</td>';
          shtml+='<td>'+list[i]['store_bill_no']+'</td>';
          shtml+='<td>'+list[i]['store_in_no']+'</td>';
          shtml+='<td>'+list[i]['tin_name']+'</td>';
		  shtml+='<td>'+list[i]['cop_g_no']+'</td>';
          shtml+='<td>'+list[i]['g_no']+'</td>';
		  shtml+='<td>'+list[i]['qty']+'</td>';
		  shtml+='<td>'+list[i]['create_date']+'</td>';
		  
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
                url: "<?php echo site_url('yqsq/delete');?>" ,
                data: {"yq_id":data},
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
  function add_(){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"进库表头",
      width:600,
      height:150,
      loader : {
        url : '<?php echo site_url('yqsq/add');?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
      success:function(){
       submit_add(); //添加处理
       this.close();
      }
    });
    dialog.show();
    dialog.get('loader').load();
  }
   
  function submit_add(){
    var data_ = $("#add_form").serializeArray();
    //data_={'MBL':$("#MBL").val()};
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('yqsq/doadd');?>?inajax=1" ,
      data: data_,
      cache:false,
      dataType:"json",
      async:false,
      success: function(msg){
		   var shtml = '';
		    var list = msg.resultinfo.list;
        if(msg.resultcode<0){
          BUI.Message.Alert('没有权限执行此操作','error');
          return false ;
        }else if(msg.resultcode == 0 ){
          BUI.Message.Alert(msg.resultinfo.errmsg,'error');
          return false ;
        }else{
			BUI.Message.Alert("添加信息成功",'success');
      common_request(1); 
        $("#result_").html(shtml);
        
        $("#page_string").html(msg.resultinfo.obj);
        }
      }

    });
  }
	
	 function edit(yq_id){
    var Overlay = BUI.Overlay
    var dialog = new Overlay.Dialog({
      title:"编辑库位信息",
      width:600,
      height:150,
      loader : {
        url : '<?php echo site_url("yqsq/edit");?>',
        autoLoad : false, //不自动加载
        params : {"showpage":"1"},//附加的参数
        lazyLoad : true //不延迟加载
      },
      mask:true,//遮罩层是否开启
      closeAction : 'destroy',
      success:function(){
        submit_edit(yq_id); //编辑级别分类处理
        this.close();
      }
    });
    dialog.show();
    dialog.get('loader').load({"yq_id":yq_id});
  }
  function submit_edit(yq_id){
    var data_ = $("#edit_form").serializeArray();
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('yqsq/do_edit');?>?inajax=1",
      data: data_,
      cache:false,
      dataType:"json",
      async:false,
      success: function(msg){
		  var shtml = '' ;
         var list = msg.resultinfo.list;
        if(msg.resultcode<0){
          BUI.Message.Alert('没有权限执行此操作','error');
          return false ;
        }else if(msg.resultcode == 0 ){
          BUI.Message.Alert(msg.resultinfo.errmsg,'error');
          return false ;
        }else{
			store_bill_no=store_bill_no;
        BUI.Message.Alert('编辑成功！');
         common_request(1);
        $("#result_").html(shtml);
        
        $("#page_string").html(msg.resultinfo.obj);
        }
      }

    });

  }
  
  function ajax_data(page){
  common_request(page); 
}
</script>