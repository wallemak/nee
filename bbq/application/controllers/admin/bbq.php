<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	header("Content-Type:text/html;charset=UTF-8");
	date_default_timezone_set("PRC"); 

class Bbq extends CI_Controller {

	public function __construct(){
		parent::__construct();//继承父级的构造函数
		$this->load->model("common_model");//加载模型
		$this->load->helper("common");
		$this->load->helper("page");
		$this->load->helper("upload");
		
	}


	public function index()
	{ 
		
		$data=array(
			
		); 
		$this->load->view('admin/index',$data);
	}
	public function banner()
	{ 

		$a=1;
		$banner=$this->common_model->select_all("banner");
		$data=array(
			'a'=>$a,
			'banner'=>$banner,
		); 

		$this->load->view('admin/banner',$data);
	}

	public function banner_add(){ 

		if($_POST){
			$data=array(
			'banner_name'=>$this->input->post('banner_name'),
			'banner_ord'=>$this->input->post('banner_ord'),
			'banner_addtime'=>time(),
			);
			//print_r($data);die;
		
			//图片上传
			$path='./upload/';
			$res=upload("banner_photo",$path);
			if($res){
				$data['banner_photo']=$res;
			}else{
				show_msg('图片上传失败');
			} 
			
			$result=$this->common_model->add("banner",$data);
			if($result){
				show_msg('添加成功',site_url("admin/bbq/banner"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
			
		}
		$this->load->view('admin/banner_add');
	}


	public function banner_edit(){ 
		if($_GET){
			$banner_id=$this->input->get('banner_id');
			$banner=$this->common_model->select_one("banner","banner_id =$banner_id");
		}
		


		if($_POST){
			$banner_path=$this->input->post('banner_path');
			$banner_id=$this->input->post('banner_id');
			//echo $banner_id;die;
			$data=array(
				'banner_name'=>$this->input->post("banner_name"),
				'banner_ord'=>$this->input->post("banner_ord"),
			);
			//print_r($data);die;
			if($_FILES["banner_photo"]["size"]){
			//图片上传
				$path='./upload/';
				$res=upload("banner_photo",$path);
				if($res){
					$data['banner_photo']=$res;
					unlink($banner_path);
				}else{
					show_msg('图片上传失败');
				} 
			}
			$result=$this->common_model->edit("banner",$data,"banner_id =$banner_id");
			if($result){
				show_msg('编辑成功',site_url("admin/bbq/banner"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
		}


		$data=array(
			'banner'=>$banner,
		);

	
		$this->load->view('admin/banner_edit',$data);
	}
			

}