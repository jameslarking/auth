<div id="loginStatus">
<?php
if (!$this->Session->check('Auth.User')) {
	echo $this->Html->link("Login",array("plugin"=>"users","controller"=>"users", "action"=>"login"));
	echo $this->Html->link("Register",array("plugin"=>"users","controller"=>"users", "action"=>"register"));
}else{
	?>
	<div>You are logged in as: <?php echo $this->Session->read("Auth.User.username");?>.
	<?php echo $this->Html->link("Logout",array("plugin"=>"users","controller"=>"users", "action"=>"logout"));?>
	</div>
	
	<?php
}
?>
</div>