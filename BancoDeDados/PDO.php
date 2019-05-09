<?php

class ConexaoPDO {

	private static $pdo;

	public static function conectar(){
		try{
			self::$pdo = new PDO('mysql:host=localhost;dbname=pmd;charset=utf8','root','');		
		}catch(PDOException $e){
			die($e->getMessage());
			self::$pdo = null;
		}
		return self::$pdo;
	}
}


?>