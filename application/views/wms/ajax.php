<!DOCTYPE HTML>
<html>
<head>
	<title>库位编辑</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php echo base_url();?>/webroot/CBS_Platform/assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript">
function zih(){
g_no = document.getElementById("g_no").value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("g_name").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","<?php echo site_url("kbook_record/ajax_data/g_no")?>"+g_no,true);
xmlhttp.send();	
}

</script>  

</head>
<body>
<div>
<select id="g_no" onChange="zih()">
<?php
foreach($item_info as $item){
echo "<option value='".$item['item_id']."'>".$item['g_no']."</option>";
}
?>
</select>
<input type="text" id="g_name"/>
<input type="text" id="g_nam"/>
</div>
</body>

</html>