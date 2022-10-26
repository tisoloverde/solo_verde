<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/flota/siniestros/formulario';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;

$idSiniestro = $_POST['idSiniestro'];
$rutUsuario = $_SESSION['rutUser'];
$datos = consultaDatosSiniestro($idSiniestro);
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
					<td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; margin-top:"
						<?php
							echo "src='" . $_POST['url'] .  "controller/cargarLogo.php?url=" . $_POST['url'] . "'";
						?>
					></td>
					<td style="max-width: 358px; min-width: 358px; width: 358px; ">
						<table style="margin-top: 30px;">
							<TR>
								<td style="padding-left: 0px; font-size: 17px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Formulario Ingreso Siniestro</td>
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
									<b>Antecedentes del Conductor</b>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Rut:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['DNI'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Nombre:</b>
								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
									<?php
										echo $datos[0]['PERSONAL'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Correo:</b>
								</td>
								<td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
									<?php
										echo $datos[0]['CORREO_PERSONAL'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Telefono:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['CELULAR_PERSONAL'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Comuna:</b>
								</td>
								<td style="width: 65%; max-width: 65%; min-width: 65%; text-align: left;">
									<?php
										echo $datos[0]['COMUNA_PERSONAL'];
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
										echo $datos[0]['DIRECCION_PERSONAL'];
									?>
								</td>
							</tr>
						</table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b>Antecedentes del Siniestro</b>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Folio:</b>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <?php
                                        echo $datos[0]['FOLIO'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Fecha:</b>
                                </td>
                                <td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['FECHA'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Hora:</b>
                                </td>
                                <td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['HORA'];
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
                                        echo $datos[0]['DIRECCION'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Comuna:</b>
                                </td>
                                <td style="width: 20%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <?php
                                        echo $datos[0]['COMUNA'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>N° Parte:</b>
                                </td>
                                <td style="width: 20%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['N_PARTE'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Comisaria:</b>
                                </td>
                                <td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['COMISARIA'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b>Datos Vehículo Asegurado</b>
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
                                <td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MARCA'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Modelo:</b>
                                </td>
                                <td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MODELO'];
                                    ?>
                                </td>
                            </tr>
                         </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Año:</b>
                                </td>
                                <td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
                                    <?php
                                        echo $datos[0]['ANO'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <b>Piezas Dañadas:</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 65%; max-width: 65%; min-width: 65%; text-align: left;">
                                    <?php
                                        echo $datos[0]['PIEZAS_DANADAS'];
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
						<!-- Elementos contenido area 1 -->
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
									<b>Antecedentes del Tercero</b>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Nombre:</b>
								</td>
								<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
									<?php
										echo $datos[0]['NOMBRE_TERCERO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Correo:</b>
								</td>
								<td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
									<?php
										echo $datos[0]['CORREO_TERCERO'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Teléfono:</b>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<?php
										echo $datos[0]['CELULAR_TERCERO'];
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
										echo $datos[0]['DIRECCION_TERCERO'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Comuna:</b>
								</td>
								<td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $datos[0]['COMUNA_TERCERO'];
									?>
								</td>
							</tr>
						</table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b>Datos Vehículo Tercero</b>
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
                                        echo $datos[0]['PATENTE_TERCERO'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Marca:</b>
                                </td>
                                <td style="width: 30%; max-width: 30%; min-width: 30%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MARCA_TERCERO'];
                                    ?>
                                </td>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Modelo:</b>
                                </td>
                                <td style="width: 25%; max-width: 25%; min-width: 25%; text-align: left;">
                                    <?php
                                        echo $datos[0]['MODELO_TERCERO'];
                                    ?>
                                </td>
                            </tr>
                         </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Año:</b>
                                </td>
                                <td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
                                    <?php
                                        echo $datos[0]['ANO_TERCERO'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 95%; max-width: 95%; min-width: 30%; text-align: left;">
                                    <b>Piezas Dañadas:</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 95%; max-width: 95%; min-width: 65%; text-align: left;">
                                    <?php
                                        echo $datos[0]['PIEZAS_DANADAS_TERCERO'];
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 15px;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b>Daños a infraestructura</b>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Tipo:</b>
                                </td>
                                <td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
                                    <?php
                                        echo $datos[0]['TIPO_INFRA'];
                                    ?>
                                </td>
                            </tr>
                         </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
                                    <b>Observación:</b>
                                </td>
                                <td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
                                    <?php
                                        echo $datos[0]['OBS_INFRA'];
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
                        <!-- Elementos contenido area 1 -->
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
                                    <b>Descripción</b>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%; max-width: 100%; min-width: 100%;">
                            <tr>
                                <td style="width: 95%; max-width: 95%; min-width: 95%; text-align: left;">
                                    <?php
                                        echo $datos[0]['DESCRIPCION'];
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
$html2pdf->output($document . '/formulario_' . $random . '.pdf', 'F');
$pdfFormulario = 'formulario_' . $random . '.pdf';
actualizarSiniestroFormulario($idSiniestro, $pdfFormulario);
echo '/formulario_' . $random . '.pdf';
?>
