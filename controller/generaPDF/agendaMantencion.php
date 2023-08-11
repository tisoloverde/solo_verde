<?php
// ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/flota/mantenciones/agenda';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

// $_POST['url'] = 'https://integracion.supply-equans.cl/';
// $idMantencion = 98;

$idMantencion = $_POST['idMantencion'];
$rutUsuario = $_SESSION['rutUser'];
$datos = consultaDatosMantencionPdf($idMantencion);
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
								<td style="padding-left: 0px; font-size: 17px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Agendamiento para taller</td>
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
				Departamento de Flota -
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
								<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
									<b style="font-weight: bold; font-size: 13px;">Datos de Agenda</b>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Fecha:</b>
								</td>
								<td style="width: 30%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['FECHA'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Hora:</b>
								</td>
								<td style="width: 20%; max-width: 30%; min-width: 30%; text-align: left;">
									<?php
										echo $datos[0]['RANGO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Teléfono:</b>
								</td>
								<td style="width: 15%; max-width: 25%; min-width: 25%; text-align: left;">
									<?php
										echo $datos[0]['CELULAR_PERSONAL'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Motivo:</b>
								</td>
								<td style="width: 30%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['MOTIVO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Siniestro:</b>
								</td>
								<td style="width: 45%; max-width: 65%; min-width: 65%; text-align: left;">
									<?php
										echo $datos[0]['SINIESTRO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Taller:</b>
								</td>
								<td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $datos[0]['TALLER'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Contacto:</b>
								</td>
								<td style="width: 30%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $datos[0]['CONTACTO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Teléfono:</b>
								</td>
								<td style="width: 45%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $datos[0]['TELEFONO'];
									?>
								</td>
							</tr>
						</table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Dirección:</b>
								</td>
								<td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $datos[0]['DIRECCION_TALLER'];
									?>
								</td>
							</tr>
						</table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Aseguradora:</b>
								</td>
								<td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										$var1 = $datos[0]['RUT_ASEG'] . " / " . $datos[0]['ASEGURADORA'];
										echo $var1;
									?>
								</td>
							</tr>
						</table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b style="font-weight: bold; font-size: 13px;">Datos del vehículo</b>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Patente:</b>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <?php
                                        echo $datos[0]['CODIGO'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Marca:</b>
                                </td>
                                <td style="width: 15%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MARCA'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Modelo:</b>
                                </td>
                                <td style="width: 15%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MODELO'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>KM:</b>
                                </td>
                                <td style="width: 15%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['KILOMETRAJE'];
                                    ?>
                                </td>
                            </tr>
                         </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b style="font-weight: bold; font-size: 13px;">Datos Confirmación</b>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Nombre:</b>
                                </td>
                                <td style="width: 25%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <?php
                                        echo $datos[0]['PERSONAL'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Correo:</b>
                                </td>
                                <td style="width: 25%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['CORREO_PERSONAL'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Teléfono:</b>
                                </td>
                                <td style="width: 15%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['CELULAR_PERSONAL'];
                                    ?>
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

$html2pdf = new Html2Pdf('P','LETTER','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output($document . '/agenda_' . $random . '.pdf', 'F');
$pdfAgenda = 'agenda_' . $random . '.pdf';
actualizarMantencionAgenda($idMantencion, $pdfAgenda);
echo '/agenda_' . $random . '.pdf';
?>
