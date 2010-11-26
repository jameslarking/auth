<?php
class SimpleAuthComponent extends Object{
	var $components=array("Auth", "Session");
	
	function initialize(&$controller){
		/*
		* Auth Default Config
		*/
        $controller->Auth->authorize = 'controller';
        $controller->Auth->fields = array('username' => 'email','password' => 'passwd');
        $controller->Auth->loginAction = array('plugin'=>false, 'controller' => 'users', 'action' => 'login', "admin"=>false);
        $controller->Auth->logoutRedirect = array('plugin'=>false, 'controller' => 'users', 'action' => 'login', "admin"=>false);
        $controller->Auth->loginRedirect = array('plugin'=>false, 'controller' => 'users', 'action' => 'dashboard', "admin"=>false);        
        
        if($this->isAllowed(&$controller)){
        	$controller->Auth->allow($controller->action);
        }else{
	        $controller->Auth->deny($controller->action);
        }
	}
	
	function isAllowed(&$controller){
		$role=$controller->Session->read("Auth.User.role");
		//debug($role);
		//debug($controller->action);
		//debug($controller->simpleAuth);
		if(!empty($controller->simpleAuth['public']['allow']) && in_array($controller->action, $controller->simpleAuth['public']['allow'])){
			return true;
		}
		if($controller->Session->check("Auth.User") && !empty($controller->simpleAuth['any']['allow']) && in_array($controller->action, $controller->simpleAuth['any']['allow'])){
			return true;
		}
		if(!empty($role) && !empty($controller->simpleAuth[$role]['allow']) && in_array($controller->action, $controller->simpleAuth[$role]['allow'])){
			return true;
		}
		if(!empty($controller->params['prefix']) && $role==$controller->params['prefix'] ){
			return true;
		}
	}
}
?>