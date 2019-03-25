<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	header("Content-Type:text/html;charset=UTF-8");
	date_default_timezone_set("PRC"); 

class Show extends CI_Controller {

	public function __construct(){
		parent::__construct();//继承父级的构造函数
		$this->load->model("common_model");//加载模型
		$this->load->helper("common");
		$this->load->helper("page");
		$this->load->helper("upload");
		
	}

	public function index()
	{ 
		//分页
		$site_url=site_url("admin/show/index");
		$limit=3;
		$current=$this->uri->segment(4,1);
		//echo $current;die;
		$offset=($current-1)*$limit;

		//查询总数
		$count=$this->common_model->get_count("show");
		//$show=$this->common_model->select_all("show");
		$this->db->select("*")->from("show")->limit($limit,$offset);
		$show = $this->db->get()->result_array();
		$page=page($site_url,$count,$limit,4);

		$data=array(
			'a'=>$offset+1,
			'show'=>$show,
			'page'=>$page,
		); 

		$this->load->view('admin/show',$data);
	}

	public function show_add(){ 

		if($_POST){
			$data=array(
			'show_title'=>$this->input->post('show_title'),
			'show_con'=>$this->input->post('show_con'),
			);
			//print_r($data);die;
			
			$result=$this->common_model->add("show",$data);
			if($result){
				show_msg('添加成功',site_url("admin/show"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
			
		}
		$this->load->view('admin/show_add');
	}


	public function show_edit(){ 
		if($_GET){
			$show_id=$this->input->get('show_id');
			$show=$this->common_model->select_one("show","show_id =$show_id");
		}
		


		if($_POST){
			$show_id=$this->input->post('show_id');
			//echo $show_id;die;
			$data=array(
				'show_title'=>$this->input->post("show_title"),
				'show_con'=>$this->input->post("show_con"),
			);
			$result=$this->common_model->edit("show",$data,"show_id =$show_id");
			if($result){
				show_msg('编辑成功',site_url("admin/show"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
		}
		$data=array(
			'show'=>$show,
		);

	
		$this->load->view('admin/show_edit',$data);
	}
			

}