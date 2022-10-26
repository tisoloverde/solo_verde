<?php
ini_set('display_errors', 'Off');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
require('../envioEmailAsignacionVehiculo.php');
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/ti/asignacion';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

$id = $_POST['id'];

$nombreEmpresa = nombreLogin($_POST['url']);
$datosBasicos = datosPDFCargosTI($_POST['id']);
$cargos = datosPDFCargosAsignados($_POST['id']);

$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fecha = strtotime('+0 day');
$fechaFormateada = $dias[date('w', $fecha)] . ', ' . date('d', $fecha) . ' de ' . $meses[date('n', $fecha)-1] . ' de ' . date('Y', $fecha);

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
					<td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; margin-top:"
						<?php
							echo "src='" . $_POST['url'] .  "controller/cargarLogo.php?url=" . $_POST['url'] . "'";
						?>
					></td>
					<td style="max-width: 358px; min-width: 358px; width: 358px; ">
					</td>
					<td style="max-width: 210px; min-width: 210px; width: 210px;"></td>
				</tr>
			</table>
		</td>
		<td style="max-width: 210px; min-width: 210px; width: 210px;"></td>
	</tr>
</table>
<table style="margin-top: 0px; margin-left: 40px; width: 100%; max-width: 100%; min-width: 100%;">
	<tr>
	</tr>
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 160px; min-width: 160px; width: 160px;"></td>
					<td style="max-width: 358px; min-width: 358px; width: 358px; ">
						<table style="margin-top: 0px;">
							<TR>
								<td style="padding-left: 0px; font-size: 13px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">ANEXO DE CONTRATO DE TRABAJO
																			<br>
																			ENTREGA DE EQUIPO TECNOLÓGICO Y AUTORIZACIÓN</td>
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
		<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; text-align: justify;"><br><br>
			<font style="font-size: 12px;">En Santiago de Chile, a <?php echo $fechaFormateada ?>, entre <b><?php echo $datosBasicos[0]['SOCIEDAD'] ?> RUT <?php echo $datosBasicos[0]['RUT_SOCIEDAD'] ?></b>, en adelante la "Empresa", representada por don Aldo Torres, cédula de identidad Nº8.711.799-5 y don Christian Díaz, cédula de identidad Nº23.410.525-6, ambos con domicilio en Av. Andres Bello N°2325, Piso 5°, de la comuna de Providencia, ciudad de Santiago, por una parte, y por la otra, el señor(a) <b><?php echo $datosBasicos[0]['NOMBRE'] ?></b> de identidad N° <b><?php echo $datosBasicos[0]['DNI'] ?></b> en adelante el "Trabajador", se ha convenido lo siguiente:
			<br><br>
			<b>PRIMERO:</b> Las partes dejan constancia que el Trabajador se desempeña en el cargo de <b><?php echo $datosBasicos[0]['CARGO'] ?></b>, funciones en el proyecto u área denominada <b><?php echo $datosBasicos[0]['NOMBRE_PROYECTO'] ?></b>
			<br><br>
			<b>SEGUNDO:</b> Para efectos del ejercicio de las funciones que realiza el Trabajador de acuerdo con el marco de su Contrato de Trabajo, la Empresa con esta fecha hace entrega al Trabajador el siguiente equipo tecnológico necesario para el desempeño de sus funciones:
			<br><br>
			</font>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; text-align: justify;">
			<table>
				<tr>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Serie</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Tipo</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Marca</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Modelo</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Imei</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Linea</td>
					<td style="font-weight: bold; width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">Valor Ref.</td>
				</tr>
				<?php
					for($i = 0; $i < count($cargos); $i++){
						echo '<tr>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['SERIE'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['TIPO'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['MARCA'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['MODELO'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['IMEI'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">' .$cargos[$i]['LINEA'] . '</td>';
						echo '<td style="width: 90px; max-width: 90px; min-width: 90px; border: 1px solid black;">$ ' .number_format($cargos[$i]['VALOR_REFERENCIAL']). '</td>';
						echo '</tr>';
					}
				?>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; text-align: justify;"><br><br>
			<font style="font-size: 12px;">
			<b>TERCERO:</b> El Trabajador declara recibir en perfecto estado de conservación y funcionamiento el equipo tecnológico que se individualiza en la cláusula anterior, para su uso exclusivo en el desempeño de los servicios encomendados por la Empresa y prestados por el Trabajador en el marco de su Contrato de Trabajo, y se obliga a cuidarlo, mantenerlo y devolverlo en el mismo estado, habida consideración del desgaste por el uso legítimo y el transcurso del tiempo.
			<br><br>
			<b>CUARTO:</b> En caso de robo, hurto, pérdida o destrucción del equipo tecnológico a cargo del Trabajador por causas exclusivas de su responsabilidad, las partes acuerdan y, así lo entiende expresamente el Trabajador, que la Empresa tendrá la facultad de cobrar al Trabajador el valor de reposición o reparación del referido equipo, descontándolo de las remuneraciones del Trabajador, o bien de su Finiquito al Contrato de Trabajo, en el evento que éste renuncie a su trabajo o termine la relación laboral por cualquier causa, sin haber hecho devolución del equipo.
			<br><br>
			<b>QUINTO:</b> El Trabajador y la Empresa acuerdan que en todo lo no modificado expresamente por este instrumento, se mantienen plenamente vigentes las estipulaciones contenidas en el Contrato de Trabajo y sus modificaciones posteriores.
			<br><br>
			<b>SEXTO:</b> El presente Anexo del Contrato de Trabajo se firma en dos ejemplares, quedando uno en poder del Trabajador y uno en poder del Empleador.
			</font>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%; margin-top: 160px;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">

								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
									<hr style="height: 0.5px;"/>
									Entrega conforme
									<br><br>
									<b><?php echo $datosBasicos[0]['SOCIEDAD'] ?>
									<br>
									RUT
									<?php echo $datosBasicos[0]['RUT_SOCIEDAD'] ?>
									</b>
									<br>
									Empleador
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">

								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
									<hr style="height: 0.5px;"/>
									Recibe conforme
									<br><br>
									<b><?php echo $datosBasicos[0]['NOMBRE'] ?>
									<br>
									CI N°
									<?php echo $datosBasicos[0]['DNI'] ?>
									</b>
									<br>
									Trabajador
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
$html2pdf->output($document . '/asignacion_' . $random . '.pdf', 'F');

if(file_exists($document . '/asignacion_' . $random . '.pdf')){ //Linux
	$pdfAsignacion = 'asignacion_' . $random . '.pdf';
	actualizaPDFCargoTI($_POST['id'], $pdfAsignacion);
	echo '/asignacion_' . $random . '.pdf';
}
else{
  echo "Sin datos";
}

?>
