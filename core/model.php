<?php

class Model{

	static $connections= array();

	public $conf ='default';
	public $table=false;
	public $db;

	public function __construct(){
		
		if($this->table === false){
			$this->table = strtolower(get_class($this));

		}

		$conf=Conf:: $databases[$this->conf];

		if(isset(Model::$connections[$this->conf])){
			$this->db=Model::$connections[$this->conf];
			return true;
		}

		try{
			$pdo= new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
			$pdo->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

			Model::$connections[$this->conf]=$pdo;
			$this->db=$pdo;
			
		}catch(PDOException $e){
			if(Conf::$debug>=1){
				die($e->getMessage());
			}else{
				die('Impossible de se connecter à la base de donnée');
			}
		
		}
		
	}
	
	
	public function login($req)
	{
		
		
		$sql='SELECT * FROM Enfants';


		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){

					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND ',$cond);
				}
			
		}
		
		//die($sql);
		$pre=$this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}

	public function update($req)
	{
		$sql="UPDATE enfants ";
		if(isset($req['values'])){
			$sql.= ' SET ';
			if(!is_array($req['values'])){

					$sql.=$req['values'];
			}else{
				$infos=array();
				foreach ($req['values'] as $key => $value) {
					$value="'".addslashes($value)."'";
					$infos[]="$key=$value";
				}
				$sql.=implode(',',$infos);

			}


		}
		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){

					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND ',$cond);
				}
			
		}
		
		$pre=$this->db->query($sql);
			
				
	}

	public function findposition($req){
		
		$sql='SELECT * FROM positions';


		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){
					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND',$cond);
				}
			
		}
		//print_r($sql);
		
		$pre=$this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);

	}

	public function findaction($req){
		
		$sql='SELECT * FROM actions';


		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){
					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND',$cond);
				}
			
		}
		
		
		$pre=$this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);

	}

	public function alert($req)
	{
		$sql ='SELECT *FROM datas';


		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){
					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND',$cond);
				}
			
		}
		
		$pre=$this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	public function updatealert($req)
	{
		$sql="UPDATE datas ";
		if(isset($req['values'])){
			$sql.= ' SET ';
			if(!is_array($req['values'])){

					$sql.=$req['values'];
			}else{
				$infos=array();
				foreach ($req['values'] as $key => $value) {
					$value="'".addslashes($value)."'";
					$infos[]="$key=$value";
				}
				$sql.=implode(',',$infos);

			}


		}
		if(isset($req['conditions'])){
			$sql.= ' WHERE ';
			
				if(!is_array($req['conditions'])){

					$sql.=$req['conditions'];
				}else{
					$cond=array();
					foreach ($req['conditions'] as $k => $v){
						if(!is_numeric($v)){
							$v='"'.addslashes($v).'"';
						}
						
						$cond[]="$k=$v";
					} 
					$sql.=implode('AND ',$cond);
				}
			
		}
		//print_r($sql);
		$pre=$this->db->query($sql);
			
				
	}


	
	







}