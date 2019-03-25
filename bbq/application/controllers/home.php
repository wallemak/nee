<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$appid = "wx2ca1b4d674248dbd";
		$redirect_uri = "http://wd1700273.pro.wdcase.com/mak/bbq/index.php/home/get_code";
		$authorize_url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
		header("Location: {$authorize_url}");
		$this->load->view('home');
	}

	public function get_code(){
		if (isset($_GET['code'])){
    		$code= $_GET['code'];
    		$arr=file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2ca1b4d674248dbd&secret=b7cfe3b30a50baa9564900fbf297aedd&code=$code&grant_type=authorization_code");
			$arr=json_decode($arr,true);
			$access_token=$arr['access_token'];
			// var_dump($access_token);die;
			$user=file_get_contents("https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=OPENID");
			//print_r($user);die;
			$user=json_decode($user,true);
			$openid=$user['openid'];
			// echo $openid;die;
			$this->db->set_dbprefix('wechat_');
			$res=$this->db->where('openid', $openid)->get('user')->result_array();
			//echo $this->db->last_query();
			//exit();
			//print_r($res);die;
			if(!$res){
				$data=array(
					'nickname'=>$user['nickname'],
					'photo'=>$user['headimgurl'],
					'openid'=>$user['openid'],
					);
				//$db->add("user",$data);
				$this->db->insert('user', $data); 
			}
			//redirect('/login/form/');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */