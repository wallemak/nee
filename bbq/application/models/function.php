<?php
	//公共函数库
	//提醒函数
	/*
		参数$msg,提醒的文字
		参数$url,提醒后跳转的页面
	*/
	function show_msg($msg,$url=''){
		echo "<script>";
		echo "alert('".$msg."');";
		if(empty($url)){//如果不传入第二个参数
			echo 'window.history.go(-1);';//执行失败回到上一个页面
		}else{//执行成功
			echo "location.href='".$url."';";
		}
		echo "</script>";
		die;
	}
	/**
	 * 
	 * 字符截取
	 * @param string $string  需要截取的字符串
	 * @param int 	 $start	  截取的开始位置
	 * @param int 	 $length  截取的长度
	 * @param string $charset 编码
	 * @param string $dot	  如果截取的长度小于总长度就加这个字符
	 */
	function str_cut(&$string, $start, $length, $charset = "utf-8", $dot = '...') {
		if(function_exists('mb_substr')) {
			if(mb_strlen($string, $charset) > $length) {
				return mb_substr ($string, $start, $length, $charset) . $dot;
			}
			return mb_substr ($string, $start, $length, $charset);
		}else if(function_exists('iconv_substr')) {
			if(iconv_strlen($string, $charset) > $length) {
				return iconv_substr($string, $start, $length, $charset) . $dot;
			}
			return iconv_substr($string, $start, $length, $charset);
		}
		$charset = strtolower($charset);
		switch ($charset) {
			case "utf-8" :
				preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $ar);
				if(func_num_args() >= 3) {
					if (count($ar[0]) > $length) {
						return join("", array_slice($ar[0], $start, $length)) . $dot;
					}
					return join("", array_slice($ar[0], $start, $length));
				} else {
					return join("", array_slice($ar[0], $start));
				}
				break;
			default:
				$start = $start * 2;
				$length   = $length * 2;
				$strlen = strlen($string);
				for ( $i = 0; $i < $strlen; $i++ ) {
					if ( $i >= $start && $i < ( $start + $length ) ) {
						if ( ord(substr($string, $i, 1)) > 129 ) $tmpstr .= substr($string, $i, 2);
						else $tmpstr .= substr($string, $i, 1);
					}
					if ( ord(substr($string, $i, 1)) > 129 ) $i++;
				}
				if ( strlen($tmpstr) < $strlen ) $tmpstr .= $dot;
				
				return $tmpstr;
		}
	}
	//图片上传的函数
	/*
	参数$name,input表单的name值
	参数$type,上传的图片类型
	参数$size,上传的图片大小
	参数$path,上传图片的保存路径
	*/
	function uploads($name,$type=array('jpg','png','gif'),$size=1048576,$path='upload'){
	if($_FILES){
		//1、判断错误值
		$num=$_FILES[$name]['error'];
		switch($num){
			case 1:
			return '上传的图片大小超过了php.ini中upload_max_filesize设置的值';
			break;
			case 2:
			return '上传的图片大小超过了MAX_FILE_SIZE的值';
			break;
			case 3:
			return '图片没有完全上传';
			break;
			case 4:
			return '没有选择图片';
			break;
		}
		//2、判断文件的类型
		$pre=pathinfo($_FILES[$name]['name'],PATHINFO_EXTENSION);//拿到后缀
		if(!in_array($pre,$type)){
			//判断后缀是否在$type数组中出现,如果没有出现就提示
			return '你所上传的文件类型不正确';
		}
		//3、判断文件的大小
		if($_FILES[$name]['size']>=$size){
			return '你上传的文件太大了';
		}
		//4、保存图片
		//先设置图片的名称
		$filename=date('YmdHis',time()).mt_rand(1000,9999).mt_rand(1000,9999);
		//echo $filename;die;
		//die阻止后面的代码继续执行
		$file=$filename.'.'.$pre;
		//echo $file;die;
		if(is_uploaded_file($_FILES[$name]['tmp_name'])){
			//判断是否有临时文件
			move_uploaded_file($_FILES[$name]['tmp_name'],'../'.$path.'/'.$file);
			return '图片上传成功|'.$file;
		}else{
			return '图片上传失败';
		}
	}else{
		return '上传的图片不合法';
	}
	}
	//缩略图函数
	/*
	参数$img,原图的路径
	参数$path,缩略图保存路径
	*/
	function thumb($img,$path='thumb'){
		//1、打开大图
		$imginfo=getimagesize($img);
		//print_r($imginfo);//获取到大图的详细信息
		$fa_w=$imginfo[0];//大图的宽
		$fa_h=$imginfo[1];//大图的高
		$son_w=$fa_w/5;//小图的宽
		$son_h=$fa_h/5;//小图的高
		//打开不同类型的大图使用的函数不一样,所以要判断大图类型,用对应的函数打开
		switch($imginfo[2]){
			case 1:
			$fa_re=imagecreatefromgif($img);
			break;
			case 2:
			$fa_re=imagecreatefromjpeg($img);
			break;
			case 3:
			$fa_re=imagecreatefrompng($img);
			break;
		}
		//2、新建小图
		$son_re=imagecreatetruecolor($son_w,$son_h);
		//3、复制大图到小图,并调整图片大小
		imagecopyresized($son_re,$fa_re,0,0,0,0,$son_w,$son_h,$fa_w,$fa_h);
		//4、保存小图
		//首先要确定小图的图片名
		$pre=pathinfo($img,PATHINFO_EXTENSION);
		//拿到原图片的图片名
		$img_name=pathinfo($img,PATHINFO_FILENAME);
		//组装小图的图片名
		$son_name='../'.$path.'/'.$img_name.'.'.$pre;
		//保存图片,按照图片类型不同有对应的函数保存
		switch($imginfo[2]){
			case 1:
			imagegif($son_re,$son_name);
			break;
			case 2:
			imagejpeg($son_re,$son_name);
			break;
			case 3:
			imagepng($son_re,$son_name);
			break;
		}
		//释放资源
		imagedestroy($fa_re);
		imagedestroy($son_re);
		return $son_name;
	}
	
	
	
	
	
	
	



?>