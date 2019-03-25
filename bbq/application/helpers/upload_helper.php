<?php
	//上传图片的辅助函数
	/*
		参数$input_name,input框的name值
		参数$path,上传之后保存的图片路径
	*/

	date_default_timezone_set("PRC");
	function upload($input_name,$path){
		$CI=& get_instance();
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png';//上传图片的类型
		$config['max_size'] = '5242880';//最大上传1m的图片
		$config['max_width'] = '8000';//最大上传width=1024px的图片
		$config['max_height'] = '6000';//最大上传height=768px的图片
		//定义新图片的名称
		$pre=pathinfo($_FILES[$input_name]['name'],PATHINFO_EXTENSION);
		$config['file_name']=date('YmdHis',time()).'.'.$pre;
		$CI->load->library('upload', $config);//加载配置
		if(!$CI->upload->do_upload($input_name)){//上传失败
		   return false;//返回失败的提示
		}else{//上传成功
			$data = $CI->upload->data();
			$filename=$path.$data['file_name'];
			//$data['file_name']文件名
			return $filename;//返回图片路径
		}
	}
?>