<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	header("Content-Type:text/html;charset=UTF-8");
	date_default_timezone_set("PRC"); 

class Food extends CI_Controller {

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
		$site_url=site_url("admin/food/food");
		$limit=3;
		$current=$this->uri->segment(4,1);
		//echo $current;die;
		$offset=($current-1)*$limit;

		//查询总数
		$count=$this->common_model->get_count("food");
		//$food=$this->common_model->select_all("food");
		$this->db->select("*")->from("food")->limit($limit,$offset);
		$food = $this->db->get()->result_array();
		$page=page($site_url,$count,$limit,4);

		$data=array(
			'a'=>$offset+1,
			'food'=>$food,
			'page'=>$page,
		); 

		$this->load->view('admin/food',$data);
	}

	public function food_add(){ 

		if($_POST){
			$data=array(
			'food_name'=>$this->input->post('food_name'),
			'food_int'=>$this->input->post('food_int'),
			'food_ord'=>$this->input->post('food_ord'),
			'food_addtime'=>time(),
			);
			//print_r($data);die;
		
			//图片上传
			$path='./upload/food/';
			$res=upload("food_photo",$path);
			if($res){
				$data['food_photo']=$res;
			}else{
				show_msg('图片上传失败');
			} 
			
			$result=$this->common_model->add("food",$data);
			if($result){
				show_msg('添加成功',site_url("admin/food"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
			
		}
		$this->load->view('admin/food_add');
	}


	public function food_edit(){ 
		if($_GET){
			$food_id=$this->input->get('food_id');
			$food=$this->common_model->select_one("food","food_id =$food_id");
		}
		


		if($_POST){
			$food_path=$this->input->post('food_path');
			$food_id=$this->input->post('food_id');
			//echo $food_id;die;
			$data=array(
				'food_name'=>$this->input->post("food_name"),
				'food_ord'=>$this->input->post("food_ord"),
			);
			//print_r($data);die;
			if($_FILES["food_photo"]["size"]){
			//图片上传
				$path='./upload/food/';
				$res=upload("food_photo",$path);
				if($res){
					$data['food_photo']=$res;
					unlink($food_path);
				}else{
					show_msg('图片上传失败');
				} 
			}
			$result=$this->common_model->edit("food",$data,"food_id =$food_id");
			if($result){
				show_msg('编辑成功',site_url("admin/food"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
		}


		$data=array(
			'food'=>$food,
		);

	
		$this->load->view('admin/food_edit',$data);
	}
			

}