<?php
//ini_set('display_errors', 'On');
require '/home/tumundoapp/public_html/operaciones/controller/html2pdf/vendor/autoload.php';
date_default_timezone_set("America/Santiago");
require('/home/tumundoapp/public_html/operaciones/controller/generaPDF/consultas_auto.php');
session_start();
// error_reporting(E_ERROR | E_WARNING | E_PARSE);

use Spipu\Html2Pdf\Html2Pdf;

$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$fecha = strtotime('-0 day');
$fecha = date('d', $fecha)." de ".$meses[date('n', $fecha)-1]. " de ".date('Y', $fecha);

$pdfVac = formulariosSinPDF();

for($cicloPdf = 0; $cicloPdf <= count($pdfVac); $cicloPdf++){
	$id = $pdfVac[$cicloPdf]['ID'];
	$_POST['url'] = 'https://operaciones.tumundoapp.cl/';

	// $ruta = str_replace("generaPDF", "", getcwd());
	$ruta = '/home/tumundoapp/public_html/operaciones/controller/';

	$row = consultaPracticaGuardada($id);
	$row = $row[0];

	$document = $ruta . 'repositorio/practica'; //Linux
	$random = md5(rand());

	$row2 = consultaPracticaResultadoGuardada($id);

	$chequeaFoto = array();

	for($i = 0; $i < count($row2); $i++){
		$categoria = $row2[$i]['CATEGORIA'];
		for($j = 0; $j < count($categoria); $j++){
			$ch4 = curl_init();
			$url = $_POST['url'] .  "/controller/cargarFotoAudit.php?idFORMULARIO=" . $categoria[$j]['idFORMULARIO'] . "&TEXTOFAMILIA=" . urlencode($categoria[$j]['TEXTOFAMILIA']) . "&CATEGORIA=" . $categoria[$j]['CATEGORIA'] . "&TIPOAUDITORIAid=" . $categoria[$j]['TIPOAUDITORIAid'];
			curl_setopt($ch4, CURLOPT_URL, $url);
			curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
			$content4 = curl_exec($ch4);

			if($content4 !== 'Sin datos' && $content4 !== ''){
				$chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] = $ruta . 'repositorio/practica/img/' . $content4;
			}
			else{
				$chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] = 'Sin datos';
			}

			curl_close($ch4);

			$ch4 = curl_init();
			$url = $_POST['url'] .  "/controller/cargarFotoAudit2.php?idFORMULARIO=" . $categoria[$j]['idFORMULARIO'] . "&TEXTOFAMILIA=" . urlencode($categoria[$j]['TEXTOFAMILIA']) . "&CATEGORIA=" . $categoria[$j]['CATEGORIA'] . "&TIPOAUDITORIAid=" . $categoria[$j]['TIPOAUDITORIAid'];
			curl_setopt($ch4, CURLOPT_URL, $url);
			curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
			$content4 = curl_exec($ch4);

			if($content4 !== 'Sin datos' && $content4 !== ''){
				$chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png'] = $ruta . 'repositorio/practica/img/' . $content4;
			}
			else{
				$chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png'] = 'Sin datos';
			}

			curl_close($ch4);
		}
	}

	$ch4 = curl_init();
	$fp3 = fopen($ruta . 'repositorio/practica/logo.png', "w+");

	$url = $_POST['url'] .  "controller/cargarLogo.php?url=" . $_POST['url'];

	curl_setopt($ch4, CURLOPT_URL, $url);
	curl_setopt($ch4, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
	curl_setopt($ch4, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch4, CURLOPT_COOKIEFILE, $cookie);
	curl_setopt($ch4, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch4, CURLOPT_FILE, $fp3);
	$content4 = curl_exec($ch4);
	fwrite($fp3, $content4);
	fclose($fp3);

	curl_close($ch4);

	// echo "--------------------------<br>";
	// echo "<pre>";
	// var_dump($chequeaFoto);
	// echo "</pre>";
	// echo "<br>--------------------------<br>";

	//
	// echo "<pre>";
	// var_dump($chequeaFoto);
	// echo "</pre>";

	// echo "<pre>";
	// var_dump($row2);
	// echo "</pre>";

	ob_start();
	?>
	<!-- Contenido -->
	<page>
	<table style="margin-top: 10px; margin-left: 40px; width: 100%; max-width: 100%; min-width: 100%;">
		<tr>
			<td style="max-width: 160px; min-width: 160px; width: 160px;"><img style="margin-left: 0px; height: 30px; min-height: 30px; max-height: 30px; margin-top:"
				<?php
					echo "src='" . $ruta . 'repositorio/practica/logo.png' . "'";
				?>
			></td>
			<td style="max-width: 358px; min-width: 358px; width: 358px; ">
				<table style="margin-top: 30px;">
					<TR>
						<td style="padding-left: 0px; font-size: 17px; font-weight: bold; max-width: 358px; min-width: 358px; width: 358px; text-align: center; ">Auditoría Técnica</td>
					</TR>
				</table>
			</td>
			<td style="max-width: 210px; min-width: 210px; width: 210px;"></td>
		</tr>
	</table>
	<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
		<tr>
			<td style="background-color: #e8e8e8; width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; border: 1px solid black; text-align: center;">
				<font style="font-weight: bold; font-size: 12px;">
					Gerencia Operaciones PACIFICO CABLE SPA
				</font>
			</td>
		</tr>
	  <tr>
			<td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black; border-bottom: 0px;">
				<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
					<tr>
						<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: center;">
							<!-- Elementos contenido area 1 -->
							<table style="width: 100%; max-width: 100%; min-width: 100%;">
	              <tr>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<b>RUT Auditor</b>
									</td>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<?php
											echo $row['RUT'];
										?>
									</td>
								</tr>
	              <tr>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<b>Nombre Auditor</b>
									</td>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<?php
											echo $row['NOMBRE'];
										?>
									</td>
								</tr>
	              <tr>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<b>Fecha/Hora Generación</b>
									</td>
									<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
										<?php
											echo $row['FECHA'] . " " . $row['HORA'];
										?>
									</td>
								</tr>
	            </table>
	          </td>
	          <td style="width: 50%; max-width: 50%; min-width: 50%; text-align: center;">
	      			<table style="width: 100%; max-width: 100%; min-width: 100%;">
	              <tr>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<b>RUT Cliente</b>
	      					</td>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<?php
	      							echo $row['RUT_CLIENT'];
	      						?>
	      					</td>
	      				</tr>
	              <tr>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<b>Dirección Cliente</b>
	      					</td>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<?php
	      							echo $row['DIRECCION_CLIENTE'];
	      						?>
	      					</td>
	      				</tr>
	              <tr>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<b>Fecha Instalación</b>
	      					</td>
	      					<td style="width: 50%; max-width: 50%; min-width: 50%; text-align: left;">
	      						<?php
	      							echo $row['FECHA_INSTALACION'];
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
	<table style="margin-top: -1px; margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
		<tr>
			<td style="width: 100%; max-width: 100%; min-width: 100%; border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;">
				<table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;">
					<tr>
						<td style="width: 60%; max-width: 60%; min-width: 60%; text-align: center;">
							<!-- Elementos contenido area 1 -->
							<table style="width: 100%; max-width: 100%; min-width: 100%;">
	              <tr>
	      					<td style="width: 42%; max-width: 42%; min-width: 42%; text-align: left;">
	      						<b>N° Tarea</b>
	      					</td>
	      					<td style="width: 58%; max-width: 58%; min-width: 58%; text-align: left;">
	      						<?php
	      							echo $row['N_TAREA'];
	      						?>
	      					</td>
	      				</tr>
	              <tr>
									<td style="width: 42%; max-width: 42%; min-width: 42%; text-align: left;">
										<b>Tipo Auditoría</b>
									</td>
									<td style="width: 58%; max-width: 58%; min-width: 58%; text-align: left;">
										<?php
											echo $row['TIPO_AUDITORIA'];
										?>
									</td>
								</tr>
	              <tr>
									<td style="width: 42%; max-width: 42%; min-width: 42%; text-align: left;">
										<b>Tipo Prestación</b>
									</td>
									<td style="width: 58%; max-width: 58%; min-width: 58%; text-align: left;">
										<?php
											echo $row['TIPO_SERVICIO'];
										?>
									</td>
								</tr>
								<tr>
									<td style="width: 42%; max-width: 42%; min-width: 42%; text-align: left;">
										<b>Rut Técnico</b>
									</td>
									<td style="width: 58%; max-width: 58%; min-width: 58%; text-align: left;">
										<?php
											echo $row['RUTPERSONAL'];
										?>
									</td>
								</tr>
								<tr>
									<td style="width: 42%; max-width: 42%; min-width: 42%; text-align: left;">
										<b>Nombre Técnico</b>
									</td>
									<td style="width: 58%; max-width: 58%; min-width: 58%; text-align: left;">
										<?php
											echo $row['NOMBREPERSONAL'];
										?>
									</td>
								</tr>
							</table>
						</td>
	          <td style="width: 40%; max-width: 40%; min-width: 40%; text-align: center;">
							<!-- Elementos contenido area 1 -->
							<table style="width: 100%; max-width: 100%; min-width: 100%;">
	              <tr>
	                <td style="width: 30%; max-width: 30%; min-width: 30%; text-align: center;">
	      					</td>
	      					<td style="height: 40px; width: 70%; max-width: 70%; min-width: 70%; text-align: center; border: 1px solid black; font-size: 14px;">
	        				  <b>Folio:&nbsp;&nbsp;
										<?php
											echo $id;
										?>
										&nbsp;&nbsp;&nbsp;&nbsp;
										Nota:&nbsp;&nbsp;
	      						<?php
	      							echo $row['NOTA'];
	      						?>
	                  </b>
	      					</td>
	      				</tr>
	            </table>
	          </td>
	        </tr>
	      </table>
	    </td>
	  </tr>
	</table>
	<table style="margin-top: -1px; margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
		<tr>
			<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; border: 1px solid black; text-align: center;">
				<font style="font-weight: bold; font-size: 12px;">
					Evaluación
				</font>
			</td>
		</tr>
	</table>
	  <?php
		for($i = 0; $i < count($row2); $i++){
			echo '<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse; margin-top: 15px;"">';
	  	echo '<tr><td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black;">';
	    echo '<table style="background-color: #e8e8e8; width: 100%; max-width: 100%; min-width: 100%;"><tr><td style=" width: 100%; max-width: 100%; min-width: 100%; text-align: left;"><b style="font-size: 14px;">' . $row2[$i]['TEXTOFAMILIA'] . '</b>';
	    $categoria = $row2[$i]['CATEGORIA'];
			echo '</td></tr></table>';
			echo '</td></tr>';
			echo '</table>';
	    for($j = 0; $j < count($categoria); $j++){
				echo '<table style="margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse; margin-top: 2px;">';
		  	echo '<tr><td style="width: 100%; max-width: 100%; min-width: 100%; border: 1px solid black;">';
		    echo '<table style="width: 100%; max-width: 100%; min-width: 100%;"><tr><td style="width: 100%; max-width: 100%; min-width: 100%; text-align: left;">';
	      echo '<table style="margin-top: 5px; width: 100%; max-width: 100%; min-width: 100%;"><tr><td style="width: 100%; max-width: 100%; min-width: 100%; "><table style="font-size: 10px; width: 100%; max-width: 100%; min-width: 100%;"><tr><td style="width: 100%; max-width: 100%; min-width: 100%; text-align: center;"><table style="vertical-align: top; width: 100%; max-width: 100%; min-width: 100%;"><tr><td style="; width: 25%; max-width: 25%; min-width: 25%; text-align: left; font-size: 13px;"><b>' . $categoria[$j]['TEXTOCATEGORIA'] . ':</b></td><td rowspan="20" style="border-right: 1px solid #eeeeee; border-left: 1px solid #eeeeee; padding-left: 5px; padding-right: 5px; width: 30%; max-width: 30%; min-width: 30%; text-align: justify;"><b>Observación:<br><br></b> ' . $categoria[$j]['OBSERVACIONES'] . '</td><td rowspan="20" style="padding-left: 10px; width: 45%; max-width: 45%; min-width: 45%; text-align: left;">';
				echo '<b>Imagen:<br><br></b>';
				if($chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] != 'Sin datos'){
						list($ancho , $alto) = getimagesize($chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png']);
						if($ancho >= $alto){
							echo '<img style="margin-left: 0px; width: 250px; min-width: 250px; max-width: 250px;"';
							echo "src='" . $chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] . "'";
							echo '>';
						}
						else{
							echo '<img style="margin-left: 0px; height: 200px; min-height: 200px; max-height: 200px;"';
							echo "src='" . $chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] . "'";
							echo '>';
						}
				}
				if($chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png'] != 'Sin datos' && $chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png']  != 'Sin datos'){
					echo "<br><br>";
				}
				if($chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png']  != 'Sin datos'){
						list($ancho , $alto) = getimagesize($chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png']);
						if($ancho >= $alto){
							echo '<img style="margin-left: 0px; width: 250px; min-width: 250px; max-width: 250px;"';
							echo "src='" . $chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png'] . "'";
							echo '>';
						}
						else{
							echo '<img style="margin-left: 0px; height: 200px; min-height: 200px; max-height: 200px;"';
							echo "src='" . $chequeaFoto[$categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png'] . "'";
							echo '>';
						}
				}
				echo '</td></tr>';
	      $subfamilia1 = $categoria[$j]['SUBFAMILIA1'];
	      for($k = 0; $k < count($subfamilia1); $k++){
	        echo '<tr><td style=";  width: 25%; max-width: 25%; min-width: 25%; text-align: left;"><b>Estado: </b>' . $subfamilia1[$k]['TEXTOSUBFAMILIA1'] . '</td></tr>';

	        if($subfamilia1[$k]['TEXTOSUBFAMILIA1'] !== 'No aplica' && strpos($subfamilia1[$k]['TEXTOSUBFAMILIA1'], 'OK') === false){
	          echo '<tr><td style="; width: 25%; max-width: 25%; min-width: 25%; text-align: left;"><br><b>Problemas encontrados: </b></td></tr>';
						echo '<tr><td style=";  width: 25%; max-width: 25%; min-width: 25%; text-align: left;">';
	          $subfamilia2 = $subfamilia1[$k]['SUBFAMILIA2'];
	          for($m = 0; $m < count($subfamilia2); $m++){
	            echo '•&nbsp;&nbsp;Nota: ' . $subfamilia2[$m]['PUNTAJE'] . ' - ' . $subfamilia2[$m]['TEXTOSUBFAMILIA2'] . '<br>';
	          }
						echo '</td></tr>';
	        }
	      }
	      echo '</table></td></tr></table></td></tr></table>';
				echo '</td></tr></table>';
				echo '</td></tr>';
				echo '</table>';
	    }
		}
	  ?>
		<table style="margin-top: 10px; margin-left: 40px; width: 90%; max-width: 90%; min-width: 90%; height: 400px; max-height: 400px; min-height: 400px; border-spacing: 0 0; border-collapse : collapse;">
			<tr>
				<td style="width: 100%; max-width: 100%; min-width: 100%; height: 15px; max-height: 15px; min-height: 15px; text-align: left; font-size: 9px;">
					<?php
						echo '<qrcode value="' . $_POST['url'] . 'controller/repositorio/practica/practica_' . $random . '.pdf" ec="H" style="width: 30mm; background-color: white; color: black;"></qrcode>';
						echo '<br>';
						echo $random;
					?>
				</td>
			</tr>
		</table>
	<page_footer>
	    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[[page_cu]] -->
	</page_footer>
	</page>

	<?php
	$html = ob_get_clean();

	// $document = $ruta . 'repositorio\practica'; //Windows
	// $random = "hola";
	$html2pdf = new Html2Pdf('P','LETTER','es','true','UTF-8');
	$html2pdf->writeHTML($html);
	// $html2pdf->output($document . '\practica_' . $random . '.pdf', 'F'); //Windows
	$html2pdf->output($document . '/practica_' . $random . '.pdf', 'F'); //Linux

	// if(file_exists($document . '\practica_' . $random . '.pdf')){ //Windows
	if(file_exists($document . '/practica_' . $random . '.pdf')){ //Linux
		actualizaPDFFormulario($id, '\practica_' . $random . '.pdf');
		echo '\practica_' . $random . '.pdf';
	}
	else{
	  echo "Sin datos";
	}
	for($i = 0; $i < count($row2); $i++){
		$categoria = $row2[$i]['CATEGORIA'];
		for($j = 0; $j < count($categoria); $j++){
			unlink($categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_1.png');
			unlink($categoria[$j]['CATEGORIA'] . $categoria[$j]['TIPOAUDITORIAid'] . $categoria[$j]['idFORMULARIO'] . $categoria[$j]['TEXTOFAMILIA'] . '_2.png');
		}
	}
}
?>
