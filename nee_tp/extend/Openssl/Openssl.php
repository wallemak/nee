<?php
namespace Openssl;

class Openssl
{
	//生成证书
	function OpenSSLFile()
	{
		$config = array(
		  "config" => 'D:\php\PHPTutorial\php\php-7.2.1-nts\extras\ssl\openssl.cnf',
		  "digest_alg" => "nee",  //证书的专用名称或者主题
		  "private_key_bits" => 4096,  //指定应该使用多少位来生成私钥,字节数：512 1024 2048 4096 ...
		  "private_key_type" => OPENSSL_KEYTYPE_RSA, //加密类型
		  );
		$res = openssl_pkey_new($config);

		if ( $res == false ) return false;

		//生成私钥
		openssl_pkey_export($res, $private_key,null,$config);

		//生产公钥
		$public_key = openssl_pkey_get_details($res);
		$public_key = $public_key["key"];
		// dd($public_key);
		file_put_contents("./ssl/cert_public.key", $public_key);
		file_put_contents("./ssl/cert_private.pem", $private_key);

		//释放openssl_pkey_new（）创建的 私钥。
		openssl_free_key($res);
	}


	//加密解密
	function authcode($string, $operation = 'E')
	{
		$ssl_public     = file_get_contents("./ssl/cert_public.key");
		$ssl_private    = file_get_contents("./ssl/cert_private.pem");
		$pi_key         = openssl_pkey_get_private($ssl_private);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
		$pu_key         = openssl_pkey_get_public($ssl_public);//这个函数可用来判断公钥是否是可用的

		if( (false == $pi_key) || (false == $pu_key) ) return '证书错误';
		$data = "";
		if( $operation == 'D') {
		openssl_private_decrypt(base64_decode($string),$data,$pi_key);//私钥解密
		} else { 
		openssl_public_encrypt($string, $data, $pu_key);//公钥加密
		$data = base64_encode($data);
		}
		return $data;
	}


}
