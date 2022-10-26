<?php
	 // //ini_set('display_errors', 'On');
	require('/home/tumundoapp/public_html/operaciones/controller/generaPDF/conexion_auto.php');

	function formulariosSinPDF(){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT idFORMULARIO 'ID', FECHA, HORA, DATE_FORMAT(NOW(), '%k:%i') 'ACTUAL'
	FROM FORMULARIO
	WHERE (PDF IS NULL OR PDF = '')
	AND FECHA = DATE_FORMAT(NOW(), '%Y-%m-%d')
	AND TIMEDIFF(DATE_FORMAT(NOW(), '%k:%i'), HORA) > '00:15:00'";
			if ($row = $con->query($sql)){
	      while($array = $row->fetch_array(MYSQLI_BOTH)){
	        $return[] = $array;
	      }
	      return $return;
	    }
	    else{
				// return mysqli_error($con);
	      return "Error";
	    }
	  }
	  else{
	    return "Error";
	  }
	}

	function consultaPracticaGuardada($id){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT A.TITULO 'TIPO_AUDITORIA', initCap(T.TITULO) 'TIPO_SERVICIO',
	F.N_TAREA, F.DIRECCION_CLIENTE, REPLACE(F.RUT_CLIENT,'.','') 'RUT_CLIENT',
	DATE_FORMAT(F.FECHA_INSTALACION, '%Y-%m-%d') 'FECHA_INSTALACION', F.RUT, F.NOMBRE, F.FECHA, F.HORA, F.NOTA,
	F.RUTPERSONAL, F.NOMBREPERSONAL
	FROM FORMULARIO F
	LEFT JOIN FORMULARIO_AUDITORIAS A
	ON F.TIPO_AUDITORIA = A.id
	LEFT JOIN FORMULARIO_TIPOSERVICIOS T
	ON F.TIPO_SERVICIO = T.id
	WHERE idFORMULARIO = '{$id}'";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_assoc()){
						$return[] = $array;
					}
					return $return;
			}
			else{
				return "Error";
			}
		}
	}

	function consultaPracticaResultadoGuardada($id){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT E.TEXTOFAMILIA
	FROM FORMULARIO_RESULTADOS F
	LEFT JOIN FORMULARIO_ESTRUCTURAS E
	ON F.idFORMULARIO_ESTRUCTURAS = E.id
	WHERE F.idFORMULARIO = '{$id}'";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_assoc()){
						$array['CATEGORIA'] = consultaPracticaResultadoGuardadaCategoria($id, $array['TEXTOFAMILIA']);
	          $return[] = $array;
					}
					return $return;
			}
			else{
				return "Error";
			}
		}
	}

	function consultaPracticaResultadoGuardadaCategoria($id, $familia){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT E.TEXTOCATEGORIA, F.OBSERVACIONES, E.CATEGORIA, E.CATEGORIA, E.TIPOAUDITORIAid, F.idFORMULARIO, E.TEXTOFAMILIA
	FROM FORMULARIO_RESULTADOS F
	LEFT JOIN FORMULARIO_ESTRUCTURAS E
	ON F.idFORMULARIO_ESTRUCTURAS = E.id
	LEFT JOIN FORMULARIO_ESTRUCTURAS FO
	ON E.CATEGORIA = FO.CATEGORIA
	AND 'files' = FO.TIPO
	AND E.TIPOAUDITORIAid = FO.TIPOAUDITORIAid
	LEFT JOIN FORMULARIO_RESULTADOS_FOTOS FOT
	ON FO.id = FOT.idFORMULARIO_ESTRUCTURAS
	WHERE F.idFORMULARIO = '{$id}'
	AND E.TEXTOFAMILIA = '{$familia}'";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_assoc()){
						$array['SUBFAMILIA1'] = consultaPracticaResultadoGuardadaSubfamlia1($id, $familia, $array['TEXTOCATEGORIA']);
						$return[] = $array;
					}
					return $return;
			}
			else{
				return "Error";
			}
		}
	}

	function consultaPracticaResultadoGuardadaSubfamlia1($id, $familia, $categoria){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT E.TEXTOSUBFAMILIA1
	FROM FORMULARIO_RESULTADOS F
	LEFT JOIN FORMULARIO_ESTRUCTURAS E
	ON F.idFORMULARIO_ESTRUCTURAS = E.id
	WHERE F.idFORMULARIO = '{$id}'
	AND E.TEXTOFAMILIA = '{$familia}'
	AND TEXTOCATEGORIA = '{$categoria}'";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_assoc()){
						$array['SUBFAMILIA2'] = consultaPracticaResultadoGuardadaSubfamlia2($id, $familia, $categoria, $array['TEXTOSUBFAMILIA1']);
						$return[] = $array;
					}
					return $return;
			}
			else{
				return "Error";
			}
		}
	}

	function consultaPracticaResultadoGuardadaSubfamlia2($id, $familia, $categoria, $subfamilia1){
		$con = conectar_auto();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT E.TEXTOSUBFAMILIA2, E.PUNTAJE
	FROM FORMULARIO_RESULTADOS F
	LEFT JOIN FORMULARIO_ESTRUCTURAS E
	ON F.idFORMULARIO_ESTRUCTURAS = E.id
	WHERE F.idFORMULARIO = '{$id}'
	AND E.TEXTOFAMILIA = '{$familia}'
	AND E.TEXTOCATEGORIA = '{$categoria}'
	AND E.TEXTOSUBFAMILIA1 = '{$subfamilia1}'";
	if ($row = $con->query($sql)){
	  while($array = $row->fetch_assoc()){
	    $return[] = $array;
	  }
	  return $return;
	}
	else{
	return "Error";
	}
	}
	}

	function actualizaPDFFormulario($id, $pdf){
		$con = conectar_auto();
		if ($con != 'No conectado') {
				$sql = "UPDATE FORMULARIO
	SET PDF = '{$pdf}'
	WHERE idFORMULARIO = '{$id}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					return $con->error;
					$con->query("ROLLBACK");

				}
	    }
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}
?>
