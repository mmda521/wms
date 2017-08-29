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
  <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/dpl.css" rel="stylesheet">
  <link href="http://g.alicdn.com/bui/bui/1.1.21/css/bs3/bui.css" rel="stylesheet">	
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
 <div class="demo-content">
   <!-- <div class="toolbar">
      <button id="btnAdd" class="button button-primary">添加</button>
      <button id="btnRefresh" class="button button-primary">刷新</button>
    </div>-->
    <div id="tab"></div>
    
    
 

 
<!-- script start --> 
    <script type="text/javascript">
          BUI.use('bui/tab',function(Tab){
      
        var tab = new Tab.NavTab({
          render:'#tab',
          height:300,
          children : [
            {
              title : '表头',
              href : '<?php echo site_url('kbook_record/index');?>',
              actived:true
            },
            {
              title : '项号',
              href : '<?php echo site_url('item_number/index');?>'
            }
          ]
        });
 
        tab.render();
       /*  $('#btnAdd').on('click',function(){
          var config = {
              title : '添加标签',
              href : 'http://www.baidu.com'
            };
          tab.addTab(config);
        }); */
 
       /*  $('#btnRefresh').on('click',function(){
          var item = tab.getActivedItem();
          //item = tab.getItemById(id);//通过id获取
          item && item.reload();
        }); */
      
      });
     
    </script>
<!-- script end -->
  </div>
</body>
</html> 
 <script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/common/main-min.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/bui-min.js"></script>
 <script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/common/search-min.js"></script>

