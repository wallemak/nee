<?php
	class Common_model extends CI_Model{
		//获取多条数据
		public function select_all($tablename,$where=NULL,$limit=0,$offset=0){
			if($limit){//如果有分页
				$query=$this->db->get_where($tablename,$where,$limit,$offset);
			}else{
				$query=$this->db->get_where($tablename,$where);
			}
			return $query->result_array();//result_array方法是返回一个关联数组
		}
		//查询总条数
		public function get_count($tablename,$where=NULL){
			if($where){//有条件的情况
				$query=$this->db->query("SELECT * FROM ".$this->db->dbprefix($tablename)." WHERE $where");
			}else{
				$query=$this->db->query("SELECT * FROM ".$this->db->dbprefix($tablename));
			}
			return $query->num_rows();//num_rows返回查询出来的总数据数
		}
		//查询单条记录
		public function select_one($tablename,$where=NULL){
			if($where){//有条件的情况
				$query=$this->db->get_where($tablename,$where);
			}else{
				$query=$this->db->get($tablename);
			}
			return $query->row_array();//row_array获取一个一维数组
		}
		//插入数据
		public function add($tablename,$data){
			$this->db->insert($tablename,$data); 
			return $this->db->insert_id();//返回插入成功那条数据的主键
		}
		//编辑数据
		public function edit($tablename,$data,$where){
			$this->db->where($where);
			$this->db->update($tablename,$data); 
			return $this->db->affected_rows();//执行成功返回1,失败返回0
		}
		//删除数据
		public function delete($tablename,$where){
			$this->db->delete($tablename,$where); 
			return $this->db->affected_rows();
		}
	
	
	
	
	
	
	}

?>