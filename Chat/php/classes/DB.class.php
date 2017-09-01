<?php

class DB {
	private static $instance;
	private $MySQLi;
	
	private function __construct(array $dbOptions){

		$this->MySQLi = @ new mysqli(	$dbOptions['db_host'],
										$dbOptions['db_user'],
										$dbOptions['db_pass'],
										$dbOptions['db_name'] );

		if (mysqli_connect_errno()) {
			throw new Exception('Ошибка базы данных.');
		}

		$this->MySQLi->set_charset("utf8");
	}
	
	public static function init(array $dbOptions){
		if(self::$instance instanceof self){
			return false;
		}
		
		self::$instance = new self($dbOptions);
	}
	
	public static function getMySQLiObject(){
		return self::$instance->MySQLi;
	}
	
	public static function query($q){
		return self::$instance->MySQLi->query($q);
	}
	
	public static function esc($str){
		return self::$instance->MySQLi->real_escape_string(htmlspecialchars($str));
	}
	
	public static function check($username,$password){
		
	$msg = $msg = "SELECT `gravatar` FROM `webchat_users` WHERE `name` = '".$username."'";
	$user = self::$instance->MySQLi->query($msg);;
    $pw_user = mysqli_fetch_array($user);
	
	if (!empty($pw_user['gravatar'])) 
        {
			if($pw_user['gravatar'] == $password)
			{
				return 1;
			}
            else
			{
				 return 2;
			}
        }
		else
		{
			return 3;
		}
	}
}

?>