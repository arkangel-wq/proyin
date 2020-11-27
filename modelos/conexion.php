<?php
 class conexion{
 	static public function conectar(){
 		$link = new PDO("mysql:host=localhost;dbname=posf","root","");
 		$link ->exec("set names uto8");
 		 return $link;
 	}
 }