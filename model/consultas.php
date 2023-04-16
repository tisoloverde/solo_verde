<?php
	 // ini_set('display_errors', 'On');
	require('conexion.php');

	//Login
	function consultaUsuarioConectado($rut){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
CASE WHEN TIMESTAMPDIFF(SECOND , TOKEN_WEB_TIME, NOW()) < 900 AND TOKEN_WEB IS NOT NULL AND LENGTH(TOKEN_WEB) > 1  THEN 'SI' ELSE 'NO' END 'CHECK'
FROM USUARIO
WHERE RUT = '{$rut}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function checkUsuario($rut, $pass){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT NOMBRE, RUT, IDPERFIL, ESTADO, LOGIN_2FA, TOKEN_G_AT, FIRMA_2FA
			FROM USUARIO
			WHERE RUT = '" . $rut . "' AND PASS = '" . $pass . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Refresh
	function checkUsuarioSinPass($token){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT NOMBRE, RUT, IDPERFIL, ESTADO, 'COMUN' TIPO, TOKEN_G_AT, FIRMA_2FA
FROM USUARIO
WHERE TOKEN_WEB = '{$token}'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Ingresa Token Login
	function actualizaTokenLogin($rut, $token){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE USUARIO
SET TOKEN_WEB = '{$token}',
TOKEN_WEB_TIME = NOW()
WHERE RUT = '{$rut}'";
			if ($con->query($sql)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	//Chequeo Token
	function checkToken($token){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT RUT
FROM USUARIO
WHERE TIMESTAMPDIFF(SECOND , TOKEN_WEB_TIME, NOW()) < 900
AND TOKEN_WEB  = '{$token}'
AND TOKEN_WEB <> ''";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Borra Token Login
	function borraTokenLogin($rut){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE USUARIO
SET TOKEN_WEB = NULL
WHERE RUT = '{$rut}'";
			if ($con->query($sql)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	//Areas padres
	function consultaAreasComunesPadreSolo($rut){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT PADRE, ICONOPADRE, TEXTOPADRE, ORDEN
FROM AREAWEB
WHERE NOMBRE IN
(
SELECT A.NOMBRE
FROM AREAWEB A
LEFT JOIN PERMISOS P
ON A.IDAREAWEB = P.IDAREAWEB
LEFT JOIN PERFIL  R
ON P.IDPERFIL = R.IDPERFIL
LEFT JOIN USUARIO U
ON R.IDPERFIL = U.IDPERFIL
WHERE A.TIPO = 0
AND U.RUT = '{$rut}'
)
GROUP BY PADRE, ICONOPADRE, TEXTOPADRE, ORDEN
UNION ALL
SELECT DISTINCT PADRE, ICONOPADRE, TEXTOPADRE, ORDEN
FROM AREAWEB
WHERE TIPO = 1
ORDER BY ORDEN ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaAreasComunesPadre($rut){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT PADRE, NOMBRE, TIPO, ICONO, RUTA, TEXTO, ORDEN, SUBORDEN
							FROM AREAWEB
							WHERE NOMBRE IN
							(
								SELECT A.NOMBRE
								FROM AREAWEB A
								LEFT JOIN PERMISOS P
								ON A.IDAREAWEB = P.IDAREAWEB
								LEFT JOIN PERFIL  R
								ON P.IDPERFIL = R.IDPERFIL
								LEFT JOIN USUARIO U
								ON R.IDPERFIL = U.IDPERFIL
								WHERE A.TIPO = 0
								AND U.RUT = '{$rut}'
							)
							UNION ALL
							SELECT DISTINCT PADRE, NOMBRE, TIPO, ICONO, RUTA, TEXTO, ORDEN, SUBORDEN
							FROM AREAWEB
							WHERE TIPO = 1
							AND TEXTO <> 'Firma de documentos'
							UNION ALL
							SELECT DISTINCT PADRE, NOMBRE, TIPO, ICONO, RUTA, TEXTO, ORDEN, SUBORDEN
							FROM AREAWEB
							WHERE TIPO = 1
							AND TEXTO = 'Firma de documentos'
							AND 1 IN
							(
								SELECT DISTINCT U.FIRMA_2FA
								FROM AREAWEB A
								LEFT JOIN PERMISOS P
								ON A.IDAREAWEB = P.IDAREAWEB
								LEFT JOIN PERFIL  R
								ON P.IDPERFIL = R.IDPERFIL
								LEFT JOIN USUARIO U
								ON R.IDPERFIL = U.IDPERFIL
								WHERE A.TIPO = 0
								AND U.RUT = '{$rut}'
							)
							ORDER BY ORDEN ASC, SUBORDEN ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Areas comunes
	function consultaAreasComunes(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT NOMBRE, PADRE, TIPO
	FROM AREAWEB
	WHERE TIPO = 1";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Areas comunes
	function consultaAreas(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT NOMBRE, PADRE, TIPO
	FROM AREAWEB";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Subordinados
	function consultaPersonal($rutUser){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL SUBORDINADOS('{$rutUser}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaPersonalDetalles($rut) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				P.DNI as rut,
				P.TEMPORAL as esProvisorio,
				P.EMAIL as mail,
				P.NOMBRES as nombres,
				P.APELLIDOS as apellidos,
				P.TELEFONO as fono,
				P.DOMICILIO as domicilio,
				P.IDAREAFUNCIONAL_COMUNA_NAC as comuna,
				P.CIUDAD as ciudad,
				P.FECHA_NACIMIENTO as fechaNacimiento,
				P.NACIONALIDAD as nacionalidad,
				P.SEXO as sexo,
				P.PUEBLO_ORIGINARIO as puebloOriginario,
				P.HABLA_ESPANIOL as esHispanoHablante,
				P.IDNIVEL_EDUCACIONAL as nivelEstudios,
				P.LEE as sabeLeer,
				P.ESCRIBE as sabeEscribir,
				P.POSEE_LICENCIA as tieneLicencia,
				P.IDTIPO_LICENCIA as claseLicencia,
				P.FECHA_VENCIMIENTO_LICENCIA as fechaVencimientoLicencia,
				P.IDESTADO_CIVIL as estadoCivil,
				P.CONTACTO_EMERGENCIA as nombreContactoEmergencia,
				P.TELEFONO_EMERGENCIA as fonoContactoEmergencia,
				P.TALLA_POLERA as tallaPolera,
				P.TALLA_GUANTES as tallaGuantes,
				P.TALLA_PANTALON as tallaPantalon,
				P.TALLA_ZAPATOS as tallaZapatos,
				P.TALLA_LEGIONARIO as tallaLegionario,
				P.TALLA_OVEROLL as tallaOverol,
				P.TALLA_OTROS as tallaOtros,
				P.FAMILIAR_EMPRESA as tieneFamiliarEmpresa,
				P.FAMILIAR_EMPRESA_NOMBRE as nombreFamiliarEmpresa,
				P.FAMILIAR_EMPRESA_CARGO as cargoFamiliarEmpresa,
				P.FAMILIAR_EMPRESA_PARENTESCO as parentescoFamiliarEmpresa,
				P.TRABAJO_ANTERIORMENTE as esRepitente,
				P.TRABAJO_ANTERIORMENTE_CARGO as cargoRepitente,
				P.TRABAJO_ANTERIORMENTE_RAZON_SALIDA as razonRepitente,
				SA.IDSALUD as afiliacionPrevision,
				SA.SALUD as afiliacionPrevisionNombre,
				AF.IDAFP as afiliacionSalud,
				AF.AFP as afiliacionSaludNombre,
				P.IDBANCO as banco,
				P.BANCO_TIPO_CUENTA as tipoCuenta,
				P.BANCO_CUENTA as nroCuenta,
				P.CERTIFICADOS as lstCertificados,
				P.OTROS_DOCUMENTOS as lstCertificadosOtros,
				P.CLAVE_UNICA as tieneClaveUnica,
				P.FECHA_INGRESO as fechaIngresoEmpresa,
				P.IDTIPO_CONTRATO as tipoContrato,
				P.DURACION_INICIAL_CONTRATO as duracionContrato,
				CL.CARGO as cargo,
				CGU.CODIGO as cargoGenerico,
				CS.NOMBRE as jeas,
				P.REFERENCIA1 as ref1,
				P.REFERENCIA2 as ref2,
				P.PLAZA_SECTOR as plaza,
				A.IDSUCURSAL as sucursal,
				P.IDSUBCONTRATISTAS as subcontrato,
				EO.IDESTRUCTURA_OPERACION as idCeco
			FROM PERSONAL P
			LEFT JOIN ACT A ON A.IDPERSONAL = P.IDPERSONAL
			LEFT JOIN ESTRUCTURA_OPERACION EO ON EO.IDESTRUCTURA_OPERACION = A.IDESTRUCTURA_OPERACION
			LEFT JOIN CARGO_LIQUIDACION CL ON CL.CARGO = P.CARGO
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CS ON CS.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN CARGO_GENERICO_UNIFICADO_FAMILIA CGUF ON CGUF.IDCARGO_GENERICO_UNIFICADO = CGU.IDCARGO_GENERICO_UNIFICADO
			LEFT JOIN FAMILIA F ON F.IDFAMILIA = CGUF.IDFAMILIA
			LEFT JOIN SALUD SA ON SA.IDSALUD = P.IDSALUD
			LEFT JOIN AFP AF ON AF.IDAFP = P.IDAFP
			WHERE P.DNI = '$rut'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)) {
					$return[] = $array;
				}
				return $return;
			} else{
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	//Personal interno
	function consultaPersonalInterno(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL PERSONAL_INTERNO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Destruye Token Login
	function destruyeTokenLogin($rut){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE USUARIO
SET TOKEN_WEB = NULL,
TOKEN_WEB_TIME = NULL
WHERE RUT = '{$rut}'";
			if ($con->query($sql)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	//Select mano de obra diferentes
	function consultaManoDeObraPersonalInterno(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT 'Todos' CLASIFICACION
UNION ALL
SELECT DISTINCT CLASIFICACION
FROM PERSONAL
WHERE EXTERNO = 0";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select centro de costo
	function consultaCentroCostoPersonalInterno(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT 'Todos' CENTRO_COSTO
UNION ALL
SELECT DISTINCT C.CENTRO_COSTO
FROM PERSONAL P
LEFT JOIN PERSONAL_ESTADO PE
ON P.IDPERSONAL = PE.IDPERSONAL
AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
	OR PE.FECHA_TERMINO IS NULL)
LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
LEFT JOIN ACT A
ON P.IDPERSONAL  = A.IDPERSONAL
LEFT JOIN  CENTRO_COSTO C
ON A.IDCENTRO_COSTO  = C.IDCENTRO_COSTO
WHERE P.EXTERNO = 0
AND C.CENTRO_COSTO IS NOT NULL
AND ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select estado de RRHH
	function consultaRRHHPersonalInterno(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT 'Todos' ESTADO_RRHH
UNION ALL
SELECT DISTINCT
CASE WHEN CPE.PERSONAL_ESTADO_CONCEPTO IS NULL THEN 'Vigente' ELSE CPE.PERSONAL_ESTADO_CONCEPTO END 'ESTADO_RRHH'
FROM PERSONAL P
LEFT JOIN PERSONAL_ESTADO PE
ON P.IDPERSONAL = PE.IDPERSONAL
AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
	OR PE.FECHA_TERMINO IS NULL)
AND PE.FECHA_INICIO =
(
	SELECT MAX(EE.FECHA_INICIO)
	FROM PERSONAL_ESTADO EE
	WHERE EE.IDPERSONAL = P.IDPERSONAL
	AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
)
LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
WHERE P.EXTERNO = 0
AND ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Estado Civil
	function consultaEstadoCivil(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM ESTADO_CIVIL
ORDER BY ESTADO_CIVIL";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Nacionalidad
	function consultaNacionalidad(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM NACIONALIDAD
ORDER BY NACIONALIDAD";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Area Funcional
	function consultaAreaFuncional(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDAREAFUNCIONAL, COMUNA, PROVINCIA, REGION
							FROM AREAFUNCIONAL ORDER BY COMUNA ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Nivel Estudios
	function consultaNivelEstudios(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM NIVEL_EDUCACIONAL";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Ceco
	function consultaCeco(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM CENTRO_COSTO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select contrato depto
	function consultaContratoDepto($idsubcontrato){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT S.IDSERVICIO, S.SERVICIO
FROM SERVICIO S
LEFT JOIN ESTRUCTURA_OPERACION O
ON S.IDSERVICIO = O.IDSERVICIO
WHERE O.IDSUBCONTRATO = '{$idsubcontrato}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select contrato depto
	function consultaCliente($idcontratodepto, $idsubcontrato){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT C.CLIENTE, C.IDCLIENTE
FROM CLIENTE C
LEFT JOIN ESTRUCTURA_OPERACION O
ON C.IDCLIENTE = O.IDCLIENTE
WHERE O.IDSERVICIO = '{$idcontratodepto}'
AND O.IDSUBCONTRATO = '{$idsubcontrato}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select actividad
	function consultaActividad($idcontratodepto, $idcliente, $idsubcontrato){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT CONCAT(A.ACTIVIDAD,' / ',O.NOMENCLATURA) 'ACTIVIDAD',
			CONCAT(A.IDACTIVIDAD,'¬¬',O.NOMENCLATURA) 'IDACTIVIDAD'
FROM ACTIVIDAD A
LEFT JOIN ESTRUCTURA_OPERACION O
ON A.IDACTIVIDAD = O.IDACTIVIDAD
WHERE O.IDSERVICIO = '{$idcontratodepto}'
AND O.IDCLIENTE = '{$idcliente}'
AND O.IDSUBCONTRATO = '{$idsubcontrato}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Nivel Funcional
	function consultaNivelFuncioanl(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDNIVELFUNCIONAL, NOMBRE 'NIVEL', NIVEL 'NUMERO'
FROM NIVELFUNCIONAL";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Tipo Contrato
	function consultaTipoContrato(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM TIPO_CONTRATO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Tipo licencia
	function consultaTipoLicencia(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM TIPO_LICENCIA";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaSindicato(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S, SINDICATO, DESCRIPCION, IDSINDICATO
FROM SINDICATO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select Tipo Jornada
	function consultaTipoJornada(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM TIPO_JORNADA";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select forma pago
	function consultaFormaPago(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM FORMA_PAGO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select forma pago
	function consultaBanco(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM BANCO ORDER BY BANCO ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select forma AFP
	function consultaAFP(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDAFP, AFP
FROM AFP";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select forma AFP Porcentaje
	function consultaAFPPorcentaje($afp){
		$con = conectar_api();
		if($con != 'No conectado'){
			$sql = "SELECT TASA, SIS
FROM AFP
WHERE FECHA =
(
	SELECT MAX(FECHA)
	FROM AFP
)
AND AFP = '{$afp}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Select forma AFP
	function consultaSalud(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDSALUD, SALUD
FROM SALUD";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaUsuarios(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, U.RUT, U.NOMBRE, U.EMAIL,U.ESTADO, P.NOMBRE 'PERFIL'
FROM USUARIO U, PERFIL P
WHERE U.IDPERFIL = P.IDPERFIL";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function chequeaUsuario($rutUsuario){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDUSUARIO
FROM USUARIO
WHERE RUT = '" . $rutUsuario . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

function consultaPerfilTipos(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
FROM PERFIL
ORDER BY NOMBRE";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
}

function ingresaUsuario( $rutIngreso, $apellidos, $nombres, $email,$pass,$perfilUsuario){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO USUARIO(NOMBRE,EMAIL,RUT,PASS,ESTADO,IDPERFIL)
	VALUES ( '" .$nombres ."',
	'" . $email . "', '" . $rutIngreso . "',
	'" . $pass . "',
	'Activo','" . $perfilUsuario . "')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function desactivarUsuario($rutUsuario){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE USUARIO
SET ESTADO = 'Desactivado'
WHERE RUT  = '" . $rutUsuario . "'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
			  return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function editarUsuario( $rutEditar, $nombre, $email, $estado, $perfilUsuario){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE USUARIO
	SET RUT = '" . $rutEditar . "',
	NOMBRE = '" .$nombre . "',
	EMAIL = '" .$email . "',
	ESTADO = '" .$estado . "',
	IDPERFIL = '" .$perfilUsuario . "'
	WHERE RUT = '" . $rutEditar . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
		}
		else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
	function checkComponenteRemuneracion($concepto){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
						count(1) as existe
					FROM COMPONENTE_SUELDO
					WHERE upper(CONCEPTO) = upper('$concepto')";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
    function ingresarComponenteRemuneracion($concepto, $tipo, $liquidacion, $orden){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "INSERT INTO COMPONENTE_SUELDO
                        (CONCEPTO, IDTIPO_COMPONENTE_SUELDO, LIQUIDACION,ORDEN)
                    VALUES('$concepto', '$tipo', '$liquidacion', $orden)";
            if($con->query($sql)){
                return "Ok";
            }else{
                // return $con->error;
								return "Error";
								// return $sql;
            }
        }else{
            return "Error";
        }
    }
    function consultaComponenteRemuneracion(){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "SELECT '' S,
                        CS.IDCOMPONENTE_SUELDO,
                        CS.CONCEPTO,
                        TCS.TIPO_COMPONENTE_SUELDO as TIPO,
                        CS.LIQUIDACION,
                        CS.ORDEN
                    FROM COMPONENTE_SUELDO CS
                    INNER JOIN TIPO_COMPONENTE_SUELDO TCS ON CS.IDTIPO_COMPONENTE_SUELDO = TCS.IDTIPO_COMPONENTE_SUELDO
                    GROUP BY CS.IDCOMPONENTE_SUELDO, CS.CONCEPTO, TCS.TIPO_COMPONENTE_SUELDO, CS.LIQUIDACION, CS.ORDEN";
            if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
    }
    function editarComponenteRemuneracion($idComponenteRemuneracion, $concepto, $tipo, $liquidacion, $orden){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "UPDATE COMPONENTE_SUELDO
                    SET
                        CONCEPTO = '$concepto',
                        IDTIPO_COMPONENTE_SUELDO = '$tipo',
                        LIQUIDACION = '$liquidacion',
                        ORDEN = $orden
                    WHERE IDCOMPONENTE_SUELDO = $idComponenteRemuneracion";
            if($con->query($sql)){
                $con->query("COMMIT");
                return "Ok";
            }else{
                $con->query("ROLLBACK");
                // return $con->error;
								return "Error";
            }
        }else{
            $con->query("ROLLBACK");
            return "Error";
        }
    }
    function eliminarComponenteRemuneracion($idComponenteRemuneracion){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "DELETE FROM COMPONENTE_SUELDO WHERE IDCOMPONENTE_SUELDO = $idComponenteRemuneracion";
            if($con->query($sql)){
                $con->query("COMMIT");
                return "Ok";
            }else{
                $con->query("ROLLBACK");
                // return $con->error;
								return "Error";
            }
        }else{
            $con->query("ROLLBACK");
            return "Error";
        }
	}
	function checkSindicato($sindicato){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							count(1) as existe
						FROM SINDICATO
						WHERE upper(SINDICATO) = upper('$sindicato')";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
	}
    function ingresarSindicato($sindicato, $descripcion){
        $con = conectar();
        if ($con != 'No conectado') {
            $sql = "INSERT INTO SINDICATO
                    (SINDICATO,DESCRIPCION)
                    VALUES('$sindicato', '$descripcion')";
            if($con->query($sql)){
                return "Ok";
            }else{
                // return $con->error;
								return "Error";
            }
        }else{
            return "Error";
        }
    }
    function editarSindicato($idSindicato, $sindicato, $descripcion){
        $con = conectar();
        if($con != 'No Conectado'){
            $sql = "UPDATE SINDICATO
                    SET
                        SINDICATO = '$sindicato',
                        DESCRIPCION = '$descripcion'
                    WHERE IDSINDICATO = $idSindicato";
            if($con->query($sql)){
                $con->query("COMMIT");
                return "Ok";
            }else{
                $con->query("ROLLBACK");
                // return $con->error;
								return "Error";
            }
        }else{
            $con->query("ROLLBACK");
            return "Error";
        }
    }
    function eliminarSindicato($idSindicato){
        $con = conectar();
        if($con != 'No Conectado'){
            $sql = "DELETE FROM SINDICATO WHERE IDSINDICATO = $idSindicato";
            if($con->query($sql)){
                $con->query("COMMIT");
                return "Ok";
            }else{
                $con->query("ROLLBACK");
                // return $con->error;
								return "Error";
            }
        }else{
            $con->query("ROLLBACK");
            return "Error";
        }
    }
    function consultaTipoComponenteRemuneracion(){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "SELECT *
                    FROM TIPO_COMPONENTE_SUELDO CS
										ORDER BY CS.ORDEN ASC";
            if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
    }

		function actualizaPass($rut, $pass){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE USUARIO
SET PASS = '" . $pass . "'
WHERE RUT  = '" . $rut . "'";
			if ($con->query($sql)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

		//Listado Perfiles
		function consultaListadoPerfiles(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S , P.NOMBRE, P.IDPERFIL, COUNT(X.IDPERFIL) AS 'NRO_PERMISOS', CASE WHEN (COUNT(X.IDPERFIL)) > 0 THEN 'Asignado' ELSE 'Sin asignar' END 'ASIGNACION', P.DESCRIPCION, INFOR_DISP, INFOR_META
FROM PERFIL P LEFT JOIN USUARIO X
ON P.IDPERFIL = X.IDPERFIL
GROUP BY P.NOMBRE, X.IDPERFIL, P.IDPERFIL
ORDER BY P.NOMBRE ASC";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresarPerfil($nombre, $descripcion, $informeDisponibilidad, $informeMetas){
			$con = conectar();
			if ($con != 'No conectado') {
					$sql = "INSERT INTO PERFIL
									(NOMBRE, DESCRIPCION, INFOR_DISP, INFOR_META)
									VALUES('{$nombre}','{$descripcion}','{$informeDisponibilidad}','{$informeMetas}')";
					if($con->query($sql)){
							return "Ok";
					}else{
							// return $con->error;
							return "Error";
					}
			}else{
					return "Error";
			}
	}

	function editarPerfil( $nombre, $idPerfil, $descripcion, $informeDisponibilidad, $informeMetas){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE PERFIL
	SET NOMBRE = '" . $nombre . "',
	DESCRIPCION = '" . $descripcion . "', INFOR_DISP = '" . $informeDisponibilidad . "', INFOR_META = '" . $informeMetas . "'
	WHERE IDPERFIL = '" . $idPerfil . "'";
	if ($con->query($sql)) {
		$con->query("COMMIT");
		return "Ok";
	}
	else{
		// return $con->error;
		$con->query("ROLLBACK");
		return "Error";
	}
	}
	else{
	$con->query("ROLLBACK");
	return "Error";
	}
	}

	//Listado áreas perfiles
	function consultaListadoAreasPerfiles($idPerfil){
$con = conectar();
if($con != 'No conectado'){
	$sql = "SELECT '' S , A.IDAREAWEB, X.IDPERMISOS, A.TEXTO, A.TEXTOPADRE,
CASE WHEN X.TODOS = 1 THEN 'TODOS' ELSE CASE WHEN X.JEFATURA = 1 THEN 'JEFATURA' ELSE 'PERSONALIZADO' END END'TIPO_PERMISO',
A.BASICO, X.FILTRO
FROM PERFIL P LEFT JOIN PERMISOS X
ON P.IDPERFIL = X.IDPERFIL
LEFT JOIN AREAWEB A
ON X.IDAREAWEB = A.IDAREAWEB
WHERE P.IDPERFIL = '" . $idPerfil . "'
AND X.IDPERFIL IS NOT NULL
ORDER BY A.ORDEN, A.SUBORDEN";
	if ($row = $con->query($sql)){
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
	}
	else{
		return "Error";
	}
}
else{
	return "Error";
}
}

function consultaPass($rut, $passNuevo){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT COUNT(PASS) 'Q'
FROM USUARIO
WHERE RUT = '" . $rut . "'
AND PASS = '" . $passNuevo . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}else{
                // return $con->error;
								return "Error";
            }
		}else{
			return "Error";
		}
	}
	function ingresarCentroCosto($centroCosto){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO CENTRO_COSTO (CENTRO_COSTO)
					VALUES('$centroCosto')";
			if($con->query($sql)){
                return "Ok";
            }else{
                // return $con->error;
								return "Error";
            }
		}else{
			return "Error";
		}
	}
	function checkServicio($servicio){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
						COUNT(1) as existe
					FROM SERVICIO
					WHERE upper(SERVICIO) = upper('$servicio')";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
	function ingresarServicio($servicio){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO SERVICIO (SERVICIO)
					VALUES('$servicio')";
			if($con->query($sql)){
				$msg = "Ok";
				$id = $con->insert_id;
				$array = array();
				$array["msg"] = $msg;
				$array["idServicio"] = $id;
				return $array;
			}else{
				// return $con->error;
				return "Error";
			}
		}else{
			return "Error";
		}
	}
	function checkCliente($cliente){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
						COUNT(1) as existe
					FROM CLIENTE
					WHERE upper(CLIENTE) = upper('$cliente')";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
	function ingresarCliente($cliente){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO CLIENTE (CLIENTE) VALUES ('$cliente')";
			if($con->query($sql)){
				$msg = "Ok";
				$id = $con->insert_id;
				$array = array();
				$array["msg"] = $msg;
				$array["idCliente"] = $id;
				return $array;
			}else{
				// return $con->error;
				return "Error";
			}
		}else{
			return "Error";
		}
	}
	function checkActividad($actividad){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
						COUNT(1) as existe
					FROM ACTIVIDAD
					WHERE upper(ACTIVIDAD) = upper('$actividad')";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
	function ingresarActividad($actividad){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO ACTIVIDAD (ACTIVIDAD)
					VALUES ('$actividad')";
			if($con->query($sql)){
				$msg = "Ok";
				$id = $con->insert_id;
				$array = array();
				$array["msg"] = $msg;
				$array["idActividad"] = $id;
				return $array;
			}else{
				// return $con->error;
				return "Error";
			}
		}else{
			return "Error";
		}
	}
	function checkEstructuraOperacion($idCliente, $idServicio, $idActividad, $nomenclatura, $idsubcontratista){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
						COUNT(1) as existe
					FROM ESTRUCTURA_OPERACION
					WHERE IDCLIENTE = $idCliente
					AND IDSERVICIO = $idServicio
					AND IDACTIVIDAD = $idActividad
					AND NOMENCLATURA = '$nomenclatura'
					AND IDSUBCONTRATO = '$idsubcontratista'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
	function ingresarEstructuraOperacion($idCliente, $idServicio, $idActividad, $nomenclatura, $idsubcontratista, $nombre, $idarea, $rutUsuario){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO ESTRUCTURA_OPERACION
						(IDCLIENTE, IDSERVICIO, IDACTIVIDAD, NOMENCLATURA, IDSUBCONTRATO, NOMBRE, IDAREA, FECHA, USUARIO)
					VALUES
						($idCliente, $idServicio, $idActividad, '$nomenclatura', $idsubcontratista, '$nombre', $idarea, NOW(), '$rutUsuario')";
			if($con->query($sql)){
				return "Ok";
			}else{
				// return $con->error;
				return "Error";
			}
		}else{
			return "Error";
		}
	}
	function consultaEstructuraOperacion(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
							'' S,
							EO.IDESTRUCTURA_OPERACION 'FOLIO',
							EO.DEFINICION 'PEP_PADRE',
							EO.NOMENCLATURA 'PEP',
							EO.COD_CRM,
							EO.NOMBRE_PADRE,
							EO.NOMBRE,
							SUBSTRING_INDEX(SU.NOMBRE_SUBCONTRATO,' - ',1) 'COD_SOCIEDAD',
							SUBSTRING_INDEX(SU.NOMBRE_SUBCONTRATO,' - ',-1) 'NOM_SOCIEDAD',
							CONCAT_WS(' ', PC.NOMBRES, PC.APELLIDOS) 'CONTROLLER',
							CONCAT_WS(' ', PG.NOMBRES, PG.APELLIDOS) 'GERENTE',
							CONCAT_WS(' ', PS.NOMBRES, PS.APELLIDOS) 'SUBGERENTE',
							CONCAT_WS(' ', PA.NOMBRES, PA.APELLIDOS) 'ADMIN_CONTRATO',
							S.GERENCIA 'GERENCIA',
							S.SERVICIO 'SUBGERENCIA',
							C.CLIENTE,
							C.SUB_CLIENTE,
							EO.FECHA_INICIO_CONTRATO,
							EO.FECHA_FIN_CONTRATO,
							EO.FECHA_INICIO_OPERACION,
							EO.FECHA_FIN_OPERACION,
							EOE.ESTADO,
							COUNT(P.IDPERSONAL) 'Q_PERSONAL'
							FROM ESTRUCTURA_OPERACION EO
							LEFT JOIN CLIENTE C
							ON EO.IDCLIENTE = C.IDCLIENTE
							LEFT JOIN SERVICIO S
							ON EO.IDSERVICIO = S.IDSERVICIO
							LEFT JOIN SUBCONTRATISTAS SU
							ON EO.IDSUBCONTRATO = SU.IDSUBCONTRATO
							LEFT JOIN AREA AR
							ON EO.IDAREA = AR.IDAREA
							LEFT JOIN PERSONAL PC
							ON EO.IDCONTROLLER = PC.IDPERSONAL
							LEFT JOIN PERSONAL PG
							ON S.IDGERENTE = PG.IDPERSONAL
							LEFT JOIN PERSONAL PS
							ON S.IDSUBGERENTE = PS.IDPERSONAL
							LEFT JOIN PERSONAL PA
							ON EO.IDADMINCONTRATO = PA.IDPERSONAL
							LEFT JOIN ESTRUCTURA_OPERACION_ESTADO EOE
							ON EO.IDESTADO = EOE.IDESTRUCTURA_OPERACION_ESTADO
							LEFT JOIN ACT A
							ON EO.IDESTRUCTURA_OPERACION = A.IDESTRUCTURA_OPERACION
							LEFT JOIN PERSONAL P
							ON A.IDPERSONAL = P.IDPERSONAL
							LEFT JOIN PERSONAL_ESTADO PE
							ON P.IDPERSONAL = PE.IDPERSONAL
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
							OR PE.FECHA_TERMINO IS NULL)
							AND PE.FECHA_INICIO =
							(
								SELECT MAX(EE.FECHA_INICIO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
							ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
							WHERE ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
							AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
							OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)
							GROUP BY
							EO.IDESTRUCTURA_OPERACION,
							SUBSTRING_INDEX(EO.NOMENCLATURA,'/',1),
							EO.NOMENCLATURA,
							EO.COD_CRM,
							EO.NOMBRE_PADRE,
							EO.NOMBRE,
							SUBSTRING_INDEX(SU.NOMBRE_SUBCONTRATO,' - ',1),
							SUBSTRING_INDEX(SU.NOMBRE_SUBCONTRATO,' - ',-1),
							CONCAT_WS(' ', PC.NOMBRES, PC.APELLIDOS),
							CONCAT_WS(' ', PG.NOMBRES, PG.APELLIDOS),
							CONCAT_WS(' ', PS.NOMBRES, PS.APELLIDOS),
							CONCAT_WS(' ', PA.NOMBRES, PA.APELLIDOS),
							S.GERENCIA,
							S.SERVICIO,
							C.CLIENTE,
							C.SUB_CLIENTE,
							EO.FECHA_INICIO_CONTRATO,
							EO.FECHA_FIN_CONTRATO,
							EO.FECHA_INICIO_OPERACION,
							EO.FECHA_FIN_OPERACION,
							EOE.ESTADO
							ORDER BY COUNT(P.IDPERSONAL) DESC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Tarjetas de Combustible
	function consultaTarjetasCombustible($rut,$pat){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL TARJETAS_COMBUSTIBLE('{$rut}','{$pat}')";
			if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    }
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function chequeaEmail($email){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDUSUARIO
	FROM USUARIO
	WHERE EMAIL = '" . $email . "'";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function chequeaPerfil($nombrePerfil){
				$con = conectar();
				if($con != 'No conectado'){
					$sql = "SELECT IDPERFIL
		FROM PERFIL
		WHERE NOMBRE LIKE '%" . $nombrePerfil . "%'";
					if ($row = $con->query($sql)) {

						$array = $row->fetch_array(MYSQLI_BOTH);

						return $array;
					}
					else{
						return "Error";
					}
				}
				else{
					return "Error";
				}
			}
		function consultaServicioSelect(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							IDSERVICIO,
							SERVICIO
						FROM SERVICIO";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    		}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}
		function consultaClienteSelect(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							*
						FROM CLIENTE";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    		}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}
		function consultaActividadSelect(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							IDACTIVIDAD,
							ACTIVIDAD
						FROM ACTIVIDAD";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    		}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}
		function consultaAreaSelect(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							*
						FROM AREA";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    		}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}
		function consultaNomenclaturaByServicioCliente($idServicio, $idCliente, $idActividad, $idSociedad){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							NOMENCLATURA, NOMBRE
						FROM ESTRUCTURA_OPERACION
						where IDSERVICIO = $idServicio
						AND IDCLIENTE = $idCliente
						AND IDACTIVIDAD = $idActividad
						AND IDSUBCONTRATO = $idSociedad";
				if ($row = $con->query($sql)) {
					$array = $row->fetch_array(MYSQLI_BOTH);
					return $array;
				}
				else{
					return "Sin datos";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarDisponibilidad($rut, $rutUsuario){
				$con = conectar();
				$con->query("START TRANSACTION");
				if($con != 'No conectado'){
					$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
					SELECT P.IDPERSONAL, C.IDPERSONAL_ESTADO_CONCEPTO_OPER,
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%Y-%m-%d'),
'Presente', '{$rutUsuario}'
FROM PERSONAL P, PERSONAL_ESTADO_CONCEPTO_OPER C
WHERE P.DNI = '{$rut}'
AND C.PERSONAL_ESTADO_CONCEPTO_OPER = 'Presente'";
					if ($con->query($sql)) {
						$con->query("COMMIT");
						return "Ok";
					}
					else{
						// return $con->error;
						$con->query("ROLLBACK");
						return "Error";
					}
				}
				else{
					$con->query("ROLLBACK");
					return "Error";
				}
		}

		function consultaAreasPerfil($idPerfil){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT DISTINCT A.IDAREAWEB, A.TEXTO, A.TEXTOPADRE, CONCAT_WS(' / ', A.TEXTOPADRE ,A.TEXTO) AS AREA, A.ORDEN ,A.SUBORDEN
FROM AREAWEB A
WHERE A.TEXTOPADRE <> 'Cuenta'
ORDER BY A.ORDEN, A.SUBORDEN";
				if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
				return "Error";
				}
			}
			else{
			return "Error";
			}
		}

		function consultaAreasPerfilAsignadas($idPerfil){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT DISTINCT A.IDAREAWEB, A.TEXTO, A.TEXTOPADRE, CONCAT_WS(' / ', A.TEXTOPADRE ,A.TEXTO) AS AREA, A.ORDEN ,A.SUBORDEN
				FROM PERFIL P LEFT JOIN PERMISOS X
				ON P.IDPERFIL = X.IDPERFIL
				LEFT JOIN AREAWEB A
				ON X.IDAREAWEB = A.IDAREAWEB
				WHERE X.IDAREAWEB IN (SELECT IDAREAWEB FROM PERMISOS WHERE IDPERFIL = '$idPerfil')
				AND X.IDPERFIL IS NOT NULL
				ORDER BY A.ORDEN, A.SUBORDEN";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}

						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
			return "Error";
			}
		}

		function ingresaAreaMultiSel($idPerfil, $idArea){
			$con = conectar();
			if ($con != 'No conectado') {
					$sql = "CALL INGRESA_AREA_PERFIL('$idPerfil','$idArea')";
					if($con->query($sql)){
							return "Ok";
					}else{
							// return $con->error;
							return "Error";
					}
			}else{
					return "Error";
			}
		}

		//Multiselect Proyectos  Permisos
		function consultaProyectos($idAreaWeb, $idPerfil){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT  DISTINCT E.IDESTRUCTURA_OPERACION 'ID_ESTRUCTURA', CONCAT(E.NOMENCLATURA, ' - CECO: ', E.DEFINICION) AS PROYECTO, AE.IDESTRUCTURA_OPERACION
FROM ESTRUCTURA_OPERACION E LEFT JOIN CLIENTE C
ON E.IDCLIENTE = C.IDCLIENTE
LEFT JOIN SERVICIO S
ON E.IDSERVICIO = S.IDSERVICIO
LEFT JOIN PERMISOS_AE AE
ON E.IDESTRUCTURA_OPERACION = AE.IDESTRUCTURA_OPERACION
AND AE.IDAREAWEB = '{$idAreaWeb}'
AND AE.IDPERFIL = '{$idPerfil}'
WHERE E.HABILITADO = 1
AND E.NOMENCLATURA NOT IN (
	'CASA MATRIZ',
	'Gerencia General',
	'Gerencia Operaciones',
	'Administracion y Finanzas',
	'Gerencia Comercial',
	'PROPUESTAS'
)
ORDER BY PROYECTO ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}

						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		//Multiselect Area Funcional Permisos
		function consultaAreaFuncionalPermisos($idAreaWeb, $idPerfil){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT DISTINCT A.IDAREAFUNCIONAL, A.COMUNA, A.PROVINCIA, A.REGION,
				CASE WHEN AE.IDPERMISOS_AE IS NOT NULL THEN 1 ELSE NULL END 'IDPERMISOS_AE'
FROM AREAFUNCIONAL A
LEFT JOIN PERMISOS_AE AE
ON A.IDAREAFUNCIONAL = AE.IDAREAFUNCIONAL
AND AE.IDAREAWEB = '{$idAreaWeb}'
AND AE.IDPERFIL = '{$idPerfil}'
ORDER BY COMUNA";
				if ($row = $con->query($sql)) {
					$return = array();
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaEstadosOper(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT PERSONAL_ESTADO_CONCEPTO_OPER 'ESTADO', IDPERSONAL_ESTADO_CONCEPTO_OPER 'ID'
FROM PERSONAL_ESTADO_CONCEPTO_OPER
WHERE PERSONAL_ESTADO_CONCEPTO_OPER NOT LIKE '%Presente%'";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
	    		}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarAusencia($rut, $idtipo, $finicio, $ffin, $observacion, $rutUsuario){
				$con = conectar();
				$con->query("START TRANSACTION");
				if($con != 'No conectado'){
					$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
					SELECT P.IDPERSONAL, '{$idtipo}',
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
'{$finicio}', '{$ffin}',
'{$observacion}', '{$rutUsuario}'
FROM PERSONAL P
WHERE P.DNI = '{$rut}'";
					if ($con->query($sql)) {
						$con->query("COMMIT");
						return "Ok";
					}
					else{
						// return $con->error;
						$con->query("ROLLBACK");
						return "Error";
					}
				}
				else{
					$con->query("ROLLBACK");
					return "Error";
				}
		}

		function ingresarAusenciaDesvinculado($rut, $idtipo, $finicio, $observacion, $rutUsuario){
				$con = conectar();
				$con->query("START TRANSACTION");
				if($con != 'No conectado'){
					$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
					SELECT P.IDPERSONAL, '{$idtipo}',
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
'{$finicio}', NULL,
'{$observacion}', '{$rutUsuario}'
FROM PERSONAL P
WHERE P.DNI = '{$rut}'";
					if ($con->query($sql)) {
						$con->query("COMMIT");
						return "Ok";
					}
					else{
						// return $con->error;
						$con->query("ROLLBACK");
						return "Error";
					}
				}
				else{
					$con->query("ROLLBACK");
					return "Error";
				}
		}

		function consultaPersonalModificado($rutUser, $rutTxt, $delimitador){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL SUBORDINADOS_CAMBIO('{$rutUser}','{$rutTxt}','{$delimitador}')";
				if ($row = $con->query($sql)) {
					$return = array();
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresaAreaFuncionalMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional){
			$con = conectar();
			if ($con != 'No conectado') {
					$sql = "INSERT INTO PERMISOS_AE
									(IDAREAWEB, IDPERFIL, IDAREAFUNCIONAL)
									VALUES($idAreaWeb,'$idPerfil','$idAreaFuncional')";
					if($con->query($sql)){
							return "Ok";
					}else{
							// return $con->error;
							return "Error";
					}
			}else{
					return "Error";
			}
		}

		function ingresaProyectosMultiSel($idAreaWeb, $idPerfil, $idEstructura){
			$con = conectar();
			if ($con != 'No conectado') {
					$sql = "INSERT INTO PERMISOS_AE
									(IDAREAWEB, IDPERFIL, IDESTRUCTURA_OPERACION)
									VALUES($idAreaWeb,'$idPerfil','$idEstructura')";
					if($con->query($sql)){
							return "Ok";
					}else{
							// return $con->error;
							return "Error";
					}
			}else{
					return "Error";
			}
		}

	function ingresaPermisosMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional,$idProyecto){
		$con = conectar();
		if ($con != 'No conectado') {
				$sql = "INSERT INTO PERMISOS_AE
								(IDAREAWEB, IDPERFIL, IDAREAFUNCIONAL,IDESTRUCTURA_OPERACION)
								VALUES('$idAreaWeb','$idPerfil','$idAreaFuncional','$idProyecto')";
				if($con->query($sql)){
						return "Ok";
				}else{
						// return $con->error;
						return "Error";
				}
		}else{
				return "Error";
		}
}

	function ingresarPermisoPorJefatura($idPerfil, $idArea, $jefatura, $filtro){
		$con = conectar();
		if ($con != 'No conectado') {
				$sql = "UPDATE PERMISOS
					SET JEFATURA = 1, TODOS = NULL, FILTRO = '{$filtro}'
					WHERE IDPERFIL = '$idPerfil' AND IDAREAWEB = '$idArea'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}

	function ingresarPermisoTodos($idPerfil, $idArea, $jefatura, $filtro){
				$con = conectar();
				if ($con != 'No conectado') {
						$sql = "UPDATE PERMISOS
										SET JEFATURA = NULL, TODOS = 1, FILTRO = '{$filtro}'
										WHERE IDPERFIL = '$idPerfil' AND IDAREAWEB = '$idArea'";
						if ($con->query($sql)) {
							$con->query("COMMIT");
							return "Ok";
						}
						else{
							// return $con->error;
							$con->query("ROLLBACK");
							return "Error";
						}
					}
					else{
						$con->query("ROLLBACK");
						return "Error";
					}
		}

		function borrarPermisosMultiselect($idPerfil, $idArea){
				$con = conectar();
				if ($con != 'No conectado') {
						$sql = "DELETE FROM PERMISOS_AE
						WHERE IDPERFIL = '$idPerfil' AND IDAREAWEB = '$idArea'";
						if ($con->query($sql)) {
							$con->query("COMMIT");
							return "Ok";
						}
						else{
							// return $con->error;
							$con->query("ROLLBACK");
							return "Error";
						}
					}
					else{
						$con->query("ROLLBACK");
						return "Error";
					}
		}

		function borrarPermisosJefaturaTodos($idPerfil, $idArea){
				$con = conectar();
				if ($con != 'No conectado') {
						$sql = "UPDATE PERMISOS
						SET TODOS = NULL, JEFATURA = NULL
						WHERE IDPERFIL = '$idPerfil' AND IDAREAWEB = '$idArea'";
						if ($con->query($sql)) {
							$con->query("COMMIT");
							return "Ok";
						}
						else{
							// return $con->error;
							$con->query("ROLLBACK");
							return "Error";
						}
					}
					else{
						$con->query("ROLLBACK");
						return "Error";
					}
		}

		function borrarAreaPermisoPerfil($idPerfil, $idArea){
				$con = conectar();
				if ($con != 'No conectado') {
						$sql = "DELETE FROM PERMISOS
						WHERE IDPERFIL = '{$idPerfil}'
						AND IDAREAWEB = '{$idArea}'";
						if ($con->query($sql)) {
							$con->query("COMMIT");
							return "Ok";
						}
						else{
							// return $con->error;
							$con->query("ROLLBACK");
							return "Error";
						}
					}
					else{
						$con->query("ROLLBACK");
						return "Error";
					}
		}

	function imagenLogin($url){
		$con = conectar_api();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "CALL LOGOLOGIN('{$url}')";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

  function listadoPersonalYJefaturas() {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "SELECT * FROM LISTADOJEFATURAS_VIEW;";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

	function listadoPersonalYJefaturasExcel($search) {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "SELECT * FROM LISTADOJEFATURAS_VIEW";

			/* BEGIN */
			$where_condition = $sqlTot = $sqlRec = "";
			$searchData = explode(' ', $search);
			for($i = 0; $i < count($searchData); $i++){
				if($i == 0 && ($i + 1) == count($searchData)){
					$where_condition .=	" WHERE ";
					$where_condition .= "( DNI LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMPRESA LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMBRES  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR APELLIDOS  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CARGO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMAIL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR TELEFONO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR JEFE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CONTACTO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR COMUNA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR REGION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR PATENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NIVEL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR AFP  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SALUD  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CODIGO_CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR FECHA_INGRESO LIKE '%".$searchData[$i]."%' )";
				} else if($i == 0){
					$where_condition .=	" WHERE ";
					$where_condition .= "( DNI LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMPRESA LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMBRES  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR APELLIDOS  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CARGO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMAIL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR TELEFONO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR JEFE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CONTACTO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR COMUNA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR REGION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR PATENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NIVEL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR AFP  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SALUD  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CODIGO_CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR FECHA_INGRESO LIKE '%".$searchData[$i]."%' ) AND";
				} else {
					$where_condition .= "(DNI LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMPRESA LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMBRES  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR APELLIDOS  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CARGO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR EMAIL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR TELEFONO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR JEFE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CONTACTO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR COMUNA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR REGION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR PATENTE  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NIVEL  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR NOMENCLATURA_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR DENOMINACION_AGRUPADA  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR AFP  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR SALUD  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CODIGO_CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR CECO  LIKE '%".$searchData[$i]."%' ";
					$where_condition .= "OR FECHA_INGRESO LIKE '%".$searchData[$i]."%' )";
				}
			}
			/* END */

			$sql .= $where_condition;

      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

	function listadoPersonalYJefaturas_Cambio($personal) {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "CALL LISTADOJEFATURAS_CAMBIO('{$personal}', ',')";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

  function listadoPersonal_Cambio($personal) {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "CALL LISTADOPERSONAL_CAMBIO('{$personal}', ',')";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

  function listarJefes() {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "
        select
          IDUSUARIO,
          RUT as 'RUTJEFEDIRECTO',
          NOMBRE as 'JEFE',
          EMAIL
        from USUARIO
				WHERE ESTADO <> 'Desactivado';
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

  function actualizarJefe($rutNuevoJefe, $strlstPersonal) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "
        update PERSONAL
        set RUTJEFEDIRECTO = '". $rutNuevoJefe . "',
				IDESTADO_SOLICITUD = '1'
        where IDPERSONAL in (" . $strlstPersonal . ");
      ";
			if ($con->query($sql)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function transferirJefe($strlstPersonal, $rutNuevoJefe) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql1 = "
        update PERSONAL set RUT_EMISOR = RUTJEFEDIRECTO where DNI in (" . $strlstPersonal . ");
      ";
      $sql2 = "
        update PERSONAL
        set RUTJEFEDIRECTO = '". $rutNuevoJefe . "',
        IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Transferido')
        where DNI in (" . $strlstPersonal . ");
      ";
			if ($con->query($sql1) && $con->query($sql2)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function aceptarTransferencia($dniPersonal) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "select
        P.IDPERSONAL,
        P.DNI,
				P.RUTJEFEDIRECTO,
        U.NOMBRE 'NUEVOJEFE',
        U.EMAIL 'EMAILNUEVOJEFE',
        concat(P.NOMBRES, ', ', P.APELLIDOS) 'PERSONAL',
        concat(P2.NOMBRES, ' ,', P2.APELLIDOS) 'ANTIGUOJEFE',
				U2.RUT 'RUTANTIGUOJEFE',
        U2.EMAIL 'EMAILANTIGUOJEFE'
      from PERSONAL P
      left join PERSONAL P2 on P2.DNI = P.RUT_EMISOR
			left join USUARIO U2 on P2.DNI = U2.RUT
      left join USUARIO U on U.RUT = P.RUTJEFEDIRECTO
      where P.DNI = '" . $dniPersonal . "';
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        $sql = "
          update PERSONAL
          set IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Asignado'),
					RUT_EMISOR = NULL
          where DNI = '" . $dniPersonal . "';
        ";
        if($con->query($sql)) {
          $con->query("COMMIT");
          return $return;
        } else {
          return "Error";
        }
			} else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function rechazarTransferencia($dniPersonal) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
      $sql = "select
        P.IDPERSONAL,
        P.DNI,
				P.RUTJEFEDIRECTO,
        U.NOMBRE 'NUEVOJEFE',
        U.EMAIL 'EMAILNUEVOJEFE',
        concat(P.NOMBRES, ', ', P.APELLIDOS) 'PERSONAL',
        concat(P2.NOMBRES, ' ,', P2.APELLIDOS) 'ANTIGUOJEFE',
        U2.RUT 'RUTANTIGUOJEFE',
        U2.EMAIL 'EMAILANTIGUOJEFE'
      from PERSONAL P
      left join PERSONAL P2 on P2.DNI = P.RUT_EMISOR
			left join USUARIO U2 on P2.DNI = U2.RUT
      left join USUARIO U on U.RUT = P.RUTJEFEDIRECTO
      where P.DNI = '" . $dniPersonal . "';
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        $sql = "
          update PERSONAL
          set RUTJEFEDIRECTO = RUT_EMISOR,
					RUT_EMISOR = NULL,
          IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Asignado')
          where DNI = '" . $dniPersonal . "';
        ";
        if($con->query($sql)) {
          $con->query("COMMIT");
          return $return;
        } else {
          return "Error";
        }
      } else {
        $con->query("ROLLBACK");
        return "Error";
      }
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function listarPersonalParaSolicitud($rutUsuario) {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "
			select
			' ' as 'S',
			p.IDPERSONAL,
			p.DNI 'RUT',
			initCap(p.NOMBRES) 'NOMBRES',
			initCap(p.APELLIDOS) 'APELLIDOS',
			p.RUTJEFEDIRECTO,
			initCap(u.NOMBRE) 'JEFE',
			    u.EMAIL,
					s.COLOR,
					s.NOMBRE 'ESTADO'
			  from PERSONAL p
			  left join USUARIO u on u.RUT = p.RUTJEFEDIRECTO
			  inner join ESTADO_SOLICITUD s on s.IDESTADO_SOLICITUD = p.IDESTADO_SOLICITUD
      where
      (p.RUTJEFEDIRECTO != '" . $rutUsuario . "'
      OR
      p.RUTJEFEDIRECTO IS NULL)
      and p.DNI != '" . $rutUsuario . "' and s.NOMBRE IN ('Asignado','Libre');
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

  function solicitarJefe($strlstPersonal, $rutNuevoJefe) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql1 = "
        update PERSONAL set RUT_SOLICITUD = '{$rutNuevoJefe}'
				where DNI in (" . $strlstPersonal . ")
      ";
      $sql2 = "
        update PERSONAL
        set IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Solicitado')
        where DNI in (" . $strlstPersonal . ")
      ";
			if ($con->query($sql1) && $con->query($sql2)) {
			    $con->query("COMMIT");
			    return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function aceptarSolicitud($dniPersonal) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "select
        P.IDPERSONAL,
        P.DNI,
				P.RUTJEFEDIRECTO,
        initCap(U2.NOMBRE) 'NUEVOJEFE',
        U2.EMAIL 'EMAILNUEVOJEFE',
        concat(P.NOMBRES, ', ', P.APELLIDOS) 'PERSONAL',
        initCap(U.NOMBRE) 'ANTIGUOJEFE',
        U.RUT 'RUTANTIGUOJEFE',
        U.EMAIL 'EMAILANTIGUOJEFE'
      from PERSONAL P
      left join USUARIO U2
      on U2.RUT = P.RUT_SOLICITUD
      left join USUARIO U
      on U.RUT = P.RUTJEFEDIRECTO
      where P.DNI = '" . $dniPersonal . "';
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        $sql = "
          update PERSONAL
          set IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Asignado'),
					RUTJEFEDIRECTO = RUT_SOLICITUD,
					RUT_SOLICITUD = NULL
          where DNI = '" . $dniPersonal . "';
        ";
        if($con->query($sql)) {
          $con->query("COMMIT");
          return $return;
        } else {
          return "Error";
        }
			} else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

  function rechazarSolicitud($dniPersonal) {
    $con = conectar();
    $con->query("START TRANSACTION");
		if($con != 'No conectado'){
      $sql = "select
        P.IDPERSONAL,
        P.DNI,
				P.RUTJEFEDIRECTO,
        initCap(U2.NOMBRE) 'NUEVOJEFE',
        U2.EMAIL 'EMAILNUEVOJEFE',
        concat(P.NOMBRES, ', ', P.APELLIDOS) 'PERSONAL',
        initCap(U.NOMBRE) 'ANTIGUOJEFE',
        U.RUT 'RUTANTIGUOJEFE',
        U.EMAIL 'EMAILANTIGUOJEFE'
      from PERSONAL P
      left join USUARIO U2
      on U2.RUT = P.RUT_SOLICITUD
      left join USUARIO U
      on U.RUT = P.RUTJEFEDIRECTO
      where P.DNI = '" . $dniPersonal . "';
      ";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        $sql = "
          update PERSONAL
          set RUT_SOLICITUD = NULL,
          IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Asignado')
          where DNI = '" . $dniPersonal . "';
        ";
        if($con->query($sql)) {
          $con->query("COMMIT");
          return $return;
        } else {
          return "Error";
        }
      } else {
        $con->query("ROLLBACK");
        return "Error";
      }
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }

	function datosOrganigrama($nivel) {
    $con = conectar();
    if($con != 'No conectado') {
      $sql = "SELECT P.RUTJEFEDIRECTO 'JEFE', P.DNI 'NOMBRE', P.IDNIVELFUNCIONAL
							FROM PERSONAL P
							LEFT JOIN PERSONAL_ESTADO PE
							ON P.IDPERSONAL = PE.IDPERSONAL
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
							OR PE.FECHA_TERMINO IS NULL)
							AND PE.FECHA_INICIO =
							(
								SELECT MAX(EE.FECHA_INICIO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							AND PE.IDPERSONAL_ESTADO =
							(
								SELECT MAX(EE.IDPERSONAL_ESTADO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
							ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
							LEFT JOIN PERSONAL T
							ON P.RUTJEFEDIRECTO = T.DNI
							WHERE P.IDNIVELFUNCIONAL <= '{$nivel}'
							AND
							(
							CPE.PERSONAL_ESTADO_CONCEPTO NOT IN
							(
								'Desvinculado',
								'Renuncia'
							)
							OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL
							)
							UNION ALL
							SELECT P.DNI, CONCAT(P.DNI, ' - ' ,Q_SUBORDINADOS(P.DNI)), P.IDNIVELFUNCIONAL
							FROM PERSONAL P
							WHERE P.DNI IN
							(
							SELECT P.DNI
							FROM PERSONAL P
							LEFT JOIN PERSONAL T
							ON P.RUTJEFEDIRECTO = T.DNI
							WHERE P.IDNIVELFUNCIONAL =  2
							)
							AND Q_SUBORDINADOS(P.DNI) > 0
							";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_array(MYSQLI_BOTH)) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

	function datosOrganigramaDetalle($nivel) {
		$rowUrl = datosHost($_SERVER['SERVER_NAME']);

    $con = conectar();
    if($con != 'No conectado') {
      $sql = "SELECT P.DNI 'id',
			CONCAT_WS(' ','•',SUBSTRING_INDEX(initCap(trim(P.CARGO)),' ', 3)) title,
			initCap(CONCAT_WS(' ', SUBSTRING_INDEX(P.NOMBRES,' ',1), SUBSTRING_INDEX(P.APELLIDOS,' ',2))) 'name',
			CASE WHEN P.RUTA_IMG_PERFIL  IS NULL
			THEN '" . $rowUrl[0]['domain'] . "/view/img/no_foto.jpg'
			ELSE CONCAT('" . $rowUrl[0]['domain'] . "/controller/imgPersonal.php?dni=',P.DNI)
			END
			image,
			CONCAT_WS
			('<br>',
			initCap(CONCAT_WS(' ', SUBSTRING_INDEX(P.NOMBRES,' ',1), SUBSTRING_INDEX(P.APELLIDOS,' ',1))),
			initCap(trim(P.CARGO)),
			initCap(CONCAT_WS(' ', 'Jefe: ', CONCAT_WS(' ', SUBSTRING_INDEX(T.NOMBRES,' ',1), SUBSTRING_INDEX(T.APELLIDOS,' ',1))))
			) 'info',
			'' layout,  P.IDNIVELFUNCIONAL
			FROM PERSONAL P
			LEFT JOIN PERSONAL T
			ON P.RUTJEFEDIRECTO = T.DNI
			WHERE P.IDNIVELFUNCIONAL <= '{$nivel}'
			UNION ALL
			SELECT CONCAT(P.DNI, ' - ' ,Q_SUBORDINADOS(P.DNI)), '' title,
			CONCAT_WS(': ', 'Q', Q_SUBORDINADOS(P.DNI)) name, '' image,
			CONCAT('Cantidad personal: ', Q_SUBORDINADOS(P.DNI),
			initCap(CONCAT_WS(' ', '<br>Jefe: ', CONCAT_WS(' ', SUBSTRING_INDEX(P.NOMBRES,' ',1), SUBSTRING_INDEX(P.APELLIDOS,' ',3))))
			) info, 'hanging' layout,  P.IDNIVELFUNCIONAL
			FROM PERSONAL P
			WHERE P.DNI IN
			(
			SELECT P.DNI
			FROM PERSONAL P
			LEFT JOIN PERSONAL T
			ON P.RUTJEFEDIRECTO = T.DNI
			WHERE P.IDNIVELFUNCIONAL =  '{$nivel}'
			)
			AND Q_SUBORDINADOS(P.DNI) > 0";
      if ($row = $con->query($sql)) {
        $return = array();
        while ($array = $row->fetch_assoc()) {
          $return[] = $array;
        }
        return $return;
      } else {
        return "Error";
      }
    } else {
      return "Error";
    }
  }

	function imgPersonal($dni){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "SELECT RUTA_IMG_PERFIL
FROM PERSONAL
WHERE DNI = '{$dni}'";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function eliminarProyecto($idEstructura){
			$con = conectar();
			if($con != 'No conectado'){
					$sql = "DELETE FROM ESTRUCTURA_OPERACION
WHERE IDESTRUCTURA_OPERACION  = '{$idEstructura}'";
					if($con->query($sql)){
							$con->query("COMMIT");
							return "Ok";
					}else{
							$con->query("ROLLBACK");
							return "Error";
					}
			}else{
					$con->query("ROLLBACK");
					return "Error";
			}
}

//Listado áreas perfiles
function consultaListadoCagasPersonal($rutPersonal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S , C.DNI_CARGA, C.NOMBRE_CARGA, C.FECHA_NACIMIENTO_CARGA, C.PARENTESCO_CARGA, C.IDCARGAFAMILIAR
		FROM CARGAS_FAMILIARES C LEFT JOIN PERSONAL P
		ON C.IDPERSONAL = P.IDPERSONAL
		WHERE P.IDPERSONAL = (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '{$rutPersonal}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
}

function chequeaCargaFamiliar($rutCarga){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDCARGAFAMILIAR
FROM CARGAS_FAMILIARES
WHERE DNI_CARGA = '" . $rutCarga . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresaCargaFamiliar($rutPersonal, $rutCarga, $nombreCarga, $fechaNac, $parentesco){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "INSERT INTO CARGAS_FAMILIARES(IDPERSONAL, DNI_CARGA, NOMBRE_CARGA ,FECHA_NACIMIENTO_CARGA, PARENTESCO_CARGA)
		VALUES ( (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '" . $rutPersonal . "'),
		'" . $rutCarga . "', '" . $nombreCarga . "',
		'" . $fechaNac . "','" . $parentesco . "')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}

	function eliminarCargaFamiliar($idCarga){
			$con = conectar();
			if($con != 'No conectado'){
					$sql = "DELETE FROM CARGAS_FAMILIARES WHERE IDCARGAFAMILIAR = $idCarga";
					if($con->query($sql)){
							$con->query("COMMIT");
							return "Ok";
					}else{
							$con->query("ROLLBACK");
							// return $con->error;
							return "Error";
					}
			}else{
					$con->query("ROLLBACK");
					return "Error";
			}
}

function listarTiposAuditorias() {
  $con = conectar();
  if($con != 'No conectado') {
    $sql = "
      select
        id,
        TITULO
      from FORMULARIO_AUDITORIAS;
    ";
    if ($row = $con->query($sql)) {
      $return = array();
      while ($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function listarTiposServicios($id) {
  $con = conectar();
  if($con != 'No conectado') {
    $sql = "
      select
        id,
        initCap(TITULO) TITULO
      from FORMULARIO_TIPOSERVICIOS
			WHERE TEMP_TIPOAUDITORIAid = '{$id}';
    ";
    if ($row = $con->query($sql)) {
      $return = array();
      while ($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

//Datos arbol de auditorias
function consultaPracticasFamilia($idAuditoria){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT F.FAMILIA 'id', F.TEXTOFAMILIA 'name', '' zCategorias
FROM FORMULARIO_ESTRUCTURAS F WHERE F.TIPOAUDITORIAid=" . $idAuditoria;
		if ($row = $con->query($sql)){
				while($array = $row->fetch_assoc()){
					$array['zCategorias'] = cosultaPracticasCategoria($array['id']);
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
}

function cosultaPracticasCategoria($familia){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT F.CATEGORIA 'id', F.TEXTOCATEGORIA 'name', '' zsubfamilia1
FROM FORMULARIO_ESTRUCTURAS F
WHERE F.FAMILIA = '{$familia}'";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_assoc()){
					$array['zsubfamilia1'] = cosultaPracticasSubfamilia1($familia, $array['id']);
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
}

function cosultaPracticasSubfamilia1($familia, $categoria){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT F.SUBFAMILIA1 'id', F.TIPO 'tipo', F.TEXTOSUBFAMILIA1 'name', '' zsubfamilia2
FROM FORMULARIO_ESTRUCTURAS F
WHERE F.FAMILIA = '{$familia}'
AND F.CATEGORIA = '{$categoria}'
ORDER BY F.TIPO DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_assoc()){
					$array['zsubfamilia2'] = cosultaPracticasSubfamilia2($familia, $categoria, $array['id']);
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
}

function cosultaPracticasSubfamilia2($familia, $categoria, $subfamilia1){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT F.SUBFAMILIA2 'id', F.TEXTOSUBFAMILIA2 'name', F.PUNTAJE 'puntaje'
FROM FORMULARIO_ESTRUCTURAS F
WHERE F.FAMILIA = '{$familia}'
AND F.CATEGORIA = '{$categoria}'
AND F.SUBFAMILIA1 = '{$subfamilia1}'";
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

function ingresarFormulario($tipoauditoria, $tiposervicio, $rutauditor, $ntarea, $direccioncliente, $rutcliente, $fechainstalacion, $nota, $rutPersonal, $nombrePersonal) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "call sp_formulario_insertar(".
      $tipoauditoria.",".$tiposervicio.",'".$rutauditor."','".
      $ntarea."','".$direccioncliente."','".$rutcliente."','".$fechainstalacion."','".$nota."','".$rutPersonal."','".$nombrePersonal."'".
    ")";
		if ($row = $con->query($sql)) {
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
        $return[] = $array;
      }
      return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarResultado($idtipoauditoria, $idformulario, $cadenas) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO FORMULARIO_RESULTADOS (idFORMULARIO, idFORMULARIO_ESTRUCTURAS, CATEGORIA)
      SELECT " . $idformulario . ", id, CATEGORIA FROM FORMULARIO_ESTRUCTURAS WHERE SUBFAMILIA2 IN (" . $cadenas . ") AND TIPOAUDITORIAid = " . $idtipoauditoria . ";";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarResultadoObs($cadena) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "call sp_formulario_resultado_notas_2(".$cadena.")";
		if ($row = $con->query($sql)) {
			$con->query("COMMIT");
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarResultadoFotos($file, $idformulario, $formularioestructuras, $idformularioauditorias) {
  $con = conectar();
	$con->query("START TRANSACTION");
  $cadena = "'" . $file . "'," . $idformulario . ",'" . $formularioestructuras . "'," . $idformularioauditorias;
	if($con != 'No conectado'){
		$sql = "call sp_formulario_resultado_fotos2(" . $cadena . ")";
		if ($row = $con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaPracticaGuardada($id){
	$con = conectar();
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
	$con = conectar();
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

function ingresaUsuarioNotificacionPorMail($mail, $nombre, $cuerpo, $cuerpoNotif, $subnombre, $url){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO USUARIO_NOTIFICACIONES
(RUT, TIPO, CUERPO, URL, VISTO, FECHA, HORA, NOTIFICACION, CATEGORIA)
VALUES(
	(SELECT RUT
	FROM USUARIO
	WHERE EMAIL = '{$mail}'),
	'{$nombre}', '{$cuerpo}', '{$url}', 0, NOW(), CAST(NOW() AS TIME), '{$cuerpoNotif}', '{$subnombre}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				return $sql;
				$con->query("ROLLBACK");

			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function ingresaUsuarioNotificacionRut($rutPersonal, $nombre, $cuerpo, $cuerpoNotif, $subnombre, $url){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO USUARIO_NOTIFICACIONES
(RUT, TIPO, CUERPO, URL, VISTO, FECHA, HORA, NOTIFICACION, CATEGORIA)
VALUES(
	(SELECT RUTJEFEDIRECTO
FROM PERSONAL
WHERE DNI = '{$rutPersonal}'),'{$nombre}', '{$cuerpo}', '{$url}', 0, NOW(), CAST(NOW() AS TIME), '{$cuerpoNotif}', '{$subnombre}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				return $sql;
				$con->query("ROLLBACK");

			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function consultaNotificaionesUsuario($rutUser){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT RUT, TIPO, CUERPO, URL, FECHA, HORA, NOTIFICACION
FROM USUARIO_NOTIFICACIONES
WHERE VISTO = 0
AND RUT = '{$rutUser}'";
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

function consultaPracticaResultadoGuardadaCategoria($id, $familia){
	$con = conectar();
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
	$con = conectar();
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
	$con = conectar();
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

function actualizaNotificaionesUsuario($rutUser){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE USUARIO_NOTIFICACIONES
SET VISTO = 1
WHERE VISTO = 0
AND RUT = '{$rutUser}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaNotificaionesUsuarioTabla($rutUser){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, TIPO, CATEGORIA, FECHA, HORA,
CASE WHEN LEIDO IS NULL OR LEIDO = 0 THEN 0 ELSE 1 END 'LEIDO',
CUERPO,
CASE WHEN LEIDO = 1 THEN CONCAT('<span class=''fas fa-envelope-open-text'' style=''cursor: pointer; color: green;'' onclick=''notificacionModal(',IDUSUARIO_NOTIFICACIONES,',\"',CUERPO,'\");''></span>')
ELSE CONCAT('<span class=''fas fa-envelope-open-text'' style=''cursor: pointer; color: red;'' onclick=''notificacionModal(',IDUSUARIO_NOTIFICACIONES,',\"',CUERPO,'\");''></span>')
END BOTON
FROM USUARIO_NOTIFICACIONES
WHERE RUT = '{$rutUser}'";
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
	$con = conectar();
	if ($con != 'No conectado') {
			$sql = "UPDATE FORMULARIO
SET PDF = '{$pdf}'
WHERE idFORMULARIO = '{$id}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
    }
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function actualizaNotificaionesUsuarioTabla($id){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE USUARIO_NOTIFICACIONES
SET LEIDO = 1
WHERE IDUSUARIO_NOTIFICACIONES = '{$id}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }
}

function listadoFormulario($rut, $path, $fecIni, $fecEnd) {
  $con = conectar();
  if($con != 'No conectado'){
		$sql = "call sp_listado_formulario_todos_2('" . $rut . "','" . $path . "','" . $fecIni . "','" . $fecEnd ."')";
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
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresaPersonalInterno($rutPersonal, $nombresPersonal, $apellidosPersonal, $nivelFuncional, $cargo, $clasificacion, $telefono, $direccion,$sindicalizado, $fechaNac, $idComuna, $sitMilitar, $estadoCivil, $nacionalidad, $fonoEmergencia, $contactoEmergencia, $nivelEducacional, $profesion, $especialidad, $tipoContrato, $reqUniforme, $cargas, $cantidadCargas, $planAPV, $montoAPV, $poseeLicencia, $tipoLicencia, $sexo){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO PERSONAL(DNI, NOMBRES, APELLIDOS ,IDNIVELFUNCIONAL, CARGO, CLASIFICACION, TELEFONO, DOMICILIO, SINDICATO, FECHA_NACIMIENTO, IDAREAFUNCIONAL_COMUNA_NAC, SITUACION_MILITAR, IDESTADO_CIVIL, IDNACIONALIDAD, TELEFONO_EMERGENCIA, CONTACTO_EMERGENCIA, IDNIVEL_EDUCACIONAL, PROFESION, ESPECIALIDAD, IDTIPO_CONTRATO, REQUIERE_UNIFORME, CARGAS_FAMILIARES, POSEE_LICENCIA, IDTIPO_LICENCIA, EXTERNO) VALUES ('{$rutPersonal}', '{$nombresPersonal}','{$apellidosPersonal}','{$nivelFuncional}','{$cargo}','{$clasificacion}','{$telefono}','{$direccion}','{$sindicalizado}','{$fechaNac}','{$idComuna}','{$sitMilitar}','{$estadoCivil}','{$nacionalidad}','{$fonoEmergencia}','{$contactoEmergencia}','{$nivelEducacional}','{$profesion}','{$especialidad}','{$tipoContrato}','{$reqUniforme}','{$cargas}','{$poseeLicencia}','{$tipoLicencia}', 0)";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function listadoTecnicos($rut,$path) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "call sp_listado_tecnicos('{$rut}','{$path}')";
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
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function fotoAudit($idFORMULARIO, $TEXTOFAMILIA, $CATEGORIA, $TIPOAUDITORIAid){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT FOT.FILE
FROM FORMULARIO_RESULTADOS_FOTOS FOT
LEFT JOIN FORMULARIO_ESTRUCTURAS FO
ON FOT.idFORMULARIO_ESTRUCTURAS = FO.id
LEFT JOIN FORMULARIO_ESTRUCTURAS E
ON FO.CATEGORIA = E.CATEGORIA
AND FO.TIPO = 'files'
AND FO.TIPOAUDITORIAid = E.TIPOAUDITORIAid
LEFT JOIN FORMULARIO_RESULTADOS F
ON E.id = F.idFORMULARIO_ESTRUCTURAS
WHERE FOT.idFORMULARIO = '{$idFORMULARIO}'
AND E.TEXTOFAMILIA = '{$TEXTOFAMILIA}'
AND E.CATEGORIA = '{$CATEGORIA}'
AND E.TIPOAUDITORIAid = '{$TIPOAUDITORIAid}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consultas Aseguradora Mantenedor
function consultaAseguradora(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPATENTE_ASEGURADORA, RUT, NOMBRE, MONEDA, DIRECCION, A.COMUNA, TELEFONO
FROM PATENTE_ASEGURADORA P
LEFT JOIN AREAFUNCIONAL A
ON P.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresarAseguradora($nombre, $moneda){
	$con = conectar();
	if ($con != 'No conectado') {
			$sql = "INSERT INTO PATENTE_ASEGURADORA
							(NOMBRE, MONEDA)
							VALUES('$nombre', '$moneda')";
			if($con->query($sql)){
					return "Ok";
			}else{
					// return $con->error;
					return "Error";
			}
	}else{
			return "Error";
	}
}

// Consultas Tipo de Vehiculo Mantenedor
function consultaTipoVehiculo(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPATENTE_TIPOVEHICULO, NOMBRE,  CHECKTIPO, LICENCIA
FROM PATENTE_TIPOVEHICULO";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Taller Mantenedores
function consultaTaller(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPATENTE_TALLER, RUT, NOMBRE, MONEDA, DIRECCION, A.COMUNA, CONTACTO, EMAIL, TELEFONO
FROM PATENTE_TALLER P
LEFT JOIN AREAFUNCIONAL A
ON P.IDAREAFUNCIONAL  = A.IDAREAFUNCIONAL";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas MarcaModelo Mantenedores
function consultaMarcaModelo(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPATENTE_MARCAMODELO, MARCA, MODELO, LITROS_ESTANQUE
FROM PATENTE_MARCAMODELO";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Sucursales Mantenedores
function consultaSucursal(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL SUCURSALES();";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para chequear si existe una sucursal (Parte del mantenedor)
function chequeaSucursal($sucursal){ //$sucursal viene del controlador datosChequeaSucursal
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDSUCURSAL
FROM SUCURSAL
WHERE SUCURSAL = '$sucursal'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Sucursal
function ingresaSucursal( $sucursal, $idAreaFuncional, $bodega){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO SUCURSAL(SUCURSAL,IDAREAFUNCIONAL,BODEGA, ESTADO)
VALUES ( '" .$sucursal."',
'" . $idAreaFuncional . "', '" . $bodega . "', 'Activo')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar Sucursal
function editarSucursal( $id_Sucursal, $sucursal, $comuna, $bodega){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE SUCURSAL
	SET SUCURSAL = '" . $sucursal . "',
	IDAREAFUNCIONAL = '" .$comuna . "',
	BODEGA = '" .$bodega . "'
	WHERE IDSUCURSAL = '" . $id_Sucursal . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Desactivar Sucursal
function desactivarSucursal($id_Sucursal, $nuevoEstado){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE SUCURSAL
SET ESTADO = '" . $nuevoEstado . "'
WHERE IDSUCURSAL  = '" . $id_Sucursal . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
		  return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Datos informe practicas global
function consultaInformePracticasGlobal($rut,$pat,$mes,$ano,$semana,$auditoria,$servicio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_GLOBAL('{$rut}','{$pat}','{$mes}','{$ano}','{$semana}','{$auditoria}','{$servicio}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Periodos informes
function consultaInformePracticasGlobalPeriodos(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(F.FECHA, '%Y-%m') 'PERIODO'
FROM FORMULARIO F
GROUP BY DATE_FORMAT(F.FECHA, '%Y-%m')
ORDER BY DATE_FORMAT(F.FECHA, '%Y-%m') DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Semana informes
function consultaInformePracticasGlobalSemana($periodo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) 'SEMANA'
FROM FORMULARIO F
WHERE DATE_FORMAT(F.FECHA, '%Y-%m') = '{$periodo}'
GROUP BY (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1)
ORDER BY (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Tipo auditoria informes
function consultaInformePracticasGlobalAuditoria($periodo, $semana, $servicio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT FA.id 'ID', FA.TITULO 'AUDITORIA'
FROM FORMULARIO F
LEFT JOIN FORMULARIO_AUDITORIAS FA
ON F.TIPO_AUDITORIA = FA.id
WHERE DATE_FORMAT(F.FECHA, '%Y-%m') = '{$periodo}'
AND
CASE WHEN '{$semana}' > 0 THEN
	(WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = '{$semana}'
ELSE
	(WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) IS NOT NULL
END
AND
CASE WHEN '{$servicio}' <> '0' THEN
	F.TIPO_SERVICIO IN
	(
		SELECT id
		FROM FORMULARIO_TIPOSERVICIOS
		WHERE TITULO = '{$servicio}'
	)
ELSE
	F.TIPO_SERVICIO IS NOT NULL
END
GROUP BY FA.TITULO, FA.id
ORDER BY FA.id DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Tipo servicio informes
function consultaInformePracticasGlobalServicio($periodo,$semana,$auditoria){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT initCap(FT.TITULO) 'SERVICIO'
FROM FORMULARIO F
LEFT JOIN FORMULARIO_TIPOSERVICIOS FT
ON F.TIPO_SERVICIO = FT.id
WHERE DATE_FORMAT(F.FECHA, '%Y-%m') = '{$periodo}'
AND
CASE WHEN '{$semana}' > 0 THEN
	(WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = '{$semana}'
ELSE
	(WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) IS NOT NULL
END
AND
CASE WHEN '{$auditoria}' > 0 THEN
	F.TIPO_AUDITORIA = '{$auditoria}'
ELSE
	F.TIPO_AUDITORIA IS NOT NULL
END
GROUP BY initCap(FT.TITULO)
ORDER BY initCap(FT.TITULO) DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para saber si una sucursal esta siendo usada por un personal
function sucursalPersonal($id_Sucursal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT IDSUCURSAL
						FROM ACT
						WHERE IDSUCURSAL = '{id_Sucursal}'
						UNION ALL
						SELECT DISTINCT IDSUCURSAL
						FROM PATENTE
						WHERE IDSUCURSAL = '{$id_Sucursal}'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function fechaUltimoFormulario() {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT FECHA,HORA FROM FORMULARIO ORDER BY idFORMULARIO DESC LIMIT 1";
    if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar TipoVehiculo
function ingresaTipoVehiculo($nombre,$checktipo,$licencia){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_TIPOVEHICULO (NOMBRE, CHECKTIPO, LICENCIA)
				VALUES('{$nombre}', '{$checktipo}', '{$licencia}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar TipoVehiculo
function editarTipoVehiculo( $id_TipoVehiculo, $nombre, $licencia,$checktipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_TIPOVEHICULO
	SET NOMBRE = '{$nombre}',
	LICENCIA = '{$licencia}',
	CHECKTIPO = '{$checktipo}'
	WHERE IDPATENTE_TIPOVEHICULO = '{$id_TipoVehiculo}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para chequear si existe un TipoVehiculo
function chequeaTipoVehiculo($nombre, $licencia){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_TIPOVEHICULO
FROM PATENTE_TIPOVEHICULO
WHERE NOMBRE = '$nombre'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar MarcaModelo
function ingresaMarcaModelo( $marca, $modelo, $litros){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_MARCAMODELO(MARCA,MODELO,LITROS_ESTANQUE)
VALUES ( '" .$marca."',
'" . $modelo . "',
'" . $litros . "')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para chequear si existe una MarcaModelo iguales
function chequeaMarcaModelo($marca, $modelo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_MARCAMODELO
FROM PATENTE_MARCAMODELO
WHERE MARCA = '$marca' AND MODELO = '$modelo'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para Editar MarcaModelo
function editarMarcaModelo( $id_MarcaModelo, $marca, $modelo, $litros){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_MARCAMODELO
	SET MARCA = '" . $marca . "',
	MODELO = '" .$modelo . "',
	LITROS_ESTANQUE = '" .$litros . "'
	WHERE IDPATENTE_MARCAMODELO = '" . $id_MarcaModelo . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Datos informe practicas global
function consultaInformePracticasEvolucion($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionAuditoria($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_AUDITORIA('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Tipo servicio informes
function consultaInformePracticasEvolucionServicio($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_PRESTACION('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionPersonal($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_PERSONAL('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionJefatura($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_JEFATURA('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionComuna($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_COMUNA('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionServicioPro($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_SERVICIO('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Taller
function ingresaTaller($rutIngreso, $mombreIngreso, $monedaIngreso, $direccionIngreso, $comunaIngreso,
$contactoIngreso, $emailIngreso, $telefonoIngreso){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_TALLER(RUT, NOMBRE, MONEDA, DIRECCION, IDAREAFUNCIONAL, CONTACTO, EMAIL, TELEFONO)
VALUES ( '" .$rutIngreso."', '" . $mombreIngreso . "', '" . $monedaIngreso . "', '" . $direccionIngreso . "',
'" . $comunaIngreso . "', '" . $contactoIngreso . "', '" . $emailIngreso . "', '" . $telefonoIngreso . "')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}


function consultaInformePracticasEvolucionClientePro($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_CLIENTE('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformePracticasEvolucionActividadPro($rut,$pat,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL FORMULARIO_INFORME_HISTORICO_PRACTICAS_ACTIVIDAD('{$rut}','{$pat}','{$inicio}','{$fin}','{$auditoria}','{$servicio}','{$jefatura}','{$personal}','{$comuna}','{$servicioPro}','{$clientePro}','{$actividadPro}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para Editar Taller
function editarTaller(  $idTaller, $rut, $nombre, $moneda, $direccion,
$comuna, $contacto, $email, $telefono){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_TALLER
	SET RUT = '" . $rut . "',
	NOMBRE = '" .$nombre . "',
	MONEDA = '" .$moneda . "',
	DIRECCION = '" .$direccion . "',
	IDAREAFUNCIONAL = '" .$comuna . "',
	CONTACTO = '" .$contacto . "',
	EMAIL = '" .$email . "',
	TELEFONO = '" .$telefono . "'
	WHERE IDPATENTE_TALLER = '" . $idTaller . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}


function checkUsuarioSinPassPorRut($rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT NOMBRE, RUT, IDPERFIL, ESTADO, EMAIL, TOKEN_G_AT, FIRMA_2FA
						FROM USUARIO
						WHERE RUT = '{$rut}'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosHost($url){
	$con = conectar_api();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL DATOSOHOST('{$url}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    return "Error";
  }
}

// Consulta para chequear rut de taller
function chequeaTaller($rutTaller){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_TALLER
FROM PATENTE_TALLER
WHERE RUT = '" . $rutTaller . "'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function buscarPersonalJefatura() {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "select * from PERSONAL limit 100";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
      return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listarPersonal() {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        IDPERSONAL,
        DNI,
        initCap(CONCAT(NOMBRES, ' ', APELLIDOS)) AS PERSONA
      FROM PERSONAL";
		if ($row = $con->query($sql)){
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
      return "Error";
		}
	} else {
		return "Error";
	}
}

function datosImgTama($url){
	$con = conectar_api();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL IMGTAM('{$url}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para chequear rut de Aseguradora
function chequeaRutAseguradora($rutAseguradora){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_ASEGURADORA
FROM PATENTE_ASEGURADORA
WHERE RUT = '" . $rutAseguradora . "'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Aseguradora
function ingresaAseguradora($rutIngreso, $mombreIngreso, $monedaIngreso, $direccionIngreso, $comunaIngreso, $telefonoIngreso){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_ASEGURADORA(RUT, NOMBRE, MONEDA, DIRECCION, IDAREAFUNCIONAL, TELEFONO)
VALUES ( '" .$rutIngreso."', '" . $mombreIngreso . "', '" . $monedaIngreso . "', '" . $direccionIngreso . "',
'" . $comunaIngreso . "', '" . $telefonoIngreso . "')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar Aseguradora
function editarAseguradora(  $idAseguradora, $rut, $nombre, $moneda, $direccion,
$comuna, $telefono){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASEGURADORA
	SET RUT = '" . $rut . "',
	NOMBRE = '" .$nombre . "',
	MONEDA = '" .$moneda . "',
	DIRECCION = '" .$direccion . "',
	IDAREAFUNCIONAL = '" .$comuna . "',
	TELEFONO = '" .$telefono . "'
	WHERE IDPATENTE_ASEGURADORA = '" . $idAseguradora . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para eliminar Aseguradora
function eliminarAseguradora($idAseguradora){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM PATENTE_ASEGURADORA
		 WHERE IDPATENTE_ASEGURADORA = '" . $idAseguradora . "'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

//Personal Externo
function consultaPersonalExterno(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PERSONAL_EXTERNO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function desasignarPersonalJefatura($strlstPersonalDni){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE PERSONAL
SET IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Libre'),
RUTJEFEDIRECTO = NULL
WHERE DNI IN ({$strlstPersonalDni})";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaEstadosRRHH(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT PERSONAL_ESTADO_CONCEPTO 'ESTADO', IDPERSONAL_ESTADO_CONCEPTO 'ID'
FROM PERSONAL_ESTADO_CONCEPTO
WHERE PERSONAL_ESTADO_CONCEPTO <> 'Inicio Contrato' AND PERSONAL_ESTADO_CONCEPTO <> 'Vigente'";
		if ($row = $con->query($sql)){
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
			}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresarEstadoDesvinculado($rut, $idtipo, $finicio, $observacion, $rutUsuario){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO PERSONAL_ESTADO(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO, FECHA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
			SELECT P.IDPERSONAL, '{$idtipo}',
DATE_FORMAT(NOW(), '%Y-%m-%d'),
'{$finicio}', NULL,
'{$observacion}', '{$rutUsuario}'
FROM PERSONAL P
WHERE P.DNI = '{$rut}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function ingresarEstadoRRHH($rut, $idtipo, $finicio, $ffin, $observacion, $rutUsuario){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO PERSONAL_ESTADO(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO, FECHA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
			SELECT P.IDPERSONAL, '{$idtipo}',
DATE_FORMAT(NOW(), '%Y-%m-%d'),
'{$finicio}', '{$ffin}',
'{$observacion}', '{$rutUsuario}'
FROM PERSONAL P
WHERE P.DNI = '{$rut}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

//Listado Ex Personal
function consultaExPersonal(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PERSONAL_DESVINCULADO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function solicitarJefeLibre($strlstPersonalLibre, $rutNuevoJefe){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE PERSONAL
SET IDESTADO_SOLICITUD = (select IDESTADO_SOLICITUD from ESTADO_SOLICITUD where NOMBRE = 'Asignado'),
RUTJEFEDIRECTO = '{$rutNuevoJefe}'
WHERE DNI IN ({$strlstPersonalLibre})";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
    }
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
  }
	else{
		$con->query("ROLLBACK");
    return "Error";
  }
}

// Consulta Proveedores Mantenedores
function consultaProveedores(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, P.IDPATENTE_PROVEEDOR, P.RUT, P.PROVEEDOR, E.PROPIEDAD, P.NRO_CONTRATO
						FROM PATENTE_PROVEEDOR P
						LEFT JOIN PATENTE_PROPIEDAD E
						ON P.IDPATENTE_PROPIEDAD = E.idPATENTE_PROPIEDAD";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para chequear Proveedores
function chequeaProveedores($rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_PROVEEDOR
FROM PATENTE_PROVEEDOR
WHERE RUT = '" . $rut . "'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function activarDesvinculado($rut, $observacion, $rutUsuario){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO PERSONAL_ESTADO(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO, FECHA, FECHA_INICIO, OBSERVACION, RUTUSUARIO)
			SELECT P.IDPERSONAL, 4,
DATE_FORMAT(NOW(), '%Y-%m-%d'),DATE_FORMAT(NOW(), '%Y-%m-%d'),
'{$observacion}', '{$rutUsuario}'
FROM PERSONAL P
WHERE P.DNI = '{$rut}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

//Listado Subcontratistas
function consultaSubcontratistas(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S, IDSUBCONTRATO, RUT, NOMBRE_SUBCONTRATO, ESTADO,
			CASE WHEN INTERNO = 0 THEN 'Subcontratista' ELSE 'Interno' END 'TIPO'
FROM SUBCONTRATISTAS";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

// Consulta para ingresar Proveedores
function ingresaProveedores($rut, $proveedor, $propiedad, $contrato){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_PROVEEDOR(RUT, PROVEEDOR, IDPATENTE_PROPIEDAD, NRO_CONTRATO)
						VALUES ( '" . $rut . "', '" . $proveedor . "', '" . $propiedad . "', '" . $contrato . "')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar Proveedores
function editarProveedores($id_Proveedores, $rut, $nombre, $propiedad, $contrato){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_PROVEEDOR
			SET RUT = '" . $rut . "',
	    PROVEEDOR = '" . $nombre . "',
			IDPATENTE_PROPIEDAD = '" . $propiedad . "',
			NRO_CONTRATO = '" . $contrato . "'
			WHERE IDPATENTE_PROVEEDOR = '" . $id_Proveedores . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function chequeaSubcontratista($rut){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDSUBCONTRATO
FROM SUBCONTRATISTAS
WHERE RUT = '" . $rut . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
}

function ingresaSubcontratista($rut, $nombre, $interno){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO SUBCONTRATISTAS(RUT, NOMBRE_SUBCONTRATO, ESTADO, INTERNO )
	VALUES ( '" . $rut . "', '" . $nombre . "','Activo', '{$interno}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function editarSubcontratista( $rutEditar, $nombre, $estado, $interno){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE SUBCONTRATISTAS
SET RUT = '" . $rutEditar . "',
NOMBRE_SUBCONTRATO = '" .$nombre . "',
ESTADO = '" .$estado . "',
INTERNO = '" .$interno . "'
WHERE RUT = '" . $rutEditar . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Vehiculos
function consultaVehiculo($rut,$path){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_VEHICULOS('{$rut}','{$path}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaTipoCap(){
  $con = conectar_api();
  if($con != 'No conectado'){
    $sql = "SELECT DISTINCT TIPO
FROM CAPACITACIONES
WHERE
CASE WHEN (SELECT COUNT(*) FROM CAPACITACIONES WHERE DOMINIO LIKE '%{$_SERVER['SERVER_NAME']}%') > 0 THEN
DOMINIO LIKE '%{$_SERVER['SERVER_NAME']}%'
ELSE
DOMINIO = 'Test'
END
";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaCapCap($tipo){
  $con = conectar_api();
  if($con != 'No conectado'){
    $sql = "SELECT NOMBRE, URL
FROM CAPACITACIONES
WHERE TIPO = '{$tipo}'
AND
CASE WHEN (SELECT COUNT(*) FROM CAPACITACIONES WHERE DOMINIO LIKE '%{$_SERVER['SERVER_NAME']}%') > 0 THEN
DOMINIO LIKE '%{$_SERVER['SERVER_NAME']}%'
ELSE
DOMINIO = 'Test'
END
";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaMetaMesAno($mes, $ano){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT '' S, P.NOMBRE 'PERFIL', A.TITULO 'AUDITORIA', M.META, M.OBSERVACION, P.IDPERFIL, A.ID 'IDAUDITORIA',
		M.CICLO,
		CASE WHEN M.PERMANENTE = 1 THEN 'Permante' ELSE 'Mensual' END 'TIPO', M.PERMANENTE
FROM PERFIL P
LEFT JOIN FORMULARIO_META M
ON P.IDPERFIL = M.IDPERFIL
AND ANO = '{$ano}'
AND MES = '{$mes}'
LEFT JOIN FORMULARIO_AUDITORIAS A
ON M.IDFORMULARIO_AUDITORIAS = A.ID
WHERE M.IDPERFIL IS NOT NULL";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaMetaPeriodo(){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT DATE_FORMAT(CONCAT(ANO,'-',MES,'-01'), '%Y-%m') 'PERIODO'
FROM FORMULARIO_META
GROUP BY ANO, MES
ORDER BY ANO DESC, MES DESC";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaPerfilesMeta(){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDPERFIL, NOMBRE
FROM PERFIL";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaAuditoriaMeta(){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT id 'ID', TITULO
FROM FORMULARIO_AUDITORIAS ORDER BY id ASC";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }

      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function ingresarMetaPractica($perfil,$mes,$ano,$auditoria,$meta,$observacion,$permanente,$ciclo){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO FORMULARIO_META(IDPERFIL, MES, ANO, IDFORMULARIO_AUDITORIAS, META, OBSERVACION, PERMANENTE, CICLO)
VALUES('{$perfil}','{$mes}','{$ano}','{$auditoria}','{$meta}','{$observacion}','{$permanente}','{$ciclo}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
					return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function editarMetaPractica($perfil,$mes,$ano,$auditoria,$meta,$observacion,$permanente,$ciclo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE FORMULARIO_META
SET META = '{$meta}',
OBSERVACION = '{$observacion}',
PERMANENTE = '{$permanente}',
CICLO = '{$ciclo}'
WHERE MES = '{$mes}'
AND ANO = '{$ano}'
AND IDPERFIL = '{$perfil}'
AND IDFORMULARIO_AUDITORIAS = '{$auditoria}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarMetaPractica($perfil,$mes,$ano,$auditoria){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "DELETE FROM FORMULARIO_META
WHERE MES = '{$mes}'
AND ANO = '{$ano}'
AND IDPERFIL = '{$perfil}'
AND IDFORMULARIO_AUDITORIAS = '{$auditoria}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaInformeDisponibilidad($rut,$pat,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_DISPONIBILIDAD('{$rut}','{$pat}','{$fecha}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformeDisponibilidadEvolucion($rut,$path,$inicio,$fin){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_DISPONIBILIDAD_EVOLUCION('{$rut}','{$path}','{$inicio}','{$fin}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Propiedad-Patente
function consultaPropiedad(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_PROPIEDAD, PROPIEDAD
FROM PATENTE_PROPIEDAD";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaInformeDisponibilidadJefatura($rut,$pat,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_DISPONIBILIDAD_JEFATURA('{$rut}','{$pat}','{$fecha}')";
		if ($row = $con->query($sql)){
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

// Consultas Marca-Patente para ingresar Vehiculos
function consultaMarcaPatente(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT MARCA
FROM PATENTE_MARCAMODELO";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Modelo-Patente para ingresar Vehiculos
function consultaModeloPatente($marca){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT  MODELO, CASE WHEN LITROS_ESTANQUE = '' OR LITROS_ESTANQUE IS NULL THEN -1 ELSE LITROS_ESTANQUE END 'LITROS_ESTANQUE'
FROM PATENTE_MARCAMODELO
where MARCA = '" . $marca . "'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Patente-Estado para ingresar Vehiculos
function consultaPatenteEstado(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT  IDPATENTE_ESTADO, initCap(ESTADO) 'ESTADO',
		CASE WHEN SUB_ESTADO1 IS NOT NULL THEN initCap(SUB_ESTADO1) ELSE '' END 'SUB_ESTADO1',
		CASE WHEN SUB_ESTADO2 IS NOT NULL THEN initCap(SUB_ESTADO2) ELSE '' END 'SUB_ESTADO2'
FROM PATENTE_ESTADO

WHERE ESTADO NOT IN
(
	'Asignado'
)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas BodegaSucursal para ingresar Vehiculo
function consultaBodegaSucursal(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT S.IDSUCURSAL, CONCAT(A.COMUNA, ' - ', S.SUCURSAL) 'SUCURSAL'
FROM SUCURSAL S
LEFT JOIN AREAFUNCIONAL A
ON S.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
WHERE S.ESTADO = 'Activo'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para chequear Patente (Vehiculo)
function chequeaPatente($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.CODIGO, p.AÑO, p.KILOMETRAJE, pm.MARCA, pm.MODELO
		FROM PATENTE p
		LEFT JOIN PATENTE_MARCAMODELO pm
		ON p.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
		WHERE p.CODIGO = '{$patente}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Patente(Vehiculo)
function ingresaPatente($patente, $kilometraje, $ano, $tipoVehiculo, $vin, $color, $propiedad, $empresa, $inicio, $termino, $monto, $bodega, $aseguradora, $montoAseguradora, $manto, $estado, $marca, $modelo, $tipoMonto, $nMotor, $patenteOriginal, $litros, $comuna){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESA_PATENTE('$patente','$kilometraje','$ano','$tipoVehiculo','$vin','$color','$propiedad','{$empresa}','$inicio','$termino','{$monto}','$bodega','$aseguradora','{$montoAseguradora}','$manto','$estado', '$marca', '$modelo', '$tipoMonto', '$nMotor', '$patenteOriginal', '$litros', '$comuna')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}


// Consulta para traer IDpatente_MarcaModelo
function busquedaIdMarcaModeloPatente($marca, $modelo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_MARCAMODELO
FROM PATENTE_MARCAMODELO
WHERE MARCA = '" . $marca . "' AND MODELO = '" . $modelo . "'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function formulariosSinPDF(){
	$con = conectar();
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

function actualizaTokenApp($rut, $token_app){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE USUARIO
SET TOKEN_APP_MOVIL_CRED = '{$token_app}',
TOKEN_WEB = NULL,
TOKEN_WEB_TIME = NULL
WHERE RUT = '{$rut}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function checkTokenApp($token_app){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT RUT
FROM USUARIO
WHERE TOKEN_APP_MOVIL_CRED  = '{$token_app}'
AND TOKEN_APP_MOVIL_CRED <> ''
AND TOKEN_APP_MOVIL_CRED IS NOT NULL";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function checkUsuarioSinPassApp($token_app){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT NOMBRE, RUT, IDPERFIL, ESTADO, 'TOKEN' TIPO, TOKEN_G_AT, FIRMA_2FA
FROM USUARIO
WHERE TOKEN_APP_MOVIL_CRED = '{$token_app}'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosAvanceMetasPractica($rut,$path,$mes,$ano){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_PRACTICA_METAS('{$rut}','{$path}','{$mes}','{$ano}')";
		if ($row = $con->query($sql)){
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function datosAvanceMetasPracticaDetallle($ano, $mes, $rut, $perfil){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_PRACTICA_METAS_DETALLE('{$ano}','{$mes}','{$rut}','{$perfil}')";
		if ($row = $con->query($sql)){
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaInformeDisponibilidadJefaturaHoy($rut,$pat,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_DISPONIBILIDAD_JEFATURA_HOY('{$rut}','{$pat}','{$fecha}')";
		if ($row = $con->query($sql)){
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    }
    else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaInformeDisponibilidadHoy($rut,$pat,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INFORME_DISPONIBILIDAD_HOY('{$rut}','{$pat}','{$fecha}')";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}


// Consulta datos para Editar Vehiculos
function consultaDatosEditarPatente($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT  IDSUCURSAL, IDPATENTE_ESTADO, IDPATENTE_ASEGURADORA, IDPATENTE_PROVEEDOR, IDSUBCONTRATISTAS, TIPOMONTO, KILOMETRAJE, AÑO, VIN, IDPATENTE_COLOR, FINICIO, FTERMINO, MONTO, MONTO_ASEGURADORA, FMANTENIMIENTO,
		PDFREVTEC, FREALIZADAREVTEC, FCADUCIDADREVTEC, PDFPERMCIRC, FREALIZADAPERMCIRC, FCADUCIDADPERMCIRC, PDFASEG, PDFOTROS, NRO_MOTOR,
		CASE WHEN OPERACION IS NULL THEN 0 ELSE 1 END 'OPERACION', PDFEMISIONGASES, FREALIZADAEMISIONGASES, FCADUCIDADEMISIONGASES, LITROS_ESTANQUE,
		IDAREAFUNCIONAL
FROM PATENTE
where CODIGO = '$patente'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta datos Patente Color
function consultaPatenteColor(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_COLOR, NOMBRE
FROM PATENTE_COLOR";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Moneda Aseguradora
function consultaMonedaAseguradora(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_ASEGURADORA
FROM PATENTE_ASEGURADORA
WHERE MONEDA = 'Peso'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para editar Patente(Vehiculo)
function editarPatente($idVehiculo, $patente, $kilometraje, $ano, $tipoVehiculo, $vin, $color, $propiedad, $empresa, $inicio, $termino, $monto, $bodega, $aseguradora, $montoAseguradora, $manto, $estado, $marca, $modelo, $tipoMonto, $operacion, $nMotor, $litros, $comuna){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL EDITAR_PATENTE('$idVehiculo','$patente','$kilometraje','$ano','$tipoVehiculo','$vin','$color','$propiedad','{$empresa}','$inicio','$termino','{$monto}','$bodega','$aseguradora','{$montoAseguradora}','$manto','$estado', '$marca', '$modelo', '$tipoMonto', '$operacion', '$nMotor', '$litros', '$comuna')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function imagenPersona($rut){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT CASE WHEN RUTA_IMG_PERFIL IS NOT NULL AND RUTA_IMG_PERFIL <> '' THEN 1 ELSE 0 END 'FOTO', RUTA_IMG_PERFIL 'IMG'
FROM PERSONAL
WHERE DNI = '{$rut}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function cargarImgPersonal($rut,$file){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE PERSONAL
SET RUTA_IMG_PERFIL = '{$file}'
WHERE DNI = '{$rut}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
			  return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function listadoPersonalUsuario(){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "SELECT DNI, initCap(CONCAT(NOMBRES,' ', APELLIDOS)) 'NOMBRE'
FROM PERSONAL
WHERE DNI NOT IN
(
	SELECT RUT
	FROM USUARIO
)";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaDatosPersonalUsuario($rut){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "SELECT DNI, initCap(NOMBRES) 'NOMBRES', initCap(APELLIDOS) 'APELLIDOS'
FROM PERSONAL
WHERE DNI = '{$rut}'";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

// Consulta para selector de Subcontratistas en Ingresar y Editar Vehoculo
function datosSubcontratistaVehiculo(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDSUBCONTRATO, NOMBRE_SUBCONTRATO
		FROM SUBCONTRATISTAS
		WHERE ESTADO = 'Activo'
		AND INTERNO = 0";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosProblemasPracticas($rutUser, $pat, $mes,$ano,$val,$rutJefe){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PROBLEMAS_PRACTICAS('{$rutUser}','{$pat}','{$mes}','{$ano}','{$val}','{$rutJefe}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['child'] = datosProblemasPracticasFalla($rutUser, $pat, $array['FAMILIA'], $array['CATEGORIA'], $mes, $ano);
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosProblemasPracticasFalla($rutUser, $pat, $familia, $categoria, $mes, $ano){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PROBLEMAS_PRACTICAS_FALLA('{$rutUser}','{$pat}','{$mes}','{$ano}','{$familia}','{$categoria}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosProblemasPracticasAuditoria($rutUser, $pat, $mes, $ano){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PROBLEMAS_PRACTICAS_AUDITORIAS('{$rutUser}','{$pat}','{$mes}','{$ano}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosDetallePracticaTodos($mes, $ano, $strDni){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT U.RUT, U.NOMBRE, FA.TITULO 'AUDITORIA',
			CASE WHEN
				(
				SELECT M.CICLO
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 'Sin Meta'
				ELSE
				(
				SELECT M.CICLO
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				)
				END 'CICLO',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
				SELECT COUNT(*)
				FROM calendario
				WHERE mes_calendario = $mes
				AND anio_calendario = $ano
				AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
				SELECT COUNT(*)
				FROM calendario
				WHERE mes_calendario = $mes
				AND anio_calendario = $ano
				AND es_dia_habil = 1
				)
				ELSE
				M.META END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0)  'META_MENSUAL',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
				) 'TOTAL_REALIZADAS',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 1
				) 'Realizadas_Sem_1',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 1
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 1
					AND es_dia_habil = 1
				)
				ELSE
				M.META END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_1',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 2
				) 'Realizadas_Sem_2',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 2
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 2
					AND es_dia_habil = 1
				)
				ELSE
				0 END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_2',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 3
				) 'Realizadas_Sem_3',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 3
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 3
					AND es_dia_habil = 1
				)
				ELSE
				0 END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_3',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 4
				) 'Realizadas_Sem_4',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 4
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 4
					AND es_dia_habil = 1
				)
				ELSE
				0 END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_4',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 5
				) 'Realizadas_Sem_5',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 5
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 5
					AND es_dia_habil = 1
				)
				ELSE
				0 END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_5',
				(
					SELECT COUNT(F.idFORMULARIO)
					FROM FORMULARIO F
					WHERE F.RUT = X.RUT
					AND MONTH(F.FECHA) = $mes
					AND YEAR(F.FECHA) = $ano
					AND F.TIPO_AUDITORIA = FA.id
					AND (WEEK(F.FECHA, 5) - WEEK(DATE_SUB(F.FECHA, INTERVAL DAYOFMONTH(F.FECHA) - 1 DAY), 5) + 1) = 6
				) 'Realizadas_Sem_6',
				ROUND(CASE WHEN
				(
				SELECT M.META
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) IS NULL
				THEN 0
				ELSE (
				SELECT CASE WHEN M.CICLO  = 'Diaria' THEN M.META*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 6
					AND es_dia_habil = 1
				)
				ELSE
				CASE WHEN M.CICLO  = 'Semanal' THEN (M.META/5)*
				(
					SELECT COUNT(*)
					FROM calendario
					WHERE mes_calendario = $mes
					AND anio_calendario = $ano
					AND semana_del_mes = 6
					AND es_dia_habil = 1
				)
				ELSE
				0 END END
				FROM FORMULARIO_META M
				LEFT JOIN PERFIL P
				ON M.IDPERFIL = P.IDPERFIL
				WHERE M.IDFORMULARIO_AUDITORIAS = FA.id
				AND M.MES = $mes
				AND M.ANO = $ano
				AND P.IDPERFIL = U.IDPERFIL
				) END,0) 'Meta_Sem_6'
			FROM FORMULARIO_AUDITORIAS FA,
			USUARIO U
			LEFT JOIN FORMULARIO_META L
			ON U.IDPERFIL = L.IDPERFIL
			LEFT JOIN FORMULARIO X
			ON U.RUT = X.RUT
			WHERE U.RUT IN
			(
				" . $strDni . "
			)
			GROUP BY U.RUT, U.NOMBRE, FA.TITULO, FA.id, U.IDPERFIL";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			// return $sql;
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar la subida de PDFs en Vehiculos
function actualizaPDFVehiculo($patente, $frealizada, $fcaducidad, $docPDFRev, $frealizadaCir, $fcaducidadCir, $docPDFCir, $docPDFAsegur, $docPDFOtrosVh,  $docPDFEmisionGases, $fRealizadaEmisionGases, $fCaducidadEmisionGases){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL SUBIR_PDF_VEHICULO('$patente','$frealizada','$fcaducidad','$docPDFRev','$frealizadaCir','$fcaducidadCir','$docPDFCir','$docPDFAsegur','$docPDFOtrosVh','$docPDFEmisionGases','$fRealizadaEmisionGases','$fCaducidadEmisionGases')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}

// Consulta para saber que PDF tiene cargada una patente (vehiculo)
function consultaPDFVehiculoPatente($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT PDFREVTEC, PDFPERMCIRC, PDFASEG, PDFOTROS, FREALIZADAREVTEC, FCADUCIDADREVTEC, FREALIZADAPERMCIRC, FCADUCIDADPERMCIRC, PDFEMISIONGASES, FREALIZADAEMISIONGASES, FCADUCIDADEMISIONGASES
		FROM PATENTE
		WHERE CODIGO = '$patente'";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);
			$return[] = $array;
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listarInicidenciaDepartamento(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDINCIDENCIA_DEPARTAMENTO, ELEMENTO FROM INCIDENCIA_DEPARTAMENTO";
		if ($row = $con->query($sql)) {
			$return = array();
      while ($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }

      return $return;
		} else {
			return "Error";
		}
	} else {
    return "Error";
	}
}

function listarIncidenciaConfiguracion_Nuevos($idsArea, $idsItem, $idsDepartamento, $idsOperacion, $idsSucursal){
	$con = conectar();
  $idsAre = join(",", $idsArea);
  $idsIte = join(",", $idsItem);
  $idsDepa = join(",", $idsDepartamento);
  $idsOper = join(",", $idsOperacion);
  $idsSuc = join(",", $idsSucursal);
	if($con != 'No conectado'){
		$sql = "SELECT
						' ' as S,
						I.IDINCIDENCIA_ITEM,
						I.IDINCIDENCIA_DEPARTAMENTO,
						I.IDAREA,
						R.NOMBRE 'AREA',
						T.ITEM,
						D.ELEMENTO 'DEPARTAMENTO',
						O.IDESTRUCTURA_OPERACION,
						S.SERVICIO,
						L.CLIENTE,
						A.ACTIVIDAD,
						U.IDSUCURSAL,
						U.SUCURSAL,
						F.COMUNA,
						US.RUT 'DNI_RESOLUTOR',
						US.NOMBRE 'NOMBRE_RESOLUTOR',
						CONCAT_WS(' ', IC.SLA_QUANTITY, IC.SLA_TIPO)'SLA'
						FROM INCIDENCIA_ESTRUCTURA I
						LEFT JOIN AREA R ON I.IDAREA = R.IDAREA
						LEFT JOIN INCIDENCIA_DEPARTAMENTO D ON I.IDINCIDENCIA_DEPARTAMENTO = D.IDINCIDENCIA_DEPARTAMENTO
						LEFT JOIN INCIDENCIA_ITEM T ON I.IDINCIDENCIA_ITEM = T.IDINCIDENCIA_ITEM
						LEFT JOIN INCIDENCIA_ELEMENTO E ON I.IDINCIDENCIA_ELEMENTO = E.IDINCIDENCIA_ELEMENTO
						LEFT JOIN INCIDENCIA_ANOMALIA IA ON I.IDINCIDENCIA_ANOMALIA = IA.IDINCIDENCIA_ANOMALIA
						JOIN ESTRUCTURA_OPERACION O
						LEFT JOIN SERVICIO S ON O.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE L ON O.IDCLIENTE = L.IDCLIENTE
						LEFT JOIN ACTIVIDAD A ON O.IDACTIVIDAD = A.IDACTIVIDAD
						JOIN SUCURSAL U
						LEFT JOIN AREAFUNCIONAL F ON U.IDAREAFUNCIONAL = F.IDAREAFUNCIONAL
						LEFT JOIN INCIDENCIA_CONFIGURACION IC
						ON I.IDINCIDENCIA_ITEM = IC.IDINCIDENCIA_ITEM
						AND I.IDINCIDENCIA_DEPARTAMENTO = IC.IDINCIDENCIA_DEPARTAMENTO
						AND O.IDESTRUCTURA_OPERACION = IC.IDESTRUCTURA_OPERACION
						AND U.IDSUCURSAL = IC.IDSUCURSAL
						AND R.IDAREA = IC.IDAREA
						LEFT JOIN USUARIO US
						ON IC.IDUSUARIO = US.IDUSUARIO
						WHERE IC.IDAREA IN (". $idsAre . ")
				    AND IC.IDINCIDENCIA_ITEM IN (" . $idsIte . ")
				    AND IC.IDINCIDENCIA_DEPARTAMENTO IN (" . $idsDepa . ")
				    AND IC.IDESTRUCTURA_OPERACION IN (" . $idsOper . ")
				    AND IC.IDSUCURSAL IN (" . $idsSuc . ")
						GROUP BY
						I.IDINCIDENCIA_ITEM, I.IDINCIDENCIA_DEPARTAMENTO, I.IDAREA, R.NOMBRE, T.ITEM, D.ELEMENTO,
						O.IDESTRUCTURA_OPERACION, S.SERVICIO, L.CLIENTE, A.ACTIVIDAD,
						U.IDSUCURSAL, U.SUCURSAL, F.COMUNA, US.RUT,
						US.NOMBRE, IC.SLA_TIPO, IC.SLA_QUANTITY
    ";
		if ($row = $con->query($sql)) {
			$return = array();
      while ($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }

      return $return;
		} else {
			return "Error";
		}
	} else {
    return "Error";
	}
}

function datosProblemasPracticasPersonas($rutUser, $pat, $mes,$ano,$familia,$categoria,$rutJefe){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PROBLEMAS_PRACTICAS_PERSONAS('{$rutUser}','{$pat}','{$mes}','{$ano}','{$familia}','{$categoria}','{$rutJefe}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['child'] = datosProblemasPracticasFallaPersonas($array['TEXTOFAMILIA'], $array['CATEGORIA'], $mes, $ano, $array['RUTPERSONAL']);
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listarIncidenciaEstructura($idArea, $idDepartamento) {
  $con = conectar();
  if($con != 'No conectado') {
    $sql = "SELECT
      str.IDINCIDENCIA_ESTRUCTURA,
        are.IDAREA,
        are.NOMBRE as AREA,
        dep.IDINCIDENCIA_DEPARTAMENTO as IDDEPAR,
        dep.ELEMENTO as DEPAR,
        itm.IDINCIDENCIA_ITEM as IDITEM,
        itm.ITEM as ITEM,
        elm.IDINCIDENCIA_ELEMENTO as IDELEME,
        elm.ELEMENTO as ELEME,
        anm.IDINCIDENCIA_ANOMALIA as IDANOMA,
        anm.ELEMENTO as ANOMA,
        alr.IDINCIDENCIA_ALERTA as IDALERT,
        alr.ELEMENTO as ALERT,
        alr.PRIORIDAD
    from INCIDENCIA_ESTRUCTURA str
    inner join AREA are on are.IDAREA = str.IDAREA
    inner join INCIDENCIA_DEPARTAMENTO dep on dep.IDINCIDENCIA_DEPARTAMENTO = str.IDINCIDENCIA_DEPARTAMENTO
    inner join INCIDENCIA_ITEM itm on itm.IDINCIDENCIA_ITEM = str.IDINCIDENCIA_ITEM
    inner join INCIDENCIA_ELEMENTO elm on elm.IDINCIDENCIA_ELEMENTO = str.IDINCIDENCIA_ELEMENTO
    inner join INCIDENCIA_ANOMALIA anm on anm.IDINCIDENCIA_ANOMALIA = str.IDINCIDENCIA_ANOMALIA
    inner join INCIDENCIA_ALERTA alr on alr.IDINCIDENCIA_ALERTA = str.IDINCIDENCIA_ALERTA
		ORDER BY are.NOMBRE ASC, dep.ELEMENTO ASC, itm.ITEM ASC, elm.ELEMENTO ASC, anm.ELEMENTO ASC, alr.ELEMENTO ASC ";
    /*where are.IDAREA = " . $idArea . " and dep.IDINCIDENCIA_DEPARTAMENTO = " . $idDepartamento . ";";*/
    if ($row = $con->query($sql)) {
			$return = array();
      while ($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }

      return $return;
		} else {
			return "Error";
		}
	} else {
		return "Error";
	}
}

function datosProblemasPracticasFallaPersonas($familia, $categoria, $mes, $ano,$rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT FE.TEXTOFAMILIA 'RUTPERSONAL', FE.TEXTOCATEGORIA 'NOMBREPERSONAL', FE.TEXTOSUBFAMILIA2 'FAMILIA', COUNT(FR.idFORMULARIO) 'CANTIDAD'
		FROM FORMULARIO_RESULTADOS FR
		LEFT JOIN FORMULARIO_ESTRUCTURAS FE
		ON FR.idFORMULARIO_ESTRUCTURAS = FE.id
		AND FR.CATEGORIA = FE.CATEGORIA
		LEFT JOIN FORMULARIO F
		ON FR.idFORMULARIO = F.idFORMULARIO
		LEFT JOIN FORMULARIO_PERSONAL FP
		ON FR.idFORMULARIO = FP.IDFORMULARIO
		LEFT JOIN PERSONAL P
		ON FP.IDPERSONAL = P.IDPERSONAL
		WHERE FE.TIPO = 'options'
		AND MONTH(F.FECHA) = '{$mes}'
		AND YEAR(F.FECHA) = '{$ano}'
		AND FE.TEXTOFAMILIA = '{$familia}'
		AND FE.TEXTOCATEGORIA = '{$categoria}'
		AND P.DNI = '{$rut}'
		GROUP BY FE.TEXTOFAMILIA, FE.TEXTOSUBFAMILIA2
		ORDER BY COUNT(FR.idFORMULARIO) DESC";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosPatentesDisponibles($rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT P.IDPATENTE, P.CODIGO 'PATENTE', E.ESTADO
FROM PATENTE P
LEFT JOIN PATENTE_ESTADO E
ON P.IDPATENTE_ESTADO = E.IDPATENTE_ESTADO
WHERE E.MANT_USUARIO = 'NO'
AND E.ESTADO NOT IN
(
'BAJA'
'ELIMINADO',
'SINIESTRO'
)
UNION ALL
SELECT P.IDPATENTE, P.CODIGO 'PATENTE', E.ESTADO
FROM PATENTE P
LEFT JOIN PATENTE_ESTADO E
ON P.IDPATENTE_ESTADO = E.IDPATENTE_ESTADO
LEFT JOIN PERSONAL T
ON P.IDPATENTE = T.IDPATENTE
WHERE T.DNI = '{$rut}'
";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosProblemasPracticasJefes($rutUser, $pat, $mes,$ano,$val){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL PROBLEMAS_PRACTICAS_JEFES('{$rutUser}','{$pat}','{$mes}','{$ano}','{$val}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Historial Vehiculos
function consultaHistorialVehiculo($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, idHISTORIAL_PATENTE 'ID', PATENTE, ESTADO_VEHICULO, ESTADO_CONTROL, ESTADO_RRHH, TIPO_VEHICULO, PROPIEDAD, MARCA, MODELO, PROVEEDOR, PERSONAL_ASIGNADO, RUT_ASIGNADO, BODEGA, SERVICIO, CLIENTE, ACTIVIDAD,
		ASEGURADORA, SUBCONTRATISTA, KILOMETRAJE, AÑO, VIN, COLOR, FINICIO, FTERMINO, TIPOMONTO, MONTO, MONTO_ASEGURADORA, FMANTENIMIENTO, PDFREVTEC, PDFPERMCIRC, PDFASEG, PDFOTROS, FECHA_HISTORIAL, HORA_HISTORIAL, OBSERVACION, USUARIO, NRO_MOTOR, LITROS_ESTANQUE
		FROM PATENTE_HISTORIAL
		WHERE PATENTE = '$patente'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Patente para Historial (LOG)
function consultaPatenteEspecifica($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT P.IDPATENTE_ESTADO, P.IDPATENTE_TIPOVEHICULO, P.IDPATENTE_PROPIEDAD, P.IDPATENTE_MARCAMODELO, P.IDPATENTE_PROVEEDOR, P.IDSUCURSAL, P.IDESTRUCTURA_OPERACION,
		P.IDPATENTE_ASEGURADORA, P.IDSUBCONTRATISTAS, P.KILOMETRAJE, P.AÑO, P.VIN, P.IDPATENTE_COLOR, P.FINICIO, P.FTERMINO, P.TIPOMONTO, P.MONTO, P.MONTO_ASEGURADORA,
		P.FMANTENIMIENTO, P.OPERACION, P.NRO_MOTOR, P.LITROS_ESTANQUE,
		E.CODIGO 'PATENTE_ORIGINAL'
		FROM PATENTE P
		LEFT JOIN PATENTE E
		ON P.PATENTE_ORIGINAL = E.IDPATENTE
		WHERE P.CODIGO = '$patente'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Historial Patente (Vehiculos)
function ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
$docPDFOtrosVh1, $mensaje, $rutUsuario, $operacion, $nMotor, $patenteOriginal, $litros){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESA_HISTORIAL_PATENTE('{$patente}','{$estadoVeh}','{$estadoControl}','{$estadoRrhh}','{$tipoVeh}','{$propiedad}','{$marcaModelo}','{$proveedor}','{$personalAsig}','{$rutAsig}',
		'{$bodega}','{$estructOperac}','{$aseguradora}', '{$subcontratista}','{$kilometraje}','{$ano}','{$vin}','{$color}','{$fInicio}','{$fTermino}','{$tipoMonto}','{$monto}','{$montoAseg}','{$fMantto}',
		'{$docPDFRev1}','{$frealizada}','{$fcaducidad}','{$docPDFCir1}','{$frealizadaCir}','{$fcaducidadCir}','{$docPDFAsegur1}','{$docPDFOtrosVh1}','{$mensaje}','{$rutUsuario}', '$operacion', '$nMotor', '$patenteOriginal', '$litros')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			return $sql;
			$con->query("ROLLBACK");
			// return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Listado Subcontratistas para select ingreso Personal Externo
function consultaTipoSubcontratista(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDSUBCONTRATO, RUT, NOMBRE_SUBCONTRATO, ESTADO
FROM SUBCONTRATISTAS WHERE ESTADO = 'Activo'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	// Consulta para chequear Personal Externo
	function chequeaPExterno($rut){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDPERSONAL
	FROM PERSONAL
	WHERE DNI = '" . $rut . "'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
	function ingresaPExterno($rutPExterno, $apellidosPExterno,$nombresPExterno,$fechaNac,$sexoIngreso,$estadoCivil,$sitMilitar,$telefono,$telefonoEmergencia,$contacto,$nacionalidad,$ceco,$contrato,$cliente,$actividad,$fechaIngreso,$clasificacion,$cargo,$nivel,$tipoContrato,$requiereUniforme,$tallaIngreso,$poseeLicencia,$tipoLicencia,$sucursal,$tipoJornada,$subcontrato){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "INSERT INTO PERSONAL(DNI, APELLIDOS, NOMBRES, FECHA_NACIMIENTO, SEXO, IDESTADO_CIVIL, SITUACION_MILITAR, TELEFONO, TELEFONO_EMERGENCIA, CONTACTO_EMERGENCIA, IDNACIONALIDAD, CLASIFICACION, CARGO, IDNIVELFUNCIONAL, REQUIERE_UNIFORME, IDTIPO_CONTRATO,TALLA_UNIFORME,POSEE_LICENCIA,IDTIPO_LICENCIA,IDAREAFUNCIONAL_COMUNA_NAC,IDTIPO_JORNADA,IDSUBCONTRATISTAS,EXTERNO,IDESTADO_SOLICITUD)
		VALUES ( '{$rutPExterno}','{$apellidosPExterno}','{$nombresPExterno}','{$fechaNac}','{$sexoIngreso}','{$estadoCivil}','{$sitMilitar}','{$telefono}','{$telefonoEmergencia}','{$contacto}','{$nacionalidad}','{$clasificacion}','{$cargo}','{$nivel}','{$requiereUniforme}', '{$tipoContrato}','{$tallaIngreso}','{$poseeLicencia}','{$tipoLicencia}','{$sucursal}','{$tipoJornada}','{$subcontrato}',1,3)";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}

	function datosSubcontratistaVehiculoInterno(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDSUBCONTRATO, NOMBRE_SUBCONTRATO
			FROM SUBCONTRATISTAS
			WHERE ESTADO = 'Activo'
			AND INTERNO = 1";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

// Consulta Personal, rut, er, ec para Historial (LOG)
function consultaPatenteHistorial($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT P.CODIGO 'PATENTE', initCap(CONCAT(T.NOMBRES,' ', T.APELLIDOS)) 'PERSONAL', T.DNI, CPE.PERSONAL_ESTADO_CONCEPTO 'ESTADO_PERSONAL', CPO.PERSONAL_ESTADO_CONCEPTO_OPER 'ESTADO_CONTROL'
		FROM PATENTE P
		LEFT JOIN PATENTE_PERSONAL PP
		ON P.IDPATENTE = PP.IDPATENTE
		LEFT JOIN PERSONAL T
		ON PP.IDPERSONAL = T.IDPERSONAL
		LEFT JOIN PERSONAL_ESTADO PE
		ON T.IDPERSONAL = PE.IDPERSONAL
		LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
		ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
		LEFT JOIN PERSONAL_ESTADO_OPER PO
		ON T.IDPERSONAL = PO.IDPERSONAL
		LEFT JOIN PERSONAL_ESTADO_CONCEPTO_OPER CPO
		ON PO.IDPERSONAL_ESTADO_CONCEPTO_OPER = CPO.IDPERSONAL_ESTADO_CONCEPTO_OPER
		WHERE CODIGO = '$patente'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaPersonalGestOperacion($dni,$apellidos,$nombres,$cargo,$externo,$idpatente,$fono,$mail,$idsubcontrato,$nivel,$mano){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO PERSONAL(DNI, APELLIDOS, NOMBRES, CARGO, EXTERNO, IDPATENTE, TELEFONO, EMAIL, IDSUBCONTRATISTAS, IDESTADO_SOLICITUD, IDNIVELFUNCIONAL, CLASIFICACION)
              VALUES('{$dni}','{$apellidos}','{$nombres}','{$cargo}','{$externo}',
              CASE WHEN '{$idpatente}' = -1
              THEN NULL
              ELSE '{$idpatente}' END
              ,'{$fono}','{$mail}','{$idsubcontrato}','3','{$nivel}','{$mano}')";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function ingresaPersonalGestOperacionEvol($dni,$apellidos,$nombres,$cargo,$fono,$mail,$idsubcontrato){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PERSONAL(
			DNI,
			APELLIDOS,
			NOMBRES,
			CARGO,
			TELEFONO,
			EMAIL,
			IDSUBCONTRATISTAS,
			IDESTADO_SOLICITUD
		) VALUES (
			$dni,
			$apellidos,
			$nombres,
			$cargo,
			$fono,
			$mail,
			$idsubcontrato,
			'3'
		)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return $sql;
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresaPersonalGestOperacionACT($dni,$sucursal,$idCeco,$idSubcontrato,$nomenclatura){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO ACT(IDPERSONAL,IDSUCURSAL, IDESTRUCTURA_OPERACION)
              VALUES
              (
               (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '{$dni}'),
               CASE WHEN '{$sucursal}' = -1
	              THEN NULL
	              ELSE '{$sucursal}' END,
               '{$idCeco}'
              )";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function ingresaPersonalGestOperacionACTEvol($dni, $sucursal, $idCeco){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO ACT(
			IDPERSONAL,
			IDSUCURSAL,
			IDESTRUCTURA_OPERACION
		) VALUES (
			(SELECT IDPERSONAL FROM PERSONAL WHERE DNI = $dni),
			CASE WHEN $sucursal = -1
			THEN NULL
			ELSE $sucursal END,
			$idCeco
		)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return $sql;
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function completaPersonalGestOperacion(
	$dni,

	$esProvisorio, $domicilio, $comuna, $ciudad, $fechaNacimiento, $nacionalidad,
	$sexo, $puebloOriginario, $esHispanoHablante, $nivelEstudios, $sabeLeer,
	$sabeEscribir, $tieneLicencia, $claseLicencia, $fechaVencimientoLicencia,
	$estadoCivil, $nombreContactoEmergencia, $fonoContactoEmergencia, $tallaPolera,
	$tallaGuantes, $tallaPantalon, $tallaZapatos, $tallaLegionario, $tallaOveroll,
	$tallaOtros, $tieneFamiliarEmpresa, $nombreFamiliarEmpresa, $cargoFamiliaEmpresa,
	$parentescoFamiliaEmpresa, $esRepitente, $cargoRepitente, $razonRepitente,

	$afiliacionPrevision, $afiliacionSalud,

	$banco, $tipoCuenta, $nroCuenta,

	$lstCertificados, $lstCertificadosOtros, $tieneClaveUnica,

	$fechaIngresoEmpresa, $tipoContrato, $duracionContrato, $cargoGenerico,
	$jeas, $ref1, $ref2, $plaza
) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if ($con != 'No conectado') {
		$sql = "UPDATE PERSONAL SET
			TEMPORAL = $esProvisorio,

			DOMICILIO = $domicilio,
			IDAREAFUNCIONAL_COMUNA_NAC = $comuna,
			CIUDAD = $ciudad,

			FECHA_NACIMIENTO = $fechaNacimiento,
			NACIONALIDAD = $nacionalidad,
			SEXO = $sexo,
			PUEBLO_ORIGINARIO = $puebloOriginario,
			HABLA_ESPANIOL = $esHispanoHablante,
			IDNIVEL_EDUCACIONAL = $nivelEstudios,
			LEE = $sabeLeer,
			ESCRIBE = $sabeEscribir,
			POSEE_LICENCIA = $tieneLicencia,
			IDTIPO_LICENCIA = $claseLicencia,
			FECHA_VENCIMIENTO_LICENCIA = $fechaVencimientoLicencia,
			IDESTADO_CIVIL = $estadoCivil,
			CONTACTO_EMERGENCIA = $nombreContactoEmergencia,
			TELEFONO_EMERGENCIA = $fonoContactoEmergencia,
			TALLA_POLERA = $tallaPolera,
			TALLA_GUANTES = $tallaGuantes,
			TALLA_PANTALON = $tallaPantalon,
			TALLA_ZAPATOS = $tallaZapatos,
			TALLA_LEGIONARIO = $tallaLegionario,
			TALLA_OVEROLL = $tallaOveroll,
			TALLA_OTROS = $tallaOtros,
			FAMILIAR_EMPRESA = $tieneFamiliarEmpresa,
			FAMILIAR_EMPRESA_NOMBRE = $nombreFamiliarEmpresa,
			FAMILIAR_EMPRESA_CARGO = $cargoFamiliaEmpresa,
			FAMILIAR_EMPRESA_PARENTESCO = $parentescoFamiliaEmpresa,
			TRABAJO_ANTERIORMENTE = $esRepitente,
			TRABAJO_ANTERIORMENTE_CARGO = $cargoRepitente,
			TRABAJO_ANTERIORMENTE_RAZON_SALIDA = $razonRepitente,

			IDSALUD = $afiliacionPrevision,
			IDAFP = $afiliacionSalud,

			IDBANCO = $banco,
			BANCO_TIPO_CUENTA = $tipoCuenta,
			BANCO_CUENTA = $nroCuenta,

			CERTIFICADOS = $lstCertificados,
			OTROS_DOCUMENTOS = $lstCertificadosOtros,
			CLAVE_UNICA = $tieneClaveUnica,

			FECHA_INGRESO = $fechaIngresoEmpresa,
			IDTIPO_CONTRATO = $tipoContrato,
			DURACION_INICIAL_CONTRATO = $duracionContrato,
			CARGO_GENERICO_CODIGO = $cargoGenerico,
			REFERENCIA1 = $ref1,
			REFERENCIA2 = $ref2,
			PLAZA_SECTOR = $plaza
		WHERE DNI = $dni;";
    if ($con->query($sql)) {
			$con->query("COMMIT");
			return $sql;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return $sql;
		}
	} else {
    $con->query("ROLLBACK");
		return "Error";
	}
}

function ingresaPersonalGestOperacionPatente($idpatente,$servicio,$cliente,$actividad){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE PATENTE
              SET IDPATENTE_ESTADO = 1,
							IDESTRUCTURA_OPERACION =
							(SELECT IDESTRUCTURA_OPERACION
							FROM ESTRUCTURA_OPERACION
							WHERE IDSERVICIO = '{$servicio}'
							AND IDCLIENTE = '{$cliente}'
							AND IDACTIVIDAD = '{$actividad}')
              WHERE IDPATENTE = '{$idpatente}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function editaPersonalGestOperacionPatente($codigo){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE PATENTE
							SET IDPATENTE_ESTADO = 2
							WHERE CODIGO = '{$codigo}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function editaPersonalGestOperacion($dni,$apellidos,$nombres,$cargo,$externo,$idpatente,$fono,$mail,$idsubcontrato,$nivel,$mano){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE PERSONAL
							SET APELLIDOS = '{$apellidos}',
							NOMBRES  = '{$nombres}',
							CARGO = '{$cargo}',
							EXTERNO = '{$externo}',
							IDPATENTE =
							(
									CASE WHEN '{$idpatente}' = '-1'
									THEN NULL ELSE '{$idpatente}' END
							)
							,
							TELEFONO = '{$fono}',
							EMAIL = '{$mail}',
							IDSUBCONTRATISTAS = '{$idsubcontrato}',
							IDNIVELFUNCIONAL = '{$nivel}',
							CLASIFICACION = '{$mano}'
							WHERE DNI = '{$dni}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function editaPersonalGestOperacionEvol($dni,$apellidos,$nombres,$cargo,$fono,$mail,$idsubcontrato){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE PERSONAL SET
			APELLIDOS = $apellidos,
			NOMBRES  = $nombres,
			CARGO = $cargo,
			TELEFONO = $fono,
			EMAIL = $mail,
			IDSUBCONTRATISTAS = $idsubcontrato
		WHERE DNI = $dni";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return $sql;
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function editaPersonalGestOperacionACT($dni,$sucursal,$idCeco,$idSubcontrato,$nomenclatura){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE ACT
							SET IDSUCURSAL =
							CASE WHEN '{$sucursal}' = -1
              THEN NULL
              ELSE '{$sucursal}' END,
							IDESTRUCTURA_OPERACION =
							CASE WHEN '{$idCeco}' = -1
              THEN NULL
              ELSE '{$idCeco}' END
							WHERE IDPERSONAL =
							(
								SELECT IDPERSONAL
								FROM PERSONAL
								WHERE DNI = '{$dni}'
							)";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
				// return $sql;
      }
      else{
				// return $sql;
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function editaPersonalGestOperacionACTEvol($dni,$sucursal,$idCeco) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ACT SET
			IDSUCURSAL =
						CASE WHEN $sucursal = -1 THEN NULL
						ELSE $sucursal END,
			IDESTRUCTURA_OPERACION =
						CASE WHEN $idCeco = -1 THEN NULL
						ELSE $idCeco END
			WHERE IDPERSONAL = (
				SELECT IDPERSONAL FROM PERSONAL WHERE DNI = $dni
			)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
			// return $sql;
		} else {
			// return $sql;
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Asignacion Vehiculos
function consultaAsignacionVehiculo($rut,$path,$ano,$mes){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_ASIGNACIONES('{$rut}','{$path}','{$ano}','{$mes}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Personal  para Asignacion
function datosPersonalAsignacion($rut, $path){
	$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "CALL PERSONAL_ASIGNACION_PERMISOS ('{$rut}','{$path}')";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

// Consultas Personal Select para Asignacion
function datosPersonalSelectAsignacion($rut){
	$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "SELECT P.IDPERSONAL, initCap(CONCAT(P.NOMBRES, ' ', P.APELLIDOS)) 'PERSONAL',
							P.DNI, (SELECT REPLACE(P.DNI,'-','')) 'NUEVODNI',
							CPE.PERSONAL_ESTADO_CONCEPTO 'ESTADO_PERSONAL', CPO.PERSONAL_ESTADO_CONCEPTO_OPER 'ESTADO_CONTROL',
							GROUP_CONCAT(PC.CELULAR SEPARATOR '/') 'TELEFONO', P.IDPATENTE, A.IDESTRUCTURA_OPERACION 'IDESTRUCTURA',
							initCap(CONCAT_WS(' - ',C.GERENCIA, C.SERVICIO,L.CLIENTE)) 'ESTRUCTURA',
							EO.NOMENCLATURA
							FROM PERSONAL P
							LEFT JOIN ACT A
							ON P.IDPERSONAL = A.IDPERSONAL
							LEFT JOIN ESTRUCTURA_OPERACION EO
							ON A.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
							LEFT JOIN SERVICIO C
							ON EO.IDSERVICIO = C.IDSERVICIO
							LEFT JOIN CLIENTE L
							ON EO.IDCLIENTE = L.IDCLIENTE
							LEFT JOIN PERSONAL_ESTADO PE
							ON P.IDPERSONAL = PE.IDPERSONAL
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
							OR PE.FECHA_TERMINO IS NULL)
							AND PE.FECHA_INICIO =
							(
							SELECT MAX(EE.FECHA_INICIO)
							FROM PERSONAL_ESTADO EE
							WHERE EE.IDPERSONAL = P.IDPERSONAL
							AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
							ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
							LEFT JOIN PERSONAL_ESTADO_OPER PO
							ON P.IDPERSONAL = PO.IDPERSONAL
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PO.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PO.FECHA_TERMINO
							OR PO.FECHA_TERMINO IS NULL)
							AND PO.FECHA_INICIO =
							(
							SELECT MAX(KK.FECHA_INICIO)
							FROM PERSONAL_ESTADO_OPER KK
							WHERE KK.IDPERSONAL = P.IDPERSONAL
							AND KK.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO_OPER CPO
							ON PO.IDPERSONAL_ESTADO_CONCEPTO_OPER = CPO.IDPERSONAL_ESTADO_CONCEPTO_OPER
							LEFT JOIN PERSONAL_CELULAR PC
							ON P.DNI = PC.DNI
							WHERE ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
							AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
							OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)
							AND (CPO.PERSONAL_ESTADO_CONCEPTO_OPER = 'Presente'
							OR CPO.PERSONAL_ESTADO_CONCEPTO_OPER IS NULL)
							AND P.IDPATENTE IS NULL
							AND P.DNI = '{$rut}'
							GROUP BY P.IDPERSONAL, initCap(CONCAT(P.NOMBRES, ' ', P.APELLIDOS)),
							P.DNI, (SELECT REPLACE(P.DNI,'-','')),
							CPE.PERSONAL_ESTADO_CONCEPTO, CPO.PERSONAL_ESTADO_CONCEPTO_OPER,
							P.IDPATENTE, A.IDESTRUCTURA_OPERACION,
							initCap(CONCAT_WS(' - ',C.GERENCIA, C.SERVICIO,L.CLIENTE)),
							EO.NOMENCLATURA";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

// Consultas Patente para Asignacion
function consultaPatenteAsignacion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.IDPATENTE, p.CODIGO, p.AÑO, p.KILOMETRAJE, pm2.MARCA, pm2.MODELO,
						CONCAT_WS(' ',pe.ESTADO, pe.SUB_ESTADO1) 'ESTADO'
						FROM PATENTE p
						LEFT JOIN PATENTE_ESTADO pe
						ON p.IDPATENTE_ESTADO = pe.IDPATENTE_ESTADO
						LEFT JOIN PATENTE_MARCAMODELO pm2
						ON p.IDPATENTE_MARCAMODELO = pm2.IDPATENTE_MARCAMODELO
						WHERE pe.ESTADO = 'DISPONIBLE'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Patente Select Asignacion
function datosPatenteSelectAsignacion($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.IDPATENTE, p.CODIGO, p.AÑO, p.KILOMETRAJE, pm2.MARCA 'MARCA',
		pm2.MODELO 'MODELO', pt2.LICENCIA 'LICENCIA', pt2.CHECKTIPO 'TIPO',
		initCap(CONCAT(a.COMUNA, ' - ', s.SUCURSAL)) 'BODEGA'
		FROM PATENTE p
		LEFT JOIN SUCURSAL s
		ON p.IDSUCURSAL = s.IDSUCURSAL
		LEFT JOIN AREAFUNCIONAL a
		ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
		LEFT JOIN PATENTE_MARCAMODELO pm2
		ON p.IDPATENTE_MARCAMODELO = pm2.IDPATENTE_MARCAMODELO
		LEFT JOIN PATENTE_TIPOVEHICULO pt2
		ON p.IDPATENTE_TIPOVEHICULO = pt2.IDPATENTE_TIPOVEHICULO
		WHERE p.IDPATENTE = '$patente'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresarDisponibilidadInduccion($rut, $rutUsuario){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
		SELECT P.IDPERSONAL, C.IDPERSONAL_ESTADO_CONCEPTO_OPER,
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%Y-%m-%d'),
'Presente', '{$rutUsuario}'
FROM PERSONAL P, PERSONAL_ESTADO_CONCEPTO_OPER C
WHERE P.DNI = '{$rut}'
AND C.PERSONAL_ESTADO_CONCEPTO_OPER = 'Presente Inducción'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarIncidencia($rutauditor, $idIncidencia, $idOperacion, $idSucursal, $idPersonal, $idPatente, $observaciones, $file) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
    $idPersonalOrNull = isset($idPersonal) ? $idPersonal : 'null';
    $idPatenteOrNull = isset($idPatente) ? $idPatente : 'null';
		$sql = "call sp_incidencia_insertar("
    . $idIncidencia . "," . $idOperacion . "," . $idSucursal . "," . $idPersonalOrNull . "," . $idPatenteOrNull . ",'" . $rutauditor . "','" . $observaciones . "'
    )";
    if ($row = $con->query($sql)) {
      $con->query("COMMIT");
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else {
      $con->query("ROLLBACK");
      return "Error";
    }
	} else {
    $con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarIncidenciaFoto($idIncidencia, $file) {
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "UPDATE INCIDENCIA_RESULTADO
      SET FILE = '{$file}'
      WHERE IDINCIDENCIA_RESULTADO = {$idIncidencia}";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    }
    else{
      // return $con->error;
      $con->query("ROLLBACK");
      return "Error";
    }
  }
  else{
    $con->query("ROLLBACK");
    return "Error";
  }
}

function ingresarHistorialIncidencia($idIncidencia, $rutUsuario, $observaciones) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT into INCIDENCIA_HISTORIAL(
     IDINCIDENCIA_RESULTADO,
     IDINCIDENCIA_ESTRUCTURA,
     IDESTRUCTURA_OPERACION,
     IDSUCURSAL,
     RUT_AUDITOR,
     RUT_RESOLUTOR,
     OBSERVACIONES,
     FECHA,
     HORA,
     IDPATENTE,
     IDPERSONAL,
     IDINCIDENCIA_CONFIGURACION,
     IDINCIDENCIA_ESTADO,
     IDUSUARIO_DERIVADO,
     IDEJECUTOR,
     FECHAHIST,
     HORAHIST
    ) SELECT
        IDINCIDENCIA_RESULTADO,
        IDINCIDENCIA_ESTRUCTURA,
        IDESTRUCTURA_OPERACION,
        IDSUCURSAL,
        RUT_AUDITOR,
        RUT_RESOLUTOR,
        '{$observaciones}',
        FECHA,
        HORA,
        IDPATENTE,
        IDPERSONAL,
        IDINCIDENCIA_CONFIGURACION,
        IDINCIDENCIA_ESTADO,
        IDUSUARIO_DERIVADO,
        (
          SELECT IDUSUARIO
          FROM USUARIO
          WHERE RUT = '{$rutUsuario}'
        ),
        DATE_FORMAT(NOW(),'%Y-%m-%d'),
        DATE_FORMAT(NOW(),'%H:%i')
      FROM INCIDENCIA_RESULTADO
      WHERE IDINCIDENCIA_RESULTADO = " . $idIncidencia . "
    ";
    if($con->query($sql)){
      $con->query("COMMIT");
      return "Ok";
    } else {
      $con->query("ROLLBACK");
      return "Error";
    }
	} else {
    $con->query("ROLLBACK");
		return "Error";
	}
}

function listadoIncidenciaEstados() {
  $con = conectar();
  if ($con != 'No conectado') {
    $sql = "SELECT
      IDINCIDENCIA_ESTADO,
      ESTADO,
      COLOR
      FROM INCIDENCIA_ESTADO
    ";
    if ($row = $con->query($sql)) {
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function actualizarIncidenciaEstado($rutUsuario, $idIncidencia, $idEstado, $idUsuarioDerivado) {
  $con = conectar();
  $con->query("START TRANSACTION");
	if($con != 'No conectado'){
    $sql = "";
    if ($idUsuarioDerivado !== '') {
      $sql = "UPDATE INCIDENCIA_RESULTADO SET IDUSUARIO_DERIVADO = " . $idUsuarioDerivado . " WHERE IDINCIDENCIA_RESULTADO = " . $idIncidencia;
    } else {
		  $sql = "UPDATE INCIDENCIA_RESULTADO
							SET IDINCIDENCIA_ESTADO = '{$idEstado}',
							FECHA_CONFIRMACION =
							(
								CASE WHEN
								(
									SELECT ESTADO
									FROM INCIDENCIA_ESTADO
									WHERE IDINCIDENCIA_ESTADO = '{$idEstado}'
								) = 'Confirmada'
								THEN
									NOW()
								ELSE
									NULL
								END
							)
							WHERE IDINCIDENCIA_RESULTADO = '{$idIncidencia}'";
    }
    if($con->query($sql)){
      $con->query("COMMIT");
      return "Ok";
    } else {
      return "Error";
    }
	} else {
		return "Error";
	}
}

function consultaIncidencia($idIncidenciaResultado) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INCIDENCIAS_ASIGNADAS_UN_DATO('{$idIncidenciaResultado}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaIncidenciaHistorial($idIncidenciaResultado) {
  $con = conectar();
  if ($con != 'No conectado') {
    $sql = "SELECT
        res.IDINCIDENCIA_HISTORIAL,
        '' as S,
        ies.ESTADO 'ESTADO',
        str.IDINCIDENCIA_ESTRUCTURA,
        are.IDAREA,
        are.NOMBRE as AREA,
        itm.IDINCIDENCIA_ITEM as IDITEM,
        itm.ITEM as ITEM,
        elm.IDINCIDENCIA_ELEMENTO as IDELEME,
        elm.ELEMENTO as ELEME,
        anm.IDINCIDENCIA_ANOMALIA as IDANOMA,
        anm.ELEMENTO as ANOMA,
        dep.IDINCIDENCIA_DEPARTAMENTO as IDDEPAR,
        dep.ELEMENTO as DEPAR,
        alr.IDINCIDENCIA_ALERTA as IDALERT,
        alr.ELEMENTO as ALERT,
        alr.PRIORIDAD,
        oper.IDESTRUCTURA_OPERACION,
        sv.IDSERVICIO as IDSERV,
        sv.SERVICIO as SERV,
        cl.IDCLIENTE as IDCLIE,
        cl.CLIENTE as CLIE,
        ac.IDACTIVIDAD as IDACT,
        ac.ACTIVIDAD as ACT,
        res.RUT_AUDITOR,
        (
          case when res.IDUSUARIO_DERIVADO is not null then
            (select CONCAT(RUT, ' - ', NOMBRE) from USUARIO where IDUSUARIO = res.IDUSUARIO_DERIVADO)
          else
            CONCAT(usr.RUT, ' - ', usr.NOMBRE)
          end
        ) as RESOLUTOR,
        res.OBSERVACIONES,
        res.FECHAHIST as FECHA,
        res.HORAHIST as HORA,
        CONCAT(cnf.SLA_QUANTITY, ' ', cnf.SLA_TIPO) 'SLA',
				CONCAT((
	        case when cnf.SLA_TIPO = 'Días' then DATEDIFF((res.FECHA+cnf.SLA_QUANTITY), NOW())
	        else
	          case when cnf.SLA_TIPO = 'Horas' then TIMESTAMPDIFF(HOUR, CONCAT(res.FECHA, ' ', res.HORA), NOW())
	          else ' ' end
	        end
	      ), ' ', cnf.SLA_TIPO)
        as DIFF,
        concat(eje.RUT, ' - ', eje.NOMBRE) as EJECUTOR
      from INCIDENCIA_HISTORIAL res
      inner join INCIDENCIA_ESTRUCTURA str on str.IDINCIDENCIA_ESTRUCTURA = res.IDINCIDENCIA_ESTRUCTURA
      inner join AREA are on are.IDAREA = str.IDAREA
      inner join INCIDENCIA_DEPARTAMENTO dep on dep.IDINCIDENCIA_DEPARTAMENTO = str.IDINCIDENCIA_DEPARTAMENTO
      inner join INCIDENCIA_ITEM itm on itm.IDINCIDENCIA_ITEM = str.IDINCIDENCIA_ITEM
      inner join INCIDENCIA_ELEMENTO elm on elm.IDINCIDENCIA_ELEMENTO = str.IDINCIDENCIA_ELEMENTO
      inner join INCIDENCIA_ANOMALIA anm on anm.IDINCIDENCIA_ANOMALIA = str.IDINCIDENCIA_ANOMALIA
      inner join INCIDENCIA_ALERTA alr on alr.IDINCIDENCIA_ALERTA = str.IDINCIDENCIA_ALERTA
      inner join ESTRUCTURA_OPERACION oper on oper.IDESTRUCTURA_OPERACION = res.IDESTRUCTURA_OPERACION
      inner join SERVICIO sv on sv.IDSERVICIO = oper.IDSERVICIO
      inner join CLIENTE cl on cl.IDCLIENTE = oper.IDCLIENTE
      inner join ACTIVIDAD ac on ac.IDACTIVIDAD = oper.IDACTIVIDAD
      left join INCIDENCIA_CONFIGURACION cnf
      on cnf.IDAREA = str.IDAREA
      and cnf.IDSUCURSAL = res.IDSUCURSAL
      and cnf.IDINCIDENCIA_ITEM = str.IDINCIDENCIA_ITEM
      and cnf.IDINCIDENCIA_DEPARTAMENTO = str.IDINCIDENCIA_DEPARTAMENTO
      and cnf.IDESTRUCTURA_OPERACION = res.IDESTRUCTURA_OPERACION
      left join USUARIO usr on usr.IDUSUARIO = cnf.IDUSUARIO
      left join USUARIO eje on eje.IDUSUARIO = res.IDEJECUTOR
      left join INCIDENCIA_ESTADO ies on res.IDINCIDENCIA_ESTADO = ies.IDINCIDENCIA_ESTADO
      where res.IDINCIDENCIA_RESULTADO = " . $idIncidenciaResultado;
    if ($row = $con->query($sql)) {
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaIncidenciasPeriodos(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(I.FECHA, '%Y-%m') 'PERIODO'
    FROM INCIDENCIA_RESULTADO I
    GROUP BY DATE_FORMAT(I.FECHA, '%Y-%m')
    ORDER BY DATE_FORMAT(I.FECHA, '%Y-%m') DESC";
		if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaIncidencias($rutUsuario, $fecIni, $fecEnd){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL INCIDENCIAS_ASIGNADAS('{$rutUsuario}','{$fecIni}','{$fecEnd}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaIncidenciasSinConfiguracion($rutauditor){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
' ' as S,
I.IDINCIDENCIA_ITEM,
I.IDINCIDENCIA_DEPARTAMENTO,
I.IDAREA,
R.NOMBRE 'AREA',
T.ITEM,
D.ELEMENTO 'DEPARTAMENTO',
O.IDESTRUCTURA_OPERACION,
S.SERVICIO,
L.CLIENTE,
A.ACTIVIDAD,
U.IDSUCURSAL,
U.SUCURSAL,
F.COMUNA,
US.RUT 'DNI_RESOLUTOR',
US.NOMBRE 'NOMBRE_RESOLUTOR',
CONCAT_WS(' ', IC.SLA_QUANTITY, IC.SLA_TIPO)'SLA',
IC.IDINCIDENCIA_CONFIGURACION
FROM INCIDENCIA_ESTRUCTURA I
LEFT JOIN AREA R ON I.IDAREA = R.IDAREA
LEFT JOIN INCIDENCIA_DEPARTAMENTO D ON I.IDINCIDENCIA_DEPARTAMENTO = D.IDINCIDENCIA_DEPARTAMENTO
LEFT JOIN INCIDENCIA_ITEM T ON I.IDINCIDENCIA_ITEM = T.IDINCIDENCIA_ITEM
LEFT JOIN INCIDENCIA_ELEMENTO E ON I.IDINCIDENCIA_ELEMENTO = E.IDINCIDENCIA_ELEMENTO
LEFT JOIN INCIDENCIA_ANOMALIA IA ON I.IDINCIDENCIA_ANOMALIA = IA.IDINCIDENCIA_ANOMALIA
JOIN ESTRUCTURA_OPERACION O
LEFT JOIN SERVICIO S ON O.IDSERVICIO = S.IDSERVICIO
LEFT JOIN CLIENTE L ON O.IDCLIENTE = L.IDCLIENTE
LEFT JOIN ACTIVIDAD A ON O.IDACTIVIDAD = A.IDACTIVIDAD
JOIN SUCURSAL U
LEFT JOIN AREAFUNCIONAL F ON U.IDAREAFUNCIONAL = F.IDAREAFUNCIONAL
LEFT JOIN INCIDENCIA_CONFIGURACION IC
ON I.IDINCIDENCIA_ITEM = IC.IDINCIDENCIA_ITEM
AND I.IDINCIDENCIA_DEPARTAMENTO = IC.IDINCIDENCIA_DEPARTAMENTO
AND O.IDESTRUCTURA_OPERACION = IC.IDESTRUCTURA_OPERACION
AND U.IDSUCURSAL = IC.IDSUCURSAL
AND R.IDAREA = IC.IDAREA
LEFT JOIN USUARIO US
ON IC.IDUSUARIO = US.IDUSUARIO
WHERE U.ESTADO = 'Activo'
GROUP BY
I.IDINCIDENCIA_ITEM, I.IDINCIDENCIA_DEPARTAMENTO, I.IDAREA, R.NOMBRE, T.ITEM, D.ELEMENTO,
O.IDESTRUCTURA_OPERACION, S.SERVICIO, L.CLIENTE, A.ACTIVIDAD,
U.IDSUCURSAL, U.SUCURSAL, F.COMUNA, US.RUT,
US.NOMBRE, IC.SLA_TIPO, IC.SLA_QUANTITY, IC.IDINCIDENCIA_CONFIGURACION";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaIncidenciasConConfiguracion($rutauditor){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
      ' ' as S,
      C.IDINCIDENCIA_CONFIGURACION,
      CONCAT(C.SLA_QUANTITY, ' ', C.SLA_TIPO) 'SLA',
      US.IDUSUARIO,
      US.NOMBRE,
      R.NOMBRE 'AREA',
      T.ITEM,
      D.ELEMENTO 'DEPARTAMENTO',
      O.IDESTRUCTURA_OPERACION,
      S.SERVICIO,
      L.CLIENTE,
      A.ACTIVIDAD,
      U.IDSUCURSAL,
      U.SUCURSAL,
      F.COMUNA
    FROM INCIDENCIA_CONFIGURACION C
    INNER JOIN AREA R ON C.IDAREA = R.IDAREA
    INNER JOIN INCIDENCIA_DEPARTAMENTO D ON C.IDINCIDENCIA_DEPARTAMENTO = D.IDINCIDENCIA_DEPARTAMENTO
    INNER JOIN INCIDENCIA_ITEM T ON C.IDINCIDENCIA_ITEM = T.IDINCIDENCIA_ITEM
    INNER JOIN ESTRUCTURA_OPERACION O ON O.IDESTRUCTURA_OPERACION = C.IDESTRUCTURA_OPERACION
    INNER JOIN SERVICIO S ON O.IDSERVICIO = S.IDSERVICIO
    INNER JOIN CLIENTE L ON O.IDCLIENTE = L.IDCLIENTE
    INNER JOIN ACTIVIDAD A ON O.IDACTIVIDAD = A.IDACTIVIDAD
    INNER JOIN SUCURSAL U ON U.IDSUCURSAL = C.IDSUCURSAL
    INNER JOIN AREAFUNCIONAL F ON U.IDAREAFUNCIONAL = F.IDAREAFUNCIONAL
    INNER JOIN USUARIO US ON US.IDUSUARIO = C.IDUSUARIO;
  ";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listarZonas() {
  $con = conectar();
  if ($con != 'No conectado') {
    $sql = "select IDZONA, NOMBRE from ZONA";
    if ($row = $con->query($sql)) {
      while($array = $row->fetch_array(MYSQLI_BOTH)) {
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function ingresarIncidenciaConfiguracion($idArea, $idItem, $idDepartamento, $idOperacion, $idSucursal, $rutUsuario, $slaType, $slaQ) {
  $con = conectar();
	$con->query("START TRANSACTION");
  if($con != 'No conectado'){
		$sql = "call sp_incidencia_configuracion_insertar(". $idArea . "," . $idItem . "," . $idDepartamento . "," . $idOperacion . "," . $idSucursal . ",'" . $rutUsuario . "','" . $slaType . "'," . $slaQ . ")";
    if($con->query($sql)){
      $con->query("COMMIT");
      return "Ok";
    } else {
      return "Error";
    }
	} else {
		return "Error";
	}
}

function eliminarIncidenciaConfiguracion($idsConfiguracion) {
  $con = conectar();
	$con->query("START TRANSACTION");
  $idsConf = join(",", $idsConfiguracion);
	if($con != 'No conectado'){
		$sql = "DELETE from INCIDENCIA_CONFIGURACION where IDINCIDENCIA_CONFIGURACION in (" . $idsConf . ");";
    if($con->query($sql)){
      return "Ok";
    } else {
      return "Error";
    }
	} else {
		return "Error";
	}
}

// Consulta para Asignar Vehiculo (Update Personal/Patente/Asignacion)
function asignacionVehiculo($rutPersonal, $telefonoPersonal, $idPatente, $kilometrajePatente, $idBodegaPatente, $observacion, $rutUser){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL ASIGNAR_VEHICULO('{$rutPersonal}','{$telefonoPersonal}','{$idPatente}','{$kilometrajePatente}','{$idBodegaPatente}','{$observacion}', '$rutUser')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consultas Patente-Checks para Asignacion
function consultaPatenteAsignacionChecks($tipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT ITEM, IDPATENTE_ASIGNACION_CHECKS FROM PATENTE_ASIGNACION_CHECKS
		WHERE TIPO = '$tipo'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas para insertar Checkboxs para Asignacion
function insertarChecksbox($idAsig, $id, $newEstado){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO PATENTE_ASIGNACION_CHECKS_OK(IDPATENTE_ASIGNACIONES,IDPATENTE_ASIGNACION_CHECKS, DATO)
              VALUES
              ('{$idAsig}','{$id}','{$newEstado}')";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

// Consultas Datos de Asignacion
function consultaDatosAsignacion($idAsig, $rutUsuario){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pa.IDPATENTE_ASIGNACIONES, pa.FECHA, pa.OBSERVACION, p.CODIGO, p.KILOMETRAJE, p.AÑO 'ANO', p.FMANTENIMIENTO, pt.CHECKTIPO 'TIPOVEH', pm.MARCA,
						pm.MODELO, initCap(CONCAT(p2.NOMBRES ,' ',p2.APELLIDOS)) 'NOMBRE', p2.DNI, p2.TELEFONO,
						(SELECT u2.NOMBRE FROM USUARIO u2 where u2.RUT = '$rutUsuario') 'PERSONAL', a.COMUNA, CONCAT(s2.GERENCIA, ' - ', s2.SERVICIO, ' - ', CASE WHEN  c.CLIENTE IS NULL THEN '' ELSE  c.CLIENTE END) 'NEGOCIO',
						pa.CONTADORCHECKILIST , pa.CONTADORLIC, pa.CONTADORASIG
						FROM PATENTE_ASIGNACIONES pa
						LEFT JOIN PATENTE p
						ON p.IDPATENTE = pa.IDPATENTE
						LEFT JOIN PATENTE_TIPOVEHICULO pt
						ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
						LEFT JOIN PERSONAL p2
						ON pa.IDPERSONAL = p2.IDPERSONAL
						LEFT JOIN SUCURSAL s
						ON pa.IDSUCURSAL = s.IDSUCURSAL
						LEFT JOIN AREAFUNCIONAL a
						ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
						LEFT JOIN ESTRUCTURA_OPERACION eo
						ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO s2
						ON s2.IDSERVICIO = eo.IDSERVICIO
						LEFT JOIN CLIENTE c
						ON c.IDCLIENTE = eo.IDCLIENTE
						WHERE pa.IDPATENTE_ASIGNACIONES = '$idAsig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Checksboxs de Asignacion
function consultaCheckboxsAsignacion($idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pac.ITEM, paco.DATO
		FROM PATENTE_ASIGNACION_CHECKS_OK paco
		LEFT JOIN PATENTE_ASIGNACION_CHECKS pac
		ON pac.IDPATENTE_ASIGNACION_CHECKS = paco.IDPATENTE_ASIGNACION_CHECKS
		WHERE paco.IDPATENTE_ASIGNACIONES = '$idAsig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaDatosEstructura($rutPExterno,$cliente,$contrato,$actividad,$sucursal,$ceco){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO ACT(IDPERSONAL, IDSUCURSAL, IDESTRUCTURA_OPERACION, IDCENTRO_COSTO)
	VALUES ( (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '{$rutPExterno}'),'{$sucursal}',(SELECT IDESTRUCTURA_OPERACION FROM ESTRUCTURA_OPERACION WHERE IDCLIENTE='{$cliente}' AND IDSERVICIO = '{$contrato}' AND IDACTIVIDAD = '{$actividad}'),'{$ceco}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

// Funcion para traer nombre de la empresa desde BD generica
function nombreLogin($url){
	$con = conectar_api();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL NOMBRELOGIN('{$url}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar Asignacion ingresando Checklist generado
function actualizarAsignacionChecklist($idAsig, $pdfChecklist){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASIGNACIONES
		SET CHECKLIST = '" . $pdfChecklist . "',
		CONTADORCHECKILIST = 1
		WHERE IDPATENTE_ASIGNACIONES = '" . $idAsig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta datos PDF para Asignacion Vehiculos
function consultaDatosPdfAsignacionVehiculo($idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pa.CHECKLIST, pa.LIC, pa.ASIG, pa.CONTADORCHECKILIST, pa.CONTADORLIC, pa.CONTADORASIG
		FROM PATENTE_ASIGNACIONES pa
		WHERE pa.IDPATENTE_ASIGNACIONES = '$idAsig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar la subida de PDFs en Asignacion Vehiculos
function actualizaPDFAsignacionVehiculo($idAsig, $docPDFChecklist, $docPDFLicencia, $docPDFAsignacion, $contadorChecklist, $contadorLicencia, $contadorAsignacion){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL SUBIR_PDF_ASIGNACION_VEHICULO('$idAsig','$docPDFChecklist','$docPDFLicencia','$docPDFAsignacion','$contadorChecklist','$contadorLicencia','$contadorAsignacion')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}

// Consulta para actualizar Asignacion generada automaticamente
function actualizarAsignacionVehiculo($idAsig, $pdfAsignacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASIGNACIONES
		SET ASIG = '" . $pdfAsignacion . "',
		CONTADORASIG = 1
		WHERE IDPATENTE_ASIGNACIONES = '" . $idAsig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar estado de  Asignacion (En revision) los 3 archivos cargados
function actualizarEstadoAsignacion($idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASIGNACIONES
		SET IDPATENTE_ESTADO_ASIGNACION = (SELECT IDPATENTE_ESTADO_ASIGNACION FROM PATENTE_ESTADO_ASIGNACION WHERE ESTADO = 'En Revisión' )
		WHERE IDPATENTE_ASIGNACIONES = '" . $idAsig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar estado de  Asignacion (Validada)
function actualizarEstadoValidadoAsigVeh($idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASIGNACIONES
		SET IDPATENTE_ESTADO_ASIGNACION = (SELECT IDPATENTE_ESTADO_ASIGNACION FROM PATENTE_ESTADO_ASIGNACION WHERE ESTADO = 'Validada' )
		WHERE IDPATENTE_ASIGNACIONES = '" . $idAsig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar estado de  Asignacion (Anulada)
function actualizarEstadoAnuladoAsigVeh($idAsig, $dni, $patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ANULAR_ASIGNACION_VEHICULO('{$idAsig}','{$dni}','{$patente}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaAccionesPerfilAreaWeb($idPerfil, $idAreaWeb){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT PA.IDBOTON, PA.TEXTO,
		CASE WHEN FA.VISIBLE IS NULL THEN 0 ELSE FA.VISIBLE END 'VISIBLE'
		FROM PERMISO_ACCIONES PA
		LEFT JOIN PERFIL_ACCIONES FA
		ON PA.IDPERMISO_ACCIONES = FA.IDPERMISO_ACCIONES
		AND FA.IDPERFIL = '{$idPerfil}'
		WHERE PA.IDAREAWEB = '{$idAreaWeb}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function borrarPerfilAccionesArea($idPerfil, $idAreaWeb){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE PA
		FROM PERFIL_ACCIONES PA
		LEFT JOIN PERMISO_ACCIONES PC
		ON PA.IDPERMISO_ACCIONES = PC.IDPERMISO_ACCIONES
		WHERE PA.IDPERFIL = '{$idPerfil}'
		AND PC.IDAREAWEB = '{$idAreaWeb}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresaAccionPerfilArea($idPerfil, $idAreaWeb, $id, $val){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO PERFIL_ACCIONES(IDPERMISO_ACCIONES, IDPERFIL, VISIBLE)
		SELECT IDPERMISO_ACCIONES, '{$idPerfil}', '{$val}'
		FROM PERMISO_ACCIONES PA
		WHERE IDBOTON = '{$id}'
		AND IDAREAWEB = '{$idAreaWeb}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return $sql;
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Clausulas Mantenedores
function consultaClausulas(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, CLAUSULA, IDPATENTE_CLAUSULAS
FROM PATENTE_CLAUSULAS";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Cláusulas
function ingresaClausulas($clausula){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_CLAUSULAS(CLAUSULA)
VALUES ( '" . $clausula . "')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar Cláusulas
function editarClausulas( $idClausulas, $clausula){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_CLAUSULAS
	SET CLAUSULA = '" . $clausula . "'
	WHERE IDPATENTE_CLAUSULAS = '" . $idClausulas . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para eliminar Cláusulas
function eliminarClausulas($idClausulas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM PATENTE_CLAUSULAS
		 WHERE IDPATENTE_CLAUSULAS = '" . $idClausulas . "'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

// Funcion para traer codigo de Patente mediante su ID
function codigoPatente($idPatente){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT CODIGO
		FROM PATENTE
		WHERE IDPATENTE = '$idPatente'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para ingresar Notificaciones de Asignacion de Vehiculos
function ingresarNotificacionAsignacionVeh($rutJefe, $tipo, $cuerpo, $url, $notificacion, $categoria){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO USUARIO_NOTIFICACIONES (RUT, TIPO, CUERPO, URL, VISTO, FECHA, HORA, NOTIFICACION, CATEGORIA)
			VALUES('{$rutJefe}','{$tipo}', '{$cuerpo}', '{$url}', 0, NOW(), CAST(NOW() AS TIME), '{$notificacion}', '{$categoria}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			return $sql;
			$con->query("ROLLBACK");

		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Jefe directo para envio de email Asignacion Vehiculo
function consultaJefeDirecto($rutPersonal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
		CASE WHEN U.EMAIL IS NULL OR U.EMAIL = '' THEN
		CASE WHEN J.EMAIL IS NULL OR J.EMAIL = '' THEN
		'sincorreo@sincorreo.com' ELSE J.EMAIL END
		ELSE U.EMAIL END AS EMAIL, initCap(CONCAT(J.NOMBRES, ' ', J.APELLIDOS)) 'JEFE', J.DNI AS RUT
		FROM PERSONAL P
		LEFT JOIN PERSONAL J
		ON P.RUTJEFEDIRECTO = J.DNI
		LEFT JOIN USUARIO U
		ON J.DNI = U.RUT
		WHERE P.DNI = '{$rutPersonal}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaPatenteConEstado($rutUser) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
      p.IDPATENTE,
        p.IDSUCURSAL,
        p.CODIGO,
        p.IDESTRUCTURA_OPERACION,
        s.IDPATENTE_ESTADO,
        initCap(s.ESTADO) 'ESTADO'
    from PATENTE p
    inner join PATENTE_ESTADO s on s.IDPATENTE_ESTADO = p.IDPATENTE_ESTADO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaAccionesVisibles($rutUser, $path) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT PC.IDBOTON, PA.VISIBLE, PC.TEXTO, PC.ICONO, PC.ENABLE
						FROM USUARIO U
						LEFT JOIN PERFIL P
						ON U.IDPERFIL = P.IDPERFIL
						LEFT JOIN PERFIL_ACCIONES PA
						ON P.IDPERFIL = PA.IDPERFIL
						LEFT JOIN PERMISO_ACCIONES PC
						ON PA.IDPERMISO_ACCIONES = PC.IDPERMISO_ACCIONES
						LEFT JOIN AREAWEB AW
						ON PC.IDAREAWEB = AW.IDAREAWEB
						WHERE U.RUT = '{$rutUser}'
						AND AW.RUTA LIKE '%{$path}%'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Desasignacion Vehiculos
function consultaDesasignacionVehiculo($rut,$path,$ano,$mes){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_DESASIGNACIONES('{$rut}','{$path}','{$ano}','{$mes}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos de Asignacion Validadas para Desasignacion
function consultaAsignacionesValidadas(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT A.CODIGO, CONCAT(P.NOMBRES, P.APELLIDOS) 'NOMBRE', P.DNI
						FROM PATENTE_PERSONAL PP
						LEFT JOIN PERSONAL P
						ON PP.IDPERSONAL = P.IDPERSONAL
						LEFT JOIN PATENTE A
						ON PP.IDPATENTE = A.IDPATENTE
						LEFT JOIN PATENTE_DESASIGNACIONES PD
						ON PP.IDPATENTE = PD.IDPATENTE
						AND PD.IDPATENTE_ESTADO_DESASIGNACION NOT IN (SELECT IDPATENTE_ESTADO_DESASIGNACION FROM PATENTE_ESTADO_DESASIGNACION WHERE ESTADO = 'Generada')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos de Asignacion Validada Seleccionada para Desasignacion
function consultaAsignacionValidadaSeleccionada($rutPer, $patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pa.IDPATENTE_ASIGNACIONES, pa.OBSERVACION, p.CODIGO, p.KILOMETRAJE, p.AÑO 'ANO', pt.CHECKTIPO 'TIPOVEH', pm.MARCA, pm.MODELO, initCap(CONCAT(p2.NOMBRES ,' ',p2.APELLIDOS)) 'NOMBRE',
						p2.DNI, p2.TELEFONO, initCap(CONCAT(s.SUCURSAL, ' - ', a.COMUNA)) 'COMUNA', CONCAT(s2.GERENCIA, ' - ', s2.SERVICIO, ' - ',
						CASE WHEN c.CLIENTE IS NULL THEN '' ELSE c.CLIENTE END) 'NEGOCIO', eo.NOMENCLATURA, pt.LICENCIA, p2.EMAIL
						FROM PATENTE_ASIGNACIONES pa
						LEFT JOIN PATENTE p
						ON p.IDPATENTE = pa.IDPATENTE
						LEFT JOIN PATENTE_TIPOVEHICULO pt
						ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
						LEFT JOIN PATENTE_PERSONAL PP
						ON p.IDPATENTE = PP.IDPATENTE
						AND pa.IDPATENTE_ASIGNACIONES = PP.IDASIGNACION
						LEFT JOIN PERSONAL p2
						ON PP.IDPERSONAL = p2.IDPERSONAL
						LEFT JOIN SUCURSAL s
						ON pa.IDSUCURSAL = s.IDSUCURSAL
						LEFT JOIN AREAFUNCIONAL a
						ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
						LEFT JOIN ESTRUCTURA_OPERACION eo
						ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO s2
						ON s2.IDSERVICIO = eo.IDSERVICIO
						LEFT JOIN CLIENTE c
						ON c.IDCLIENTE = eo.IDCLIENTE
						WHERE p2.DNI = '{$rutPer}'
						AND p.CODIGO = '{$patente}'
						AND PP.IDPATENTE IS NOT NULL
						HAVING MAX(pa.IDPATENTE_ASIGNACIONES)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Checkboxs para Desasignacion
function consultaCheckboxDesasignacion($idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT paco.IDPATENTE_ASIGNACION_CHECKS, paco.DATO, pac.ITEM
		FROM PATENTE_ASIGNACION_CHECKS_OK paco
		LEFT JOIN PATENTE_ASIGNACION_CHECKS pac
		ON pac.IDPATENTE_ASIGNACION_CHECKS = paco.IDPATENTE_ASIGNACION_CHECKS
		WHERE paco.IDPATENTE_ASIGNACIONES = '{$idAsig}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para Desasignar Vehiculo (ingresar datos a tabla Patente_Desasignaciones)
function desasignacionVehiculo($patente, $observacion, $kilometraje, $rutPersonal){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL DESASIGNAR_VEHICULO('{$patente}','{$observacion}','{$kilometraje}', '{$rutPersonal}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consultas para insertar Checkboxs para Desasignacion
function insertarChecksboxDesasignacion($idDesasig, $id, $newEstado, $diferencia){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO PATENTE_DESASIGNACION_CHECKS_OK(IDPATENTE_DESASIGNACIONES,IDPATENTE_ASIGNACION_CHECKS, DATO, DIFERENCIA)
              VALUES
              ('{$idDesasig}','{$id}','{$newEstado}','{$diferencia}')";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

// Consultas Datos para Desasignacion
function consultaDatosDesasignacion($idDesasig, $rutUsuario){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pa.IDPATENTE_DESASIGNACIONES, pa.FECHA, pa.OBSERVACION, p.CODIGO, p.KILOMETRAJE, p.AÑO 'ANO', p.FMANTENIMIENTO, pt.CHECKTIPO 'TIPOVEH',
						pm.MARCA, pm.MODELO, initCap(CONCAT(p2.NOMBRES ,' ',p2.APELLIDOS)) 'NOMBRE', p2.DNI, p2.TELEFONO,
						(SELECT u2.NOMBRE FROM USUARIO u2 where u2.RUT = '$rutUsuario') 'PERSONAL', a.COMUNA, CONCAT(s2.GERENCIA, ' - ', s2.SERVICIO, ' - ',
						CASE WHEN c.CLIENTE IS NULL THEN '' ELSE c.CLIENTE END) 'NEGOCIO', pa.CONTADORCHECKLIST
						FROM PATENTE_DESASIGNACIONES pa
						LEFT JOIN PATENTE p
						ON p.IDPATENTE = pa.IDPATENTE
						LEFT JOIN PATENTE_TIPOVEHICULO pt
						ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
						LEFT JOIN PATENTE_PERSONAL PP
						ON p.IDPATENTE = PP.IDPATENTE
						LEFT JOIN PERSONAL p2
						ON PP.IDPERSONAL = p2.IDPERSONAL
						LEFT JOIN SUCURSAL s
						ON pa.IDSUCURSAL = s.IDSUCURSAL
						LEFT JOIN AREAFUNCIONAL a
						ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
						LEFT JOIN ESTRUCTURA_OPERACION eo
						ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO s2
						ON s2.IDSERVICIO = eo.IDSERVICIO
						LEFT JOIN CLIENTE c
						ON c.IDCLIENTE = eo.IDCLIENTE
						WHERE pa.IDPATENTE_DESASIGNACIONES = '$idDesasig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Checksboxs de Desasignacion
function consultaCheckboxsDesasignacion($idDesasig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pac.ITEM, paco.DATO, paco.DIFERENCIA, pac.DESCONTABLE
		FROM PATENTE_DESASIGNACION_CHECKS_OK paco
		LEFT JOIN PATENTE_ASIGNACION_CHECKS pac
		ON pac.IDPATENTE_ASIGNACION_CHECKS = paco.IDPATENTE_ASIGNACION_CHECKS
		WHERE paco.IDPATENTE_DESASIGNACIONES = '$idDesasig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar Desasignacion ingresando Checklist generado
function actualizarDesasignacionChecklist($idDesasig, $pdfChecklist){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_DESASIGNACIONES
		SET CHECKLIST = '" . $pdfChecklist . "',
		CONTADORCHECKLIST = 1
		WHERE IDPATENTE_DESASIGNACIONES = '" . $idDesasig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar pdf y finalizar Desasignacion (Anular Asignacion)
function desasignarVehiculo($idDesasig, $docPDFChecklist, $contadorChecklist, $patente, $rutPersonal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL DESASIGNACION_VEHICULO('{$idDesasig}','{$docPDFChecklist}','{$contadorChecklist}','{$patente}','{$rutPersonal}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaListadoZonasOrdenes(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, O.IDORDEN_ZONA_OPERACION 'FOLIO', S.SERVICIO, L.CLIENTE, A.ACTIVIDAD, F.COMUNA,
CASE WHEN O.ACTIVO = 1 THEN 'Habilitada' ELSE 'Deshabilitada' END 'ACTIVA',
O.IDESTRUCTURA_OPERACION, O.IDAREAFUNCIONAL
FROM ORDEN_ZONA_OPERACION O
LEFT JOIN ESTRUCTURA_OPERACION E
ON O.IDESTRUCTURA_OPERACION = E.IDESTRUCTURA_OPERACION
LEFT JOIN SERVICIO S
ON E.IDSERVICIO = S.IDSERVICIO
LEFT JOIN CLIENTE L
ON E.IDCLIENTE = L.IDCLIENTE
LEFT JOIN ACTIVIDAD A
ON E.IDACTIVIDAD = A.IDACTIVIDAD
LEFT JOIN AREAFUNCIONAL F
ON O.IDAREAFUNCIONAL = F.IDAREAFUNCIONAL";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Selector de periodo asignaciones
function consultaSelectorPeriodosAsignacion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(FECHA, '%Y-%m') 'PERIODO'
				FROM PATENTE_ASIGNACIONES
				GROUP BY DATE_FORMAT(FECHA, '%Y-%m')
				ORDER BY DATE_FORMAT(FECHA, '%Y-%m') DESC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Borrar zonas orden
function eliminarZonasOrden($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM ORDEN_ZONA_OPERACION
						WHERE IDORDEN_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Activa zonas orden
function activaZonasOrden($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN_ZONA_OPERACION
						SET ACTIVO = 1
						WHERE IDORDEN_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Desactiva zonas orden
function desactivaZonasOrden($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN_ZONA_OPERACION
						SET ACTIVO = 0
						WHERE IDORDEN_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Datos proyectos config zonas
function datosProyectoConfigZonas(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT E.IDESTRUCTURA_OPERACION 'ID_ESTRUCTURA', CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD) AS PROYECTO, A.AREA
						FROM ESTRUCTURA_OPERACION E
						LEFT JOIN CLIENTE C
						ON E.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN SERVICIO S
						ON E.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN ACTIVIDAD A
						ON E.IDACTIVIDAD = A.IDACTIVIDAD
						GROUP BY E.IDESTRUCTURA_OPERACION, CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD), A.AREA
						ORDER BY A.AREA DESC, PROYECTO ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos zonas config Zonas
function datosZonasConfigZonas(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT A.IDAREAFUNCIONAL, A.COMUNA, A.PROVINCIA, A.REGION
						FROM AREAFUNCIONAL A
						GROUP BY A.IDAREAFUNCIONAL, A.COMUNA, A.PROVINCIA, A.REGION
						ORDER BY A.COMUNA ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Borrar zonas orden pre-config
function cargarZonasOrdenConfig($proyecto, $zona){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO ORDEN_ZONA_OPERACION(IDESTRUCTURA_OPERACION, IDAREAFUNCIONAL, ACTIVO)
						VALUES('{$proyecto}','{$zona}','1')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar estado de  Asignacion (Validada)
function anularDesasignacion($idDesasig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_DESASIGNACIONES
		SET IDPATENTE_ESTADO_DESASIGNACION = (SELECT IDPATENTE_ESTADO_DESASIGNACION FROM PATENTE_ESTADO_DESASIGNACION WHERE ESTADO = 'Anulada' )
		WHERE IDPATENTE_DESASIGNACIONES = '" . $idDesasig . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Selector de periodo desasignaciones
function consultaSelectorPeriodosDesasignacion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(FECHA, '%Y-%m') 'PERIODO'
						FROM PATENTE_DESASIGNACIONES
						GROUP BY DATE_FORMAT(FECHA, '%Y-%m')
						ORDER BY DATE_FORMAT(FECHA, '%Y-%m') DESC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos de ordenes por fecha
function consultaDatosOrdenesFecha($rut,$path,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ORDENES_LISTADO('{$rut}','{$path}','{$fecha}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para chequear rut de Personal
function chequeaRutPersonal($rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPERSONAL, initCap(CONCAT(NOMBRES ,' ',APELLIDOS)) 'PERSONAL', EMAIL, TELEFONO
FROM PERSONAL
WHERE DNI = '" . $rut . "'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos de Asignacion Validada Seleccionada para Desasignacion
function consultaAsignacionValidadaSelectForPatemte($patente, $rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pa.IDPATENTE_ASIGNACIONES, pa.OBSERVACION, p.CODIGO, p.KILOMETRAJE, p.AÑO 'ANO', pt.CHECKTIPO 'TIPOVEH', pm.MARCA, pm.MODELO, initCap(CONCAT(p2.NOMBRES ,' ',p2.APELLIDOS)) 'NOMBRE',
						p2.DNI, p2.TELEFONO, initCap(CONCAT(s.SUCURSAL, ' - ', a.COMUNA)) 'COMUNA', CONCAT(s2.GERENCIA, ' - ', s2.SERVICIO, ' - ',
						CASE WHEN c.CLIENTE IS NULL THEN '' ELSE c.CLIENTE END) 'NEGOCIO', eo.NOMENCLATURA, pt.LICENCIA, p2.EMAIL
						FROM PATENTE_ASIGNACIONES pa
						LEFT JOIN PATENTE p
						ON p.IDPATENTE = pa.IDPATENTE
						LEFT JOIN PATENTE_TIPOVEHICULO pt
						ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
						LEFT JOIN PATENTE_PERSONAL PP
						ON p.IDPATENTE = PP.IDPATENTE
						AND pa.IDPATENTE_ASIGNACIONES = PP.IDASIGNACION
						LEFT JOIN PERSONAL p2
						ON PP.IDPERSONAL = p2.IDPERSONAL
						LEFT JOIN SUCURSAL s
						ON pa.IDSUCURSAL = s.IDSUCURSAL
						LEFT JOIN AREAFUNCIONAL a
						ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
						LEFT JOIN ESTRUCTURA_OPERACION eo
						ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO s2
						ON s2.IDSERVICIO = eo.IDSERVICIO
						LEFT JOIN CLIENTE c
						ON c.IDCLIENTE = eo.IDCLIENTE
						WHERE p2.DNI = '{$rut}'
						AND p.CODIGO = '{$patente}'
						AND PP.IDPATENTE IS NOT NULL
						HAVING MAX(pa.IDPATENTE_ASIGNACIONES)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Siniestros
function consultaSiniestros($rut,$path,$ano,$mes){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_SINIESTROS('{$rut}','{$path}','{$ano}','{$mes}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta Siniestros

//Tramos ordenes
function consultaTramosOrdenes($idEstructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDORDEN_TRAMO, CONCAT(INICIO,' - ', FIN) 'TRAMO', INICIO, FIN
						FROM ORDEN_TRAMO
						WHERE IDESTRUCTURA_OPERACION = '{$idEstructura}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Zona ordenes
function consultaZonaOrden($idEstructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT O.IDAREAFUNCIONAL, A.COMUNA, A.REGION
						FROM ORDEN_ZONA_OPERACION O
						LEFT JOIN AREAFUNCIONAL A
						ON O.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
						WHERE O.IDESTRUCTURA_OPERACION = '{$idEstructura}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Actualiza Agenda Orden
function actualizaOrdenAgenda($fechaAgenda,$horaAgenda,$idTramo,$fono,$idOrden){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN
						SET FECHA_AGENDA = '{$fechaAgenda}',
						HORA_AGENDA = '{$horaAgenda}',
						IDORDEN_TRAMO = '{$idTramo}',
						FONO_CLIENTE = '{$fono}',
						Q_AGENDA = (Q_AGENDA + 1),
						IDORDEN_ESTADO = 14
						WHERE IDORDEN = '{$idOrden}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
		  return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Actualizar Descuento Siniestros
function actualizarDescuentoSiniestros($descuento, $montoDesc, $costoTotal, $idSiniestros, $pdfDescDestroy){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ACTUALIZAR_DESCUENTO_SINIESTRO('{$descuento}','{$montoDesc}','{$costoTotal}','{$idSiniestros}','{$pdfDescDestroy}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin de Consulta para Actualizar Descuento Siniestros

// Consulta para Actualizar Numero Siniestros
function actualizarNumeroSiniestros( $num_siniestro, $idSiniestros){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_SINIESTROS
	SET N_SINIESTRO = '" . $num_siniestro . "'
	WHERE IDPATENTE_SINIESTROS = '" . $idSiniestros . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin de Consulta para Actualizar Numero Siniestros

// Consulta para Actualizar Numero de Factura Siniestros
function actualizarFacturaSiniestros( $num_factura, $idSiniestros){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_SINIESTROS
	SET N_FACTURA = '" . $num_factura . "'
	WHERE IDPATENTE_SINIESTROS = '" . $idSiniestros . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin de Consulta para Actualizar Numero de Factura Siniestros

// Consulta para devolver vehiculos a los cuales se les puede crear un Siniestro
function datosVehiculosForSiniestros(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT CODIGO
						FROM PATENTE
						WHERE IDPATENTE_ESTADO NOT IN (SELECT IDPATENTE_ESTADO FROM PATENTE_ESTADO WHERE ESTADO = 'Taller') AND
						IDPATENTE_ESTADO NOT IN (SELECT IDPATENTE_ESTADO FROM PATENTE_ESTADO WHERE ESTADO = 'Siniestro') AND
						IDPATENTE_ESTADO NOT IN (SELECT IDPATENTE_ESTADO FROM PATENTE_ESTADO WHERE ESTADO = 'Baja')";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta para devolver vehiculos a los cuales se les puede crear un Siniestro

//Datos de ordenes sin agenda
function consultaDatosOrdenesSinAgenda($rut,$path){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ORDENES_LISTADO_SINAGENDA('{$rut}','{$path}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
    }
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para devolver vehiculo seleccionado al cual se le puede crear un Siniestro
function datosVehiculosForSiniestrosSelect($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.CODIGO, p.AÑO 'ANO', pm.MARCA, pm.MODELO
						FROM PATENTE p
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON p.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
						WHERE p.CODIGO = '" . $patente . "'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta para devolver vehiculo seleccionado al cual se le puede crear un Siniestro

function consultaUsuariosDespachoOrdenes($idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT U.IDUSUARIO, U.RUT, U.NOMBRE, F.NOMBRE 'PERFIL'
						FROM USUARIO U
						LEFT JOIN PERFIL F
						ON U.IDPERFIL = F.IDPERFIL
						WHERE U.ESTADO = 'Activo'
						AND U.IDUSUARIO NOT IN
						(
							SELECT Z.IDUSUARIO
							FROM ORDEN_ZONA_PERSONAL Z
							WHERE Z.IDORDEN_ZONA_OPERACION = '{$idez}'
						)";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaUsuariosDespachoOrdenesAsignados($idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, Z.IDORDEN_ZONA_PERSONAL, Z.IDUSUARIO, U.RUT, U.NOMBRE, F.NOMBRE 'PERFIL', Z.TIPO,
						CONCAT('<span class=''fas fa-user-times'' onclick='' ','quitarPersonalZonaOrden(',Z.IDORDEN_ZONA_PERSONAL,');''></span>') 'BORRAR'
						FROM ORDEN_ZONA_PERSONAL Z
						LEFT JOIN USUARIO U
						ON Z.IDUSUARIO = U.IDUSUARIO
						LEFT JOIN PERFIL F
						ON U.IDPERFIL = F.IDPERFIL
						WHERE Z.IDORDEN_ZONA_OPERACION = '{$idez}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function eliminarPersonalAsignadoZonaOrden($id){
		$con = conectar();
		if($con != 'No conectado'){
				$sql = "DELETE FROM ORDEN_ZONA_PERSONAL
								WHERE IDORDEN_ZONA_PERSONAL = '{$id}'";
				if($con->query($sql)){
						$con->query("COMMIT");
						return "Ok";
				}else{
						$con->query("ROLLBACK");
						// return $con->error;
						return "Error";
				}
		}else{
				$con->query("ROLLBACK");
				return "Error";
		}
}

function ingresarPersonalAsignadoZonaOrden($idusuario, $idoz, $tipo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if ($con != 'No conectado') {
			$sql = "INSERT INTO ORDEN_ZONA_PERSONAL(IDUSUARIO, IDORDEN_ZONA_OPERACION, TIPO)
							VALUES('{$idusuario}','{$idoz}','{$tipo}')";
			if($con->query($sql)){
					$con->query("COMMIT");
					return "Ok";
			}else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
			}
	}else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

// Consulta para ingresar Siniestro
function ingresarSiniestros($rutPersonal, $correoPersonal, $direccionPersonal, $comunaPersonal, $celularPersonal, $patente, $textoPiezasDanadas, $fechaSiniestro, $horaSiniestro, $direccionSiniestro, $tipoSiniestro, $nparteSiniestro,
							$comisariaSiniestro, $comunaSiniestro, $nombreTercero, $correoTercero, $celularTercero, $direccionTercero, $comunaTercero, $patenteTercero, $marcaTercero, $modeloTercero, $anoTercero, $piezasDanadasTercero, $descripcion, $rutUsuario, $tipoDanoInfra, $observacionDanosInfra){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESA_SINIESTROS('{$rutPersonal}','{$correoPersonal}','{$direccionPersonal}','{$comunaPersonal}','{$celularPersonal}','{$patente}','{$textoPiezasDanadas}','{$fechaSiniestro}','{$horaSiniestro}',
										'{$direccionSiniestro}','{$tipoSiniestro}','{$nparteSiniestro}','{$comisariaSiniestro}','{$comunaSiniestro}','{$nombreTercero}','{$correoTercero}','{$celularTercero}',
										'{$direccionTercero}','{$comunaTercero}','{$patenteTercero}','{$marcaTercero}','{$modeloTercero}','{$anoTercero}','{$piezasDanadasTercero}','{$descripcion}','{$rutUsuario}','{$tipoDanoInfra}','{$observacionDanosInfra}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Siniestro

// Consulta datos PDF para Siniestros
function consultaDatosPdfSiniestro($idSiniestro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT ps.PDF_SINIESTRO, ps.PDF_DECLARACION, ps.PDF_DECLARACION_ASEG, ps.PDF_LIC_CED, ps.PDF_DESCUENTO, ps.CONTADOR_SINIESTRO, ps.CONTADOR_DECLARACION, ps. CONTADOR_DECL_ASEG, ps. CONTADOR_LIC, ps.CONTADOR_DESC
		FROM PATENTE_SINIESTROS ps
		WHERE ps.IDPATENTE_SINIESTROS = '" . $idSiniestro . "'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos PDF para Siniestros

// Consulta para actualizar la subida de PDFs en Siniestro
function actualizaPDFSiniestros($idSiniestro, $docPDFSiniestro, $docPDFDeclaracion, $docPDFDeclaAseg, $docPDFLicencia, $docPDFDescuento, $contadorSiniestro, $contadorDeclaracion, $contadorDeclaAseg, $contadorLicencia, $contadorDescuento){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL SUBIR_PDF_SINIESTROS('$idSiniestro','$docPDFSiniestro','$docPDFDeclaracion','$docPDFDeclaAseg','$docPDFLicencia','$docPDFDescuento','$contadorSiniestro','$contadorDeclaracion','$contadorDeclaAseg','$contadorLicencia','$contadorDescuento')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}
// Fin Consulta para actualizar la subida de PDFs en Siniestro

//Selector de periodo siniestros
function consultaSelectorPeriodosSiniestros(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(FECHA, '%Y-%m') 'PERIODO'
						FROM PATENTE_SINIESTROS
						GROUP BY DATE_FORMAT(FECHA, '%Y-%m')
						ORDER BY DATE_FORMAT(FECHA, '%Y-%m') DESC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}
//Selector de periodo siniestros

function consultaUsuariosAsignablesOrden($idarea, $idestructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT U.IDUSUARIO, U.RUT, U.NOMBRE, P.TIPO, O.IDAREAFUNCIONAL, O.IDESTRUCTURA_OPERACION
						FROM ORDEN_ZONA_PERSONAL P
						LEFT JOIN ORDEN_ZONA_OPERACION O
						ON P.IDORDEN_ZONA_OPERACION = O.IDORDEN_ZONA_OPERACION
						LEFT JOIN USUARIO U
						ON P.IDUSUARIO = U.IDUSUARIO
						WHERE O.IDAREAFUNCIONAL = '{$idarea}'
						AND O.IDESTRUCTURA_OPERACION = '{$idestructura}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function actualizarDespachoOrden($idusuario, $idorden) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN
						SET IDDESPACHO = '{$idusuario}'
						WHERE IDORDEN = '{$idorden}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function actualizarTecnicoOrden($idusuario, $idorden) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN
						SET IDTECNICO = '{$idusuario}',
						IDORDEN_ESTADO = 15
						WHERE IDORDEN = '{$idorden}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresaHistorialOrden($rutUser, $idorden, $historia) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO ORDEN_HISTORIAL(IDORDEN,IDORDEN_CATEGORIA,IDORDEN_TIPO,FOLIO,SUB_TIPO,TECNOLOGIA,IDORDEN_ESTADO,FECHA_CREACION,FECHA_AGENDA,HORA_AGENDA,IDORDEN_TRAMO,FECHA_ATENCION,HORA_INICIO,HORA_FIN,DIRECCION,IDORDEN_ZONA_OPERACION,LATITUD,LONGITUD,DNI_CLIENTE,NOMBRE_CLIENTE,FONO_CLIENTE,IDEMPRESA,IDDESPACHO,IDTECNICO,Q_AGENDA,OBSERVACION,HISTORIA,IDEJECUTOR,FECHA,HORA)
		SELECT IDORDEN,IDORDEN_CATEGORIA,IDORDEN_TIPO,FOLIO,SUB_TIPO,TECNOLOGIA,IDORDEN_ESTADO,FECHA_CREACION,FECHA_AGENDA,HORA_AGENDA,IDORDEN_TRAMO,FECHA_ATENCION,HORA_INICIO,HORA_FIN,DIRECCION,IDORDEN_ZONA_OPERACION,LATITUD,LONGITUD,DNI_CLIENTE,NOMBRE_CLIENTE,FONO_CLIENTE,IDEMPRESA,IDDESPACHO,IDTECNICO,Q_AGENDA, OBSERVACION, '{$historia}', (SELECT IDUSUARIO
FROM USUARIO
WHERE RUT = '{$rutUser}'), DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%H:%i:%s')
		FROM ORDEN
		WHERE IDORDEN = '{$idorden}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return $sql;
		}
		else{
			$con->query("ROLLBACK");
			return $sql;
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaEstadosOrden(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDORDEN_ESTADO, CONCAT_WS(' / ', ESTADO, SUB_ESTADO) 'ESTADO_SEL'
						FROM ORDEN_ESTADO
						WHERE DISPONIBLE_CAMBIO = 1";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function actualizarEstadoOrden($idorden,$idestado) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN
						SET IDORDEN_ESTADO = '{$idestado}'
						WHERE IDORDEN = '{$idorden}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function actualizarObservacionOrden($idorden,$observacion) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN
						SET OBSERVACION = '{$observacion}'
						WHERE IDORDEN = '{$idorden}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Datos ordenes completadas con fecha
function consultaDatosOrdenesFechaCompletadas($rut,$path,$fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ORDENES_LISTADO_COMPLETADA('{$rut}','{$path}','{$fecha}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Datos de Siniestros
function consultaDatosSiniestro($idSiniestro){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT ps.CORREO_PERSONAL, ps.CELULAR_PERSONAL, ps.COMUNA_PERSONAL, ps.DIRECCION_PERSONAL, p.DNI, initCap(CONCAT(p.APELLIDOS, ' ', p.NOMBRES))'PERSONAL',
						ps.IDPATENTE_SINIESTROS 'FOLIO', ps.FECHA, ps.HORA, ps.DIRECCION, ps.COMUNA, ps.N_PARTE, ps.COMISARIA, ps.PIEZAS_DANADAS, p2.CODIGO, p2.AÑO 'ANO', pm.MARCA, pm.MODELO,
						ps.NOMBRE_TERCERO, ps.CORREO_TERCERO, ps.CELULAR_TERCERO, ps.DIRECCION_TERCERO, ps.COMUNA_TERCERO, ps.PATENTE_TERCERO, ps.MARCA_TERCERO, ps.MODELO_TERCERO,
						ps.ANO_TERCERO, ps.PIEZAS_DANADAS_TERCERO, ps.DESCRIPCION, initCap(CONCAT(s.GERENCIA,' - ',s.SERVICIO,' - ',c.CLIENTE)) 'PROYECTO', ps.TIPO_DANO_INFRA 'TIPO_INFRA', ps.OBS_DANO_INFRA 'OBS_INFRA'
						FROM PATENTE_SINIESTROS ps
						LEFT JOIN PERSONAL p
						ON ps.IDPERSONAL = p.IDPERSONAL
						LEFT JOIN PATENTE p2
						ON p2.IDPATENTE = ps.IDPATENTE
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON p2.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
						LEFT JOIN ESTRUCTURA_OPERACION eo
						ON ps.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO s
						ON eo.IDSERVICIO = s.IDSERVICIO
						LEFT JOIN CLIENTE c
						ON eo.IDCLIENTE = c.IDCLIENTE
						WHERE ps.IDPATENTE_SINIESTROS = '{$idSiniestro}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar Siniestros ingresando Formulario generado
function actualizarSiniestroFormulario($idSiniestro, $pdfFormulario){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_SINIESTROS
		SET PDF_SINIESTRO = '{$pdfFormulario}',
		CONTADOR_SINIESTRO = 1
		WHERE IDPATENTE_SINIESTROS = '{$idSiniestro}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar Siniestros ingresando Declaracion generado
function actualizarSiniestroDeclaracion($idSiniestro, $pdfDeclaracion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_SINIESTROS
		SET PDF_DECLARACION = '{$pdfDeclaracion}',
		CONTADOR_DECLARACION = 1
		WHERE IDPATENTE_SINIESTROS = '{$idSiniestro}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para actualizar Siniestros ingresando Descuento generado
function actualizarSiniestroDescuento($idSiniestro, $pdfDescuento){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_SINIESTROS
		SET PDF_DESCUENTO = '{$pdfDescuento}',
		CONTADOR_DESC = 1
		WHERE IDPATENTE_SINIESTROS = '{$idSiniestro}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Consulta ordenes linea tiempo (ordenes asignadas)
function consultaOrdenesAsignadasTimeline($rut,$path,$fecha,$idestructura,$idareafuncional,$idcategoria,$idtipo,$idtecnico){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL ORDENES_TIMELINE('{$rut}','{$path}','{$fecha}','{$idestructura}','{$idareafuncional}','{$idcategoria}','{$idtipo}','{$idtecnico}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Colores Orden Sistema estado
function consultaOrdenColorEstado(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT OE.COLOR_TIMELINE, OE.ESTADO, initCap(OE.SUB_ESTADO) 'SUB_ESTADO'
						FROM ORDEN_ESTADO OE
						WHERE OE.ESTADO NOT IN
						(
							'Rechazada',
							'Pendiente Comercial',
							'Programacion'
						)
						AND OE.SUB_ESTADO NOT IN
						(
							'Confirmada'
						)
						ORDER BY OE.SUB_ESTADO ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Tipos de ordenes por proyecto
function consultaOrdenTipoProyecto(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, OT.IDORDEN_TIPO, S.SERVICIO, C.CLIENTE, A.ACTIVIDAD, OC.CLASIFICACION,  OT.TIPO, OT.MINUTOS,
						OT.IDESTRUCTURA_OPERACION, OT.IDORDEN_CLASIFICACION
						FROM ORDEN_TIPO OT
						LEFT JOIN ESTRUCTURA_OPERACION EO
						ON OT.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON EO.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON EO.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON EO.IDACTIVIDAD = A.IDACTIVIDAD
						LEFT JOIN ORDEN_CLASIFICACION OC
						ON OT.IDORDEN_CLASIFICACION = OC.IDORDEN_CLASIFICACION";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Clasificacion de orden
function consultaOrdenClasificacion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDORDEN_CLASIFICACION, CLASIFICACION
						FROM ORDEN_CLASIFICACION";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Consulta para chequear tipo que ya existe de orden
function consultaChequeaTipoOrden($tipo,$idestructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT *
						FROM ORDEN_TIPO
						WHERE TIPO = trim('{$tipo}')
						AND IDESTRUCTURA_OPERACION = '{$idestructura}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Inserta tipo de orden nuevo
function insertarTipoOrden($tipo, $idestructura, $idclasificacion, $minutos){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO ORDEN_TIPO(TIPO, MINUTOS, IDORDEN_CLASIFICACION, IDESTRUCTURA_OPERACION)
							VALUES('{$tipo}','{$minutos}','{$idclasificacion}','{$idestructura}')";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function consultaChequeaTipoOrdenEditar($tipo,$idestructura,$folio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT *
						FROM ORDEN_TIPO
						WHERE TIPO = trim('{$tipo}')
						AND IDESTRUCTURA_OPERACION = '{$idestructura}'
						AND IDORDEN_TIPO <> '{$folio}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Actualiza orden tipo
function editarOrdenTipo($tipo, $idestructura, $idclasificacion, $minutos, $folio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN_TIPO
						SET TIPO = '{$tipo}',
						IDESTRUCTURA_OPERACION = '{$idestructura}',
						IDORDEN_CLASIFICACION = '{$idclasificacion}',
						MINUTOS = '{$minutos}'
						WHERE IDORDEN_TIPO = '{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Borrar Orden tipo
function eliminarOrdenTipo($folio){
		$con = conectar();
		if($con != 'No conectado'){
				$sql = "DELETE FROM ORDEN_TIPO
								WHERE IDORDEN_TIPO = '{$folio}'";
				if($con->query($sql)){
						$con->query("COMMIT");
						return "Ok";
				}else{
						$con->query("ROLLBACK");
						// return $con->error;
						return "Error";
				}
		}else{
				$con->query("ROLLBACK");
				return "Error";
		}
}

// Consulta Calendar
function consultaCalendar($start, $end){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pc.title, CONCAT(pc.IDPATENTE_CALENDAR, '@@@@@', pc.descripcion) 'descripcion', pc.color, pc.textColor, pc.`start`, pc.`end`
				FROM PATENTE_CALENDAR pc
				WHERE start >= '{$start}'
				AND end <= '{$end}'
				AND pc.ESTADO <> 'Cancelada'";
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

function chequeaTarjetaCombustible($numeroTarjeta){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDTARJETACOMBUSTIBLE
							FROM TARJETACOMBUSTIBLE
							WHERE NUMERO = '{$numeroTarjeta}'";
			if ($row = $con->query($sql)) {

				$array = $row->fetch_array(MYSQLI_BOTH);

				return $array;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresaTarjetaCombustible($numero, $estado, $tipo, $producto){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "INSERT INTO TARJETACOMBUSTIBLE(IDTARJETACOMBUSTIBLE_ESTADO, NUMERO, TIPO ,PRODUCTO, FECHA, HORA)
		VALUES ( (SELECT IDTARJETACOMBUSTIBLE_ESTADO FROM TARJETACOMBUSTIBLE_ESTADO WHERE NOMBRE = '" . $estado . "'),
		'" . $numero . "', '" . $tipo . "',
		'" . $producto . "', CURDATE(), CURTIME())";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}

	//Select Estados tarjeta combustible
	function consultaEstadoTarCombustible(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT *
						FROM TARJETACOMBUSTIBLE_ESTADO
						WHERE NOMBRE <> 'Asignada'
						ORDER BY NOMBRE";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	//Actualiza tarjeta combustible
	function editarTarjetaCombustible($numero, $estado, $tipo, $producto){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE TARJETACOMBUSTIBLE
							SET TIPO = '{$tipo}',
							PRODUCTO = '{$producto}',
							IDTARJETACOMBUSTIBLE_ESTADO = '{$estado}'
							WHERE NUMERO = '{$numero}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	//Desasignar tarjeta combustible
	function desasignarTarjetaCombustible($numero){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE TARJETACOMBUSTIBLE
							SET IDPATENTE = NULL,
							IDTARJETACOMBUSTIBLE_ESTADO = 1,
							FECHA = CURDATE(),
							HORA = CURTIME()
							WHERE NUMERO = '{$numero}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

// Consulta datos PDF para Desasignacion Vehiculos
function consultaDatosPdfDesasignacionVehiculo($idDesasig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pd.CHECKLIST, pd.CONTADORCHECKLIST
		FROM PATENTE_DESASIGNACIONES pd
		WHERE pd.IDPATENTE_DESASIGNACIONES = '$idDesasig'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Tipos de ordenes por proyecto
function consultaOrdenCategoriaProyecto(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, OCA.IDORDEN_CATEGORIA, S.SERVICIO, C.CLIENTE, A.ACTIVIDAD, OT.TIPO, OCA.CATEGORIA, OT.IDESTRUCTURA_OPERACION, OT.IDORDEN_TIPO
						FROM ORDEN_CATEGORIA OCA
						LEFT JOIN ORDEN_TIPO OT
						ON OCA.IDORDEN_TIPO = OT.IDORDEN_TIPO
						AND OCA.IDESTRUCTURA_OPERACION = OT.IDESTRUCTURA_OPERACION
						LEFT JOIN ESTRUCTURA_OPERACION EO
						ON OCA.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON EO.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON EO.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON EO.IDACTIVIDAD = A.IDACTIVIDAD";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos proyectos config zonas categoria
function datosProyectoConfigZonasCategoria(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT E.IDESTRUCTURA_OPERACION 'ID_ESTRUCTURA', CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD) AS PROYECTO, A.AREA
						FROM ESTRUCTURA_OPERACION E
						LEFT JOIN CLIENTE C
						ON E.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN SERVICIO S
						ON E.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN ACTIVIDAD A
						ON E.IDACTIVIDAD = A.IDACTIVIDAD
						LEFT JOIN ORDEN_TIPO OT
						ON E.IDESTRUCTURA_OPERACION = OT.IDESTRUCTURA_OPERACION
						WHERE OT.IDESTRUCTURA_OPERACION IS NOT NULL
						GROUP BY E.IDESTRUCTURA_OPERACION, CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD), A.AREA
						ORDER BY A.AREA DESC, PROYECTO ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos tipo orden segun idestructura
function datosTipoSegunEstructura($idestructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT OT.IDORDEN_TIPO, OT.TIPO
						FROM ORDEN_TIPO OT
						WHERE OT.IDESTRUCTURA_OPERACION = '{$idestructura}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Consulta para chequear categoria que ya existe de orden
function consultaChequeaCategoriaOrden($categoria,$idestructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT *
						FROM ORDEN_CATEGORIA
						WHERE CATEGORIA = trim('{$categoria}')
						AND IDESTRUCTURA_OPERACION = '{$idestructura}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Inserta tipo de orden nuevo
function insertarCategoriaOrden($tipo, $idestructura, $categoria){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO ORDEN_CATEGORIA(IDORDEN_TIPO, IDESTRUCTURA_OPERACION, CATEGORIA)
							VALUES('{$tipo}','{$idestructura}','{$categoria}')";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

//Borrar Orden categoria
function eliminarOrdenCategoria($folio){
		$con = conectar();
		if($con != 'No conectado'){
				$sql = "DELETE FROM ORDEN_CATEGORIA
								WHERE IDORDEN_CATEGORIA = '{$folio}'";
				if($con->query($sql)){
						$con->query("COMMIT");
						return "Ok";
				}else{
						$con->query("ROLLBACK");
						// return $con->error;
						return "Error";
				}
		}else{
				$con->query("ROLLBACK");
				return "Error";
		}
}

//Actualiza orden categoria
function editarOrdenCategoria($tipo, $categoria, $folio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE ORDEN_CATEGORIA
						SET CATEGORIA = '{$categoria}',
						IDORDEN_TIPO = '{$tipo}'
						WHERE IDORDEN_CATEGORIA = '{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Consulta ordenes asignadas de TAC
function consultaOrdenesAsignadasTac($fecha, $idtecnico){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT O.IDORDEN, O.FOLIO, initCap(T.NOMBRE) 'NOMBRE', initCap(OT.TIPO) 'TIPO', OT.IDORDEN_TIPO, initCap(OCA.CATEGORIA) 'CATEGORIA', OCA.IDORDEN_CATEGORIA, initCap(OE.SUB_ESTADO) 'SUB_ESTADO', OE.COLOR_TIMELINE 'COLOR',
						LEFT(O.HORA_AGENDA,8) 'INICIO', HOUR(LEFT(O.HORA_AGENDA,8)) 'HORA_INICIO', MINUTE(LEFT(O.HORA_AGENDA,8)) 'MIN_INICIO',
						SECOND(LEFT(O.HORA_AGENDA,8)) 'SEC_INICIO',
						ADDTIME(LEFT(O.HORA_AGENDA,8), CONCAT_WS(':',TRUNCATE(OT.MINUTOS/60,0), OT.MINUTOS-60*TRUNCATE(OT.MINUTOS/60,0),'00')) 'HORA_FIN',
						HOUR(LEFT(ADDTIME(LEFT(O.HORA_AGENDA,8), CONCAT_WS(':',TRUNCATE(OT.MINUTOS/60,0), OT.MINUTOS-60*TRUNCATE(OT.MINUTOS/60,0),'00')),8)) 'HORA_FIN',
						MINUTE(LEFT(ADDTIME(LEFT(O.HORA_AGENDA,8), CONCAT_WS(':',TRUNCATE(OT.MINUTOS/60,0), OT.MINUTOS-60*TRUNCATE(OT.MINUTOS/60,0),'00')),8)) 'MIN_FIN',
						SECOND(LEFT(ADDTIME(LEFT(O.HORA_AGENDA,8), CONCAT_WS(':',TRUNCATE(OT.MINUTOS/60,0), OT.MINUTOS-60*TRUNCATE(OT.MINUTOS/60,0),'00')),8)) 'SEC_FIN',
						CONCAT_WS(' - ', S.SERVICIO, C.CLIENTE, A.ACTIVIDAD) 'PROYECTO',
						initCap(O.DIRECCION) 'DIRECCION', AF.COMUNA, AF.IDAREAFUNCIONAL, T.IDUSUARIO 'IDTECNICO', EO.IDESTRUCTURA_OPERACION
						FROM ORDEN O
						LEFT JOIN USUARIO T
						ON O.IDTECNICO = T.IDUSUARIO
						LEFT JOIN ORDEN_ESTADO OE
						ON O.IDORDEN_ESTADO = OE.IDORDEN_ESTADO
						LEFT JOIN ORDEN_TIPO OT
						ON O.IDORDEN_TIPO = OT.IDORDEN_TIPO
						LEFT JOIN ORDEN_CATEGORIA OCA
						ON O.IDORDEN_CATEGORIA =  OCA.IDORDEN_CATEGORIA
						LEFT JOIN ORDEN_ZONA_OPERACION OZA
						ON O.IDORDEN_ZONA_OPERACION = OZA.IDORDEN_ZONA_OPERACION
						LEFT JOIN ESTRUCTURA_OPERACION EO
						ON OZA.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON EO.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON EO.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON EO.IDACTIVIDAD = A.IDACTIVIDAD
						LEFT JOIN AREAFUNCIONAL AF
						ON OZA.IDAREAFUNCIONAL = AF.IDAREAFUNCIONAL
						WHERE OE.ESTADO NOT IN
						(
						'Rechazada',
						'Pendiente Comercial',
						'Programacion'
						)
						AND OE.SUB_ESTADO NOT IN
						(
						'Confirmada'
						)
						AND O.FECHA_AGENDA = '{$fecha}'
						AND O.IDTECNICO = '{$idtecnico}'
						ORDER BY O.HORA_AGENDA ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Rango Mantencion
function consultaRangoMantencion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTAR_RANGO_MANTENCIONES()";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta Rango Mantencion

// Consulta para ingresar Rango Mantencion
function ingresaRangoMantenciones($minutos, $horaInicio, $horaFin){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL CREA_RANGOS_MANTENCION_FLOTA('{$minutos}','{$horaInicio}','{$horaFin}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Rango Mantencion

// Consulta para habilitar Rango Mantencion
function activarRangoMantencion($idRangoMant, $tope){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE MANTENCION_RANGOS
	SET TOPE = '{$tope}',
	MANTENCION = 1
	WHERE IDMANTENCION_RANGOS = '{$idRangoMant}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para habilitar Rango Mantencion

// Consulta para deshabilitar Rango Mantencion
function desactivarRangoMantencion($idRangoMant){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE MANTENCION_RANGOS
	SET TOPE = 0,
	MANTENCION = 0
	WHERE IDMANTENCION_RANGOS = '{$idRangoMant}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para deshabilitar Rango Mantencion

// Consulta Rango Mantenciones
function consultaRangoHoraMantencion($fecha){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT mr.IDMANTENCION_RANGOS, CONCAT(mr.INICIO, ' - ', mr.FIN, ' (Disp: ', (mr.TOPE - SUM(CASE WHEN pc.ESTADO <> 'Cancelada' THEN 1 ELSE 0 END)
				), ')') 'RANGO'
				FROM MANTENCION_RANGOS mr
				LEFT JOIN DIAS_SEMANA ds
				ON mr.ID_DIA_SEMANA = ds.ID_DIAS_SEMANA
				LEFT JOIN PATENTE_CALENDAR pc
				ON mr.IDMANTENCION_RANGOS = pc.IDMANTENCION_RANGOS
				AND DATE_FORMAT(pc.start, '%Y-%m-%d') = '{$fecha}'
				WHERE mr.MANTENCION = 1 AND ds.DIA = (SELECT dia_nombre FROM calendario  WHERE fecha_calendario = '{$fecha}')
				AND mr.TOPE >
				(
					SELECT COUNT(IDMANTENCION_RANGOS)
					FROM PATENTE_CALENDAR
					WHERE IDMANTENCION_RANGOS = mr.IDMANTENCION_RANGOS
					AND DATE_FORMAT(start, '%Y-%m-%d') = '{$fecha}'
					AND ESTADO <> 'Cancelada'
				)
				GROUP BY mr.IDMANTENCION_RANGOS, CONCAT(mr.INICIO, ' - ', mr.FIN, ' (Disp: ', mr.TOPE, ')')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos Rut para Mantencion
function consultaRutForMantencion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p4.CODIGO, initCap(CONCAT(p3.NOMBRES ,' ',p3.APELLIDOS)) 'NOMBRE', p3.DNI
		FROM PERSONAL p3
		LEFT JOIN PATENTE p4
		ON p3.IDPATENTE = p4.IDPATENTE
		LEFT JOIN PERSONAL_ESTADO PE
		ON p3.IDPERSONAL = PE.IDPERSONAL
		AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
		AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
		OR PE.FECHA_TERMINO IS NULL)
		AND PE.FECHA_INICIO =
		(
			SELECT MAX(EE.FECHA_INICIO)
			FROM PERSONAL_ESTADO EE
			WHERE EE.IDPERSONAL = p3.IDPERSONAL
			AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
		)
		AND PE.IDPERSONAL_ESTADO =
		(
			SELECT MAX(EE.IDPERSONAL_ESTADO)
			FROM PERSONAL_ESTADO EE
			WHERE EE.IDPERSONAL = p3.IDPERSONAL
			AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
		)
		LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
		ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
		WHERE ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
		AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
		OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos para Mantencion con rut seleccionada
function consultaRutForMantencionSeleccionada($rut){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p4.CODIGO, initCap(CONCAT(p3.NOMBRES ,' ',p3.APELLIDOS)) 'NOMBRE', p3.DNI, p3.EMAIL, p3.TELEFONO,
						pm.MARCA, pm.MODELO, p4.AÑO, p4.KILOMETRAJE
						FROM PERSONAL p3
						LEFT JOIN PATENTE_PERSONAL PP
						ON p3.IDPERSONAL = PP.IDPERSONAL
						LEFT JOIN PATENTE p4
						ON PP.IDPATENTE = p4.IDPATENTE
						LEFT JOIN PATENTE_MARCAMODELO pm
						ON p4.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
						WHERE p3.DNI = '{$rut}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta evento mantencion
function consultaEventoMantencion($start, $end){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, pc.`start` 'HORA', pc.`end`, pc.MOTIVO, pc.SINIESTRO, CONCAT(p.NOMBRES, ' ', p.APELLIDOS)'PERSONAL', pc.CELULAR_PERSONAL 'TELEFONO', pc.CORREO_PERSONAL 'EMAIL', pc.KILOMETRAJE, p2.AÑO, p2.CODIGO,
		pm.MARCA, pm.MODELO, pc.PDF_AGENDA, pc.PDF_DIAG, pc.PDF_FACTURA, pc.PDF_OC
		FROM PATENTE_CALENDAR pc
		LEFT JOIN PERSONAL p
		ON pc.IDPERSONAL = p.IDPERSONAL
		LEFT JOIN PATENTE p2
		ON pc.IDPATENTE = p2.IDPATENTE
		LEFT JOIN PATENTE_MARCAMODELO pm
		ON p2.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
		WHERE start >= '{$start}' AND end <= '{$end}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos Patente para Mantencion
function consultaPatenteForMantencion(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.IDPATENTE, p.CODIGO
		FROM PATENTE p
		LEFT JOIN PATENTE_ESTADO pe
		ON p.IDPATENTE_ESTADO = pe.IDPATENTE_ESTADO
		WHERE pe.ESTADO <> 'TALLER'
		AND pe.ESTADO <> 'BAJA'
		AND pe.ESTADO <> 'ELIMINADO'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Datos para mantencion si la patente tiene siniestros
function consultaPatenteSiniestrosFormMantenciones($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT ps.IDPATENTE_SINIESTROS 'FOLIO', p.CODIGO, p.AÑO, p.KILOMETRAJE, pm.MARCA, pm.MODELO
		FROM PATENTE_SINIESTROS ps
		LEFT JOIN PATENTE p
		ON ps.IDPATENTE = p.IDPATENTE
		LEFT JOIN PATENTE_MARCAMODELO pm
		ON p.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
		WHERE p.CODIGO = '{$patente}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Mantencion
function ingresaMantencionesFlota($rutMantencion, $correoPersonal, $celularPersonal,$patenteMantencion, $kilometraje, $fechaMantencion,$horaMantencion, $motivoMantencion, $siniestro,$sucursal, $colorLetra, $colorFondo,$observacion,$idTaller){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESAR_MANTENCION_FLOTA('{$rutMantencion}','{$correoPersonal}','{$celularPersonal}','{$patenteMantencion}','{$kilometraje}','{$fechaMantencion}','{$horaMantencion}','{$motivoMantencion}','{$siniestro}','{$sucursal}','{$colorLetra}','{$colorFondo}','{$observacion}','{$idTaller}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Mantencion

// Consultas Datos de Mantencion para generar PDF
function consultaDatosMantencionPdf($idMantencion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pc.FECHA, pc.CELULAR_PERSONAL, pc.MOTIVO, pc.SINIESTRO, pc.CORREO_PERSONAL, pc.KILOMETRAJE,
				initCap(CONCAT(p.NOMBRES, ' ',p.APELLIDOS))'PERSONAL', p2.CODIGO, pm.MARCA, pm.MODELO, CONCAT(mr.INICIO, ' - ', mr.FIN) 'RANGO', pt.NOMBRE 'TALLER',pt.DIRECCION 'DIRECCION_TALLER',
				pt.CONTACTO, pt.TELEFONO, pa.NOMBRE 'ASEGURADORA', pa.RUT 'RUT_ASEG'
				FROM PATENTE_CALENDAR pc
				LEFT JOIN PERSONAL p
				ON pc.IDPERSONAL = p.IDPERSONAL
				LEFT JOIN PATENTE p2
				ON pc.IDPATENTE = p2.IDPATENTE
				LEFT JOIN PATENTE_MARCAMODELO pm
				ON p2.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
				LEFT JOIN MANTENCION_RANGOS mr
				ON pc.IDMANTENCION_RANGOS = mr.IDMANTENCION_RANGOS
				LEFT JOIN PATENTE_TALLER pt
				ON pc.IDPATENTE_TALLER = pt.IDPATENTE_TALLER
				LEFT JOIN PATENTE_ASEGURADORA pa
				ON p2.IDPATENTE_ASEGURADORA = pa.IDPATENTE_ASEGURADORA
				WHERE pc.IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar Pdf Agenda generado para Mantencion
function actualizarMantencionAgenda($idMantencion, $pdfAgenda){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_CALENDAR
		SET PDF_AGENDA = '{$pdfAgenda}',
		CONTADOR_AGENDA = 2
		WHERE IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function validarCampoUserGA($rut) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDUSUARIO, TOKEN_G_AT, LOGIN_2FA, FIRMA_2FA
						FROM USUARIO
						WHERE RUT = '{$rut}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function insertarCodeGA($rut, $code, $login2fa, $firma2fa){
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "UPDATE USUARIO SET TOKEN_G_AT = '{$code}' WHERE RUT = '{$rut}'";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    }
    else{
      // return $con->error;
      $con->query("ROLLBACK");
      return "Error";
    }
  }
  else{
    $con->query("ROLLBACK");
    return "Error";
  }
}

function insertarCodeGATipo($rut, $login2fa, $firma2fa) {
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "UPDATE USUARIO SET LOGIN_2FA={$login2fa}, FIRMA_2FA={$firma2fa} WHERE RUT = '{$rut}'";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    }
    else{
      // return $con->error;
      $con->query("ROLLBACK");
      return "Error";
    }
  }
  else{
    $con->query("ROLLBACK");
    return "Error";
  }
}

function consultaListadoZonasObras(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, O.IDOBRA_ZONA_OPERACION 'FOLIO', S.SERVICIO, L.CLIENTE, A.ACTIVIDAD, F.COMUNA,
				CASE WHEN O.ACTIVO = 1 THEN 'Habilitada' ELSE 'Deshabilitada' END 'ACTIVA',
				O.IDESTRUCTURA_OPERACION, O.IDAREAFUNCIONAL, CORREO, TELEFONO
				FROM OBRA_ZONA_OPERACION O
				LEFT JOIN ESTRUCTURA_OPERACION E
				ON O.IDESTRUCTURA_OPERACION = E.IDESTRUCTURA_OPERACION
				LEFT JOIN SERVICIO S
				ON E.IDSERVICIO = S.IDSERVICIO
				LEFT JOIN CLIENTE L
				ON E.IDCLIENTE = L.IDCLIENTE
				LEFT JOIN ACTIVIDAD A
				ON E.IDACTIVIDAD = A.IDACTIVIDAD
				LEFT JOIN AREAFUNCIONAL F
				ON O.IDAREAFUNCIONAL = F.IDAREAFUNCIONAL";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos proyectos config zonas obra
function datosProyectoConfigZonasObras(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT E.IDESTRUCTURA_OPERACION 'ID_ESTRUCTURA', CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD) AS PROYECTO, A.AREA
						FROM ESTRUCTURA_OPERACION E
						LEFT JOIN CLIENTE C
						ON E.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN SERVICIO S
						ON E.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN ACTIVIDAD A
						ON E.IDACTIVIDAD = A.IDACTIVIDAD
						GROUP BY E.IDESTRUCTURA_OPERACION, CONCAT_WS(' / ', CONCAT_WS(' / ', S.SERVICIO, C.CLIENTE), A.ACTIVIDAD), A.AREA
						ORDER BY A.AREA DESC, PROYECTO ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Datos zonas config Zonas Obra
function datosZonasConfigZonasObra(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT A.IDAREAFUNCIONAL, A.COMUNA, A.PROVINCIA, A.REGION
						FROM AREAFUNCIONAL A
						GROUP BY A.IDAREAFUNCIONAL, A.COMUNA, A.PROVINCIA, A.REGION
						ORDER BY A.COMUNA ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Borrar zonas orden pre-config
function cargarZonasObraConfig($proyecto, $zona){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_ZONA_OPERACION(IDESTRUCTURA_OPERACION, IDAREAFUNCIONAL, ACTIVO)
						VALUES('{$proyecto}','{$zona}','1')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Borrar zonas orden
function eliminarZonasObra($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_ZONA_OPERACION
						WHERE IDOBRA_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Activa zonas obra
function activaZonasObra($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_ZONA_OPERACION
						SET ACTIVO = 1
						WHERE IDOBRA_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

//Desactiva zonas orden
function desactivaZonasObra($idZonas){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_ZONA_OPERACION
						SET ACTIVO = 0
						WHERE IDOBRA_ZONA_OPERACION IN
						(
							{$idZonas}
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Datos Taller para Mantencion
function consultaDatosTallerMantencion($idSucursal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pt.RUT, pt.NOMBRE, pt.IDPATENTE_TALLER
				FROM PATENTE_TALLER pt
				LEFT JOIN SUCURSAL s
				ON pt.IDAREAFUNCIONAL = s.IDAREAFUNCIONAL
				WHERE s.IDSUCURSAL = '{$idSucursal}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Direccion Taller para Mantencion
function consultaDireccionTallerMantencion($idTaller){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pt.DIRECCION, A.COMUNA
						FROM PATENTE_TALLER pt
						LEFT JOIN AREAFUNCIONAL A
						ON pt.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
						WHERE pt.IDPATENTE_TALLER = '{$idTaller}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Calendar
function consultaCalendarSelect($idMantencion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT p.CODIGO, pm.MARCA, pm.MODELO, pc.CORREO_PERSONAL, pc.CELULAR_PERSONAL, initCap(CONCAT(p2.NOMBRES,' ',p2.APELLIDOS)) 'PERSONAL',
				pc.FECHA, CONCAT(mr.INICIO, ' - ', mr.FIN) 'RANGO', pc.MOTIVO, pc.SINIESTRO, pt.NOMBRE, pt.DIRECCION, s.SUCURSAL, CONCAT(pc.ESTADO,' - ', pc.SUBESTADO)'ESTADO_FINAL',
				pc.ESTADO, pc.SUBESTADO, pc.PDF_AGENDA, pc.PDF_DIAG, pc.PDF_FACTURA, pc.PDF_OC
				FROM PATENTE_CALENDAR pc
				LEFT JOIN PATENTE p
				ON pc.IDPATENTE = p.IDPATENTE
				LEFT JOIN PATENTE_MARCAMODELO pm
				ON p.IDPATENTE_MARCAMODELO = pm.IDPATENTE_MARCAMODELO
				LEFT JOIN PERSONAL p2
				ON pc.IDPERSONAL = p2.IDPERSONAL
				LEFT JOIN MANTENCION_RANGOS mr
				ON pc.IDMANTENCION_RANGOS = mr.IDMANTENCION_RANGOS
				LEFT JOIN PATENTE_TALLER pt
				ON p.IDPATENTE_TALLER = pt.IDPATENTE_TALLER
				LEFT JOIN SUCURSAL s
				ON pc.IDSUCURSAL = s.IDSUCURSAL
				WHERE pc.IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Vehiculos Q estados
function consultaVehiculoQEstados($rut,$path){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_VEHICULOS_Q_ESTADOS('{$rut}','{$path}')";

    if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
      return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consultas Patente-Estado para Vehiculos Editar
function consultaPatenteEstadoEditar($estado){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_ESTADO, initCap(ESTADO) 'ESTADO',
CASE WHEN SUB_ESTADO1 IS NOT NULL THEN initCap(SUB_ESTADO1) ELSE '' END 'SUB_ESTADO1',
CASE WHEN SUB_ESTADO2 IS NOT NULL THEN initCap(SUB_ESTADO2) ELSE '' END 'SUB_ESTADO2'
FROM PATENTE_ESTADO
ORDER BY ESTADO ASC
";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para rechazar mantencion
function rechazarMantencion($idMantencion, $motivo, $observacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_CALENDAR
	SET ESTADO = 'Cancelada',
	SUBESTADO = '{$motivo}',
	OBSERVACION_CIERRE_PROCESO = '{$observacion}'
	WHERE IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para completar mantencion
function completarMantencion($idMantencion,$observacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_CALENDAR
	SET ESTADO = 'Agendada',
	SUBESTADO = 'Completada',
	OBSERVACION_CIERRE_PROCESO = '{$observacion}'
	WHERE IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta datos PDF para Mantencion
function consultaDatosPdfMantencion($idMantencion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT pc.PDF_AGENDA, pc.PDF_DIAG, pc.PDF_FACTURA, pc.PDF_OC, pc.CONTADOR_AGENDA,
				pc.CONTADOR_DIAG, pc.CONTADOR_FACTURA, pc.CONTADOR_OC
				FROM PATENTE_CALENDAR pc
				WHERE pc.IDPATENTE_CALENDAR = '{$idMantencion}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para actualizar la subida de PDFs en Mantenciones
function actualizaPDFMantencion($idMantencion, $docPdfDiagnostico, $docPdfFactura, $docPdfOc, $contadorDiag, $contadorFactura, $contadorOc){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL SUBIR_PDF_MANTENCION('$idMantencion','$docPdfDiagnostico','$docPdfFactura','$docPdfOc','$contadorDiag','$contadorFactura','$contadorOc')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}

// Consulta para actualizar estado del vehiculo luego de pasar por  Mantenciones
function actualizarEstadoVehiculoMantencion($motivo,$patente){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL ACTUALIZAR_ESTADO_VEH_MANTENCION('$motivo','$patente')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}

// Consulta chequear Patente para mantenciones
function chequeaPatenteForMantenciones($patente){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT COUNT(*) 'CANTIDAD'
		FROM PATENTE_CALENDAR PC
		LEFT JOIN PATENTE P
		ON PC.IDPATENTE = P.IDPATENTE
		WHERE P.CODIGO = '{$patente}'
		AND PC.`start` >= NOW()
		AND PC.ESTADO = 'Agendada'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaTarjetaSolicitudCarga( $tarjeta, $nombre, $rutUser,$patente, $monto, $observacion, $bodega, $producto, $tipo, $rutPersonal){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO TARJETACOMBUSTIBLE_CARGAS(TARJETA, NOMBRE, RUT_USUARIO, PATENTE, MONTO, OBSERVACION, BODEGA, PRODUCTO, TIPO, RUT, ESTADO_CARGA, FECHA_SOLICITUD,HORA_SOLICITUD,MES,ANO, CARGA_TIPO)
VALUES ('" . $tarjeta . "','" . $nombre . "','" . $rutUser . "','" . $patente . "','" . $monto . "','" . $observacion . "','" . $bodega . "','" . $producto . "','" . $tipo . "','" . $rutPersonal . "','En revisión', CURDATE(), CURTIME(),MONTH(CURDATE()),YEAR(CURDATE()),'Adicional')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaUsuariosRolesObras($idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT U.IDUSUARIO, U.RUT, U.NOMBRE, F.NOMBRE 'PERFIL'
						FROM USUARIO U
						LEFT JOIN PERFIL F
						ON U.IDPERFIL = F.IDPERFIL
						WHERE U.ESTADO = 'Activo'
						AND U.IDUSUARIO NOT IN
						(
							SELECT Z.IDUSUARIO
							FROM OBRA_ZONA_PERSONAL Z
							WHERE Z.IDOBRA_ZONA_OPERACION = '{$idez}'
						)";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaUsuariosObraRolesAsignados($idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, Z.IDOBRA_ZONA_PERSONAL, Z.IDUSUARIO, U.RUT, U.NOMBRE, F.NOMBRE 'PERFIL', Z.TIPO,
						CONCAT('<span class=''fas fa-user-times'' onclick='' ','quitarPersonalZonaObra(',Z.IDOBRA_ZONA_PERSONAL,');''></span>') 'BORRAR'
						FROM OBRA_ZONA_PERSONAL Z
						LEFT JOIN USUARIO U
						ON Z.IDUSUARIO = U.IDUSUARIO
						LEFT JOIN PERFIL F
						ON U.IDPERFIL = F.IDPERFIL
						WHERE Z.IDOBRA_ZONA_OPERACION = '{$idez}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function eliminarPersonalAsignadoZonaObra($id){
		$con = conectar();
		if($con != 'No conectado'){
				$sql = "DELETE FROM OBRA_ZONA_PERSONAL
								WHERE IDOBRA_ZONA_PERSONAL = '{$id}'";
				if($con->query($sql)){
						$con->query("COMMIT");
						return "Ok";
				}else{
						$con->query("ROLLBACK");
						// return $con->error;
						return "Error";
				}
		}else{
				$con->query("ROLLBACK");
				return "Error";
		}
}

function ingresarPersonalAsignadoZonaObra($idusuario, $idoz, $tipo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if ($con != 'No conectado') {
			$sql = "INSERT INTO OBRA_ZONA_PERSONAL(IDUSUARIO, IDOBRA_ZONA_OPERACION, TIPO)
							VALUES('{$idusuario}','{$idoz}','{$tipo}')";
			if($con->query($sql)){
					$con->query("COMMIT");
					return "Ok";
			}else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
			}
	}else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function ingresaTarjetaDevolucion( $tarjeta, $nombre, $rutUser,$patente, $monto, $observacion, $bodega, $producto, $tipo, $rutPersonal){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO TARJETACOMBUSTIBLE_CARGAS(TARJETA, NOMBRE, RUT_USUARIO, PATENTE, MONTO, OBSERVACION, BODEGA, PRODUCTO, TIPO, RUT, ESTADO_CARGA, FECHA_SOLICITUD,HORA_SOLICITUD,MES,ANO, CARGA_TIPO)
VALUES ('" . $tarjeta . "','" . $nombre . "','" . $rutUser . "','" . $patente . "','" . $monto . "','" . $observacion . "','" . $bodega . "','" . $producto . "','" . $tipo . "','" . $rutPersonal . "','En revisión', CURDATE(), CURTIME(),MONTH(CURDATE()),YEAR(CURDATE()),'Devolución')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Listado Obras
function consultaListadoObras(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_OBRAS()";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta Listado Obras

// Consulta Contratos Obras
function consultaListadoContratos(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, NOMBRE, IDOBRA_CONTRATO, ANO, IDCONTRATO
				FROM OBRA_CONTRATO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Consulta Contratos Obras

// Consulta para ingresar Contratos Obras (mantenedor)
function ingresaContratosObras($nombreContrato,$anoContrato,$idContrato){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_CONTRATO(NOMBRE, ANO, IDCONTRATO)
				VALUES('{$nombreContrato}','{$anoContrato}','{$idContrato}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Contratos Obras (mantenedor)

// Consulta para Editar Contratos Obras (mantenedor)
function editarContratosObras($idContratosObras,$nombre,$ano,$idContrato){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_CONTRATO
				SET NOMBRE = '{$nombre}',
				ANO = '{$ano}',
				IDCONTRATO = '{$idContrato}'
				WHERE IDOBRA_CONTRATO = '{$idContratosObras}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar Contratos Obras (mantenedor)

// Consulta para eliminar Contratos Obras (mantenedor)
function eliminarContratosObras($idContratosObras){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_CONTRATO
		 WHERE IDOBRA_CONTRATO = '{$idContratosObras}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar Contratos Obras (mantenedor)

function datosCaratulaObras($idObras){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL CARATULA_OBRAS('{$idObras}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listadoComprasFinanzasEstructura($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT
        ' ' as S,
        EST.IDCOMPRAS_FINANZAS_ESTRUCTURA,
        EST.IDCOMPRAS_FINANZAS_DIM1,
        CONCAT_WS(' - ', fda.CODIGO, fda.NOMBRE) as NOMBREA,
        fda.TIPO as TIPOA,
        EST.IDCOMPRAS_FINANZAS_DIM2,
        CONCAT_WS(' - ', fdb.CODIGO, fdb.NOMBRE) as NOMBREB,
        fdb.TIPO as TIPOB,
        EST.IDCOMPRAS_FINANZAS_DIM3,
        CONCAT_WS(' - ', fdc.CODIGO, fdc.NOMBRE) as NOMBREC,
        fdc.TIPO as TIPOC
      FROM COMPRAS_FINANZAS_ESTRUCTURA EST
      LEFT JOIN COMPRAS_FINANZAS_DIM1 fda on fda.IDCOMPRAS_FINANZAS_DIM1 = EST.IDCOMPRAS_FINANZAS_DIM1
      LEFT JOIN COMPRAS_FINANZAS_DIM2 fdb on fdb.IDCOMPRAS_FINANZAS_DIM2 = EST.IDCOMPRAS_FINANZAS_DIM2
      LEFT JOIN COMPRAS_FINANZAS_DIM3 fdc on fdc.IDCOMPRAS_FINANZAS_DIM3 = EST.IDCOMPRAS_FINANZAS_DIM3";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function listadoComprasGestion($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT
      ' ' as S,
      D3.IDCOMPRAS_GESTION_DIM3,
      CONCAT_WS(' - ', D3.CODIGO, D3.NOMBRE) DIM3, D3.CODIGO COD3,
			CONCAT_WS(' - ', D2.CODIGO, D2.NOMBRE) DIM2, D2.CODIGO COD2,
			CONCAT_WS(' - ', D1.CODIGO, D1.NOMBRE) DIM1, D1.CODIGO COD1,
			CASE WHEN D1.TIPO = 'MAT' THEN 'Material' ELSE 'Servicio' END 'TIPO'
      FROM COMPRAS_GESTION_DIM3 D3
      LEFT JOIN COMPRAS_GESTION_DIM2 D2
      ON D3.IDCOMPRAS_GESTION_DIM2 = D2.IDCOMPRAS_GESTION_DIM2
      LEFT JOIN COMPRAS_GESTION_DIM1 D1
      ON D2.IDCOMPRAS_GESTION_DIM1 = D1.IDCOMPRAS_GESTION_DIM1";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function listadoComprasMateriales($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT
						' ' as S,
						MAT.IDCOMPRAS_MATERIAL,
						MAT.IDCOMPRAS_GESTION_DIM3,
						G3.CODIGO AS G3_CODIGO,
						G3.NOMBRE AS G3_NOMBRE,
						G2.CODIGO AS G2_CODIGO,
						G2.NOMBRE AS G2_NOMBRE,
						G1.CODIGO AS G1_CODIGO,
						G1.NOMBRE AS G1_NOMBRE,
						MAT.IDCOMPRAS_FINANZAS_ESTRUCTURA,
						F1.CODIGO AS F1_CODIGO,
						F1.NOMBRE AS F1_NOMBRE,
						F2.CODIGO AS F2_CODIGO,
						F2.NOMBRE AS F2_NOMBRE,
						F3.CODIGO AS F3_CODIGO,
						F3.NOMBRE AS F3_NOMBRE,
						MAT.IDSUBCONTRATO,
						SB.RUT AS SB_RUT,
						SB.NOMBRE_SUBCONTRATO AS SB_NOMBRE_SUBCONTRATO,
						MAT.CODIGO,
						MAT.NOMBRE,
						MAT.MARCA,
						MAT.MODELO,
						MAT.COLOR,
						MAT.TIPO,
						MAT.MATERIAL_FAB,
						MAT.TALLA,
						MAT.ENVASE,
						MAT.PRECIO_MIN,
						MAT.PRECIO_MAX,
						MAT.VOLTAJE,
						MAT.POTENCIA,
						MAT.CALIBRE,
						MAT.ANCHO,
						MAT.ALTO,
						MAT.LARGO,
						MAT.OBSERVACION
						FROM COMPRAS_MATERIAL MAT
						LEFT JOIN COMPRAS_GESTION_DIM3 G3 ON G3.IDCOMPRAS_GESTION_DIM3 = MAT.IDCOMPRAS_GESTION_DIM3
						LEFT JOIN COMPRAS_FINANZAS_ESTRUCTURA FE ON FE.IDCOMPRAS_FINANZAS_ESTRUCTURA = MAT.IDCOMPRAS_FINANZAS_ESTRUCTURA
						LEFT JOIN COMPRAS_FINANZAS_DIM1 F1 ON F1.IDCOMPRAS_FINANZAS_DIM1 = FE.IDCOMPRAS_FINANZAS_DIM1
						LEFT JOIN COMPRAS_FINANZAS_DIM2 F2 ON F2.IDCOMPRAS_FINANZAS_DIM2 = FE.IDCOMPRAS_FINANZAS_DIM2
						LEFT JOIN COMPRAS_FINANZAS_DIM3 F3 ON F3.IDCOMPRAS_FINANZAS_DIM3 = FE.IDCOMPRAS_FINANZAS_DIM3
						LEFT JOIN SUBCONTRATISTAS SB ON SB.IDSUBCONTRATO = MAT.IDSUBCONTRATO
						LEFT JOIN COMPRAS_GESTION_DIM2 G2 ON G3.IDCOMPRAS_GESTION_DIM2 = G2.IDCOMPRAS_GESTION_DIM2
						LEFT JOIN COMPRAS_GESTION_DIM1 G1 ON G2.IDCOMPRAS_GESTION_DIM1 = G1.IDCOMPRAS_GESTION_DIM1";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function consultaComprasMateriales($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT
        MAT.IDCOMPRAS_MATERIAL,
        MAT.CODIGO,
        MAT.NOMBRE
      FROM COMPRAS_MATERIAL MAT";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function consultaComprasMaterialesDetalle($idMaterial) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT
        ' ' as S,
        MAT.IDCOMPRAS_MATERIAL,
        MAT.IDCOMPRAS_GESTION_DIM3,
        G3.CODIGO AS G3_CODIGO,
        G3.NOMBRE AS G3_NOMBRE,
        MAT.IDCOMPRAS_FINANZAS_ESTRUCTURA,
        F1.CODIGO AS F1_CODIGO,
        F1.NOMBRE AS F1_NOMBRE,
        F2.CODIGO AS F2_CODIGO,
        F2.NOMBRE AS F2_NOMBRE,
        F3.CODIGO AS F3_CODIGO,
        F3.NOMBRE AS F3_NOMBRE,
        MAT.IDSUBCONTRATO,
        SB.RUT AS SB_RUT,
        SB.NOMBRE_SUBCONTRATO AS SB_NOMBRE_SUBCONTRATO,
				MAT.CODIGO,
        MAT.NOMBRE,
        MAT.MARCA,
        MAT.MODELO,
        MAT.COLOR,
        MAT.TIPO,
        MAT.MATERIAL_FAB,
        MAT.TALLA,
        MAT.ENVASE,
        MAT.PRECIO_MIN,
        MAT.PRECIO_MAX,
        MAT.VOLTAJE,
        MAT.POTENCIA,
        MAT.CALIBRE,
        MAT.ANCHO,
        MAT.ALTO,
        MAT.LARGO,
        MAT.OBSERVACION
      FROM COMPRAS_MATERIAL MAT
      LEFT JOIN COMPRAS_GESTION_DIM3 G3 ON G3.IDCOMPRAS_GESTION_DIM3 = MAT.IDCOMPRAS_GESTION_DIM3
      LEFT JOIN COMPRAS_FINANZAS_ESTRUCTURA FE ON FE.IDCOMPRAS_FINANZAS_ESTRUCTURA = MAT.IDCOMPRAS_FINANZAS_ESTRUCTURA
      INNER JOIN COMPRAS_FINANZAS_DIM1 F1 ON F1.IDCOMPRAS_FINANZAS_DIM1 = FE.IDCOMPRAS_FINANZAS_DIM1
      INNER JOIN COMPRAS_FINANZAS_DIM2 F2 ON F2.IDCOMPRAS_FINANZAS_DIM2 = FE.IDCOMPRAS_FINANZAS_DIM2
      INNER JOIN COMPRAS_FINANZAS_DIM3 F3 ON F3.IDCOMPRAS_FINANZAS_DIM3 = FE.IDCOMPRAS_FINANZAS_DIM3
      LEFT JOIN SUBCONTRATISTAS SB ON SB.IDSUBCONTRATO = MAT.IDSUBCONTRATO
      WHERE IDCOMPRAS_MATERIAL = {$idMaterial}";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function listadoComprasProveedores($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "CALL LISTADO_COMPRAS_PROVEEDORES()";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function listadoComprasServicios($rut) {
  $con = conectar();
	if($con != 'No conectado') {
		$sql = "SELECT '' S,
						S.IDCOMPRAS_SERVICIO 'FOLIO',
						CONCAT_WS(' - ', CG1.NOMBRE,CG2.NOMBRE,CG3.NOMBRE) 'GESTION',
						CONCAT_WS(' - ', CFD1.NOMBRE,CFD2.NOMBRE,CFD3.NOMBRE) 'FINANZAS',
						S.CODIGO,
						S.NOMBRE,
						S.MARCA,
						S.MODELO,
						S.TIPO,
						S.PRECIO_MIN,
						S.PRECIO_MAX,
						S.POTENCIA,
						S.PESO,
						S.CAPACIDAD,
						S.AREA_M2,
						S.ANCHO,
						S.ALTO,
						S.LARGO,
						S.TEMPERATURA,
						S.HUMEDAD,
						S.PRECISION,
						S.UNIDAD_MEDIDA,
						initCap(SU.NOMBRE_SUBCONTRATO) 'EMPRESA'
						FROM COMPRAS_SERVICIO S
						LEFT JOIN COMPRAS_GESTION_DIM3 CG3
						ON S.IDCOMPRAS_GESTION_DIM3 = CG3.IDCOMPRAS_GESTION_DIM3
						LEFT JOIN COMPRAS_GESTION_DIM2 CG2
						ON CG3.IDCOMPRAS_GESTION_DIM2 = CG2.IDCOMPRAS_GESTION_DIM2
						LEFT JOIN COMPRAS_GESTION_DIM1 CG1
						ON CG2.IDCOMPRAS_GESTION_DIM1 = CG1.IDCOMPRAS_GESTION_DIM1
						LEFT JOIN COMPRAS_FINANZAS_ESTRUCTURA CFE
						ON S.IDCOMPRAS_FINANZAS_ESTRUCTURA = CFE.IDCOMPRAS_FINANZAS_ESTRUCTURA
						LEFT JOIN COMPRAS_FINANZAS_DIM3 CFD3
						ON CFE.IDCOMPRAS_FINANZAS_DIM3 = CFD3.IDCOMPRAS_FINANZAS_DIM3
						LEFT JOIN COMPRAS_FINANZAS_DIM2 CFD2
						ON CFE.IDCOMPRAS_FINANZAS_DIM2 = CFD2.IDCOMPRAS_FINANZAS_DIM2
						LEFT JOIN COMPRAS_FINANZAS_DIM1 CFD1
						ON CFE.IDCOMPRAS_FINANZAS_DIM1 = CFD1.IDCOMPRAS_FINANZAS_DIM1
						LEFT JOIN SUBCONTRATISTAS SU
						ON S.IDSUBCONTRATO = SU.IDSUBCONTRATO";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function consultaPatentesSinTarjeta(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT P.CODIGO
FROM PATENTE P
LEFT JOIN TARJETACOMBUSTIBLE T
ON P.IDPATENTE = T.IDPATENTE
WHERE P.IDPATENTE_ESTADO IN (1,2)
AND
(
CASE WHEN T.IDTARJETACOMBUSTIBLE_ESTADO = 4 THEN 1 ELSE 0 END < 1
OR
CASE WHEN T.IDTARJETACOMBUSTIBLE_ESTADO = 2 THEN 1 ELSE 0 END < 1
)
GROUP BY P.CODIGO
ORDER BY P.CODIGO ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
}

function consultaPatenteCantAsig($codigo){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT P.CODIGO,
SUM(CASE WHEN T.IDTARJETACOMBUSTIBLE_ESTADO = 4 THEN 1 ELSE 0 END) 'BACKUP',
SUM(CASE WHEN T.IDTARJETACOMBUSTIBLE_ESTADO = 2 THEN 1 ELSE 0 END) 'ASIGNADA'
FROM PATENTE P
LEFT JOIN TARJETACOMBUSTIBLE T
ON P.IDPATENTE = T.IDPATENTE
WHERE P.CODIGO = '" . $codigo . "'
GROUP BY P.CODIGO";
		if ($row = $con->query($sql)) {
      $return = array();
      while ($array = $row->fetch_assoc()) {
        $return[] = $array;
      }
      return $return;
    } else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaTarjetasEstado(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDTARJETACOMBUSTIBLE_ESTADO 'ID', NOMBRE 'ESTADO'
FROM TARJETACOMBUSTIBLE_ESTADO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function asignarTarjeta($numero, $patente, $estado){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE TARJETACOMBUSTIBLE
	SET IDPATENTE = (SELECT IDPATENTE FROM PATENTE WHERE CODIGO = '" . $patente . "'),
	FECHA = CURDATE(),
	IDTARJETACOMBUSTIBLE_ESTADO = (SELECT IDTARJETACOMBUSTIBLE_ESTADO FROM TARJETACOMBUSTIBLE_ESTADO WHERE NOMBRE ='" . $estado ."')
	WHERE NUMERO = '" . $numero . "'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaDatosDetalleOrdenAtc($idorden){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S, O.IDORDEN_HISTORIAL, CONCAT_WS(' ',OE.COLOR_ESTADO,OE.ESTADO) 'ESTADO', CONCAT_WS(' ',OE.COLOR_SUBESTADO,OE.SUB_ESTADO) 'SUB_ESTADO',
								CONCAT('<b class=\"fas fa-comment-alt\" style=\"color: #black; font-size: 10pt;\" title=\"',O.OBSERVACION,'\" ></b>') 'OBSERVACION',
								O.HISTORIA, initCap(CONCAT(EJ.RUT,' / ', EJ.NOMBRE)) 'EJECUTOR',
								initCap(CONCAT(D.RUT,' / ', D.NOMBRE)) 'DESPACHO', initCap(CONCAT(TA.RUT,' / ', TA.NOMBRE)) 'TECNICO', FECHA, LEFT(HORA,8) 'HORA'
								FROM ORDEN_HISTORIAL O
								LEFT JOIN ORDEN_ZONA_OPERACION T
								ON O.IDORDEN_ZONA_OPERACION = T.IDORDEN_ZONA_OPERACION
								LEFT JOIN ESTRUCTURA_OPERACION E
								ON T.IDESTRUCTURA_OPERACION = E.IDESTRUCTURA_OPERACION
								LEFT JOIN SERVICIO S
								ON E.IDSERVICIO = S.IDSERVICIO
								LEFT JOIN CLIENTE L
								ON E.IDCLIENTE = L.IDCLIENTE
								LEFT JOIN ACTIVIDAD A
								ON E.IDACTIVIDAD = A.IDACTIVIDAD
								LEFT JOIN ORDEN_ESTADO OE
								ON O.IDORDEN_ESTADO = OE.IDORDEN_ESTADO
								LEFT JOIN ORDEN_TRAMO OT
								ON O.IDORDEN_TRAMO = OT.IDORDEN_TRAMO
								LEFT JOIN AREAFUNCIONAL AF
								ON T.IDAREAFUNCIONAL = AF.IDAREAFUNCIONAL
								LEFT JOIN SUBCONTRATISTAS ES
								ON O.IDEMPRESA = ES.IDSUBCONTRATO
								LEFT JOIN USUARIO D
								ON O.IDDESPACHO = D.IDUSUARIO
								LEFT JOIN USUARIO TA
								ON O.IDTECNICO = TA.IDUSUARIO
								LEFT JOIN ORDEN_TIPO OI
								ON O.IDORDEN_TIPO = OI.IDORDEN_TIPO
								LEFT JOIN ORDEN_CATEGORIA OCA
								ON O.IDORDEN_CATEGORIA = OCA.IDORDEN_CATEGORIA
								LEFT JOIN USUARIO EJ
								ON O.IDEJECUTOR = EJ.IDUSUARIO
								WHERE O.IDORDEN = '{$idorden}'
								ORDER BY O.IDORDEN_HISTORIAL DESC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresaHistorialOrdenObs($rutUser, $idorden, $historia, $observacion) {
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO ORDEN_HISTORIAL(IDORDEN,IDORDEN_CATEGORIA,IDORDEN_TIPO,FOLIO,SUB_TIPO,TECNOLOGIA,IDORDEN_ESTADO,FECHA_CREACION,FECHA_AGENDA,HORA_AGENDA,IDORDEN_TRAMO,FECHA_ATENCION,HORA_INICIO,HORA_FIN,DIRECCION,IDORDEN_ZONA_OPERACION,LATITUD,LONGITUD,DNI_CLIENTE,NOMBRE_CLIENTE,FONO_CLIENTE,IDEMPRESA,IDDESPACHO,IDTECNICO,Q_AGENDA,OBSERVACION,HISTORIA,IDEJECUTOR,FECHA,HORA)
			SELECT IDORDEN,IDORDEN_CATEGORIA,IDORDEN_TIPO,FOLIO,SUB_TIPO,TECNOLOGIA,IDORDEN_ESTADO,FECHA_CREACION,FECHA_AGENDA,HORA_AGENDA,IDORDEN_TRAMO,FECHA_ATENCION,HORA_INICIO,HORA_FIN,DIRECCION,IDORDEN_ZONA_OPERACION,LATITUD,LONGITUD,DNI_CLIENTE,NOMBRE_CLIENTE,FONO_CLIENTE,IDEMPRESA,IDDESPACHO,IDTECNICO,Q_AGENDA, '{$observacion}', '{$historia}', (SELECT IDUSUARIO
	FROM USUARIO
	WHERE RUT = '{$rutUser}'), DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%H:%i:%s')
			FROM ORDEN
			WHERE IDORDEN = '{$idorden}'";
			if ($con->query($sql)) {
					$con->query("COMMIT");
					return $sql;
			}
			else{
				$con->query("ROLLBACK");
				return $sql;
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaSelectorPeriodosSolCombustible(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DATE_FORMAT(FECHA_SOLICITUD, '%Y-%m') 'PERIODO'
FROM TARJETACOMBUSTIBLE_CARGAS
GROUP BY DATE_FORMAT(FECHA_SOLICITUD , '%Y-%m')
ORDER BY DATE_FORMAT(FECHA_SOLICITUD , '%Y-%m') DESC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaListaSolCombustible($ano,$mes){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S,tc.*
FROM TARJETACOMBUSTIBLE_CARGAS tc
WHERE MES = '{$mes}'
AND ANO = '{$ano}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

function actualizaTarjetaSolicitudCombustible( $idSolicitud, $montoValidado, $observacionValidacion, $rutUser){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE TARJETACOMBUSTIBLE_CARGAS
SET FECHA_VALIDACION = CURDATE(), HORA_VALIDACION = CURTIME(), MONTO_VALIDADO = '{$montoValidado}', OBS_VALIDACION = '{$observacionValidacion}',
ESTADO_CARGA = 'Aprobada'
WHERE IDCARGA_SOLICITADA = '" . $idSolicitud . "'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function rechazarTarjetaSolicitudCombustible($idSolicitud, $estado, $montoValidado, $observacionValidacion, $rutUser){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE TARJETACOMBUSTIBLE_CARGAS
SET FECHA_VALIDACION = CURDATE(), HORA_VALIDACION = CURTIME(), MONTO_VALIDADO = '{$montoValidado}', OBS_VALIDACION = '{$observacionValidacion}',
ESTADO_CARGA = '{$estado}'
WHERE IDCARGA_SOLICITADA = '{$idSolicitud}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para ingresar Caratula(xml) a tabla Obras
function agregarCaratula($tipo,$red,$nombreOe,$proyecto,$cliente,$direccion,$pep2,$gestor,$central,$inicio,$final,$ito,$comuna,$pep1,$idAgencia,$idContrato,$idEmpresa){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA(TIPO,RED,NOMBREOE,PROYECTO,CLIENTE,DIRECCION,PEP2,GESTOR,CENTRAL,INIOE,FINOE,ITO,FCREA,PEP1,IDOBRA_AGENCIA,IDOBRA_CONTRATO,IDAREAFUNCIONAL,ESTADO,IDEMPRESA_ASIGNADA)
			VALUES('{$tipo}','{$red}', '{$nombreOe}', '{$proyecto}','{$cliente}', '{$direccion}','{$pep2}','{$gestor}','{$central}','{$inicio}','{$final}','{$ito}',NOW(),'{$pep1}',
			(
				SELECT IDOBRA_AGENCIA FROM OBRA_AGENCIA WHERE IDAGENCIA = '{$idAgencia}'
			),
			(
				SELECT IDOBRA_CONTRATO FROM OBRA_CONTRATO WHERE IDCONTRATO = '{$idContrato}'
			),
			(
				SELECT IDAREAFUNCIONAL FROM AREAFUNCIONAL WHERE COMUNA LIKE '%{$comuna}%'
			),'En Planificación','{$idEmpresa}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "OK";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function precargaObraAgencia($idAgencia,$agencia){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL OBRA_CHECK_AGENCIA('{$idAgencia}','{$agencia}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "OK";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function precargaObraContrato($idContrato,$contrato){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL OBRA_CHECK_CONTRATO('{$idContrato}','{$contrato}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "OK";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaComprasFinanzasDim1($clas){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM1, CODIGO, NOMBRE, TIPO FROM COMPRAS_FINANZAS_DIM1 WHERE TIPO = '{$clas}'";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaComprasFinanzasDim2($clas){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM2, CODIGO, NOMBRE, TIPO FROM COMPRAS_FINANZAS_DIM2 WHERE TIPO = '{$clas}'";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaComprasFinanzasDim3($clas){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM3, CODIGO, NOMBRE, TIPO FROM COMPRAS_FINANZAS_DIM3 WHERE TIPO = '{$clas}'";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaMantFinanzasDim1($codigo) {
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM1, CODIGO, NOMBRE
      FROM COMPRAS_FINANZAS_DIM1
      WHERE CODIGO = '{$codigo}'";
    if ($row = $con->query($sql)) {
      $array = $row->fetch_array(MYSQLI_BOTH);
			return $array;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaMantFinanzasDim2($codigo) {
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM2, CODIGO, NOMBRE
      FROM COMPRAS_FINANZAS_DIM2
      WHERE CODIGO = '{$codigo}'";
    if ($row = $con->query($sql)) {
      $array = $row->fetch_array(MYSQLI_BOTH);
			return $array;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaMantFinanzasDim3($codigo) {
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_DIM3, CODIGO, NOMBRE
      FROM COMPRAS_FINANZAS_DIM3
      WHERE CODIGO = '{$codigo}'";
    if ($row = $con->query($sql)) {
      $array = $row->fetch_array(MYSQLI_BOTH);
			return $array;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaMantFinanzasEstructura($idDim1, $idDim2, $idDim3) {
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_FINANZAS_ESTRUCTURA
      FROM COMPRAS_FINANZAS_ESTRUCTURA
      WHERE IDCOMPRAS_FINANZAS_DIM1 = {$idDim1}
      AND IDCOMPRAS_FINANZAS_DIM2 = {$idDim2}
      AND IDCOMPRAS_FINANZAS_DIM3 = {$idDim3}";
    if ($row = $con->query($sql)) {
      $array = $row->fetch_array(MYSQLI_BOTH);
			return $array;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function ingresarMantFinanzasDim1($codigo, $nombre, $tipo) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_FINANZAS_DIM1(
        CODIGO, NOMBRE, TIPO
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}'
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantFinanzasDim2($codigo, $nombre, $tipo) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_FINANZAS_DIM2(
        CODIGO, NOMBRE, TIPO
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}'
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantFinanzasDim3($codigo, $nombre, $tipo) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_FINANZAS_DIM3(
        CODIGO, NOMBRE, TIPO
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}'
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantFinanzasEstructura($idDim1, $idDim2, $idDim3) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_FINANZAS_ESTRUCTURA(
        IDCOMPRAS_FINANZAS_DIM1, IDCOMPRAS_FINANZAS_DIM2, IDCOMPRAS_FINANZAS_DIM3
      )
      VALUES (
        {$idDim1}, {$idDim2}, {$idDim3}
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarMantFinanzasEstructura($idFinanzasEstructura) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "DELETE FROM COMPRAS_FINANZAS_ESTRUCTURA
      WHERE IDCOMPRAS_FINANZAS_ESTRUCTURA = {$idFinanzasEstructura}";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaComprasGestionDim1($clasif){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT IDCOMPRAS_GESTION_DIM1, CODIGO, NOMBRE, TIPO FROM COMPRAS_GESTION_DIM1 WHERE TIPO = '{$clasif}'";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaComprasGestionDim2($idComprasGestionDim1){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT
        IDCOMPRAS_GESTION_DIM2, CODIGO, NOMBRE, TIPO, IDCOMPRAS_GESTION_DIM1
      FROM COMPRAS_GESTION_DIM2
      WHERE IDCOMPRAS_GESTION_DIM1 = {$idComprasGestionDim1}";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaComprasGestionDim3($idComprasGestionDim2){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT
        IDCOMPRAS_GESTION_DIM3, CODIGO, NOMBRE, TIPO, IDCOMPRAS_GESTION_DIM2
      FROM COMPRAS_GESTION_DIM3
      WHERE IDCOMPRAS_GESTION_DIM2 = {$idComprasGestionDim2}";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function ingresarMantGestionDim1($codigo, $nombre, $tipo) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_GESTION_DIM1(
        CODIGO, NOMBRE, TIPO
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}'
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantGestionDim2($codigo, $nombre, $tipo, $idComprasGestionDim1) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_GESTION_DIM2(
        CODIGO, NOMBRE, TIPO, IDCOMPRAS_GESTION_DIM1
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}', {$idComprasGestionDim1}
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantGestionDim3($codigo, $nombre, $tipo, $idComprasGestionDim2) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_GESTION_DIM3(
        CODIGO, NOMBRE, TIPO, IDCOMPRAS_GESTION_DIM2
      )
      VALUES (
        '{$codigo}', '{$nombre}', '{$tipo}', {$idComprasGestionDim2}
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantMateriales(
  $idComprasGestionDim3, $idComprasFinanzasEstructura, $idSubcontrato,
  $codigo, $nombre, $marca, $modelo, $color, $tipo, $material_fab, $talla, $envase,
  $precio_min, $precio_max, $voltaje, $potencia, $calibre, $ancho, $alto, $largo, $observacion
) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_MATERIAL(
        IDCOMPRAS_GESTION_DIM3, IDCOMPRAS_FINANZAS_ESTRUCTURA, IDSUBCONTRATO,
        CODIGO, NOMBRE, MARCA, MODELO, COLOR, TIPO, MATERIAL_FAB, TALLA, ENVASE,
        PRECIO_MIN, PRECIO_MAX, VOLTAJE, POTENCIA, CALIBRE, ANCHO, ALTO, LARGO, OBSERVACION
      )
      VALUES (
        {$idComprasGestionDim3}, {$idComprasFinanzasEstructura}, {$idSubcontrato},
        '{$codigo}', '{$nombre}', '{$marca}', '{$modelo}', '{$color}', '{$tipo}',
        '{$material_fab}', '{$talla}', '{$envase}', {$precio_min}, {$precio_max}, {$voltaje},
        {$potencia}, {$calibre}, {$ancho}, {$alto}, {$largo}, '{$observacion}'
      )";
    // var_dump($sql);
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function editarMantMateriales(
  $idMaterial,
  $codigo, $nombre, $marca, $modelo, $color, $tipo, $material_fab, $talla, $envase,
  $precio_min, $precio_max, $voltaje, $potencia, $calibre, $ancho, $alto, $largo, $observacion
) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE COMPRAS_MATERIAL SET
        CODIGO = '{$codigo}',
        NOMBRE = '{$nombre}',
        MARCA = '{$marca}',
        MODELO = '{$modelo}',
        COLOR = '{$color}',
        TIPO = '{$tipo}',
        MATERIAL_FAB = '{$material_fab}',
        TALLA = '{$talla}',
        ENVASE = '{$envase}',
        PRECIO_MIN = {$precio_min},
        PRECIO_MAX = {$precio_max},
        VOLTAJE = {$voltaje},
        POTENCIA = {$potencia},
        CALIBRE = {$calibre},
        ANCHO = {$ancho},
        ALTO = {$alto},
        LARGO = {$largo},
        OBSERVACION = '{$observacion}'
      WHERE IDCOMPRAS_MATERIAL = $idMaterial
      ";
    // var_dump($sql);
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarMantMaterial($idComprasMaterial) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "DELETE FROM COMPRAS_MATERIAL
      WHERE IDCOMPRAS_MATERIAL = {$idComprasMaterial}";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarMantProveedores(
  $idSubcontrato, $idPais, $idAreaFuncional, $idMoneda,
  $rut, $nombre, $email, $direccion, $fono, $grupoCuentas, $condicionPago,
	$contrato, $fin_contrato, $acreditado
) {
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO COMPRAS_PROVEEDOR(
        IDSUBCONTRATO, IDPAIS, IDAREAFUNCIONAL, IDMONEDA_PAGO,
        RUT, NOMBRE, EMAIL, DIRECCION, FONO, GRUPO_CUENTAS, CONDICION_PAGO,
				CONTRATO, FECHA_FIN_CONTRATO, ACREDITACION
      )
      VALUES (
        $idSubcontrato, $idPais, $idAreaFuncional, $idMoneda,
        '{$rut}', '{$nombre}', '{$email}', '{$direccion}', '{$fono}', '{$grupoCuentas}', '{$condicionPago}',
				'{$contrato}','{$fin_contrato}','{$acreditado}'
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	} else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarMantProveedores($idProveedor) {
  $con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "DELETE FROM COMPRAS_PROVEEDOR
      WHERE IDCOMPRAS_PROVEEDOR = {$idProveedor}";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
  } else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function editarMantProveedores($pIDCOMPRAS_PROVEEDOR,	$pIDMONEDA_PAGO,	$pRUT,	$pNOMBRE,	$pDIRECCION,	$pCONTACTO,	$pEMAIL_CONTACTO,	$pFONO_CONTACTO,	$pCUENTA_SAP,	$pCONDICION_PAGO,	$pACREDITADO,	$pCONTRATO,	$pF_INICIO_CONTRATO,	$pF_FIN_CONTRATO,	$pBLOQUEO_SAP, $rutUser, $rutComprado, $fechaSolicitud, $critico, $plazo, $calidad, $periodo) {
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL EDITAR_PROVEEDOR_COMPRA('{$pIDCOMPRAS_PROVEEDOR}',	'{$pIDMONEDA_PAGO}',	'{$pRUT}',	'{$pNOMBRE}',	'{$pDIRECCION}',	'{$pCONTACTO}',	'{$pEMAIL_CONTACTO}',	'{$pFONO_CONTACTO}',	'{$pCUENTA_SAP}',	'{$pCONDICION_PAGO}',	'{$pACREDITADO}',	'{$pCONTRATO}',	'{$pF_INICIO_CONTRATO}',	'{$pF_FIN_CONTRATO}',	'{$pBLOQUEO_SAP}',	'{$rutUser}',	'{$rutComprado}',	'{$fechaSolicitud}', '{$critico}', '{$plazo}', '{$calidad}', '{$periodo}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaDatosProyectosOrdenesIng(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT EO.IDESTRUCTURA_OPERACION 'ID', CONCAT_WS(' - ', S.SERVICIO, C.CLIENTE, A.ACTIVIDAD) 'PROYECTO'
						FROM ORDEN_ZONA_OPERACION OZA
						LEFT JOIN ESTRUCTURA_OPERACION EO
						ON OZA.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON EO.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON EO.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON EO.IDACTIVIDAD = A.IDACTIVIDAD
						WHERE OZA.ACTIVO = 1
						GROUP BY EO.IDESTRUCTURA_OPERACION, CONCAT_WS(' - ', S.SERVICIO, C.CLIENTE, A.ACTIVIDAD)";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaDatosComunaOrdenesIng($idEstructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT A.IDAREAFUNCIONAL 'ID', A.COMUNA, A.REGION
						FROM ORDEN_ZONA_OPERACION OZA
						LEFT JOIN AREAFUNCIONAL A
						ON OZA.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
						WHERE OZA.IDESTRUCTURA_OPERACION = '{$idEstructura}'
						AND OZA.ACTIVO = 1
						GROUP BY  A.IDAREAFUNCIONAL, A.COMUNA, A.REGION";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaEmpresasInternasOrden(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDSUBCONTRATO 'ID', NOMBRE_SUBCONTRATO 'EMPRESA'
		FROM SUBCONTRATISTAS
		WHERE ESTADO = 'Activo'
		AND INTERNO = 1";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Agencias Obras
function consultaListadoAgencias(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, NOMBRE, IDOBRA_AGENCIA, IDAGENCIA
				FROM OBRA_AGENCIA";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Consulta Agencias Obras

// Consulta para ingresar Agencias Obras (mantenedor)
function ingresaAgenciasObras($nombreAgencia,$idAgencia){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_AGENCIA(NOMBRE, IDAGENCIA)
				VALUES('{$nombreAgencia}','{$idAgencia}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Agencias Obras (mantenedor)

// Consulta para Editar Agencias Obras (mantenedor)
function editarAgenciasObras($idAgenciasObras,$nombre,$idAgencia){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_AGENCIA
				SET NOMBRE = '{$nombre}',
				IDAGENCIA = '{$idAgencia}'
				WHERE IDOBRA_AGENCIA = '{$idAgenciasObras}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar Agencias Obras (mantenedor)

// Consulta para eliminar Agencias Obras (mantenedor)
function eliminarAgenciasObras($idAgenciasObras){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_AGENCIA
				WHERE IDOBRA_AGENCIA = '{$idAgenciasObras}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar Agencias Obras (mantenedor)

function consultaTipoOrdenesIng($idEstructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDORDEN_TIPO 'ID', TIPO
		FROM ORDEN_TIPO
		WHERE IDESTRUCTURA_OPERACION = '{$idEstructura}'";
    if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
      }

			return $return;
    }
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaCategoriaOrdenesIng($idEstructura, $idOrdenTipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDORDEN_CATEGORIA 'ID', CATEGORIA
						FROM ORDEN_CATEGORIA
						WHERE IDESTRUCTURA_OPERACION = '{$idEstructura}'
						AND IDORDEN_TIPO = '{$idOrdenTipo}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaProyectosObrasIngCaratula(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT EO.IDESTRUCTURA_OPERACION 'ID', CONCAT_WS(' - ', S.SERVICIO, C.CLIENTE, A.ACTIVIDAD) 'PROYECTO_INTERNO'
						FROM OBRA_ZONA_OPERACION OZA
						LEFT JOIN ESTRUCTURA_OPERACION EO
						ON OZA.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON EO.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON EO.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON EO.IDACTIVIDAD = A.IDACTIVIDAD
						GROUP BY EO.IDESTRUCTURA_OPERACION, CONCAT_WS(' - ', S.SERVICIO, C.CLIENTE, A.ACTIVIDAD)";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function eliminarDim3GestionCompras($idDim3){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM COMPRAS_GESTION_DIM3
						WHERE IDCOMPRAS_GESTION_DIM3 = '{$idDim3}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

// Consulta para ingresar Cubicacion(xml) a tabla Obras_cubicacion
function agregarCubicacion($idObra,$codigo,$nombre,$linea,$dirdesde,$altdesde,$dirhasta,$althasta,$plano,$codesp,$codact,$codclave,$tarea,$codmo,$coduo,$canmocub,$canmoinf,$canmoapr,$canuocub,$canuoinf,$canuoapr,$origen,$tipo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESAR_CUBICACION_OBRAS('{$idObra}','{$codigo}','{$nombre}', '{$linea}', '{$dirdesde}','{$altdesde}',
		'{$dirhasta}','{$althasta}','{$plano}','{$codesp}','{$codact}','{$codclave}','{$tarea}','{$codmo}','{$coduo}',
		'{$canmocub}', '{$canmoinf}', '{$canmoapr}','{$canuocub}', '{$canuoinf}','{$canuoapr}','{$origen}','{$tipo}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
				$return[] = $array;
			}
			return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function consultaServiciosBase(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT S.IDCOMPRAS_SERVICIO 'ID', CONCAT_WS(' - ', S.CODIGO, S.NOMBRE) 'SERVICIO'
						FROM COMPRAS_SERVICIO S";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaGestionAgregarDim($tipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT CG3.IDCOMPRAS_GESTION_DIM3 'ID', CONCAT_WS(' - ', CG1.NOMBRE,CG2.NOMBRE,CG3.NOMBRE) 'GESTION'
						FROM COMPRAS_GESTION_DIM3 CG3
						LEFT JOIN COMPRAS_GESTION_DIM2 CG2
						ON CG3.IDCOMPRAS_GESTION_DIM2 = CG2.IDCOMPRAS_GESTION_DIM2
						LEFT JOIN COMPRAS_GESTION_DIM1 CG1
						ON CG2.IDCOMPRAS_GESTION_DIM1 = CG1.IDCOMPRAS_GESTION_DIM1
						WHERE CG3.TIPO = '{$tipo}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaFinanzasAgregarDim($tipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT CFE.IDCOMPRAS_FINANZAS_ESTRUCTURA 'ID', CONCAT_WS(' - ', CFD1.NOMBRE,CFD2.NOMBRE,CFD3.NOMBRE) 'FINANZAS'
						FROM COMPRAS_FINANZAS_ESTRUCTURA CFE
						LEFT JOIN COMPRAS_FINANZAS_DIM3 CFD3
						ON CFE.IDCOMPRAS_FINANZAS_DIM3 = CFD3.IDCOMPRAS_FINANZAS_DIM3
						LEFT JOIN COMPRAS_FINANZAS_DIM2 CFD2
						ON CFE.IDCOMPRAS_FINANZAS_DIM2 = CFD2.IDCOMPRAS_FINANZAS_DIM2
						LEFT JOIN COMPRAS_FINANZAS_DIM1 CFD1
						ON CFE.IDCOMPRAS_FINANZAS_DIM1 = CFD1.IDCOMPRAS_FINANZAS_DIM1
						WHERE CFD3.TIPO = '{$tipo}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function consultaServBaseSeleccionado($id){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
						S.IDCOMPRAS_SERVICIO 'FOLIO',
						S.CODIGO,
						S.NOMBRE,
						S.MARCA,
						S.MODELO,
						S.TIPO,
						S.PRECIO_MIN,
						S.PRECIO_MAX,
						S.POTENCIA,
						S.PESO,
						S.CAPACIDAD,
						S.AREA_M2,
						S.ANCHO,
						S.ALTO,
						S.LARGO,
						S.TEMPERATURA,
						S.HUMEDAD,
						S.PRECISION,
						S.UNIDAD_MEDIDA,
						S.IDCOMPRAS_GESTION_DIM3 'ID_GESTION',
						S.IDCOMPRAS_FINANZAS_ESTRUCTURA 'ID_FINANZAS',
						S.IDSUBCONTRATO,
						S.OBSERVACION
						FROM COMPRAS_SERVICIO S
						WHERE S.IDCOMPRAS_SERVICIO = '{$id}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
      return "Error";
    }
  }
  else{
    return "Error";
  }
}

function ingresaComprasServicioNuevo($codigoAgregarMantServicios,$nombreAgregarMantServicios,$marcaAgregarMantServicios,$modeloAgregarMantServicios,$tipoAgregarMantServicios,$precioMinAgregarMantServicios,$precioMaxAgregarMantServicios,$potenciaAgregarMantServicios,$pesoAgregarMantServicios,$capacidadAgregarMantServicios,$areaAgregarMantServicios,$anchoAgregarMantServicios,$altoAgregarMantServicios,$largoAgregarMantServicios,$temperaturaAgregarMantServicios,$humedadAgregarMantServicios,$presicionAgregarMantServicios,$unidadMedidaAgregarMantServicios,$gestionAgregarMantServicios,$finanzasAgregarMantServicios,$ingresaComprasServicioNuevo,$observacionAgregarMantServicios){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO COMPRAS_SERVICIO(
							CODIGO,
							NOMBRE,
							MARCA,
							MODELO,
							TIPO,
							PRECIO_MIN,
							PRECIO_MAX,
							POTENCIA,
							PESO,
							CAPACIDAD,
							AREA_M2,
							ANCHO,
							ALTO,
							LARGO,
							TEMPERATURA,
							HUMEDAD,
							`PRECISION`,
							UNIDAD_MEDIDA,
							IDCOMPRAS_GESTION_DIM3,
							IDCOMPRAS_FINANZAS_ESTRUCTURA,
							IDSUBCONTRATO,
							OBSERVACION)
							VALUES(
								'{$codigoAgregarMantServicios}',
								'{$nombreAgregarMantServicios}',
								'{$marcaAgregarMantServicios}',
								'{$modeloAgregarMantServicios}',
								'{$tipoAgregarMantServicios}',
								'{$precioMinAgregarMantServicios}',
								'{$precioMaxAgregarMantServicios}',
								'{$potenciaAgregarMantServicios}',
								'{$pesoAgregarMantServicios}',
								'{$capacidadAgregarMantServicios}',
								'{$areaAgregarMantServicios}',
								'{$anchoAgregarMantServicios}',
								'{$altoAgregarMantServicios}',
								'{$largoAgregarMantServicios}',
								'{$temperaturaAgregarMantServicios}',
								'{$humedadAgregarMantServicios}',
								'{$presicionAgregarMantServicios}',
								'{$unidadMedidaAgregarMantServicios}',
								'{$gestionAgregarMantServicios}',
								'{$finanzasAgregarMantServicios}',
								'{$ingresaComprasServicioNuevo}',
								'{$observacionAgregarMantServicios}'
							)";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $sql;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function eliminarComprasServicio($id){
	$con = conectar();
	if($con != 'No conectado'){
			$sql = "DELETE FROM COMPRAS_SERVICIO
							WHERE IDCOMPRAS_SERVICIO = '{$id}'";
			if($con->query($sql)){
					$con->query("COMMIT");
					return "Ok";
			}else{
					$con->query("ROLLBACK");
					// return $con->error;
					return "Error";
			}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function editaComprasServicioNuevo($id,$codigoEditarMantServicios,$nombreEditarMantServicios,$marcaEditarMantServicios,$modeloEditarMantServicios,$tipoEditarMantServicios,
$precioMinEditarMantServicios,$precioMaxEditarMantServicios,$potenciaEditarMantServicios,$pesoEditarMantServicios,$capacidadEditarMantServicios,$areaEditarMantServicios,
$anchoEditarMantServicios,$altoEditarMantServicios,$largoEditarMantServicios,$temperaturaEditarMantServicios,$humedadEditarMantServicios,$presicionEditarMantServicios,
$unidadMedidaEditarMantServicios,$gestionEditarMantServicios,$finanzasEditarMantServicios,$observacionEditarMantServicios){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE COMPRAS_SERVICIO
		SET CODIGO = '{$codigoEditarMantServicios}',
		NOMBRE = '{$nombreEditarMantServicios}',
		MARCA = '{$marcaEditarMantServicios}',
		MODELO = '{$modeloEditarMantServicios}',
		TIPO = '{$tipoEditarMantServicios}',
		PRECIO_MIN = '{$precioMinEditarMantServicios}',
		PRECIO_MAX = '{$precioMaxEditarMantServicios}',
		POTENCIA = '{$potenciaEditarMantServicios}',
		PESO = '{$pesoEditarMantServicios}',
		CAPACIDAD = '{$capacidadEditarMantServicios}',
		AREA_M2 = '{$areaEditarMantServicios}',
		ANCHO = '{$anchoEditarMantServicios}',
		ALTO = '{$altoEditarMantServicios}',
		LARGO = '{$largoEditarMantServicios}',
		TEMPERATURA = '{$temperaturaEditarMantServicios}',
		HUMEDAD = '{$humedadEditarMantServicios}',
		`PRECISION` = '{$presicionEditarMantServicios}',
		UNIDAD_MEDIDA = '{$unidadMedidaEditarMantServicios}',
		IDCOMPRAS_GESTION_DIM3 = '{$gestionEditarMantServicios}',
		IDCOMPRAS_FINANZAS_ESTRUCTURA = '{$finanzasEditarMantServicios}',
		OBSERVACION = '{$observacionEditarMantServicios}'
						WHERE IDCOMPRAS_SERVICIO = '{$id}'";
		if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
		}
		else{
			// return $sql;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresarOrdenATC($folioIngOrden,$proyectoIngOrden,$fechaHoraIngOrden,$tramoIngOrden,$rutIngOrden,$clienteIngOrden,$fonoIngOrden,$direccionIngOrden,$comunaRegionIngOrden,$empresaIngOrden,$tipoIngOrden,$categoriaIngOrden,$tecnologiaIngOrden,$rutUser,$historia){
		$fecha = substr($fechaHoraIngOrden,0,10);
		$hora = substr($fechaHoraIngOrden,11,5);
		$dni = str_replace(".","",$rutIngOrden);
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "CALL INGRESAR_ORDEN_ATC('{$proyectoIngOrden}','{$comunaRegionIngOrden}','{$categoriaIngOrden}','{$tipoIngOrden}','{$tramoIngOrden}','{$empresaIngOrden}','{$folioIngOrden}','{$fecha}','{$hora}','{$dni}','{$clienteIngOrden}','{$fonoIngOrden}','{$direccionIngOrden}','{$tecnologiaIngOrden}','{$rutUser}','{$historia}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $sql;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function consultaPais($idarea){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        IDPAIS,
        ABREVIATURA,
        initCap(NOMBRE) 'NOMBRE'
      FROM PAIS
			WHERE IDPAIS =
			(
				SELECT IDPAIS
				FROM AREAFUNCIONAL
				WHERE IDAREAFUNCIONAL = '{$idarea}'
			)";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaMonedaPago(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        IDMONEDA_PAGO,
        ABREVIATURA,
        MONEDA
      FROM MONEDA_PAGO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaCondicionPago(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
						IDCOMPRAS_PROVEEDOR_CPAGO, NOMBRE 'CONDICION', DESCRIPCION
						FROM COMPRAS_PROVEEDOR_CPAGO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaCondicionSAP(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
						IDCOMPRAS_PROVEEDOR_SAP, NOMBRE 'SAP'
						FROM COMPRAS_PROVEEDOR_SAP";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function consultaCondicionNexcel(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
						IDCOMPRAS_PROVEEDOR_NEXCEL, NOMBRE 'NEXCEL'
						FROM COMPRAS_PROVEEDOR_NEXCEL";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else {
      return "Error";
    }
  } else {
    return "Error";
  }
}

function cantidadSiniestroPersonal($rutPer){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT COUNT(ps.IDPERSONAL) 'CANT_SINIESTROS'
				FROM PATENTE_SINIESTROS ps
				WHERE ps.IDPERSONAL = (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '{$rutPer}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosPersonalObraAsignados($idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S,
						GROUP_CONCAT(Z.IDOBRA_PERSONAL_ASIG SEPARATOR '/') 'IDOBRA_PERSONAL_ASIG',  Z.IDUSUARIO, U.RUT, U.NOMBRE, Z.TIPO,
						CONCAT('<span class=''fas fa-user-times'' onclick='' ','quitarPersonalObraAsig(',CONCAT('\"',GROUP_CONCAT(Z.IDOBRA_PERSONAL_ASIG SEPARATOR 'N'),'\"'),');''></span>') 'BORRAR'
						FROM OBRA_PERSONAL_ASIG Z
						LEFT JOIN USUARIO U
						ON Z.IDUSUARIO = U.IDUSUARIO
						WHERE Z.IDOBRA in
						(
							{$idez}
						)
						GROUP BY Z.IDUSUARIO, U.RUT, U.NOMBRE, Z.TIPO";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function eliminarPersonalObraAsig($id){
	$con = conectar();
	if($con != 'No conectado'){
			$sql = "DELETE FROM OBRA_PERSONAL_ASIG WHERE IDOBRA_PERSONAL_ASIG IN ({$id})";
			if($con->query($sql)){
					$con->query("COMMIT");
					return "Ok";
			}else{
					$con->query("ROLLBACK");
					// return $con->error;
					return "Error";
			}
	}else{
			$con->query("ROLLBACK");
			return "Error";
	}
}


function datosPersonalObrasAsignar($tipo, $idarea, $idEstructura, $idez){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT U.RUT, U.NOMBRE, U.IDUSUARIO
						FROM OBRA_ZONA_PERSONAL OZA
						LEFT JOIN OBRA_ZONA_OPERACION OZO
						ON OZA.IDOBRA_ZONA_OPERACION = OZO.IDOBRA_ZONA_OPERACION
						LEFT JOIN USUARIO U
						ON OZA.IDUSUARIO = U.IDUSUARIO
						WHERE OZA.TIPO = '{$tipo}'
						AND OZO.IDAREAFUNCIONAL = '{$idarea}'
						AND OZO.IDESTRUCTURA_OPERACION = '{$idEstructura}'
						AND U.ESTADO = 'Activo'
						AND U.IDUSUARIO NOT IN
						(
							SELECT IDUSUARIO
							FROM OBRA_PERSONAL_ASIG
							WHERE IDOBRA in (
								{$idez}
							)
						)
						GROUP BY U.RUT, U.NOMBRE, U.IDUSUARIO";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresarPersonalAsigObra($idusuario, $idoz, $tipo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if ($con != 'No conectado') {
			$sql = "CALL INGRESAR_PERSONAL_ASIG_OBRA('{$idusuario}','{$idoz}','{$tipo}')";
			if($con->query($sql)){
					$con->query("COMMIT");
					return "Ok";
			}else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
			}
	}else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function consultaComprasGestionDim3All(){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT
        IDCOMPRAS_GESTION_DIM3, CODIGO, NOMBRE, TIPO, IDCOMPRAS_GESTION_DIM2
      FROM COMPRAS_GESTION_DIM3";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function consultaListadoRespProyectos(){
  $con = conectar();
  if($con != 'No conectado'){
    $sql = "SELECT '' S, R.IDCOMPRAS_ESTRUCTURA_RESPONSABLE 'FOLIO', R.IDESTRUCTURA_OPERACION 'IDPROYECTO', CONCAT_WS(' - ',S.SERVICIO,C.CLIENTE,A.ACTIVIDAD) 'PROYECTO', E.NOMENCLATURA,
						R.DNI, initCap(R.NOMBRE) 'NOMBRE', LOWER(R.EMAIL) 'EMAIL', R.FONO
						FROM COMPRAS_ESTRUCTURA_RESPONSABLE R
						LEFT JOIN ESTRUCTURA_OPERACION E
						ON R.IDESTRUCTURA_OPERACION = E.IDESTRUCTURA_OPERACION
						LEFT JOIN SERVICIO S
						ON E.IDSERVICIO = S.IDSERVICIO
						LEFT JOIN CLIENTE C
						ON E.IDCLIENTE = C.IDCLIENTE
						LEFT JOIN ACTIVIDAD A
						ON E.IDACTIVIDAD = A.IDACTIVIDAD";
    if ($row = $con->query($sql)) {
      $return = array();
      while($array = $row->fetch_array(MYSQLI_BOTH)){
        $return[] = $array;
      }
      return $return;
    } else{
      return "Error";
    }
  } else{
    return "Error";
  }
}

function ingresarResponsableProyecto($proyectoAgregarResponsableProyecto, $dniAgregarResponsableProyecto, $nombreAgregarResponsableProyecto, $emailAgregarResponsableProyecto,$fonoAgregarResponsableProyecto){
	$con = conectar();
	if ($con != 'No conectado') {
			$sql = "INSERT INTO COMPRAS_ESTRUCTURA_RESPONSABLE
							(
								IDESTRUCTURA_OPERACION,
								DNI,
								NOMBRE,
								EMAIL,
								FONO
							)
							VALUES
							(
								'{$proyectoAgregarResponsableProyecto}',
								'{$dniAgregarResponsableProyecto}',
								'{$nombreAgregarResponsableProyecto}',
								'{$emailAgregarResponsableProyecto}',
								'{$fonoAgregarResponsableProyecto}'
							)";
			if($con->query($sql)){
					return "Ok";
			}else{
					// return $con->error;
					return "Error";
			}
	}else{
			return "Error";
	}
}

function consultaEstructuraOperacionResposable(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
				'' S,
				eo.IDESTRUCTURA_OPERACION,
				c.IDCLIENTE,
				c.CLIENTE,
				s.IDSERVICIO,
				s.SERVICIO,
				a.IDACTIVIDAD,
				a.ACTIVIDAD,
				eo.NOMENCLATURA
			FROM ESTRUCTURA_OPERACION eo
			INNER JOIN CLIENTE c on eo.IDCLIENTE = c.IDCLIENTE
			INNER JOIN SERVICIO s on eo.IDSERVICIO = s.IDSERVICIO
			INNER JOIN ACTIVIDAD a on eo.IDACTIVIDAD = a.IDACTIVIDAD
			WHERE eo.IDESTRUCTURA_OPERACION NOT IN
			(
				SELECT IDESTRUCTURA_OPERACION
				FROM COMPRAS_ESTRUCTURA_RESPONSABLE
			)";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function editarResponsableProyecto($idresponsable, $proyectoEditarResponsableProyecto, $dniEditarResponsableProyecto, $nombreEditarResponsableProyecto, $emailEditarResponsableProyecto,$fonoEditarResponsableProyecto){
	$con = conectar();
	if ($con != 'No conectado') {
			$sql = "UPDATE COMPRAS_ESTRUCTURA_RESPONSABLE
							SET IDESTRUCTURA_OPERACION = '{$proyectoEditarResponsableProyecto}',
							DNI = '{$dniEditarResponsableProyecto}',
							NOMBRE = '{$nombreEditarResponsableProyecto}',
							EMAIL = '{$emailEditarResponsableProyecto}',
							FONO = '{$fonoEditarResponsableProyecto}'
							WHERE IDCOMPRAS_ESTRUCTURA_RESPONSABLE = '{$idresponsable}'";
			if($con->query($sql)){
					return "Ok";
			}else{
					// return $con->error;
					return "Error";
			}
	}else{
			return "Error";
	}
}

function eliminarResponsableProyecto($id){
		$con = conectar();
		if($con != 'No conectado'){
				$sql = "DELETE FROM COMPRAS_ESTRUCTURA_RESPONSABLE WHERE IDCOMPRAS_ESTRUCTURA_RESPONSABLE = $id";
				if($con->query($sql)){
						$con->query("COMMIT");
						return "Ok";
				}else{
						$con->query("ROLLBACK");
						// return $con->error;
						return "Error";
				}
		}else{
				$con->query("ROLLBACK");
				return "Error";
		}
}

//Select datos Check Tipo Vehiculo
function datosCheckTipoVehiculo(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDPATENTE_TIPOVEHICULO_CHECK 'IDCHECKTIPO', NOMBRE
				FROM PATENTE_TIPOVEHICULO_CHECK";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Lista de checks de acuerdo al tipo de vehiculo
function datosListaChecksTipoVehiculo($checkTipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPATENTE_ASIGNACION_CHECKS 'FOLIO', ITEM, TIPO, INDISPENSABLE, DESCONTABLE
		FROM PATENTE_ASIGNACION_CHECKS
		WHERE TIPO = '{$checkTipo}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listadoComprasPeticiones(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        ' ' as S,
        CP.IDCOMPRAS_PETICION,
        CP.IDESTRUCTURA_OPERACION,
        CONCAT(CL.CLIENTE, SR.SERVICIO, AC.ACTIVIDAD) as PROYECTO,
        US.IDUSUARIO,
        US.RUT as US_URT,
        US.NOMBRE as US_NOMBRE,
        US.EMAIL as US_EMAIL,
        CER.IDCOMPRAS_ESTRUCTURA_RESPONSABLE,
        CER.DNI as CER_DNI,
        CER.NOMBRE as CER_NOMBRE,
        CER.EMAIL as CER_EMAIL,
        CER.FONO as CER_FONO,
        AF.IDAREAFUNCIONAL,
        AF.COMUNA as AF_COMUNA,
        CP.PEP,
        CP.SERVICIO_SOLICITANTE,
        CP.AREA_SOLICITANTE,
        CP.FECHA_PEDIDO,
        CP.HORA_PEDIDO,
        CP.PROVEEDORES_SUGERIDOS,
        CP.PROVEEDORES_DESCARTADOS,
        CP.LUGAR_ENTREGA,
        CP.FECHA_LIMITE,
        CP.BODEGA,
        CP.CODIGO_ALMACEN,
        CP.REFACTURABLE,
        CP.REGULARIZACION,
        CP.MOTIVO,
        CP.TIPO,
        CP.ESTADO,
        CP.URL
      FROM COMPRAS_PETICION CP
      LEFT JOIN ESTRUCTURA_OPERACION EP ON EP.IDESTRUCTURA_OPERACION = CP.IDESTRUCTURA_OPERACION
      LEFT JOIN COMPRAS_ESTRUCTURA_RESPONSABLE CER ON CER.IDESTRUCTURA_OPERACION = EP.IDESTRUCTURA_OPERACION
      LEFT JOIN CLIENTE CL ON CL.IDCLIENTE = EP.IDCLIENTE
      LEFT JOIN SERVICIO SR ON SR.IDSERVICIO = EP.IDSERVICIO
      LEFT JOIN ACTIVIDAD AC ON AC.IDACTIVIDAD = EP.IDACTIVIDAD
      LEFT JOIN USUARIO US ON US.IDUSUARIO = CP.IDSOLICITANTE
      LEFT JOIN AREAFUNCIONAL AF ON AF.IDAREAFUNCIONAL = CP.IDAREAFUNCIONAL;";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

// Consulta para ingresar Check Tipo Vehiculo
function ingresaCheckTipoVehiculo($item,$tipo,$indispensable,$descontable){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_ASIGNACION_CHECKS (ITEM, TIPO, INDISPENSABLE, DESCONTABLE)
				VALUES('{$item}', '{$tipo}', '{$indispensable}', '{$descontable}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para Editar Check Tipo Vehiculo
function editarCheckTipoVehiculo($folio,$item,$tipo,$indispensable,$descontable){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE PATENTE_ASIGNACION_CHECKS
				SET ITEM='{$item}', TIPO='{$tipo}', INDISPENSABLE='{$indispensable}', DESCONTABLE='{$descontable}'
				WHERE IDPATENTE_ASIGNACION_CHECKS = '{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para eliminar Check Tipo Vehiculo
function eliminarCheckTipoVehiculo($folio){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM PATENTE_ASIGNACION_CHECKS
				WHERE IDPATENTE_ASIGNACION_CHECKS = '{$folio}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

// Consulta para ingresar Nombre Check Tipo Vehiculo
function ingresaNombreCheckTipoVehiculo($nombre){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO PATENTE_TIPOVEHICULO_CHECK (NOMBRE)
				VALUES('{$nombre}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consultas Datos para Desasignacion
function consultaIdAsigForDesasignacion($patente, $rutPersonal){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT MAX(PA.IDPATENTE_ASIGNACIONES) 'ID'
		FROM PATENTE_ASIGNACIONES PA
		LEFT JOIN PATENTE_ESTADO_ASIGNACION PE
		ON PA.IDPATENTE_ESTADO_ASIGNACION = PE.IDPATENTE_ESTADO_ASIGNACION
		WHERE PA.IDPATENTE = (SELECT IDPATENTE FROM PATENTE WHERE CODIGO = '{$patente}')
		AND PA.IDPERSONAL = (SELECT IDPERSONAL FROM PERSONAL WHERE DNI = '{$rutPersonal}')
		AND PE.ESTADO NOT IN
		(
			'Anulada'
		)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Lista de checks de acuerdo al tipo de vehiculo
function datosDocumPermisoObras($idz){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, od.NOMBRE, od.ARCHIVO, od.TIPO_ARCHIVO 'TIPO_ARCHIVO', od.IDOBRA_DOCUMENTOS_PERMISO 'FOLIO',
						CONCAT('<span style=''color: red;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''documentoObras(\"',od.ARCHIVO,'\")''></span>') 'DOCUMENTO',
						CASE WHEN od.VALIDADO IS NULL OR od.VALIDADO = '' THEN '--' ELSE
						CASE WHEN od.VALIDADO = 1 THEN CONCAT('<span style=''color: red;'' class=''fas fa-times ''></span>') ELSE
						CONCAT('<span style=''color: green;'' class=''fas fa-check ''></span>')END END 'VAL', o.TIPO, od.IDOBRA_DOCUMENTOS_PERMISO 'FOLIO',
						CONCAT('<b class=\"fas fa-comment-alt\" style=\"color: #black; font-size: 10pt;\" title=\"',od.OBSERVACION,'\" ></b>') 'OBSERVACION'
						FROM OBRA_DOCUMENTOS_PERMISO od
						LEFT JOIN OBRA o
						ON od.IDOBRA = o.IDOBRA
						WHERE od.IDOBRA = '{$idz}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para ingresar Documentos de permisos a Obras
function ingresaDocumPermisoObras($folio,$nombre,$archivo,$tipoFile,$observacion){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_DOCUMENTOS_PERMISO	(IDOBRA, NOMBRE, ARCHIVO, FECHA_INGRESO, TIPO_ARCHIVO,OBSERVACION)
				VALUES('{$folio}', '{$nombre}', '{$archivo}', NOW(), '{$tipoFile}', '{$observacion}');
		";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// datos de cubcacion de obra
function datosDetalleCubObra($idobra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION, C.IDOBRA, C.CODIGO, C.CODMO, C.CANMOCUB, M.PB 'PB_MO', V.VALOR 'VALOR_MO',
						ROUND(C.CANMOCUB * M.PB * V.VALOR) 'TOTAL_MO',
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(M.DESCRIPCION) IS NULL THEN '--' ELSE initCap(M.DESCRIPCION) END 'MANO_OBRA',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD', O.TIPO, C.DIRDESDE 'DIRECCION', '' EXPANDIR,
						CONCAT_WS(' / ', CONCAT('Folio Ant.: ', OSM.IDSOLICITUD_MATERIAL), CONCAT('Est.: ', OSME.ESTADO_ASOCIADO) ) 'ESTADO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_SOL_MAT OSM
						ON C.IDOBRA_CUBICACION = OSM.IDOBRA_CUBICACION
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN MATERIALES_SOLICITUD MS
						ON OSM.IDSOLICITUD_MATERIAL = MS.IDSOLICITUD_MATERIAL
						WHERE C.IDOBRA = '{$idobra}'
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['child'] = datosDetalleCubObraFila($idobra,$array['IDOBRA_CUBICACION']);
				$array['expanded'] = false;
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta datos unidad de medidad Obras
function datosListadoUmObras(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT IDOBRA_UM 'FOLIO', UM
				FROM OBRA_UM";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos unidad de medidad Obras

// Consulta datos mantenedor especialidad
function datosListadoMantenedorEspecialidad(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDOBRA_ESPECIALIDAD 'FOLIO', ESPECIALIDAD, CODESP
				FROM OBRA_ESPECIALIDAD";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos mantenedor especialidad

// Consulta datos mantenedor unidad de obra
function datosListadoMantenedorUnidadObra(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, uo.IDOBRA_UO 'FOLIO', uo.CODUO, uo.CODIGO2_CLIENTE , uo.NOMBRE, ou.UM, uo.VALOR, uo.PROVEE,
						CASE WHEN uo.CODIGO3_CLIENTE = 'NULL' OR uo.CODIGO3_CLIENTE IS NULL THEN '' ELSE uo.CODIGO3_CLIENTE END 'COD_FIN_CLIENTE',
						uo.CODIGO1_INTERNO, uo.CODIGO2_INTERNO, uo.CODIGO3_INTERNO
						FROM OBRA_UO uo
						LEFT JOIN OBRA_UM ou
						ON uo.IDOBRA_UM = ou.IDOBRA_UM";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos mantenedor unidad de obra

// Consulta datos mantenedor mano de obra
function datosListadoMantenedorManoObra(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, om.IDOBRA_MO 'FOLIO', om.CODMO, om.DESCRIPCION, om.CANTIDAD, om.PB, oe.ESPECIALIDAD, ou.UM
				FROM OBRA_MO om
				LEFT JOIN OBRA_ESPECIALIDAD oe
				ON om.IDOBRA_ESPECIALIDAD = oe.IDOBRA_ESPECIALIDAD
				LEFT JOIN OBRA_UM ou
				ON om.IDOBRA_UM = ou.IDOBRA_UM";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos mantenedor mano de obra

// Consulta datos mantenedor valor mano de obra
function datosListadoMantenedorValorManoObra(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, omv.IDOBRA_MO_VALOR 'FOLIO', initCap(a.COMUNA) 'COMUNA', initCap(oa.NOMBRE) 'AGENCIA', initCap(oe.ESPECIALIDAD) 'ESPECIALIDAD', omv.VALOR
		FROM OBRA_MO_VALOR omv
		LEFT JOIN AREAFUNCIONAL a
		ON omv.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
		LEFT JOIN OBRA_AGENCIA oa
		ON omv.IDOBRA_AGENCIA = oa.IDOBRA_AGENCIA
		LEFT JOIN OBRA_ESPECIALIDAD oe
		ON omv.IDOBRA_ESPECIALIDAD = oe.IDOBRA_ESPECIALIDAD";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos mantenedor valor mano de obra

// Consulta para ingresar Especialidad Obras (mantenedor)
function ingresaMantenedorEspecialidad($especialidad,$codEspecialidad){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_ESPECIALIDAD (ESPECIALIDAD, CODESP)
				VALUES('{$especialidad}', '{$codEspecialidad}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Especialidad Obras (mantenedor)

// Consulta para Editar Especialidad Obras (mantenedor)
function editarMantenedorEspecialidad($idEspecialidad,$nombre,$codigo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_ESPECIALIDAD
				SET ESPECIALIDAD='{$nombre}', CODESP='{$codigo}'
				WHERE IDOBRA_ESPECIALIDAD = '{$idEspecialidad}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar Especialidad Obras (mantenedor)

// Consulta para eliminar Especialidad Obras (mantenedor)
function eliminarMantenedorEspecialidad($idEspecialidad){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_ESPECIALIDAD
				WHERE IDOBRA_ESPECIALIDAD = '{$idEspecialidad}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar Especialidad Obras (mantenedor)

// Consulta para ingresar Unidad de Obra (mantenedor)
function ingresaMantenedorUnidadObra($nombre,$codigoUo,$codigoMat,$valor,$proveedor,$codCliente,$um,$cod1,$cod2,$cod3){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_UO	(NOMBRE, CODUO, CODIGO2_CLIENTE, VALOR, PROVEE, CODIGO3_CLIENTE, IDOBRA_UM, CODIGO1_INTERNO, CODIGO2_INTERNO, CODIGO3_INTERNO)
		VALUES('{$nombre}', '{$codigoUo}', '{$codigoMat}', '{$valor}', '{$proveedor}', '{$codCliente}', '{$um}','{$cod1}','{$cod2}', '{$cod3}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar Unidad de Obra (mantenedor)

// Consulta para Editar Unidad de Obra (mantenedor)
function editarMantenedorUnidadObra($folioUO,$nombre,$codUO,$codMat,$valor,$proveedor,$codCliente,$um,$cod1,$cod2,$cod3){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_UO
				SET CODUO='{$codUO}', CODIGO2_CLIENTE='{$codMat}', NOMBRE='{$nombre}', IDOBRA_UM='{$um}', VALOR='{$valor}', PROVEE='{$proveedor}', CODIGO3_CLIENTE='{$codCliente}',
				CODIGO1_INTERNO='{$cod1}', CODIGO2_INTERNO='{$cod2}', CODIGO3_INTERNO='{$cod3}'
				WHERE IDOBRA_UO = '{$folioUO}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar Unidad de Obra (mantenedor)

// Consulta para eliminar Unidad de Obra (mantenedor)
function eliminarMantenedorUnidadObra($idUnidadObra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_UO
				WHERE IDOBRA_UO = '{$idUnidadObra}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar Unidad de Obra (mantenedor)

// Consulta para ingresar mano de Obra (mantenedor)
function ingresaMantenedorManoObra($nombre,$codigo,$especialidad,$um,$cantidad,$pb){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_MO (IDOBRA_ESPECIALIDAD, CODMO, DESCRIPCION, IDOBRA_UM, CANTIDAD, PB)
		VALUES('{$especialidad}','{$codigo}','{$nombre}','{$um}','{$cantidad}','{$pb}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar mano de Obra (mantenedor)

// Consulta para Editar mano de Obra (mantenedor)
function editarMantenedorManoObra($folioMO,$nombre,$codigo,$especialidad,$um,$cantidad,$pb){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_MO
				SET IDOBRA_ESPECIALIDAD='{$especialidad}', CODMO='{$codigo}', DESCRIPCION='{$nombre}', IDOBRA_UM={$um}, CANTIDAD={$cantidad}, PB={$pb}
				WHERE IDOBRA_MO = '{$folioMO}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar mano de Obra (mantenedor)

// Consulta para eliminar mano de Obra (mantenedor)
function eliminarMantenedorManoObra($idManoObra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_MO
				WHERE IDOBRA_MO = '{$idManoObra}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar mano de Obra (mantenedor)

// Consulta para ingresar valor mano de Obra (mantenedor)
function ingresaMantenedorValorManoObra($comuna,$agencia,$especialidad,$valor){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_MO_VALOR (IDAREAFUNCIONAL, IDOBRA_AGENCIA, IDOBRA_ESPECIALIDAD, VALOR)
				VALUES('{$comuna}','{$agencia}','{$especialidad}','{$valor}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar valor mano de Obra (mantenedor)

// Consulta para Editar valor mano de Obra (mantenedor)
function editarMantenedorValorManoObra($folioValorMO,$comuna,$agencia,$especialidad,$valor){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_MO_VALOR
				SET IDAREAFUNCIONAL='{$comuna}', IDOBRA_AGENCIA='{$agencia}', IDOBRA_ESPECIALIDAD='{$especialidad}', VALOR='{$valor}'
				WHERE IDOBRA_MO_VALOR='{$folioValorMO}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para editar valor mano de Obra (mantenedor)

// Consulta para eliminar valor mano de Obra (mantenedor)
function eliminarMantenedorValorManoObra($folioValorMO){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_MO_VALOR
				WHERE IDOBRA_MO_VALOR = '{$folioValorMO}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}
// Fin Consulta para eliminar valor mano de Obra (mantenedor)

function ingresarFormularioPersonal($idFormulario, $idPersonal){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO
      FORMULARIO_PERSONAL(
        IDFORMULARIO, IDPERSONAL
      )
			VALUES(
        {$idFormulario}, {$idPersonal}
      )";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para ingresar OT Obras solo si no es Ing
function generarOT($idObra,$tipo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_OT	(IDOBRA, FECHA_CREACION, HORA_CREACION, ESTADO)
				VALUES((SELECT IDOBRA FROM OBRA WHERE NOMBREOE = '{$idObra}' AND TIPO LIKE CONCAT('%','{$tipo}','%')),DATE_FORMAT(NOW(), '%Y-%m-%d'),DATE_FORMAT(NOW(), '%H:%i'),'Pte. Asignar Brigada')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta para ingresar OT Obras solo si no es Ing

function datosTipoObra($idObra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT o.TIPO
		FROM OBRA o
		WHERE o.IDOBRA = (SELECT IDOBRA FROM OBRA WHERE NOMBREOE = '{$idObra}')";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta Listado Ordenes de trabajo
function datosListadoOrdenesTrabajo(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, oo.IDOBRA_OT 'FOLIO', oo.ESTADO, o.TIPO, o.PEP2 'PRESUPUESTO', oc.NOMBRE 'CONTRATO',
				oa.NOMBRE 'AGENCIA', initCap(o.GESTOR) 'GESTOR', initCap(u.NOMBRE) 'SUPERVISOR', oo.FECHA_CREACION, oo.HORA_CREACION,
				o.FINOE 'FECHA_TERMINO', oo.FECHA_ASIGNACION, initCap(u2.NOMBRE) 'GESTOR_SUBCC', s.NOMBRE_SUBCONTRATO 'EMPRESA_SUBCC',
				(
					SELECT DISTINCT CASE WHEN CODIGO IS NULL THEN '' ELSE CODIGO END
					FROM OBRA_CUBICACION
					WHERE IDOBRA = o.IDOBRA
				) 'CUBICACION', o.IDESTRUCTURA_OPERACION 'ESTRUCTURA_OPERACION', o.IDAREAFUNCIONAL 'COMUNA',
				o.IDOBRA, o.NOMBREOE, oo.FECHA_INI_TERRENO, oo.FECHA_FIN_TERRENO
				FROM OBRA_OT oo
				LEFT JOIN OBRA o
				ON oo.IDOBRA = o.IDOBRA
				LEFT JOIN OBRA_CONTRATO oc
				ON o.IDOBRA_CONTRATO = oc.IDOBRA_CONTRATO
				LEFT JOIN OBRA_AGENCIA oa
				ON o.IDOBRA_AGENCIA = oa.IDOBRA_AGENCIA
				LEFT JOIN OBRA_PERSONAL_ASIG opa2
				ON o.IDOBRA = opa2.IDOBRA
				AND opa2.TIPO = 'Supervisor'
				LEFT JOIN USUARIO u
				ON opa2.IDUSUARIO = u.IDUSUARIO
				LEFT JOIN USUARIO u2
				ON oo.IDGESTOR_EECC = u2.IDUSUARIO
				LEFT JOIN SUBCONTRATISTAS s
				ON oo.IDEMPRESA_EECC = s.IDSUBCONTRATO";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta Listado Ordenes de trabajo

function datosPersAsigCargaCaratula($nombreOe){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT u.IDUSUARIO, u.NOMBRE, ozp.TIPO
				FROM OBRA o
				LEFT JOIN OBRA_ZONA_OPERACION ozo
				ON o.IDESTRUCTURA_OPERACION = ozo.IDESTRUCTURA_OPERACION
				AND o.IDAREAFUNCIONAL = ozo.IDAREAFUNCIONAL
				LEFT JOIN OBRA_ZONA_PERSONAL ozp
				ON ozo.IDOBRA_ZONA_OPERACION = ozp.IDOBRA_ZONA_OPERACION
				LEFT JOIN USUARIO u
				ON ozp.IDUSUARIO = u.IDUSUARIO
				WHERE o.NOMBREOE = '{$nombreOe}'
				AND ozp.TIPO IN ('Jefe proyecto', 'Supervisor' , 'Proyectista')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function asignarPersIngresandoCaratula($nombreOe,$idusuario,$tipo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_PERSONAL_ASIG(IDUSUARIO,IDOBRA,TIPO)
						VALUES
						(
							'{$idusuario}',
							(SELECT IDOBRA
							FROM OBRA
							WHERE NOMBREOE = '{$nombreOe}'),
							'{$tipo}'
						)";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			 return $con->error;
			$con->query("ROLLBACK");
			// return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta datos
function datosListadoBrigadaOt($estructura,$comuna){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT initCap(CONCAT(U.NOMBRE, ' - ', S.NOMBRE_SUBCONTRATO)) 'DATOS', CONCAT(U.IDUSUARIO,'%%%',S.IDSUBCONTRATO) 'IDS'
						FROM PERSONAL P
						LEFT JOIN USUARIO U
						ON P.DNI = U.RUT
						LEFT JOIN SUBCONTRATISTAS S
						ON P.IDSUBCONTRATISTAS = S.IDSUBCONTRATO
						LEFT JOIN OBRA_ZONA_PERSONAL OZP
						ON U.IDUSUARIO = OZP.IDUSUARIO
						LEFT JOIN OBRA_ZONA_OPERACION OZO
						ON OZP.IDOBRA_ZONA_OPERACION = OZO.IDOBRA_ZONA_OPERACION
						WHERE U.RUT IS NOT NULL
						AND OZO.ACTIVO = 1
						AND OZO.IDESTRUCTURA_OPERACION = '{$estructura}'
						AND OZO.IDAREAFUNCIONAL = '{$comuna}'
						AND OZP.TIPO = 'Jefe brigada'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}
// Fin Consulta datos

// Consulta para Editar
function asignarEmpresaGestorOt($folio,$empresaSubcc,$gestorSubcc,$estado){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_OT
				SET IDEMPRESA_EECC='{$empresaSubcc}', IDGESTOR_EECC='{$gestorSubcc}', FECHA_ASIGNACION = NOW(), ESTADO = '{$estado}'
				WHERE IDOBRA_OT='{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta

function datosPersonalFormulario($id){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT initCap(CONCAT(p.DNI,' / ',CONCAT(p.NOMBRES,' ',p.APELLIDOS))) 'TECNICOS'
				FROM FORMULARIO_PERSONAL fp
				LEFT JOIN PERSONAL p
				ON fp.IDPERSONAL = p.IDPERSONAL
				WHERE fp.IDFORMULARIO = '{$id}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosEstadoCheckAsig($idAsigCheck,$idAsig){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT paco.IDPATENTE_ASIGNACION_CHECKS, paco.DATO, pac.ITEM
		FROM PATENTE_ASIGNACION_CHECKS_OK paco
		LEFT JOIN PATENTE_ASIGNACION_CHECKS pac
		ON pac.IDPATENTE_ASIGNACION_CHECKS = paco.IDPATENTE_ASIGNACION_CHECKS
		WHERE paco.IDPATENTE_ASIGNACIONES = '{$idAsig}'
		and paco.IDPATENTE_ASIGNACION_CHECKS = '{$idAsigCheck}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

//Crea segunda orden de ejecución
function ingresaSegundaOrdenEje($idObra){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO OBRA
							(GESTOR, ITO, IDEMPRESA_ASIGNADA, IDESTRUCTURA_OPERACION, IDAREAFUNCIONAL, IDOBRA_CONTRATO, IDOBRA_AGENCIA, NOMBREOE, TIPO, RED, PROYECTO, CLIENTE, DIRECCION, PEP2, PEP1, CENTRAL, INIOE, FINOE, FCREA, ESTADO, ESTADO_PERMISOS)
							SELECT GESTOR, ITO, IDEMPRESA_ASIGNADA, IDESTRUCTURA_OPERACION, IDAREAFUNCIONAL, IDOBRA_CONTRATO, IDOBRA_AGENCIA, NOMBREOE, 'Ingenieria', RED, PROYECTO, CLIENTE, DIRECCION, PEP2, PEP1, CENTRAL, INIOE, FINOE, FCREA, ESTADO, ESTADO_PERMISOS
							FROM OBRA
							WHERE NOMBREOE = '{$idObra}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function listadoFormularioEstructuras($idAuditoria){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        'parent' as DIFF,
        est.id as 'ID',
        est.FAMILIA,
        est.TEXTOFAMILIA,
        est.CATEGORIA,
        est.TEXTOCATEGORIA
      FROM FORMULARIO_ESTRUCTURAS est
      WHERE TIPOAUDITORIAid = {$idAuditoria}
      GROUP BY est.FAMILIA, est.CATEGORIA";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
        $array['child'] = listadoFormularioSubfamilia2($array['FAMILIA'], $array['CATEGORIA']);
        $array['expanded'] = false;
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function listadoFormularioSubfamilia2($familia, $categoria) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT
        'child' as DIFF,
        CONCAT('Problema ID: ', est.id) as TEXTOFAMILIA,
        est.id as ID,
        ' ' as FAMILIA,
        est.SUBFAMILIA2 as CATEGORIA,
        est.TEXTOSUBFAMILIA2 as TEXTOCATEGORIA
      FROM FORMULARIO_ESTRUCTURAS est
      WHERE est.TIPO = 'options'
      AND est.FAMILIA = '{$familia}'
      AND est.CATEGORIA = '{$categoria}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
        $array['leaf'] = true;
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function consultaRangoDiasObra(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDOBRA_RANGO_DIAS, RANGO, CONCAT(TIPO,RANGO)'RANGO_DIAS', COLOR_RANGO
FROM OBRA_RANGO_DIAS";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaListadoPaises(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, IDPAIS , ABREVIATURA , NOMBRE
FROM PAIS
ORDER BY NOMBRE ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaPais($abreviaturaPais, $nombrePais){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO PAIS(ABREVIATURA,NOMBRE)
	VALUES ( '{$abreviaturaPais}',
	'{$nombrePais}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function editarPais($abreviaturaPais, $nombrePais, $idPais){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE PAIS
	SET ABREVIATURA = '{$abreviaturaPais}',
	NOMBRE = '{$nombrePais}'
	WHERE IDPAIS = '{$idPais}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta para
function asignarProyectoInternoObra($folio,$proyectoInterno){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA
						SET IDESTRUCTURA_OPERACION = '{$proyectoInterno}'
						WHERE IDOBRA='{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}
// Fin Consulta

function datosProyectoInternoObras(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT DISTINCT eo.IDESTRUCTURA_OPERACION, CONCAT(s.SERVICIO, ' - ', c.CLIENTE, ' - ', a.ACTIVIDAD) 'DATOS'
						FROM ESTRUCTURA_OPERACION eo
						LEFT JOIN OBRA_ZONA_OPERACION ozo
						ON eo.IDESTRUCTURA_OPERACION = ozo.IDESTRUCTURA_OPERACION
						LEFT JOIN CLIENTE c
						ON eo.IDCLIENTE = c.IDCLIENTE
						LEFT JOIN SERVICIO s
						ON eo.IDSERVICIO = s.IDSERVICIO
						LEFT JOIN ACTIVIDAD a
						ON eo.IDACTIVIDAD = a.IDACTIVIDAD
						WHERE ozo.ACTIVO = 1";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function generaOtCubicacion($idCubicacion,$canmocub,$canuocub){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL GENERA_OT_CUBICACION('{$idCubicacion}','{$canmocub}','{$canuocub}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosDetalleCubObraFila($idobra,$idcubicacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION, C.IDOBRA, C.CODIGO, '' CODMO,
						CONCAT_WS(' / ', initCap(US.NOMBRE), initCap(SU.NOMBRE_SUBCONTRATO)) MANO_OBRA,
						OTC.MO 'CANMOCUB', M.PB 'PB_MO', V.VALOR 'VALOR_MO',
						ROUND(OTC.MO * M.PB * V.VALOR) 'TOTAL_MO',
						'' CODUO,
						'' UNIDAD_OBRA,
						OTC.UO 'CANUOCUB', CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(OTC.UO * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						CONCAT('OT: ',OT.IDOBRA_OT) 'CORR', '' ESPECIALIDAD, '' TIPO, '' DIRECCION, '' EXPANDIR,
						CONCAT_WS(' / ', CONCAT('Folio Ped.: ', OSM.IDSOLICITUD_MATERIAL), CONCAT('Est.: ', OSME.ESTADO_ASOCIADO) ) 'ESTADO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_OT_CUBICACION OTC
						ON C.IDOBRA_CUBICACION = OTC.IDOBRA_CUBICACION
						LEFT JOIN OBRA_OT OT
						ON OTC.IDOBRA_OT = OT.IDOBRA_OT
						LEFT JOIN USUARIO US
						ON OT.IDGESTOR_EECC = US.IDUSUARIO
						LEFT JOIN SUBCONTRATISTAS SU
						ON OT.IDEMPRESA_EECC = SU.IDSUBCONTRATO
						LEFT JOIN OBRA_SOL_MAT OSM
						ON OTC.IDOBRA_OT_CUBICACION = OSM.IDOBRA_OT_CUBICACION
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN MATERIALES_SOLICITUD MS
						ON OSM.IDSOLICITUD_MATERIAL = MS.IDSOLICITUD_MATERIAL
						WHERE (OTC.MO > 0
						OR OTC.UO > 0)
						AND C.IDOBRA = '{$idobra}'
						AND C.IDOBRA_CUBICACION = '{$idcubicacion}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['leaf'] = true;
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

// Consulta para duplicar OT
function duplicarOrdenTrabajo($idObra, $estado){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_OT	(IDOBRA, FECHA_CREACION, HORA_CREACION, ESTADO)
						VALUES('{$idObra}',DATE_FORMAT(NOW(), '%Y-%m-%d'),DATE_FORMAT(NOW(), '%H:%i'),'{$estado}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosPreDistribucionCubicacion($idobra,$idcubicacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT CONCAT_WS(' - ', OT.IDOBRA_OT, initCap(US.NOMBRE), initCap(SU.NOMBRE_SUBCONTRATO)) 'IDOBRA_OT', OTC.MO 'CANMOCUB', OTC.UO 'CANUOCUB'
		FROM OBRA_CUBICACION C
		LEFT JOIN OBRA_MO M
		ON C.CODMO = M.CODMO
		LEFT JOIN OBRA O
		ON C.IDOBRA = O.IDOBRA
		LEFT JOIN OBRA_ESPECIALIDAD E
		ON C.CODESP = E.CODESP
		LEFT JOIN OBRA_MO_VALOR V
		ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
		AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
		LEFT JOIN OBRA_UO U
		ON C.CODUO = U.CODUO
		LEFT JOIN OBRA_OT_CUBICACION OTC
		ON C.IDOBRA_CUBICACION = OTC.IDOBRA_CUBICACION
		LEFT JOIN OBRA_OT OT
		ON OTC.IDOBRA_OT = OT.IDOBRA_OT
		LEFT JOIN USUARIO US
		ON OT.IDGESTOR_EECC = US.IDUSUARIO
		LEFT JOIN SUBCONTRATISTAS SU
		ON OT.IDEMPRESA_EECC = SU.IDSUBCONTRATO
		WHERE C.IDOBRA_CUBICACION = '{$idcubicacion}'
		GROUP BY CONCAT_WS(' - ', OT.IDOBRA_OT, initCap(US.NOMBRE), initCap(SU.NOMBRE_SUBCONTRATO))
		UNION ALL
		SELECT CONCAT_WS(' - ', OT.IDOBRA_OT, initCap(US.NOMBRE), initCap(SU.NOMBRE_SUBCONTRATO)) 'IDOBRA_OT', 0 'CANMOCUB', 0 'CANUOCUB'
		FROM OBRA_OT OT
		LEFT JOIN USUARIO US
		ON OT.IDGESTOR_EECC = US.IDUSUARIO
		LEFT JOIN SUBCONTRATISTAS SU
		ON OT.IDEMPRESA_EECC = SU.IDSUBCONTRATO
		WHERE OT.IDOBRA = '{$idobra}'
		AND OT.IDOBRA_OT NOT IN
		(
			SELECT IDOBRA_OT
			FROM OBRA_OT_CUBICACION
			WHERE IDOBRA_CUBICACION = '{$idcubicacion}'
		)";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosOtsForAsig($idObra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT oo.IDOBRA_OT 'IDS', CONCAT_WS(' - ',CONCAT('OT: ',oo.IDOBRA_OT),u.NOMBRE,s.NOMBRE_SUBCONTRATO) 'DATOS'
						FROM OBRA_OT oo
						LEFT JOIN SUBCONTRATISTAS s
						ON oo.IDEMPRESA_EECC = s.IDSUBCONTRATO
						LEFT JOIN USUARIO u
						ON oo.IDGESTOR_EECC = u.IDUSUARIO
						WHERE oo.IDOBRA = '{$idObra}'";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function asignarOrdenTrabajo($id,$otAsignar){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO OBRA_OT_CUBICACION (IDOBRA_OT,IDOBRA_CUBICACION,MO,UO)
				SELECT '{$otAsignar}', oc.IDOBRA_CUBICACION, oc.CANMOCUB, oc.CANUOCUB
				FROM OBRA_CUBICACION oc
				WHERE oc.IDOBRA_CUBICACION =  '{$id}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function consultaListadoAreasFuncionales(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT  '' S, a.IDAREAFUNCIONAL, a.COMUNA, a.PROVINCIA, a.REGION, a.CODIGOPOSTAL, a.IDPAIS, p.NOMBRE'PAIS', a.ESTADO
FROM AREAFUNCIONAL a LEFT JOIN PAIS p
ON a.IDPAIS = p.IDPAIS
ORDER BY a.COMUNA ASC";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaAreaFuncional($comuna, $provincia, $region, $codigoPostal, $idPais){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO AREAFUNCIONAL(COMUNA,PROVINCIA,REGION,CODIGOPOSTAL,IDPAIS)
	VALUES ( '{$comuna}',
	'{$provincia}', '{$region}', '{$codigoPostal}', '{$idPais}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
}

function editarAreaFuncional($comuna, $provincia, $region, $codigoPostal, $idPais, $idAreaFuncional, $estado){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE AREAFUNCIONAL
	SET COMUNA = '{$comuna}',
	PROVINCIA = '{$provincia}', REGION = '{$region}', CODIGOPOSTAL = '{$codigoPostal}', IDPAIS = '{$idPais}',
	ESTADO = '{$estado}'
	WHERE IDAREAFUNCIONAL = '{$idAreaFuncional}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function editarDiasObras($nroDias, $idRango){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE OBRA_RANGO_DIAS
	SET RANGO = '{$nroDias}'
	WHERE IDOBRA_RANGO_DIAS = '{$idRango}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function editarDiasObras2($nroDias2){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE OBRA_RANGO_DIAS
	SET RANGO = '{$nroDias2}'
	WHERE IDOBRA_RANGO_DIAS = 3";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function validarDocumentoObra($id){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_DOCUMENTOS_PERMISO
						SET VALIDADO = 2
						WHERE IDOBRA_DOCUMENTOS_PERMISO = '{$id}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function datosCaratulaObras2($idObras,$idObras2){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL CARATULA_OBRAS_2('{$idObras}','{$idObras2}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosDetalleCubObra2($idobra,$idobra2){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION, C.IDOBRA, C.CODIGO, C.CODMO, C.CANMOCUB, M.PB 'PB_MO', V.VALOR 'VALOR_MO',
						CASE WHEN M.PB IS NULL THEN 0 ELSE ROUND(C.CANMOCUB * M.PB * V.VALOR) END 'TOTAL_MO',
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(M.DESCRIPCION) IS NULL THEN '--' ELSE initCap(M.DESCRIPCION) END 'MANO_OBRA',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD', O.TIPO, C.DIRDESDE 'DIRECCION', '' EXPANDIR,
						CONCAT_WS(' / ', CONCAT('Folio Ant.: ', OSM.IDSOLICITUD_MATERIAL), CONCAT('Est.: ', OSME.ESTADO_ASOCIADO) ) 'ESTADO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_SOL_MAT OSM
						ON C.IDOBRA_CUBICACION = OSM.IDOBRA_CUBICACION
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN MATERIALES_SOLICITUD MS
						ON OSM.IDSOLICITUD_MATERIAL = MS.IDSOLICITUD_MATERIAL
						WHERE C.IDOBRA IN (
							{$idobra},{$idobra2}
						)
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['child'] = datosDetalleCubObraFila2($idobra,$idobra2,$array['IDOBRA_CUBICACION']);
				$array['expanded'] = false;
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosDetalleCubObraFila2($idobra,$idobra2,$idcubicacion){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION, C.IDOBRA, C.CODIGO, '' CODMO,
						CONCAT_WS(' / ', initCap(US.NOMBRE), initCap(SU.NOMBRE_SUBCONTRATO)) MANO_OBRA,
						OTC.MO 'CANMOCUB', M.PB 'PB_MO', V.VALOR 'VALOR_MO',
						ROUND(OTC.MO * M.PB * V.VALOR) 'TOTAL_MO',
						'' CODUO,
						'' UNIDAD_OBRA,
						OTC.UO 'CANUOCUB', CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(OTC.UO * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						CONCAT('OT: ',OT.IDOBRA_OT) 'CORR', '' ESPECIALIDAD, '' TIPO, '' DIRECCION,  '' EXPANDIR,
						CONCAT_WS(' / ', CONCAT('Folio Ped.: ', OSM.IDSOLICITUD_MATERIAL), CONCAT('Est.: ', OSME.ESTADO_ASOCIADO) ) 'ESTADO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_OT_CUBICACION OTC
						ON C.IDOBRA_CUBICACION = OTC.IDOBRA_CUBICACION
						LEFT JOIN OBRA_OT OT
						ON OTC.IDOBRA_OT = OT.IDOBRA_OT
						LEFT JOIN USUARIO US
						ON OT.IDGESTOR_EECC = US.IDUSUARIO
						LEFT JOIN SUBCONTRATISTAS SU
						ON OT.IDEMPRESA_EECC = SU.IDSUBCONTRATO
						LEFT JOIN OBRA_SOL_MAT OSM
						ON OTC.IDOBRA_OT_CUBICACION = OSM.IDOBRA_OT_CUBICACION
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN MATERIALES_SOLICITUD MS
						ON OSM.IDSOLICITUD_MATERIAL = MS.IDSOLICITUD_MATERIAL
						WHERE (OTC.MO > 0
						OR OTC.UO > 0)
						AND C.IDOBRA IN (
							{$idobra},{$idobra2}
						)
						AND C.IDOBRA_CUBICACION = '{$idcubicacion}'";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$array['leaf'] = true;
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaFormularioAuditoria($titulo){
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "INSERT INTO FORMULARIO_AUDITORIAS(TITULO)
        VALUES ('{$titulo}')";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    } else {
      $con->query("ROLLBACK");
      return "Error";
    }
  } else {
    $con->query("ROLLBACK");
    return "Error";
  }
}

function eliminarFormularioAuditoria($idAuditoria){
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "DELETE FROM FORMULARIO_AUDITORIAS
        WHERE id = {$idAuditoria}";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    } else {
      $con->query("ROLLBACK");
      return "Error";
    }
  } else {
    $con->query("ROLLBACK");
    return "Error";
  }
}

function eliminarFormularioAuditoriaHijos($idAuditoria){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM FORMULARIO_ESTRUCTURAS WHERE TIPOAUDITORIAid = {$idAuditoria}";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosFormularioEstructuraFamilia($idAuditoria) {
  $con = conectar();
	if ($con != 'No conectado') {
		$sql = "SELECT
        FAMILIA,
        TEXTOFAMILIA
      FROM FORMULARIO_ESTRUCTURAS
      WHERE TIPOAUDITORIAid = {$idAuditoria}
      GROUP BY FAMILIA, TEXTOFAMILIA";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function datosFormularioEstructuraCategoria($idEstructura) {
  $con = conectar();
	if ($con != 'No conectado') {
		$sql = "SELECT
        id,
        FAMILIA,
        TEXTOFAMILIA,
        CATEGORIA,
        TEXTOCATEGORIA,
        TIPO,
        SUBFAMILIA1,
        TEXTOSUBFAMILIA1,
        TIPOAUDITORIAid
      FROM FORMULARIO_ESTRUCTURAS
      WHERE id = {$idEstructura}";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function validarFormularioEstructuraCategoria($familia, $categoria, $idAuditoria) {
  $con = conectar();
	if ($con != 'No conectado') {
		$sql = "SELECT
        count(id) as COUNT
      FROM FORMULARIO_ESTRUCTURAS
      WHERE FAMILIA=fn_remove_accents('{$familia}')
      AND CATEGORIA=fn_remove_accents('{$categoria}')
      AND TIPOAUDITORIAid = {$idAuditoria}";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		} else{
			return "Error";
		}
	} else{
		return "Error";
	}
}

function ingresaFormularioEstructuraCategoria($familia, $textofamilia, $categoria, $textocategoria, $idauditoria) {
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sqlOk = "INSERT INTO FORMULARIO_ESTRUCTURAS(FAMILIA,TEXTOFAMILIA,CATEGORIA,TEXTOCATEGORIA,
        TIPO,SUBFAMILIA1,TEXTOSUBFAMILIA1,SUBFAMILIA2,TEXTOSUBFAMILIA2,PUNTAJE,TIPOAUDITORIAid
      ) VALUES (fn_remove_accents('{$familia}'),'{$textofamilia}',fn_remove_accents('{$categoria}'),'{$textocategoria}',
        'ok',fn_remove_accents('{$categoria}Ok'),'{$textocategoria} encontrado OK',fn_remove_accents('{$categoria}Ok'),'{$textocategoria} encontrado OK',0,{$idauditoria}
      );";
    $con->query($sqlOk);

		$sqlNot = "INSERT INTO FORMULARIO_ESTRUCTURAS(FAMILIA,TEXTOFAMILIA,CATEGORIA,TEXTOCATEGORIA,
        TIPO,SUBFAMILIA1,TEXTOSUBFAMILIA1,SUBFAMILIA2,TEXTOSUBFAMILIA2,PUNTAJE,TIPOAUDITORIAid
      ) VALUES (fn_remove_accents('{$familia}'),'{$textofamilia}',fn_remove_accents('{$categoria}'),'{$textocategoria}',
        'ojnot',fn_remove_accents('{$categoria}NoAplica'),'No aplica',fn_remove_accents('{$categoria}NoAplica'),'No aplica',0,{$idauditoria}
      );";
    $con->query($sqlNot);

    $sqlNotes = "INSERT INTO FORMULARIO_ESTRUCTURAS(FAMILIA,TEXTOFAMILIA,CATEGORIA,TEXTOCATEGORIA,
        TIPO,SUBFAMILIA1,TEXTOSUBFAMILIA1,SUBFAMILIA2,TEXTOSUBFAMILIA2,PUNTAJE,TIPOAUDITORIAid
      ) VALUES (fn_remove_accents('{$familia}'),'{$textofamilia}',fn_remove_accents('{$categoria}'),'{$textocategoria}',
        'notes',fn_remove_accents('{$categoria}Observaciones'),'Observaciones',null,null,0,{$idauditoria}
      );";
    $con->query($sqlNotes);

    $sqlFiles = "INSERT INTO FORMULARIO_ESTRUCTURAS(FAMILIA,TEXTOFAMILIA,CATEGORIA,TEXTOCATEGORIA,
        TIPO,SUBFAMILIA1,TEXTOSUBFAMILIA1,SUBFAMILIA2,TEXTOSUBFAMILIA2,PUNTAJE,TIPOAUDITORIAid
      ) VALUES (fn_remove_accents('{$familia}'),'{$textofamilia}',fn_remove_accents('{$categoria}'),'{$textocategoria}',
        'files',fn_remove_accents('{$categoria}Fotos'),'Adjuntar Foto',null,null,0,{$idauditoria}
      );";
    $con->query($sqlFiles);
    $con->query("COMMIT");
    return "Ok";
  } else {
    $con->query("ROLLBACK");
    return "Error";
  }
}

function ingresaFormularioEstructuraFalla(
  $familia,
  $textofamilia,
  $categoria,
  $textocategoria,
  $tipo,
  $subfamilia1,
  $textosubfamilia1,
  $subfamilia2,
  $textosubfamilia2,
  $puntaje,
  $idauditoria
) {
  $con = conectar();
  $con->query("START TRANSACTION");
  if($con != 'No conectado'){
    $sql = "INSERT INTO FORMULARIO_ESTRUCTURAS(
        FAMILIA,
        TEXTOFAMILIA,
        CATEGORIA,
        TEXTOCATEGORIA,
        TIPO,
        SUBFAMILIA1,
        TEXTOSUBFAMILIA1,
        SUBFAMILIA2,
        TEXTOSUBFAMILIA2,
        PUNTAJE,
        TIPOAUDITORIAid
      )
      VALUES (
        fn_remove_accents('{$familia}'),
        '{$textofamilia}',
        fn_remove_accents('{$categoria}'),
        '{$textocategoria}',
        '{$tipo}',
        fn_remove_accents('{$subfamilia1}'),
        '{$textosubfamilia1}',
        fn_remove_accents('{$subfamilia1}{$subfamilia2}'),
        '{$textosubfamilia2}',
        {$puntaje},
        {$idauditoria}
      )";
    if ($con->query($sql)) {
      $con->query("COMMIT");
      return "Ok";
    } else {
      $con->query("ROLLBACK");
      return "Error";
    }
  } else {
    $con->query("ROLLBACK");
    return "Error";
  }
}

function eliminarFormularioEstructuraCategoria($categoria) {
  $con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM FORMULARIO_ESTRUCTURAS WHERE CATEGORIA = '{$categoria}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarFormularioEstructuraFalla($idEstructura){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM FORMULARIO_ESTRUCTURAS WHERE id = {$idEstructura}";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

// Consulta Vehiculos Q estados
function consultaVehiculoQProyectos($rut,$path){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_VEHICULOS_Q_PROYECTO('{$rut}','{$path}')";

    if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
      return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function eliminarCubicaionObra($idCub){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_OT_CUBICACION
		 WHERE IDOBRA_CUBICACION = '{$idCub}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function agregarOtCubicacionObra($idOt, $mo, $uo,$idCub){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO OBRA_OT_CUBICACION
		(IDOBRA_OT, IDOBRA_CUBICACION, MO, UO)
		VALUES('{$idOt}', '{$idCub}', '{$mo}', '{$uo}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function asignarFechasTerrenoOts($idOt,$fechaIni,$fechaFin){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_OT
						SET FECHA_INI_TERRENO = '{$fechaIni}', FECHA_FIN_TERRENO = '{$fechaFin}'
						WHERE IDOBRA_OT = '{$idOt}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function eliminarOt($id){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "DELETE FROM OBRA_OT
						WHERE IDOBRA_OT = '{$id}'";
		if($con->query($sql)){
				$con->query("COMMIT");
				return "Ok";
		}
		else{
				$con->query("ROLLBACK");
				// return $con->error;
				return "Error";
		}
	}
	else{
			$con->query("ROLLBACK");
			return "Error";
	}
}

function datosCaratulaOtsObras($idz){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, oo.IDOBRA_OT 'OT', o.TIPO, oo.ESTADO, s.NOMBRE_SUBCONTRATO 'EMPRESA', u.NOMBRE 'JEFE_BRIGADA', oo.FECHA_INI_TERRENO,
						oo.FECHA_FIN_TERRENO, oo.AVANCE_EJECUCION, o.IDESTRUCTURA_OPERACION 'ESTRUCTURA_OPERACION', o.IDAREAFUNCIONAL 'COMUNA', o.NOMBREOE, o.IDOBRA
						FROM OBRA_OT oo
						LEFT JOIN OBRA o
						ON oo.IDOBRA = o.IDOBRA
						LEFT JOIN SUBCONTRATISTAS s
						ON oo.IDEMPRESA_EECC = s.IDSUBCONTRATO
						LEFT JOIN USUARIO u
						ON oo.IDGESTOR_EECC = u.IDUSUARIO
						WHERE oo.IDOBRA = '{$idz}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosCaratulaOtsObras2($idObras,$idObras2){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, oo.IDOBRA_OT 'OT', o.TIPO, oo.ESTADO, s.NOMBRE_SUBCONTRATO 'EMPRESA', u.NOMBRE 'JEFE_BRIGADA', oo.FECHA_INI_TERRENO,
						oo.FECHA_FIN_TERRENO, oo.AVANCE_EJECUCION, o.IDESTRUCTURA_OPERACION 'ESTRUCTURA_OPERACION', o.IDAREAFUNCIONAL 'COMUNA', o.NOMBREOE, o.IDOBRA
						FROM OBRA_OT oo
						LEFT JOIN OBRA o
						ON oo.IDOBRA = o.IDOBRA
						LEFT JOIN SUBCONTRATISTAS s
						ON oo.IDEMPRESA_EECC = s.IDSUBCONTRATO
						LEFT JOIN USUARIO u
						ON oo.IDGESTOR_EECC = u.IDUSUARIO
						WHERE oo.IDOBRA IN (
							{$idObras},{$idObras2}
						)";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosDocumPermisoObras2($id1,$id2){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, od.NOMBRE, od.ARCHIVO, od.TIPO_ARCHIVO 'TIPO_ARCHIVO', od.IDOBRA_DOCUMENTOS_PERMISO 'FOLIO',
						CONCAT('<span style=''color: red;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''documentoObras(\"',od.ARCHIVO,'\")''></span>') 'DOCUMENTO',
						CASE WHEN od.VALIDADO IS NULL OR od.VALIDADO = '' THEN '--' ELSE
						CASE WHEN od.VALIDADO = 1 THEN CONCAT('<span style=''color: red;'' class=''fas fa-times ''></span>') ELSE
						CONCAT('<span style=''color: green;'' class=''fas fa-check ''></span>')END END 'VAL', o.TIPO, od.IDOBRA_DOCUMENTOS_PERMISO 'FOLIO',
						CONCAT('<b class=\"fas fa-comment-alt\" style=\"color: #black; font-size: 10pt;\" title=\"',od.OBSERVACION,'\" ></b>') 'OBSERVACION'
						FROM OBRA_DOCUMENTOS_PERMISO od
						LEFT JOIN OBRA o
						ON od.IDOBRA = o.IDOBRA
						WHERE od.IDOBRA IN (
							{$id1},{$id2}
						)";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaPersonalInicio($rutUser){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL SUBORDINADOS_INICIO('{$rutUser}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}

			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function listadoFormularioInicio($rut, $path, $fecIni, $fecEnd) {
  $con = conectar();
  if($con != 'No conectado'){
		$sql = "call sp_listado_formulario_todos_2_inicio('" . $rut . "','" . $path . "','" . $fecIni . "','" . $fecEnd ."')";
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
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosDetalleOrdenTrabajo($folioOt){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL DETALLE_ORDEN_TRABAJO('{$folioOt}')";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosCubDetalleOrdenTrabajo($idOt){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION, C.IDOBRA, C.CODIGO, C.CODMO, initCap(M.DESCRIPCION) 'MANO_OBRA', C.CANMOCUB, M.PB 'PB_MO', V.VALOR 'VALOR_MO',
						ROUND(C.CANMOCUB * M.PB * V.VALOR) 'TOTAL_MO',
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD', O.TIPO, C.DIRDESDE 'DIRECCION', '' EXPANDIR
						FROM OBRA_OT_CUBICACION ooc
						LEFT JOIN  OBRA_CUBICACION C
						ON ooc.IDOBRA_CUBICACION = C.IDOBRA_CUBICACION
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						WHERE ooc.IDOBRA_OT = '{$idOt}'
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresarItem($item) {
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO INCIDENCIA_ITEM (ITEM) VALUES ('{$item}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return $con->insert_id;
		} else{
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
    return "Error";
	}
}

function ingresarElemento($elemento) {
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO INCIDENCIA_ELEMENTO (ELEMENTO) VALUES ('{$elemento}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return $con->insert_id;
		} else{
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
    return "Error";
	}
}

function ingresarAnomalia($anomalia) {
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "INSERT INTO INCIDENCIA_ANOMALIA (ELEMENTO) VALUES ('{$anomalia}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return $con->insert_id;
		} else{
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosAnticipoMatObras($idobra){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION,
						CASE WHEN OSM.IDSOLICITUD_MATERIAL IS NULL THEN '' ELSE OSM.IDSOLICITUD_MATERIAL END 'FOLIO_SOLICITUD',
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD',
						CASE WHEN OSM.IDOBRA_CUBICACION IS NOT NULL THEN 'Anticipado' ELSE 'No Anticipado' END 'ESTADO_SOL_MAT',
						CONCAT_WS(' / ', U.CODIGO2_CLIENTE,U.CODIGO3_CLIENTE) 'CODIGO_CLIENTE',
						CONCAT_WS(' / ', U.CODIGO1_INTERNO, U.CODIGO2_INTERNO, U.CODIGO3_INTERNO) 'CODIGO_INTERNO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_SOL_MAT OSM
						ON C.IDOBRA_CUBICACION = OSM.IDOBRA_CUBICACION
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						WHERE C.IDOBRA = '{$idobra}'
						AND C.CODUO <> '0'
						AND C.CODUO IS NOT NULL
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosAnticipoMatObras2($idobra,$idobra2){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION,
						CASE WHEN OSM.IDSOLICITUD_MATERIAL IS NULL THEN '' ELSE OSM.IDSOLICITUD_MATERIAL END 'FOLIO_SOLICITUD',
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD',
						CASE WHEN OSM.IDOBRA_CUBICACION IS NOT NULL THEN 'Anticipado' ELSE 'No Anticipado' END 'ESTADO_SOL_MAT',
						CONCAT_WS(' / ', U.CODIGO2_CLIENTE,U.CODIGO3_CLIENTE) 'CODIGO_CLIENTE',
						CONCAT_WS(' / ', U.CODIGO1_INTERNO, U.CODIGO2_INTERNO, U.CODIGO3_INTERNO) 'CODIGO_INTERNO'
						FROM OBRA_CUBICACION C
						LEFT JOIN OBRA_SOL_MAT OSM
						ON C.IDOBRA_CUBICACION = OSM.IDOBRA_CUBICACION
						LEFT JOIN OBRA_MO M
						ON C.CODMO = M.CODMO
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_MO_VALOR V
						ON O.IDOBRA_AGENCIA = V.IDOBRA_AGENCIA
						AND E.IDOBRA_ESPECIALIDAD = V.IDOBRA_ESPECIALIDAD
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						WHERE C.IDOBRA IN (
							{$idobra},{$idobra2}
						)
						AND C.CODUO <> '0'
						AND C.CODUO IS NOT NULL
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function anticiparMaterialesObra($usuario){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL ANTICIPAR_MAT_OBRA('{$usuario}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosPeticionMatObrasOt($idOt){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, OCU.LINEA 'CORR', OTC.IDOBRA_OT_CUBICACION,
				CASE WHEN OSM.IDSOLICITUD_MATERIAL IS NULL THEN '' ELSE OSM.IDSOLICITUD_MATERIAL END 'FOLIO_SOLICITUD',
				initCap(OE.ESPECIALIDAD) 'ESPECIALIDAD',
				CASE WHEN UO.CODUO = '0' OR UO.CODUO = '' OR UO.CODUO IS NULL THEN '--' ELSE UO.CODUO END 'CODUO',
				CASE WHEN initCap(UO.NOMBRE) IS NULL THEN '--' ELSE initCap(UO.NOMBRE) END 'UNIDAD_OBRA', OCU.CANUOCUB,
				OCU.CANUOCUB, CASE WHEN UO.VALOR IS NULL THEN 0 ELSE UO.VALOR END 'VALOR_UO',
				CASE WHEN UO.PROVEE <> 'CLIENTE'
				THEN ROUND(OCU.CANUOCUB * UO.VALOR)
				ELSE 0 END 'TOTAL_UO',
				CASE WHEN initCap(UO.PROVEE) IS NULL THEN '--' ELSE initCap(UO.PROVEE) END 'PROVEE',
				CASE WHEN OSM.IDOBRA_SOL_MAT IS NOT NULL THEN 'Pedido' ELSE 'Pendiente' END 'ESTADO_SOL_MAT',
				CONCAT_WS(' / ', UO.CODIGO2_CLIENTE,UO.CODIGO3_CLIENTE) 'CODIGO_CLIENTE',
				CONCAT_WS(' / ', UO.CODIGO1_INTERNO, UO.CODIGO2_INTERNO, UO.CODIGO3_INTERNO) 'CODIGO_INTERNO'
				FROM OBRA_OT OT
				LEFT JOIN OBRA_OT_CUBICACION OTC
				ON OT.IDOBRA_OT = OTC.IDOBRA_OT
				LEFT JOIN OBRA_SOL_MAT OSM
				ON OTC.IDOBRA_OT_CUBICACION = OSM.IDOBRA_OT_CUBICACION
				LEFT JOIN OBRA_CUBICACION OCU
				ON OTC.IDOBRA_CUBICACION = OCU.IDOBRA_CUBICACION
				LEFT JOIN OBRA_ESPECIALIDAD OE
				ON OCU.CODESP = OE.CODESP
				LEFT JOIN OBRA_UO UO
				ON OCU.CODUO = UO.CODUO
				WHERE OT.IDOBRA_OT = '{$idOt}'
				AND OTC.UO <> 0
				AND UO.CODUO IS NOT NULL
				ORDER BY OCU.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function pedirMaterialesObrasOt($usuario){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL PEDIR_MAT_OBRA('{$usuario}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function precargaUnidadObra($coduo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL OBRA_CHECK_UO('{$coduo}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "OK";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function precargaManoObra($codmo){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL OBRA_CHECK_MO('{$codmo}')";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "OK";
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function datosListadoSolicitudMatObras($inicio,$fin){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "CALL LISTADO_SOLICITUD_MATERIALES('{$inicio}','{$fin}')";
		if ($row = $con->query($sql)) {
			$return = array();
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function ingresaAnticiparMaterialesObra($id,$idSolMatAnt){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO OBRA_SOL_MAT
							(IDOBRA_CUBICACION, IDSOLICITUD_MATERIAL, IDOBRA_SOL_MAT_ESTADO)
							VALUES('{$id}','{$idSolMatAnt}',(SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'Solicitado' AND TIPO_SOLICITUD = 'Anticipo'))";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function ingresaPedirMaterialesObrasOt($id,$idSolMatPed){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "INSERT INTO OBRA_SOL_MAT
							(IDOBRA_OT_CUBICACION, IDSOLICITUD_MATERIAL, IDOBRA_SOL_MAT_ESTADO)
							VALUES('{$id}','{$idSolMatPed}',(SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'Solicitado' AND TIPO_SOLICITUD = 'Pedido'))";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function datosAgregarMaterialAnticipo($idAgregarMat){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, C.IDOBRA_CUBICACION,
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD', OU.UM 'UM', OSM.BODEGA 'BODEGA',
						OSME.ESTADO_ASOCIADO 'ESTADO', OSM.IDMATERIALES_GESTION 'FOLIO_SOL', OSM.FOLIO_COORDINADOR 'FOLIO_COORD',
						CONCAT_WS(' / ', U.CODIGO2_CLIENTE,U.CODIGO3_CLIENTE) 'CODIGO_CLIENTE', CONCAT_WS(' / ', U.CODIGO1_INTERNO, U.CODIGO2_INTERNO, U.CODIGO3_INTERNO) 'CODIGO_INTERNO',
						CASE WHEN ME.CONTADOR_PDF_ENTREGA = '' OR ME.CONTADOR_PDF_ENTREGA IS NULL
						THEN CONCAT('<span style=''color: gray;'' class=''far fa-file-pdf''></span>')
						ELSE CASE WHEN ME.CONTADOR_PDF_ENTREGA = 1
						THEN CONCAT('<span style=''color: red;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_ENTREGA,'\")''></span>')
						ELSE CONCAT('<span style=''color: green;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_ENTREGA,'\")''></span>') END END 'PDF_ENTREGA',
						CASE WHEN ME.PDF_GUIA_DESPACHO = '' OR ME.PDF_GUIA_DESPACHO IS NULL
						THEN CONCAT('<span style=''color: gray;'' class=''far fa-file-pdf''></span>')
						ELSE CONCAT('<span style=''color: green;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_GUIA_DESPACHO,'\")''></span>') END 'PDF_GUIA_DESPACHO',
						ME.IDMATERIALES_ENTREGA 'NUMERO_PDF', ME.GUIA_DESPACHO 'NUMERO_GUIA'
						FROM MATERIALES_SOLICITUD SM
						LEFT JOIN OBRA_SOL_MAT OSM
						ON SM.IDSOLICITUD_MATERIAL = OSM.IDSOLICITUD_MATERIAL
						LEFT JOIN MATERIALES_GESTION MG
						ON OSM.IDMATERIALES_GESTION = MG.IDMATERIALES_GESTION
						LEFT JOIN MATERIALES_ENTREGA ME
						ON OSM.IDMATERIALES_ENTREGA = ME.IDMATERIALES_ENTREGA
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN OBRA_CUBICACION C
						ON C.IDOBRA_CUBICACION = OSM.IDOBRA_CUBICACION
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_UM OU
						ON U.IDOBRA_UM = OU.IDOBRA_UM
						WHERE SM.IDSOLICITUD_MATERIAL = '{$idAgregarMat}'
						AND C.CODUO <> '0'
						AND C.CODUO IS NOT NULL
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function datosAgregarMaterialPedido($idAgregarMat){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT '' S, OOC.IDOBRA_OT_CUBICACION,
						CASE WHEN C.CODUO = '0' OR C.CODUO = '' OR C.CODUO IS NULL THEN '--' ELSE C.CODUO END 'CODUO',
						CASE WHEN initCap(U.NOMBRE) IS NULL THEN '--' ELSE initCap(U.NOMBRE) END 'UNIDAD_OBRA',
						C.CANUOCUB, CASE WHEN U.VALOR IS NULL THEN 0 ELSE U.VALOR END 'VALOR_UO',
						CASE WHEN U.PROVEE <> 'CLIENTE'
						THEN ROUND(C.CANUOCUB * U.VALOR)
						ELSE 0 END 'TOTAL_UO',
						CASE WHEN initCap(U.PROVEE) IS NULL THEN '--' ELSE initCap(U.PROVEE) END 'PROVEE',
						C.LINEA 'CORR', initCap(E.ESPECIALIDAD) 'ESPECIALIDAD', OU.UM 'UM', OSM.BODEGA 'BODEGA',
						OSME.ESTADO_ASOCIADO 'ESTADO', OSM.IDMATERIALES_GESTION 'FOLIO_SOL', OSM.FOLIO_COORDINADOR 'FOLIO_COORD',
						CONCAT_WS(' / ', U.CODIGO2_CLIENTE,U.CODIGO3_CLIENTE) 'CODIGO_CLIENTE', CONCAT_WS(' / ', U.CODIGO1_INTERNO, U.CODIGO2_INTERNO, U.CODIGO3_INTERNO) 'CODIGO_INTERNO',
						CASE WHEN ME.CONTADOR_PDF_ENTREGA = '' OR ME.CONTADOR_PDF_ENTREGA IS NULL
						THEN CONCAT('<span style=''color: gray;'' class=''far fa-file-pdf''></span>')
						ELSE CASE WHEN ME.CONTADOR_PDF_ENTREGA = 1
						THEN CONCAT('<span style=''color: red;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_ENTREGA,'\")''></span>')
						ELSE CONCAT('<span style=''color: green;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_ENTREGA,'\")''></span>') END END 'PDF_ENTREGA',
						CASE WHEN ME.PDF_GUIA_DESPACHO = '' OR ME.PDF_GUIA_DESPACHO IS NULL
						THEN CONCAT('<span style=''color: gray;'' class=''far fa-file-pdf''></span>')
						ELSE CONCAT('<span style=''color: green;'' class=''far fa-file-pdf hoverPDF'' title=''Documento cargado'' onclick=''pdf_Entrega_Mat(\"',ME.PDF_GUIA_DESPACHO,'\")''></span>') END 'PDF_GUIA_DESPACHO',
						ME.IDMATERIALES_ENTREGA 'NUMERO_PDF', ME.GUIA_DESPACHO 'NUMERO_GUIA'
						FROM MATERIALES_SOLICITUD SM
						LEFT JOIN OBRA_SOL_MAT OSM
						ON SM.IDSOLICITUD_MATERIAL = OSM.IDSOLICITUD_MATERIAL
						LEFT JOIN MATERIALES_GESTION MG
						ON OSM.IDMATERIALES_GESTION = MG.IDMATERIALES_GESTION
						LEFT JOIN MATERIALES_ENTREGA ME
						ON OSM.IDMATERIALES_ENTREGA = ME.IDMATERIALES_ENTREGA
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSME
						ON OSM.IDOBRA_SOL_MAT_ESTADO = OSME.IDOBRA_SOL_MAT_ESTADO
						LEFT JOIN OBRA_OT_CUBICACION OOC
						ON OSM.IDOBRA_OT_CUBICACION = OOC.IDOBRA_OT_CUBICACION
						LEFT JOIN OBRA_CUBICACION C
						ON OOC.IDOBRA_CUBICACION = C.IDOBRA_CUBICACION
						LEFT JOIN OBRA O
						ON C.IDOBRA = O.IDOBRA
						LEFT JOIN OBRA_ESPECIALIDAD E
						ON C.CODESP = E.CODESP
						LEFT JOIN OBRA_UO U
						ON C.CODUO = U.CODUO
						LEFT JOIN OBRA_UM OU
						ON U.IDOBRA_UM = OU.IDOBRA_UM
						WHERE SM.IDSOLICITUD_MATERIAL = '{$idAgregarMat}'
						AND C.CODUO <> '0'
						AND C.CODUO IS NOT NULL
						ORDER BY C.IDOBRA_CUBICACION";
		if ($row = $con->query($sql)) {
			while($array = $row->fetch_array(MYSQLI_ASSOC)){
				$return[] = $array;
			}
			return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function solicitarClienteSolicitudMaterial($id,$folio,$folioMatGestion){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'En curso' AND TIPO_SOLICITUD = 'Anticipo'),
							IDMATERIALES_GESTION = '{$folioMatGestion}'
							WHERE IDOBRA_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function ingresaContactoClienteZonaObra($folio, $correo,$telefono){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE OBRA_ZONA_OPERACION
						SET CORREO = '{$correo}', TELEFONO = '{$telefono}'
						WHERE IDOBRA_ZONA_OPERACION = '{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function estadoEnPreparacionSolicitudMaterialesAnt($id,$folio,$folioCoord){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'En preparación' AND TIPO_SOLICITUD = 'Anticipo'),
							FOLIO_COORDINADOR = '{$folioCoord}'
							WHERE IDOBRA_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function estadoEnPreparacionSolicitudMaterialesPed($id,$folio,$bodega){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'En preparación' AND TIPO_SOLICITUD = 'Pedido'),
							BODEGA = '{$bodega}'
							WHERE IDOBRA_OT_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function ingresaMaterialesGestion(){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESA_MAT_GESTION()";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function estadoPreparadoSolicitudMateriales($id,$folio,$bodega){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'Preparado' AND TIPO_SOLICITUD = 'Anticipo'),
							BODEGA = '{$bodega}'
							WHERE IDOBRA_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function estadoEnBodegaSolicitudMaterialesAnt($id,$folio,$bodega){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'En bodega' AND TIPO_SOLICITUD = 'Anticipo'),
							BODEGA = '{$bodega}'
							WHERE IDOBRA_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function estadoEnBodegaSolicitudMaterialesPed($id,$folio,$bodega){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'En bodega' AND TIPO_SOLICITUD = 'Pedido'),
							BODEGA = '{$bodega}'
							WHERE IDOBRA_OT_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function infoMaterialesEntrega($idOtCub){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT O.IDOBRA 'OE', O.TIPO 'TIPO_OE', A.COMUNA, O.NOMBREOE 'ORDEN_MANDANTE', O.GESTOR 'GESTOR_MANDANTE', O.DIRECCION 'DIRECCION_CLIENTE', OO.IDOBRA_OT 'OT', O.PEP2 'PE',
						initCap(CONCAT_WS('/', U.NOMBRE, S.NOMBRE_SUBCONTRATO)) 'BRIGADA', O.CLIENTE
						FROM OBRA_OT_CUBICACION OOC
						LEFT JOIN OBRA_OT OO
						ON OOC.IDOBRA_OT = OO.IDOBRA_OT
						LEFT JOIN OBRA O
						ON OO.IDOBRA = O.IDOBRA
						LEFT JOIN AREAFUNCIONAL A
						ON O.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
						LEFT JOIN SUBCONTRATISTAS S
						ON OO.IDEMPRESA_EECC = S.IDSUBCONTRATO
						LEFT JOIN USUARIO U
						ON OO.IDGESTOR_EECC = U.IDUSUARIO
						WHERE OOC.IDOBRA_OT_CUBICACION = '{$idOtCub}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function ingresoMaterialEntrega($guiaDespacho,$observ){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "CALL INGRESA_MAT_ENTREGA('{$guiaDespacho}','{$observ}')";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function updateObrasSolMat($id,$folio,$idEntrega){
    $con = conectar();
    $con->query("START TRANSACTION");
    if($con != 'No conectado'){
      $sql = "UPDATE OBRA_SOL_MAT
							SET IDOBRA_SOL_MAT_ESTADO = (SELECT IDOBRA_SOL_MAT_ESTADO FROM OBRA_SOL_MAT_ESTADO WHERE ESTADO_ASOCIADO = 'Entregado' AND TIPO_SOLICITUD = 'Pedido'),
							IDMATERIALES_ENTREGA = '{$idEntrega}'
							WHERE IDOBRA_OT_CUBICACION = '{$id}' AND IDSOLICITUD_MATERIAL = '{$folio}'";
      if ($con->query($sql)) {
        $con->query("COMMIT");
        return "Ok";
      }
      else{
        // return $con->error;
        $con->query("ROLLBACK");
        return "Error";
      }
    }
    else{
      $con->query("ROLLBACK");
      return "Error";
    }
}

function actualizarMaterialEntrega($idEntrega,$pdfEntrega,$rutPersEntrega,$nombrePersEntrega){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE MATERIALES_ENTREGA
						SET PDF_ENTREGA = '{$pdfEntrega}', CONTADOR_PDF_ENTREGA = 1, RUT_PERS_ENTREGADA = '{$rutPersEntrega}', NOMBRE_PERS_ENTREGADA = '{$nombrePersEntrega}'
						WHERE IDMATERIALES_ENTREGA = '{$idEntrega}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function estadosMaterialesEnAnticipo($folio){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT OSLE.IDOBRA_SOL_MAT_ESTADO
						FROM OBRA_SOL_MAT OSL
						INNER JOIN OBRA_CUBICACION OC
						ON OSL.IDOBRA_CUBICACION = OC.IDOBRA_CUBICACION
						LEFT JOIN OBRA_UO OU
						ON OC.CODUO = OU.CODUO
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSLE
						ON OSL.IDOBRA_SOL_MAT_ESTADO = OSLE.IDOBRA_SOL_MAT_ESTADO
						WHERE OSL.IDSOLICITUD_MATERIAL = '{$folio}'
						GROUP BY OSLE.ESTADO_ASOCIADO, OSLE.VALOR
						ORDER BY OSLE.VALOR DESC";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function actualizaEstadoAnticipo($folio, $cantidad, $idHijo){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "UPDATE MATERIALES_SOLICITUD
						SET IDMATERIALES_SOLICITUD_ESTADO =
						(
						SELECT IDMATERIALES_SOLICITUD_ESTADO
						FROM MATERIALES_SOLICITUD_ESTADO
						WHERE IDESTADO_HIJO = '{$idHijo}'
						AND CANTIDAD = '{$cantidad}'
						)
						WHERE IDSOLICITUD_MATERIAL = '{$folio}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	}
	else{
		$con->query("ROLLBACK");
		return "Error";
	}
}

function estadosMaterialesEnPedido($folio){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "SELECT OSLE.IDOBRA_SOL_MAT_ESTADO
						FROM OBRA_SOL_MAT OSL
						INNER JOIN OBRA_OT_CUBICACION OOC
						ON OSL.IDOBRA_OT_CUBICACION = OOC.IDOBRA_OT_CUBICACION
						LEFT JOIN OBRA_CUBICACION OC
						ON OOC.IDOBRA_CUBICACION = OC.IDOBRA_CUBICACION
						LEFT JOIN OBRA_UO OU
						ON OC.CODUO = OU.CODUO
						LEFT JOIN OBRA_SOL_MAT_ESTADO OSLE
						ON OSL.IDOBRA_SOL_MAT_ESTADO = OSLE.IDOBRA_SOL_MAT_ESTADO
						WHERE OSL.IDSOLICITUD_MATERIAL = '{$folio}'
						GROUP BY OSLE.ESTADO_ASOCIADO, OSLE.VALOR
						ORDER BY OSLE.VALOR DESC";
		if ($row = $con->query($sql)){
			$con->query("COMMIT");
			while($array = $row->fetch_assoc()){
		$return[] = $array;
		}
		return $return;
		} else {
			// return $con->error;
			$con->query("ROLLBACK");
			return "Error";
		}
	} else {
		$con->query("ROLLBACK");
		return "Error";
	}
}

function bodegasAnticipoForPedido($id){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT OSM.BODEGA
						FROM OBRA_SOL_MAT OSM
						WHERE OSM.IDOBRA_CUBICACION = (
							SELECT OC.IDOBRA_CUBICACION
							FROM OBRA_SOL_MAT OSM
							LEFT JOIN OBRA_OT_CUBICACION OOC
							ON OSM.IDOBRA_OT_CUBICACION = OOC.IDOBRA_OT_CUBICACION
							LEFT JOIN OBRA_CUBICACION OC
							ON OOC.IDOBRA_CUBICACION = OC.IDOBRA_CUBICACION
							WHERE OSM.IDOBRA_OT_CUBICACION = '{$id}'
						)";
		if ($row = $con->query($sql)) {

			$array = $row->fetch_array(MYSQLI_BOTH);

			return $array;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function consultaDatosPdfEntrega($idEntrega){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT PDF_ENTREGA, PDF_GUIA_DESPACHO, CONTADOR_PDF_ENTREGA
						FROM MATERIALES_ENTREGA
						WHERE IDMATERIALES_ENTREGA = '{$idEntrega}'";
		if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
		}
		else{
			return "Error";
		}
	}
	else{
		return "Error";
	}
}

function actualizaPDFEntregaMaterial($idEntrega,$docPDFEntrega,$docPDFGuiaEntrega,$contadorPdfEntrega){
	$con = conectar();
	$con->query("START TRANSACTION");
	if($con != 'No conectado'){
		$sql = "UPDATE MATERIALES_ENTREGA
						SET PDF_ENTREGA = '{$docPDFEntrega}', PDF_GUIA_DESPACHO = '{$docPDFGuiaEntrega}', CONTADOR_PDF_ENTREGA = '{$contadorPdfEntrega}'
						WHERE IDMATERIALES_ENTREGA = '{$idEntrega}'";
		if ($con->query($sql)) {
			$con->query("COMMIT");
			return "Ok";
		}
		else{
			$con->query("ROLLBACK");
      return "Error";
		}
	}
	else{
    $con->query("ROLLBACK");
  }
}

function consultaSociedadSelect(){
	$con = conectar();
	if($con != 'No conectado'){
		$sql = "SELECT CONCAT_WS(' - ', RUT, NOMBRE_SUBCONTRATO) 'SOCIEDAD', IDSUBCONTRATO 'IDSOCIEDAD'
						FROM SUBCONTRATISTAS";
		if ($row = $con->query($sql)){
			while($array = $row->fetch_array(MYSQLI_BOTH)){
				$return[] = $array;
			}
			return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaConsumosMesAno($mes, $ano, $tarjeta){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S, FECHA, HORA, PATENTE, COMUNA_E_S 'COMUNA', DIRECCION_ES 'DIRECCION', COMPROBANTE_TRANSACCION 'COMPROBANTE', RUT_CONDUCTOR 'RUT',
							PRECIO_UNIT 'PRECIO', VOL_LTRS 'VOLUMEN', MONTO_TRANS 'TOTAL'
							FROM PATENTE_CONSUMO C
							WHERE C.MES = '{$mes}'
							AND C.ANO = '{$ano}'
							AND LEFT(C.TARJETA,8) = '{$tarjeta}'";
			if ($row = $con->query($sql)){
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaPeriodosConsumoTarjeta(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT CONCAT_WS('-',ANO,
								CASE WHEN MES < 10 THEN CONCAT('0',MES) ELSE MES END
								) 'PERIODO'
								FROM PATENTE_CONSUMO
								GROUP BY ANO, MES
								ORDER BY ANO DESC, MES DESC";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
					}
					else{
						return "Error";
					}
				}
				else{
					return "Error";
				}
			}

		function consultaAbonosTarjeta($mes, $ano, $tarjeta){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S, FECHA, HORA, PATENTE, TRANSAC 'COMPROBANTE', TIPO, CARGOS 'MONTO', USR_CREA 'USUARIO_CARGA'
								FROM PATENTE_ABONO
								WHERE MES = '{$mes}'
								AND ANO = '{$ano}'
								AND TARJETA = '{$tarjeta}'";
				if ($row = $con->query($sql)){
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
					}
					else{
						return "Error";
					}
				}
				else{
					return "Error";
				}
			}

			function consultaComunasConRegion(){
				$con = conectar();
				if($con != 'No conectado'){
					$sql = "SELECT A.IDAREAFUNCIONAL, CONCAT_WS(', ', A.COMUNA, CONCAT('Región ', REPLACE(A.REGION, 'De', 'de')), P.NOMBRE) 'COMUNA'
									FROM AREAFUNCIONAL A
									LEFT JOIN PAIS P
									ON A.IDPAIS = P.IDPAIS";
					if ($row = $con->query($sql)){
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
						}
						else{
							return "Error";
						}
					}
					else{
						return "Error";
					}
				}

				function consultaTiposProveedores(){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "SELECT C.IDCOMPRAS_TIPO, C.TIPO
										FROM COMPRAS_TIPO C";
						if ($row = $con->query($sql)){
							while($array = $row->fetch_array(MYSQLI_BOTH)){
								$return[] = $array;
							}
							return $return;
						}
						else{
							return "Error";
						}
					}
					else{
						return "Error";
					}
				}


				function consultaMantGestionDim1(){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "SELECT G.IDCOMPRAS_GESTION_DIM1, G.NOMBRE 'ACTIVIDAD'
										FROM COMPRAS_GESTION_DIM1 G";
						if ($row = $con->query($sql)){
							while($array = $row->fetch_array(MYSQLI_BOTH)){
								$return[] = $array;
							}
							return $return;
						}
						else{
							return "Error";
						}
					}
					else{
						return "Error";
					}
				}

				function eliminarComprasProveedorTipo($idcompras_proveedor){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "DELETE FROM COMPRAS_PROVEEDOR_TIPO
										WHERE IDCOMPRAS_PROVEEDOR = '{$idcompras_proveedor}'";
						if($con->query($sql)){
								$con->query("COMMIT");
								return "Ok";
						}
						else{
								$con->query("ROLLBACK");
								// return $con->error;
								return "Error";
						}
					}
					else{
							$con->query("ROLLBACK");
							return "Error";
					}
				}

				function eliminarComprasProveedorSociedad($idcompras_proveedor){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "DELETE FROM COMPRAS_PROVEEDOR_SUBCONTRATISTAS
										WHERE IDCOMPRAS_PROVEEDOR = '{$idcompras_proveedor}'";
						if($con->query($sql)){
								$con->query("COMMIT");
								return "Ok";
						}
						else{
								$con->query("ROLLBACK");
								// return $con->error;
								return "Error";
						}
					}
					else{
							$con->query("ROLLBACK");
							return "Error";
					}
				}

				function eliminarComprasProveedorComuna($idcompras_proveedor){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "DELETE FROM COMPRAS_PROVEEDOR_AREAFUNCIONAL
										WHERE IDCOMPRAS_PROVEEDOR = '{$idcompras_proveedor}'";
						if($con->query($sql)){
								$con->query("COMMIT");
								return "Ok";
						}
						else{
								$con->query("ROLLBACK");
								// return $con->error;
								return "Error";
						}
					}
					else{
							$con->query("ROLLBACK");
							return "Error";
					}
				}

				function eliminarComprasProveedorActividad($idcompras_proveedor){
					$con = conectar();
					if($con != 'No conectado'){
						$sql = "DELETE FROM COMPRAS_PROVEEDOR_GDIM1
										WHERE IDCOMPRAS_PROVEEDOR = '{$idcompras_proveedor}'";
						if($con->query($sql)){
								$con->query("COMMIT");
								return "Ok";
						}
						else{
								$con->query("ROLLBACK");
								// return $con->error;
								return "Error";
						}
					}
					else{
							$con->query("ROLLBACK");
							return "Error";
					}
				}

		function ingresarProveedorCompraTipo($pIDCOMPRAS_PROVEEDOR,	$pIDCOMPRAS_TIPO) {
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL INGRESAR_PROVEEDOR_COMPRAS_TIPO('{$pIDCOMPRAS_PROVEEDOR}',	'{$pIDCOMPRAS_TIPO}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarProveedorCompraSociedad($pIDCOMPRAS_PROVEEDOR,	$pIDCOMPRAS_SOCIEDAD) {
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL INGRESAR_PROVEEDOR_COMPRAS_SOCIEDAD('{$pIDCOMPRAS_PROVEEDOR}',	'{$pIDCOMPRAS_SOCIEDAD}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarProveedorCompraComuna($pIDCOMPRAS_PROVEEDOR,	$pIDCOMPRAS_COMUNA) {
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL INGRESAR_PROVEEDOR_COMPRAS_COMUNA('{$pIDCOMPRAS_PROVEEDOR}',	'{$pIDCOMPRAS_COMUNA}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarProveedorCompraGDIM1($pIDCOMPRAS_PROVEEDOR,	$pIDCOMPRAS_GDIM1) {
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL INGRESAR_PROVEEDOR_COMPRAS_GDIM1('{$pIDCOMPRAS_PROVEEDOR}',	'{$pIDCOMPRAS_GDIM1}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function listadoComprasProveedoresCambio($idProveedor) {
		  $con = conectar();
			if($con != 'No conectado') {
				$sql = "CALL LISTADO_COMPRAS_PROVEEDORES_CAMBIO('{$idProveedor}')";
				if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
				} else{
					return "Error";
				}
			} else{
				return "Error";
			}
		}

		function listadoComprasProveedoresCambioMulti($idProveedor) {
		  $con = conectar();
			if($con != 'No conectado') {
				$sql = "SELECT '' S, C.IDCOMPRAS_PROVEEDOR, C.RUT, initCap(C.NOMBRE) 'NOMBRE',
								initCap(C.DIRECCION) 'DIRECCION',
								CASE WHEN (C.NEX_ACR IS NOT NULL AND C.NEX_ACR <> 'null') OR (C.NEX_PREC IS NOT NULL AND C.NEX_PREC <> 'null') OR (C.NEX_PREA IS NOT NULL AND C.NEX_PREA <> 'null')
								THEN
									'<span class=''fas fa-check-circle'' style=''color: green;''></span>'
								ELSE
									CASE WHEN GROUP_CONCAT(DISTINCT initCap(CT.TIPO)) LIKE '%Bienes%' THEN
										' <span class=''fas fa-minus-circle'' style=''color: blue;''></span>'
									ELSE
										'  <span class=''fas fa-times-circle'' style=''color: red;''></span>'
									END
								END
							 'ACREDITADO',
								CASE WHEN C.CONTRATO = 1 THEN 'Si' ELSE CASE WHEN C.CONTRATO = 9 THEN '-' ELSE 'No' END END 'CONTRATO',
								CASE WHEN SP.NOMBRE = 'Sin seleccionar' THEN '-' ELSE SP.NOMBRE END  'BLOQUEO_SAP',
								C.F_INICIO_CONTRATO, C.F_FIN_CONTRATO,
								initCap(C.CONTACTO) 'CONTACTO', LOWER(C.EMAIL_CONTACTO) 'EMAIL_CONTACTO', C.FONO_CONTACTO, C.CUENTA_SAP 'BP',
								CP.NOMBRE 'CONDICION_PAGO',
								CASE WHEN MP.MONEDA = 'Sin seleccionar' THEN '-' ELSE MP.MONEDA END 'MONEDA',
								GROUP_CONCAT(DISTINCT CONCAT(A.COMUNA,', ',A.REGION,', ', PS.NOMBRE) SEPARATOR '<br>') 'COMUNA_MAPA',
								GROUP_CONCAT(DISTINCT REPLACE(A.REGION, 'De ', '')  SEPARATOR '<br>')'REGION_MAPA',
								GROUP_CONCAT(DISTINCT SU.NOMBRE_SUBCONTRATO SEPARATOR '<br>') 'SOCIEDAD',
								GROUP_CONCAT(DISTINCT LEFT(SU.NOMBRE_SUBCONTRATO,4) SEPARATOR '<br>') 'SOCIEDAD_COMPACTO',
								GROUP_CONCAT(DISTINCT initCap(GD1.NOMBRE) SEPARATOR '<br>') 'ACTIVIDAD',
								GROUP_CONCAT(DISTINCT initCap(CT.TIPO) SEPARATOR '<br>') 'TIPO', C.IDMONEDA_PAGO,
								GROUP_CONCAT(DISTINCT PU.IDSUBCONTRATISTAS) 'IDSOCIEDADES',
								GROUP_CONCAT(DISTINCT A.IDAREAFUNCIONAL) 'IDCOMUNAS',
								GROUP_CONCAT(DISTINCT CT.IDCOMPRAS_TIPO) 'IDTIPOS',
								GROUP_CONCAT(DISTINCT GD1.IDCOMPRAS_GESTION_DIM1) 'IDACTIVIDAD',
								C.FECHA_INGRESO, C.FECHA_ACTUALIZACION, UM.NOMBRE 'USUARIO_MODIFICA',
								initCap(CONCAT(PAS.NOMBRES, ' ', PAS.APELLIDOS)) 'COMPRADOR_ASIGNADO',
								C.COMPRADOR_ASIGNADO 'RUT_COMPRADOR_ASIGNADO', C.FECHA_SOLICITUD,
								(
									CASE WHEN C.CUENTA_SAP IS NULL OR C.CUENTA_SAP = '' THEN 0 ELSE 15 END +
									CASE WHEN C.CONTACTO IS NULL OR C.CONTACTO = '' THEN 0 ELSE 5 END +
									CASE WHEN C.EMAIL_CONTACTO IS NULL OR C.EMAIL_CONTACTO = '' THEN 0 ELSE 5 END +
									CASE WHEN C.FONO_CONTACTO IS NULL OR C.FONO_CONTACTO = '' THEN 0 ELSE 5 END  +
									CASE WHEN C.DIRECCION IS NULL OR C.DIRECCION = '' THEN 0 ELSE 5 END  +
									CASE WHEN GROUP_CONCAT(DISTINCT CONCAT(A.COMUNA,', ',A.REGION,', ', PS.NOMBRE) SEPARATOR '<br>') IS NULL OR GROUP_CONCAT(DISTINCT CONCAT(A.COMUNA,', ',A.REGION,', ', PS.NOMBRE) SEPARATOR '<br>') = '' THEN 0 ELSE 25 END  +
									CASE WHEN GROUP_CONCAT(DISTINCT SU.NOMBRE_SUBCONTRATO SEPARATOR '<br>') IS NULL OR GROUP_CONCAT(DISTINCT SU.NOMBRE_SUBCONTRATO SEPARATOR '<br>') = '' THEN 0 ELSE 5 END  +
									CASE WHEN GROUP_CONCAT(DISTINCT initCap(GD1.NOMBRE) SEPARATOR '<br>') IS NULL OR GROUP_CONCAT(DISTINCT initCap(GD1.NOMBRE) SEPARATOR '<br>') = '' THEN 0 ELSE 25 END  +
									CASE WHEN GROUP_CONCAT(DISTINCT initCap(CT.TIPO) SEPARATOR '<br>') IS NULL OR GROUP_CONCAT(DISTINCT initCap(CT.TIPO) SEPARATOR '<br>') = '' THEN 0 ELSE 10 END
								) 'AVANCE',
								CASE WHEN C.CRITICO IS NULL OR C.CRITICO = '9' THEN '-' ELSE CASE WHEN C.CRITICO = '0' THEN 'No' ELSE 'Si' END END 'CRITICO',
								C.NEX_ACR, C.NEX_PREA, C.NEX_PREC,
								UE.NOMBRE 'USUARIO_EVALUADOR',
								CONCAT('Plazo: ',
								CASE WHEN EH.PLAZO IS NULL THEN '0' ELSE EH.PLAZO END
								,'% / ', 'Calidad: ',
								CASE WHEN EH.CALIDAD IS NULL THEN '0' ELSE EH.CALIDAD END
								,'% / ', 'Ponderado: ',
								CASE WHEN (EH.PLAZO*0.5 + EH.CALIDAD*0.5) IS NULL THEN '0' ELSE (EH.PLAZO*0.5 + EH.CALIDAD*0.5) END
								,'%') 'EVALUACION',
								CASE WHEN EH.PLAZO IS NOT NULL THEN 'SI' ELSE CASE WHEN C.USUARIO_EVALUADOR IS NULL OR C.USUARIO_EVALUADOR = '' THEN 'NA' ELSE 'NO' END END 'EVALUADO',
								CASE WHEN (EH.PLAZO*0.5 + EH.CALIDAD*0.5) IS NOT NULL
								THEN
									CASE WHEN (EH.PLAZO*0.5 + EH.CALIDAD*0.5) >= 70 THEN 'A' ELSE
									CASE WHEN (EH.PLAZO*0.5 + EH.CALIDAD*0.5) >= 50 THEN 'B' ELSE 'C' END
									END
								ELSE
									'-'
								END 'CATEGORIA'
								FROM COMPRAS_PROVEEDOR C
								LEFT JOIN COMPRAS_PROVEEDOR_AREAFUNCIONAL PA
								ON C.IDCOMPRAS_PROVEEDOR = PA.IDCOMPRAS_PROVEEDOR
								LEFT JOIN AREAFUNCIONAL A
								ON PA.IDAREAFUNCIONAL = A.IDAREAFUNCIONAL
								LEFT JOIN ZONA Z
								ON A.IDZONA = Z.IDZONA
								LEFT JOIN PAIS PS
								ON A.IDPAIS = PS.IDPAIS
								LEFT JOIN COMPRAS_PROVEEDOR_SUBCONTRATISTAS PU
								ON C.IDCOMPRAS_PROVEEDOR = PU.IDCOMPRAS_PROVEEDOR
								LEFT JOIN SUBCONTRATISTAS SU
								ON PU.IDSUBCONTRATISTAS = SU.IDSUBCONTRATO
								LEFT JOIN COMPRAS_PROVEEDOR_TIPO PT
								ON C.IDCOMPRAS_PROVEEDOR = PT.IDCOMPRAS_PROVEEDOR
								LEFT JOIN COMPRAS_TIPO CT
								ON PT.IDCOMPRAS_TIPO = CT.IDCOMPRAS_TIPO
								LEFT JOIN COMPRAS_PROVEEDOR_GDIM1 PGD1
								ON C.IDCOMPRAS_PROVEEDOR = PGD1.IDCOMPRAS_PROVEEDOR
								LEFT JOIN COMPRAS_GESTION_DIM1 GD1
								ON PGD1.IDCOMPRAS_GESTION_DIM1 = GD1.IDCOMPRAS_GESTION_DIM1
								LEFT JOIN MONEDA_PAGO MP
								ON C.IDMONEDA_PAGO = MP.IDMONEDA_PAGO
								LEFT JOIN USUARIO UM
								ON C.USUARIO_MODIFICA = UM.IDUSUARIO
								LEFT JOIN PERSONAL PAS
								ON C.COMPRADOR_ASIGNADO = PAS.DNI
								LEFT JOIN COMPRAS_PROVEEDOR_CPAGO CP
								ON C.CONDICION_PAGO = CP.NOMBRE
								LEFT JOIN COMPRAS_PROVEEDOR_NEXCEL NX
								ON C.ACREDITADO = NX.IDCOMPRAS_PROVEEDOR_NEXCEL
								LEFT JOIN COMPRAS_PROVEEDOR_SAP SP
								ON C.BLOQUEO_SAP = SP.IDCOMPRAS_PROVEEDOR_SAP
								LEFT JOIN USUARIO UE
								ON C.USUARIO_EVALUADOR = UE.RUT
								LEFT JOIN COMPRAS_PROVEEDOR_EVAL_HISTORIAL EH
								ON C.IDCOMPRAS_PROVEEDOR = EH.IDPROVEEDOR
								LEFT JOIN COMPRAS_PROVEEDOR_EVAL_HISTORIAL_PERIODO EHP
								ON EH.PERIODO = EHP.PERIODO
								AND EHP.ESTADO = 1
								WHERE C.IDCOMPRAS_PROVEEDOR IN
								(
									{$idProveedor}
								)
								GROUP BY C.IDCOMPRAS_PROVEEDOR, C.RUT, initCap(C.NOMBRE),
								initCap(C.DIRECCION),
								CASE WHEN C.ACREDITADO = 1 THEN 'Si' ELSE CASE WHEN C.ACREDITADO = 9 THEN '-' ELSE 'No' END END,
								CASE WHEN C.CONTRATO = 1 THEN 'Si' ELSE CASE WHEN C.CONTRATO = 9 THEN '-' ELSE 'No' END END,
								CASE WHEN C.BLOQUEO_SAP = 1 THEN 'Si' ELSE CASE WHEN C.BLOQUEO_SAP = 9 THEN '-' ELSE 'No' END END,
								C.F_INICIO_CONTRATO, C.F_FIN_CONTRATO,
								initCap(C.CONTACTO), LOWER(C.EMAIL_CONTACTO),
								C.FONO_CONTACTO, C.CUENTA_SAP, C.CONDICION_PAGO,
								CASE WHEN MP.MONEDA = 'Sin seleccionar' THEN '-' ELSE MP.MONEDA END,
								C.FECHA_INGRESO, C.FECHA_ACTUALIZACION, UM.NOMBRE, initCap(CONCAT(PAS.NOMBRES, ' ', PAS.APELLIDOS)),
								C.COMPRADOR_ASIGNADO, C.FECHA_SOLICITUD";
				if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}
					return $return;
				} else{
					return "Error";
				}
			} else{
				return "Error";
			}
		}

	function ingresarMantProveedor($pIDMONEDA_PAGO,	$pRUT,	$pNOMBRE,	$pDIRECCION,	$pCONTACTO,	$pEMAIL_CONTACTO,	$pFONO_CONTACTO,	$pCUENTA_SAP,	$pCONDICION_PAGO,	$pACREDITADO,	$pCONTRATO,	$pF_INICIO_CONTRATO,	$pF_FIN_CONTRATO,	$pBLOQUEO_SAP, $rutUser, $rutComprador, $fechaSolicitud, $critico) {
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL INGRESAR_PROVEEDOR_COMPRA('{$pIDMONEDA_PAGO}',	'{$pRUT}',	'{$pNOMBRE}',	'{$pDIRECCION}',	'{$pCONTACTO}',	'{$pEMAIL_CONTACTO}',	'{$pFONO_CONTACTO}',	'{$pCUENTA_SAP}',	'{$pCONDICION_PAGO}',	'{$pACREDITADO}',	'{$pCONTRATO}',	'{$pF_INICIO_CONTRATO}',	'{$pF_FIN_CONTRATO}',	'{$pBLOQUEO_SAP}',	'{$rutUser}', '{$rutComprador}','{$fechaSolicitud}','{$critico}')";
			if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else{
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaCompradorAsignable(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT U.IDUSUARIO, U.RUT, U.NOMBRE, P.NOMBRE 'PERFIL'
							FROM USUARIO U
							LEFT JOIN PERFIL P
							ON U.IDPERFIL = P.IDPERFIL
							WHERE P.NOMBRE IN
							(
								'Comprador',
								'Administrador Compradores'
							)";
			if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function actualizaCompradorAsignadoProveedor($pArray, $comprador, $rutUser){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE COMPRAS_PROVEEDOR
							SET COMPRADOR_ASIGNADO = '{$comprador}',
							USUARIO_MODIFICA = (SELECT IDUSUARIO FROM USUARIO WHERE RUT = '{$rutUser}'),
							FECHA_ACTUALIZACION = NOW()
							WHERE IDCOMPRAS_PROVEEDOR IN (" . $pArray . ")";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaDatosTallerMantencionTodas(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT pt.RUT, pt.NOMBRE, pt.IDPATENTE_TALLER, pt.DIRECCION
					FROM PATENTE_TALLER pt
					LEFT JOIN SUCURSAL s
					ON pt.IDAREAFUNCIONAL = s.IDAREAFUNCIONAL";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosCargosTI(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_TI_CARGOS()";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosCargosTITipo(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDTI_CARGOS_TIPO, TIPO
							FROM TI_CARGOS_TIPO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosCargosTIMarca($tipo){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT MARCA
							FROM TI_CARGOS_MARCA
							WHERE IDTI_CARGOS_TIPO = '{$tipo}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosCargosTIModelo($marca, $tipo){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDTI_CARGOS_MARCA, MODELO
							FROM TI_CARGOS_MARCA
							WHERE MARCA = '{$marca}'
							AND IDTI_CARGOS_TIPO = '{$tipo}'
							";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresarCargoTI($serie, $tipo, $marca, $valorRef, $fechaIng, $caracteristicas, $imgQR, $imei, $estado, $linea){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL INGRESAR_CARGO_TI('{$serie}', '{$tipo}', '{$marca}', '{$valorRef}', '{$fechaIng}', '{$caracteristicas}', '{$imgQR}', '{$imei}', '{$estado}', '{$linea}')";
			if ($row = $con->query($sql)) {
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosCargosTICambio($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_TI_CARGOS_CAMBIO('{$id}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function imagenQRCargo($folio){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql =	"SELECT QR
							FROM TI_CARGOS
							WHERE IDTI_CARGOS = '{$folio}'";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizarCargoTI($folio, $serie, $tipo, $marca, $valorRef, $fechaIng, $caracteristicas, $imgQR, $imei, $estado, $linea){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL ACTUALIZAR_CARGO_TI('{$serie}', '{$tipo}', '{$marca}', '{$valorRef}', '{$fechaIng}', '{$caracteristicas}', '{$imgQR}', '{$imei}', '{$folio}', '{$estado}', '{$linea}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function eliminarCargoTI($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "DELETE
							FROM TI_CARGOS
							WHERE IDTI_CARGOS = '{$id}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaAsignacionesCargos(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_ASIGNACION_CARGOS()";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDetallesAsignacionCargo($folio){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_TI_CARGOS_ASIGNACION($folio)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaSeriesCargosTIDisponibles($idTipo){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT SERIE, IDTI_CARGOS 'ID'
							FROM TI_CARGOS
							WHERE ESTADO  = 'Disponible'
							AND IDTI_CARGOS_TIPO = '{$idTipo}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaDatosPersonalAsignarCargo(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT
							P.IDPERSONAL, P.DNI, (CONCAT_WS(' ',P.NOMBRES, P.APELLIDOS)) 'NOMBRE',
							P.CARGO,
							CONCAT(LEFT(O.NOMENCLATURA,13), ' - ', O.NOMBRE) 'CECO',
							S.NOMBRE_SUBCONTRATO 'SOCIEDAD', U.SUCURSAL
							FROM PERSONAL P
							LEFT JOIN ACT A
							ON P.IDPERSONAL = A.IDPERSONAL
							LEFT JOIN ESTRUCTURA_OPERACION O
							ON A.IDESTRUCTURA_OPERACION = O.IDESTRUCTURA_OPERACION
							LEFT JOIN SUBCONTRATISTAS S
							ON O.IDSUBCONTRATO = S.IDSUBCONTRATO
							LEFT JOIN PERSONAL_ESTADO PE
							ON P.IDPERSONAL = PE.IDPERSONAL
							LEFT JOIN SUCURSAL U
							ON A.IDSUCURSAL = U.IDSUCURSAL
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
							OR PE.FECHA_TERMINO IS NULL)
							AND PE.FECHA_INICIO =
							(
								SELECT MAX(EE.FECHA_INICIO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
							ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
							WHERE ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
							AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
							OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function ingresarAsignacionCargo($pIDPERSONAL, $pOBSERVACION, $pRUT_ASIGNA){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "CALL INGRESA_CARGO_ASIGNACION('{$pIDPERSONAL}','{$pOBSERVACION}','{$pRUT_ASIGNA}')";
			if ($row = $con->query($sql)){
				$con->query("COMMIT");
				while($array = $row->fetch_assoc()){
				$return[] = $array;
			}
			return $return;
			} else {
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function ingresarAsignacionCargoElemento($IDTI_CARGOS_ASIGNACION, $IDTI_CARGOS, $ESTADO){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "INSERT INTO TI_CARGOS_ASIGNACION_ELEMENTOS(IDTI_CARGOS_ASIGNACION, IDTI_CARGOS, ESTADO)
							VALUES('{$IDTI_CARGOS_ASIGNACION}','{$IDTI_CARGOS}','{$ESTADO}')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return $sql;
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizaEstadoTICargo($IDTI_CARGOS, $ESTADO){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE TI_CARGOS
							SET ESTADO = '{$ESTADO}'
							WHERE IDTI_CARGOS = '{$IDTI_CARGOS}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return $sql;
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaAsignacionesCargosCambio($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_ASIGNACION_CARGOS_CAMBIO('{$id}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function datosPDFCargosTI($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT T.IDPERSONAL, P.DNI,initCap(CONCAT_WS(' ' ,P.NOMBRES, P.APELLIDOS)) 'NOMBRE', P.CARGO,
							S.NOMBRE_SUBCONTRATO 'SOCIEDAD', S.RUT 'RUT_SOCIEDAD', E.NOMENCLATURA 'CECO', E.NOMBRE 'NOMBRE_PROYECTO'
							FROM TI_CARGOS_ASIGNACION T
							LEFT JOIN ACT A
							ON T.IDPERSONAL = A.IDPERSONAL
							LEFT JOIN ESTRUCTURA_OPERACION E
							ON A.IDESTRUCTURA_OPERACION = E.IDESTRUCTURA_OPERACION
							LEFT JOIN SUBCONTRATISTAS S
							ON E.IDSUBCONTRATO = S.IDSUBCONTRATO
							LEFT JOIN PERSONAL P
							ON T.IDPERSONAL = P.IDPERSONAL
							WHERE IDTI_CARGOS_ASIGNACION = '{$id}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function datosPDFCargosAsignados($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT C.SERIE, C.IMEI, C.LINEA, I.TIPO, M.MARCA, M.MODELO, C.VALOR_REFERENCIAL
							FROM TI_CARGOS_ASIGNACION_ELEMENTOS T
							LEFT JOIN TI_CARGOS C
							ON T.IDTI_CARGOS = C.IDTI_CARGOS
							LEFT JOIN TI_CARGOS_TIPO I
							ON C.IDTI_CARGOS_TIPO = I.IDTI_CARGOS_TIPO
							LEFT JOIN TI_CARGOS_MARCA M
							ON C.IDTI_CARTOS_MARCA = M.IDTI_CARGOS_MARCA
							WHERE T.IDTI_CARGOS_ASIGNACION = '{$id}'
							AND T.ESTADO = 1 ";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function actualizaPDFCargoTI($id, $pdf){
		$con = conectar();
		if ($con != 'No conectado') {
				$sql = "UPDATE TI_CARGOS_ASIGNACION
								SET PDF = '{$pdf}'
								WHERE IDTI_CARGOS_ASIGNACION = '{$id}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
	    }
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
	}

	function datosHistorialCriticoProveedor($id){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S, IDCOMPRAS_PROVEEDOR_CRITICO_HISTORIAL 'FOLIO', initCap(U.NOMBRE) 'USUARIO',
			CASE WHEN C.CRITICO = 1 THEN 'Si'
			ELSE
			CASE WHEN C.CRITICO = 0 THEN 'No' ELSE '-' END
			END 'CRITICO',
			DATE_FORMAT(FECHA, '%Y-%m-%d') 'FECHA',
			DATE_FORMAT(FECHA, '%H:%i:%s') 'HORA',
			C.PERFIL
			FROM COMPRAS_PROVEEDOR_CRITICO_HISTORIAL C
			LEFT JOIN USUARIO U
			ON C.IDUSUARIO = U.IDUSUARIO
			WHERE C.IDPROVEEDOR = '{$id}'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function chequeaUsuarioEmail($rutUsuario){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDUSUARIO, EMAIL
	FROM USUARIO
	WHERE RUT = '" . $rutUsuario . "'";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

	function periodoEvalProveedores($folio){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT C.PERIODO, H.PLAZO, H.CALIDAD,
								(H.PLAZO*0.5 + H.CALIDAD*0.5) 'PONDERADO',
								U.NOMBRE 'EVALUADOR'
								FROM COMPRAS_PROVEEDOR_EVAL_HISTORIAL_PERIODO C
								LEFT JOIN COMPRAS_PROVEEDOR_EVAL_HISTORIAL H
								ON C.PERIODO = H.PERIODO
								AND H.IDPROVEEDOR = '{$folio}'
								LEFT JOIN USUARIO U
								ON H.IDUSUARIO = U.IDUSUARIO
								WHERE C.ESTADO = 1";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function periodoEvalProveedoresHistorico($folio){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S,
								H.IDCOMPRAS_PROVEEDOR_EVAL_HISTORIAL 'FOLIO',
								U.NOMBRE 'USUARIO',
								H.PERFIL,
								H.PLAZO,
								H.CALIDAD,
								CAST((H.PLAZO*0.5 + H.CALIDAD*0.5) AS UNSIGNED) 'PONDERADO',
								C.PERIODO,
								DATE_FORMAT(H.FECHA,'%Y-%m-%d') 'FECHA',
								DATE_FORMAT(H.FECHA,'%h:%i:%s') 'HORA'
								FROM COMPRAS_PROVEEDOR_EVAL_HISTORIAL_PERIODO C
								LEFT JOIN COMPRAS_PROVEEDOR_EVAL_HISTORIAL H
								ON C.PERIODO = H.PERIODO
								AND H.IDPROVEEDOR = '{$folio}'
								LEFT JOIN USUARIO U
								ON H.IDUSUARIO = U.IDUSUARIO
								WHERE H.IDPROVEEDOR IS NOT NULL
								ORDER BY C.PERIODO DESC";
				if ($row = $con->query($sql)) {
					$return = array();
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function editarMantProveedoresEval($pIDCOMPRAS_PROVEEDOR,	$rutUser, $plazo, $calidad, $periodo) {
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL EDITAR_PROVEEDOR_COMPRA_EVAL('{$pIDCOMPRAS_PROVEEDOR}', '{$rutUser}',	'{$plazo}', '{$calidad}', '{$periodo}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function usuarioEvaluadorCheck($folio, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT CASE WHEN C.USUARIO_EVALUADOR IS NOT NULL AND C.USUARIO_EVALUADOR <> '' THEN 'SI' ELSE 'NO' END 'EVALUADOR_OK',
P.NOMBRE 'PERFIL'
FROM USUARIO U
LEFT JOIN COMPRAS_PROVEEDOR C
ON U.RUT = C.USUARIO_EVALUADOR
AND C.IDCOMPRAS_PROVEEDOR = '{$folio}'
LEFT JOIN PERFIL P
ON U.IDPERFIL = P.IDPERFIL
WHERE U.RUT = '{$rutUser}'";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosDisponibilidadSupply(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT DATE_FORMAT(NOW(), '%Y-%m-%d') 'FECHA',
								P.RUTJEFEDIRECTO, US.NOMBRE 'NOMBREJEFE',
								CONCAT(P.NOMBRES, ' ', P.APELLIDOS) 'NOMBRE', P.DNI 'RUT',
								CASE WHEN CPO.PERSONAL_ESTADO_CONCEPTO_OPER IS NULL THEN 'Sin marca' ELSE CPO.PERSONAL_ESTADO_CONCEPTO_OPER END 'ESTADO', 1 'TOTAL',
								CASE WHEN CPO.PERSONAL_ESTADO_CONCEPTO_OPER IS NOT NULL THEN 1 ELSE 0 END 'Gestionado'
								FROM PERSONAL P
								LEFT JOIN PERSONAL_ESTADO_OPER PO
								ON P.IDPERSONAL = PO.IDPERSONAL
								AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PO.FECHA_INICIO
								AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PO.FECHA_TERMINO
								OR PO.FECHA_TERMINO IS NULL)
								AND PO.FECHA_INICIO =
								(
									SELECT MAX(KK.FECHA_INICIO)
									FROM PERSONAL_ESTADO_OPER KK
									WHERE KK.IDPERSONAL = P.IDPERSONAL
									AND KK.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
								)
								LEFT JOIN PERSONAL_ESTADO_CONCEPTO_OPER CPO
								ON PO.IDPERSONAL_ESTADO_CONCEPTO_OPER = CPO.IDPERSONAL_ESTADO_CONCEPTO_OPER
								LEFT JOIN ACT T
								ON P.IDPERSONAL  = T.IDPERSONAL
								LEFT JOIN ESTRUCTURA_OPERACION EO
								ON T.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
								LEFT JOIN SERVICIO C
								ON EO.IDSERVICIO = C.IDSERVICIO
								LEFT JOIN CLIENTE L
								ON EO.IDCLIENTE = L.IDCLIENTE
								LEFT JOIN ACTIVIDAD D
								ON EO.IDACTIVIDAD = D.IDACTIVIDAD
								LEFT JOIN SUCURSAL U
								ON T.IDSUCURSAL = U.IDSUCURSAL
								LEFT JOIN AREAFUNCIONAL F
								ON U.IDAREAFUNCIONAL  = F.IDAREAFUNCIONAL
								LEFT JOIN PERSONAL J
								ON P.RUTJEFEDIRECTO  = J.DNI
								LEFT JOIN USUARIO US
								ON P.RUTJEFEDIRECTO = US.RUT
								LEFT JOIN PERFIL PEF
								ON US.IDPERFIL = PEF.IDPERFIL
								LEFT JOIN PERSONAL_ESTADO PE
								ON P.IDPERSONAL = PE.IDPERSONAL
								AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
								AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
								OR PE.FECHA_TERMINO IS NULL)
								AND PE.FECHA_INICIO =
								(
									SELECT MAX(EE.FECHA_INICIO)
									FROM PERSONAL_ESTADO EE
									WHERE EE.IDPERSONAL = P.IDPERSONAL
									AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
								)
								LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
								ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
								WHERE US.RUT IN
								(
								'17092695-1',
								'14124692-5',
								'14121477-2',
								'16876012-4',
								'17351829-3',
								'18357513-9',
								'11392124-2',
								'17655351-0',
								'25816553-5',
								'16441794-8',
								'15804897-3',
								'23142596-9',
								'18604955-1',
								'12829435-K',
								'13246837-0',
								'17728594-3',
								'16574704-6',
								'15893019-6'
								)
								AND ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
								AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
								OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
				if ($row = $con->query($sql)) {
					$return = array();
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosBaseConsumoCeco(){
			$con = conectar();
			if($con != 'No conectado'){
			$sql = "SELECT P.MES, P.ANO, CONCAT(P.ANO,'-',
							CASE WHEN P.MES < 10 THEN CONCAT('0',P.MES) ELSE P.MES END) 'ANO_MES', P.MONTO_TRANS, P.VOL_LTRS 'LITROS', T.NUMERO,
							LEFT(REPLACE(P.PATENTE,'-',''),6) 'PATENTE', M.CECO_ELEMENTO_PEP,
							CASE WHEN M.GERENTE IS NULL THEN '' ELSE M.GERENTE END 'GERENTE',
							CASE WHEN M.GERENCIA IS NULL THEN '' ELSE M.GERENCIA END 'GERENCIA',
							CASE WHEN M.SUBGERENTE IS NULL THEN '' ELSE M.SUBGERENTE END 'SUBGERENTE',
							CASE WHEN M.SUBGERENCIA IS NULL THEN '' ELSE M.SUBGERENCIA END 'SUBGERENCIA',
							CASE WHEN M.ADMINISTRADOR IS NULL THEN '' ELSE M.ADMINISTRADOR END 'ADMINISTRADOR',
							CASE WHEN O.NOMBRE IS NULL THEN '' ELSE O.NOMBRE END 'NOMBRE_PROYECTO',
							CONCAT(P.DIRECCION_ES, ', ', P.COMUNA_E_S, ', CHILE') 'DIRECCION', P.COMUNA_E_S 'COMUNA',
							CASE WHEN TV.NOMBRE IS NULL THEN '-' ELSE TV.NOMBRE END 'TIPOV'
							FROM EQUANS_TEST.PATENTE_CONSUMO P
							LEFT JOIN EQUANS_TEST.TARJETACOMBUSTIBLE T
							ON P.TARJETA = T.NUMERO
							LEFT JOIN EQUANS_TEST.PATENTE E
							ON T.IDPATENTE = E.IDPATENTE
							LEFT JOIN EQUANS_TEST.ESTRUCTURA_OPERACION O
							ON E.IDESTRUCTURA_OPERACION = O.IDESTRUCTURA_OPERACION
							LEFT JOIN EQUANS_DATOS.MAESTRO_CECO_PEP M
							ON O.NOMENCLATURA = M.CECO_ELEMENTO_PEP
							LEFT JOIN EQUANS_TEST.PATENTE_TIPOVEHICULO TV
							ON E.IDPATENTE_TIPOVEHICULO = TV.IDPATENTE_TIPOVEHICULO
							WHERE CONCAT(P.ANO,'-',
							CASE WHEN P.MES < 10 THEN CONCAT('0',P.MES) ELSE P.MES END) >= LEFT(DATE_SUB(NOW(),INTERVAL 11 MONTH),7)";
				if ($row = $con->query($sql)) {
					$return = array();
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarDisponibilidadInduccionTeletrabajo($rut, $rutUsuario){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
				SELECT P.IDPERSONAL, C.IDPERSONAL_ESTADO_CONCEPTO_OPER,
		DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
		DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%Y-%m-%d'),
		'Presente', '{$rutUsuario}'
		FROM PERSONAL P, PERSONAL_ESTADO_CONCEPTO_OPER C
		WHERE P.DNI = '{$rut}'
		AND C.PERSONAL_ESTADO_CONCEPTO_OPER = 'Presente Inducción Teletrabajo'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarDisponibilidadTeletrabajo($rut, $rutUsuario){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "INSERT INTO PERSONAL_ESTADO_OPER(IDPERSONAL, IDPERSONAL_ESTADO_CONCEPTO_OPER, FECHA, HORA, FECHA_INICIO, FECHA_TERMINO, OBSERVACION, RUTUSUARIO)
				SELECT P.IDPERSONAL, C.IDPERSONAL_ESTADO_CONCEPTO_OPER,
		DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%H:%i'),
		DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(NOW(), '%Y-%m-%d'),
		'Presente', '{$rutUsuario}'
		FROM PERSONAL P, PERSONAL_ESTADO_CONCEPTO_OPER C
		WHERE P.DNI = '{$rut}'
		AND C.PERSONAL_ESTADO_CONCEPTO_OPER = 'Presente Teletrabajo'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizaEstructuraOperacion($idCliente, $idServicio, $idActividad, $nomenclatura, $idsubcontratista, $nombre, $idarea, $idestructura, $rutUsuario){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE ESTRUCTURA_OPERACION
								SET IDCLIENTE = $idCliente,
								IDSERVICIO = $idServicio,
								IDACTIVIDAD = $idActividad,
								NOMENCLATURA = '$nomenclatura',
								IDSUBCONTRATO = $idsubcontratista,
								NOMBRE = '$nombre',
								IDAREA = $idarea,
								FECHA = NOW(),
								USUARIO = '$rutUsuario'
								WHERE IDESTRUCTURA_OPERACION = $idestructura";
				if($con->query($sql)){
					return "Ok";
				}else{
					// return $con->error;
					return "Error";
				}
			}else{
				return "Error";
			}
		}

		function checkEstructuraOperacionEditar($idestructura){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT
							COUNT(1) as existe
						FROM ESTRUCTURA_OPERACION
						WHERE IDESTRUCTURA_OPERACION = $idestructura";
				if ($row = $con->query($sql)) {

					$array = $row->fetch_array(MYSQLI_BOTH);

					return $array;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaPatenteReemplazo(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT p.IDPATENTE, p.CODIGO, p.AÑO, p.KILOMETRAJE, pm2.MARCA, pm2.MODELO,
								CONCAT_WS(' ',pe.ESTADO, pe.SUB_ESTADO1) 'ESTADO'
								FROM PATENTE p
								LEFT JOIN PATENTE_ESTADO pe
								ON p.IDPATENTE_ESTADO = pe.IDPATENTE_ESTADO
								LEFT JOIN PATENTE_MARCAMODELO pm2
								ON p.IDPATENTE_MARCAMODELO = pm2.IDPATENTE_MARCAMODELO
								WHERE pe.ESTADO IN
								(
								'Taller',
								'Siniestro',
								'En Espera'
								)";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaEstadoProyecto(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S, IDESTRUCTURA_OPERACION_ESTADO, ESTADO, DESCRIPCION
								FROM ESTRUCTURA_OPERACION_ESTADO";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaEstadoProyectoNombre($estado){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT COUNT(IDESTRUCTURA_OPERACION_ESTADO) 'CANTIDAD'
								FROM ESTRUCTURA_OPERACION_ESTADO
								WHERE ESTADO = '{$estado}'";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarEstadoProyecto($estado, $descripcion, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO ESTRUCTURA_OPERACION_ESTADO(ESTADO, DESCRIPCION, RUT_MODIFICA)
								VALUES('{$estado}','{$descripcion}','{$rutUser}')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarEstadoProyecto($idEstado, $estado, $descripcion, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE ESTRUCTURA_OPERACION_ESTADO
								SET ESTADO = '{$estado}',
								DESCRIPCION = '{$descripcion}',
								RUT_MODIFICA = '{$rutUser}'
								WHERE IDESTRUCTURA_OPERACION_ESTADO = '{$idEstado}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function consulteGerencias(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S, S.IDSERVICIO 'IDGERENCIA', S.GERENCIA, S.SERVICIO 'SUBGERENCIA',
								CONCAT_WS(' ', PG.NOMBRES, PG.APELLIDOS) 'GERENTE', PG.DNI 'RUT_GERENTE',
								CONCAT_WS(' ', PS.NOMBRES, PS.APELLIDOS) 'SUBGERENTE', PS.DNI 'RUT_SUBGERENTE',
								PG.IDPERSONAL 'IDGERENTE', PS.IDPERSONAL 'IDSUBGERENTE',
								ESTADO
								FROM SERVICIO S
								LEFT JOIN PERSONAL PG
								ON S.IDGERENTE = PG.IDPERSONAL
								LEFT JOIN PERSONAL PS
								ON S.IDSUBGERENTE = PS.IDPERSONAL
								ORDER BY IDGERENCIA ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosCliente(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT '' S, IDCLIENTE, CLIENTE, SUB_CLIENTE, RUT_CLIENTE
								FROM CLIENTE";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosPersonalParaAsignar(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT P.IDPERSONAL, P.NOMBRES, P.APELLIDOS, P.DNI, P.CARGO
								from PERSONAL P
								LEFT JOIN PERSONAL_ESTADO PE
								ON P.IDPERSONAL = PE.IDPERSONAL
								AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
								AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
								OR PE.FECHA_TERMINO IS NULL)
								AND PE.FECHA_INICIO =
								(
								SELECT MAX(EE.FECHA_INICIO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
								)
								LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
								ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
								WHERE ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
								AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
								OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaGerenciaSubgerencia($gerencia, $subGerencia){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT COUNT(IDSERVICIO) 'CANTIDAD'
								FROM SERVICIO
								WHERE GERENCIA = '{$gerencia}'
								AND SERVICIO = '{$subGerencia}'";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarGerenciaSubgerencia($gerencia, $subGerencia, $idGerente, $idSubgerente, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO SERVICIO(GERENCIA, SERVICIO, IDGERENTE, IDSUBGERENTE, RUT_MODIFICA, FECHA_HORA, ESTADO)
								VALUES('{$gerencia}','{$subGerencia}',
								CASE WHEN '{$idGerente}' = 0 THEN NULL ELSE '{$idGerente}' END,
								CASE WHEN '{$idSubgerente}' = 0 THEN NULL ELSE '{$idSubgerente}' END,
								'{$rutUser}', NOW(), 'Activo')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarGerenciaSubgerencia($gerencia, $subGerencia, $idGerente, $idSubgerente, $idGerencia, $rutUser, $estado){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE SERVICIO
								SET GERENCIA = '{$gerencia}',
								SERVICIO = '{$subGerencia}',
								IDGERENTE = CASE WHEN '{$idGerente}' = 0 THEN NULL ELSE '{$idGerente}' END,
								IDSUBGERENTE = CASE WHEN '{$idSubgerente}' = 0 THEN NULL ELSE '{$idSubgerente}' END,
								RUT_MODIFICA = '{$rutUser}',
								ESTADO = '{$estado}',
								FECHA_HORA = NOW()
								WHERE IDSERVICIO = '{$idGerencia}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarGerenteSubgerenteMasivo($gerencias, $idGerente, $idSubgerente, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE SERVICIO
								SET IDGERENTE = CASE WHEN '{$idGerente}' = 0 THEN NULL ELSE '{$idGerente}' END,
								IDSUBGERENTE = CASE WHEN '{$idSubgerente}' = 0 THEN NULL ELSE '{$idSubgerente}' END,
								RUT_MODIFICA = '{$rutUser}',
								FECHA_HORA = NOW()
								WHERE IDSERVICIO IN (" . $gerencias . ")";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function datosClienteProyectoRut($rut){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT COUNT(IDCLIENTE) 'CANTIDAD'
								FROM CLIENTE
								WHERE RUT_CLIENTE = '{$rut}'";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarClienteProyecto($rut, $cliente, $holding, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO CLIENTE(RUT_CLIENTE, SUB_CLIENTE, CLIENTE, 	RUT_MODIFICA, FECHA_HORA)
								VALUES('{$rut}','{$cliente}','{$holding}','{$rutUser}', NOW())";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarClienteProyecto($idCliente, $rut, $cliente, $holding, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE CLIENTE
								SET RUT_CLIENTE = '{$rut}',
								SUB_CLIENTE = '{$cliente}',
								CLIENTE = '{$holding}',
								RUT_MODIFICA = '{$rutUser}',
								FECHA_HORA = NOW()
								WHERE IDCLIENTE = '{$idCliente}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function datosCecoEmpresa(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT E.IDESTRUCTURA_OPERACION, E.NOMENCLATURA, E.NOMBRE, A.NOMBRE 'AREA', S.NOMBRE_SUBCONTRATO 'EMPRESA'
								FROM ESTRUCTURA_OPERACION E
								LEFT JOIN AREA A
								ON E.IDAREA = A.IDAREA
								LEFT JOIN SUBCONTRATISTAS S
								ON E.IDSUBCONTRATO = S.IDSUBCONTRATO";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosEquipamientosConAsignacion($patente){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT E.IDPATENTE_EQUIPAMIENTOS, E.NOMBRE, E.CERTIFICADO,
								CASE WHEN C.IDPATENTE_CON_EQUIPAMIENTOS IS NOT NULL THEN 1 ELSE 0 END 'ASIGNADO',
								CASE WHEN C.RUTA IS NULL THEN '' ELSE C.RUTA END 'RUTA', C.IDPATENTE_CON_EQUIPAMIENTOS 'IDASIGNADO'
								FROM PATENTE_EQUIPAMIENTOS E
								LEFT JOIN PATENTE_CON_EQUIPAMIENTOS C
								ON E.IDPATENTE_EQUIPAMIENTOS = C.IDPATENTE_EQUIPAMIENTOS
								LEFT JOIN PATENTE P
								ON C.IDPATENTE = P.IDPATENTE
								AND P.CODIGO = '{$patente}'
								ORDER BY E.IDPATENTE_EQUIPAMIENTOS ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function elimnarEquipamientoDePatente($oculto) {
		  $con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "DELETE FROM PATENTE_CON_EQUIPAMIENTOS
								WHERE IDPATENTE_CON_EQUIPAMIENTOS = '{$oculto}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				} else {
					$con->query("ROLLBACK");
					return "Error";
				}
		  } else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizaPDFEquipamiento($ruta, $oculto, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE PATENTE_CON_EQUIPAMIENTOS
								SET RUTA = '{$ruta}',
								RUT_MODIFICA = '{$rutUser}',
								FECHA_HORA = NOW()
								WHERE IDPATENTE_CON_EQUIPAMIENTOS = '{$oculto}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarEquipamientoFlota($patente, $id, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO PATENTE_CON_EQUIPAMIENTOS(IDPATENTE, IDPATENTE_EQUIPAMIENTOS, RUT_MODIFICA, FECHA_HORA)
								VALUES
								(
								(SELECT IDPATENTE FROM PATENTE WHERE CODIGO = '{$patente}'),
								'{$id}', '{$rutUser}', NOW()
								)";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function ingresarEquipamientoFlotaPDF($patente, $id, $rutUser, $archivo_final){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO PATENTE_CON_EQUIPAMIENTOS(IDPATENTE, IDPATENTE_EQUIPAMIENTOS, RUTA, RUT_MODIFICA, FECHA_HORA)
								VALUES
								(
								(SELECT IDPATENTE FROM PATENTE WHERE CODIGO = '{$patente}'),
								'{$id}', '{$archivo_final}', '{$rutUser}', NOW()
								)";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function datosSiniestroEstado(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDPATENTE_SINIESTRO_ESTADO 'ID', ESTADO
								FROM PATENTE_SINIESTRO_ESTADO";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function actualizarSiniestroEstado($id, $estado){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE PATENTE_SINIESTROS
								SET IDPATENTE_SINIESTRO_ESTADO = '{$estado}'
								WHERE IDPATENTE_SINIESTROS = '{$id}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarSiniestroPatente($id, $patente){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "UPDATE PATENTE_SINIESTROS
								SET PATENTE_REEMPLAZO = '{$patente}'
								WHERE IDPATENTE_SINIESTROS = '{$id}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function datosGerenciasProyecto(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDSERVICIO 'IDGERENCIA', GERENCIA, SERVICIO 'SUBGERENCIA'
								FROM SERVICIO
								ORDER BY GERENCIA ASC, SERVICIO ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosClientesProyecto(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDCLIENTE, CLIENTE, SUB_CLIENTE, RUT_CLIENTE
								FROM CLIENTE
								ORDER BY CLIENTE ASC, SUB_CLIENTE ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function datosEstadoProyectos(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT IDESTRUCTURA_OPERACION_ESTADO 'IDESTADO', ESTADO
								FROM ESTRUCTURA_OPERACION_ESTADO
								ORDER BY ESTADO ASC";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function ingresarProyectoControlling($definicion,	$pep,	$crm,	$proyecto,	$denominacion,	$sociedad,	$gerencia,	$controller,	$adminContrato,	$cliente,	$fechaIniContrato,	$fechaFinContrato,	$fechaIniProyecto,	$fechaFinProyecto,	$estado, $rutUser){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "INSERT INTO ESTRUCTURA_OPERACION
								(
								IDCLIENTE,
								IDSERVICIO,
								IDSUBCONTRATO,
								IDESTADO,
								IDCONTROLLER,
								IDADMINCONTRATO,
								NOMENCLATURA,
								DEFINICION,
								NOMBRE_PADRE,
								NOMBRE,
								COD_CRM,
								FECHA_INICIO_CONTRATO,
								FECHA_FIN_CONTRATO,
								FECHA_INICIO_OPERACION,
								FECHA_FIN_OPERACION,
								FECHA,
								USUARIO
								)
								VALUES
								(
								'{$cliente}',
								'{$gerencia}',
								'{$sociedad}',
								'{$estado}',
								'{$controller}',
								'{$adminContrato}',
								'{$pep}',
								'{$definicion}',
								'{$proyecto}',
								'{$denominacion}',
								'{$crm}',
								'{$fechaIniContrato}',
								'{$fechaFinContrato}',
								'{$fechaIniProyecto}',
								'{$fechaFinProyecto}',
								NOW(),
								'{$rutUser}'
								)";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					// return $con->error;
					$con->query("ROLLBACK");
					return "Error";
					// return $sql;
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function actualizarMantencionTaller($idMantencion,$motivo,$patente){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "CALL INGRESAR_MANTENCION_TALLER('$idMantencion','$motivo','$patente')";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					$con->query("ROLLBACK");
		      return "Error";
				}
			}
			else{
		    $con->query("ROLLBACK");
		  }
		}

		function actualizarEstadoVechiculoCompletarMantencion($patente,$idEstado){
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "UPDATE PATENTE
								SET IDPATENTE_ESTADO = '{$idEstado}'
								WHERE CODIGO = '{$patente}'";
				if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
				}
				else{
					$con->query("ROLLBACK");
		      return "Error";
				}
			}
			else{
		    $con->query("ROLLBACK");
		  }
		}

		function consultaPatenteEstadoCompletarMantencion(){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "SELECT  IDPATENTE_ESTADO, initCap(ESTADO) 'ESTADO',
				CASE WHEN SUB_ESTADO1 IS NOT NULL THEN initCap(SUB_ESTADO1) ELSE '' END 'SUB_ESTADO1',
				CASE WHEN SUB_ESTADO2 IS NOT NULL THEN initCap(SUB_ESTADO2) ELSE '' END 'SUB_ESTADO2'
		FROM PATENTE_ESTADO";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function consultaDatosMantencionLista($mes, $ano){
			$con = conectar();
			if($con != 'No conectado'){
				$sql = "CALL LISTADO_MANTENCIONES('{$mes}','{$ano}');";
				if ($row = $con->query($sql)) {
						while($array = $row->fetch_array(MYSQLI_BOTH)){
							$return[] = $array;
						}
						return $return;
				}
				else{
					return "Error";
				}
			}
			else{
				return "Error";
			}
		}

		function actualizaEstadoPatenteAsignacionParaDesasignar($rut) {
			$con = conectar();
			$con->query("START TRANSACTION");
			if($con != 'No conectado'){
				$sql = "UPDATE PATENTE_ASIGNACIONES pa
								LEFT JOIN PATENTE p
								ON p.IDPATENTE = pa.IDPATENTE
								LEFT JOIN PATENTE_TIPOVEHICULO pt
								ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
								LEFT JOIN PATENTE_MARCAMODELO pm
								ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
								LEFT JOIN PATENTE_PERSONAL PP
								ON p.IDPATENTE = PP.IDPATENTE
								AND pa.IDPATENTE_ASIGNACIONES = PP.IDASIGNACION
								LEFT JOIN PERSONAL p2
								ON PP.IDPERSONAL = p2.IDPERSONAL
								LEFT JOIN SUCURSAL s
								ON pa.IDSUCURSAL = s.IDSUCURSAL
								LEFT JOIN AREAFUNCIONAL a
								ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
								LEFT JOIN ESTRUCTURA_OPERACION eo
								ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
								LEFT JOIN SERVICIO s2
								ON s2.IDSERVICIO = eo.IDSERVICIO
								LEFT JOIN CLIENTE c
								ON c.IDCLIENTE = eo.IDCLIENTE
								SET pa.IDPATENTE_ESTADO_ASIGNACION = 3
								WHERE pa.IDPATENTE_ESTADO_ASIGNACION IN (SELECT IDPATENTE_ESTADO_ASIGNACION FROM PATENTE_ESTADO_ASIGNACION WHERE ESTADO IN ('Validada','Generada'))
								AND p2.DNI = '{$rut}'
								AND PP.IDPATENTE IS NOT NULL";
				if ($con->query($sql)) {
						$con->query("COMMIT");
						return "Ok";
				}
				else{
					$con->query("ROLLBACK");
					return "Error";
				}
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}

		function eliminarPatentePersonal($rut, $patente){
        $con = conectar();
        if($con != 'No conectado'){
            $sql = "DELETE
										FROM PATENTE_PERSONAL
										WHERE IDPERSONAL IN
										(
										SELECT IDPERSONAL
										FROM PERSONAL
										WHERE DNI = '{$rut}'
										)
										AND IDPATENTE IN
										(
											SELECT IDPATENTE
											FROM PATENTE
											WHERE CODIGO = '{$patente}'
										)";
            if($con->query($sql)){
                $con->query("COMMIT");
                return "Ok";
            }else{
                $con->query("ROLLBACK");
                // return $con->error;
								return "Error";
            }
        }else{
            $con->query("ROLLBACK");
            return "Error";
        }
	}

	function disponibilizaPatenteAsignada($patente) {
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE PATENTE
							SET IDPATENTE_ESTADO = 2
							WHERE CODIGO = '{$patente}'";
			if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizaEstadoDesasignacionParaAsignacion($rut) {
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE PATENTE_DESASIGNACIONES pa
							LEFT JOIN PATENTE p
							ON p.IDPATENTE = pa.IDPATENTE
							LEFT JOIN PATENTE_TIPOVEHICULO pt
							ON pt.IDPATENTE_TIPOVEHICULO = p.IDPATENTE_TIPOVEHICULO
							LEFT JOIN PATENTE_MARCAMODELO pm
							ON pm.IDPATENTE_MARCAMODELO = p.IDPATENTE_MARCAMODELO
							LEFT JOIN SUCURSAL s
							ON pa.IDSUCURSAL = s.IDSUCURSAL
							LEFT JOIN AREAFUNCIONAL a
							ON s.IDAREAFUNCIONAL = a.IDAREAFUNCIONAL
							LEFT JOIN ESTRUCTURA_OPERACION eo
							ON pa.IDESTRUCTURA_OPERACION = eo.IDESTRUCTURA_OPERACION
							LEFT JOIN SERVICIO s2
							ON s2.IDSERVICIO = eo.IDSERVICIO
							LEFT JOIN CLIENTE c
							ON c.IDCLIENTE = eo.IDCLIENTE
							LEFT JOIN PERSONAL p2
							ON pa.IDPERSONAL = p2.IDPERSONAL
							SET pa.IDPATENTE_ESTADO_DESASIGNACION = 3
							WHERE pa.IDPATENTE_ESTADO_DESASIGNACION IN (SELECT IDPATENTE_ESTADO_DESASIGNACION FROM PATENTE_ESTADO_DESASIGNACION WHERE ESTADO IN ('Generada'))
							AND p2.DNI = '{$rut}'";
			if ($con->query($sql)) {
					$con->query("COMMIT");
					return "Ok";
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaAreaFuncionalChile(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT IDAREAFUNCIONAL, COMUNA, PROVINCIA, REGION
							FROM AREAFUNCIONAL
							WHERE IDPAIS = 5";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function editarProyectoControlling($idProytecto, $definicion,	$pep,	$crm,	$proyecto,	$denominacion,	$sociedad,	$gerencia,	$controller,	$adminContrato,	$cliente,	$fechaIniContrato,	$fechaFinContrato,	$fechaIniProyecto,	$fechaFinProyecto,	$estado, $rutUser){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "UPDATE ESTRUCTURA_OPERACION
							SET IDCLIENTE = '{$cliente}',
							IDSERVICIO = '{$gerencia}',
							IDSUBCONTRATO = '{$sociedad}',
							IDESTADO = '{$estado}',
							IDCONTROLLER = '{$controller}',
							IDADMINCONTRATO = '{$adminContrato}',
							NOMENCLATURA = '{$pep}',
							DEFINICION = '{$definicion}',
							NOMBRE_PADRE = '{$proyecto}',
							NOMBRE = '{$denominacion}',
							COD_CRM = '{$crm}',
							FECHA_INICIO_CONTRATO = '{$fechaIniContrato}',
							FECHA_FIN_CONTRATO = '{$fechaFinContrato}',
							FECHA_INICIO_OPERACION = '{$fechaIniProyecto}',
							FECHA_FIN_OPERACION = '{$fechaFinProyecto}',
							FECHA = NOW(),
							USUARIO = '{$rutUser}'
							WHERE IDESTRUCTURA_OPERACION = '{$idProytecto}'";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			}
			else{
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
				// return $sql;
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaDiscrepanciaRRHH(){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT '' S, P.DNI, CONCAT(P.NOMBRES, ' ', P.APELLIDOS) 'NOMBRE',
							EO.DEFINICION, EO.NOMENCLATURA 'PEP', EO.NOMBRE_PADRE 'PROYECTO', EO.NOMBRE 'DENOMINACION',
							S.GERENCIA, S.SERVICIO 'SUBGERENCIA', CL.CLIENTE,
							CONCAT(J.NOMBRES, ' ', J.APELLIDOS) 'JEFE',
							CONCAT(JR.Nombres, ' ', JR.Apellidos) 'JEFE_RRHH'
							FROM PERSONAL P
							LEFT JOIN PERSONAL J
							ON P.RUTJEFEDIRECTO = J.DNI
							LEFT JOIN PERSONAL_RRHH R
							ON P.DNI = R.Rut
							LEFT JOIN PERSONAL JR
							ON R.RutJefatura = JR.DNI
							LEFT JOIN ACT A
							ON P.IDPERSONAL = A.IDPERSONAL
							LEFT JOIN ESTRUCTURA_OPERACION EO
							ON A.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
							LEFT JOIN PERSONAL_ESTADO PE
							ON P.IDPERSONAL = PE.IDPERSONAL
							LEFT JOIN SERVICIO S
							ON EO.IDSERVICIO = S.IDSERVICIO
							LEFT JOIN CLIENTE CL
							ON EO.IDCLIENTE = CL.IDCLIENTE
							AND DATE_FORMAT(NOW(), '%Y-%m-%d') >= PE.FECHA_INICIO
							AND (DATE_FORMAT(NOW(), '%Y-%m-%d') <= PE.FECHA_TERMINO
							OR PE.FECHA_TERMINO IS NULL)
							AND PE.FECHA_INICIO =
							(
								SELECT MAX(EE.FECHA_INICIO)
								FROM PERSONAL_ESTADO EE
								WHERE EE.IDPERSONAL = P.IDPERSONAL
								AND EE.FECHA_INICIO <= DATE_FORMAT(NOW(), '%Y-%m-%d')
							)
							LEFT JOIN PERSONAL_ESTADO_CONCEPTO CPE
							ON PE.IDPERSONAL_ESTADO_CONCEPTO = CPE.IDPERSONAL_ESTADO_CONCEPTO
							WHERE P.RUTJEFEDIRECTO <> R.RutJefatura
							AND ((CPE.PERSONAL_ESTADO_CONCEPTO <> 'Desvinculado'
							AND CPE.PERSONAL_ESTADO_CONCEPTO <> 'Renuncia')
							OR CPE.PERSONAL_ESTADO_CONCEPTO IS NULL)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaFiltroPerfil($rut,$ruta){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "SELECT DISTINCT P.FILTRO
							FROM AREAWEB A
							LEFT JOIN PERMISOS P
							ON A.IDAREAWEB = P.IDAREAWEB
							LEFT JOIN PERFIL  R
							ON P.IDPERFIL = R.IDPERFIL
							LEFT JOIN USUARIO U
							ON R.IDPERFIL = U.IDPERFIL
							WHERE A.TIPO = 0
							AND U.RUT = '{$rut}'
							AND A.RUTA LIKE CONCAT('%','{$ruta}','%')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function imgSucursal($folio){
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "SELECT IMG
							FROM SUCURSAL
							WHERE IDSUCURSAL = '{$folio}'";
			if ($row = $con->query($sql)) {
					while($array = $row->fetch_array(MYSQLI_BOTH)){
						$return[] = $array;
					}

					return $return;
			}
			else{
				$con->query("ROLLBACK");
				return "Error";
			}
		}
		else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function datosListadoImbueles($fechaIni, $fechaFin){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_INMUEBLES('{$fechaIni}','{$fechaFin}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function datosListadoRegion($fechaIni, $fechaFin){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_REGION('{$fechaIni}','{$fechaFin}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function datosListadoComunas($fechaIni, $fechaFin){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_COMUNAS('{$fechaIni}','{$fechaFin}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}

				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}

	function consultaListaCentrosDeCosto() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				IDESTRUCTURA_OPERACION,
				DEFINICION,
				NOMENCLATURA
			FROM ESTRUCTURA_OPERACION
			WHERE HABILITADO = 1
			AND NOMENCLATURA NOT IN (
				'CASA MATRIZ',
				'Gerencia General',
				'Gerencia Operaciones',
				'Administracion y Finanzas',
				'Gerencia Comercial',
				'PROPUESTAS'
			)
			ORDER BY DEFINICION ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaAnhoAperturado($anho) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT ANO AS ANHO FROM ANO_APERTURADO WHERE ANO = '$anho';";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function ingresaAnhoAperturado($anho) {
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "INSERT INTO ANO_APERTURADO(ANO) VALUES('$anho')";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return "Ok";
			} else {
				// return $con->error;
				$con->query("ROLLBACK");
				return "Error";
			}
		} else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaListaPeriodos() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT ANO AS ANHO FROM ANO_APERTURADO";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaPersonal_NO_EN_USO() {
		$con = conectar();
		mysqli_set_charset($con, "utf8");
		if ($con != 'No conectado') {
			$sql = "SELECT
				' ' AS S,
				P.IDPERSONAL,
				P.DNI AS RUT,
				P.IDSUBCONTRATISTAS AS IDEMPRESA,
				S.NOMBRE_SUBCONTRATO AS EMPRESA,
				P.NOMBRES,
				P.APELLIDOS,
				P.CARGO,
				P.EMAIL,
				P.FECHA_INGRESO,
				P.IDAFP,
				AP.AFP,
				P.IDSALUD,
				SA.SALUD,
				P.TELEFONO,
				P.IDAREAFUNCIONAL_COMUNA_NAC AS IDCOMUNA,
				AF.COMUNA,
				AF.REGION,
				A.IDSUCURSAL,
				SU.NOMBRE AS SUCURSAL,
				A.IDESTRUCTURA_OPERACION,
				EO.DEFINICION AS CODIGO_CECO,
				EO.NOMENCLATURA AS CECO
			FROM PERSONAL P
			LEFT JOIN SUBCONTRATISTAS S ON S.IDSUBCONTRATO = P.IDSUBCONTRATISTAS
			LEFT JOIN AFP AP ON AP.IDAFP = P.IDAFP
			LEFT JOIN SALUD SA ON SA.IDSALUD = P.IDSALUD
			LEFT JOIN AREAFUNCIONAL AF ON AF.IDAREAFUNCIONAL = P.IDAREAFUNCIONAL_COMUNA_NAC
			LEFT JOIN ACT A ON A.IDPERSONAL = P.IDPERSONAL
			LEFT JOIN SUCURSAL SU ON SU.IDSUCURSAL = A.IDSUCURSAL
			LEFT JOIN ESTRUCTURA_OPERACION EO ON EO.IDESTRUCTURA_OPERACION = A.IDESTRUCTURA_OPERACION
			LIMIT 10";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaPersonalOfertados() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT IDPERSONAL_OFERTADOS, CODIGO, NOMBRE FROM PERSONAL_OFERTADOS";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaFamilias() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT IDFAMILIA, NOMBRE FROM FAMILIA";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaCargoMandante() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				CGUF.IDCARGO_GENERICO_UNIFICADO_FAMILIA,
				F.IDFAMILIA,
				F.NOMBRE AS FAMILIA,
				CGU.CODIGO,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				C.IDCLASIFICACION,
				C.NOMBRE AS CLASIFICACION
			FROM CARGO_GENERICO_UNIFICADO_FAMILIA CGUF
			INNER JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.IDCARGO_GENERICO_UNIFICADO = CGUF.IDCARGO_GENERICO_UNIFICADO
			INNER JOIN FAMILIA F ON F.IDFAMILIA = CGUF.IDFAMILIA
			INNER JOIN CLASIFICACION C ON C.IDCLASIFICACION = CGU.IDCLASIFICACION
			ORDER BY CGU.NOMBRE ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaReferencia1() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1
			FROM REFERENCIA1 R1 ORDER BY R1.NOMBRE ASC;
			";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaReferencia1_clean() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1
			FROM REFERENCIA1 R1
			WHERE R1.NOMBRE NOT LIKE '-%'
			AND R1.NOMBRE NOT LIKE '%-'
			ORDER BY R1.NOMBRE ASC;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaReferencia2() {
		$con = conectar();
		if ($con != 'No conectado') {
			/*$sql = "SELECT
				R1.IDREFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2
			FROM REFERENCIA2 R2
			INNER JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = R2.IDREFERENCIA1;";*/
			$sql = "SELECT
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2
			FROM REFERENCIA2 R2 ORDER BY R2.NOMBRE ASC;
			";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaReferencia2_clean() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2
			FROM REFERENCIA2 R2
			WHERE R2.NOMBRE NOT LIKE '-%'
			AND R2.NOMBRE NOT LIKE '%-'
			ORDER BY R2.NOMBRE ASC;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaLastIDDotacion() {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT MAX(IDDOTACION) AS LAST_ID FROM DOTACION";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListadoDotacion($periodo, $codigoCC, $search, $sort, $order) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				DP.IDDOTACION_PERIODO AS ID,
				DT.DEFINICION_ESTRUCTURA_OPERACION AS CODIGO_CENTRO_DE_COSTOS,
				CC.NOMENCLATURA AS CENTRO_DE_COSTOS,
				DT.IDDOTACION AS IDDOTACION,
				DT.IDPERSONAL_OFERTADOS,
				P.NOMBRE AS PERSONAL_OFERTADOS,
				F.IDFAMILIA,
				F.NOMBRE AS FAMILIA,
				DT.IDCARGO_MANDANTE,
				(
					SELECT
						CGU.NOMBRE
					FROM CARGO_GENERICO_UNIFICADO_FAMILIA CGUF
					INNER JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.IDCARGO_GENERICO_UNIFICADO = CGUF.IDCARGO_GENERICO_UNIFICADO
					WHERE CGUF.IDCARGO_GENERICO_UNIFICADO_FAMILIA = DT.IDCARGO_MANDANTE
				) AS CARGO_MANDANTE,
				DT.IDCARGO_GENERICO_UNIFICADO_FAMILIA,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CL.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,
				T.ENERO,
				T.FEBRERO,
				T.MARZO,
				T.ABRIL,
				T.MAYO,
				T.JUNIO,
				T.JULIO,
				T.AGOSTO,
				T.SETIEMBRE,
				T.OCTUBRE,
				T.NOVIEMBRE,
				T.DICIEMBRE
			FROM DOTACION_PERIODO DP
			INNER JOIN DOTACION DT ON DT.IDDOTACION = DP.IDDOTACION
			INNER JOIN PERIODO T ON T.IDPERIODO = DP.IDPERIODO
			INNER JOIN ESTRUCTURA_OPERACION CC ON CC.DEFINICION = DT.DEFINICION_ESTRUCTURA_OPERACION
			LEFT JOIN PERSONAL_OFERTADOS P ON P.IDPERSONAL_OFERTADOS = DT.IDPERSONAL_OFERTADOS
			INNER JOIN CARGO_GENERICO_UNIFICADO_FAMILIA CGUF ON CGUF.IDCARGO_GENERICO_UNIFICADO_FAMILIA = DT.IDCARGO_GENERICO_UNIFICADO_FAMILIA
			INNER JOIN FAMILIA F ON F.IDFAMILIA = CGUF.IDFAMILIA
			INNER JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.IDCARGO_GENERICO_UNIFICADO = CGUF.IDCARGO_GENERICO_UNIFICADO
			INNER JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = DT.IDREFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = DT.IDREFERENCIA2
			WHERE T.ANHO = '$periodo' AND CC.DEFINICION = '$codigoCC'
			AND (
				P.NOMBRE LIKE '%$search%' OR
				F.NOMBRE LIKE '%$search%' OR
				CGU.NOMBRE LIKE '%$search%' OR
				CL.NOMBRE LIKE '%$search%' OR
				R1.NOMBRE LIKE '%$search%' OR
				R2.NOMBRE LIKE '%$search%'
			)";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function ingresarDotacionPeriodo(
		$codigoCC,
		$idPersonalOfertado,
		$idCargoMandante,
		$idCargoGenericoUnificadoFamilia,
		$idReferencia1,
		$idReferencia2,
		$anho,
		$ene, $feb, $mar, $abr, $may, $jun, $jul, $ago, $set, $oct, $nov, $dic
	) {
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL INSERTAR_DOTACION(
				'$codigoCC',
				$idPersonalOfertado,
				$idCargoMandante,
				$idCargoGenericoUnificadoFamilia,
				$idReferencia1,
				$idReferencia2,
				'$anho',
				'$ene', '$feb', '$mar', '$abr', '$may', '$jun', '$jul', '$ago', '$set', '$oct', '$nov','$dic'
			)";
			if ($row = $con->query($sql)) {
				$con->query("COMMIT");
				// return $row->fetch_assoc();
				return "OK";
			} else {
				$con->query("ROLLBACK");
				return $sql;
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizarDotacionPeriodo(
		$idDotacion,
		$idPersonalOfertado,
		$idCargoMandante,
		$idCargoGenericoUnificadoFamilia,
		$idReferencia1,
		$idReferencia2,
		$ene, $feb, $mar, $abr, $may, $jun, $jul, $ago, $set, $oct, $nov, $dic
	) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "CALL ACTUALIZAR_DOTACION(
				$idDotacion,
				$idPersonalOfertado,
				$idCargoMandante,
				$idCargoGenericoUnificadoFamilia,
				$idReferencia1,
				$idReferencia2,
				'$ene', '$feb', '$mar', '$abr', '$may', '$jun', '$jul', '$ago', '$set', '$oct', '$nov','$dic'
			)";
			if ($row = $con->query($sql)) {
				$con->query("COMMIT");
				// return $row->fetch_assoc();
				return "OK";
			} else {
				$con->query("ROLLBACK");
				return $sql;
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaListaAnhos() {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				distinct(anio_calendario) as anho
			FROM CALENDARIO;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaMesesPorAnho($anho) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "SELECT
				distinct(mes_calendario) as n_mes,
				anio_calendario as anho,
				concat(mes_nombre, '-',anio_calendario) as mes
			FROM CALENDARIO
			WHERE anio_calendario = $anho";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaSemanasPorMesesAnho($anho, $mes) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				distinct(semana_del_anio) as n_semana,
				mes_calendario as n_mes,
				semana_inicio,
				semana_fin,
				concat('Semana ', semana_del_anio, ' del ', semana_inicio, ' al ', semana_fin) as semana
			FROM CALENDARIO
			WHERE anio_calendario = $anho
			AND mes_calendario = $mes";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaDiasPorSemanaMesAnho($anho, $mes, $semana) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				fecha_calendario as fecha,
				dia_calendario as dia,
				mes_calendario as n_mes,
				semana_del_anio as n_semana
			FROM CALENDARIO
			WHERE anio_calendario = $anho
			AND mes_calendario = $mes
			AND semana_del_anio = $semana;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaRangoDias($anho, $nsemana) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				semana_inicio,
				semana_fin
			FROM CALENDARIO
			WHERE anio_calendario = $anho
			AND semana_del_anio = $nsemana
			LIMIT 1;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaDiasPorSemana($fecIni, $fecFin) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				fecha_calendario as fecha
			FROM CALENDARIO
			WHERE fecha_calendario between '$fecIni' and '$fecFin';";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaCalendarioSemanas() {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				anio_calendario AS ANHO,
				semana_del_anio AS SEMANA,
				semana_inicio AS SEMANA_INICIO,
				semana_fin AS SEMANA_FIN,
				CONCAT('Semana ', semana_del_anio, ' del ', anio_calendario, ' (', semana_inicio, ' al ', semana_fin, ')') AS LABEL,
				(SELECT current_date() BETWEEN semana_inicio AND semana_fin) AS ES_ACTUAL
			FROM CALENDARIO
			GROUP BY anio_calendario, semana_del_anio;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaPersonalEstadoConcepto() {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT IDPERSONAL_ESTADO_CONCEPTO, SIGLA FROM PERSONAL_ESTADO_CONCEPTO;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaPersonalEstadoConceptoClean() {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT IDPERSONAL_ESTADO_CONCEPTO, SIGLA
			FROM PERSONAL_ESTADO_CONCEPTO
			WHERE SIGLA NOT IN ('DSR', 'V', 'LIC', 'LAC', 'FMD');";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function validWeekForPersonal($idPersonal, $fecIni, $fecFin) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT COUNT(*) AS N FROM PERSONAL_ESTADO WHERE IDPERSONAL = $idPersonal AND (FECHA BETWEEN '$fecIni' AND '$fecFin');";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function iniciarSemanaPlanilla(
		$idPersonal,
		$idCargoGenericoUnificado,
		$idReferencia2,
		$idCargoGenericoUnificado_b,
		$idReferencia2_b,
		$fecha,
		$rutUsuario
	) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "INSERT INTO PERSONAL_ESTADO(
				IDPERSONAL,
				IDCARGO_GENERICO_UNIFICADO,
				IDREFERENCIA2,
				IDCARGO_GENERICO_UNIFICADO_B,
				IDREFERENCIA2_B,
				FECHA_INICIO,
				FECHA_TERMINO,
				RUTUSUARIO
			) VALUES (
				$idPersonal,
				$idCargoGenericoUnificado,
				$idReferencia2,
				$idCargoGenericoUnificado_b,
				$idReferencia2_b,
				'$fecha',
				'$fecha',
				'$rutUsuario'
			);";
			if ($row = $con->query($sql)) {
				$con->query("COMMIT");
				// return $row->fetch_assoc();
				return $sql;
			} else {
				$con->query("ROLLBACK");
				return $sql;
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizarSemanaPlanilla(
		$idPersonal,
		$idCargoGenericoUnificado_b,
		$idReferencia1_b,
		$idReferencia2_b,
		$idPersonalEstadoConcepto,
		$fecha,
		$he50,
		$he100,
		$atraso,
		$obs,
		$rutUsuario
	) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "CALL INSERTAR_PERSONAL_ESTADO(
				$idPersonal,
				$idCargoGenericoUnificado_b,
				$idReferencia1_b,
				$idReferencia2_b,
				$idPersonalEstadoConcepto,
				'$fecha',
				$he50,
				$he100,
				$atraso,
				$obs,
				'$rutUsuario'
			)";
			if ($row = $con->query($sql)) {
				return "Ok";
			} else {
				$con->query("ROLLBACK");
				return $sql;
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function actualizarSemanaPlanillaBasic(
		$idPersonal,
		$idCargoGenericoUnificado_b,
		$idReferencia1_b,
		$idReferencia2_b,
		$fecha,
		$he50,
		$he100,
		$atraso,
		$obs,
		$rutUsuario
	) {
		$con = conectar();
		if ($con != 'No conectado') {
			$sql = "CALL INSERTAR_PERSONAL_ESTADO_BASIC(
				$idPersonal,
				$idCargoGenericoUnificado_b,
				$idReferencia1_b,
				$idReferencia2_b,
				'$fecha',
				$he50,
				$he100,
				$atraso,
				$obs,
				'$rutUsuario'
			)";
			if ($row = $con->query($sql)) {
				return "Ok";
			} else {
				$con->query("ROLLBACK");
				return $sql;
			}
		} else {
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaListaACTHistorialCOUNT($idEstructuraOperacion, $fechaIni, $fechaFin, $auxIni, $auxFin, $diaFinMes, $search) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT ' ' AS S,
				COUNT(DISTINCT(P.IDPERSONAL)) AS CONT
			FROM PERSONAL P
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.CODIGO = P.REFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.CODIGO = P.REFERENCIA2
			LEFT JOIN PROCESOS_PERIODO PP ON P.DNI = PP.EMPLEADO
			LEFT JOIN PERSONAL_ESTADO PE ON P.IDPERSONAL = PE.IDPERSONAL
				AND PE.IDPERSONAL_ESTADO_CONCEPTO = 13
				AND PE.FECHA_INICIO < '$fechaIni'
				AND PE.FECHA_INICIO = (SELECT MAX(FECHA_INICIO) FROM PERSONAL_ESTADO WHERE IDPERSONAL = P.IDPERSONAL)
			WHERE PP.CECO IS NOT NULL
			AND (PP.FECHAPROC IN ('$auxIni', '$auxFin'))";
			if ((int)$idEstructuraOperacion > 0) {
				$sql = $sql . " AND PP.CECO = $idEstructuraOperacion";
			}
			$sql = $sql . " AND (P.FECHA_INGRESO <= '$fechaFin')";
			$sql = $sql . " AND (P.NOMBRES LIKE '%$search%' OR P.APELLIDOS LIKE '%$search%' OR P.DNI LIKE '%$search%' OR P.CARGO LIKE '%$search%' OR CGU.NOMBRE LIKE '%$search%')";
			$sql = $sql . " AND PE.IDPERSONAL IS NULL";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaCargoLiquidacion() {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT * FROM CARGO_LIQUIDACION WHERE CARGO NOT LIKE '%**%'  ORDER BY CARGO ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaACTHistorial2(
		$offset,
		$limit,
		$idEstructuraOperacion,
		$fechaIni,
		$fechaFin,
		$auxIni,
		$auxFin,
		$diaFinMes,
		$search,
		$sortCol,
		$sortOrd
	) {
		$con = conectar();
		if ($con != "No conectado") {
			$sqlAux = "SELECT
				-- date_add(PE_.FECHA_INICIO, INTERVAL -1 day)
				PE_.FECHA_INICIO
			FROM PERSONAL_ESTADO PE_
			INNER JOIN PERSONAL P_ ON P_.IDPERSONAL = PE_.IDPERSONAL
			INNER JOIN PERSONAL_ESTADO_CONCEPTO PEC_ ON PEC_.IDPERSONAL_ESTADO_CONCEPTO = PE_.IDPERSONAL_ESTADO_CONCEPTO
			WHERE P_.IDPERSONAL = P.IDPERSONAL AND PEC_.SIGLA = 'DSR'
			ORDER BY PE_.IDPERSONAL_ESTADO DESC
			LIMIT 1";

			$sql = "SELECT
				P.IDPERSONAL,
				P.DNI AS RUT,
				P.NOMBRES,
				P.APELLIDOS AS APELLIDOS,
				P.CARGO AS CARGO_LIQUIDACION,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CL.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,

    		P.FECHA_INGRESO,
				($sqlAux) AS FECHA_TERMINO,
    
				P.CLASIFICACION_CONTRATO,
				P.TEMPORAL

			FROM PERSONAL P
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = P.REFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = P.REFERENCIA2

			LEFT JOIN PERSONAL_ESTADO PE ON PE.IDPERSONAL = P.IDPERSONAL
			LEFT JOIN PERSONAL_ESTADO_CONCEPTO PEC ON PEC.IDPERSONAL_ESTADO_CONCEPTO = PE.IDPERSONAL_ESTADO_CONCEPTO
			LEFT JOIN PROCESOS_PERIODO PP ON PP.EMPLEADO = P.DNI
			WHERE 
			(
				CASE WHEN PEC.SIGLA = 'DSR' THEN
					PE.FECHA_INICIO <= '$diaFinMes'
				ELSE
					PE.FECHA_INICIO IS NOT NULL
				END
      )
			AND (
				CASE WHEN PP.FECHAPROC >= '$auxFin' THEN
					PP.FECHAPROC IN ('$auxIni', '$auxFin')
				ELSE
					TIMESTAMPDIFF(MONTH, ($sqlAux), '$auxIni-01') <= 0
				END
			)
			AND PP.CECO = $idEstructuraOperacion
			AND P.FECHA_INGRESO <= '$fechaFin'
			AND (P.NOMBRES LIKE '%$search%' OR P.APELLIDOS LIKE '%$search%' OR P.DNI LIKE '%$search%' OR P.CARGO LIKE '%$search%' OR CGU.NOMBRE LIKE '%$search%')

			GROUP BY P.IDPERSONAL
			
			UNION ALL
			
			SELECT
				P.IDPERSONAL,
				P.DNI AS RUT,
				P.NOMBRES,
				P.APELLIDOS AS APELLIDOS,
				P.CARGO AS CARGO_LIQUIDACION,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CL.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,

    		P.FECHA_INGRESO,
    		($sqlAux) AS FECHA_TERMINO,
    
    		P.CLASIFICACION_CONTRATO,
    		P.TEMPORAL

			FROM PERSONAL P
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = P.REFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = P.REFERENCIA2

			LEFT JOIN ACT AC ON AC.IDPERSONAL = P.IDPERSONAL
			LEFT JOIN ESTRUCTURA_OPERACION EO ON EO.IDESTRUCTURA_OPERACION = AC.IDESTRUCTURA_OPERACION
			WHERE P.TEMPORAL = 1
			AND EO.DEFINICION = $idEstructuraOperacion
			AND P.FECHA_INGRESO <= '$fechaFin'
			AND (P.NOMBRES LIKE '%$search%' OR P.APELLIDOS LIKE '%$search%' OR P.DNI LIKE '%$search%' OR P.CARGO LIKE '%$search%' OR CGU.NOMBRE LIKE '%$search%')

			GROUP BY P.IDPERSONAL

			ORDER BY RUT ASC
			LIMIT $limit OFFSET $offset;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return $sql;
			}
		} else {
			return "Error";
		}
	}

	function consultaListaACTHistorial($offset, $limit, $idEstructuraOperacion, $fechaIni, $fechaFin, $auxIni, $auxFin, $diaFinMes, $search, $sortCol, $sortOrd) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				DISTINCT(P.IDPERSONAL),
				P.DNI AS RUT,
				CONCAT(
					CASE WHEN (
						SELECT COUNT(*)
						FROM PERSONAL_ESTADO PH
						WHERE PH.IDPERSONAL = P.IDPERSONAL
						AND PH.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin'
					) >= 7 THEN '<b class=''fa fa-circle'' style=''color:  green; font-size: 10pt;'' title=''Asistencia ingresada''></b>'
					ELSE
						CASE WHEN (
							SELECT COUNT(*)
							FROM PERSONAL_ESTADO PH
							WHERE PH.IDPERSONAL = P.IDPERSONAL
							AND PH.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin'
						) >= 1 THEN '<b class=''fa fa-circle'' style=''color:  #ffd519; font-size: 10pt;'' title=''Asistencia ingresada parcialmente''></b>'
						ELSE
							'<b class=''fa fa-circle'' style=''color:  red; font-size: 10pt;'' title=''Asistencia no ingresada''></b>'
						END
					END,
					' ',P.APELLIDOS, ' ', P.NOMBRES
				) AS NOMBRES,
				P.APELLIDOS AS APELLIDOS,
				P.CARGO AS CARGO_LIQUIDACION,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CL.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,
				P.FECHA_INGRESO,
				(
					SELECT
						DATE_ADD(FECHA_INICIO,INTERVAL -1 DAY)
					FROM PERSONAL_ESTADO
					WHERE IDPERSONAL = P.IDPERSONAL
					AND IDPERSONAL_ESTADO_CONCEPTO = 13
					AND FECHA_INICIO = (SELECT MAX(FECHA_INICIO) FROM PERSONAL_ESTADO WHERE IDPERSONAL = P.IDPERSONAL)
					ORDER BY IDPERSONAL_ESTADO DESC
					LIMIT 1
				) AS FECHA_TERMINO,
				P.CLASIFICACION_CONTRATO,
				P.TEMPORAL
			FROM PERSONAL P
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = P.REFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = P.REFERENCIA2
			LEFT JOIN PROCESOS_PERIODO PP ON P.DNI = PP.EMPLEADO
			LEFT JOIN PERSONAL_ESTADO PE ON P.IDPERSONAL = PE.IDPERSONAL
				AND PE.IDPERSONAL_ESTADO_CONCEPTO = 13
				AND PE.FECHA_INICIO < '$fechaIni'
				AND PE.FECHA_INICIO = (SELECT MAX(FECHA_INICIO) FROM PERSONAL_ESTADO WHERE IDPERSONAL = P.IDPERSONAL)
			WHERE PP.CECO IS NOT NULL
			AND (PP.FECHAPROC IN ('$auxIni', '$auxFin'))";
			if ((int)$idEstructuraOperacion >= 0) {
				$sql = $sql . " AND PP.CECO = $idEstructuraOperacion";
			}
			$sql = $sql . " AND (P.FECHA_INGRESO <= '$fechaFin')";
			$sql = $sql . " AND (P.NOMBRES LIKE '%$search%' OR P.APELLIDOS LIKE '%$search%' OR P.DNI LIKE '%$search%' OR P.CARGO LIKE '%$search%' OR CGU.NOMBRE LIKE '%$search%')";
			$sql = $sql . " AND PE.IDPERSONAL IS NULL";
			$sql = $sql . " UNION ALL ";
			$sql = $sql . "SELECT
				DISTINCT(P.IDPERSONAL),
				P.DNI AS RUT,
				CONCAT(
					CASE WHEN (
						SELECT COUNT(*)
						FROM PERSONAL_ESTADO PH
						WHERE PH.IDPERSONAL = P.IDPERSONAL
						AND PH.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin'
					) >= 7 THEN '<b class=''fa fa-circle'' style=''color:  green; font-size: 10pt;'' title=''Asistencia ingresada''></b>'
					ELSE
						CASE WHEN (
							SELECT COUNT(*)
							FROM PERSONAL_ESTADO PH
							WHERE PH.IDPERSONAL = P.IDPERSONAL
							AND PH.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin'
						) >= 1 THEN '<b class=''fa fa-circle'' style=''color:  #ffd519; font-size: 10pt;'' title=''Asistencia ingresada parcialmente''></b>'
						ELSE
							'<b class=''fa fa-circle'' style=''color:  red; font-size: 10pt;'' title=''Asistencia no ingresada''></b>'
						END
					END,
					' ',P.APELLIDOS, ' ', P.NOMBRES
				) AS NOMBRES,
				P.APELLIDOS AS APELLIDOS,
				P.CARGO AS CARGO_LIQUIDACION,
				CGU.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CL.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				R2.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,
				P.FECHA_INGRESO,
				(
					SELECT
						DATE_ADD(FECHA_INICIO,INTERVAL -1 DAY)
					FROM PERSONAL_ESTADO
					WHERE IDPERSONAL = P.IDPERSONAL
					AND IDPERSONAL_ESTADO_CONCEPTO = 13
					AND FECHA_INICIO = (SELECT MAX(FECHA_INICIO) FROM PERSONAL_ESTADO WHERE IDPERSONAL = P.IDPERSONAL)
					ORDER BY IDPERSONAL_ESTADO DESC LIMIT 1
				) AS FECHA_TERMINO,
				P.CLASIFICACION_CONTRATO,
				P.TEMPORAL
			FROM PERSONAL P
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.CODIGO = P.CARGO_GENERICO_CODIGO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = P.REFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = P.REFERENCIA2
			LEFT JOIN ACT AC ON P.IDPERSONAL = AC.IDPERSONAL
			LEFT JOIN ESTRUCTURA_OPERACION EO ON AC.IDESTRUCTURA_OPERACION = EO.IDESTRUCTURA_OPERACION
			WHERE P.TEMPORAL = 1";
			if ((int)$idEstructuraOperacion >= 0) {
				$sql = $sql . " AND EO.DEFINICION = $idEstructuraOperacion";
			}
			$sql = $sql . " AND (P.FECHA_INGRESO <= '$fechaFin')";
			$sql = $sql . " AND (P.NOMBRES LIKE '%$search%' OR P.APELLIDOS LIKE '%$search%' OR P.DNI LIKE '%$search%' OR P.CARGO LIKE '%$search%' OR CGU.NOMBRE LIKE '%$search%')";
			$sql = $sql . " ORDER BY $sortCol $sortOrd";
			$sql = $sql . " LIMIT $limit OFFSET $offset;";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $sql;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaPersonalEstado($fechaIni, $fechaFin) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				PE.IDPERSONAL_ESTADO,
				PE.IDPERSONAL,
				PE.IDCARGO_GENERICO_UNIFICADO,
				CGU.NOMBRE AS CARGO_GENERICO_UNIFICADO,
				CGU.IDCLASIFICACION,
				CL.NOMBRE AS CLASIFICACION,
				R1.IDREFERENCIA1,
				R1.NOMBRE AS REFERENCIA1,
				PE.IDREFERENCIA2,
				R2.NOMBRE AS REFERENCIA2,
				PE.IDCARGO_GENERICO_UNIFICADO_B,
				CGU_B.NOMBRE AS CARGO_GENERICO_UNIFICADO_B,
				CGU_B.IDCLASIFICACION AS IDCLASIFICACION_B,
				CL_B.NOMBRE AS CLASIFICACION_B,
				PE.IDREFERENCIA1_B,
				PE.IDREFERENCIA2_B,
				PE.FECHA_INICIO,
				PE.IDPERSONAL_ESTADO_CONCEPTO,
				PEC.SIGLA AS PERSONAL_ESTADO_CONCEPTO,
				PE.HE50,
				PE.HE100,
				PE.ATRASO,
				PE.OBSERVACION
			FROM PERSONAL_ESTADO PE
			LEFT JOIN PERSONAL_ESTADO_CONCEPTO PEC ON PEC.IDPERSONAL_ESTADO_CONCEPTO = PE.IDPERSONAL_ESTADO_CONCEPTO
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU ON CGU.IDCARGO_GENERICO_UNIFICADO = PE.IDCARGO_GENERICO_UNIFICADO
			LEFT JOIN CLASIFICACION CL ON CL.IDCLASIFICACION = CGU.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1 ON R1.IDREFERENCIA1 = PE.IDREFERENCIA1
			LEFT JOIN REFERENCIA2 R2 ON R2.IDREFERENCIA2 = PE.IDREFERENCIA2
			LEFT JOIN CARGO_GENERICO_UNIFICADO CGU_B ON CGU_B.IDCARGO_GENERICO_UNIFICADO = PE.IDCARGO_GENERICO_UNIFICADO_B
			LEFT JOIN CLASIFICACION CL_B ON CL_B.IDCLASIFICACION = CGU_B.IDCLASIFICACION
			LEFT JOIN REFERENCIA1 R1_B ON R1_B.IDREFERENCIA1 = PE.IDREFERENCIA1
			WHERE
			(PE.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin')
			/*AND (PE.IDPERSONAL_ESTADO_CONCEPTO IS NOT NULL)*/
			ORDER BY PE.IDPERSONAL, PE.FECHA_INICIO ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaSemanaCalendario($fechaIni, $fechaFin) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				fecha_calendario AS FECHA,
				dia_nombre AS DIA
			FROM CALENDARIO
			WHERE fecha_calendario BETWEEN '$fechaIni' AND '$fechaFin'
			ORDER BY fecha_calendario ASC";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaDiasReemplazoModal($idPersonal, $fechaIni, $fechaFin) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				PE.IDPERSONAL_ESTADO,
				PE.FECHA_INICIO,
				PE.RUT_REEMPLAZO,
				CONCAT(P.NOMBRES, ' ', P.APELLIDOS) AS REEMPLAZO
			FROM PERSONAL_ESTADO PE
			INNER JOIN PERSONAL_ESTADO_CONCEPTO PEC ON PEC.IDPERSONAL_ESTADO_CONCEPTO = PE.IDPERSONAL_ESTADO_CONCEPTO
			LEFT JOIN PERSONAL P ON P.DNI = PE.RUT_REEMPLAZO
			WHERE PE.IDPERSONAL = $idPersonal
			AND PE.FECHA_INICIO BETWEEN '$fechaIni' AND '$fechaFin'
			AND PEC.SIGLA IN ('DSR');";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaListaUsuariosTemporals($codCECO) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT
				P.IDPERSONAL,
				P.DNI AS RUT,
				CONCAT(P.NOMBRES, ' ', P.APELLIDOS) AS FULLNAME
			FROM PERSONAL P
			INNER JOIN ACT A ON A.IDPERSONAL = P.IDPERSONAL
			INNER JOIN ESTRUCTURA_OPERACION EO ON EO.IDESTRUCTURA_OPERACION = A.IDESTRUCTURA_OPERACION
			WHERE P.TEMPORAL = 1
			AND EO.DEFINICION = '$codCECO'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function actualizarPlanillaRutReemplazo($idPersonalEstado, $rutReemplazo) {
		$con = conectar();
		$con->query("START TRANSACTION");
		if($con != 'No conectado'){
			$sql = "UPDATE PERSONAL_ESTADO
				SET RUT_REEMPLAZO = '$rutReemplazo'
			WHERE IDPERSONAL_ESTADO = $idPersonalEstado";
			if ($con->query($sql)) {
				$con->query("COMMIT");
				return $sql;
			} else {
				// return $con->error;
				$con->query("ROLLBACK");
				return $sql;
			}
		} else{
			$con->query("ROLLBACK");
			return "Error";
		}
	}

	function consultaListaCentrosDeCostoPerfil($rut,$path){
		$con = conectar();
		if($con != 'No conectado'){
			$sql = "CALL LISTADO_CECO_ASISTENCIA('{$rut}','{$path}')";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			}
			else{
				return "Error";
			}
		}
		else{
			return "Error";
		}
	}


	function consultaRutYaExistente($rut) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT DNI FROM PERSONAL WHERE DNI = '$rut'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}

	function consultaEmailYaExistente($email) {
		$con = conectar();
		if ($con != "No conectado") {
			$sql = "SELECT EMAIL FROM PERSONAL WHERE EMAIL = '$email'";
			if ($row = $con->query($sql)) {
				$return = array();
				while($array = $row->fetch_array(MYSQLI_BOTH)){
					$return[] = $array;
				}
				return $return;
			} else {
				return "Error";
			}
		} else {
			return "Error";
		}
	}
?>
