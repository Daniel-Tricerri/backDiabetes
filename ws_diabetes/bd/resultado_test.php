<?php

	class resultado_test{
			
		private $db;
		private $resultado;
		
		public function __construct(){
			require_once("Conectar.php");
			$this->db = Conect::conexion();
			$this->resultado = array();
		}

		public function get_resultado($id){
			$this->res=pg_query($this->db,"SELECT concat(nombre, ' ',apellido) as nombres, fecha as fecha_test, resultado as puntaje, mensaje
			from perfil join test_findrisk on perfil.id_perfil = test_findrisk.fk_perfil
			join resultado_test on test_findrisk.id_test = resultado_test.fk_test
			where test_findrisk.fecha = (select max(fecha) from test_findrisk where fk_perfil = '$id') and test_findrisk.fk_perfil='$id'");
		
			while ($row = pg_fetch_row($this->res)) {
				$this->resultado[]=$row;
			}

			echo json_encode($this->resultado);
			

		}



		
	}



?>