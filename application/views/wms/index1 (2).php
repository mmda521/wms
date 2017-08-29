<!DOCTYPE HTML>
<html>
 <head>
  <title>保税仓wms管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>/webroot/CBS_Platform/assets/css/main-min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="<?php echo base_url();?>webroot/CBS_Platform/assets/js/jquery-1.8.1.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>webroot/CBS_Platform/assets/js/bui.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>webroot/CBS_Platform/assets/js/config.js"></script>
 </head>
 <body>
  <div class="header">
    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo $_SESSION['LOGIN_NO']; ?></span><a href="<?php echo site_url("login/login_out");?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'welcome',		  
          menu:[{
              text:'基础资料模块',
			  collapsed:true,
              items:[
			  {id:'welcome',text:'欢迎页面',href:<?php echo "'".site_url()."/location/welcome'";?>},
              //{id:'location',text:'库位信息',href:<?php echo "'".site_url()."/location/index'";?>},
              {id:'bus_record',text:'企业备案管理',href:<?php echo "'".site_url()."/bus_record/index'";?>},
			  {id:'biz',text:'业务资格申请',href:<?php echo "'".site_url()."/biz/index'";?>},
			  {id:'kuweiguanli',text:'库位管理',href:<?php echo "'".site_url()."/kuweiguanli/index'";?>},
              //{id:'putpre_head',text:'新增信息',href:<?php echo "'".site_url()."/putpre_head/index'";?>},
			  //{id:'kbook_record',text:'表头信息',href:<?php echo "'".site_url()."/kbook_record/index'";?>},	
			  //{id:'item_number',text:'项号信息',href:<?php echo "'".site_url()."/item_number/index'";?>},	
			  //{id:'part_no',text:'料号信息',href:<?php echo "'".site_url()."/part_no/index'";?>},
              //{id:'zhangce',text:'账册信息',href:<?php echo "'".site_url()."/zhangce/index'";?>},				  
              ]
            },{
			   text:'账册管理',
			   collapsed:true,
			   items:[
          /*   {id:'kbook_record',text:'表头信息',href:<?php echo "'".site_url()."/kbook_record/record'";?>},	
			   {id:'item_number',text:'项号信息',href:<?php echo "'".site_url()."/item_number/record'";?>},	
			   {id:'part_no',text:'料号信息',href:<?php echo "'".site_url()."/part_no/index'";?>}, */
               {id:'zhangce',text:'K账册备案',href:<?php echo "'".site_url()."/zhangce/index'";?>},
			   {id:'zhangce',text:'K账册变更',href:<?php echo "'".site_url()."/zhangce_change/index'";?>},
			   ]
			},{
              text:'月报管理',
			  collapsed:true,
              items:[
                {id:'month_report',text:'月报申请',href:<?php echo "'".site_url()."/month_report/index'";?>},
				/*  {id:'kbook',text:'表头信息',href:<?php echo "'".site_url()."/kbook_record/change'";?>},	
			   {id:'item_nu',text:'项号信息',href:<?php echo "'".site_url()."/item_number/change'";?>},	 */
              ]
            },{
              text:'业务申报',
			  collapsed:true,
              items:[
                {id:'putpre_head',text:'进库预报表头',href:<?php echo "'".site_url()."/putpre_head/index'";?>},
				{id:'putpre_list',text:'进库预报货物明细',href:<?php echo "'".site_url()."/putpre_list/index'";?>},
				{id:'user_manage',text:'进库确报',href:<?php echo "'".site_url()."/month_report/index'";?>},
				{id:'outpre_head',text:'出库预报表头',href:<?php echo "'".site_url()."/outpre_head/index'";?>},
				{id:'outpre_list',text:'出库预报货物明细',href:<?php echo "'".site_url()."/outpre_list/index'";?>},
				{id:'user_manage',text:'出库确报',href:<?php echo "'".site_url()."/month_report/index'";?>},
              ]
            }
			
			]
          },
		  ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
</body>
</html>