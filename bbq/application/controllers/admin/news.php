<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	header("Content-Type:text/html;charset=UTF-8");
	date_default_timezone_set("PRC"); 

class News extends CI_Controller {

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
		$site_url=site_url("admin/news/index");
		$limit=3;
		$current=$this->uri->segment(4,1);
		//echo $current;die;
		$offset=($current-1)*$limit;

		//查询总数
		$count=$this->common_model->get_count("new");
		//$new=$this->common_model->select_all("new");
		$this->db->select("*")->from("new")->limit($limit,$offset);
		$new = $this->db->get()->result_array();
		//print_r($new);die;
		$page=page($site_url,$count,$limit,4);

		$data=array(
			'a'=>$offset+1,
			'new'=>$new,
			'page'=>$page,
		); 

		$this->load->view('admin/new',$data);
	}

	public function new_add(){ 

		if($_POST){
			$data=array(
			'new_title'=>$this->input->post('new_title'),
			'new_ord'=>$this->input->post('new_ord'),
			'new_con'=>$this->input->post('new_con'),
			'new_addtime'=>$this->input->post('new_addtime'),
			);
			//($data);die;
		
			//图片上传
			$path='./upload/new/';
			$res=upload("new_photo",$path);
			if($res){
				$data['new_photo']=$res;
			}else{
				show_msg('图片上传失败');
			} 
			
			$result=$this->common_model->add("new",$data);
			if($result){
				show_msg('添加成功',site_url("admin/news/"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
			
		}
		$this->load->view('admin/new_add');
	}


	public function new_edit(){ 
		if($_GET){
			$new_id=$this->input->get('new_id');
			$new=$this->common_model->select_one("new","new_id =$new_id");
		}
		


		if($_POST){
			$new_path=$this->input->post('new_path');
			$new_id=$this->input->post('new_id');
			//echo $new_id;die;
			$data=array(
				'new_title'=>$this->input->post('new_title'),
				'new_ord'=>$this->input->post('new_ord'),
				'new_con'=>$this->input->post('new_con'),
				'new_addtime'=>$this->input->post('new_addtime'),

			);
			//print_r($data);die;
			if($_FILES["new_photo"]["size"]){
			//图片上传
				$path='./upload/new/';
				$res=upload("new_photo",$path);
				if($res){
					$data['new_photo']=$res;
					unlink($new_path);
				}else{
					show_msg('图片上传失败');
				} 
			}
			$result=$this->common_model->edit("new",$data,"new_id =$new_id");
			if($result){
				show_msg('编辑成功',site_url("admin/news/"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
		}


		$data=array(
			'new'=>$new,
		);

	
		$this->load->view('admin/new_edit',$data);
	}
			

}