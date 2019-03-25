<?php
	//分页函数
	/*
		参数$site_url,做分页那个方法的地址
		参数$count,总数据数
		参数$limit,每页显示的数据数
	*/
	function page($site_url,$count,$limit,$uri_segment=3){
		$CI=& get_instance();//使用类,需要先加载这个函数
		$CI->load->library('pagination');//加载分页类
		$config['base_url']=$site_url;//做分页那个方法的地址,除了分页当前页之外的所有部分
		$config['total_rows']=$count;//总数据数
		$config['per_page']=$limit;//每页显示的数据数
		$config['uri_segment']=$uri_segment;//分页的当前页在地址栏的第几个位置
		//分页最外层标签
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		//首页标签
		$config['first_link'] = 'First';//首页显示的字符,如果不需要显示就把值设置为FALSE
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//尾页标签
		$config['last_link'] = 'Last';//尾页显示的字符,如果不需要显示就把值设置为FALSE
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		//上一页标签
		$config['prev_link'] = 'Prev';//上一页显示的字符,如果不需要显示就把值设置为FALSE
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//下一页标签
		$config['next_link'] = 'Next';//下一页显示的字符,如果不需要显示就把值设置为FALSE
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		//数字标签
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		//当前页标签,当前页不给自动加a链接,其他页都是自动加a链接
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['use_page_numbers'] = TRUE;//启用之后分页参数是当前页
		$CI->pagination->initialize($config);//加载配置
		return $CI->pagination->create_links();//创建一个分页
	}
?>