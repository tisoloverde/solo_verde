<?php
  require('../model/consultas.php');
  session_start();

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
    0 => 'S',
    1 => 'FOLIO',
    2 => 'PEP_PADRE',
    3 => 'PEP',
    4 => 'COD_CRM',
    5 => 'NOMBRE_PADRE',
    6 => 'NOMBRE',
    7 => 'COD_SOCIEDAD',
    8 => 'NOM_SOCIEDAD',
    9 => 'CLIENTE',
    10 => 'SUB_CLIENTE',
    11 => 'ESTADO',
    12 => 'GERENCIA',
    13 => 'SUBGERENCIA',
    14 => 'GERENTE',
    15 => 'SUBGERENTE',
    16 => 'ADMIN_CONTRATO',
    17 => 'CONTROLLER',
    18 => 'FECHA_INICIO_CONTRATO',
    19 => 'FECHA_FIN_CONTRATO',
    20 => 'FECHA_INICIO_OPERACION',
    21 => 'FECHA_FIN_OPERACION',
    22 => 'Q_PERSONAL',
    23 => 'IDSOCIEDAD',
    24 => 'IDSUBGERENCIA',
    25 => 'IDCONTROLLER',
    26 => 'IDADMINCONTRATO',
    27 => 'IDCLIENTE',
    28 => 'IDESTADO'
	);

	$where_condition = $sqlTot = $sqlRec = "";

  if( !empty($params['search']['value']) ) {
    // $searchData = explode(' ', $params['search']['value']);
    $searchData = $params['search']['value'];

    $where_condition .=	" WHERE ";
    $where_condition .= "( FOLIO LIKE '%".$searchData."%' ";
    $where_condition .= "OR PEP_PADRE LIKE '%".$searchData."%' ";
    $where_condition .= "OR PEP  LIKE '%".$searchData."%' ";
    $where_condition .= "OR COD_CRM  LIKE '%".$searchData."%' ";
    $where_condition .= "OR NOMBRE_PADRE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR NOMBRE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR COD_SOCIEDAD  LIKE '%".$searchData."%' ";
    $where_condition .= "OR NOM_SOCIEDAD  LIKE '%".$searchData."%' ";
    $where_condition .= "OR CLIENTE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR SUB_CLIENTE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR ESTADO  LIKE '%".$searchData."%' ";
    $where_condition .= "OR GERENCIA  LIKE '%".$searchData."%' ";
    $where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData."%' ";
    $where_condition .= "OR GERENTE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR SUBGERENTE  LIKE '%".$searchData."%' ";
    $where_condition .= "OR ADMIN_CONTRATO  LIKE '%".$searchData."%' ";
    $where_condition .= "OR FECHA_INICIO_CONTRATO  LIKE '%".$searchData."%' ";
    $where_condition .= "OR FECHA_FIN_CONTRATO  LIKE '%".$searchData."%' ";
    $where_condition .= "OR FECHA_INICIO_OPERACION  LIKE '%".$searchData."%' ";
    $where_condition .= "OR FECHA_FIN_OPERACION  LIKE '%".$searchData."%' ";
    $where_condition .= "OR Q_PERSONAL LIKE '%".$searchData."%' )";

    // for($i = 0; $i < count($searchData); $i++){
    //   if($i == 0 && ($i + 1) == count($searchData)){
    //     $where_condition .=	" WHERE ";
    // 		$where_condition .= "( FOLIO LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP_PADRE LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_CRM  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE_PADRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOM_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUB_CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ESTADO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ADMIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_OPERACION  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_OPERACION  LIKE '%".$searchData[$i]."%' ";
    // 		$where_condition .= "OR Q_PERSONAL LIKE '%".$searchData[$i]."%' )";
    //   }
    //   else if($i == 0){
    //     $where_condition .=	" WHERE ";
    // 		$where_condition .= "( FOLIO LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP_PADRE LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_CRM  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE_PADRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOM_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUB_CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ESTADO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ADMIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_OPERACION  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_OPERACION  LIKE '%".$searchData[$i]."%' ";
    // 		$where_condition .= "OR Q_PERSONAL LIKE '%".$searchData[$i]."%' ) AND";
    //   }
    //   else{
    // 		$where_condition .= "( FOLIO LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP_PADRE LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR PEP  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_CRM  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE_PADRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOMBRE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR COD_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR NOM_SOCIEDAD  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUB_CLIENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ESTADO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENCIA  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR GERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR SUBGERENTE  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR ADMIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_CONTRATO  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_INICIO_OPERACION  LIKE '%".$searchData[$i]."%' ";
    //     $where_condition .= "OR FECHA_FIN_OPERACION  LIKE '%".$searchData[$i]."%' ";
    // 		$where_condition .= "OR Q_PERSONAL LIKE '%".$searchData[$i]."%' )";
    //   }
    // }
	}

	$sql_query = "SELECT * FROM LISTADO_PROYECTOS_CONTROLLING";
	$sqlTot .= $sql_query;
	$sqlRec .= $sql_query;

	if(isset($where_condition) && $where_condition != '') {
		$sqlTot .= $where_condition;
		$sqlRec .= $where_condition;
	}

 	$sqlRec .= " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

  $con = conectar();
	$queryTot = mysqli_query($con, $sqlTot) or die("Database Error:". mysqli_error($con));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($con, $sqlRec) or die("Error to Get the Post details.");

	while( $row = $queryRecords->fetch_array(MYSQLI_BOTH) ) {
		$data[] = $row;
	}

	$json_data = array(
		"draw"            => intval( $params['draw'] ),
		"recordsTotal"    => intval( $totalRecords ),
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
	);

	echo json_encode($json_data);
?>
