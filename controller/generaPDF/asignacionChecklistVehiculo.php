<?php
// ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/flota/asignaciones/checklist';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

$idAsig = $_POST['idAsig'];
$rutUsuario = $_SESSION['rutUser'];
$datos = consultaDatosAsignacion($idAsig, $rutUsuario);
$datos_check = consultaCheckboxsAsignacion($idAsig);
$nombreEmpresa = nombreLogin($_POST['url']);

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
								<td style="padding-left: 0px; font-size: 17px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Entrega de Vehículo</td>
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
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Nombre:</b>
								</td>
								<td style="width: 35%; max-width: 35%; min-width: 35%; text-align: left;">
									<?php
										echo $datos[0]['NOMBRE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Rut:</b>
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">
									<?php
										echo $datos[0]['DNI'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Fono:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['TELEFONO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Marca:</b>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<?php
										echo $datos[0]['MARCA'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Año:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['ANO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Modelo:</b>
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">
									<?php
										echo $datos[0]['MODELO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Patente:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['CODIGO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>KM:</b>
								</td>
								<td style="width: 15%; max-width: 15%; min-width: 15%; text-align: left;">
									<?php
										echo $datos[0]['KILOMETRAJE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Fecha:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['FECHA'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Prox. Mant:</b>
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">
									<?php
										echo $datos[0]['FMANTENIMIENTO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Folio:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
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
		<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black;">
		<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
						<?php
							for($i = 0; $i < count($datos_check); $i=$i+3){
								if($i < count($datos_check)){
									echo '<table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 3px; margin-bottom: 3px;">
										<tr>
										<td style="width: 3%; max-width: 3%; min-width: 3%; text-align: left;">
											';
											if($datos_check[$i]["DATO"] === 'Si'){
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="check.png"></td>';
											}
											else{
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="no_check.png"></td>';
											}
									echo '
										</td>
										<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
											' . $datos_check[$i]["ITEM"] . '
										</td>';
								}
								if($i+1 < count($datos_check)){
									echo '<td style="width: 3%; max-width: 3%; min-width: 3%; text-align: left;">
											';
											if($datos_check[$i+1]["DATO"] === 'Si'){
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="check.png"></td>';
											}
											else{
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="no_check.png"></td>';
											}
									echo '
										</td>
										<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
											' . $datos_check[$i+1]["ITEM"] . '
										</td>';
								}
								if($i+2 < count($datos_check)){
									echo '<td style="width: 3%; max-width: 3%; min-width: 3%; text-align: left;">
											';
											if($datos_check[$i+2]["DATO"] === 'Si'){
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="check.png"></td>';
											}
											else{
												echo '<td style="border: 1px solid black; width: 3px; max-width: 3px; text-align: center;"><img style="height: 10px; min-height: 10px; max-height: 10px; width: 10px; min-width: 10px; max-width: 10px;" src="no_check.png"></td>';
											}
									echo '
										</td>
										<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
											' . $datos_check[$i+2]["ITEM"] . '
										</td>';
								}
								echo '</tr>
									</table>';
							}
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
									<span style="font-weight: bold;">Observación</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; vertical-align: top;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 49%; max-width: 49%; min-width: 49%; text-align: left;">
									<?php
										echo '<br/>' . $datos[0]['OBSERVACION'];
									?>
								</td>
								<td style="width: 49%; max-width: 49%; min-width: 49%; text-align: center;">
									<?php
										echo '<img src="../../view/img/' . $datos[0]['TIPOVEH'] . '.jpg">';
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
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
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
									Firma Entrega
									<br>
									<?php
										echo $datos[0]['PERSONAL'] . "<br>" . $_SESSION['rutUser'];
									?>
								</td>
								<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">

								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
									<hr style="height: 0.5px;"/>
									Firma Recibe
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
$html2pdf->output($document . '/checklist_' . $random . '.pdf', 'F');
$pdfChecklist = 'checklist_' . $random . '.pdf';
actualizarAsignacionChecklist($idAsig, $pdfChecklist);
echo '/checklist_' . $random . '.pdf';
?>
