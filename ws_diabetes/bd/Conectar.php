<?php
	
	class Conect{
		
		public static function conexion() {
			
			$con= pg_connect("host='localhost' dbname=db_diabetes port=5432 user=postgres password=12345") or die("error de conexion".pg_last_error());
			return $con;

		}
	
	}

?>