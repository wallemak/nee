<?php
	/*
		数据库使用类
	*/
	class DB{
		public $hostname;//数据库服务器
		public $username;//数据库登录名
		public $password;//登录密码
		public $dbname;//使用数据库名称
		public $perfix;//表前缀
		public function __construct($hostname,$username,$password,$dbname,$p){
			@mysql_connect($hostname,$username,$password);
			mysql_select_db($dbname);
			mysql_set_charset('utf8');
			$this->perfix=$p;
		}
		//查询总数
		public function count($tablename,$conditions="1"){
			$sql="SELECT COUNT(*) as c FROM {$this->perfix}$tablename WHERE $conditions";
			return $this->get_one($sql);
		}
		//查询数据,查询单条
		//参数$sql,需要被执行的SQL语句
		public function get_one($sql){
			$res=mysql_query($sql);
			$data=array();//先定义一个数组容器
			if($res && mysql_num_rows($res)>0){
				$data=mysql_fetch_assoc($res);
			}
			return $data;
		}
		//查询单条数据升级版
		public function select_one($tablename,$conditions="1",$filed='*'){
			$sql="SELECT $filed FROM {$this->perfix}$tablename WHERE $conditions";
			//echo $sql;die;
			return $this->get_one($sql);
		}
		//查询数据,查询多条
		//参数$sql,需要被执行的SQL语句
		public function get_all($sql){
			$res=mysql_query($sql);
			$data=array();//先定义一个数组容器
			if($res && mysql_num_rows($res)>0){
				while($arr=mysql_fetch_assoc($res)){
					$data[]=$arr;
				}
			}
			return $data;
		}
		//查询多条数据升级版
		public function select_all($tablename,$conditions="1",$filed='*'){
			$sql="SELECT $filed FROM {$this->perfix}$tablename WHERE $conditions";
			//echo $sql;die;
			return $this->get_all($sql);
		}
		//插入数据
		/*
			参数$tablename,需要执行的表名称
			参数$data,数据组合成的数组
		*/
		public function add($tablename,$data){
			$sql="INSERT INTO {$this->perfix}$tablename ";
			$sql.="(`".implode('`,`',array_keys($data))."`)VALUES";  
			$sql.="('".implode("','",$data)."')";
			return $this->insert($sql);
		}
		//执行插入SQL语句方法
		public function insert($sql){
			mysql_query($sql) or die("执行SQL失败");
			if(mysql_insert_id()>0){
				return mysql_insert_id();
			}else{
				return false;
			}
		}
		//编辑函数
		/*
			参数$tablename,需要执行的表名称
			参数$data,数据组合成的数组
			参数$conditions,条件
		*/
		public function edit($tablename,$data,$conditions){
			$sql="UPDATE {$this->perfix}$tablename SET ";
			foreach($data as $k=>$v){
				$sql.="`$k`='$v',";
			}
			$sql=rtrim($sql,',');//删掉右边的逗号
			$sql.="WHERE $conditions";
			//echo $sql;die;
			return $this->query($sql);
			
		}
		//删除功能
		/*
			参数$tablename,需要执行的表名称
			参数$conditions,条件
		*/
		public function del($tablename,$conditions){
			$sql="DELETE FROM {$this->perfix}$tablename WHERE $conditions";
			return $this->query($sql);
		}
		//执行编辑和删除的SQL语句
		public function query($sql){
			mysql_query($sql) or die("执行SQL失败");
			if(mysql_affected_rows()>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>