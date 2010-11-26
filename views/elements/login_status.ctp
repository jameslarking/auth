<div id="loginStatus">
<?php
if (!$this->Session->check('Auth.User')) {
	echo $this->Html->link("Login",array("plugin"=>false,"controller"=>"users", "action"=>"login", "admin"=>false));
	echo $this->Html->link("Register",array("plugin"=>false,"controller"=>"users", "action"=>"register", "admin"=>false));
}else{
	?>
	<div>You are logged in as: <?php echo $this->Session->read("Auth.User.username");?>.
	<?php echo $this->Html->link("Logout",array("plugin"=>false,"controller"=>"users", "action"=>"logout", "admin"=>false));?>
	</div>
	
	<?php
}
?>
</div>