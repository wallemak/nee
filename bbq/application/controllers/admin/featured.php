<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	header("Content-Type:text/html;charset=UTF-8");
	date_default_timezone_set("PRC"); 

class Featured extends CI_Controller {

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
		$site_url=site_url("admin/featured/featured");
		$limit=3;
		$current=$this->uri->segment(4,1);
		//echo $current;die;
		$offset=($current-1)*$limit;

		//查询总数
		$count=$this->common_model->get_count("featured");
		//$featured=$this->common_model->select_all("featured");
		$this->db->select("*")->from("featured")->limit($limit,$offset);
		$featured = $this->db->get()->result_array();
		$page=page($site_url,$count,$limit,4);

		$data=array(
			'a'=>$offset+1,
			'featured'=>$featured,
			'page'=>$page,
		); 

		$this->load->view('admin/featured',$data);
	}

	public function featured_add(){ 

		if($_POST){
			$data=array(
			'featured_title'=>$this->input->post('featured_title'),
			'featured_content'=>$this->input->post('featured_content'),
			'featured_ord'=>$this->input->post('featured_ord'),
			'featured_time'=>$this->input->post('featured_time'),
			'featured_addtime'=>time(),
			);
			//print_r($data);die;
		
			//图片上传
			$path='./upload/featured/';
			$res=upload("featured_photo",$path);
			if($res){
				$data['featured_photo']=$res;
			}else{
				show_msg('图片上传失败');
			} 
			
			$result=$this->common_model->add("featured",$data);
			if($result){
				show_msg('添加成功',site_url("admin/featured"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
			
		}
		$this->load->view('admin/featured_add');
	}


	public function featured_edit(){ 
		if($_GET){
			$featured_id=$this->input->get('featured_id');
			$featured=$this->common_model->select_one("featured","featured_id =$featured_id");
		}
		


		if($_POST){
			$featured_path=$this->input->post('featured_path');
			$featured_id=$this->input->post('featured_id');
			//echo $featured_id;die;
			$data=array(
				'featured_title'=>$this->input->post("featured_title"),
				'featured_content'=>$this->input->post("featured_content"),
				'featured_time'=>$this->input->post("featured_time"),
				'featured_ord'=>$this->input->post("featured_ord"),
			);
			//print_r($data);die;
			if($_FILES["featured_photo"]["size"]){
			//图片上传
				$path='./upload/featured/';
				$res=upload("featured_photo",$path);
				if($res){
					$data['featured_photo']=$res;
					unlink($featured_path);
				}else{
					show_msg('图片上传失败');
				} 
			}
			$result=$this->common_model->edit("featured",$data,"featured_id =$featured_id");
			if($result){
				show_msg('编辑成功',site_url("admin/featured"));
			}else{
				show_msg('网络异常,请稍后尝试');
			}
		}


		$data=array(
			'featured'=>$featured,
		);

	
		$this->load->view('admin/featured_edit',$data);
	}
			

}