<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 让ci继承自己的类库 
 * ######################################
 * 这个类里面写权限代码
 *###################################
 */

class MY_Controller extends CI_Controller{
	public $username = '' ;//登录的用户名
	public $table_ ; //表的前缀
	public $admin_id = '' ;
	public $group_name = '' ;//所在的群组
	public $role_id = '' ;
	function MY_Controller(){
		parent::__construct() ;
		$data = decode_data($this->input->get_post("cookie")); //获取cookie数据	
		$this->check_is_login($data);
		$isadmin = false ;//判断是不是超级管理员
		if(isset($data['isadmin']) && $data['isadmin']){	
			$isadmin = true ;		
		}
		if(!$isadmin){//普通的用户进行验证权限
			$this->permition() ;
		}		
	}
	//检查是否登录了
	private function check_is_login($data = '' ){
		if(isset($data['username'])){
			$this->username = $data['username'];
		}
		$this->table_ =table_pre("real_data"); //设置表前缀
		$this->admin_id = admin_id() ; //当前登陆的用户的uid
		$this->group_name = group_name() ;//所在的群组
		$this->role_id = role_id() ; 
		if(empty($this->username) || $this->username == "" || intval($this->admin_id) <= 0 ){
				if($this->input->get_post("showpage") != "" ){ //这个地方是为了判断 ，ajax请求，但是显示的是一个提示页面
					//show_error("you don't have permition to Access this page,please Contact  &nbsp;Email:{$this->config->item('web_admin_email')}",'403','forbidden');			
					echo "对不起登陆超时，或者你还没登陆";
					die();
				}			
				//如果没有登录
				if(isset($_GET['inajax']) || $this->is_ajax()){
					echo result_to_towf_new('',$this->config->item('no_permition'),"你的密码已经过期,重新登录",null);
					die();
				}
				showmessage("密码已经过期",'login/index',3,0);
			}		
	}
	//验证是否有访问的权限
	private function permition(){
		$last_permition = array();
		$permition =array();
		$permition_admin = array() ;
		$role_cache = $this->config->item('role_cache');
		if(file_exists($role_cache."/cache_role_{$this->role_id}.inc.php")){
			require_once  $role_cache."/cache_role_{$this->role_id}.inc.php" ;
			$permition = $role_array ;
		}
		if(file_exists($role_cache."/cache_admin_{$this->admin_id}.inc.php")){		
			require_once $role_cache."/cache_admin_{$this->admin_id}.inc.php" ; 
			$permition_admin = $admin_perm_array ;
			
		}
		$last_permition = array();
		if($permition && $permition_admin){
			$last_permition = array_merge_recursive($permition,$permition_admin); 
		}elseif(!$permition && $permition_admin){
			$last_permition = $permition_admin ;
		}elseif($permition && !$permition_admin){
			$last_permition = $permition ;
		}
		$no_need_perm = $this->config->item('no_need_perm') ;
		if($no_need_perm && $last_permition){
			$last_permition = array_merge_recursive($last_permition,$no_need_perm); ;
		}
		if($last_permition){
			$last_permition = array_unique($last_permition);
		}
		
		$url_array = $this->uri->segment_array() ;

		$new_url = '';
		if(isset($url_array[1])){
			$new_url.=$url_array[1]."/";
		}
		if(isset($url_array[2])){
			$new_url.=$url_array[2]."/";
		}
		if(isset($url_array[3])){
			$new_url.=$url_array[3]."/";
		}
		if(isset($url_array[4])){
			$new_url.=$url_array[4]."/";
		}
		//判断当前的访问地址的最后一位是不是有/
		if(substr($new_url,-1) == "/"){
			$new_url = substr($new_url,0,-1);
		}
		$last_permition = $this->delete_str_($last_permition);
		if(!in_array($new_url, $last_permition)){
			if($this->input->get_post("showpage") != "" ){ //这个地方是为了判断 ，ajax请求，但是显示的是一个错误页面
				//show_error("you don't have permition to Access this page,please Contact  &nbsp;Email:{$this->config->item('web_admin_email')}",'403','forbidden');			
				echo "对不起没权限执行此操作，请联系管理员：{$this->config->item('web_admin_email')}";
				die();
			}
			if(isset($_GET['inajax']) || $this->is_ajax()){
					echo result_to_towf_new('',$this->config->item('no_permition'),"你没有权限进行此操作，请联系管理员",null);
			}else{
				show_error("you don't have permition to Access this page,please Contact  &nbsp;Email:{$this->config->item('web_admin_email')}",403,'forbidden');
			}
				die();
		}
	}
	private function is_ajax(){
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
			return true ;
		}else{
			echo false ;
		}
	}
	/*
	*遍历数组 ， 并且去掉每个值后面的/
	*@params $array 
	*@return array
	*/
	private function delete_str_($array = array() ){
		$data = array();
		if(is_array($array) && $array){
			for($i = 0 ;$i <count($array) ; $i++){
				$url = isset($array[$i])?$array[$i]:'' ;
				if(substr($url,-1) == '/'){				
					$url= substr($url,0,-1) ;
				}
				$data[] = $url ;
			}
		}
		return $data ;
	}
}