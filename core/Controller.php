 <?php
Class Controller{

	public $request;
	private $vars = array();
	public $layout='default';
	private $rendered=false;

	function __CONSTRUCT($request){
		$this->request=$request;
		
	}

	public function render($view){
		
		if($this->rendered){return false;}
		if(strpos($view,'/')===0){
			$view=ROOT.DS.'view'.$view.'.php';
		}else{
			$view=ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		}
		extract($this->vars);


		ob_start();
		require ($view);
		$content_for_layout=ob_get_clean();
		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		$this->rendered=true;
		

	}


	public function set($key,$value=null){
		if(is_array($key)){
			$this->vars+=$key;
		}else{
			$this->vars[$key]=$value;
		}
	}

	function loadModel($name){

		$file=ROOT.DS.'Model'.DS.$name.'.php';
		require_once($file);
		
		if(!isset($this->$name)){
			
			$this->$name= new $name();

		}
		
	}

	function e404($message){
		header("HTTP/1.0 404 Not Found");
		$this->set('message',$message);
		$this->render('/error/404');
		die();
	}

	

}
?>