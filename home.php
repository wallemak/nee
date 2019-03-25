<?php
	header("Content-Type:text/html;charset=UTF-8");
	include("DB.class.php");
	$db=new DB("localhost","wd1700273","pass123456","wd1700273","wechat_");
	//判断code并获取code
	if (isset($_GET['code'])){
    	$code= $_GET['code'];
    	//echo $code;
	}else{
	    echo "NO CODE";
	}
	$arr=file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2ca1b4d674248dbd&secret=b7cfe3b30a50baa9564900fbf297aedd&code=$code&grant_type=authorization_code");
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
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<style>
	.d{
		width:50px;
		height:50px;
		background-color:blue;
	}
	</style>
</head>
<body>
	<div class="d">123123</div>
</body>
</html>