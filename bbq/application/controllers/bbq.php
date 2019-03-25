<?php
	//header("Content-Type:text/html;charset=UTF-8");
	include("DB.class.php");
	$db=new DB("localhost","wd1700273","pass123456","wd1700273","wechat_");
	//判断code并获取code
	$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2ca1b4d674248dbd&redirect_uri=http://wd1700273.pro.wdcase.com/mak/bbq/index.php/bbq
&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
	header("Location: {$url}");
	
	if (isset($_GET['code'])){
    	$code= $_GET['code'];
    	//echo $code;
		
	}else{
	    //echo "NO CODE";
	}
	echo $code;die;
	$arr=file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2ca1b4d674248dbd&secret=b7cfe3b30a50baa9564900fbf297aedd&code=$code&grant_type=authorization_code");
	print_r($arr);die;
	$arr=json_decode($arr,true);

	$access_token=$arr['access_token'];
	//var_dump($access_token);
	$user=file_get_contents("https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=OPENID");
	
	$user=json_decode($user,true);
	// echo '<pre>';
	// print_r($user);
	// echo '</pre>';
	$openid=$user['openid'];
	//echo $openid;
	$res=$db->select_one("user","openid='$openid'");
	//print_r($res);
	if(!$res){
		$data=array(
			'nickname'=>$user['nickname'],
			'photo'=>$user['headimgurl'],
			'openid'=>$user['openid'],
			);
		$db->add("user",$data);
	}



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bbq extends CI_Controller {

	public function __construct(){
		parent::__construct();//继承父级的构造函数
		$this->load->model("common_model");//加载模型
		$this->load->helper("common");
		$this->load->helper("page");
		$this->nav=$this->common_model->select_all("nav");
		$this->arr=array('home','food','char','join','ente','menn',
			);
	}


	public function index()
	{ 
		$show=$this->common_model->select_all("show");
		$banner=$this->common_model->select_all("banner");
		$one=$this->common_model->select_one("new");
		// $new1=$this->common_model->select_all("new");
		// $new2=$this->common_model->select_all("new");
		$this->db->select("*")->from("new")->limit(3,0);
		$new1 = $this->db->get()->result_array();
		$this->db->select("*")->from("new")->limit(3,3);
		$new2 = $this->db->get()->result_array();
		

		$show_arr=array(
			'music',
			'beer',
			'party',
		);
		

		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
			'show'=>$show,
			'banner'=>$banner,
			'show_arr'=>$show_arr,
			'one'=>$one,
			'new1'=>$new1,
			'new2'=>$new2,
		); 
		$this->load->view('index',$data);
	}


	public function food()
	{ 

		$food=$this->common_model->select_all('food');
		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
			'food'=>$food,
		); 
		$this->load->view('food',$data);
	}


	public function activity()
	{ 
		$featured=$this->common_model->select_all('featured');
		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
			'featured'=>$featured,
		); 
		$this->load->view('activity',$data);
	}



	public function join()
	{ 
		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
		); 
		$this->load->view('join',$data);
	}
	public function profile()
	{ 
		$mem=$this->common_model->select_all("mem");
		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
			'mem'=>$mem,
		); 
		$this->load->view('profile',$data);
	}
	public function about(){

		$i=0;
		$data=array(
			'nav'=>$this->nav,
			'arr'=>$this->arr,
			'i'=>$i,
		);
		$this->load->view('about',$data);

	}
}