<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/flota/siniestros/declaracion';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

$idSiniestro = $_POST['idSiniestro'];
$rutUsuario = $_SESSION['rutUser'];
$datos = consultaDatosSiniestro($idSiniestro);
$nombreEmpresa = nombreLogin($_POST['url']);

ob_start();
?>
<page>
<table style="margin-top: 50px; margin-left: 40px; width: 100%; max-width: 100%; min-width: 100%;">
	<tr>
	</tr>
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; margin-bottom: 0px;"
						<?php
							echo "src='" . $_POST['url'] .  "controller/cargarLogo.php?url=" . $_POST['url'] . "'";
						?>
					></td>
					<td style="max-width: 358px; min-width: 358px; width: 358px; ">
						<table style="margin-top: 30px;">
							<TR>
								<td style="padding-left: 0px; font-size: 22px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Declaración del Siniestro</td>
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
<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; margin-top: 20px;">
    <tr>
        <td style="width: 80%; max-width: 80%; min-width: 80%; text-align: justify; font-size: 16px; margin-bottom: 10px;">
            <b style="font-weight: normal;">Yo:&nbsp;</b> <span style="font-weight: bold;"><?php echo $datos[0]['PERSONAL'];?></span><b style="font-weight: normal;">,&nbsp;DNI:&nbsp;</b><span style="font-weight: bold;"><?php echo $datos[0]['DNI'];?></span><b>.</b>
            <b style="font-weight: normal;">Declaro estar en conocimiento del siniestro con folio </b><span style="font-weight: bold;"><?php echo $datos[0]['FOLIO'];?></span><b style="font-weight: normal;">, informado con fecha </b><span style="font-weight: bold;"><?php echo $datos[0]['FECHA'];?></span><b>,</b>
            <b style="font-weight: normal;">hora </b> <span style="font-weight: bold;"><?php echo $datos[0]['HORA'];?></span><b style="font-weight: normal;"> para el vehículo con patente </b> <span style="font-weight: bold;"><?php echo $datos[0]['CODIGO'];?></span><b>.</b><br/><br/><br/>
            <b style="font-weight: normal;">Descripción:</b><br/>
            <span style="font-weight: bold;"><?php echo $datos[0]['DESCRIPCION'];?></span><br/><br/><br/>
			<b style="font-weight: normal;">Daños del Vehículo Asegurado:</b><br/>
			<span style="font-weight: bold;"><?php echo $datos[0]['PIEZAS_DANADAS'];?></span><br/><br/><br/>
			<b style="font-weight: normal;">Detalles del siniestro se encuentran en el formulario de ingreso con folio </b><span style="font-weight: bold;"><?php echo $datos[0]['FOLIO'];?></span><b>.</b><br/>
        </td>
    </tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%;">
			<br/>
			<br/>
			<br/>
			<table style="font-size: 17px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left; margin-bottom: 10px;">
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">

								</td>
								<td style="width: 40%; max-width: 40%; min-width: 40%; text-align: center;">
									<hr style="height: 0.5px;"/>
									<br>
									<?php
										echo $datos[0]['PERSONAL'] . "<br>" . $datos[0]['DNI'];
									?>
								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">

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
$html2pdf->output($document . '/declaracion_' . $random . '.pdf', 'F');
$pdfDeclaracion = 'declaracion_' . $random . '.pdf';
actualizarSiniestroDeclaracion($idSiniestro, $pdfDeclaracion);
echo '/declaracion_' . $random . '.pdf';
?>
