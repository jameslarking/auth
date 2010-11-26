<?php
class SimpleAuthComponent extends Object{
	var $components=array("Auth", "Session");
	
	function initialize($controller){
		/*
		* Auth Config
		*/
        $controller->Auth->fields = array('username' => 'email','password' => 'passwd');
        $controller->Auth->loginAction = array('plugin'=>false, 'controller' => 'users', 'action' => 'login', "admin"=>false);
        $controller->Auth->logoutRedirect = array('plugin'=>false, 'controller' => 'users', 'action' => 'login', "admin"=>false);
        $controller->Auth->loginRedirect = array('plugin'=>false, 'controller' => 'users', 'action' => 'dashboard', "admin"=>false);        
	}
	function startup($controller){
		/*
		* Simple Prefix Based Auth
		*/
		if(!empty($controller->params['prefix']) &&  $controller->Session->read("Auth.User.role")!=$controller->params['prefix'] ){
			$controller->Session->setFlash("You are not allowed to access that location");
			if($controller->Session->check("Auth")){
				$controller->redirect("/");
			}else{
				$controller->redirect($controller->Auth->loginAction);
			}
			exit();
		}else{
			$controller->Auth->allow($controller->action);
		}	
	}
}
?>