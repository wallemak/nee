<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set("PRC");
class login extends CI_Controller {

	public function __construct(){
		parent::__construct();//继承父级的构造函数
		$this->load->model("common_model");//加载模型
		$this->load->helper("common");
		$this->load->helper("cookie");
		
	}



	public function log(){
	  if($_POST){
		$data=array(
		  'admin_name'=>$this->input->post("admin_name"),
		  'admin_password'=>$this->input->post("admin_password"),
		);
		$admin=$this->common_model->select_one("admin",$data);
		if($admin){
			$this->input->set_cookie('admin_name',$admin['admin_name'],60*60*24);
			//设置session
			$session_data=array(
				'is_login'=>1,
				'lasttime'=>time(),
				'admin_id'=>$admin['admin_id'],
				);

			$this->session->set_userdata($session_data);
			show_msg('登录成功',site_url('admin/lake/index'));
		}else{
			show_msg('用户名或密码错误');
		}
	}

		$this->load->view('admin/login');
	}

	public function logout(){
		delete_cookie("admin_name");
		$session_data=array(
			'is_login'=>'',
			'lasttime'=>'',
			'admin_id'=>'',
			);
		$this->session->unset_userdata($session_data);
		show_msg('退出成功',site_url('admin/login/log'));
	}
}
