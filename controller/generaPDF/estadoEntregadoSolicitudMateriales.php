<?php
//ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require '../html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('../../model/consultas.php');
session_start();
$ruta = str_replace("generaPDF", "", getcwd());
$document = $ruta . 'repositorio/materiales';
$random = md5(rand());
use Spipu\Html2Pdf\Html2Pdf;
$observ = $_POST['observ'];
$folio = $_POST['folio'];
$rutPersEntrega = $_POST['rutPersEntrega'];
$nombrePersEntrega = $_POST['nombrePersEntrega'];
$guiaDespacho = $_POST['guiaDespacho'];
$datos = $_POST['datos'];
$datos2 = json_decode($datos, true);
$idOtCub = $datos2[0]['idOtCub'];
$info = infoMaterialesEntrega($idOtCub);
$rutUsuario = $_SESSION['rutUser'];
$nombreEmpresa = nombreLogin($_POST['url']);
$usuarioLogistico = checkUsuarioSinPassPorRut($rutUsuario);
//var_dump($usuarioLogistico);
$row = ingresoMaterialEntrega($guiaDespacho,$observ);
$idEntrega = intval($row[0]['LAST_INSERT_ID()']);
$datos3 = json_decode($datos, true);
foreach ($datos3 as $value){
		$id = $value['idOtCub'];
		$row2 = updateObrasSolMat($id,$folio,$idEntrega);
}

$rowEstatus = estadosMaterialesEnPedido($folio);
$cantidad = 0;
$idHijo = 0;
for($i = 0; $i < count($rowEstatus); $i++){
	if($i == 0){
		$idHijo = $rowEstatus[$i]['IDOBRA_SOL_MAT_ESTADO'];
	}
	$cantidad++;
	if($cantidad == 2){
		break;
	}
}
$rowActAnt = actualizaEstadoAnticipo($folio, $cantidad, $idHijo);

ob_start();
?>
<page>
<table style="margin-top: 0px; margin-left: 40px; width: 100%; max-width: 100%; min-width: 100%;">
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 160px; min-width: 160px; width: 160px;">
						LOGO
					</td>
					<!-- <td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; width: 30px; min-width: 30px; max-width: 30px;"
						<?php
							//echo "src='" . $_POST['url'] .  "controller/cargarLogo.php?url=" . $_POST['url'] . "'";
						?>
					></td> -->
					<td style="max-width: 480px; min-width: 480px; width: 480px; padding-left: 0px; font-size: 14px; font-weight: bold; text-align: right;">
						Nº Doc. Entrega:
						<?php
						echo $idEntrega;
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 640px; min-width: 640px; width: 640px; padding-left: 0px; font-size: 17px; font-weight: bold; text-align: center;">
						Entrega de Materiales
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
	<tr>
		<td style="max-width: 640px; min-width: 640px; width: 640px; ">
			<table style="margin-top: 10px;">
				<tr>
					<td style="max-width: 640px; min-width: 640px; width: 640px; padding-left: 0px; font-size: 12px; font-weight: bold; text-align: center;">
						Departamento de Logística -
						<?php
						echo $nombreEmpresa[0]['name_epsa'];
						?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width: 100%; max-width: 100%; min-width: 100%;">
			<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
				<tr>
					<td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">
						<!-- Elementos contenido area 1 -->
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>OE:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['OE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Tipo OE:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['TIPO_OE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>OT:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['OT'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
              <tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Comuna:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['COMUNA'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Orden mandante:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['ORDEN_MANDANTE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>P.E.:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['PE'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
              <tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Bodega:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $datos3[0]['bodega'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Brigada:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['BRIGADA'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Gestor mandante:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['GESTOR_MANDANTE'];
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Cliente:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['CLIENTE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Dirección cliente:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										echo $info[0]['DIRECCION_CLIENTE'];
									?>
								</td>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Fecha:</b>
								</td>
								<td style="width: 22%; max-width: 22%; min-width: 22%; text-align: left;">
									<?php
										$fecha = date('Y-m-d h:i:s a', time());
										echo $fecha;
									?>
								</td>
							</tr>
						</table>
            <table style="width: 100%; max-width: 100%; min-width: 100%;">
							<tr>
								<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: left;">
									<b>Usuario logística:</b>
								</td>
								<td style="width: 85%; max-width: 85%; min-width: 85%; text-align: left;">
									<?php
										echo $usuarioLogistico['NOMBRE'].' / '.$rutUsuario;
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
										echo $observ;
									?>
								</td>
							</tr>
						</table>
						<table style="width: 100%; max-width: 100%; min-width: 100%; text-align: center; margin-top: 15px; text-align: center; ">
							<tr>
								<th style="width: 100%; max-width: 100%; min-width: 100%; text-align: center;">
									Listado de materiales
								</th>
							</tr>
						</table>
            <table style="width: 100%; max-width: 100%; min-width: 100%; margin-top: 10px; padding: 0; border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Código material</b>
                    </th>
                    <th style="width: 7%; max-width: 7%; min-width: 7%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Código interno</b>
                    </th>
                    <th style="width: 10%; max-width: 10%; min-width: 10%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">SIMA/SAP (Cliente)</b>
                    </th>
                    <th style="width: 30%; max-width: 30%; min-width: 30%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Descripción</b>
                    </th>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Unidad medida</b>
                    </th>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Cantidad solicitada</b>
                    </th>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Cantidad entregada</b>
                    </th>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Folio gema</b>
                    </th>
                    <th style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                        <b style="font-weight: bold; font-size: 8px;">Guía despacho</b>
                    </th>
                </tr>
                  <?php
                  $datos1 = json_decode($datos, true);
                  foreach ($datos1 as $value){
                      $codmat = $value['codmat'];
                      $codin = $value['codin'];
                      $codmand = $value['codmand'];
                      $desc = $value['desc'];
                      $cant = $value['cant'];
                      $folcor = $value['folcor'];
											$um = $value['um'];
                      echo '<tr>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $codmat . '</b>
                      </td>';
                      echo '<td style="width: 7%; max-width: 7%; min-width: 7%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $codin . '</b>
                      </td>';
                      echo '<td style="width: 10%; max-width: 10%; min-width: 10%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $codmand . '</b>
                      </td>';
                      echo '<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $desc . '</b>
                      </td>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $um . '</b>
                      </td>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $cant . '</b>
                      </td>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $cant . '</b>
                      </td>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $folcor . '</b>
                      </td>';
                      echo '<td style="width: 8%; max-width: 8%; min-width: 8%; text-align: center; border: 1px solid black;">
                          <b style="font-weight: bold; font-size: 8px;">' . $guiaDespacho . '</b>
                      </td>';
                      echo '</tr>';
                  }
                   ?>
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
													echo $usuarioLogistico['NOMBRE'] . "<br>" . $rutUsuario;
												?>
											</td>
											<td style="width: 20%; max-width: 20%; min-width: 20%; text-align: left;">

											</td>
											<td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
												<hr style="height: 0.5px;"/>
												Firma Recibe
												<br>
												<?php
													echo $nombrePersEntrega . "<br>" . $rutPersEntrega;
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
$html2pdf->output($document . '/entregaMat_' . $random . '.pdf', 'F');
$pdfEntrega = 'entregaMat_' . $random . '.pdf';
actualizarMaterialEntrega($idEntrega,$pdfEntrega,$rutPersEntrega,$nombrePersEntrega);
echo '/entregaMat_' . $random . '.pdf';
?>
