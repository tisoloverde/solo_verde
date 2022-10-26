<?php
  require('../model/consultas.php');
  session_start();

	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	$columns = array(
    0 => 'S',
    1 => 'IDPERSONAL',
    2 => 'DNI',
    3 => 'EMPRESA',
    4 => 'NOMBRES',
    5 => 'APELLIDOS',
    6 => 'CARGO',
    7 => 'RUT_SOLICITUD',
    8 => 'RUT_EMISOR',
    9 => 'SOLICITUD',
    10 => 'EMAIL',
    11 => 'TELEFONO',
    12 => 'RUTJEFEDIRECTO',
    13 => 'JEFE',
    14 => 'CONTACTO',
    15 => 'RUTA_IMG_PERFIL',
    16 => 'GERENCIA',
    17 => 'SUBGERENCIA',
    18 => 'CLIENTE',
    19 => 'COMUNA',
    20 => 'REGION',
    21 => 'PATENTE',
    22 => 'EXTERNO',
    23 => 'SUCURSAL',
    24 => 'CLASIFICACION',
    25 => 'NIVEL',
    26 => 'NOMENCLATURA',
    27 => 'NOMENCLATURA_AGRUPADA',
    28 => 'DENOMINACION',
    29 => 'DENOMINACION_AGRUPADA',
    30 => 'IDEMPRESA',
    31 => 'IDESTRUCTURA_OPERACION'
	);

	$where_condition = $sqlTot = $sqlRec = "";

  if( !empty($params['search']['value']) ) {
    $searchData = explode(' ', $params['search']['value']);

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
    		$where_condition .= "OR DENOMINACION_AGRUPADA LIKE '%".$searchData[$i]."%' )";
      }
      else if($i == 0){
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
    		$where_condition .= "OR DENOMINACION_AGRUPADA LIKE '%".$searchData[$i]."%' ) AND";
      }
      else{
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
    		$where_condition .= "OR DENOMINACION_AGRUPADA LIKE '%".$searchData[$i]."%' )";
      }
    }
	}

	$sql_query = "SELECT * FROM LISTADOJEFATURAS_VIEW";
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
