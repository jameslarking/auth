<?php 
/**
 * Users CakePHP Plugin
 *
 * Copyright 2010, Cake Development Corporation
 *                 1785 E. Sahara Avenue, Suite 490-423
 *                 Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright 2010, Cake Development Corporation
 * @link      http://github.com/CakeDC/users
 * @package   plugins.users.config.schema
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class usersSchema extends CakeSchema {
	var $name = 'users';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	
	var $users = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'passwd' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'password_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'email_authenticated' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'email_token' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'email_token_expires' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'tos' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'last_login' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'last_activity' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'is_admin' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'role' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'group_id'=>array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'BY_USERNAME' => array('column' => array('username', 'passwd'), 'unique' => 0), 'BY_EMAIL' => array('column' => array('email', 'passwd'), 'unique' => 0))
	);
	
	var $groups = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);	
}
