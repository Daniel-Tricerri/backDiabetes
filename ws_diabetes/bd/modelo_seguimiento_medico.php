<?php

	class seguimiento_medico{
			
		private $db;
		private $resultado;
		
		public function __construct(){
			require_once("Conectar.php");
			$this->db = Conect::conexion();
			$this->resultado = array();
		}

		public function get_resultado($id){
			$this->res=pg_query($this->db,"SELECT concat(nombre, ' ',apellido) as nombres, ult_visit_medico as Ultima_visita, recomendacion
			from perfil join seguimiento on perfil.id_perfil = seguimiento.fk_perfil join
			visita_medica on seguimiento.id_seguimiento = visita_medica.fk_seguimiento
			where ult_visit_medico = (select max(ult_visit_medico) from seguimiento where fk_perfil='$id')");
		
			while ($row = pg_fetch_row($this->res)) {
				$this->resultado[]=$row;
			}

			echo json_encode($this->resultado);

		}

		
		
	}



?>