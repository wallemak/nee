<?php
	//��ҳ����
	/*
		����$site_url,����ҳ�Ǹ������ĵ�ַ
		����$count,��������
		����$limit,ÿҳ��ʾ��������
	*/
	function page($site_url,$count,$limit,$uri_segment=3){
		$CI=& get_instance();//ʹ����,��Ҫ�ȼ����������
		$CI->load->library('pagination');//���ط�ҳ��
		$config['base_url']=$site_url;//����ҳ�Ǹ������ĵ�ַ,���˷�ҳ��ǰҳ֮������в���
		$config['total_rows']=$count;//��������
		$config['per_page']=$limit;//ÿҳ��ʾ��������
		$config['uri_segment']=$uri_segment;//��ҳ�ĵ�ǰҳ�ڵ�ַ���ĵڼ���λ��
		//��ҳ������ǩ
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		//��ҳ��ǩ
		$config['first_link'] = 'First';//��ҳ��ʾ���ַ�,�������Ҫ��ʾ�Ͱ�ֵ����ΪFALSE
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		//βҳ��ǩ
		$config['last_link'] = 'Last';//βҳ��ʾ���ַ�,�������Ҫ��ʾ�Ͱ�ֵ����ΪFALSE
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		//��һҳ��ǩ
		$config['prev_link'] = 'Prev';//��һҳ��ʾ���ַ�,�������Ҫ��ʾ�Ͱ�ֵ����ΪFALSE
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//��һҳ��ǩ
		$config['next_link'] = 'Next';//��һҳ��ʾ���ַ�,�������Ҫ��ʾ�Ͱ�ֵ����ΪFALSE
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		//���ֱ�ǩ
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		//��ǰҳ��ǩ,��ǰҳ�����Զ���a����,����ҳ�����Զ���a����
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['use_page_numbers'] = TRUE;//����֮���ҳ�����ǵ�ǰҳ
		$CI->pagination->initialize($config);//��������
		return $CI->pagination->create_links();//����һ����ҳ
	}
?>