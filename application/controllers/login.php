<?php
class Login extends CI_Controller{
	public function __construct (){
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
	}
	function index(){
        if(isset($_SESSION['login_no']) && $_SESSION['login_no'] ){
             $this->load->view('wms/view_login','');
        }
	}
	function dologin()
    {
		$condition = array();
        //获取用户名
        $login_no = $this->input->get_post("login_no");
        if(!empty($login_no)){
            $condition['LOGIN_NO'] = $login_no;
        }
        //获取密码
        $password = $this->input->get_post("password");
        if(!empty($password)){
            $condition['PASSWORD'] = $password;
        }
        $data['info'] =  $this->user_model->get_list1($condition,'','');
        if($data['info']){
            $_SESSION['LOGIN_NO'] = $data['info']['LOGIN_NO'];
         $this->load->view('wms/index',$data);
        }else{
            $this->load->view('wms/view_login','');
        }
    }

		//退出
	public function login_out(){
	    if(isset($_SESSION['LOGIN_NO']) && $_SESSION['LOGIN_NO'] ) {
            session_destroy();
            $this->load->view('wms/view_login','');
        }
	 }


}