<?php
ini_set('display_errors', 'Off');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
require('../envioEmailAsignacionVehiculo.php');
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/flota/asignaciones/asignacion';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

$idAsig = $_POST['idAsig'];
$patente = $_POST['patente'];
$rutUsuario = $_SESSION['rutUser'];
$datos = consultaDatosAsignacion($idAsig, $rutUsuario);
$contadorChecklist = $datos[0]['CONTADORCHECKILIST'];
$contadorLic = $datos[0]['CONTADORLIC'];
$contadorAsig = $datos[0]['CONTADORASIG'];
$nombreEmpresa = nombreLogin($_POST['url']);
$clausulas = consultaClausulas();

$v = consultaPatenteEspecifica($patente);
$estadoVeh = $v[0]['IDPATENTE_ESTADO'];
$tipoVeh = $v[0]['IDPATENTE_TIPOVEHICULO'];
$propiedad = $v[0]['IDPATENTE_PROPIEDAD'];
$marcaModelo = $v[0]['IDPATENTE_MARCAMODELO'];
$proveedor = $v[0]['IDPATENTE_PROVEEDOR'];
$bodega = $v[0]['IDSUCURSAL'];
$estructOperac = $v[0]['IDESTRUCTURA_OPERACION'];
$aseguradora = $v[0]['IDPATENTE_ASEGURADORA'];
$subcontratista = $v[0]['IDSUBCONTRATISTAS'];
$kilometraje = $v[0]['KILOMETRAJE'];
$ano = $v[0]['AÑO'];
$vin = $v[0]['VIN'];
$color = $v[0]['IDPATENTE_COLOR'];
$fInicio = $v[0]['FINICIO'];
$fTermino = $v[0]['FTERMINO'];
$tipoMonto = $v[0]['TIPOMONTO'];
$monto = $v[0]['MONTO'];
$montoAseg = $v[0]['MONTO_ASEGURADORA'];
$fMantto = $v[0]['FMANTENIMIENTO'];
$operacion = $v[0]['OPERACION'];
$nMotor = $v[0]['NRO_MOTOR'];
$patenteOriginal = $v[0]['PATENTE_ORIGINAL'];
$litros = $v[0]['LITROS_ESTANQUE'];

$v1 = consultaPatenteHistorial($patente);
$estadoControl = $v1[0]['ESTADO_CONTROL'];
$estadoRrhh = $v1[0]['ESTADO_PERSONAL'];
$personalAsig = $v1[0]['PERSONAL'];
$rutAsig = $v1[0]['DNI'];
$mensaje = "Cambio de estado de asignación (En Revisión)";
$frealizada = "";
$fcaducidad = "";
$frealizadaCir = "";
$fcaducidadCir = "";
$docPDFRev1 = "";
$docPDFCir1 = "";
$docPDFAsegur1 = "";
$docPDFOtrosVh1 = "";

$consultaJefeDirecto = consultaJefeDirecto($rutAsig);
$nombreJefe = $consultaJefeDirecto[0]['JEFE'];
$emailJefe = $consultaJefeDirecto[0]['EMAIL'];
$rutJefe = $consultaJefeDirecto[0]['RUT'];

ob_start();
?>
<page>
<table style="margin-top: 0px; margin-left: 40px; width: 100%; max-width: 100%; min-width: 100%;">
	<tr>
	</tr>
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; margin-top:" src="../../view/img/logoInformes.jpg"></td>
					<td style="max-width: 358px; min-width: 358px; width: 358px; ">
						<table style="margin-top: 30px;">
							<TR>
								<td style="padding-left: 0px; font-size: 17px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Entrega de Vehículo a Cargo</td>
							</TR>
						</table>
					</td>
					<td style="max-width: 210px; min-width: 210px; width: 210px;"></td>
				</tr>
			</table>
		</td>
		<td style="max-width: 210px; min-width: 210px; width: 210px;"></td>
	</tr>
</table>
<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; border: 1px solid black; text-align: center;">
			<font style="font-weight: bold; font-size: 12px;">
				Departamento de Flota y Combustible -
                <?php
				echo $nombreEmpresa[0]['name_epsa'];
				?>
			</font>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
						<!-- Elementos contenido area 1 -->
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Nombre:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['NOMBRE'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Area Negocio:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['NEGOCIO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Rut:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['DNI'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Fecha:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['FECHA'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Bodega:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['COMUNA'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Guía interna:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['IDPATENTE_ASIGNACIONES'];
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black; border-bottom: 0;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
						<!-- Elementos contenido area 1 -->
						<table style="width: 100%; max-width: 100%; min-width: 100%; margin-bottom: 10px; font-size: 16px;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<span style="font-weight: bold;">Detalle del vehículo:</span>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Patente:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['CODIGO'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>&nbsp;</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									&nbsp;
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Marca:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['MARCA'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Modelo:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['MODELO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>Año:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['ANO'];
									?>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<b>KM:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['KILOMETRAJE'];
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black; border-top: 0;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<span style="font-weight: bold;">Observaciones:</span>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<?php
										echo '<br/>' . $datos[0]['OBSERVACION'];
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%; margin-top: 20px;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%; margin-bottom: 10px; font-size: 16px;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<span style="font-weight: bold;">Condiciones generales</span>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%; margin-left: -15px;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: justify; padding-left: 0; padding-right: 0;">
									<ol>
										<?php
										for($i = 0; $i < count($clausulas); $i=$i+1){
											 echo '<li style="padding-bottom: 10px;"> ' . $clausulas[$i]["CLAUSULA"] . ' </li>';
										}
										?>
									</ol>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%; margin-bottom: 10px; font-size: 16px;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<span style="font-weight: bold;">Estado del vehículo</span>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: justify;">
									El técnico a cargo declara recibir, en este acto, el vehículo referido en perfecto estado mecánico y de funcionamiento.
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%;">
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">

								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
									<hr style="height: 0.5px;"/>
									Entrega conforme
									<br>
									<?php
										echo $datos[0]['PERSONAL'] . "<br>" . $_SESSION['rutUser'];
									?>
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">

								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
									<hr style="height: 0.5px;"/>
									Recibe conforme
									<br>
									<?php
										echo $datos[0]['NOMBRE'] . "<br>" . $datos[0]['DNI'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">

								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">

</table>
<page_footer>
    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[[page_cu]] -->
</page_footer>
</page>
<?php
$html = ob_get_clean();

// $document = 'C:\wamp64\www\audezentis\controller\repo\ast';
//$document = 'C:\wamp64\www\operaciones\controller\repositorio\flota\asignacion';
$html2pdf = new Html2Pdf('P','LETTER','es','true','UTF-8');
$html2pdf->writeHTML($html);
if($contadorChecklist == 2 && $contadorLic == 2 && $contadorAsig == null){
	$html2pdf->output($document . '/asignacion_' . $random . '.pdf', 'F');
	$pdfAsignacion = 'asignacion_' . $random . '.pdf';
	actualizarAsignacionVehiculo($idAsig, $pdfAsignacion);
	echo '/asignacion_' . $random . '.pdf';
}
else if($contadorChecklist == 2 && $contadorLic == 2 && $contadorAsig == 2){
	actualizarEstadoAsignacion($idAsig);
	ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
	$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
	$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
	$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);
	ingresarNotificacionAsignacionVeh($rutJefe, 'Asignación', "Le informamos que la siguiente patente " . $patente . " asignada a " . $personalAsig . "<br /> cambió de estado de asignación (En Revisión)", "#/notificaciones", "Patente asignada cambió de estado<br>" .  $patente, "Patente asignada en Revisión");
	enviarEmailAsignacionVehiculo($patente, $personalAsig, $nombreJefe, $emailJefe);
}
else{
	echo "Sin_datos";
}
?>
